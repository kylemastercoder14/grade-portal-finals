<?php
include('includes/includes.php');
class View
{
    private $data, $assignAdviser, $archivedAssignAdviser, $classList, $archivedClassList, $gradeCriteria, $archivedGradeCriteria;
    public $active_page;

    public $statusDashboard;
    public $statusAdvises;
    public $statusSubjectTaught;

    public function __construct(
        $page, 
        $dataArr = null,
        $unarchivedAssignAdviser = null,
        $archivedAssignAdviser = null,
        $unarchivedClassList = null,
        $archivedClassList = null,
        $unarchivedGradeCriteria = null,
        $archivedGradeCriteria = null,
    )
    {
        $this->data = $dataArr;
        $this->active_page = $page;
        $this->assignAdviser = $unarchivedAssignAdviser;
        $this->archivedAssignAdviser = $archivedAssignAdviser;
        $this->classList = $unarchivedClassList;
        $this->archivedClassList = $archivedClassList;
        $this->gradeCriteria = $unarchivedGradeCriteria;
        $this->archivedGradeCriteria = $archivedGradeCriteria;

        switch ($this->active_page) {
            case 'dashboard':
                $this->statusDashboard = 'active';
                break;
            case 'advisor':
                $this->statusAdvises = 'active';
                break;
            case 'subject_taught':
                $this->statusSubjectTaught = 'active';
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

                    <li class="menu-item <?php echo $this->statusAdvises ?>">
                        <a href="advisory.php" class="menu-link">
                            <i class="menu-icon tf-icons ti ti-users"></i>
                            <div data-i18n="Advisory">Advisory</div>
                        </a>
                    </li>

                    <li class="menu-item <?php echo $this->statusSubjectTaught ?>">
                        <a href="handled-courses.php" class="menu-link">
                            <i class="menu-icon tf-icons ti ti-notebook"></i>
                            <div data-i18n="Handled Courses">Handled Courses</div>
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
                            DASHBOARD
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

    public function advisorContent()
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
                                <h5 class="py-2">
                                    <span class="text-muted fw-light"><a href="index.php" class="text-success">Dashboard</a> /</span> Advisory
                                </h5>
                            </div>
                            <!-- Program Table -->
                            <div class="card">
                                <div class="card-body table-responsive">
                                    <table id="advisoryDatatable" class="table display compact">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Section</th>
                                                <th>Date Created</th>
                                                <th>actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $assignAdvisers = $this->assignAdviser;
                                            if (!$assignAdvisers) {
                                            ?>
                                                <tr>
                                                    <td colspan="5">
                                                        <h4 class="text-center text-danger mt-2">No data found yet!</h4>
                                                    </td>
                                                </tr>
                                                <?php
                                            } else {
                                                foreach ($assignAdvisers as $assignAdviser => $data) {
                                                    $dateString = $data['date_added'];
                                                    $timestamp = strtotime($dateString);
                                                    $formattedDate = date("F j, Y, g:i a", $timestamp);
                                                ?>
                                                    <tr>
                                                        <td><?= $data['advises_id'] ?></td>
                                                        <td><?= $data['section_name'] ?></td>
                                                        <td><?= $formattedDate ?></td>
                                                        <td>
                                                            <a class="btn btn-success" href="class-list.php?section_id=<?= $data['section_id'] ?>&program_id=<?= $data['program_id'] ?>&year_level=<?= $data['year_level'] ?>">View Class List</a>
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
    <?php
    }

    public function advisesContent()
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
                                <h5 class="py-2">
                                    <span class="text-muted fw-light"><a href="index.php" class="text-success">Dashboard</a> /</span> Class List
                                </h5>
                            </div>
                            <!-- Program Table -->
                            <div class="card">
                                <div class="card-body table-responsive">
                                    <table id="advisoryDatatable" class="table display compact">
                                        <form action="action.php" method="POST">
                                        <thead>
                                            <?php
                                            $gradeCriteria = $this->gradeCriteria;
                                            $others = $gradeCriteria['others'];
                                            ?>
                                            <tr>
                                                <th>Student ID</th>
                                                <th>Name</th>
                                                <th>Quizzes</th>
                                                <th>Assignments</th>
                                                <th>Seatwork</th>
                                                <th>Examination</th>
                                                <?= $others != null ? "" : "<th>Others</th>" ?>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $classLists = $this->classList;
                                            if (!$classLists) {
                                            ?>
                                                <tr>
                                                    <td colspan="5">
                                                        <h4 class="text-center text-danger mt-2">No data found yet!</h4>
                                                    </td>
                                                </tr>
                                                <?php
                                            } else {
                                                foreach ($classLists as $classList => $data) {
                                                    $fullName = $data['firstname'] . " " . $data['middlename'] . " " . $data['lastname'] . " " . $data['suffix'];
                                                ?>
                                                    <tr>
                                                        <td style="min-width: 300px"><?= $data['student_id'] ?></td>
                                                        <td style="min-width: 300px"><?= $fullName ?></td>
                                                        <td><input type="text" class="form-control" name="quizzes" placeholder="<?= $gradeCriteria['quizzes'] . "%" ?>"></td>
                                                        <td><input type="text" class="form-control" name="assignment" placeholder="<?= $gradeCriteria['assignment'] . "%" ?>"></td>
                                                        <td><input type="text" class="form-control" name="seatwork" placeholder="<?= $gradeCriteria['seatwork'] . "%" ?>"></td>
                                                        <td><input type="text" class="form-control" name="examination" placeholder="<?= $gradeCriteria['examination'] . "%" ?>"></td>
                                                        <?= $others != null ? "" : '<td><input type="text" name="others" class="form-control" placeholder="'.$gradeCriteria['others'].'"></td>' ?>
                                                        
                                                    </tr>
                                            <?php
                                                }
                                            }
                                            ?>
                                        </tbody>
                                        </form>
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
    <?php
    }
}
?>