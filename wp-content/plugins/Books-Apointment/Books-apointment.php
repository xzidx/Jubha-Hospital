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

add_action('init', 'register_doctor_post_type');

function register_doctor_post_type() {
    register_post_type('doctor', array(
        'labels' => array(
            'name' => 'Book Apointment',
            'singular_name' => 'Doctor',
        ),
        'public' => true,
        'menu_icon' => 'dashicons-book',
        'supports' => array('title', 'editor', 'thumbnail'),
        'has_archive' => true,
    )); 
}
