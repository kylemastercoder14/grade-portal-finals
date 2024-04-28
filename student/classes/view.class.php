<?php
include('includes/includes.php');
class View
{
    private $data, $gradesByStudent;
    public $active_page;
    public $statusDashboard;

    public function __construct(
        $data_arr = null,
        $page,
        $gradesByStudent = null
    ) {
        $this->data = $data_arr;
        $this->active_page = $page;
        $this->gradesByStudent = $gradesByStudent;

        switch ($this->active_page) {
            case 'dashboard':
                $this->statusDashboard = 'active';
                break;
        }
    }

    public function header()
    {
?>
        <!-- LOGOUT MODAL -->
        <div class="modal fade" id="logoutModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <form action="action.php" method="POST" class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Log out</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Are you sure you want to logout?
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <a href="logout.php" class="btn btn-danger">Logout</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <nav class="layout-navbar navbar navbar-expand-xl align-items-center bg-navbar-theme" id="layout-navbar">
            <div class="container-xxl">
                <div class="navbar-brand app-brand demo d-none d-xl-flex py-2 me-4">
                    <a href="index.php" class="app-brand-link gap-2">
                        <img src="assets/images/logo.png" width="50" alt="" />
                        <span class="app-brand-text menu-text fw-bold">KLD Grades Portal</span>

                    </a>

                    <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-xl-none">
                        <i class="ti ti-x ti-sm align-middle"></i>
                    </a>
                </div>

                <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
                    <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                        <i class="ti ti-menu-2 ti-sm"></i>
                    </a>
                </div>

                <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
                    <ul class="navbar-nav flex-row align-items-center ms-auto">
                        <!-- Notification -->
                        <li class="nav-item dropdown-notifications navbar-dropdown dropdown me-3 me-xl-1">
                            <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">
                                <i class="ti ti-bell ti-md"></i>
                                <span class="badge bg-danger rounded-pill badge-notifications">5</span>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end py-0">
                                <li class="dropdown-menu-header border-bottom">
                                    <div class="dropdown-header d-flex align-items-center py-3">
                                        <h5 class="text-body mb-0 me-auto">Notification</h5>
                                        <a href="javascript:void(0)" class="dropdown-notifications-all text-body" data-bs-toggle="tooltip" data-bs-placement="top" title="Mark all as read"><i class="ti ti-mail-opened fs-4"></i></a>
                                    </div>
                                </li>
                                <li class="dropdown-notifications-list scrollable-container">
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item list-group-item-action dropdown-notifications-item">
                                            <div class="d-flex">
                                                <div class="flex-shrink-0 me-3">
                                                    <div class="avatar">
                                                        <img src="../../assets/img/avatars/1.png" alt class="h-auto rounded-circle" />
                                                    </div>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <h6 class="mb-1">Congratulation Lettie 🎉</h6>
                                                    <p class="mb-0">
                                                        Won the monthly best seller gold badge
                                                    </p>
                                                    <small class="text-muted">1h ago</small>
                                                </div>
                                                <div class="flex-shrink-0 dropdown-notifications-actions">
                                                    <a href="javascript:void(0)" class="dropdown-notifications-read"><span class="badge badge-dot"></span></a>
                                                    <a href="javascript:void(0)" class="dropdown-notifications-archive"><span class="ti ti-x"></span></a>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="list-group-item list-group-item-action dropdown-notifications-item">
                                            <div class="d-flex">
                                                <div class="flex-shrink-0 me-3">
                                                    <div class="avatar">
                                                        <span class="avatar-initial rounded-circle bg-label-danger">CF</span>
                                                    </div>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <h6 class="mb-1">Charles Franklin</h6>
                                                    <p class="mb-0">Accepted your connection</p>
                                                    <small class="text-muted">12hr ago</small>
                                                </div>
                                                <div class="flex-shrink-0 dropdown-notifications-actions">
                                                    <a href="javascript:void(0)" class="dropdown-notifications-read"><span class="badge badge-dot"></span></a>
                                                    <a href="javascript:void(0)" class="dropdown-notifications-archive"><span class="ti ti-x"></span></a>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="list-group-item list-group-item-action dropdown-notifications-item marked-as-read">
                                            <div class="d-flex">
                                                <div class="flex-shrink-0 me-3">
                                                    <div class="avatar">
                                                        <img src="../../assets/img/avatars/2.png" alt class="h-auto rounded-circle" />
                                                    </div>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <h6 class="mb-1">New Message ✉️</h6>
                                                    <p class="mb-0">
                                                        You have new message from Natalie
                                                    </p>
                                                    <small class="text-muted">1h ago</small>
                                                </div>
                                                <div class="flex-shrink-0 dropdown-notifications-actions">
                                                    <a href="javascript:void(0)" class="dropdown-notifications-read"><span class="badge badge-dot"></span></a>
                                                    <a href="javascript:void(0)" class="dropdown-notifications-archive"><span class="ti ti-x"></span></a>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="list-group-item list-group-item-action dropdown-notifications-item">
                                            <div class="d-flex">
                                                <div class="flex-shrink-0 me-3">
                                                    <div class="avatar">
                                                        <span class="avatar-initial rounded-circle bg-label-success"><i class="ti ti-shopping-cart"></i></span>
                                                    </div>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <h6 class="mb-1">Whoo! You have new order 🛒</h6>
                                                    <p class="mb-0">
                                                        ACME Inc. made new order $1,154
                                                    </p>
                                                    <small class="text-muted">1 day ago</small>
                                                </div>
                                                <div class="flex-shrink-0 dropdown-notifications-actions">
                                                    <a href="javascript:void(0)" class="dropdown-notifications-read"><span class="badge badge-dot"></span></a>
                                                    <a href="javascript:void(0)" class="dropdown-notifications-archive"><span class="ti ti-x"></span></a>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="list-group-item list-group-item-action dropdown-notifications-item marked-as-read">
                                            <div class="d-flex">
                                                <div class="flex-shrink-0 me-3">
                                                    <div class="avatar">
                                                        <img src="../../assets/img/avatars/9.png" alt class="h-auto rounded-circle" />
                                                    </div>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <h6 class="mb-1">
                                                        Application has been approved 🚀
                                                    </h6>
                                                    <p class="mb-0">
                                                        Your ABC project application has been approved.
                                                    </p>
                                                    <small class="text-muted">2 days ago</small>
                                                </div>
                                                <div class="flex-shrink-0 dropdown-notifications-actions">
                                                    <a href="javascript:void(0)" class="dropdown-notifications-read"><span class="badge badge-dot"></span></a>
                                                    <a href="javascript:void(0)" class="dropdown-notifications-archive"><span class="ti ti-x"></span></a>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="list-group-item list-group-item-action dropdown-notifications-item marked-as-read">
                                            <div class="d-flex">
                                                <div class="flex-shrink-0 me-3">
                                                    <div class="avatar">
                                                        <span class="avatar-initial rounded-circle bg-label-success"><i class="ti ti-chart-pie"></i></span>
                                                    </div>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <h6 class="mb-1">Monthly report is generated</h6>
                                                    <p class="mb-0">
                                                        July monthly financial report is generated
                                                    </p>
                                                    <small class="text-muted">3 days ago</small>
                                                </div>
                                                <div class="flex-shrink-0 dropdown-notifications-actions">
                                                    <a href="javascript:void(0)" class="dropdown-notifications-read"><span class="badge badge-dot"></span></a>
                                                    <a href="javascript:void(0)" class="dropdown-notifications-archive"><span class="ti ti-x"></span></a>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="list-group-item list-group-item-action dropdown-notifications-item marked-as-read">
                                            <div class="d-flex">
                                                <div class="flex-shrink-0 me-3">
                                                    <div class="avatar">
                                                        <img src="../../assets/img/avatars/5.png" alt class="h-auto rounded-circle" />
                                                    </div>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <h6 class="mb-1">Send connection request</h6>
                                                    <p class="mb-0">
                                                        Peter sent you connection request
                                                    </p>
                                                    <small class="text-muted">4 days ago</small>
                                                </div>
                                                <div class="flex-shrink-0 dropdown-notifications-actions">
                                                    <a href="javascript:void(0)" class="dropdown-notifications-read"><span class="badge badge-dot"></span></a>
                                                    <a href="javascript:void(0)" class="dropdown-notifications-archive"><span class="ti ti-x"></span></a>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="list-group-item list-group-item-action dropdown-notifications-item">
                                            <div class="d-flex">
                                                <div class="flex-shrink-0 me-3">
                                                    <div class="avatar">
                                                        <img src="../../assets/img/avatars/6.png" alt class="h-auto rounded-circle" />
                                                    </div>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <h6 class="mb-1">New message from Jane</h6>
                                                    <p class="mb-0">
                                                        Your have new message from Jane
                                                    </p>
                                                    <small class="text-muted">5 days ago</small>
                                                </div>
                                                <div class="flex-shrink-0 dropdown-notifications-actions">
                                                    <a href="javascript:void(0)" class="dropdown-notifications-read"><span class="badge badge-dot"></span></a>
                                                    <a href="javascript:void(0)" class="dropdown-notifications-archive"><span class="ti ti-x"></span></a>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="list-group-item list-group-item-action dropdown-notifications-item marked-as-read">
                                            <div class="d-flex">
                                                <div class="flex-shrink-0 me-3">
                                                    <div class="avatar">
                                                        <span class="avatar-initial rounded-circle bg-label-warning"><i class="ti ti-alert-triangle"></i></span>
                                                    </div>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <h6 class="mb-1">CPU is running high</h6>
                                                    <p class="mb-0">
                                                        CPU Utilization Percent is currently at 88.63%,
                                                    </p>
                                                    <small class="text-muted">5 days ago</small>
                                                </div>
                                                <div class="flex-shrink-0 dropdown-notifications-actions">
                                                    <a href="javascript:void(0)" class="dropdown-notifications-read"><span class="badge badge-dot"></span></a>
                                                    <a href="javascript:void(0)" class="dropdown-notifications-archive"><span class="ti ti-x"></span></a>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </li>
                                <li class="dropdown-menu-footer border-top">
                                    <a href="javascript:void(0);" class="dropdown-item d-flex justify-content-center text-primary p-2 h-px-40 mb-1 align-items-center">
                                        View all notifications
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <!--/ Notification -->

                        <!-- User -->
                        <li class="nav-item navbar-dropdown dropdown-user dropdown">
                            <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                                <div class="avatar avatar-online">
                                    <img src="<?= $this->data['profile_img'] == null || "" ? "assets/images/dummy.png" : $this->data['profile_img'] ?>" alt class="h-auto rounded-circle" />
                                </div>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li>
                                    <a class="dropdown-item" href="javascript:void(0)">
                                        <div class="d-flex">
                                            <div class="flex-shrink-0 me-3">
                                                <div class="avatar avatar-online">
                                                    <img src="<?= $this->data['profile_img'] == null || "" ? "assets/images/dummy.png" : $this->data['profile_img'] ?>" alt class="h-auto rounded-circle" />
                                                </div>
                                            </div>
                                            <div class="flex-grow-1">
                                                <span class="fw-medium d-block"><?php echo $this->data['firstname'] . " " . $this->data['middlename'] . " " . $this->data['lastname'] . " " . $this->data['suffix']; ?></span>
                                                <small class="text-muted"><?php echo  $this->data['program_name']; ?></small>
                                                <!-- role dapat  -->
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <div class="dropdown-divider"></div>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="profile.php">
                                        <i class="ti ti-user-check me-2 ti-sm"></i>
                                        <span class="align-middle">My Profile</span>
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="messages.php">
                                        <span class="d-flex align-items-center align-middle">
                                            <i class="flex-shrink-0 ti ti-inbox me-2 ti-sm"></i>
                                            <span class="flex-grow-1 align-middle">Messages</span>
                                            <span class="flex-shrink-0 badge badge-center rounded-pill bg-label-danger w-px-20 h-px-20">2</span>
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <div class="dropdown-divider"></div>
                                </li>
                                <li>
                                    <a data-bs-toggle="modal" data-bs-target="#logoutModal" class="dropdown-item" href="#">
                                        <i class="ti ti-logout me-2 ti-sm"></i>
                                        <span class="align-middle">Log Out</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <!--/ User -->
                    </ul>
                </div>
            </div>
        </nav>
    <?php
    }

    public function navbar()
    {
    ?>
        <aside id="layout-menu" class="layout-menu-horizontal menu-horizontal menu bg-menu-theme flex-grow-0">
            <div class="container-xxl d-flex h-100">
                <ul class="menu-inner">
                    <!-- Dashboards -->
                    <li class="menu-item <?php echo $this->statusDashboard ?>">
                        <a href="index.php" class="menu-link">
                            <i class="menu-icon tf-icons ti ti-smart-home"></i>
                            <div data-i18n="Dashboard">Dashboard</div>
                        </a>
                    </li>

                    <li class="menu-item">
                        <a href="grades.php" class="menu-link">
                            <i class="menu-icon tf-icons ti ti-percentage"></i>
                            <div data-i18n="Grades">Grades</div>
                        </a>
                    </li>

                    <li class="menu-item">
                        <a href="advising.php" class="menu-link">
                            <i class="menu-icon tf-icons ti ti-calendar"></i>
                            <div data-i18n="Advising">Advising</div>
                        </a>
                    </li>

                    <li class="menu-item">
                        <a href="courses.php" class="menu-link">
                            <i class="menu-icon tf-icons ti ti-notebook"></i>
                            <div data-i18n="Course Enrolled">Course Enrolled</div>
                        </a>
                    </li>

                    <li class="menu-item">
                        <a href="request-documents.php" class="menu-link">
                            <i class="menu-icon tf-icons ti ti-note"></i>
                            <div data-i18n="Request Document">Request Document</div>
                        </a>
                    </li>

                    <li class="menu-item">
                        <a href="feedbacks.php" class="menu-link">
                            <i class="menu-icon tf-icons ti ti-message"></i>
                            <div data-i18n="Feedbacks">Feedbacks</div>
                        </a>
                    </li>

                    <li class="menu-item">
                        <a href="settings.php" class="menu-link">
                            <i class="menu-icon tf-icons ti ti-settings"></i>
                            <div data-i18n="Settings">Settings</div>
                        </a>
                    </li>
                </ul>
            </div>
        </aside>
    <?php
    }

    public function footer()
    {
    ?>
        <footer class="content-footer footer bg-footer-theme">
            <div class="container-xxl">
                <div class="footer-container d-flex align-items-center justify-content-between py-2 flex-md-row flex-column">
                    <div>
                        © Copyright
                        <script>
                            document.write(new Date().getFullYear());
                        </script>
                        <a href="https://www.kld.edu.ph/profile/" target="_blank" class="footer-link text-success fw-medium">Kolehiyo ng Lungsod ng Dasmarinas - Burol Main</a>
                    </div>
                    <div class="d-none d-lg-inline-block">
                        <a href="#" class="footer-link me-4" target="_blank">Privacy Policy</a>
                        <a href="#" target="_blank" class="footer-link me-4">FAQs</a>

                        <a href="#" target="_blank" class="footer-link me-4">Terms & Condition</a>

                        <a href="#" target="_blank" class="footer-link d-none d-sm-inline-block">Support</a>
                    </div>
                </div>
            </div>
        </footer>
    <?php
    }

    public function dashboardContent()
    {
    ?>
        <!-- Layout wrapper -->
        <div class="layout-wrapper layout-navbar-full layout-horizontal layout-without-menu">
            <div class="layout-container">
                <!-- Header -->
                <?php $this->header();  ?>
                <!-- / Header -->

                <!-- Layout container -->
                <div class="layout-page">
                    <!-- Content wrapper -->
                    <div class="content-wrapper">
                        <!-- Navbar -->
                        <?php $this->navbar();  ?>
                        <!-- / Navbar -->
                        <!-- Content -->
                        <div class="container-xxl flex-grow-1 container-p-y">
                            <div class="card mb-4">
                                <div class="card-body">
                                    <div class="d-flex align-items-center gap-2">
                                        <i class="ti ti-home ti-xl"></i>
                                        <div class="d-flex flex-column">
                                            <p class="my-0 h4">Dashboard</p>
                                            <small class="my-0">A.Y (2023 - 2024) | 2ND SEMESTER | INSTITUTE OF INFORMATION AND COMPUTING SCIENCES</small>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="card">
                                <div class="card-body">
                                    <h3 class="card-title">Announcement</h3>
                                    <p>Hi Kyle Andre David Lim, kindly read about some of the important announcement below.</p>
                                    <p>You may now send a request for advising in your respective instructor by navigating to <b class="text-success">Advising Tab >> Send a Request for Advising</b>. This is for students with regular standing status only.</p>
                                    <p>For students with irregular standing status, you may contact our College Registrar.</p>
                                    <div class="d-flex align-items-center justify-content-center gap-3">
                                        <img style="width: 700px; height: 500px; object-fit: cover;" src="assets/images/announce1.jpg" alt="">
                                        <img style="width: 700px; height: 500px; object-fit: cover;" src="assets/images/announce2.jpg" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--/ Content -->
                        <!-- Footer -->
                        <?php $this->footer();  ?>
                        <!-- / Footer -->

                        <div class="content-backdrop fade"></div>
                    </div>
                    <!--/ Content wrapper -->
                </div>

                <!--/ Layout container -->
            </div>
        </div>

        <!-- Overlay -->
        <div class="layout-overlay layout-menu-toggle"></div>

        <!-- Drag Target Area To SlideIn Menu On Small Screens -->
        <div class="drag-target"></div>

        <!--/ Layout wrapper -->

        <div class="buy-now">
            <a href="#" class="btn btn-danger btn-buy-now">
                <i class="ti ti-headset ti-sm"></i>
            </a>
        </div>
    <?php
    }

    public function advisingContent()
    {
    ?>
        <!-- Layout wrapper -->
        <div class="layout-wrapper layout-navbar-full layout-horizontal layout-without-menu">
            <div class="layout-container">
                <!-- Header -->
                <?php $this->header();  ?>
                <!-- / Header -->

                <!-- Layout container -->
                <div class="layout-page">
                    <!-- Content wrapper -->
                    <div class="content-wrapper">
                        <!-- Navbar -->
                        <?php $this->navbar();  ?>
                        <!-- / Navbar -->
                        <!-- Content -->
                        <div class="container-xxl flex-grow-1 container-p-y">
                            <div class="card mb-4">
                                <div class="card-body">
                                    <div class="d-flex align-items-center gap-2">
                                        <i class="ti ti-calendar ti-xl"></i>
                                        <div class="d-flex flex-column">
                                            <p class="my-0 h4">Advised Courses</p>
                                            <small class="my-0">A.Y (2023 - 2024) | 2ND SEMESTER | INSTITUTE OF INFORMATION AND COMPUTING SCIENCES</small>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="card">
                                <div class="card-body">
                                    <div class="bg-danger p-2 text-white rounded mb-3" style="border: 2px solid red;">
                                        <p class="my-0">Hi Kyle Andre David Lim,</p>
                                        <p class="my-0">Please contact your adviser under your program for the advising process. Just click the button below.</p>
                                    </div>
                                    <a href="#" class="btn btn-outline-success">
                                        <i class="ti ti-mail ti-sm me-2"></i>
                                        <span>Request for Advising</span>
                                    </a>
                                    <br>
                                    <small>You have sent a total of (0) advising requests this semester.</small>
                                </div>
                            </div>
                        </div>
                        <!--/ Content -->
                        <!-- Footer -->
                        <?php $this->footer();  ?>
                        <!-- / Footer -->

                        <div class="content-backdrop fade"></div>
                    </div>
                    <!--/ Content wrapper -->
                </div>

                <!--/ Layout container -->
            </div>
        </div>

        <!-- Overlay -->
        <div class="layout-overlay layout-menu-toggle"></div>

        <!-- Drag Target Area To SlideIn Menu On Small Screens -->
        <div class="drag-target"></div>

        <!--/ Layout wrapper -->

        <div class="buy-now">
            <a href="#" class="btn btn-danger btn-buy-now">
                <i class="ti ti-headset ti-sm"></i>
            </a>
        </div>
    <?php
    }

    public function gradesContent()
    {
    ?>
        <!-- Layout wrapper -->
        <div class="layout-wrapper layout-navbar-full layout-horizontal layout-without-menu">
            <div class="layout-container">
                <!-- Header -->
                <?php $this->header();  ?>
                <!-- / Header -->

                <!-- Layout container -->
                <div class="layout-page">
                    <!-- Content wrapper -->
                    <div class="content-wrapper">
                        <!-- Navbar -->
                        <?php $this->navbar();  ?>
                        <!-- / Navbar -->
                        <!-- Content -->
                        <div class="container-xxl flex-grow-1 container-p-y">
                            <div class="card mb-4">
                                <div class="card-body">
                                    <div class="d-flex align-items-center gap-2">
                                        <i class="ti ti-note ti-xl"></i>
                                        <div class="d-flex flex-column">
                                            <p class="my-0 h4">eCOG</p>
                                            <small class="my-0">These are your current grades of all courses for the 2nd semester of A.Y (2023 - 2024).</small>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="card">
                                <div class="card-body">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Course Title</th>
                                                <th>Course Code</th>
                                                <th>Units</th>
                                                <th>Grade</th>
                                                <th>Transmuted Grade</th>
                                                <th>Remarks</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $grades = $this->gradesByStudent;
                                            $total_units = 0;
                                            $total_grade_points = 0;

                                            if (!$grades) {
                                                echo '<td colspan="6"><h4 class="text-center text-danger mt-2">No data found yet!</h4></td>';
                                            } else {
                                                foreach ($grades as $grade => $data) {
                                                    $grade_percentage = $data['grade'];
                                                    $course_units = $data['course_unit'];
                                                    $grade_points = $grade_percentage * $course_units;
                                                    $total_units += $course_units;
                                                    $total_grade_points += $grade_points;
                                            ?>
                                                    <tr>
                                                        <td><?= $data['course_name'] ?></td>
                                                        <td><?= $data['course_code'] ?></td>
                                                        <td><?= $course_units ?></td>
                                                        <td><?= $grade_percentage . "%" ?></td>
                                                        <td>
                                                            <?php
                                                            if ($grade_percentage >= 99.0) {
                                                                echo "1.00";
                                                            } else if ($grade_percentage >= 96.0) {
                                                                echo "1.25";
                                                            } else if ($grade_percentage >= 93.0) {
                                                                echo "1.50";
                                                            } else if ($grade_percentage >= 90.0) {
                                                                echo "1.75";
                                                            } else if ($grade_percentage >= 87.0) {
                                                                echo "2.00";
                                                            } else if ($grade_percentage >= 84.0) {
                                                                echo "2.25";
                                                            } else if ($grade_percentage >= 81.0) {
                                                                echo "2.50";
                                                            } else if ($grade_percentage >= 78.0) {
                                                                echo "2.75";
                                                            } else if ($grade_percentage >= 75.0) {
                                                                echo "3.00";
                                                            } else {
                                                                echo "5.00";
                                                            }
                                                            ?>
                                                        </td>
                                                        <td><span class="badge <?= $grade_percentage <= 70 ? "text-bg-danger" : "text-bg-success" ?>"><?= $grade_percentage <= 70 ? "FAILED" : "PASSED" ?></span></td>
                                                    </tr>
                                                <?php
                                                }
                                                $gwa = $total_grade_points / $total_units;
                                                ?>
                                                <tr>
                                                    <th><b>Grade Weighted Average:</b></th>
                                                    <td></td>
                                                    <td></td>
                                                    <th><b><?= $gwa . "%" ?></b></th>
                                                    <th>
                                                        <b>
                                                            <?php
                                                            if ($gwa >= 98) {
                                                                echo "1.00";
                                                            } else if ($gwa >= 95.0) {
                                                                echo "1.25";
                                                            } else if ($gwa >= 90.0) {
                                                                echo "1.50";
                                                            } else if ($gwa >= 87.0) {
                                                                echo "1.75";
                                                            } else if ($gwa >= 85.0) {
                                                                echo "2.00";
                                                            } else if ($gwa >= 83.0) {
                                                                echo "2.25";
                                                            } else if ($gwa >= 80.0) {
                                                                echo "2.50";
                                                            } else if ($gwa >= 78.0) {
                                                                echo "2.75";
                                                            } else if ($gwa >= 75.0) {
                                                                echo "3.00";
                                                            } else if ($gwa >= 70.0) {
                                                                echo "4.00";
                                                            } else {
                                                                echo "5.00";
                                                            }
                                                            ?>
                                                        </b>
                                                    </th>
                                                    <td><span class="badge <?= $gwa <= 70 ? "text-bg-danger" : "text-bg-success" ?>"><?= $gwa <= 70 ? "FAILED" : "PASSED" ?></span></td>
                                                </tr>
                                            <?php
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!--/ Content -->
                        <!-- Footer -->
                        <?php $this->footer();  ?>
                        <!-- / Footer -->

                        <div class="content-backdrop fade"></div>
                    </div>
                    <!--/ Content wrapper -->
                </div>

                <!--/ Layout container -->
            </div>
        </div>

        <!-- Overlay -->
        <div class="layout-overlay layout-menu-toggle"></div>

        <!-- Drag Target Area To SlideIn Menu On Small Screens -->
        <div class="drag-target"></div>

        <!--/ Layout wrapper -->

        <div class="buy-now">
            <a href="#" class="btn btn-danger btn-buy-now">
                <i class="ti ti-headset ti-sm"></i>
            </a>
        </div>
    <?php
    }

    public function signinContent()
    {
    ?>
        <style>
            body {
                overflow: hidden;
            }

            .school-bg {
                position: absolute;
                background-position: center;
                background-size: cover;
                filter: blur(10px);
            }

            .overlay-black {
                position: fixed;
                background: rgba(0, 0, 0, 0.5);
                width: 100%;
                height: 100vh;
                z-index: 3;
            }

            .signin-content {
                display: flex;
                position: relative;
                flex-direction: column;
                width: 100%;
                align-items: center;
                justify-content: center;
                z-index: 99;
                gap: 2rem;
                padding: 5rem 0;
            }

            .logo-signin {
                width: 400px;
            }

            .header-content {
                padding: 10px 30px;
                background-color: rgba(0, 0, 0, 0.6);
                color: #fff;
            }

            .signin-content form {
                background-color: #fff;
                padding: 20px;
                border-radius: 8px;
                width: 40rem;
            }
        </style>
        <div class="position-relative">
            <img class="school-bg" src="assets/images/school_image.jpg" alt="school-kld">
            <div class="overlay-black"></div>
        </div>
        <div class="signin-content">
            <img src="assets/images/KLD.png" class="logo-signin" alt="logo-kld">
            <p class="header-content">
                Login to view your grades, access academic advising tools, and stay
                updated on your educational journey.
            </p>
            <form action="action.php" method="POST">
                <h3 class="fw-bold mb-0">Welcome, KLD Regals! 👋</h3>
                <span>Sign in first to get started.</span>
                <div class="form-group mb-3 mt-2">
                    <label class="form-label">Student Number</label>
                    <input type="text" class="form-control" name="student_id" placeholder="Enter student number" required>
                </div>
                <div class="form-group mb-3">
                    <label class="form-label">Password</label>
                    <input type="password" class="form-control" name="password" placeholder="Enter password" required>
                </div>
                <button type="submit" name="signin" class="btn btn-success w-100 mt-2">Sign in</button>
            </form>
        </div>
    <?php
    }

    public function courseEnrolledContent()
    {
    ?>
        <!-- Layout wrapper -->
        <div class="layout-wrapper layout-navbar-full layout-horizontal layout-without-menu">
            <div class="layout-container">
                <!-- Header -->
                <?php $this->header();  ?>
                <!-- / Header -->

                <!-- Layout container -->
                <div class="layout-page">
                    <!-- Content wrapper -->
                    <div class="content-wrapper">
                        <!-- Navbar -->
                        <?php $this->navbar();  ?>

                        <!-- / Navbar -->
                        <!-- Content -->
                        <div class="container-xxl flex-grow-1 container-p-y">
                            <div class="d-flex align-items-center justify-content-between">
                                <h5>
                                    <span class="text-muted fw-light"><a href="index.php" class="text-success">Dashboard</a> /</span> Course Enrolled
                                </h5>
                            </div>
                            <!-- Student Table -->
                            <div class="card">
                                <div class="card-body table-responsive">
                                    <table id="semesterDatatable" class="display compact table">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Course</th>
                                                <th>Course Code</th>
                                                <th>Units</th>
                                                <th>Instructor</th>
                                                <th>actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr></tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- Program Table -->
                        </div>
                        <!--/ Content -->
                        <!-- Footer -->
                        <?php $this->footer();  ?>
                        <!-- / Footer -->

                        <div class="content-backdrop fade"></div>
                    </div>
                    <!--/ Content wrapper -->
                </div>

                <!--/ Layout container -->
            </div>
        </div>

        <!-- Overlay -->
        <div class="layout-overlay layout-menu-toggle"></div>

        <!-- Drag Target Area To SlideIn Menu On Small Screens -->
        <div class="drag-target"></div>

        <!--/ Layout wrapper -->

        <div class="buy-now">
            <a href="#" class="btn btn-danger btn-buy-now">
                <i class="ti ti-headset ti-sm"></i>
            </a>
        </div>
<?php
    }
}
?>