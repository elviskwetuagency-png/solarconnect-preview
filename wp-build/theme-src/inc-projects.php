<?php
/**
 * Projects: a "Projects" content type (/projects/ and /projects/<slug>/)
 * that the team fills in from wp-admin with a simple form. Templates:
 * archive-sck_project.php and single-sck_project.php. Projects also feed
 * the homepage rail (parts/home-projects.php) and the solution pages.
 */

/** Solution choices for a project (slug => label), from the solution pages. */
function sck_project_solutions() {
    $out = [];
    foreach (sck_solutions() as $slug => $s) $out[$slug] = $s['title'];
    return $out;
}

/** Customer types shown in the form and used for filtering. */
function sck_project_customer_types() {
    return ['home' => 'Home', 'business' => 'Business', 'institution' => 'School, clinic or institution', 'apartment' => 'Apartments or rentals', 'hospitality' => 'Hotel or guest house', 'farm' => 'Farm or rural site'];
}

add_action('init', function () {
    register_post_type('sck_project', [
        'labels' => [
            'name' => 'Projects', 'singular_name' => 'Project', 'add_new' => 'Add project', 'add_new_item' => 'Add project',
            'edit_item' => 'Edit project', 'new_item' => 'New project', 'view_item' => 'View project', 'view_items' => 'View projects',
            'search_items' => 'Search projects', 'not_found' => 'No projects yet', 'all_items' => 'All projects', 'menu_name' => 'Projects',
            'featured_image' => 'Main photo', 'set_featured_image' => 'Set main photo', 'remove_featured_image' => 'Remove main photo', 'use_featured_image' => 'Use as main photo',
        ],
        'public' => true,
        'has_archive' => 'projects',
        'rewrite' => ['slug' => 'projects', 'with_front' => false],
        'menu_icon' => 'dashicons-portfolio',
        'menu_position' => 21,
        'supports' => ['title', 'editor', 'thumbnail', 'excerpt', 'revisions'],
        'show_in_rest' => false, /* classic editor: the form below sits under a simple text box */
    ]);
});

/** Field definitions: key => [label, type, help]. */
function sck_project_fields() {
    return [
        'card_title'=> ['Short name (homepage card)', 'text', 'A few words for the homepage card, e.g. "Mansion in Watamu". Leave empty to use the title.'],
        'card_spec' => ['Short spec (homepage card)', 'text', 'Key numbers only, e.g. "50.2kWp · 45kWh".'],
        'location'  => ['Location', 'text', 'Area and town, e.g. "Kitengela, Kajiado". No customer names or exact addresses.'],
        'solution'  => ['Solution type', 'select', 'Links the project to the matching solution page.'],
        'customer'  => ['Customer type', 'select', ''],
        'completed' => ['Completed', 'month', 'Month and year the system was handed over.'],
        'size'      => ['System size', 'text', 'e.g. "5kVA hybrid inverter · 10kWh lithium · 8 × 550W panels"'],
        'challenge' => ['What the customer needed', 'textarea', 'One or two sentences: the problem or goal before the project.'],
        'result'    => ['Result', 'textarea', 'One or two sentences: what changed after installation.'],
        'equipment' => ['Equipment used', 'products', 'Products from the shop that were installed. They are shown on the project page with links.'],
        'quote'     => ['Customer quote (optional)', 'textarea', 'Only with the customer\'s permission.'],
        'quote_by'  => ['Quote by (optional)', 'text', 'e.g. "Jane W., Kitengela" (first name and initial is enough).'],
        'gallery'   => ['More photos', 'gallery', 'Add 3 to 6 photos. The main photo is set in the "Main photo" box.'],
    ];
}

/** Read one project field. */
function sck_project_meta($id, $key) {
    return get_post_meta($id, '_sck_p_' . $key, true);
}

add_action('add_meta_boxes', function () {
    add_meta_box('sck_project_details', 'Project details', 'sck_project_box', 'sck_project', 'normal', 'high');
});

function sck_project_box($post) {
    wp_nonce_field('sck_project_save', 'sck_project_nonce');
    wp_enqueue_media();
    $opts = ['solution' => sck_project_solutions(), 'customer' => sck_project_customer_types()];
    echo '<style>.sckp-f{margin:0 0 16px}.sckp-f label{display:block;font-weight:600;margin-bottom:4px}.sckp-f input[type=text],.sckp-f input[type=month],.sckp-f select,.sckp-f textarea{width:100%;max-width:640px}.sckp-f textarea{min-height:70px}.sckp-help{color:#646970;font-size:12px;margin-top:3px}.sckp-gal{display:flex;flex-wrap:wrap;gap:6px;margin:6px 0}.sckp-gal img{width:72px;height:72px;object-fit:cover;border-radius:4px}.sckp-prod{max-width:640px}</style>';
    foreach (sck_project_fields() as $k => $f) {
        $v = sck_project_meta($post->ID, $k);
        $name = 'sck_p[' . $k . ']';
        echo '<div class="sckp-f"><label for="sckp-' . esc_attr($k) . '">' . esc_html($f[0]) . '</label>';
        switch ($f[1]) {
            case 'select':
                echo '<select id="sckp-' . esc_attr($k) . '" name="' . esc_attr($name) . '"><option value="">Choose…</option>';
                foreach ($opts[$k] as $ov => $ol) printf('<option value="%s"%s>%s</option>', esc_attr($ov), selected($v, $ov, false), esc_html($ol));
                echo '</select>';
                break;
            case 'textarea':
                printf('<textarea id="sckp-%s" name="%s">%s</textarea>', esc_attr($k), esc_attr($name), esc_textarea($v));
                break;
            case 'month':
                printf('<input type="month" id="sckp-%s" name="%s" value="%s" style="max-width:220px">', esc_attr($k), esc_attr($name), esc_attr($v));
                break;
            case 'products':
                $ids = array_filter(array_map('intval', explode(',', (string) $v)));
                $products = get_posts(['post_type' => 'product', 'post_status' => 'publish', 'numberposts' => -1, 'orderby' => 'title', 'order' => 'ASC']);
                printf('<select id="sckp-%s" name="sck_p[equipment][]" multiple size="8" class="sckp-prod">', esc_attr($k));
                foreach ($products as $p) printf('<option value="%d"%s>%s</option>', $p->ID, in_array($p->ID, $ids, true) ? ' selected' : '', esc_html($p->post_title));
                echo '</select><div class="sckp-help">Hold Ctrl (Windows) or Cmd (Mac) to choose more than one.</div>';
                break;
            case 'gallery':
                $ids = array_filter(array_map('intval', explode(',', (string) $v)));
                echo '<input type="hidden" id="sckp-gallery" name="' . esc_attr($name) . '" value="' . esc_attr(implode(',', $ids)) . '"><div class="sckp-gal" id="sckp-gal">';
                foreach ($ids as $aid) echo wp_get_attachment_image($aid, 'thumbnail');
                echo '</div><button type="button" class="button" id="sckp-gal-btn">Choose photos</button> <button type="button" class="button-link" id="sckp-gal-clear">Clear</button>';
                break;
            default:
                printf('<input type="text" id="sckp-%s" name="%s" value="%s">', esc_attr($k), esc_attr($name), esc_attr($v));
        }
        if ($f[2]) echo '<div class="sckp-help">' . esc_html($f[2]) . '</div>';
        echo '</div>';
    }
    ?>
<script>
jQuery(function($){
  var frame;
  $('#sckp-gal-btn').on('click', function(e){
    e.preventDefault();
    var ids = ($('#sckp-gallery').val() || '').split(',').filter(Boolean);
    frame = wp.media({title: 'Project photos', button: {text: 'Use these photos'}, multiple: 'add', library: {type: 'image'}});
    frame.on('open', function(){ var sel = frame.state().get('selection'); ids.forEach(function(id){ var a = wp.media.attachment(id); a.fetch(); sel.add(a); }); });
    frame.on('select', function(){
      var sel = frame.state().get('selection').toJSON();
      $('#sckp-gallery').val(sel.map(function(a){ return a.id; }).join(','));
      $('#sckp-gal').html(sel.map(function(a){ var u = (a.sizes && a.sizes.thumbnail ? a.sizes.thumbnail.url : a.url); return '<img src="' + u + '" alt="">'; }).join(''));
    });
    frame.open();
  });
  $('#sckp-gal-clear').on('click', function(e){ e.preventDefault(); $('#sckp-gallery').val(''); $('#sckp-gal').empty(); });
});
</script>
<?php
}

add_action('save_post_sck_project', function ($post_id) {
    if (!isset($_POST['sck_project_nonce']) || !wp_verify_nonce(sanitize_text_field(wp_unslash($_POST['sck_project_nonce'])), 'sck_project_save')) return;
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
    if (!current_user_can('edit_post', $post_id)) return;
    $in = isset($_POST['sck_p']) ? wp_unslash($_POST['sck_p']) : [];
    foreach (sck_project_fields() as $k => $f) {
        $raw = $in[$k] ?? '';
        switch ($f[1]) {
            case 'textarea': $v = sanitize_textarea_field($raw); break;
            case 'select':   $v = sanitize_key($raw); break;
            case 'month':    $v = preg_match('/^\d{4}-\d{2}$/', (string) $raw) ? $raw : ''; break;
            case 'products': $v = implode(',', array_filter(array_map('intval', (array) $raw))); break;
            case 'gallery':  $v = implode(',', array_filter(array_map('intval', explode(',', (string) $raw)))); break;
            default:         $v = sanitize_text_field($raw);
        }
        if ($v === '') delete_post_meta($post_id, '_sck_p_' . $k); else update_post_meta($post_id, '_sck_p_' . $k, $v);
    }
});

/** Admin list columns: photo, location, solution. */
add_filter('manage_sck_project_posts_columns', function ($c) {
    $new = [];
    foreach ($c as $k => $v) {
        if ($k === 'title') $new['sckp_photo'] = 'Photo';
        $new[$k] = $v;
        if ($k === 'title') { $new['sckp_loc'] = 'Location'; $new['sckp_sol'] = 'Solution'; }
    }
    return $new;
});
add_action('manage_sck_project_posts_custom_column', function ($col, $id) {
    if ($col === 'sckp_photo') echo get_the_post_thumbnail($id, [60, 60], ['style' => 'width:60px;height:60px;object-fit:cover;border-radius:4px']);
    if ($col === 'sckp_loc') echo esc_html(sck_project_meta($id, 'location'));
    if ($col === 'sckp_sol') { $s = sck_project_solutions(); $v = sck_project_meta($id, 'solution'); echo esc_html($s[$v] ?? ''); }
}, 10, 2);

/** Published projects, newest first. */
function sck_projects($args = []) {
    return get_posts(array_merge(['post_type' => 'sck_project', 'post_status' => 'publish', 'numberposts' => -1, 'orderby' => 'date', 'order' => 'DESC'], $args));
}

/** True when at least one project is published (controls the nav link). */
function sck_projects_live() {
    static $n = null;
    if ($n === null) { $c = wp_count_posts('sck_project'); $n = isset($c->publish) ? (int) $c->publish : 0; }
    return $n > 0;
}

/** "March 2026" from "2026-03". */
function sck_project_date_label($ym) {
    if (!preg_match('/^(\d{4})-(\d{2})$/', (string) $ym, $m)) return '';
    return date_i18n('F Y', mktime(0, 0, 0, (int) $m[2], 1, (int) $m[1]));
}

/** One project card (used on /projects/ and the solution pages). */
function sck_project_card($p) {
    $sol  = sck_project_solutions();
    $sv   = sck_project_meta($p->ID, 'solution');
    $loc  = sck_project_meta($p->ID, 'location');
    $size = sck_project_meta($p->ID, 'size');
    $img  = get_the_post_thumbnail_url($p, 'large');
    return '<article class="pjc rv" data-sol="' . esc_attr($sv) . '" data-cust="' . esc_attr(sck_project_meta($p->ID, 'customer')) . '">'
        . '<figure class="media">' . ($img ? '<img src="' . esc_url($img) . '" alt="' . esc_attr(get_the_title($p)) . '" loading="lazy">' : '') . ($loc ? '<span class="pjc-tag">' . esc_html($loc) . '</span>' : '') . '</figure>'
        . '<div class="pjc-b">' . (isset($sol[$sv]) ? '<span class="mono pjc-k">' . esc_html($sol[$sv]) . '</span>' : '')
        . '<h3><a href="' . esc_url(get_permalink($p)) . '">' . esc_html(get_the_title($p)) . '</a></h3>'
        . ($size ? '<p class="pjc-size">' . esc_html($size) . '</p>' : '') . '</div></article>';
}

/** Project pages use pages.css and the in-page hero nav like the other content pages. */
add_filter('sck_extra_content_page', function ($on) {
    return $on || is_post_type_archive('sck_project') || is_singular('sck_project');
});

/** Schema: project pages are articles by the company, not a WordPress user. */
add_filter('rank_math/json_ld', function ($data) {
    if (!is_singular('sck_project') || !is_array($data)) return $data;
    $org = ['@id' => home_url('/#organization')];
    foreach ($data as $key => $node) {
        $types = isset($node['@type']) ? (array) $node['@type'] : [];
        if (in_array('Person', $types, true)) { unset($data[$key]); continue; }
        if (isset($node['author'])) $data[$key]['author'] = $org;
        if (array_intersect($types, ['Article', 'BlogPosting', 'NewsArticle'])) $data[$key]['publisher'] = $org;
    }
    return $data;
}, 100);
