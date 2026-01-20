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

// CEO Message page
if (is_page('ceo-message')) {
        wp_enqueue_style(
            'ceo-message-style',
            get_stylesheet_directory_uri() . '/css/ceo-message.css',
            ['jubha-style'],
            filemtime(get_stylesheet_directory() . '/css/ceo-message.css')
        );
    }





















































































































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

function jubha_handle_registration() {
    // Only run if the form was submitted
    if ( isset($_POST['jubha_signup_submit']) ) {
        
        $email      = sanitize_email($_POST['user_email']);
        $password   = $_POST['user_password'];
        $first_name = sanitize_text_field($_POST['first_name']);
        $last_name  = sanitize_text_field($_POST['last_name']);

        if ( email_exists($email) ) {
            wp_die('This email is already registered. <a href="/login">Login here</a>');
        }

        // CREATE THE USER
        $user_id = wp_create_user($email, $password, $email);

        if ( !is_wp_error($user_id) ) {
            wp_update_user([
                'ID'         => $user_id,
                'first_name' => $first_name,
                'last_name'  => $last_name,
            ]);

            // AUTO LOGIN
            wp_set_current_user($user_id);
            wp_set_auth_cookie($user_id);

            // REDIRECT
            wp_redirect(home_url('/profile/')); 
            exit;
        } else {
            wp_die('Error creating user: ' . $user_id->get_error_message());
        }
    }
}
// Using 'init' ensures the redirect happens before the page loads
add_action('init', 'jubha_handle_registration');
// login
function jubha_handle_login() {
    if ( isset($_POST['jubha_login_submit']) ) {
        
        $creds = array(
            'user_login'    => sanitize_text_field($_POST['jubha_user_login']),
            'user_password' => $_POST['jubha_user_pass'],
            'remember'      => true
        );

        $user = wp_signon($creds, false);

        if ( is_wp_error($user) ) {
            // Error handling: You can redirect back with an error message
            wp_die('Invalid username or password. Please try again.');
        } else {
            // SUCCESS! Redirect to the profile page
            wp_redirect( home_url('/profile/') ); 
            exit;
        }
    }
}
add_action('template_redirect', 'jubha_handle_login');

// 1. Create the Menu in the Sidebar
add_action('admin_menu', 'jubha_patient_admin_menu');

function jubha_patient_admin_menu() {
    add_menu_page(
        'Patient Accounts',    // Page Title
        'Patient Accounts',    // Menu Title in Sidebar
        'manage_options',      // Who can see it (Admins)
        'patient-list',        // URL Slug
        'jubha_patient_page_display', // Function that shows the content
        'dashicons-id-alt',    // Icon
        6                      // Position in sidebar
    );
}

// 2. The Content of the Page
function jubha_patient_page_display() {
    ?>
    <div class="wrap">
        <h1 style="color: #1dbbb4;">Jubha Hospital: Registered Patients</h1>
        <p>This is a list of all patients who have created an account on your website.</p>
        
        <table class="wp-list-table widefat fixed striped">
            <thead>
                <tr>
                    <th><b>Name</b></th>
                    <th><b>Email Address</b></th>
                    <th><b>Password Status</b></th>
                    <th><b>Date Registered</b></th>
                </tr>
            </thead>
            <tbody>
                <?php
                $patients = get_users(array('role' => 'subscriber')); // Gets all signed-up users
                foreach ($patients as $user) {
                    echo '<tr>';
                    echo '<td>' . esc_html($user->first_name . ' ' . $user->last_name) . ' ' . '</td>';
                    echo '<td>' . esc_html($user->user_email) . '</td>';
                    echo '<td><span style="color: green;">✔ Encrypted & Secure</span></td>'; // Passwords are hidden for safety
                    echo '<td>' . esc_html($user->user_registered) . '</td>';
                    echo '</tr>';
                }
                ?>
            </tbody>
        </table>
    </div>
    <?php
}