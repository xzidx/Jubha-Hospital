<?php
/**
 * Plugin Name: Books Appointment - Jubha Hospital
 * Description: Final Version: Secure Booking, Patient Management, and Fixed Admin Columns.
 * Version:     2.2.0
 * Author:      Chan Samnang
 */

if (!defined('ABSPATH')) exit;

// 1. CREATE POST TYPE
add_action('init', 'jubha_setup_system');
function jubha_setup_system() {
    register_post_type('jubha_appointment', array(
        'labels' => array('name' => 'Appointments', 'singular_name' => 'Appointment'),
        'public' => false,
        'show_ui' => true,
        'menu_icon' => 'dashicons-calendar-alt',
        'supports' => array('title'), 
        'menu_position' => 5
    ));
}

// 2. PATIENT ACCOUNTS MENU
add_action('admin_menu', 'jubha_patient_menu');
function jubha_patient_menu() {
    add_menu_page('Patient Accounts', 'Patient Accounts', 'manage_options', 'patient-list', 'jubha_render_patient_list', 'dashicons-id-alt', 6);
}

function jubha_render_patient_list() {
    ?>
    <div class="wrap">
        <h1 style="color: #1dbbb4;">Jubha Hospital: Registered Patients</h1>
        <table class="wp-list-table widefat fixed striped">
            <thead>
                <tr><th>Full Name</th><th>Email</th><th>Phone Number</th><th>Patient ID</th></tr>
            </thead>
            <tbody>
                <?php
                $patients = get_users(array('role' => 'subscriber'));
                foreach ($patients as $user) {
                    $fname = get_user_meta($user->ID, 'first_name', true);
                    $lname = get_user_meta($user->ID, 'last_name', true);
                    $phone = get_user_meta($user->ID, 'phone_number', true);
                    echo "<tr>
                            <td><strong>" . esc_html($fname . ' ' . $lname) . "</strong></td>
                            <td>" . esc_html($user->user_email) . "</td>
                            <td>" . esc_html($phone) . "</td>
                            <td>JH-" . esc_html($user->ID) . "</td>
                          </tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
    <?php
}

// 3. SECURE SAVE APPOINTMENT LOGIC
add_action('template_redirect', 'jubha_handle_appointment_save');
function jubha_handle_appointment_save() {
    if (isset($_POST['submit_booking'])) {
        
        // SECURITY: Stop guest users from saving to database
        if (!is_user_logged_in()) {
            wp_die('Error: You must be logged in to book an appointment.');
        }

        $user = wp_get_current_user();
        
        // Update user phone number in profile
        if (!empty($_POST['phone_number'])) {
            update_user_meta($user->ID, 'phone_number', sanitize_text_field($_POST['phone_number']));
        }

        // Get Names for Admin Columns
        $fname = get_user_meta($user->ID, 'first_name', true);
        $lname = get_user_meta($user->ID, 'last_name', true);
        $patient_display_name = trim($fname . ' ' . $lname);
        if (empty($patient_display_name)) $patient_display_name = $user->display_name;

        $doc_id = intval($_POST['selected_doctor']);
        $doc_name = get_the_title($doc_id);

        // CREATE POST (Main title is Gmail/Email as requested)
        $appt_id = wp_insert_post(array(
            'post_type'   => 'jubha_appointment',
            'post_title'  => $user->user_email, 
            'post_status' => 'publish',
        ));

        if ($appt_id) {
            update_post_meta($appt_id, '_patient_id', $user->ID);
            update_post_meta($appt_id, '_patient_name_col', $patient_display_name);
            update_post_meta($appt_id, '_doctor_name_col', $doc_name);
            update_post_meta($appt_id, '_appt_date', sanitize_text_field($_POST['appointment_date']));
            update_post_meta($appt_id, '_appt_time', sanitize_text_field($_POST['appointment_time']));
            update_post_meta($appt_id, '_dept', sanitize_text_field($_POST['department']));
            update_post_meta($appt_id, '_reason', sanitize_textarea_field($_POST['visit_reason']));
            
            wp_redirect(home_url('/profile/?booking=success'));
            exit;
        }
    }
}

// 4. ADMIN UI: DEFINE COLUMNS
add_filter('manage_jubha_appointment_posts_columns', 'jubha_set_appointment_columns');
function jubha_set_appointment_columns($columns) {
    return array(
        'cb'            => '<input type="checkbox" />',
        'title'         => 'Email (ID)',
        'patient_name'  => 'Patient Name',
        'doctor_name'   => 'Doctor Name',
        'patient_phone' => 'Patient Phone',
        'schedule'      => 'Date & Time',
        'dept'          => 'Department',
        'visit_reason'  => 'Reason'
    );
}

// 5. ADMIN UI: FILL DATA (Fixes empty columns in your image)
add_action('manage_jubha_appointment_posts_custom_column', 'jubha_fill_appointment_columns', 10, 2);
function jubha_fill_appointment_columns($column, $post_id) {
    switch ($column) {
        case 'patient_name':
            echo '<strong>' . esc_html(get_post_meta($post_id, '_patient_name_col', true)) . '</strong>';
            break;
        case 'doctor_name':
            echo '<span style="color: #1dbbb4; font-weight:600;">Dr. ' . esc_html(get_post_meta($post_id, '_doctor_name_col', true)) . '</span>';
            break;
        case 'patient_phone':
            $p_id = get_post_meta($post_id, '_patient_id', true);
            echo esc_html(get_user_meta($p_id, 'phone_number', true));
            break;
        case 'schedule':
            echo esc_html(get_post_meta($post_id, '_appt_date', true)) . "<br><small>" . esc_html(get_post_meta($post_id, '_appt_time', true)) . "</small>";
            break;
        case 'dept':
            echo ucfirst(esc_html(get_post_meta($post_id, '_dept', true)));
            break;
        case 'visit_reason':
            echo '<span style="font-size:12px; color: #666;">' . esc_html(get_post_meta($post_id, '_reason', true)) . '</span>';
            break;
    }
}