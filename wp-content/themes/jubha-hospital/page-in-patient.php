
<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/css/page-in-patient.css">
<?php get_header(); ?>

<div class="space-more"></div>


<header class="hero">
    <div class="container">
        <h1>In Patient</h1>
        <nav class="breadcrumb">
            <a href="#">Patient Information</a> / <span class="active">In Patient</span>
        </nav>
    </div>
</header>

<div class="page-layout container">

    <aside class="sidebar">
        <h3>IN PATIENT</h3>
        <ul>
            <li><a href="#" class="tab-link active" data-tab="rooms">Rooms & Services</a></li>
            <li><a href="#" class="tab-link" data-tab="emergency">Emergency Room Instructions</a></li>
            <li><a href="#" class="tab-link" data-tab="rights">Patients & Families Rights</a></li>
            <li><a href="#" class="tab-link" data-tab="privacy">Privacy & Confidentiality</a></li>
        </ul>
    </aside>

   <main class="content">
                
    <div class="tab-content active" id="rooms">
        <img src="<?php echo get_template_directory_uri(); ?>/picture/bg-banner3.png" alt="Rooms Banner">
        <h2>Rooms & Services</h2>
        <p class="intro-text">
            At Jubha Hospitals we are committed to provide quality care at the highest levels.
        </p>
        <p>
            To ensure optimal patient experience and a convenient atmosphere for swift recovery, all our rooms are equipped with the latest advanced medical equipment and well trained medical staff along with the essential entertainment and comfort facilities needed by the patient.
        </p>
        <div class="vip-card">
            Other than the regular shared and private rooms,
            <strong>luxurious VIP suites</strong> are available for premium healthcare.
        </div>
    </div>

   <div class="tab-content" id="emergency">
    <img src="<?php echo get_template_directory_uri(); ?>/picture/pattion-info.jpg" alt="Emergency Banner">
    <h2>Emergency Room Instructions</h2>

    <p>
        After registration at the concerned department, you are requested to wait until you are invited to the triage room where your case will be evaluated.
    </p>

    <p>
        After entering the triage room, the nurse will inform you of the priority of your case and how long you are expected to wait to see the Doctor.
    </p>

    <p>
        If you feel your condition is worsening in the waiting room, please reach out to a nurse for necessary remedial action.
    </p>

    <p><strong>The priority of an examination by the doctor according to international standards is the following:</strong></p>

    

    <ul>
        <li>For your safety and the safety of others, no more than one attendant is allowed with each patient.</li>
        <li>Mobile phones are not allowed in the department.</li>
        <li>Taking pictures is not allowed in the department.</li>
        <li>Attendants are to strictly stay with the patient inside the room.</li>
        <li>Privacy of other patients is to be respected at all times.</li>
    </ul>
</div>


    <div class="tab-content" id="rights">
    <img src="<?php echo get_template_directory_uri(); ?>/picture/pattion-info1.jpg" alt="Patients & Families Rights Banner">
    <h2>Patients & Families Rights</h2>

    <p>
        Every patient and their family members have the right to receive safe, respectful, and high-quality healthcare. 
    </p>

    <ul>
        <li>Right to be treated with dignity, respect, and compassion at all times.</li>
        <li>Right to receive timely and appropriate medical care.</li>
        <li>Right to participate in decisions regarding your healthcare and treatment.</li>
        <li>Right to be informed clearly about your diagnosis, treatment options, and potential risks.</li>
        <li>Right to privacy and confidentiality of your medical information.</li>
        <li>Right to voice complaints or concerns about care without fear of retaliation.</li>
        <li>Right to have a support person accompany you during your hospital stay, subject to hospital rules.</li>
    </ul>

    <p>
        Patients and families are also expected to respect hospital staff, other patients, and hospital property to ensure a safe and caring environment for everyone.
    </p>
</div>


   <div class="tab-content" id="privacy">
    <img src="<?php echo get_template_directory_uri(); ?>/picture/pattion-info2.jpg" alt="Privacy & Confidentiality Banner">
    <h2>Privacy & Confidentiality</h2>

    <p>
        All patient information is kept confidential and protected. Key measures include:
    </p>

    <ul>
        <li>Providing privacy and confidentiality when discussing the patient’s treatment program, whether with the patient or their legal guardian.</li>
        <li>Preventing circulation or access to patient information, including medical files, diagnoses, analyses, and treatment details, to any unauthorized person without the consent of the patient or their legal guardian (except as required by judicial authorities).</li>
        <li>Restricting access to the patient’s medical file to only members of the medical team supervising the treatment, authorized management, the patient or guardian, or judicial authorities.</li>
        <li>Preventing meetings or visits by anyone not related to the patient or not providing healthcare services.</li>
        <li>Preparing admission, examination, and procedure areas to preserve privacy at all times.</li>
        <li>Providing the patient with appropriate clothing and necessary personal tools.</li>
        <li>Providing suitable and separate waiting areas for women and men.</li>
    </ul>
</div>


</main>

</div>

        <script>
            document.addEventListener('DOMContentLoaded', function () {

                    const links = document.querySelectorAll('.tab-link');
                    const tabs = document.querySelectorAll('.tab-content');

                    links.forEach(link => {
                        link.addEventListener('click', function (e) {
                            e.preventDefault();

                            links.forEach(l => l.classList.remove('active'));
                            tabs.forEach(t => t.classList.remove('active'));

                            this.classList.add('active');
                            document.getElementById(this.dataset.tab).classList.add('active');
                        });
                    });

                });

        </script>

<?php get_footer(); ?>