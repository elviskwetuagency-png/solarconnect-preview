<?php
/**
 * Simple one-page checkout (classic [woocommerce_checkout] shortcode).
 *
 * - Guest checkout, no account needed.
 * - Contact: full name, phone (required, Kenyan format), email (optional).
 * - Fulfilment: delivery (town/area + directions) or pickup at Nairobi or
 *   Watamu. WooCommerce shipping is switched off; delivery and
 *   installation costs are confirmed with the customer after the order.
 * - Payment: "Pay after we confirm" (the COD gateway, retitled). No money
 *   is taken online; the team calls/WhatsApps, then the customer pays by
 *   M-Pesa or bank transfer.
 * - Optional "quote installation" checkbox and a notes field.
 * - Thank-you page with a WhatsApp follow-up button.
 */

const SCK_FULFIL = [
    'delivery'       => ['Deliver to me', 'cost confirmed when we call'],
    'pickup-nairobi' => ['Pick up in Nairobi', 'Lusaka Road, Nairobi'],
    'pickup-watamu'  => ['Pick up in Watamu', 'M2H7+23Q, Watamu'],
];

/* No WooCommerce shipping rates: fulfilment is chosen with our own field. */
add_filter('woocommerce_cart_needs_shipping', '__return_false');
add_filter('woocommerce_cart_needs_shipping_address', '__return_false');

/* Coupon box off the checkout (still available in the cart). */
remove_action('woocommerce_before_checkout_form', 'woocommerce_checkout_coupon_form', 10);
/* Login prompt off: guests check out directly. */
remove_action('woocommerce_before_checkout_form', 'woocommerce_checkout_login_form', 10);

/** Only the fields we need, in a sensible order. */
add_filter('woocommerce_checkout_fields', function ($f) {
    $b = $f['billing'];
    $f['billing'] = [
        'billing_first_name' => array_merge($b['billing_first_name'], ['label' => 'Full name', 'placeholder' => 'e.g. Jane Wanjiru', 'class' => ['form-row-wide'], 'priority' => 10, 'autocomplete' => 'name']),
        'billing_phone'      => array_merge($b['billing_phone'], ['label' => 'Phone (M-Pesa / WhatsApp)', 'placeholder' => '07XX XXX XXX', 'required' => true, 'class' => ['form-row-first'], 'priority' => 20]),
        'billing_email'      => array_merge($b['billing_email'], ['label' => 'Email', 'placeholder' => 'For your receipt (optional)', 'required' => false, 'class' => ['form-row-last'], 'priority' => 30]),
        'sck_fulfil'         => ['type' => 'radio', 'label' => 'How do you want to get it?', 'required' => true, 'default' => 'delivery', 'class' => ['form-row-wide', 'sck-fulfil'], 'priority' => 40,
                                 'options' => array_map(function ($o) { return $o[0] . ' · ' . $o[1]; }, SCK_FULFIL)],
        'billing_city'       => array_merge($b['billing_city'], ['label' => 'Town / area', 'placeholder' => 'e.g. Kilimani, Nairobi', 'required' => false, 'class' => ['form-row-wide', 'sck-deliv'], 'priority' => 50]),
        'billing_address_1'  => array_merge($b['billing_address_1'], ['label' => 'Delivery directions', 'placeholder' => 'Estate, road, building or landmark', 'required' => false, 'class' => ['form-row-wide', 'sck-deliv'], 'priority' => 60]),
    ];
    $f['shipping'] = [];
    if (isset($f['order']['order_comments'])) {
        $f['order']['order_comments']['label'] = 'Anything we should know?';
        $f['order']['order_comments']['placeholder'] = 'e.g. best time to call, site details, appliances you want to run';
    }
    return $f;
});

/** Store is Kenya-only, so the country is set rather than asked. */
add_filter('woocommerce_checkout_posted_data', function ($d) {
    $d['billing_country'] = 'KE';
    if (!empty($d['billing_first_name']) && strpos(trim($d['billing_first_name']), ' ') !== false && empty($d['billing_last_name'])) {
        $parts = preg_split('/\s+/', trim($d['billing_first_name']), 2);
        $d['billing_first_name'] = $parts[0];
        $d['billing_last_name']  = $parts[1];
    }
    return $d;
});

/** Normalise a Kenyan phone number to 07XXXXXXXX / 01XXXXXXXX, or '' if invalid. */
function sck_ke_phone($raw) {
    $n = preg_replace('/\D+/', '', (string) $raw);
    if (strpos($n, '254') === 0) $n = '0' . substr($n, 3);
    if (strlen($n) === 9 && in_array($n[0], ['7', '1'], true)) $n = '0' . $n;
    return preg_match('/^0[17]\d{8}$/', $n) ? $n : '';
}

/** Section heading in place of WooCommerce's "Billing details". */
add_action('woocommerce_before_checkout_billing_form', function () {
    echo '<h3 class="sck-co-h">Your details</h3>';
});

/** Installation checkbox under the notes. */
add_action('woocommerce_after_order_notes', function () {
    $on = !empty($_POST['sck_install']);
    printf('<label class="sck-check"><input type="checkbox" name="sck_install" value="1"%s> <span>I would like installation quoted too</span></label>', $on ? ' checked' : '');
});

/** Server-side checks matching the form. */
add_action('woocommerce_after_checkout_validation', function ($data, $errors) {
    if (!sck_ke_phone($data['billing_phone'] ?? '')) {
        $errors->add('billing_phone', 'Please enter a valid Kenyan phone number, e.g. 0712 345 678.');
    }
    $f = $data['sck_fulfil'] ?? '';
    if (!isset(SCK_FULFIL[$f])) {
        $errors->add('sck_fulfil', 'Please choose delivery or pickup.');
    } elseif ($f === 'delivery' && trim($data['billing_city'] ?? '') === '') {
        $errors->add('billing_city', 'Please tell us your town or area for delivery.');
    }
    if (!empty($data['billing_email']) && !is_email($data['billing_email'])) {
        $errors->add('billing_email', 'Please check your email address, or leave it blank.');
    }
}, 10, 2);

/** Save the choices on the order. */
add_action('woocommerce_checkout_create_order', function ($order) {
    $p = sck_ke_phone($order->get_billing_phone());
    if ($p) $order->set_billing_phone($p);
    $f = isset($_POST['sck_fulfil']) ? sanitize_key(wp_unslash($_POST['sck_fulfil'])) : '';
    if (isset(SCK_FULFIL[$f])) {
        $order->update_meta_data('_sck_fulfil', $f);
        if ($f !== 'delivery') { $order->set_billing_city(''); $order->set_billing_address_1(''); }
    }
    $order->update_meta_data('_sck_install', empty($_POST['sck_install']) ? 'no' : 'yes');
});

/** Show fulfilment and installation in admin, emails and the thank-you page. */
function sck_order_extras($order) {
    $f = $order->get_meta('_sck_fulfil');
    $rows = [];
    if ($f && isset(SCK_FULFIL[$f])) $rows['Delivery or pickup'] = SCK_FULFIL[$f][0] . ($f === 'delivery' ? '' : ' (' . SCK_FULFIL[$f][1] . ')');
    if ($order->get_meta('_sck_install')) $rows['Installation quote'] = $order->get_meta('_sck_install') === 'yes' ? 'Yes, please quote' : 'No';
    return $rows;
}
add_action('woocommerce_admin_order_data_after_billing_address', function ($order) {
    foreach (sck_order_extras($order) as $k => $v) echo '<p><strong>' . esc_html($k) . ':</strong> ' . esc_html($v) . '</p>';
});
add_filter('woocommerce_email_order_meta_fields', function ($fields, $sent_to_admin, $order) {
    foreach (sck_order_extras($order) as $k => $v) $fields[sanitize_key($k)] = ['label' => $k, 'value' => $v];
    return $fields;
}, 10, 3);

/** Button label and a reassurance line under it. */
add_filter('woocommerce_order_button_text', function () { return 'Place order, pay after we confirm'; });
add_action('woocommerce_review_order_after_submit', function () {
    echo '<p class="sck-reassure">No payment is taken now. We call or WhatsApp you to confirm stock, delivery and installation, then you pay by M-Pesa or bank transfer.</p>';
});

/** Order summary heading. */
add_filter('gettext', function ($t, $text, $domain) {
    if ($domain === 'woocommerce' && $text === 'Your order' && did_action('wp') && function_exists('is_checkout') && is_checkout()) return 'Review your order';
    return $t;
}, 10, 3);

/** Thank-you page: what happens next + WhatsApp follow-up. */
add_filter('woocommerce_thankyou_order_received_text', function ($text, $order) {
    if (!$order) return $text;
    $msg = 'Hello Solar Connect, I just placed order #' . $order->get_order_number() . '.';
    return '<span class="sck-ty"><b>Thank you, ' . esc_html($order->get_billing_first_name()) . '. Your order #' . esc_html($order->get_order_number()) . ' is in.</b> '
        . 'We will call or WhatsApp you on ' . esc_html($order->get_billing_phone()) . ' to confirm stock, delivery and installation, then send payment details. Nothing has been charged.'
        . '<a class="btn btn-sun" href="' . esc_url('https://wa.me/254706636447?text=' . rawurlencode($msg)) . '">WhatsApp us about this order</a></span>';
}, 10, 2);

/** Show/hide delivery fields with the delivery/pickup choice. */
add_action('wp_footer', function () {
    if (!function_exists('is_checkout') || !is_checkout() || is_order_received_page()) return; ?>
<script>
(function(){
  var form=document.querySelector('form.checkout'); if(!form) return;
  function sync(){
    var r=form.querySelector('input[name="sck_fulfil"]:checked');
    var del=!r||r.value==='delivery';
    form.querySelectorAll('.sck-deliv').forEach(function(el){el.hidden=!del;});
    var city=form.querySelector('#billing_city_field');
    if(city){city.classList.toggle('validate-required',del);var l=city.querySelector('label .optional');if(l)l.style.display=del?'none':'';}
    
  }
  form.addEventListener('change',function(e){if(e.target.name==='sck_fulfil')sync();});
  sync();
})();
</script>
<?php }, 99);
