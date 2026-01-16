<?php
/*
plugin Name: Books Apointment
plugin URI: 
Descriptino:  This is not just a plugin, it symbolizes the hope and enthusiasm of an entire generation summed up in two words sung most famously by Louis Armstrong: Hello, Dolly. When activated you will randomly see a lyric from <cite>Hello, Dolly</cite> in the upper right of your admin screen on every page.
Author: jubha-hospital
Version: 1.0.0
Author:
Text Domain: hello-dolly */
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
