<?php
function daa_create_tables() {
    global $wpdb;
    $charset = $wpdb->get_charset_collate();

    dbDelta("CREATE TABLE {$wpdb->prefix}daa_doctors (
        id INT AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(100),
        specialty VARCHAR(100)
    ) $charset;");

    dbDelta("CREATE TABLE {$wpdb->prefix}daa_patients (
        id INT AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(100),
        phone VARCHAR(50)
    ) $charset;");

    dbDelta("CREATE TABLE {$wpdb->prefix}daa_appointments (
        id INT AUTO_INCREMENT PRIMARY KEY,
        doctor_id INT,
        patient_id INT,
        appointment_date DATETIME
    ) $charset;");
}