<?php
/**
 * Template Name: Jubha Booking Page
 */

// SECURITY GATEKEEPER: Redirect to login if not authenticated
if (!is_user_logged_in()) {
    wp_redirect(home_url('/sign-up/')); // Change this to your login page slug
    exit;
}

get_header(); 

$preselected_doc = isset($_GET['doc_id']) ? intval($_GET['doc_id']) : 0;
$current_user = wp_get_current_user();
$saved_phone = get_user_meta($current_user->ID, 'phone_number', true);
?>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/choices.js/public/assets/styles/choices.min.css" />
<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/css/book-appointment.css">

<div class="jubha-booking-wrapper">
    <div class="booking-card">
        
        <header class="booking-header">
            <div class="hospital-brand">
                <span class="brand-icon">J</span> 
                <h2>Jubha <span>Hospital</span></h2>
            </div>
            <h1 class="main-title">Book an Appointment</h1>
            <p class="subtitle">Hello, <?php echo esc_html($current_user->display_name); ?>. Please provide details below.</p>
        </header>

        <form method="POST" class="booking-form">
            
            <div class="form-section">
                <label class="section-label"><span class="step-circle">1</span> Choose Department</label>
                <div class="dept-grid">
                    <label class="dept-item">
                        <input type="radio" name="department" value="cardiology" required>
                        <div class="dept-inner"><span class="icon">🫀</span><span class="text">Cardiology</span></div>
                    </label>
                    <label class="dept-item">
                        <input type="radio" name="department" value="dentistry">
                        <div class="dept-inner"><span class="icon">🦷</span><span class="text">Dentistry</span></div>
                    </label>
                    <label class="dept-item">
                        <input type="radio" name="department" value="pediatrics">
                        <div class="dept-inner"><span class="icon">👶</span><span class="text">Pediatrics</span></div>
                    </label>
                </div>
            </div>

            <div class="input-row">
                <div class="input-group">
                    <label class="section-label">Select Date</label>
                    <input type="date" name="appointment_date" required>
                </div>
                <div class="input-group">
                    <label class="section-label">Select Time</label>
                    <select name="appointment_time" required>
                        <option value="09:00">09:00 AM</option>
                        <option value="14:00">02:00 PM</option>
                    </select>
                </div>
            </div>

            <div class="form-section">
                <label class="section-label"><span class="step-circle">2</span> Patient Information</label>
                <div class="input-row">
                    <div class="input-group">
                        <label class="field-label">Phone Number</label>
                        <div class="phone-wrapper">
                            <span class="flag-icon">🇰🇭 +855</span>
                            <input type="tel" name="phone_number" value="<?php echo esc_attr($saved_phone); ?>" placeholder="12 345 678" style="flex:1; border:none; outline:none; padding-left:10px; height: 100%;" required>
                        </div>
                    </div>
                    <div class="input-group">
                        <label class="field-label">Search & Select Doctor</label>
                        <select id="doctor-search-select" name="selected_doctor" required>
                            <option value="">Choose a doctor...</option>
                            <?php 
                            $doctors = get_posts(['post_type' => 'doctors', 'numberposts' => -1, 'post_status' => 'publish']);
                            foreach($doctors as $doc): ?>
                                <option value="<?php echo $doc->ID; ?>" <?php selected($doc->ID, $preselected_doc); ?>>
                                    <?php echo $doc->post_title; ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
            </div>

            <div class="form-section">
                <label class="section-label">Reason for Visit / Symptoms</label>
                <textarea name="visit_reason" rows="3" placeholder="Describe what you are feeling..." required></textarea>
            </div>

            <button type="submit" name="submit_booking" class="confirm-btn">CONFIRM APPOINTMENT</button>
        </form>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/choices.js/public/assets/scripts/choices.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        new Choices(document.getElementById('doctor-search-select'), {
            searchEnabled: true,
            itemSelectText: '',
            placeholderValue: 'Search for a doctor...',
        });
    });
</script>

<?php get_footer(); ?>