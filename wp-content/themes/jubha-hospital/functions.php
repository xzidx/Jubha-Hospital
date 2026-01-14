<?php
// -------------------------
// THEME SETUP
// -------------------------
function mytheme_setup() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');

    register_nav_menus([
        'primary' => 'Primary Menu',
    ]);
}
add_action('after_setup_theme', 'mytheme_setup');

// function jubha_theme_styles() {

//     // Global styles (includes header + footer)
//     wp_enqueue_style(
//         'jubha-style',
//         get_stylesheet_uri(),
//         [],
//         filemtime(get_stylesheet_directory() . '/style.css')
//     );

//     // Front page only
//     if (is_front_page()) {
//         wp_enqueue_style(
//             'front-page-style',
//             get_stylesheet_directory_uri() . '/css/front-page.css',
//             ['jubha-style'],
//             filemtime(get_stylesheet_directory() . '/css/front-page.css')
//         );
//     }

//     // Services page
//     if (is_page('services')) {
//         wp_enqueue_style(
//             'services-style',
//             get_stylesheet_directory_uri() . '/css/services.css',
//             ['jubha-style'],
//             filemtime(get_stylesheet_directory() . '/css/services.css')
//         );
//     }













































































    


// // vannara-space






















































































































// }
// add_action('wp_enqueue_scripts', 'jubha_theme_styles');











// 1. Register the Doctor Post Type
function register_modern_doctor_cpt() {
    register_post_type('doctors', array(
        'labels'      => array('name' => 'Doctors', 'singular_name' => 'Doctor'),
        'public'      => true,
        'has_archive' => true,
        'menu_icon'   => 'dashicons-businessman',
        'supports'    => array('title', 'thumbnail'), // Name and Photo
        'show_in_rest' => true,
    ));
}
add_action('init', 'register_modern_doctor_cpt');


// 2. Add the Input Boxes (Meta Boxes) to the Edit Screen
add_action('add_meta_boxes', function() {
    add_meta_box('dr_details', 'Doctor Card Info', 'dr_meta_box_html', 'doctors', 'normal', 'high');
});

function dr_meta_box_html($post) {
    $address        = get_post_meta($post->ID, '_dr_address', true);
    $badge          = get_post_meta($post->ID, '_dr_badge', true);
    $rating         = get_post_meta($post->ID, '_dr_rating', true);
    $bio            = get_post_meta($post->ID, '_dr_bio', true);
    $education      = get_post_meta($post->ID, '_dr_education', true);
    $treatments     = get_post_meta($post->ID, '_dr_treatments', true);
    $certifications = get_post_meta($post->ID, '_dr_certifications', true);
    $services       = get_post_meta($post->ID, '_dr_services', true);
    ?>
    <div style="padding:10px; max-width: 600px;">
        <label><strong>Address:</strong></label><br>
        <input type="text" name="dr_address" value="<?php echo esc_attr($address); ?>" style="width:100%; margin-bottom:10px;" placeholder="e.g. AMC Rakkah">
        
        <label><strong>Badge / Specialty:</strong></label><br>
        <input type="text" name="dr_badge" value="<?php echo esc_attr($badge); ?>" style="width:100%; margin-bottom:10px;" placeholder="e.g. Obstetric & Gynecology">
        
        <label><strong>Star Rating:</strong></label><br>
        <input type="text" name="dr_rating" value="<?php echo esc_attr($rating); ?>" style="width:100%; margin-bottom:10px;" placeholder="e.g. 4.8">
        
        <label><strong>Bio / About:</strong></label><br>
        <textarea name="dr_bio" rows="4" style="width:100%; margin-bottom:10px;" placeholder="Doctor bio..."><?php echo esc_textarea($bio); ?></textarea>

        <label><strong>Qualifications / Education:</strong></label><br>
        <textarea name="dr_education" rows="4" style="width:100%; margin-bottom:10px;" placeholder="Education info..."><?php echo esc_textarea($education); ?></textarea>

        <label><strong>Treatments / Diagnosis:</strong></label><br>
        <textarea name="dr_treatments" rows="4" style="width:100%; margin-bottom:10px;" placeholder="Treatments info..."><?php echo esc_textarea($treatments); ?></textarea>

        <label><strong>Certifications:</strong></label><br>
        <textarea name="dr_certifications" rows="2" style="width:100%; margin-bottom:10px;" placeholder="Certifications info..."><?php echo esc_textarea($certifications); ?></textarea>

        <label><strong>Services Offered:</strong></label><br>
        <textarea name="dr_services" rows="3" style="width:100%; margin-bottom:10px;" placeholder="Services info..."><?php echo esc_textarea($services); ?></textarea>
    </div>
    <?php
}


// 3. Save all fields
add_action('save_post', function($post_id) {
    $fields = [
        'dr_address'        => '_dr_address',
        'dr_badge'          => '_dr_badge',
        'dr_rating'         => '_dr_rating',
        'dr_bio'            => '_dr_bio',
        'dr_education'      => '_dr_education',
        'dr_treatments'     => '_dr_treatments',
        'dr_certifications' => '_dr_certifications',
        'dr_services'       => '_dr_services',
    ];

    foreach ($fields as $field_name => $meta_key) {
        if (isset($_POST[$field_name])) {
            update_post_meta($post_id, $meta_key, sanitize_textarea_field($_POST[$field_name]));
        }
    }
});
