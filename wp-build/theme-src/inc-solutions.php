<?php
/**
 * Solutions content: one entry per solution page (slug = the child page's
 * slug under /solutions/). Used by page-solution.php, page-solutions.php,
 * the FAQPage schema and the footer. Product grids and "from" prices are
 * pulled live from the listed WooCommerce categories, so they never go
 * stale; everything else is the page copy.
 */
function sck_solutions() {
    return [
        'full-home-solar' => [
            'eyebrow' => 'Residential solar',
            'title'   => 'Full home solar',
            'h1'      => 'Full home solar systems for Kenyan homes',
            'sub'     => 'A complete home power system designed around daily use, backup confidence, and clean installation.',
            'intro'   => 'Full home solar is ideal when you want more than a single product. It brings panels, inverter, battery, protection devices, cabling, installation, testing and handover support into one dependable system, sized around how your household actually uses power.',
            'card'    => 'Panels, inverter, battery, protection and installation for dependable household power.',
            'img'     => 'home-rooftop.webp',
            'img2'    => 'about/inverter-wall-b.webp',
            'img_alt' => 'Rooftop solar panels on a Kenyan home',
            'best'    => ['Homes with regular power outages', 'Customers reducing reliance on KPLC grid power', 'Families running lighting, TV, fridge, Wi-Fi and sockets', 'New builds planning solar from the beginning'],
            'incl'    => [
                ['Solar panels', 'Sized to the home load and roof space, so daytime generation covers use and recharges the battery.'],
                ['Hybrid or off-grid inverter', 'Matched to your peak load, with grid or generator input where you need it.'],
                ['Battery backup storage', 'Lithium or gel capacity sized for your evening use and outage hours.'],
                ['DC/AC protection and cabling', 'Breakers, surge protection, isolators and correctly rated cable.'],
                ['Mounting, installation and testing', 'Neat installation, system testing and a walkthrough of how to run it.'],
            ],
            'steps'   => [
                ['Review your usage', 'We look at your appliances, daytime usage and backup expectations.'],
                ['Size the system', 'We size the panels, inverter, battery and protection gear as one system.'],
                ['Install and hand over', 'We deliver, install, test and explain the operating routine.'],
            ],
            'cats'    => ['solar-system-packages', 'hybrid-solar-inverters', 'lithium-batteries', 'monocrystalline'],
            'prices'  => [['solar-system-packages', 'Complete solar packages'], ['hybrid-solar-inverters', 'Hybrid inverters'], ['lithium-batteries', 'Lithium batteries']],
            'guides'  => ['how-to-size-solar-system-kenya', 'lithium-vs-gel-batteries-solar-kenya', 'hybrid-inverter-vs-inverter-charger'],
            'faqs'    => [
                ['What size solar system does a typical Kenyan home need?', 'It depends on your appliances and hours of use. Homes running lights, TV, Wi-Fi and a fridge often start around 3kW to 5kVA, while homes adding pumps, a microwave or an iron need more. Send us your appliance list and we will size it properly.'],
                ['Can a full home system keep running during a blackout?', 'Yes. A hybrid or off-grid inverter with a battery switches to stored power automatically, so essential circuits keep running through outages for as long as the battery is sized to cover.'],
                ['Do you install outside Nairobi?', 'Yes. We work from Nairobi (Lusaka Road) and Watamu, and handle projects in other towns on request. Share your location when you ask for a quote.'],
            ],
            'meta'    => ['Full Home Solar Systems in Kenya | Solar Connect Kenya', 'Complete home solar systems in Kenya: panels, hybrid inverter, battery, protection and installation, sized to your appliances. Nairobi and Watamu.', 'full home solar system Kenya'],
        ],
        'power-backup' => [
            'eyebrow' => 'Inverter and battery',
            'title'   => 'Power backup',
            'h1'      => 'Inverter and battery power backup',
            'sub'     => 'A practical backup setup for keeping essential appliances running during outages.',
            'intro'   => 'Power backup focuses on stability first. The right inverter and battery combination keeps critical loads running through outages, without you having to invest in a full solar array straight away. Panels can be added later.',
            'card'    => 'Matched inverter and battery backup for lights, Wi-Fi, TV, tills and essential loads.',
            'img'     => 'about/inverter-wall-a.webp',
            'img2'    => 'about/battery-rack.webp',
            'img_alt' => 'Inverter and battery backup system installed on a wall',
            'best'    => ['Homes and small offices with outage interruptions', 'Keeping lights, TV, Wi-Fi and charging running', 'Businesses that need to keep working through blackouts', 'Sites that may add solar panels later'],
            'incl'    => [
                ['Inverter matched to load size', 'Sized for the appliances you want to keep running, with headroom for start-up surges.'],
                ['Battery bank sized by backup hours', 'Capacity chosen for how long your outages usually last.'],
                ['Changeover and protection planning', 'Safe switching between grid and backup, with the right breakers.'],
                ['Clean wiring and safe placement', 'Ventilated, tidy placement of the inverter and batteries.'],
                ['Optional future solar expansion', 'A setup that can take solar panels later without starting over.'],
            ],
            'steps'   => [
                ['List your essential loads', 'Tell us what must stay on and how long outages usually last.'],
                ['Match inverter and battery', 'We pair the inverter size and battery capacity to that need.'],
                ['Install and test changeover', 'We install, test switching between grid and backup, and show you how it works.'],
            ],
            'cats'    => ['inverter-chargers', 'lithium-batteries', 'solar-gel-batteries', 'portable-power-stations'],
            'prices'  => [['inverter-chargers', 'Inverter chargers'], ['solar-gel-batteries', 'Gel batteries'], ['lithium-batteries', 'Lithium batteries']],
            'guides'  => ['hybrid-inverter-vs-inverter-charger', 'lithium-vs-gel-batteries-solar-kenya', 'how-to-size-solar-system-kenya'],
            'faqs'    => [
                ['How long will a backup system run during a blackout?', 'That depends on the battery capacity and what is switched on. A battery holding 5kWh of usable energy runs a 500W load for roughly 10 hours. We size the battery around your usual outage length.'],
                ['Can I add solar panels to my backup system later?', 'Yes, if the inverter supports solar input (a hybrid inverter) or you add a charge controller. Tell us if you plan to add panels, so we choose equipment that can grow.'],
                ['Lithium or gel battery for backup?', 'Gel costs less up front for small systems, but lithium gives more usable capacity and a much longer listed cycle life. Our lithium vs gel guide compares them with real shop prices.'],
            ],
            'meta'    => ['Inverter and Battery Power Backup in Kenya | Solar Connect', 'Inverter and battery backup systems in Kenya that keep lights, Wi-Fi, TV and essential loads running through blackouts. Sized and installed by Solar Connect.', 'inverter and battery backup Kenya'],
        ],
        'business-power-systems' => [
            'eyebrow' => 'Hybrid systems',
            'title'   => 'Business power systems',
            'h1'      => 'Solar power systems for businesses in Kenya',
            'sub'     => 'Hybrid solar power for shops, offices, apartments, and small business operations.',
            'intro'   => 'Business solar systems are built around uptime, predictable operating costs and equipment protection. They combine careful load sizing with practical installation decisions for working environments, so trading does not stop when the grid does.',
            'card'    => 'Hybrid solar and backup for shops, offices, apartments, clinics and small business sites.',
            'img'     => 'business-solar-farm.webp',
            'img2'    => 'about/battery-rack.webp',
            'img_alt' => 'Large commercial solar panel array',
            'best'    => ['Retail shops and offices', 'Clinics, salons and service businesses', 'Apartments and shared facilities', 'Operations with high daytime energy demand'],
            'incl'    => [
                ['Load assessment for business equipment', 'A review of computers, tills, fridges, pumps, lighting and other equipment.'],
                ['Hybrid inverter and panel sizing', 'Single or three-phase hybrid inverters sized for your demand.'],
                ['Battery backup for priority loads', 'Storage for the circuits that must never go down.'],
                ['Protection gear and distribution planning', 'Breakers, surge protection and clean distribution for working sites.'],
                ['Handover and support for staff', 'Clear operating guidance for your team and reachable follow-up support.'],
            ],
            'steps'   => [
                ['Assess the site', 'We review your equipment, operating hours, bills and priority loads.'],
                ['Design the hybrid system', 'We size the inverter, panels and battery for uptime and savings.'],
                ['Install with minimal disruption', 'We plan the installation around your operations, then test and train staff.'],
            ],
            'cats'    => ['hybrid-solar-inverters', 'lithium-batteries', 'grid-tie-inverters', 'monocrystalline'],
            'order'   => 'DESC',
            'prices'  => [['hybrid-solar-inverters', 'Hybrid inverters'], ['lithium-batteries', 'Lithium batteries'], ['monocrystalline', 'Solar panels']],
            'guides'  => ['how-to-size-solar-system-kenya', 'hybrid-inverter-vs-inverter-charger', 'lithium-vs-gel-batteries-solar-kenya'],
            'faqs'    => [
                ['Can solar reduce my business electricity bill?', 'Yes, especially if most of your power use is during the day, when panels generate. A hybrid system uses solar first and draws from the grid or battery only when needed. We estimate savings from your bills and load.'],
                ['Do you supply three-phase systems?', 'Yes. We stock single and three-phase hybrid inverters for larger sites. Tell us your supply type and main equipment when you request a quote.'],
                ['Will the installation disrupt my business?', 'We plan the work around your operating hours and keep the switchover short. Most of the installation happens before the system is connected.'],
            ],
            'meta'    => ['Business Solar Power Systems in Kenya | Solar Connect Kenya', 'Hybrid solar and battery systems for shops, offices, clinics and apartments in Kenya. Load assessment, sizing, installation and staff handover.', 'business solar system Kenya'],
        ],
        'solar-water-heating' => [
            'eyebrow' => 'Hot water',
            'title'   => 'Solar water heating',
            'h1'      => 'Solar water heaters for homes and facilities',
            'sub'     => 'Reliable hot water systems that reduce electricity use in homes and facilities.',
            'intro'   => 'Solar water heating is a strong fit where hot water is a daily expense. A correctly selected system can cut the electricity used for water heating while improving comfort and predictability, especially for larger households, rentals and guest houses.',
            'card'    => 'Pressurized solar water heaters that cut the cost of daily hot water.',
            'img'     => 'solar-water-heating.webp',
            'img2'    => 'about/rooftop-sky.webp',
            'img_alt' => 'Solar water heater installed on a roof',
            'best'    => ['Homes with daily hot water needs', 'Apartments and rental units', 'Guest houses and small hospitality sites', 'Facilities reducing electric water heating costs'],
            'incl'    => [
                ['Capacity recommendation', 'Tank size chosen from the number of people and daily hot water use.'],
                ['Collector and tank selection', 'Pressurized systems matched to your water pressure and plumbing.'],
                ['Roof placement guidance', 'Orientation and placement for good sun exposure and safe mounting.'],
                ['Plumbing coordination', 'Connection to your existing hot water lines.'],
                ['Testing and usage guidance', 'A tested system and simple guidance for getting the most from it.'],
            ],
            'steps'   => [
                ['Count your hot water needs', 'We ask how many people use hot water and when.'],
                ['Choose the capacity', 'We recommend a tank size and collector for your site.'],
                ['Install and connect', 'We mount, plumb, test and explain the system.'],
            ],
            'cats'    => ['pressurized-systems'],
            'prices'  => [['pressurized-systems', 'Pressurized solar water heaters']],
            'guides'  => ['solar-water-heater-kenya-guide', 'how-to-size-solar-system-kenya'],
            'faqs'    => [
                ['What size solar water heater do I need?', 'As a rough guide, plan around 40 to 50 litres per person per day, so a family of four needs about 160 to 200 litres. We confirm the size from your household and usage.'],
                ['Does a solar water heater work on cloudy days?', 'It heats less on overcast days. Many systems include an electric backup element, so you still get hot water when the sun is weak.'],
                ['Is a pressurized system better than a non-pressurized one?', 'Pressurized systems deliver hot water at mains pressure to showers and taps, which most modern homes prefer. Our solar water heater guide covers sizing and installation in more detail.'],
            ],
            'meta'    => ['Solar Water Heaters in Kenya | Solar Connect Kenya', 'Pressurized solar water heaters for homes, rentals and guest houses in Kenya. Capacity advice, supply, installation and plumbing coordination.', 'solar water heater Kenya'],
        ],
        'outdoor-lighting' => [
            'eyebrow' => 'Security and streets',
            'title'   => 'Outdoor lighting',
            'h1'      => 'Solar outdoor and security lighting',
            'sub'     => 'Solar lighting for compounds, walkways, security points, and commercial outdoor spaces.',
            'intro'   => 'Outdoor solar lighting improves visibility without trenching or grid extensions. The right light depends on the area you need to cover, the mounting height, battery quality and how many hours of light you expect each night.',
            'card'    => 'Solar flood and security lighting for compounds, gates, walkways and parking.',
            'img'     => 'outdoor-lighting.webp',
            'img2'    => 'about/field-tech-panel.webp',
            'img_alt' => 'Solar outdoor light illuminating a compound',
            'best'    => ['Residential compounds', 'Walkways and parking areas', 'Security points and gates', 'Commercial outdoor spaces'],
            'incl'    => [
                ['Light output recommendation', 'Wattage and beam chosen for the area you need to light.'],
                ['Mounting and spacing guidance', 'Height and spacing that avoid dark patches between lights.'],
                ['Battery and runtime planning', 'Runtime matched to the hours of light you need each night.'],
                ['Weather-resistant products', 'Fittings selected for rain, dust and coastal conditions.'],
                ['Installation positioning support', 'Panel placement for full sun, so lights charge reliably.'],
            ],
            'steps'   => [
                ['Map the area', 'Tell us the space, mounting points and the hours you need light.'],
                ['Choose the lights', 'We recommend wattage, quantity and spacing.'],
                ['Install and position', 'We mount the lights and panels for reliable charging.'],
            ],
            'cats'    => ['solar-flood-light'],
            'prices'  => [['solar-flood-light', 'Solar flood lights']],
            'guides'  => ['how-to-size-solar-system-kenya'],
            'faqs'    => [
                ['How long do solar flood lights stay on at night?', 'A good solar flood light with a full charge typically runs through the evening and night. Runtime drops after several cloudy days, which is why battery quality and panel placement matter.'],
                ['Do solar security lights need wiring to the mains?', 'No. Each light charges from its own solar panel, so there is no trenching or grid connection. That makes them practical for gates, perimeter walls and parking areas.'],
                ['What wattage do I need for a compound?', 'Smaller compounds and gates often suit 100W flood lights, while larger yards and parking areas may need higher output or more fittings. Share the size of the space and we will recommend a layout.'],
            ],
            'meta'    => ['Solar Outdoor and Security Lighting in Kenya | Solar Connect', 'Solar flood and security lights for compounds, gates, walkways and parking in Kenya. No wiring or trenching, with layout and installation support.', 'solar flood lights Kenya'],
        ],
        'parts-and-accessories' => [
            'eyebrow' => 'Finish the system',
            'title'   => 'Parts and accessories',
            'h1'      => 'Solar parts, controllers and accessories',
            'sub'     => 'Controllers, cables, breakers, rails, cabinets and hardware for clean solar installations.',
            'intro'   => 'Accessories are the difference between a collection of products and a clean, reliable system. Good charge controllers, cabling, protection, mounting and finishing hardware help an installation perform safely for years.',
            'card'    => 'Charge controllers, cable, breakers, rails and hardware for clean, safe installs.',
            'img'     => 'about/inverter-wall-c.webp',
            'img2'    => 'about/field-tech-panel.webp',
            'img_alt' => 'Neatly wired solar inverter, breakers and accessories',
            'best'    => ['Installers completing a system', 'Replacing worn or failed parts', 'Projects needing clean mounting and wiring', 'Solar upgrades and expansions'],
            'incl'    => [
                ['MPPT charge controllers', 'Efficient charging for panel and battery systems of every size.'],
                ['Solar cable and connectors', 'Correctly rated DC cable and connectors for safe runs.'],
                ['Breakers and protection devices', 'DC and AC breakers, surge protection and isolators.'],
                ['Mounting rails and hardware', 'Rails, clamps and fixings for secure roof and ground mounts.'],
                ['Combiner boxes and finishing parts', 'Enclosures and finishing hardware for a tidy, safe installation.'],
            ],
            'steps'   => [
                ['Tell us your system', 'Share your panel, battery and inverter specs, or send photos.'],
                ['Get matched parts', 'We confirm ratings and compatibility before you buy.'],
                ['Collect, deliver or install', 'Pick up in Nairobi or Watamu, or we deliver or install.'],
            ],
            'cats'    => ['mppt-charge-controller', 'monocrystalline'],
            'prices'  => [['mppt-charge-controller', 'MPPT charge controllers'], ['monocrystalline', 'Monocrystalline panels']],
            'guides'  => ['how-to-size-solar-system-kenya', 'lithium-vs-gel-batteries-solar-kenya'],
            'faqs'    => [
                ['Do I need an MPPT charge controller?', 'If your panels charge a battery without a hybrid inverter, yes. An MPPT controller converts panel power to battery charging more efficiently than a basic PWM controller, especially with larger panels.'],
                ['Can you check if a part is compatible with my system?', 'Yes. Send us the model numbers or photos of your inverter, battery and panels, and we will confirm compatibility before you buy.'],
                ['Do you stock cables and breakers?', 'Yes. Ask us for cable, breakers, surge protection and mounting hardware with your order, and we will match the ratings to your system.'],
            ],
            'meta'    => ['Solar Parts, Charge Controllers and Accessories | Solar Connect', 'MPPT charge controllers, solar panels, cable, breakers and mounting hardware in Kenya, matched to your system. Nairobi and Watamu.', 'solar accessories Kenya'],
        ],
    ];
}

/** URL of a solution page (or the hub when $slug is empty). */
function sck_solution_url($slug = '') {
    return home_url('/solutions/' . ($slug ? $slug . '/' : ''));
}

/**
 * Live products for a solution: round-robin across its categories so each
 * category is represented, in-stock first. Returns product IDs.
 */
function sck_solution_products($sol, $limit = 4) {
    if (!function_exists('wc_get_products')) return [];
    $order = isset($sol['order']) ? $sol['order'] : 'ASC';
    $lists = [];
    foreach ($sol['cats'] as $cat) {
        $lists[] = wc_get_products(['status' => 'publish', 'category' => [$cat], 'stock_status' => 'instock', 'limit' => $limit, 'orderby' => 'meta_value_num', 'meta_key' => '_price', 'order' => $order, 'return' => 'ids']);
    }
    $ids = [];
    for ($i = 0; count($ids) < $limit && $i < $limit; $i++) {
        foreach ($lists as $l) {
            if (isset($l[$i]) && !in_array($l[$i], $ids, true)) $ids[] = $l[$i];
            if (count($ids) >= $limit) break;
        }
    }
    return $ids;
}

/** Lowest current price in a product category (published, in stock), or 0. */
function sck_cat_min_price($cat) {
    if (!function_exists('wc_get_products')) return 0;
    $ids = wc_get_products(['status' => 'publish', 'category' => [$cat], 'stock_status' => 'instock', 'limit' => 1, 'orderby' => 'meta_value_num', 'meta_key' => '_price', 'order' => 'ASC', 'return' => 'ids']);
    if (!$ids) return 0;
    $p = wc_get_product($ids[0]);
    return $p ? (float) $p->get_price() : 0;
}

/** Slug of the solution page being viewed, or ''. */
function sck_current_solution() {
    if (!is_page_template('page-solution.php')) return '';
    $slug = get_post_field('post_name', get_queried_object_id());
    return isset(sck_solutions()[$slug]) ? $slug : '';
}

/** FAQPage + Service structured data for solution pages, from the same copy the page shows. */
add_action('wp_head', function () {
    $slug = sck_current_solution();
    if (!$slug) return;
    $s = sck_solutions()[$slug];
    $faq = ['@context' => 'https://schema.org', '@type' => 'FAQPage', 'mainEntity' => array_map(function ($f) {
        return ['@type' => 'Question', 'name' => $f[0], 'acceptedAnswer' => ['@type' => 'Answer', 'text' => $f[1]]];
    }, $s['faqs'])];
    $service = ['@context' => 'https://schema.org', '@type' => 'Service', 'name' => $s['title'], 'serviceType' => $s['title'], 'description' => $s['intro'],
        'url' => sck_solution_url($slug), 'provider' => ['@id' => home_url('/#organization')], 'areaServed' => ['@type' => 'Country', 'name' => 'Kenya'],
        'hasOfferCatalog' => ['@type' => 'OfferCatalog', 'name' => $s['title'] . ': what is included', 'itemListElement' => array_map(function ($i) {
            return ['@type' => 'Offer', 'itemOffered' => ['@type' => 'Service', 'name' => $i[0], 'description' => $i[1]]];
        }, $s['incl'])]];
    foreach ([$faq, $service] as $d) echo '<script type="application/ld+json">' . wp_json_encode($d, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) . '</script>' . "\n";
}, 30);
