<?php get_header(); ?>
        <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/css/front-page.css">
        <body>
            <div class="more-space"></div>
        
        <div class="hero-container">
                <div class="slideshow">
                    <div class="slide" style="background-image: url('<?php echo get_template_directory_uri(); ?>/picture/bg-banner1.png');"></div>
                    <div class="slide" style="background-image: url('<?php echo get_template_directory_uri(); ?>/picture/bg-banner3.png');"></div>
                    <div class="slide" style="background-image: url('<?php echo get_template_directory_uri(); ?>/picture/bg-banner4.jpg');"></div>
                    <div class="slide" style="background-image: url('<?php echo get_template_directory_uri(); ?>/picture/bg-banner1.png');"></div>
                </div>

                <div class="hero-text">
                    <h1>Medical care rooted in empathy.</h1>
                    <p>
                This approach to medicine prioritizes the human connection alongside clinical expertise. It means that a healthcare provider doesn’t just treat a diagnosis; they recognize the person behind the symptoms.</p>
                <div class="online-call-1">
    
                    <a href="<?php echo get_permalink( get_page_by_path('doctor-schedule') ); ?>">
                        <h1></i>Book An Appointment</h1>
                    </a>
            
        </div>
                </div>
        </div>

        <section class="about-section">
        <div class="about-content">
            <div class="about-text-column">
                <span class="sub-heading">About Us</span>
                <h2 class="main-title">Seven decades of care and quality</h2>
                <p class="description">
                    Since our inception in 1949, we have a legacy of excellence. We are a family hospital fully dedicated to caring for the needs of the patients, communities, and Kingdom we serve to keep healthy. Almana believes in offering compassionate care, inspired by family values.
                </p>
                <a href="#" class="learn-more-btn">Read More</a>
            </div>

            <div class="about-visual-column">
                <div class="image-card">
                    <img src="<?php echo get_template_directory_uri(); ?>/picture/bg-banner3.png"
                                alt="Almana Healthcare Team"
                                class="main-img">                         
                   
                </div>
            </div>
        </div>

        <hr class="section-divider">

        <div class="stats-container">
            <div class="stat-box">
                <h3 class="stat-number">6,500</h3>
                <p class="stat-text">Qualified Workforce</p>
            </div>
            <div class="stat-box">
                <h3 class="stat-number">800</h3>
                <p class="stat-text">Specialized Doctors</p>
            </div>
            <div class="stat-box">
                <h3 class="stat-number">8</h3>
                <p class="stat-text">Medical Facilities</p>
            </div>
            <div class="stat-box">
                <h3 class="stat-number">1,300</h3>
                <p class="stat-text">Total Beds</p>
            </div>
        </div>
    </section>

    <section class="hospital-dept-section">
        <div class="dept-header-strip">
            <div class="dept-container">
                <div class="dept-header-flex">
                    <div class="dept-title-box">
                        <span class="dept-tag">Specialties</span>
                        <h2 class="dept-main-title">7 Decades of Excellence</h2>
                    </div>
                    <div class="dept-action-box">
                        <a href="#" class="view-all-link">All Departments &rarr;</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="dept-container">
            <div class="dept-grid">
                <div class="dept-card">
                    <div class="dept-icon-circle">
                        <i class="fas fa-syringe"></i> </div>
                    <h3 class="dept-name">Anesthesiology</h3>
                    <p class="dept-desc">Advanced pain management and specialized patient care during surgical procedures.</p>
                    <a href="#" class="dept-learn-more">Learn More <span>&rarr;</span></a>
                </div>

                <div class="dept-card">
                    <div class="dept-icon-circle">
                        <i class="fas fa-heartbeat"></i>
                    </div>
                    <h3 class="dept-name">Cardiac Surgery</h3>
                    <p class="dept-desc">Comprehensive heart care and complex surgical interventions for cardiac health.</p>
                    <a href="#" class="dept-learn-more">Learn More <span>&rarr;</span></a>
                </div>

                <div class="dept-card">
                    <div class="dept-icon-circle">
                        <i class="fas fa-brain"></i>
                    </div>
                    <h3 class="dept-name">Neurology</h3>
                    <p class="dept-desc">Specialized treatment for disorders of the nervous system and brain health.</p>
                    <a href="#" class="dept-learn-more">Learn More <span>&rarr;</span></a>
                </div>

                <div class="dept-card">
                    <div class="dept-icon-circle">
                        <i class="fas fa-microscope"></i>
                    </div>
                    <h3 class="dept-name">Cath Lab</h3>
                    <p class="dept-desc">Diagnostic imaging and minimally invasive procedures for cardiovascular conditions.</p>
                    <a href="#" class="dept-learn-more">Learn More <span>&rarr;</span></a>
                </div>
            </div>
        </div>
    </section>

    <section class="medical-update-section">
        <div class="mu-container">
            
            <div class="mu-header">
                <div class="mu-title-wrap">
                    <span class="mu-tag" style="color: #004151;">Media Update</span>
                    <h2 class="mu-main-title" style="color: #004151;">Latest Happenings</h2>
                </div>
                <div class="mu-navigation">
                    <button class="mu-nav-btn prev" aria-label="Previous">←</button>
                    <button class="mu-nav-btn next" aria-label="Next">→</button>
                </div>
            </div>

            <div class="mu-grid">
                <article class="mu-card">
                    <div class="mu-image-area">
                        <img src="<?php echo get_template_directory_uri(); ?>/picture/pic3.png" alt="Home Healthcare">

                        <div class="mu-date-overlay" style="background-color: #004151;">26 SEP 2023</div>
                    </div>
                    <div class="mu-content-area">
                        <span class="mu-category">Specialized Care</span>
                        <h3 class="mu-post-title">Home Healthcare Service</h3>
                        <p class="mu-excerpt">Providing professional medical support and compassionate care in the comfort of your own home.</p>
                        <a href="#" class="mu-read-link" style="color: #004151;">Read Story <span>→</span></a>
                    </div>
                </article>

                <article class="mu-card">
                    <div class="mu-image-area">
                        <img src="<?php echo get_template_directory_uri(); ?>/picture/pic2.jpg" alt="Immune System">

                    </div>
                    <div class="mu-content-area">
                        <span class="mu-category">Medical Encyclopedia</span>
                        <h3 class="mu-post-title">Signs of a Weak Immune System</h3>
                        <p class="mu-excerpt">Understanding how your body sends distress signals when your natural defenses are lowered.</p>
                        <a href="#" class="mu-read-link" style="color: #004151;">Read Story <span>→</span></a>
                    </div>
                </article>

                <article class="mu-card">
                    <div class="mu-image-area">
                        <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/picture/pic1.jpg"  alt="Leukemia Awareness">

                    </div>
                    <div class="mu-content-area">
                        <span class="mu-category">Medical Encyclopedia</span>
                        <h3 class="mu-post-title">Leukemia Symptoms and Treatment</h3>
                        <p class="mu-excerpt">A comprehensive guide to early detection, causes, and modern treatment options for Leukemia.</p>
                        <a href="#" class="mu-read-link" style="color: #004151;">Read Story <span>→</span></a>
                    </div>
                </article>
            </div>

        </div>
    </section>


    <section class="wm-location-section">
        <div class="wm-inner">
            <div class="wm-header">
                <span class="wm-label">Our Network</span>   
                <h2 class="wm-heading">Hospital Locations</h2>
            </div>

            <div class="wm-grid-layout">
                <div class="wm-sidebar">
                    <div class="wm-loc-card active">
                        <div class="wm-card-content">
                            <h3>AMC Rakkah</h3>
                            <p>Specialized Medical Center</p>
                            <a href="https://www.google.com/maps/search/Almana+Hospital+Rakkah" target="_blank" class="wm-directions-btn">Get Directions</a>
                        </div>
                    </div>

                    <div class="wm-loc-card">
                        <div class="wm-card-content">
                            <h3>AGH Khobar</h3>
                            <p>General Hospital & OPD</p>
                            <a href="https://www.google.com/maps/search/Almana+Hospital+Khobar" target="_blank" class="wm-directions-btn">Get Directions</a>
                        </div>
                    </div>

                    <div class="wm-loc-card">
                        <div class="wm-card-content">
                            <h3>AGH Dammam</h3>
                            <p>Main Tertiary Care</p>
                            <a href="https://www.google.com/maps/search/Almana+Hospital+Dammam" target="_blank" class="wm-directions-btn">Get Directions</a>
                        </div>
                    </div>
                </div>

                <div class="wm-map-box">
                    <iframe 
                        src="https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d114444.38042456073!2d50.08940984852026!3d26.313941405903254!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1salmana%20hospital!5e0!3m2!1sen!2ssa!4v1700000000000!5m2!1sen!2ssa" 
                        width="100%" 
                        height="100%" 
                        style="border:0;" 
                        allowfullscreen="" 
                        loading="lazy">
                    </iframe>
                </div>
            </div>
        </div>
    </section>
        </body>
    
        <?php get_footer(); ?>
