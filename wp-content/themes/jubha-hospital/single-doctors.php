<?php get_header(); ?>
<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/css/single-doctors.css">

<div class="more-space"></div>

<?php while (have_posts()) : the_post(); 
    // Pull all meta fields
    $address        = get_post_meta(get_the_ID(), '_dr_address', true);
    $badge          = get_post_meta(get_the_ID(), '_dr_badge', true);
    $rating         = get_post_meta(get_the_ID(), '_dr_rating', true);
    $bio            = get_post_meta(get_the_ID(), '_dr_bio', true);
    $education      = get_post_meta(get_the_ID(), '_dr_education', true);
    $treatments     = get_post_meta(get_the_ID(), '_dr_treatments', true);
    $certifications = get_post_meta(get_the_ID(), '_dr_certifications', true);
    $services       = get_post_meta(get_the_ID(), '_dr_services', true);
    $img_url        = get_the_post_thumbnail_url(get_the_ID(), 'full');
?>

<main class="dr-profile-wrapper">

    <section class="dr-header-card">
        <div class="dr-image-side">
            <?php if ($img_url): ?>
                <img src="<?php echo esc_url($img_url); ?>" alt="<?php the_title(); ?>">
            <?php else: ?>
                <div class="placeholder-img"></div>
            <?php endif; ?>
        </div>

        <div class="dr-content-side">
            <div class="dr-title-group">
                <p class="dr-prefix">Specialist</p>
                <h1 class="dr-name"><?php the_title(); ?></h1>
                <p class="dr-specialty-label"><?php echo esc_html($badge); ?></p>
                <?php if ($rating): ?>
                    <p class="dr-rating">★ <?php echo esc_html($rating); ?></p>
                <?php endif; ?>
            </div>

            <div class="dr-meta-grid">
                <?php if ($badge): ?>
                <div class="meta-item">
                    <span class="meta-label">Speciality Area</span>
                    <span class="meta-value"><?php echo esc_html($badge); ?></span>
                </div>
                <?php endif; ?>

                <?php if ($address): ?>
                <div class="meta-item">
                    <span class="meta-label">Locations</span>
                    <span class="meta-value"><?php echo esc_html($address); ?></span>
                </div>
                <?php endif; ?>

                <?php if ($certifications): ?>
                <div class="meta-item">
                    <span class="meta-label">Qualifications / Certification</span>
                    <span class="meta-value"><?php echo esc_html($certifications); ?></span>
                </div>
                <?php endif; ?>
            </div>

            <a href="<?php echo home_url('/book-appointment/?doc_id=' . get_the_ID()); ?>" class="dr-book-btn">
                <i class="fa-regular fa-calendar-days"></i> BOOK AN APPOINTMENT
            </a>
        </div>
    </section>

    <section class="dr-details-container">

        <?php if ($bio): ?>
        <div class="dr-info-section">
            <h3 class="section-title">About</h3>
            <div class="dr-bio-text">
                <?php echo wpautop(esc_html($bio)); ?>
            </div>
        </div>
        <?php endif; ?>

        <?php if ($education): ?>
        <div class="dr-info-section">
            <h3 class="section-title">Qualifications</h3>
            <div class="list-content">
                <?php echo wpautop(esc_html($education)); ?>
            </div>
        </div>
        <?php endif; ?>

        <?php if ($treatments): ?>
        <div class="dr-info-section">
            <h3 class="section-title">Diagnosis & Treatment</h3>
            <div class="list-content treatment-list">
                <?php echo wpautop(esc_html($treatments)); ?>
            </div>
        </div>
        <?php endif; ?>

        <?php if ($services): ?>
        <div class="dr-info-section">
            <h3 class="section-title">Services Offered</h3>
            <div class="list-content">
                <?php echo wpautop(esc_html($services)); ?>
            </div>
        </div>
        <?php endif; ?>

        <div class="dr-footer">
            <a href="<?php echo home_url('/find-a-doctor'); ?>" class="back-link">
                <i class="fa-solid fa-arrow-left"></i> BACK TO ALL DOCTORS
            </a>
        </div>
    </section>

</main>

<?php endwhile; ?>
<?php get_footer(); ?>