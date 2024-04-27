<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kolehiyo ng Lungsod ng Dasmarinas</title>
    <link rel="shortcut icon" href="assets/logo.png" type="image/png">
    <link rel="stylesheet" href="assets/bootstrap.min.css">
    <style>
        body {
            background-color: #165153;
            width: 100%;
            height: 100vh;
            overflow: hidden;
        }

        .hero {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10rem;
            padding: 0 3rem;
            position: relative;
        }

        .left-content {
            display: flex;
            align-items: start;
            justify-content: start;
            flex-direction: column;
        }

        .left-content .title {
            font-size: 60px;
        }

        .hero img {
            width: 82%;
        }

        .sub-content {
            position: absolute;
            bottom: 20px;
            left: 15%;
            background-color: rgba(0,0,0,0.4);
            padding: 20px;
        }

        .nav-content {
            padding: 10px 10rem;
        }

        .card {
            width: 20rem !important;
        }
    </style>
</head>

<body>

    <nav class="navbar bg-white">
        <div class="container-fluid nav-content">
            <a href="index.php" class="navbar-brand">
                <div class="d-flex align-items-center gap-2">
                    <img src="assets/logo.png" width="70" alt="Logo">
                    <span class="h5 fw-bold">Kolehiyo ng Lungsod ng Dasmarinas</span>
                </div>
            </a>
            <div class="d-flex align-items-center gap-3">
                <a href="#" data-bs-toggle="modal" data-bs-target="#dataPrivacy" class="btn btn-warning text-white">Data Privacy Notice</a>
                <div class="dropdown">
                    <button class="btn btn-success dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Sign in as
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="http://localhost/grade-portal-finals/superadmin">Registrar</a></li>
                        <li><a class="dropdown-item" href="http://localhost/grade-portal-finals/faculty">Faculty</a></li>
                        <li><a class="dropdown-item" href="http://localhost/grade-portal-finals/student">Student</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>

    <div class="container-fluid">
        <div class="hero">
            <div class="left-content text-white">
                <h3 class="fw-bold"><span style="color: #f2b129">Core</span> Values and Beliefs</h3>
                <h1 class="fw-bold title">Knowledge</h1>
                <h1 class="fw-bold title">Leadership and</h1>
                <h1 class="fw-bold title">Dedication</h1>
            </div>
            <div class="right-content">
                <img src="assets/hero.png" alt="">
            </div>
        </div>
        <div class="sub-content">
            <div class="d-flex align-items-center gap-3">
                <div class="card">
                    <div class="card-body text-center">
                        <img src="assets/icon-1.png" alt="">
                        <h2>Enrolled Students</h2>
                        <p class="h3 text-success fw-bold">4000</p>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body text-center">
                        <img src="assets/icon-2.png" alt="">
                        <h2>Institutes</h2>
                        <p class="h3 text-success fw-bold">7</p>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body text-center">
                    <img src="assets/icon-3.png" alt="">
                        <h2>Programs Offered</h2>
                        <p class="h3 text-success fw-bold">5</p>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body text-center">
                    <img src="assets/icon-4.png" alt="">
                        <h2>Faculties</h2>
                        <p class="h3 text-success fw-bold">185</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="dataPrivacy" tabindex="-1" aria-labelledby="dataPrivacy" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="dataPrivacyLabel">Data PRivacy Notice</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h4>Privacy Notice</h4>
                    <p>Kolehiyo ng Lungsod ng Dasmariñas (KLD) is fully committed to protecting the confidentiality of every individual's personal data, such as clients and stakeholders. We respect your right to privacy, and we strive to ensure that all your personal data is kept safe and secure in accordance with the Republic Act No. 10173 also known as the Data Privacy Act of 2012, its Implementing Rules and Regulations, and all other issuances from the National Privacy Commission (NPC). The processing of personal data will align with the general data principles of transparency, legitimate purpose, and proportionality. This privacy policy outlines our approach to handling personal data collected directly through our website and any third-party sites we may link to.</p>
                    <h4>Data Collection</h4>
                    <p>KLD may collect your personal data through various means, such as written records, photographic and video images, and digital files. During your use and browsing of our website, we may collect the following personal information:
                    <ul>
                        <li>Personal information that you provide when filling out forms on our website;</li>
                        <li>Your IP address and the pages you access on our website;</li>
                        <li>Information about the device you use to access our website, such as device type, operating system, and browser type;</li>
                        <li>Information about your location;</li>
                        <li>Any additional personal information that you choose to provide to us.</li>
                        <li>Our website uses cookies, which are small files that may be stored on your device when you visit our website. We use cookies to enhance your user experience and to collect information about how you use our website. You can disable cookies in your browser settings if you do not wish to allow cookies.</li>
                    </ul>
                    </p>
                    <h4>Data Usage</h4>
                    <p>As an educational institution, we adhere to the relevant laws when utilizing your personal information to pursue our legitimate interests. These interests encompass administrative, historical, research, and statistical endeavors. We handle your personal data by obtaining your consent, based on a contractual obligation, our legitimate interests, or legal requirement. Our purposes for using your personal data involve responding to your inquiries, providing services, and improving our website. We also use cookies and similar technologies to monitor your website activity and personalize your experience on our site.</p>
                    <h4>Data Sharing and Disclosure</h4>
                    <p>The KLD assures that any personal data collected will remain confidential and will not be divulged to any unauthorized third parties, unless requested by the data subjects themselves or required by legal and legitimate processing. Only authorized personnel of the KLD are permitted to access the personal information, and transfer of said data will only be done through secure electronic or hard copy means. We may enlist the assistance of contractors or service providers to aid us in providing website services, who may be given access to your personal information. We may disclose your data in line with legal requirements or the enforcement of our policies. Rest assured, we do not sell, share, or disclose your personal data to any third parties for marketing purposes.</p>
                    <h4>Data Retention</h4>
                    <p>We keep your personal data for as long as necessary to provide our services and meet legal requirements. We may also retain your data for statistical analysis and to enhance our services.</p>
                    <h4>Data Security</h4>
                    <p>We implement reasonable measures to safeguard your personal data against unauthorized access, modification, or disclosure. Our website uses SSL encryption to securely transmit your data. We routinely evaluate and update our security protocols as needed.</p>
                    <h4>Data Subject's Rights</h4>
                    <p>You have the right to access, update, and delete your personal data on our website. You may also object to the processing of your data or request its transfer.</p>
                    <h4>Changes in the Privacy Notice</h4>
                    <p>This privacy policy applies to our website. We reserve the right to modify, amend, or adjust this policy as necessary, especially when a specific privacy policy is required.</p>
                    <h4>Contact Us</h4>
                    <p>If you have any queries or concerns regarding this privacy notice or our data handling procedures, please contact our data protection officer at dpo@kld.edu.ph.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <script src="assets/bootstrap.bundle.min.js"></script>
</body>

</html>