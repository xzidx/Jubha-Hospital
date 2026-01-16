<?php
/**
 * Plugin Name: Books Apointment
 * Plugin URI:  
 * Description: This plugin make for hospital that make the user and docotor more easy about the meeting.this is a book apointment plugin that help doctor in our hospital.
 * Version:     1.0.0
 * Author:      Chan Samnang
 * Author URI:  
 * License:     ISO 9001
 * Text Domain: Lucky-World
 */

add_action('admin_menu', function() {

    // Top-level menu "Appointment Form" -> redirect to Doctor form
    add_menu_page(
        'Appointment Form',
        'Appointment Form',
        'manage_options',
        'clinic-dashboard',
        function() {
            $first_submenu = admin_url('admin.php?page=doctor-form');
            echo "<script>location.href='$first_submenu';</script>";
        },
        'dashicons-book',
        6
    );

    // Doctor form submenu
    add_submenu_page(
        'clinic-dashboard',
        'Doctor Form',
        'Doctor',
        'manage_options',
        'doctor-form',
        'render_doctor_form'
    );

    // Patient form submenu
    add_submenu_page(
        'clinic-dashboard',
        'Patient Form',
        'Patient',
        'manage_options',
        'patient-form',
        'render_patient_form'
    );

    // Appointments database submenu (read-only)
    add_submenu_page(
        'clinic-dashboard',
        'Appointments Database',
        'Appointments',
        'manage_options',
        'service-form',
        'render_service_form'
    );

    // Remove duplicate top-level submenu
    remove_submenu_page('clinic-dashboard', 'clinic-dashboard');
});

// ------------------------
// 2️⃣ Doctor Form
// ------------------------
function render_doctor_form() {
    ?>
    <h1>Doctor Form</h1>
    <form method="post">
        <p><label>Name:</label><br>
        <input type="text" name="doctor_name" required></p>

        <p><label>Specialty:</label><br>
        <input type="text" name="doctor_specialty"></p>

        <p><label>Phone:</label><br>
        <input type="text" name="doctor_phone"></p>

        <p><input type="submit" name="submit_doctor" value="Save"></p>
    </form>
    <?php
    if (isset($_POST['submit_doctor'])) {
        $name = sanitize_text_field($_POST['doctor_name']);
        $specialty = sanitize_text_field($_POST['doctor_specialty']);
        $phone = sanitize_text_field($_POST['doctor_phone']);

        $post_id = wp_insert_post([
            'post_title'  => $name,
            'post_type'   => 'doctor',
            'post_status' => 'publish',
            'meta_input'  => [
                '_doctor_specialty' => $specialty,
                '_doctor_phone' => $phone,
            ],
        ]);

        if ($post_id) {
            echo '<p style="color:green;">Doctor saved successfully!</p>';
        }
    }
}

// ------------------------
// 3️⃣ Patient Form (auto-create appointment)
// ------------------------
function render_patient_form() {
    ?>
    <h1>Patient Form</h1>
    <form method="post">
        <p><label>Name:</label><br>
        <input type="text" name="patient_name" required></p>

        <p><label>Phone:</label><br>
        <input type="text" name="patient_phone"></p>

        <p><label>Email:</label><br>
        <input type="email" name="patient_email"></p>

        <p><label>Notes:</label><br>
        <textarea name="patient_notes"></textarea></p>

        <p><input type="submit" name="submit_patient" value="Save"></p>
    </form>
    <?php

    if (isset($_POST['submit_patient'])) {
        $name = sanitize_text_field($_POST['patient_name']);
        $phone = sanitize_text_field($_POST['patient_phone']);
        $email = sanitize_email($_POST['patient_email']);
        $notes = sanitize_textarea_field($_POST['patient_notes']);

        // 1️⃣ Save patient
        $patient_id = wp_insert_post([
            'post_title'  => $name,
            'post_type'   => 'patient',
            'post_status' => 'publish',
            'meta_input'  => [
                '_patient_phone' => $phone,
                '_patient_email' => $email,
                '_patient_notes' => $notes,
            ],
        ]);

        if ($patient_id) {
            echo '<p style="color:green;">Patient saved successfully!</p>';

            // 2️⃣ Automatically create an appointment in Service CPT (database)
            wp_insert_post([
                'post_title'  => 'Appointment: ' . $name,
                'post_type'   => 'service',
                'post_status' => 'publish',
                'meta_input'  => [
                    '_appointment_patient' => $patient_id,
                    '_appointment_doctor' => '',          // leave empty for now
                    '_appointment_datetime' => '',        // leave empty for now
                    '_appointment_description' => $notes, // store patient notes
                ],
            ]);
        }
    }
}

// ------------------------
// 4️⃣ Appointments Database (read-only)
// ------------------------
function render_service_form() {
    echo '<h1>Appointments Database</h1>';

    $appointments = get_posts([
        'post_type' => 'service',
        'posts_per_page' => -1,
        'orderby' => 'date',
        'order' => 'DESC',
    ]);

    if (empty($appointments)) {
        echo '<p>No appointments yet.</p>';
        return;
    }

    echo '<table class="widefat striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Patient</th>
                <th>Doctor</th>
                <th>Date/Time</th>
                <th>Notes</th>
            </tr>
        </thead>
        <tbody>';

    foreach ($appointments as $appt) {
        $patient = get_post_meta($appt->ID, '_appointment_patient', true);
        $doctor = get_post_meta($appt->ID, '_appointment_doctor', true);
        $datetime = get_post_meta($appt->ID, '_appointment_datetime', true);
        $notes = get_post_meta($appt->ID, '_appointment_description', true);

        echo '<tr>
            <td>' . $appt->ID . '</td>
            <td>' . ($patient ? get_the_title($patient) : '-') . '</td>
            <td>' . ($doctor ? get_the_title($doctor) : '-') . '</td>
            <td>' . esc_html($datetime) . '</td>
            <td>' . esc_html($notes) . '</td>
        </tr>';
    }

    echo '</tbody></table>';
}

// ------------------------
// 5️⃣ Register Custom Post Types
// ------------------------
add_action('init', function() {
    // Doctor CPT
    register_post_type('doctor', [
        'labels' => [
            'name' => 'Doctors',
            'singular_name' => 'Doctor',
        ],
        'public' => true,
        'show_ui' => false,
        'has_archive' => true,
    ]);

    // Patient CPT
    register_post_type('patient', [
        'labels' => [
            'name' => 'Patients',
            'singular_name' => 'Patient',
        ],
        'public' => true,
        'show_ui' => false,
        'has_archive' => true,
    ]);

    // Service / Appointment CPT (database)
    register_post_type('service', [
        'labels' => [
            'name' => 'Appointments',
            'singular_name' => 'Appointment',
        ],
        'public' => true,
        'show_ui' => false, // hide editor, read-only
        'has_archive' => true,
    ]);
});

// Optional: style table
add_action('admin_head', function() {
    echo '<style>
        .widefat th, .widefat td { padding: 8px; }
        .widefat th { text-align: left; }
    </style>';
});