<?php
if ( is_user_logged_in() ) {
    wp_redirect( home_url('/profile/') );
    exit;
}
?>
<?php
/*
Template Name: Sign Up Jubha
*/
?>

<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/css/signup.css">
<?php get_header(); ?>

<div class="space-more"></div>
<div class="jubha-portal-container">
    <div class="glass-login-card">
        <div class="portal-header">
            <img src="<?php echo get_template_directory_uri(); ?>/picture/jubha-logo.png" alt="Jubha Hospital Logo">
            <h2>Create Account</h2>
            <p class="subtitle">Join the Jubha Hospital patient community</p>
        </div>

        <form class="portal-form" method="POST">
            <div class="form-row">
                <div class="form-group">
                    <label>FIRST NAME</label>
                    <input type="text" name="first_name" placeholder="John" required>
                </div>
                <div class="form-group">
                    <label>LAST NAME</label>
                    <input type="text" name="last_name" placeholder="Doe" required>
                </div>
            </div>

            <div class="form-group">
                <label>EMAIL ADDRESS</label>
                <input type="email" name="user_email" placeholder="name@email.com" required>
            </div>

            <div class="form-group">
                <label>PHONE NUMBER</label>
                <input type="tel" name="phone_number" placeholder="+966 --- --- ---" required>
            </div>

            <div class="form-group">
                <label>CREATE PASSWORD</label>
                <input type="password" name="user_password" placeholder="••••••••" required>
            </div>

            <div class="terms-check">
                <input type="checkbox" id="terms" required>
                <label for="terms">I agree to the <a href="#">Terms & Privacy</a></label>
            </div>

            <button type="submit" name="jubha_signup_submit" class="portal-submit">CREATE ACCOUNT</button>
        </form>

        <p class="signup-footer">Already have an account? <a href="/login/">Sign In</a></p>
    </div>
</div>

<?php get_footer(); ?>