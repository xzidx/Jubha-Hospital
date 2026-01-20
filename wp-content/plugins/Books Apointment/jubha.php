<?php
/*
plugin Name: Books Apointment
plugin URI: 
Descriptino:  This is not just a plugin, it symbolizes the hope and enthusiasm of an entire generation summed up in two words sung most famously by Louis Armstrong: Hello, Dolly. When activated you will randomly see a lyric from <cite>Hello, Dolly</cite> in the upper right of your admin screen on every page.
Author: jubha-hospital
Version: 1.0.0
Author:
Text Domain: hello-dolly */


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
