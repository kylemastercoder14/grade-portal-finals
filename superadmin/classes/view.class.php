<?php
include('includes/includes.php');
class View
{
    private $data, $program, $archivedProgram;
    public $active_page;
    public $statusDashboard;
    public $statusYearlevel;
    public $statusPrograms;

    public function __construct($data_arr = null, $page, $unarchiveProgram = null, $archivedProgram = null)
    {
        $this->data = $data_arr;
        $this->program = $unarchiveProgram;
        $this->archivedProgram = $archivedProgram;
        $this->active_page = $page;

        switch ($this->active_page) {
            case 'dashboard':
                $this->statusDashboard = 'active';
                break;
            case 'year_level':
                $this->statusYearlevel = 'active';
                break;
            case 'program':
                $this->statusPrograms = 'active';
                break;
        }
    }


    public function header()
    {
?>
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
                                    <img src="https://github.com/shadcn.png" alt class="h-auto rounded-circle" />
                                </div>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li>
                                    <a class="dropdown-item" href="javascript:void(0)">
                                        <div class="d-flex">
                                            <div class="flex-shrink-0 me-3">
                                                <div class="avatar avatar-online">
                                                    <img src="https://github.com/shadcn.png" alt class="h-auto rounded-circle" />
                                                </div>
                                            </div>
                                            <div class="flex-grow-1">
                                                <span class="fw-medium d-block"><?php echo $this->data['firstname']; ?></span>
                                                <small class="text-muted"><?php echo  $this->data['firstname']; ?></small>
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
                                    <a class="dropdown-item" href="logout.php">
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
                        <a href="javascript:void(0)" class="menu-link menu-toggle">
                            <i class="menu-icon tf-icons ti ti-layout-grid-add"></i>
                            <div data-i18n="General">General</div>
                        </a>
                        <ul class="menu-sub">
                            <li class="menu-item <?php echo $this->statusYearlevel ?>">
                                <a href="year-level.php" class="menu-link">
                                    <i class="menu-icon tf-icons ti ti-layout-kanban"></i>
                                    <div data-i18n="Year Level">Year Level</div>
                                </a>
                            </li>
                            <li class="menu-item <?php echo $this->statusPrograms ?> ">
                                <a href="programs.php" class="menu-link">
                                    <i class="menu-icon tf-icons ti ti-layout-sidebar"></i>
                                    <div data-i18n="Programs">Programs</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="sections.php" class="menu-link">
                                    <i class="menu-icon tf-icons ti ti-table"></i>
                                    <div data-i18n="Sections">Sections</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="subjects.php" class="menu-link">
                                    <i class="menu-icon tf-icons ti ti-book"></i>
                                    <div data-i18n="Subjects">Subjects</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="class-list.php" class="menu-link">
                                    <i class="menu-icon tf-icons ti ti-folder"></i>
                                    <div data-i18n="Class List">Class List</div>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="menu-item">
                        <a href="students.php" class="menu-link">
                            <i class="menu-icon tf-icons ti ti-users"></i>
                            <div data-i18n="Students">Students</div>
                        </a>
                    </li>

                    <li class="menu-item">
                        <a href="faculties.php" class="menu-link">
                            <i class="menu-icon tf-icons ti ti-id"></i>
                            <div data-i18n="Faculties">Faculties</div>
                        </a>
                    </li>

                    <li class="menu-item">
                        <a href="registrar.php" class="menu-link">
                            <i class="menu-icon tf-icons ti ti-user-circle"></i>
                            <div data-i18n="Registrar">Registrar</div>
                        </a>
                    </li>

                    <!-- Apps -->
                    <li class="menu-item">
                        <a href="javascript:void(0)" class="menu-link menu-toggle">
                            <i class="menu-icon tf-icons ti ti-toggle-left"></i>
                            <div data-i18n="Others">Others</div>
                        </a>
                        <ul class="menu-sub">
                            <li class="menu-item">
                                <a href="document-request.php" class="menu-link">
                                    <i class="menu-icon tf-icons ti ti-file"></i>
                                    <div data-i18n="Document Request">Document Request</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="announcement.php" class="menu-link">
                                    <i class="menu-icon tf-icons ti ti-forms"></i>
                                    <div data-i18n="Announcement">Announcement</div>
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
                    </li>

                    <li class="menu-item">
                        <a href="backup-database.php" class="menu-link">
                            <i class="menu-icon tf-icons ti ti-database"></i>
                            <div data-i18n="Back-up & Restore">Back-up & Restore</div>
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
    public function studentOverview()
    {
    ?>
        <!-- Student Overview -->
        <div class="col-lg-6 col-md-6 col-sm-12 mb-4">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <small class="d-block mb-1 text-muted">Total Students</small>
                    </div>
                    <h4 class="card-title mb-1">4,083</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-4">
                            <div class="d-flex gap-2 align-items-center mb-2">
                                <span class="badge bg-label-success p-1 rounded"><i class="ti ti-users ti-xs"></i></span>
                                <p class="mb-0">2022 - 2023</p>
                            </div>
                            <h5 class="mb-0 pt-1 text-nowrap">62.2%</h5>
                            <small class="text-muted">3,260</small>
                        </div>
                        <div class="col-4">
                            <div class="divider divider-vertical">
                                <div class="divider-text">
                                    <span class="badge-divider-bg bg-label-secondary">VS</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-4 text-end">
                            <div class="d-flex gap-2 justify-content-end align-items-center mb-2">
                                <p class="mb-0">2023 - 2024</p>
                                <span class="badge bg-label-success p-1 rounded"><i class="ti ti-users ti-xs"></i></span>
                            </div>
                            <h5 class="mb-0 pt-1 text-nowrap ms-lg-n3 ms-xl-0">
                                25.5%
                            </h5>
                            <small class="text-muted">1,489</small>
                        </div>
                    </div>
                    <div class="d-flex align-items-center mt-4">
                        <div class="progress w-100" style="height: 8px">
                            <div class="progress-bar bg-success" style="width: 70%" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"></div>
                            <div class="progress-bar bg-danger" role="progressbar" style="width: 30%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/ Student Overview -->
    <?php
    }

    public function studentGradeOverview()
    {
    ?>
        <!-- Student Grades Overview -->
        <div class="col-lg-6 col-md-6 col-sm-12 mb-4">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <small class="d-block mb-1 text-muted">Student Grades</small>

                    </div>
                    <h4 class="card-title mb-1">4,083</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-4">
                            <div class="d-flex gap-2 align-items-center mb-2">
                                <span class="badge bg-label-success p-1 rounded"><i class="ti ti-percentage ti-xs"></i></span>
                                <p class="mb-0">Passed</p>
                            </div>
                            <h5 class="mb-0 pt-1 text-nowrap">62.2%</h5>
                            <small class="text-muted">3,907</small>
                        </div>
                        <div class="col-4">
                            <div class="divider divider-vertical">
                                <div class="divider-text">
                                    <span class="badge-divider-bg bg-label-secondary">VS</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-4 text-end">
                            <div class="d-flex gap-2 justify-content-end align-items-center mb-2">
                                <p class="mb-0">Failed</p>
                                <span class="badge bg-label-danger p-1 rounded"><i class="ti ti-percentage ti-xs"></i></span>
                            </div>
                            <h5 class="mb-0 pt-1 text-nowrap ms-lg-n3 ms-xl-0">
                                25.5%
                            </h5>
                            <small class="text-muted">356</small>
                        </div>
                    </div>
                    <div class="d-flex align-items-center mt-4">
                        <div class="progress w-100" style="height: 8px">
                            <div class="progress-bar bg-success" style="width: 90%" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                            <div class="progress-bar bg-danger" role="progressbar" style="width: 10%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Student Grades Overview -->
    <?php
    }
    public function totalSubmittedGrades()
    {
    ?>
        <!-- Total Submitted Grades -->
        <div class="col-md-6 col-sm-12 mb-4">
            <div class="card">
                <div class="card-header d-flex justify-content-between pb-0">
                    <div class="card-title mb-0">
                        <h5 class="mb-0">Total Submitted Grades</h5>
                        <small class="text-muted">AY. 2023 - 2024</small>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 col-sm-4 col-md-12 col-lg-4">
                            <div class="mt-lg-4 mt-lg-2 mb-lg-4 mb-2 pt-1">
                                <h1 class="mb-0">164</h1>
                                <p class="mb-0">Grade Status</p>
                            </div>
                            <ul class="p-0 m-0">
                                <li class="d-flex gap-3 align-items-center mb-lg-3 pt-2 pb-1">
                                    <div class="badge rounded bg-label-danger p-1">
                                        <i class="ti ti-x ti-sm"></i>
                                    </div>
                                    <div>
                                        <h6 class="mb-0 text-nowrap">Not Submitted</h6>
                                        <small class="text-muted">100</small>
                                    </div>
                                </li>
                                <li class="d-flex gap-3 align-items-center mb-lg-3 pb-1">
                                    <div class="badge rounded bg-label-success p-1">
                                        <i class="ti ti-check ti-sm"></i>
                                    </div>
                                    <div>
                                        <h6 class="mb-0 text-nowrap">Submitted</h6>
                                        <small class="text-muted">64</small>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="col-12 col-sm-8 col-md-12 col-lg-8">
                            <div id="supportTracker"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/ Total Submitted Grades -->
    <?php
    }
    public function totalProgramsOffered()
    {
    ?>
        <!-- Total Programs Offered -->
        <div class="col-lg-6 col-md-6 col-sm-12">
            <div class="card pb-1">
                <div class="card-header d-flex justify-content-between">
                    <div class="card-title mb-0">
                        <h5 class="mb-0">Programs Offered</h5>
                        <small class="text-muted">A.Y 2023 - 2024</small>
                    </div>
                </div>
                <div class="card-body">
                    <ul class="p-0 m-0">
                        <li class="mb-4 pb-1 d-flex justify-content-between align-items-center">
                            <div class="d-flex justify-content-between w-100 flex-wrap">
                                <h6 class="mb-0 ms-3">Bachelor of Science in Information System</h6>
                                <div class="d-flex">
                                    <p class="mb-0 fw-medium">1,111</p>
                                    <p class="ms-3 text-warning mb-0">26%</p>
                                </div>
                            </div>
                        </li>
                        <li class="mb-4 pb-1 d-flex justify-content-between align-items-center">
                            <div class="d-flex justify-content-between w-100 flex-wrap">
                                <h6 class="mb-0 ms-3">Bachelor of Science in Psychology</h6>
                                <div class="d-flex">
                                    <p class="mb-0 fw-medium">3,089</p>
                                    <p class="ms-3 text-success mb-0">57%%</p>
                                </div>
                            </div>
                        </li>
                        <li class="mb-4 pb-1 d-flex justify-content-between align-items-center">
                            <div class="d-flex justify-content-between w-100 flex-wrap">
                                <h6 class="mb-0 ms-3">Bachelor of Science in Nursing</h6>
                                <div class="d-flex">
                                    <p class="mb-0 fw-medium">705</p>
                                    <p class="ms-3 text-warning mb-0">17%</p>
                                </div>
                            </div>
                        </li>
                        <li class="mb-4 pb-1 d-flex justify-content-between align-items-center">
                            <div class="d-flex justify-content-between w-100 flex-wrap">
                                <h6 class="mb-0 ms-3">Bachelor of Science in Engineering</h6>
                                <div class="d-flex">
                                    <p class="mb-0 fw-medium">624</p>
                                    <p class="ms-3 text-warning mb-0">15%</p>
                                </div>
                            </div>
                        </li>
                        <li class="mb-4 pb-1 d-flex justify-content-between align-items-center">
                            <div class="d-flex justify-content-between w-100 flex-wrap">
                                <h6 class="mb-0 ms-3">Diploma in Midwifery</h6>
                                <div class="d-flex">
                                    <p class="mb-0 fw-medium">989</p>
                                    <p class="ms-3 text-warning mb-0">22%</p>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!--/ Total Programs Offered -->
    <?php
    }

    public function dashboardContent()
    {
    ?>
        <div class="layout-wrapper layout-navbar-full layout-horizontal layout-without-menu">
            <div class="layout-container">
                <!-- Header -->
                <?php $this->header($this->data); ?>
                <!-- / Header -->

                <!-- Layout container -->
                <div class="layout-page">
                    <!-- Content wrapper -->
                    <div class="content-wrapper">
                        <!-- Navbar -->
                        <?php $this->navbar($this->data); ?>
                        <div class="container-xxl flex-grow-1 container-p-y">
                            <div class="row">
                                <?php
                                $this->studentOverview($this->data);
                                $this->studentGradeOverview($this->data);
                                $this->totalSubmittedGrades($this->data);
                                $this->totalProgramsOffered($this->data);
                                ?>
                            </div>
                        </div>

                        <?php $this->footer();  ?>
                        <!-- / Footer -->

                        <div class="content-backdrop fade"></div>
                    </div>
                    <!--/ Content wrapper -->
                </div>

                <!--/ Layout container -->
            </div>
        </div>
    <?php
    }

    public function programsContent()
    {
    ?>
        <!-- Layout wrapper -->
        <div class="layout-wrapper layout-navbar-full layout-horizontal layout-without-menu">
            <div class="layout-container">
                <!-- Header -->
                <?php $this->header(); ?>
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
                                <h5 class="py-2 mb-4">
                                    <span class="text-muted fw-light"><a href="index.php" class="text-success">Dashboard</a> /</span> Programs
                                </h5>
                                <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#retrieveProgram">Retrieve Program</button>
                            </div>
                            <!-- Program Table -->
                            <div class="card">
                                <div class="card-datatable table-responsive">
                                    <table class="datatables-programs table">
                                        <thead class="border-top">
                                            <tr>
                                                <th>Program ID</th>
                                                <th>Program Name</th>
                                                <th>Program Code</th>
                                                <th>Date Created</th>
                                                <th>actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $programData = $this->program;
                                            if (!$programData) {
                                            ?>
                                                <tr>
                                                    <td colspan="5">
                                                        <h4 class="text-center text-danger mt-2">No programs found yet!</h4>
                                                    </td>
                                                </tr>
                                                <?php
                                            } else {
                                                foreach ($programData as $programItem => $data) {
                                                    $dateString = $data['date_added'];
                                                    $timestamp = strtotime($dateString);
                                                    $formattedDate = date("F j, Y, g:i a", $timestamp);
                                                ?>
                                                    <tr>
                                                        <td><?= $data['program_id'] ?></td>
                                                        <td><?= $data['program_name'] ?></td>
                                                        <td><?= $data['program_code'] ?></td>
                                                        <td><?= $formattedDate ?></td>
                                                        <td>
                                                            <div class="d-inline-block text-nowrap"><button class="btn btn-sm btn-icon dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="ti ti-dots-vertical me-2"></i></button>
                                                                <div class="dropdown-menu dropdown-menu-end m-0">
                                                                    <button id="updateButton" data-bs-toggle="modal" data-bs-target="#editProgram" href="javascript:0;" class="dropdown-item" onclick="editProgramDataJS('<?= htmlspecialchars(json_encode($data)); ?>')">
                                                                        <i class="ti ti-edit ms-1"></i>Update
                                                                    </button>
                                                                    <button href="javascript:0;" data-bs-toggle="modal" data-bs-target="#exampleModal" onclick="archiveProgramDataJS('<?= htmlspecialchars(json_encode($data)); ?>')" class="dropdown-item bg-danger text-white"><i class="ti ti-trash ms-1"></i>Archive</button>

                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                            <?php
                                                }
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- Program Table -->
                        </div>
                        <!--/ Content -->
                        <!-- Footer -->
                        <?php $this->navbar(); ?>

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

        <!-- Add Program Modal -->
        <div class="modal fade" id="addProgram" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-simple modal-edit-user modal-dialog-centered">
                <div class="modal-content p-3 p-md-5">
                    <div class="modal-body">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        <div class="text-center mb-4">
                            <h3 class="mb-2">Add Program Information</h3>
                        </div>
                        <form class="row g-3" method="POST" action="program.action.php">
                            <input type="hidden" value="<?= $this->active_page ?>" name="current_page">
                            <div class="col-12 col-md-12">
                                <label class="form-label">Program Name</label>
                                <input type="text" class="form-control" name="program_name" placeholder="Enter program name" required />
                            </div>
                            <div class="col-12 col-md-12">
                                <label class="form-label">Program Code</label>
                                <input type="text" class="form-control" name="program_code" placeholder="Enter program code" required />
                            </div>
                            <div class="col-12 text-center">
                                <button type="submit" name="add_program" class="btn btn-success me-sm-3 me-1">Create Program</button>
                                <button type="reset" class="btn btn-label-secondary" data-bs-dismiss="modal" aria-label="Close">Cancel</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Add Program Modal -->

        <!-- Edit Program Modal -->
        <div class="modal fade" id="editProgram" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-simple modal-edit-user modal-dialog-centered">
                <div class="modal-content p-3 p-md-5">
                    <div class="modal-body">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        <div class="text-center mb-4">
                            <h3 class="mb-2">Update Program Information</h3>
                        </div>
                        <form class="row g-3" action="program.action.php" method="POST">

                            <input type="hidden" value="<?= $this->active_page ?>" name="current_page">

                            <input type="hidden" name="programId" id="programId" readonly>
                            <div class="col-12 col-md-12">
                                <label class="form-label">Program Name</label>
                                <input type="text" class="form-control" name="editProgramName" id="editProgramName" placeholder="Enter program name" required />
                            </div>
                            <div class="col-12 col-md-12">
                                <label class="form-label">Program Code</label>
                                <input type="text" class="form-control" name="editProgramCode" id="editProgramCode" placeholder="Enter program code" required />
                            </div>
                            <div class="col-12 text-center">
                                <button type="submit" name="edit_program" class="btn btn-success me-sm-3 me-1">Save Changes</button>
                                <button type="reset" class="btn btn-label-secondary" data-bs-dismiss="modal" aria-label="Close">Cancel</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Edit Program Modal -->

        <!-- Archive Program Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Are you sure u want to archived this data?
                        <form action="program.action.php" method="POST">
                            <input type="hidden" value="<?= $this->active_page ?>" name="current_page">
                            <input type="hidden" name="archiveProgramId" id="archiveProgramId">
                            <input type="hidden" name="archiveProgramName" id="archiveProgramName">
                            <input type="hidden" name="archiveProgramCode" id="archiveProgramCode">

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" name="archive_program" class="btn btn-danger">Archive</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Archive Program Modal -->

        <!-- Retrieve Program Modal -->
        <div class="modal fade" id="retrieveProgram" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-simple modal-edit-user modal-dialog-centered">
                <div class="modal-content p-3 p-md-5">
                    <div class="modal-body">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        <div class="text-center mb-4">
                            <h3 class="mb-2">Retrieve Information</h3>
                        </div>
                        <div class="card-datatable table-responsive">
                            <table class="datatables-programs table">
                                <thead class="border-top">
                                    <tr>
                                        <th>Program Name</th>
                                        <th>Program Code</th>
                                        <th>actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $programData = $this->archivedProgram;
                                    if (!$programData) {
                                    ?>
                                        <tr>
                                            <td colspan="5">
                                                <h4 class="text-center text-danger mt-2">No programs found yet!</h4>
                                            </td>
                                        </tr>
                                        <?php
                                    } else {
                                        foreach ($programData as $programItem => $data) {
                                        ?>
                                            <tr>
                                                <td><?= $data['program_name'] ?></td>
                                                <td><?= $data['program_code'] ?></td>
                                                <td>
                                                    <form method="POST" action="program.action.php">
                                                    <input type="hidden" value="<?= $this->active_page ?>" name="current_page">
                                                        <input type="hidden" name="program_id" value="<?= $data['program_id'] ?>">
                                                        <button type="submit" class="btn btn-sm btn-primary" name="unarchive_program">
                                                            <i class="ti ti-edit ms-1"></i>Retrieve
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                    <?php
                                        }
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Retrieve Program Modal -->

<?php
    }
}
?>
