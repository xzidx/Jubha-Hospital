
<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/css/page-in-patient.css">
<?php get_header(); ?>

<div class="space-more"></div>


<header class="hero">
    <div class="container">
        <h1>Visitor Information</h1>
        <nav class="breadcrumb">
            <a href="#">Patient Information</a> / <span class="active">Visitor Information</span>
        </nav>
    </div>
</header>

<div class="page-layout container">

    <aside class="sidebar">
        <h3>Visitor Information</h3>
        <ul>
            <li><a href="#" class="tab-link active" data-tab="rooms">Information</a></li>

        </ul>
    </aside>

   <main class="content">
                
    <div class="tab-content active" id="rooms">
        <img src="<?php echo get_template_directory_uri(); ?>/picture/bg-banner3.png" alt="Rooms Banner">
        <h2>Visitor Information</h2>
        <p class="intro-text">
            At Jubha Hospitals we are committed to provide quality care at the highest levels.
        </p>
        <p>
            - From 7 am to 10 pm daily in coordination with the patient’s care team.
        </p>
        <p>
            - Children under the age of 14 must be accompanied by an adult.
        </p>
        <p>
            - All visitors must follow the hospital visitation guidelines.
        </p>
        
    </div>

  


</main>

</div>

        

<?php get_footer(); ?>