<?php
if ( is_user_logged_in() ) {
    wp_redirect( home_url('/profile/') );
    exit;
}
?>
<?php
/*
Template Name: Login Jubha
*/
?>

<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/css/login.css">
<?php get_header(); ?>

<div class="space-more"></div>
<div class="jubha-portal-container">
    <div class="glass-login-card">
        <div class="portal-header">
            <img src="<?php echo get_template_directory_uri(); ?>/picture/jubha-logo.png" alt="Jubha Hospital Logo">
            <h2>Welcome Back</h2>
            <p class="subtitle">Access your health records and appointments</p>
        </div>

        <form class="portal-form" method="POST">
            <div class="form-group">
                <label>PATIENT ID OR EMAIL</label>
                <input type="text" name="jubha_user_login" placeholder="Enter your details" required>
            </div>

            <div class="form-group">
                <label>PASSWORD</label>
                <input type="password" name="jubha_user_pass" placeholder="••••••••" required>
                <a href="<?php echo wp_lostpassword_url(); ?>" class="forgot-link">Forgot?</a>
            </div>

            <button type="submit" name="jubha_login_submit" class="portal-submit">SIGN IN</button>
        </form>

        <div class="form-divider">
            <span>OR CONNECT WITH</span>
        </div>

        <div class="social-login">
            <button class="social-btn google">
                <img src="<?php echo get_template_directory_uri(); ?>/picture/google.png" alt="google">
                Google
            </button>
        </div>

        <p class="signup-footer">New to Jubha Hospital? <a href="/sign-up/">Create Account</a></p>
    </div>
</div>

<?php get_footer(); ?>