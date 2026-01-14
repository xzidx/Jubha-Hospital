<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    
<head>
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/style.css">
    <?php wp_head(); ?>
    

</head>
<body <?php body_class(); ?>>


<div class="onheader">
        <div class="onheader-img"><img src="http://jubha-hospital.test/wp-content/uploads/2026/01/jubha-logo.png" alt=""></div>
        <div class="online-call">
            <a href="">
                
            </a>
            <a href="">
                <h2><i class="fa-solid fa-user phone-only"></i></h2>
            </a>
            <a href="<?php echo get_permalink( get_page_by_path('doctor-schedule') ); ?>">
                <h1><i class="fa-solid fa-calendar-days phone-only"></i>Book An Appointment</h1>
            </a>
            
        </div>
</div>
<header class="header">
    
   
    <div class="menu" id="mobile-menu">
        <?php 
        wp_nav_menu([
            'theme_location' => 'primary',
            'menu_class' => 'menu-list',
            'container' => false
        ]); 
        ?>
        <!-- <i class="fa-solid fa-list phone-only" id="menu-toggle"></i> -->
         

    </div>
</header>







 <img src="" alt="">
    <div class="header-img"></div>
    <!-- <h1 class="site-title"><?php bloginfo('name'); ?></h1> -->
    <div class="icon-space"> 
        
    </div>







<main>