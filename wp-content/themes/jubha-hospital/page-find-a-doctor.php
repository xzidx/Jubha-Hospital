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

        <!-- SEARCH FORM START -->
        <form method="GET" class="search-grid">
            <div class="input-wrapper">
                <span class="input-icon"><i class="fa-solid fa-user"></i></span>
                <input 
                    type="text" 
                    name="doctor_name" 
                    placeholder="Doctor's Name" 
                    value="<?php echo esc_attr($_GET['doctor_name'] ?? ''); ?>">
            </div>

            <div class="input-wrapper">
                <input 
                    type="text" 
                    name="doctor_speciality" 
                    placeholder="Speciality" 
                    value="<?php echo esc_attr($_GET['doctor_speciality'] ?? ''); ?>">
            </div>

            <div class="input-wrapper">
                <span class="input-icon"><i class="fa-solid fa-location-dot"></i></span>
                <select name="doctor_location">
                    <option value="">Location</option>
                    <?php 
                    $locations = [
                        "Phnom Penh","Siem Reap","Battambang","Sihanoukville","Kampot","Kep","Takeo",
                        "Kandal","Prey Veng","Svay Rieng","Kratie","Stung Treng","Ratanakiri","Mondulkiri",
                        "Pursat","Koh Kong","Kampong Cham","Kampong Thom","Kampong Chhnang","Oddar Meanchey",
                        "Pailin","Preah Vihear","Tbong Khmum","Banteay Meanchey","Tonle Sap"
                    ];
                    foreach ($locations as $loc) : ?>
                        <option value="<?php echo esc_attr($loc); ?>" <?php selected($_GET['doctor_location'] ?? '', $loc); ?>>
                            <?php echo esc_html($loc); ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <button type="submit" class="search-btn">
                Search <i class="fa-solid fa-magnifying-glass"></i>
            </button>
        </form>
        <!-- SEARCH FORM END -->

    </div>
</main>

<div class="dashboard-wrapper">
    <div class="modern-doctor-grid">
        <?php
        // Build WP_Query with search filters
        $args = [
            'post_type' => 'doctors',
            'posts_per_page' => 12,
        ];

        $meta_query = ['relation' => 'AND'];

        // Filter by doctor name
        if (!empty($_GET['doctor_name'])) {
            $args['s'] = sanitize_text_field($_GET['doctor_name']);
        }

        // Filter by speciality
        if (!empty($_GET['doctor_speciality'])) {
            $meta_query[] = [
                'key' => '_dr_badge', // or '_dr_speciality' if you use a custom field for speciality
                'value' => sanitize_text_field($_GET['doctor_speciality']),
                'compare' => 'LIKE',
            ];
        }

        // Filter by location
        if (!empty($_GET['doctor_location'])) {
            $meta_query[] = [
                'key' => '_dr_address',
                'value' => sanitize_text_field($_GET['doctor_location']),
                'compare' => 'LIKE',
            ];
        }

        if (count($meta_query) > 1) {
            $args['meta_query'] = $meta_query;
        }

        $query = new WP_Query($args);

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
