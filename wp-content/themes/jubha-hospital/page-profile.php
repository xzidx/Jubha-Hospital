<?php
/*
Template Name: Profile Page Jubha
*/

// Protect the page: Redirect to login if user is not logged in
if ( !is_user_logged_in() ) {
    wp_redirect( home_url('/login/') ); // Change this to your actual login page slug
    exit;
}

// Get the current logged-in user's data
$current_user = wp_get_current_user();
$first_name   = $current_user->first_name;
$last_name    = $current_user->last_name;
$user_email   = $current_user->user_email;

// Get custom data we saved during signup (Phone Number)
$phone_number = get_user_meta($current_user->ID, 'phone_number', true);
$patient_id   = 'JH-' . $current_user->ID; // Generates a unique ID based on User ID
?>

<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/css/profile.css">
<?php get_header(); ?>

<div class="space-more"></div>
<div class="jubha-dashboard-container">
    <aside class="sidebar">
        <div class="sidebar-logo">Jubha</div>
        <nav>
            <a href="#" class="active">Overview</a>
            <a href="#">Appointments</a>
            <a href="#">Medical Records</a>
            <a href="#">Messages</a>
            <a href="#">Settings</a>
        </nav>
        <div class="sidebar-footer">
            <a href="<?php echo wp_logout_url( home_url() ); ?>">Logout</a>
        </div>
    </aside>

    <main class="dashboard-content">
        <header class="content-header">
            <div class="user-welcome">
                <h1>Hello, <?php echo esc_html($first_name); ?></h1>
                <p>Welcome to your Jubha health dashboard.</p>
            </div>
            <div class="user-avatar">
                <img src="https://ui-avatars.com/api/?name=<?php echo urlencode($first_name . ' ' . $last_name); ?>&background=1dbbb4&color=fff" alt="User Profile">
            </div>
        </header>

        <div class="stats-grid">
            <div class="stat-card">
                <span class="stat-icon"><i class="fa-solid fa-calendar"></i></span>
                <div class="stat-info">
                    <h3>Next Appointment</h3>
                    <p>No upcoming visits</p> 
                </div>
            </div>
            <div class="stat-card">
                <span class="stat-icon"><i class="fa-solid fa-envelope"></i></span>
                <div class="stat-info">
                    <h3>Email Address</h3>
                    <p><?php echo esc_html($user_email); ?></p>
                </div>
            </div>
            <div class="stat-card">
                <span class="stat-icon"><i class="fa-solid fa-capsules"></i></span>
                <div class="stat-info">
                    <h3>Prescriptions</h3>
                    <p>0 Active medications</p>
                </div>
            </div>
        </div>

        <section class="profile-details-card">
            <h2>Patient Information</h2>
            <div class="details-grid">
                <div class="detail-item"><strong>Patient ID:</strong> #<?php echo esc_html($patient_id); ?></div>
                <div class="detail-item"><strong>Full Name:</strong> <?php echo esc_html($first_name . ' ' . $last_name); ?></div>
                <div class="detail-item"><strong>Phone:</strong> <?php echo esc_html($phone_number ? $phone_number : 'Not Provided'); ?></div>
                <div class="detail-item"><strong>Status:</strong> Active Patient</div>
            </div>
            <button class="edit-profile-btn">Edit Profile</button>
        </section>
    </main>
</div>

<?php get_footer(); ?>