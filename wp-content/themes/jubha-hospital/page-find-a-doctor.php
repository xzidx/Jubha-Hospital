<?php get_header(); ?>

<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/css/page-find-a-doctor.css">

<div class="more-space"></div>

<main class="hero-container">
    <h1 class="main-title">Find Your Specialist</h1>

    <div class="floating-card">
        <h2>Find A Doctor</h2>

        <p class="card-description">
            At Almana Hospitals, we’ve proudly served our patients for over 75 years.
            Explore our network of over 900 doctors to find the best care for your needs.
        </p>

        <div class="search-grid">
            <div class="input-wrapper">
                <span class="input-icon"><i class="fa-solid fa-user"></i></span>
                <input type="text" placeholder="Doctor's Name">
            </div>

            <div class="input-wrapper">
                <input type="text" placeholder="Speciality">
            </div>

            <div class="input-wrapper">
                <span class="input-icon"><i class="fa-solid fa-location-dot"></i></span>
                <select>
                    <option>Location</option>
                    <option>Phnom Penh</option>
                    <option>Siem Reap</option>
                    <option>Battambang</option>
                    <option>Sihanoukville</option>
                    <option>Kampot</option>
                    <option>Kep</option>
                    <option>Takeo</option>
                    <option>Kandal</option>
                    <option>Prey Veng</option>
                    <option>Svay Rieng</option>
                    <option>Kratie</option>
                    <option>Stung Treng</option>
                    <option>Ratanakiri</option>
                    <option>Mondulkiri</option>
                    <option>Pursat</option>
                    <option>Koh Kong</option>
                    <option>Kampong Cham</option>
                    <option>Kampong Thom</option>
                    <option>Kampong Chhnang</option>
                    <option>Oddar Meanchey</option>
                    <option>Pailin</option>
                    <option>Preah Vihear</option>
                    <option>Tbong Khmum</option>
                    <option>Banteay Meanchey</option>
                    <option>Tonle Sap</option>
                </select>
            </div>

            <div class="input-wrapper">
                <span class="input-icon"><i class="fa-solid fa-caret-down"></i></span>
                <select>
                    <option>Speciality</option>
                </select>
            </div>

            <button class="search-btn">
                Search <i class="fa-solid fa-magnifying-glass"></i>
            </button>
        </div>
    </div>
</main>

<div class="dashboard-wrapper">
    <div class="modern-doctor-grid">
        <?php
        $query = new WP_Query(array(
            'post_type' => 'doctors',
            'posts_per_page' => 12
        ));

        if ($query->have_posts()) :
            while ($query->have_posts()) : $query->the_post();

                $address = get_post_meta(get_the_ID(), '_dr_address', true);
                $badge   = get_post_meta(get_the_ID(), '_dr_badge', true);
                $img_url = get_the_post_thumbnail_url(get_the_ID(), 'large');
        ?>

        <div class="dr-card"
            onclick="openDoctorModal(
                '<?php echo esc_js(get_the_title()); ?>',
                '<?php echo esc_js($badge); ?>',
                '<?php echo esc_js($address); ?>',
                '<?php echo esc_url($img_url); ?>',
                '<?php echo esc_url(get_permalink()); ?>'
            )">

            <span class="dr-rating"></span>

            <div class="dr-image-circle">
                <?php the_post_thumbnail('medium'); ?>
            </div>

            <div class="dr-info">
                <h3 class="dr-name"><?php the_title(); ?></h3>
                <p class="dr-meta"><?php echo esc_html($address); ?></p>
                <span class="dr-badge"><?php echo esc_html($badge); ?></span>
            </div>
        </div>

        <?php endwhile; wp_reset_postdata(); endif; ?>
    </div>
</div>

<!-- Modal -->
<div id="doctorModal" class="dr-modal-overlay" onclick="closeDoctorModal(event)">
    <div class="dr-modal-content">
        <span class="close-modal"
              onclick="document.getElementById('doctorModal').style.display='none'">&times;</span>

        <div class="modal-body">
            <div class="modal-image">
                <img id="modalImg" src="" alt="Doctor">
            </div>

            <div class="modal-text">
                <h2 id="modalName"></h2>

                <p class="modal-label">Speciality Area</p>
                <p id="modalBadge" class="modal-value"></p>

                <p class="modal-label">Locations</p>
                <p id="modalAddress" class="modal-value"></p>

                <div class="modal-actions">
                    <button class="btn-book">
                        <i class="fa-regular fa-calendar-days"></i>
                        BOOK AN APPOINTMENT
                    </button>

                    <a href="#" id="modalProfileLink" class="btn-view">
                        VIEW PROFILE
                        <i class="fa-solid fa-user-doctor doctor-icon"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
function openDoctorModal(name, badge, address, img, link) {
    document.getElementById('modalName').innerText = name;
    document.getElementById('modalBadge').innerText = badge;
    document.getElementById('modalAddress').innerText = address;
    document.getElementById('modalImg').src = img;

    // Set the VIEW PROFILE link to the correct doctor page
    document.getElementById('modalProfileLink').href = link;

    document.getElementById('doctorModal').style.display = 'flex';
}

function closeDoctorModal(e) {
    if (e.target.id === 'doctorModal') {
        document.getElementById('doctorModal').style.display = 'none';
    }
}
</script>

<?php get_footer(); ?>
