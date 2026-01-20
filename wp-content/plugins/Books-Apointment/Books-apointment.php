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
    add_menu_page(
        'Clinic Dashboard', // Page title (optional)
        'Book Apointment',           // Menu title
        'manage_options',   // Capability
        'clinic-dashboard', // Menu slug
        '',                 // Callback (optional)
        'dashicons-book', // Icon
        6
    );
});

add_action('init', function() {
    register_post_type('doctor', array(
        'labels' => array(
            'name' => 'Doctors',
            'singular_name' => 'Doctor',
        ),
        'public' => true,
        'menu_icon' => 'dashicons-book',
        'supports' => array('title', 'editor', 'thumbnail'),
        'has_archive' => true,
        'show_in_menu' => 'clinic-dashboard', // Submenu under Clinic
    ));
});

add_action('init', function() {
    register_post_type('patient', array(
        'labels' => array(
            'name' => 'Patients',
            'singular_name' => 'Patient',
        ),
        'public' => true,
        'menu_icon' => 'dashicons-groups',
        'supports' => array('title', 'editor', 'thumbnail'),
        'has_archive' => true,
        'show_in_menu' => 'clinic-dashboard',
    ));
});


add_action('init', function() {
    register_post_type('service', array(
        'labels' => array(
            'name' => 'Apointment',
            'singular_name' => 'Service',
        ),
        'public' => true,
        'menu_icon' => 'dashicons-hammer',
        'supports' => array('title', 'editor', 'thumbnail'),
        'has_archive' => true,
        'show_in_menu' => 'clinic-dashboard',
    ));
});
