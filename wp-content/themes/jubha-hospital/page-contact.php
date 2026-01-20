<?php get_header(); ?>
<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/css/contact.css">
<div class="space-more"></div>


<div class="contact-form">
    <h1>Contact</h1>
    <p>At Almana Hospitals we value our clients’ opinions and feedback. We are constantly looking for ways to improve our services and support your needs.</p>
        <div class="form-row">
            <input type="text" placeholder="Tyep Of Request">
            <input type="text" placeholder="Subject">
        </div>

        <div class="form-row">
            <input type="text" placeholder="Name">
            <input type="email" placeholder="Email Address ">
        </div>

        <div class="form-row">
            <input type="text" placeholder="Phone Number ">
            <input type="text" placeholder="Location">
        </div>

        <textarea placeholder="Your Message"></textarea>

        <div class="form-footer">
            <button type="submit">SUBMIT →</button>
        </div>
</div>

<?php get_footer(); ?>
