
<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/css/page-in-patient.css">
<?php get_header(); ?>

<div class="space-more"></div>


<header class="hero">
    <div class="container">
        <h1>Outpatient</h1>
        <nav class="breadcrumb">
            <a href="#">Patient Information</a> / <span class="active">Outpatient</span>
        </nav>
    </div>
</header>

<div class="page-layout container">

    <aside class="sidebar">
        <h3>Info</h3>
        <ul>
            <li><a href="#" class="tab-link active" data-tab="rooms">Outpatient</a></li>

        </ul>
    </aside>

   <main class="content">
                
    <div class="tab-content active" id="rooms">
        <img src="<?php echo get_template_directory_uri(); ?>/picture/bg-banner3.png" alt="Rooms Banner">
        <h2>Visitor Outpatient</h2>
        <p class="intro-text">
            Outpatient clinics open between the hours of 8:00 am to 10:00 pm
        </p>
        
    </div>

  


</main>

</div>

       

<?php get_footer(); ?>