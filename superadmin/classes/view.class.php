<?php
include('includes/includes.php');
class View
{
    private $data, $program, $archivedProgram, $section, $archivedSection, $subject, $archivedSubject, $student, $archivedStudent, $advisor, $archivedAdvisor, $filterStudent, $subjectTaught, $archivedSubjectTaught, $gradingCriteria, $archivedGradingCriteria, $assignAdviser, $archivedAssignAdviser, $assignSubjectTeacher, $archivedAssignSubjectTeacher, $semester, $archivedSemester;
    public $active_page;
    public $statusDashboard;
    public $statusYearlevel;
    public $statusPrograms;
    public $statusSections;
    public $statusSubjects;
    public $statusStudents;
    public $statusTeacher;
    public $statusClassList;
    public $statusSubjectTaught;
    public $statusAdvises;
    public $statusSectionSubject;
    public $statusGradingsystem;
    public $statusSemester;

    public function __construct(
        $data_arr = null,
        $page,
        $unarchiveProgram = null,
        $archivedProgram = null,
        $unarchiveSection = null,
        $archivedSection = null,
        $unarchiveSubject = null,
        $archivedSubject = null,
        $unarchiveStudent = null,
        $archivedStudent = null,
        $unarchiveAdvisor = null,
        $archivedAdvisor = null,
        $unarchiveSubjectTaught = null,
        $archivedSubjectTaught = null,
        $unarchiveGradingCriteria = null,
        $archivedGradingCriteria = null,
        $unarchivedAssignAdviser = null,
        $archivedAssignAdviser = null,
        $unarchivedAssignSubjectTeacher = null,
        $archivedAssignSubjectTeacher = null,
        $unarchivedSemester = null,
        $archivedSemester = null,
        $filterStudent = null,
    ) {
        $this->data = $data_arr;
        $this->program = $unarchiveProgram;
        $this->archivedProgram = $archivedProgram;
        $this->section = $unarchiveSection;
        $this->archivedSection = $archivedSection;
        $this->subject = $unarchiveSubject;
        $this->archivedSubject = $archivedSubject;
        $this->student = $unarchiveStudent;
        $this->archivedStudent = $archivedStudent;
        $this->advisor = $unarchiveAdvisor;
        $this->archivedAdvisor = $archivedAdvisor;
        $this->subjectTaught = $unarchiveSubjectTaught;
        $this->archivedSubjectTaught = $archivedSubjectTaught;
        $this->gradingCriteria = $unarchiveGradingCriteria;
        $this->archivedGradingCriteria = $archivedGradingCriteria;
        $this->assignAdviser = $unarchivedAssignAdviser;
        $this->archivedAssignAdviser = $archivedAssignAdviser;
        $this->assignSubjectTeacher = $unarchivedAssignSubjectTeacher;
        $this->archivedAssignSubjectTeacher = $archivedAssignSubjectTeacher;
        $this->semester = $unarchivedSemester;
        $this->archivedSemester = $archivedSemester;
        $this->filterStudent = $filterStudent;
        $this->active_page = $page;

        switch ($this->active_page) {
            case 'dashboard':
                $this->statusDashboard = 'active';
                break;
            case 'program':
                $this->statusPrograms = 'active';
                break;
            case 'section':
                $this->statusSections = 'active';
                break;
            case 'course': //subject
                $this->statusSubjects = 'active';
                break;
            case 'student':
                $this->statusStudents = 'active';
                break;
            case 'advisor':
                $this->statusTeacher = 'active';
                break;
            case 'class_list':
                $this->statusClassList = 'active';
                break;
            case 'subject_taught':
                $this->statusSubjectTaught = 'active';
                break;
            case 'advises':
                $this->statusAdvises = 'active';
                break;
            case 'subject_course':
                $this->statusSectionSubject = 'active';
                break;
            case 'grading_system':
                $this->statusGradingsystem = 'active';
                break;
            case 'semester':
                $this->statusSemester = 'active';
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
                                    <img src="assets/images/dummy.png" alt class="h-auto rounded-circle" />
                                </div>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li>
                                    <a class="dropdown-item" href="javascript:void(0)">
                                        <div class="d-flex">
                                            <div class="flex-shrink-0 me-3">
                                                <div class="avatar avatar-online">
                                                    <img src="assets/images/dummy.png" alt="avatar" class="h-auto rounded-circle" />
                                                </div>
                                            </div>
                                            <div class="flex-grow-1">
                                                <span class="fw-medium d-block">KLD ADMIN</span>
                                                <small class="text-muted">superadmin</small>
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
        <!-- BACKUP MODAL -->
        <div class="modal fade" id="backupModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <form action="action.php" method="POST" class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Backup Database</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Are you sure u want to backup this database? Please enter pin first.
                        <div class="mt-3">
                            <input type="password" class="form-control" name="okaylang" placeholder="XX-XXX-X">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" name="okaykaba?" class="btn btn-danger">Backup</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
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
                            <li class="menu-item <?php echo $this->statusPrograms ?>">
                                <a href="programs.php" class="menu-link">
                                    <i class="menu-icon tf-icons ti ti-layout-sidebar"></i>
                                    <div data-i18n="Programs">Programs</div>
                                </a>
                            </li>
                            <li class="menu-item <?php echo $this->statusSections ?>">
                                <a href="sections.php" class="menu-link">
                                    <i class="menu-icon tf-icons ti ti-table"></i>
                                    <div data-i18n="Sections">Sections</div>
                                </a>
                            </li>
                            <li class="menu-item <?php echo $this->statusSubjects ?>">
                                <a href="subjects.php" class="menu-link">
                                    <i class="menu-icon tf-icons ti ti-book"></i>
                                    <div data-i18n="Courses">Courses</div>
                                </a>
                            </li>
                            <li class="menu-item <?php echo $this->statusClassList ?>">
                                <a href="class-list.php" class="menu-link">
                                    <i class="menu-icon tf-icons ti ti-folder"></i>
                                    <div data-i18n="Class List">Class List</div>
                                </a>
                            </li>
                            <li class="menu-item <?php echo $this->statusSemester ?>">
                                <a href="semester.php" class="menu-link">
                                    <i class="menu-icon tf-icons ti ti-calendar"></i>
                                    <div data-i18n="Semester">Semester</div>
                                </a>
                            </li>
                            <li class="menu-item <?php echo $this->statusGradingsystem ?>">
                                <a href="grading-criteria.php" class="menu-link">
                                    <i class="menu-icon tf-icons ti ti-percentage"></i>
                                    <div data-i18n="Grading Criteria">Grading Criteria</div>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="menu-item <?php echo $this->statusStudents ?>">
                        <a href="students.php" class="menu-link">
                            <i class="menu-icon tf-icons ti ti-users"></i>
                            <div data-i18n="Students">Students</div>
                        </a>
                    </li>

                    <li class="menu-item">
                        <a href="javascript:void(0)" class="menu-link menu-toggle">
                            <i class="menu-icon tf-icons ti ti-id"></i>
                            <div data-i18n="Faculties">Faculties</div>
                        </a>
                        <ul class="menu-sub">
                            <li class="menu-item <?php echo $this->statusTeacher ?>">
                                <a href="faculties.php" class="menu-link">
                                    <i class="menu-icon tf-icons ti ti-users"></i>
                                    <div data-i18n="Instructor">Instructors</div>
                                </a>
                            </li>
                            <li class="menu-item <?php echo $this->statusSubjectTaught ?>">
                                <a href="subject-taught.php" class="menu-link">
                                    <i class="menu-icon tf-icons ti ti-notebook"></i>
                                    <div data-i18n="Subject Taught">Subject Taught</div>
                                </a>
                            </li>
                            <li class="menu-item <?php echo $this->statusAdvises ?>">
                                <a href="assign-adviser.php" class="menu-link">
                                    <i class="menu-icon tf-icons ti ti-building"></i>
                                    <div data-i18n="Advisers">Advisers</div>
                                </a>
                            </li>
                            <li class="menu-item <?php echo $this->statusSectionSubject ?>">
                                <a href="assign-subject-teacher.php" class="menu-link">
                                    <i class="menu-icon tf-icons ti ti-pencil"></i>
                                    <div data-i18n="Section Subject Teacher">Section Subject Teacher</div>
                                </a>
                            </li>
                        </ul>
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
                        <a href="#" data-bs-toggle="modal" data-bs-target="#backupModal" class="menu-link btn btn-primary text-white">
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
                                <h5 class="py-2">
                                    <span class="text-muted fw-light"><a href="index.php" class="text-success">Dashboard</a> /</span> Programs
                                </h5>
                                <div class="d-flex align-items-center gap-3 mb-4">
                                    <button class="btn btn-primary d-flex align-items-center gap-1" data-bs-toggle="modal" data-bs-target="#retrieveProgram">
                                        <i class="ti ti-edit"></i>
                                        <span>Retrieve Data</span>
                                    </button>
                                    <button class="btn btn-success d-flex align-items-center gap-1" data-bs-toggle="modal" data-bs-target="#addProgram">
                                        <i class="ti ti-plus"></i>
                                        <span>Add Program</span>
                                    </button>
                                </div>
                            </div>
                            <!-- Program Table -->
                            <div class="card">
                                <div class="card-body table-responsive">
                                    <table id="programDatatable" class="table display compact">
                                        <thead>
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
                                                                    <button href="javascript:0;" data-bs-toggle="modal" data-bs-target="#archiveProgram" onclick="archiveProgramDataJS('<?= htmlspecialchars(json_encode($data)); ?>')" class="dropdown-item bg-danger text-white"><i class="ti ti-trash ms-1"></i>Archive</button>

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
                        <form class="row g-3" method="POST" action="action.php">
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
                        <form class="row g-3" action="action.php" method="POST">

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
        <div class="modal fade" id="archiveProgram" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <form action="action.php" method="POST" class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Archive Data</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Are you sure you want to archived this data?
                        <div>
                            <input type="hidden" value="<?= $this->active_page ?>" name="current_page">
                            <input type="hidden" name="archiveProgramId" id="archiveProgramId">
                            <input type="hidden" name="archiveProgramName" id="archiveProgramName">
                            <input type="hidden" name="archiveProgramCode" id="archiveProgramCode">

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" name="archive_program" class="btn btn-danger">Archive</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- Archive Program Modal -->

        <!-- Retrieve Program Modal -->
        <div class="modal fade" id="retrieveProgram" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-xl modal-simple modal-edit-user modal-dialog-centered">
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
                                                    <form method="POST" action="action.php">
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
    public function sectionContent()
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
                                    <span class="text-muted fw-light"><a href="index.php" class="text-success">Dashboard</a> /</span> Sections
                                </h5>
                                <div class="d-flex align-items-center gap-3 mb-4">
                                    <button class="btn btn-primary d-flex align-items-center gap-1" data-bs-toggle="modal" data-bs-target="#retrieveSection">
                                        <i class="ti ti-edit"></i>
                                        <span>Retrieve Data</span>
                                    </button>
                                    <button class="btn btn-success d-flex align-items-center gap-1" data-bs-toggle="modal" data-bs-target="#addSection">
                                        <i class="ti ti-plus"></i>
                                        <span>Add Section</span>
                                    </button>
                                </div>
                            </div>
                            <!-- Program Table -->
                            <div class="card">
                                <div class="card-body table-responsive">
                                    <table id="sectionDatatable" class="table display compact">
                                        <thead>
                                            <tr>
                                                <th>Section ID</th>
                                                <th>Program</th>
                                                <th>Section</th>
                                                <th>Date Created</th>
                                                <th>actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $sectionData = $this->section;
                                            if (!$sectionData) {
                                            ?>
                                                <tr>
                                                    <td colspan="5">
                                                        <h4 class="text-center text-danger mt-2">No sections found yet!</h4>
                                                    </td>
                                                </tr>
                                                <?php
                                            } else {
                                                foreach ($sectionData as $sectionItem => $data) {
                                                    $dateString = $data['date_added'];
                                                    $timestamp = strtotime($dateString);
                                                    $formattedDate = date("F j, Y, g:i a", $timestamp);
                                                ?>
                                                    <tr>
                                                        <td><?= $data['section_id'] ?></td>
                                                        <td><?= $data['program_id'] ?></td>
                                                        <td><?= $data['section_name'] ?></td>
                                                        <td><?= $formattedDate ?></td>
                                                        <td>
                                                            <div class="d-inline-block text-nowrap"><button class="btn btn-sm btn-icon dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="ti ti-dots-vertical me-2"></i></button>
                                                                <div class="dropdown-menu dropdown-menu-end m-0">

                                                                    <button id="updateButton" data-bs-toggle="modal" data-bs-target="#editSection" href="javascript:0;" class="dropdown-item" onclick="editSectionDataJS('<?= htmlspecialchars(json_encode($data)); ?>')"><i class="ti ti-edit ms-1"></i>Update
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

        <!-- Add Program Modal -->
        <div class="modal fade" id="addSection" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-simple modal-edit-user modal-dialog-centered">
                <div class="modal-content p-3 p-md-5">
                    <div class="modal-body">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        <div class="text-center mb-4">
                            <h3 class="mb-2">Add Section Information</h3>
                        </div>
                        <form class="row g-3" action="action.php" method="POST">
                            <input type="hidden" value="<?= $this->active_page ?>" name="current_page">
                            <div class="col-12 col-md-12">
                                <label class="form-label">Year Level</label>
                                <select class="form-select" name="year_level">
                                    <option value="1st year">1st Year</option>
                                    <option value="2nd Year">2nd Year</option>
                                    <option value="3rd Year">3rd Year</option>
                                    <option value="4th Year">4th Year</option>
                                </select>
                            </div>
                            <div class="col-12 col-md-12">
                                <label class="form-label">Program</label>
                                <select name="program_id" class="form-select">
                                    <?php
                                    $program = $this->program;
                                    foreach ($program as $programItem => $data) {
                                    ?>
                                        <option value="<?= $data['program_id'] ?>"><?= $data['program_name'] ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="col-12 col-md-12">
                                <label class="form-label">Section Name</label>
                                <input type="text" name="section_name" class="form-control" placeholder="Enter section name">
                            </div>
                            <div class="col-12 text-center">
                                <button type="submit" name="add_section" class="btn btn-success me-sm-3 me-1">Create Section</button>
                                <button type="reset" class="btn btn-label-secondary" data-bs-dismiss="modal" aria-label="Close">Cancel</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Add Section Modal -->

        <!-- Edit Section Modal -->
        <div class="modal fade" id="editSection" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-simple modal-edit-user modal-dialog-centered">
                <div class="modal-content p-3 p-md-5">
                    <div class="modal-body">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        <div class="text-center mb-4">
                            <h3 class="mb-2">Update Section Information</h3>
                        </div>

                        <form class="row g-3" action="action.php" method="POST">
                            <input type="hidden" value="<?= $this->active_page ?>" name="current_page">
                            <input type="hidden" name="editSectionId" id="editSectionId" readonly>
                            <div class="col-12 col-md-12">
                                <label class="form-label">Year Level</label>
                                <select id="editSectionId" class="form-select" name="editSectionId">
                                    <?php
                                    $section = $this->section;
                                    foreach ($section as $sectionItem => $sectionData) {
                                    ?>
                                        <option value="<?= $sectionData['year_level'] ?>"><?= $sectionData['year_level'] ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="col-12 col-md-12">
                                <label class="form-label">Program</label>
                                <select id="editProgramCode" name="editProgramCode" class="form-select">
                                    <?php
                                    $program = $this->program;
                                    foreach ($program as $programItem => $data) {
                                    ?>
                                        <option value="<?= $data['program_code'] ?>"><?= $data['program_code'] ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="col-12 col-md-12">
                                <label class="form-label">Section Name</label>
                                <input type="text" id="editSectionName" name="editSectionName" class="form-control" placeholder="Enter generated section name">
                            </div>
                            <div class="col-12 text-center">
                                <button type="submit" name="update_section" class="btn btn-success me-sm-3 me-1">Save Changes</button>
                                <button type="reset" class="btn btn-label-secondary" data-bs-dismiss="modal" aria-label="Close">Cancel</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Edit Program Modal -->
    <?php
    }
    public function subjectContent()
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
                                <h5 class="py-2">
                                    <span class="text-muted fw-light"><a href="index.php" class="text-success">Dashboard</a> /</span> Courses
                                </h5>
                                <div class="d-flex align-items-center gap-3 mb-4">
                                    <button class="btn btn-primary d-flex align-items-center gap-1" data-bs-toggle="modal" data-bs-target="#retrieveCourses">
                                        <i class="ti ti-edit"></i>
                                        <span>Retrieve Data</span>
                                    </button>
                                    <button class="btn btn-success d-flex align-items-center gap-1" data-bs-toggle="modal" data-bs-target="#addCourse">
                                        <i class="ti ti-plus"></i>
                                        <span>Add Course</span>
                                    </button>
                                </div>
                            </div>
                            <!-- Program Table -->
                            <div class="card">
                                <div class="card-body table-responsive">
                                    <table id="courseDatatable" class="table display compact">
                                        <thead>
                                            <tr>
                                                <th>Course ID</th>
                                                <th>Course Name</th>
                                                <th>Course Code</th>
                                                <th>Course Unit</th>
                                                <th>Pre-requisite Subject</th>
                                                <th>Date Created</th>
                                                <th>actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $subjectData = $this->subject;
                                            if (!$subjectData) {
                                            ?>
                                                <tr>
                                                    <td colspan="5">
                                                        <h4 class="text-center text-danger mt-2">No course found yet!</h4>
                                                    </td>
                                                </tr>
                                                <?php
                                            } else {
                                                foreach ($subjectData as $SubjectItem => $data) {
                                                    $dateString = $data['date_added'];
                                                    $timestamp = strtotime($dateString);
                                                    $formattedDate = date("F j, Y, g:i a", $timestamp);
                                                ?>
                                                    <tr>
                                                        <td><?= $data['course_id'] ?></td>
                                                        <td><?= $data['course_name'] ?></td>
                                                        <td><?= $data['course_code'] ?></td>
                                                        <td><?= $data['course_unit'] ?></td>
                                                        <td><?= $data['pre_requisite'] === "" ? "N/A" : $data['pre_requisite'] ?></td>
                                                        <td><?= $formattedDate ?></td>
                                                        <td>
                                                            <div class="d-inline-block text-nowrap"><button class="btn btn-sm btn-icon dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="ti ti-dots-vertical me-2"></i></button>
                                                                <div class="dropdown-menu dropdown-menu-end m-0">

                                                                    <button id="updateButton" data-bs-toggle="modal" data-bs-target="#editSection" href="javascript:0;" class="dropdown-item" onclick="editSectionDataJS('<?= htmlspecialchars(json_encode($data)); ?>')"><i class="ti ti-edit ms-1"></i>Update
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

        <!-- Add Subject Modal -->
        <div class="modal fade" id="addCourse" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-simple modal-edit-user modal-dialog-centered">
                <div class="modal-content p-3 p-md-5">
                    <div class="modal-body">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        <div class="text-center mb-4">
                            <h3 class="mb-2">Add Course Information</h3>
                        </div>
                        <form class="row g-3" action="action.php" method="POST">
                            <input type="hidden" value="<?= $this->active_page ?>" name="current_page">
                            <div class="col-12 col-md-12">
                                <label class="form-label">Course Name</label>
                                <input type="text" class="form-control" name="course_name" placeholder="Enter course name" required />
                            </div>
                            <div class="col-12 col-md-12">
                                <label class="form-label">Course Code</label>
                                <input type="text" class="form-control" name="course_code" placeholder="Enter course code" required />
                            </div>
                            <div class="col-12 col-md-12">
                                <label class="form-label">Course Unit</label>
                                <input type="number" class="form-control" name="course_unit" placeholder="Enter course unit" required />
                            </div>
                            <div class="col-12 col-md-12">
                                <label class="form-label">Pre-requisite Subject (optional) <a href="#" class="text-danger fw-bold" data-bs-toggle="tooltip" data-bs-placement="top" title="If there is no prerequisite, leave it blank">(?)</a></label>
                                <select name="pre_requisite" class="form-select">
                                    <option value="" selected>Select pre-requisite subject</option>
                                    <?php
                                    $subjectSelect = $this->subject;
                                    foreach ($subjectSelect as $subjectItem => $data) {
                                    ?>
                                        <option value="<?= $data['course_name'] ?>"><?= $data['course_name'] ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="col-12 text-center">
                                <button type="submit" name="add_subject" class="btn btn-success me-sm-3 me-1">Create Subject</button>
                                <button type="reset" class="btn btn-label-secondary" data-bs-dismiss="modal" aria-label="Close">Cancel</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Add Subject Modal -->

        <!-- Edit Subject Modal -->
        <div class="modal fade" id="editSubject" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-simple modal-edit-user modal-dialog-centered">
                <div class="modal-content p-3 p-md-5">
                    <div class="modal-body">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        <div class="text-center mb-4">
                            <h3 class="mb-2">Update Section Information</h3>
                        </div>
                        <form class="row g-3" method="POST">
                            <div class="col-12 col-md-12">
                                <label class="form-label">Year Level</label>
                                <select class="form-select">
                                    <option value="" selected>Choose year level</option>
                                </select>
                            </div>
                            <div class="col-12 col-md-12">
                                <label class="form-label">Program</label>
                                <select class="form-select">
                                    <option value="" selected>Choose program</option>
                                </select>
                            </div>
                            <div class="col-12 col-md-12">
                                <label class="form-label">Subject</label>
                                <input type="text" class="form-control" placeholder="Enter subject" required />
                            </div>
                            <div class="col-12 col-md-12">
                                <label class="form-label">Pre-requisite Subject <a href="#" class="text-danger fw-bold" data-bs-toggle="tooltip" data-bs-placement="top" title="If there is no prerequisite, leave it blank">(?)</a></label>
                                <input type="text" class="form-control" placeholder="Enter pre-requisite subject" required />
                            </div>
                            <div class="col-12 text-center">
                                <button type="submit" class="btn btn-success me-sm-3 me-1">Save Changes</button>
                                <button type="reset" class="btn btn-label-secondary" data-bs-dismiss="modal" aria-label="Close">Cancel</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Edit Subject Modal -->
    <?php
    }
    public function studentContent()
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
                                    <span class="text-muted fw-light"><a href="index.php" class="text-success">Dashboard</a> /</span> Students
                                </h5>
                                <div class="d-flex align-items-center gap-3 mb-4">
                                    <button class="btn btn-primary d-flex align-items-center gap-1" data-bs-toggle="modal" data-bs-target="#retrieveStudent">
                                        <i class="ti ti-edit"></i>
                                        <span>Retrieve Data</span>
                                    </button>
                                    <button class="btn btn-success d-flex align-items-center gap-1" data-bs-toggle="modal" data-bs-target="#addStudent">
                                        <i class="ti ti-plus"></i>
                                        <span>Add Student</span>
                                    </button>
                                </div>
                            </div>
                            <!-- Student Table -->
                            <div class="card">
                                <div class="card-body table-responsive">
                                    <div class="card-title">Assign Section (this is for new enrolled students only):</div>
                                    <form method="GET" action="?year_level=$year_level&program_id=$program_id&section_id=$section_id" class="row mb-3">
                                        <div class="col-md-3">
                                            <label class="form-label">Year Level <span class="text-danger">*</span></label>
                                            <select class="form-select" id="yearLevel2" name="year_level" onchange="getSectionsStudents()">
                                                <option value="1st Year">1st Year</option>
                                                <option value="2nd Year">2nd Year</option>
                                                <option value="3rd Year">3rd Year</option>
                                                <option value="4th Year">4th Year</option>
                                            </select>
                                        </div>
                                        <div class="col-md-3">
                                            <label class="form-label">Program <span class="text-danger">*</span></label>
                                            <select class="form-select" id="programId2" name="program_id" onchange="getSectionsStudents()">
                                                <?php
                                                $programs = $this->program;
                                                foreach ($programs as $program => $data) {
                                                ?>
                                                    <option value="<?= $data['program_id'] ?>"><?= $data['program_name'] ?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="col-md-3">
                                            <label class="form-label">Section <span class="text-danger">*</span></label>
                                            <select class="form-select" id="sectionId2" name="section_id">
                                                <?php
                                                $sections = $this->section;
                                                foreach ($sections as $section => $data) {
                                                ?>
                                                    <option value="<?= $data['section_id'] ?>"><?= $data['section_name'] ?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="col-md-3 mt-4">
                                            <div class="d-flex align-items-center gap-2">
                                                <button type="submit" name="filter_class" class="btn btn-success w-100">Filter</button>
                                                <a href="students.php" class="btn btn-secondary w-100">Reset</a>
                                            </div>
                                        </div>
                                    </form>
                                    <table id="studentDatatable" class="display compact table">
                                        <thead>
                                            <tr>
                                                <th>Student Number</th>
                                                <th>Name</th>
                                                <th>Year Level</th>
                                                <th>Program</th>
                                                <th>Section</th>
                                                <th>Date Created</th>
                                                <th>actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $studentData = $this->student;
                                            $filterStudent = $this->filterStudent;
                                            if ($filterStudent == null) {
                                                foreach ($studentData as $studentItem => $data) {
                                                    $dateString = $data['date_added'];
                                                    $timestamp = strtotime($dateString);
                                                    $formattedDate = date("F j, Y, g:i a", $timestamp);
                                                    $fullname = $data['firstname'] . " " . $data['middlename'] . " " . $data['lastname'] . " " . $data['suffix'];
                                            ?>
                                                    <tr>
                                                        <td><?= $data['student_id'] ?></td>
                                                        <td><?= $fullname ?></td>
                                                        <td><?= $data['year_level'] == "" || null ? "N/A" : $data['year_level'] ?></td>
                                                        <td><?= $data['program_code'] ?></td>
                                                        <td><?= $data['section_name'] == "" || null ? "N/A" : $data['section_name'] ?></td>
                                                        <td><?= $formattedDate ?></td>
                                                        <td>
                                                            <div class="d-inline-block text-nowrap"><button class="btn btn-sm btn-icon dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="ti ti-dots-vertical me-2"></i></button>
                                                                <div class="dropdown-menu dropdown-menu-end m-0">
                                                                    <button id="updateButton" data-bs-toggle="modal" data-bs-target="#editSection" href="javascript:0;" class="dropdown-item" onclick="editSectionDataJS('<?= htmlspecialchars(json_encode($data)); ?>')"><i class="ti ti-edit ms-1"></i>Update
                                                                    </button>
                                                                    <button href="javascript:0;" data-bs-toggle="modal" data-bs-target="#exampleModal" onclick="archiveProgramDataJS('<?= htmlspecialchars(json_encode($data)); ?>')" class="dropdown-item bg-danger text-white"><i class="ti ti-trash ms-1"></i>Archive</button>

                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                <?php
                                                }
                                            } else {
                                                foreach ($filterStudent as $studentItem => $data) {
                                                    $dateString = $data['date_added'];
                                                    $timestamp = strtotime($dateString);
                                                    $formattedDate = date("F j, Y, g:i a", $timestamp);
                                                    $fullname = $data['firstname'] . " " . $data['middlename'] . " " . $data['lastname'] . " " . $data['suffix'];
                                                ?>
                                                    <tr>
                                                        <td><?= $data['student_id'] ?></td>
                                                        <td><?= $fullname ?></td>
                                                        <td><?= $data['year_level'] == "" || null ? "N/A" : $data['year_level'] ?></td>
                                                        <td><?= $data['program_code'] ?></td>
                                                        <td><?= $data['section_name'] == "" || null ? "N/A" : $data['section_name'] ?></td>
                                                        <td><?= $formattedDate ?></td>
                                                        <td>
                                                            <div class="d-inline-block text-nowrap"><button class="btn btn-sm btn-icon dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="ti ti-dots-vertical me-2"></i></button>
                                                                <div class="dropdown-menu dropdown-menu-end m-0">

                                                                    <button id="updateButton" data-bs-toggle="modal" data-bs-target="#editSection" href="javascript:0;" class="dropdown-item" onclick="editSectionDataJS('<?= htmlspecialchars(json_encode($data)); ?>')"><i class="ti ti-edit ms-1"></i>Update
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

        <!-- Add Student Modal -->
        <div class="modal fade" id="addStudent" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-xl modal-dialog-centered modal-simple modal-upgrade-plan">
                <div class="modal-content p-3 p-md-5">
                    <div class="modal-body p-2">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        <div class="text-center">
                            <h3 class="mb-2">Add Student Information</h3>
                        </div>
                        <div id="wizard-create-app" class="bs-stepper vertical mt-2 shadow-none">
                            <div class="bs-stepper-header border-0 p-1">
                                <div class="step" data-target="#personal">
                                    <button type="button" class="step-trigger">
                                        <span class="bs-stepper-circle"><i class="ti ti-user ti-sm"></i></span>
                                        <span class="bs-stepper-label">
                                            <span class="bs-stepper-title text-uppercase">Personal</span>
                                        </span>
                                    </button>
                                </div>
                                <div class="line"></div>
                                <div class="step" data-target="#educational">
                                    <button type="button" class="step-trigger">
                                        <span class="bs-stepper-circle"><i class="ti ti-notebook ti-sm"></i></span>
                                        <span class="bs-stepper-label">
                                            <span class="bs-stepper-title text-uppercase">Educational</span>
                                        </span>
                                    </button>
                                </div>
                            </div>
                            <div class="bs-stepper-content p-1">
                                <form method="POST" action="action.php">
                                    <!-- Personal -->
                                    <div id="personal" class="content pt-3 pt-lg-0">
                                        <input type="hidden" value="<?= $this->active_page ?>" name="current_page">
                                        <div class="row">
                                            <div class="col-md-12 mb-2">
                                                <label class="form-label">Curriculum <span class="text-danger">*</span></label>
                                                <div class="d-flex align-items-center gap-3">
                                                    <div class="d-flex align-items-center gap-2">
                                                        <input id="oldCurriculum" type="checkbox" class="form-check" value="Old" checked />
                                                        <span>Old</span>
                                                    </div>
                                                    <div class="d-flex align-items-center gap-2">
                                                        <input id="newCurriculum" type="checkbox" class="form-check" value="New" />
                                                        <span>New</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3 mb-2">
                                                <label class="form-label">First Name <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" name="firstname" placeholder="Enter first name" required />
                                            </div>
                                            <div class="col-md-3 mb-2">
                                                <label class="form-label">Middle Name</label>
                                                <input type="text" class="form-control" placeholder="Enter middle name" name="middlename" />
                                            </div>
                                            <div class="col-md-3 mb-2">
                                                <label class="form-label">Last Name <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" placeholder="Enter last name" name="lastname" required />
                                            </div>
                                            <div class="col-md-3 mb-2">
                                                <label class="form-label">Suffix</label>
                                                <input type="text" class="form-control" name="suffix" placeholder="JR, SR, III" />
                                            </div>
                                            <div class="col-md-6 mb-2">
                                                <label class="form-label">Date of Birth <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" name="birthdate" id="flatpickr-date" placeholder="YYYY-MM-DD" required />
                                            </div>
                                            <div class="col-md-6 mb-2">
                                                <label class="form-label">Age <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" name="age" placeholder="Enter age" required />
                                            </div>
                                            <div class="col-md-4 mb-2">
                                                <label class="form-label">Gender <span class="text-danger">*</span></label>
                                                <select class="form-select" name="gender" required>
                                                    <option value="" selected>Choose gender</option>
                                                    <option value="Male">Male</option>
                                                    <option value="Female">Female</option>
                                                </select>
                                            </div>
                                            <div class="col-md-4 mb-2">
                                                <label class="form-label">Civil Status <span class="text-danger">*</span></label>
                                                <select class="form-select" name="civil_status" required>
                                                    <option value="" selected>Choose civil status</option>
                                                    <option value="Single">Single</option>
                                                    <option value="Married">Married</option>
                                                    <option value="Widowed">Widowed</option>
                                                    <option value="Separated">Separated</option>
                                                </select>
                                            </div>
                                            <div class="col-md-4 mb-2">
                                                <label class="form-label">Contact Number <span class="text-danger">*</span></label>
                                                <input type="text" id="prefix-mask" class="form-control prefix-mask" name="contact_number" placeholder="Enter contact number" required />
                                            </div>
                                            <div class="col-md-4 mb-2">
                                                <label class="form-label">Province <span class="text-danger">*</span></label>
                                                <select class="form-select" id="province" required></select>
                                                <input type="hidden" id="provinceName" name="province">
                                            </div>
                                            <div class="col-md-4 mb-2">
                                                <label class="form-label">City <span class="text-danger">*</span></label>
                                                <select class="form-select" id="city" required></select>
                                                <input type="hidden" id="cityName" name="city">
                                            </div>
                                            <div class="col-md-4 mb-2">
                                                <label class="form-label">Barangay <span class="text-danger">*</span></label>
                                                <select class="form-select" id="barangay" required></select>
                                                <input type="hidden" id="barangayName" name="barangay">
                                            </div>
                                            <div class="col-md-9 mb-2">
                                                <label class="form-label">House No./Unit/Bldg/Street <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" name="house_no" placeholder="House No./Unit/Bldg/Street" required />
                                            </div>
                                            <div class="col-md-3 mb-2">
                                                <label class="form-label">Zip Code <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" name="zip_code" placeholder="Enter zip code" required />
                                            </div>
                                            <div class="col-12 d-flex justify-content-between mt-4">
                                                <button class="btn btn-label-secondary btn-prev" disabled> <i class="ti ti-arrow-left ti-xs me-sm-1 me-0"></i>
                                                    <span class="align-middle d-sm-inline-block d-none">Previous</span>
                                                </button>
                                                <button class="btn btn-primary btn-next"><span class="align-middle d-sm-inline-block d-none me-sm-1">Next</span> <i class="ti ti-arrow-right ti-xs"></i></button>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Educational -->
                                    <div id="educational" class="content pt-3 pt-lg-0">
                                        <div class="row">
                                            <div class="col-md-12 mb-2">
                                                <label class="form-label">Student Number <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" name="student_id" placeholder="Enter student number" required />
                                            </div>
                                            <div class="col-md-12 mb-2">
                                                <label class="form-label">KLD Email <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" name="kld_email" placeholder="Enter KLD email" required />
                                            </div>
                                            <div class="col-md-12 mb-2" id="hideYearlevel">
                                                <label class="form-label">Year Level <span class="text-danger">*</span></label>
                                                <select class="form-select" id="yearLevel3" name="year_level" onchange="getSectionsStudents()">
                                                    <option value="1st Year">1st Year</option>
                                                    <option value="2nd Year">2nd Year</option>
                                                    <option value="3rd Year">3rd Year</option>
                                                    <option value="4th Year">4th Year</option>
                                                </select>
                                            </div>
                                            <div id="programFull" class="col-md-6 mb-2">
                                                <label class="form-label">Program <span class="text-danger">*</span></label>
                                                <select id="programId3" class="form-select" name="program_id" onchange="getSectionsStudents()">
                                                    <?php
                                                    $programs = $this->program;
                                                    foreach ($programs as $program => $data) {
                                                    ?>
                                                        <option value="<?= $data['program_id'] ?>"><?= $data['program_name'] ?></option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="col-md-6 mb-2" id="hideSection">
                                                <label class="form-label">Section <span class="text-danger">*</span></label>
                                                <select id="sectionId3" class="form-select" name="section_id">
                                                    <option value="">Choose a section</option>
                                                    <?php
                                                    $sections = $this->section;
                                                    foreach ($sections as $section => $data) {
                                                    ?>
                                                        <option value="<?= $data['section_id'] ?>"><?= $data['section_name'] ?></option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="col-md-6 mb-2">
                                                <label class="form-label">Elementary School <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" name="elementary" placeholder="Enter elementary school" required />
                                            </div>
                                            <div class="col-md-6 mb-2">
                                                <label class="form-label">High School <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" name="highschool" placeholder="Enter high school" required />
                                            </div>
                                            <div class="col-12 d-flex justify-content-between mt-4">
                                                <button class="btn btn-success" type="submit" name="add_student"> <span class="align-middle d-sm-inline-block d-none me-sm-1">Submit</span></button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Add Student Modal -->

        <!-- Edit Student Modal -->
        <div class="modal fade" id="editSection" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-simple modal-edit-user modal-dialog-centered">
                <div class="modal-content p-3 p-md-5">
                    <div class="modal-body">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        <div class="text-center mb-4">
                            <h3 class="mb-2">Update Section Information</h3>
                        </div>

                        <form class="row g-3" method="POST">
                            <div class="col-12 col-md-12">
                                <label class="form-label">Year Level</label>
                                <select class="form-select">
                                    <option value="" selected>Choose year level</option>
                                </select>
                            </div>
                            <div class="col-12 col-md-12">
                                <label class="form-label">Program</label>
                                <select class="form-select">
                                    <option value="" selected>Choose program</option>
                                </select>
                            </div>
                            <div class="col-12 col-md-12">
                                <label class="form-label">Section</label>
                                <input type="text" class="form-control" placeholder="Enter section" required />
                            </div>
                            <div class="col-12 text-center">
                                <button type="submit" class="btn btn-success me-sm-3 me-1">Save Changes</button>
                                <button type="reset" class="btn btn-label-secondary" data-bs-dismiss="modal" aria-label="Close">Cancel</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Edit Student Modal -->
    <?php
    }
    public function teacherContent()
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
                                    <span class="text-muted fw-light"><a href="index.php" class="text-success">Dashboard</a> /</span> Instructors
                                </h5>
                                <div class="d-flex align-items-center gap-3 mb-4">
                                    <button class="btn btn-primary d-flex align-items-center gap-1" data-bs-toggle="modal" data-bs-target="#retrieveInstructor">
                                        <i class="ti ti-edit"></i>
                                        <span>Retrieve Data</span>
                                    </button>
                                    <button class="btn btn-success d-flex align-items-center gap-1" data-bs-toggle="modal" data-bs-target="#addInstructor">
                                        <i class="ti ti-plus"></i>
                                        <span>Add Instructor</span>
                                    </button>
                                </div>
                            </div>
                            <!-- Program Table -->
                            <div class="card">
                                <div class="card-body table-responsive">
                                    <table id="instructorDatatable" class="display compact table">
                                        <thead>
                                            <tr>
                                                <th>Advisor Number</th>
                                                <th>Name</th>
                                                <th>Position</th>
                                                <th>Department</th>
                                                <th>Date Created</th>
                                                <th>actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $advisorData = $this->advisor;
                                            if (!$advisorData) {
                                            ?>
                                                <tr>
                                                    <td colspan="5">
                                                        <h4 class="text-center text-danger mt-2">No student found yet!</h4>
                                                    </td>
                                                </tr>
                                                <?php
                                            } else {
                                                foreach ($advisorData as $advisorItem => $data) {
                                                    $dateString = $data['date_added'];
                                                    $timestamp = strtotime($dateString);
                                                    $formattedDate = date("F j, Y, g:i a", $timestamp);
                                                    $fullname = $data['firstname'] . " " . $data['middlename'] . " " . $data['lastname'] . " " . $data['suffix'] . ", " . $data['title'];
                                                ?>
                                                    <tr>
                                                        <td><?= $data['advisor_id'] ?></td>
                                                        <td><?= $fullname ?></td>
                                                        <td><?= $data['position'] ?></td>
                                                        <td><?= $data['program_code'] ?></td>
                                                        <td><?= $formattedDate ?></td>
                                                        <td>
                                                            <div class="d-inline-block text-nowrap"><button class="btn btn-sm btn-icon dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="ti ti-dots-vertical me-2"></i></button>
                                                                <div class="dropdown-menu dropdown-menu-end m-0">

                                                                    <button id="updateButton" data-bs-toggle="modal" data-bs-target="#editSection" href="javascript:0;" class="dropdown-item" onclick="editSectionDataJS('<?= htmlspecialchars(json_encode($data)); ?>')"><i class="ti ti-edit ms-1"></i>Update
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

        <!-- Add Instructor Modal -->
        <div class="modal fade" id="addInstructor" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-xl modal-dialog-centered modal-simple modal-upgrade-plan">
                <div class="modal-content p-3 p-md-5">
                    <div class="modal-body p-2">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        <div class="text-center">
                            <h3 class="mb-2">Add Instructor Information</h3>
                        </div>
                        <div id="wizard-create-app" class="bs-stepper vertical mt-2 shadow-none">
                            <div class="bs-stepper-header border-0 p-1">
                                <div class="step" data-target="#personal">
                                    <button type="button" class="step-trigger">
                                        <span class="bs-stepper-circle"><i class="ti ti-user ti-sm"></i></span>
                                        <span class="bs-stepper-label">
                                            <span class="bs-stepper-title text-uppercase">Personal</span>
                                        </span>
                                    </button>
                                </div>
                                <div class="line"></div>
                                <div class="step" data-target="#educational">
                                    <button type="button" class="step-trigger">
                                        <span class="bs-stepper-circle"><i class="ti ti-notebook ti-sm"></i></span>
                                        <span class="bs-stepper-label">
                                            <span class="bs-stepper-title text-uppercase">Educational</span>
                                        </span>
                                    </button>
                                </div>
                            </div>
                            <div class="bs-stepper-content p-1">
                                <form method="POST" action="action.php">
                                    <!-- Personal -->
                                    <div id="personal" class="content pt-3 pt-lg-0">
                                        <input type="hidden" value="<?= $this->active_page ?>" name="current_page">
                                        <div class="row">
                                            <div class="col-md-6 mb-2">
                                                <label class="form-label">Title <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" name="title" placeholder="MIT, MIEE, LPT" required />
                                            </div>
                                            <div class="col-md-6 mb-2">
                                                <label class="form-label">Position <span class="text-danger">*</span></label>
                                                <select name="position" class="form-select">
                                                    <option value="Professor I">Professor I</option>
                                                    <option value="Professor II">Professor II</option>
                                                    <option value="Professor III">Professor III</option>
                                                    <option value="Professor IV">Professor IV</option>
                                                    <option value="Assistant Professor">Assistant Professor</option>
                                                    <option value="Program Chair">Program Chair</option>
                                                    <option value="Associate Dean">Associate Dean</option>
                                                    <option value="Dean">Dean</option>
                                                </select>
                                            </div>
                                            <div class="col-md-3 mb-2">
                                                <label class="form-label">First Name <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" name="firstname" placeholder="Enter first name" required />
                                            </div>
                                            <div class="col-md-3 mb-2">
                                                <label class="form-label">Middle Name</label>
                                                <input type="text" class="form-control" placeholder="Enter middle name" name="middlename" />
                                            </div>
                                            <div class="col-md-3 mb-2">
                                                <label class="form-label">Last Name <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" placeholder="Enter last name" name="lastname" required />
                                            </div>
                                            <div class="col-md-3 mb-2">
                                                <label class="form-label">Suffix</label>
                                                <input type="text" class="form-control" name="suffix" placeholder="JR, SR, III" />
                                            </div>
                                            <div class="col-md-6 mb-2">
                                                <label class="form-label">Date of Birth <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" name="birthdate" id="flatpickr-date" placeholder="YYYY-MM-DD" required />
                                            </div>
                                            <div class="col-md-6 mb-2">
                                                <label class="form-label">Age <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" name="age" placeholder="Enter age" required />
                                            </div>
                                            <div class="col-md-4 mb-2">
                                                <label class="form-label">Gender <span class="text-danger">*</span></label>
                                                <select class="form-select" name="gender" required>
                                                    <option value="" selected>Choose gender</option>
                                                    <option value="Male">Male</option>
                                                    <option value="Female">Female</option>
                                                </select>
                                            </div>
                                            <div class="col-md-4 mb-2">
                                                <label class="form-label">Civil Status <span class="text-danger">*</span></label>
                                                <select class="form-select" name="civil_status" required>
                                                    <option value="" selected>Choose civil status</option>
                                                    <option value="Single">Single</option>
                                                    <option value="Married">Married</option>
                                                    <option value="Widowed">Widowed</option>
                                                    <option value="Separated">Separated</option>
                                                </select>
                                            </div>
                                            <div class="col-md-4 mb-2">
                                                <label class="form-label">Contact Number <span class="text-danger">*</span></label>
                                                <input type="text" id="prefix-mask" class="form-control prefix-mask" name="contact_number" placeholder="Enter contact number" required />
                                            </div>
                                            <div class="col-md-4 mb-2">
                                                <label class="form-label">Province <span class="text-danger">*</span></label>
                                                <select class="form-select" id="province" required></select>
                                                <input type="hidden" id="provinceName" name="province">
                                            </div>
                                            <div class="col-md-4 mb-2">
                                                <label class="form-label">City <span class="text-danger">*</span></label>
                                                <select class="form-select" id="city" required></select>
                                                <input type="hidden" id="cityName" name="city">
                                            </div>
                                            <div class="col-md-4 mb-2">
                                                <label class="form-label">Barangay <span class="text-danger">*</span></label>
                                                <select class="form-select" id="barangay" required></select>
                                                <input type="hidden" id="barangayName" name="barangay">
                                            </div>
                                            <div class="col-md-9 mb-2">
                                                <label class="form-label">House No./Unit/Bldg/Street <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" name="house_no" placeholder="House No./Unit/Bldg/Street" required />
                                            </div>
                                            <div class="col-md-3 mb-2">
                                                <label class="form-label">Zip Code <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" name="zip_code" placeholder="Enter zip code" required />
                                            </div>
                                            <div class="col-12 d-flex justify-content-between mt-4">
                                                <button class="btn btn-label-secondary btn-prev" disabled> <i class="ti ti-arrow-left ti-xs me-sm-1 me-0"></i>
                                                    <span class="align-middle d-sm-inline-block d-none">Previous</span>
                                                </button>
                                                <button class="btn btn-primary btn-next"><span class="align-middle d-sm-inline-block d-none me-sm-1">Next</span> <i class="ti ti-arrow-right ti-xs"></i></button>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Educational -->
                                    <div id="educational" class="content pt-3 pt-lg-0">
                                        <div class="row">
                                            <div class="col-md-12 mb-2">
                                                <label class="form-label">Employee Number <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" name="advisor_id" placeholder="Enter employee number" required />
                                            </div>
                                            <div class="col-md-12 mb-2">
                                                <label class="form-label">KLD Email <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" name="kld_email" placeholder="Enter KLD email" required />
                                            </div>
                                            <div class="col-md-12 mb-2">
                                                <label class="form-label">Department <span class="text-danger">*</span></label>
                                                <select class="form-select" name="program_id" required>
                                                    <option value="" selected>Choose a department</option>
                                                    <?php
                                                    $programs = $this->program;
                                                    foreach ($programs as $program => $data) {
                                                    ?>
                                                        <option value="<?= $data['program_id'] ?>"><?= $data['program_name'] ?></option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="col-12 d-flex justify-content-between mt-4">
                                                <button class="btn btn-success" type="submit" name="add_advisor"> <span class="align-middle d-sm-inline-block d-none me-sm-1">Submit</span></button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Add Instructor Modal -->

        <!-- Edit Instructor Modal -->
        <div class="modal fade" id="editSection" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-simple modal-edit-user modal-dialog-centered">
                <div class="modal-content p-3 p-md-5">
                    <div class="modal-body">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        <div class="text-center mb-4">
                            <h3 class="mb-2">Update Section Information</h3>
                        </div>
                        <form class="row g-3" method="POST">
                            <div class="col-12 col-md-12">
                                <label class="form-label">Year Level</label>
                                <select class="form-select">
                                    <option value="" selected>Choose year level</option>
                                </select>
                            </div>
                            <div class="col-12 col-md-12">
                                <label class="form-label">Program</label>
                                <select class="form-select">
                                    <option value="" selected>Choose program</option>
                                </select>
                            </div>
                            <div class="col-12 col-md-12">
                                <label class="form-label">Section</label>
                                <input type="text" class="form-control" placeholder="Enter section" required />
                            </div>
                            <div class="col-12 text-center">
                                <button type="submit" class="btn btn-success me-sm-3 me-1">Save Changes</button>
                                <button type="reset" class="btn btn-label-secondary" data-bs-dismiss="modal" aria-label="Close">Cancel</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Edit Instructor Modal -->
    <?php
    }
    public function classListContent()
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
                                    <span class="text-muted fw-light"><a href="index.php" class="text-success">Dashboard</a> /</span> Class List
                                </h5>
                            </div>
                            <!-- Student Table -->
                            <div class="card">
                                <div class="card-body table-responsive">
                                    <div class="card-title"><span class="text-danger">Note: </span>Filter first before you can assign a section to each student.</div>
                                    <form method="GET" action="?year_level=$year_level&program_id=$program_id&section_id=$section_id" class="row mb-3">
                                        <div class="col-md-3">
                                            <label class="form-label">Year Level <span class="text-danger">*</span></label>
                                            <select class="form-select" id="yearLevel" name="year_level" onchange="getSectionsClassList()">
                                                <option value="1st Year">1st Year</option>
                                                <option value="2nd Year">2nd Year</option>
                                                <option value="3rd Year">3rd Year</option>
                                                <option value="4th Year">4th Year</option>
                                            </select>
                                        </div>
                                        <div class="col-md-3">
                                            <label class="form-label">Program <span class="text-danger">*</span></label>
                                            <select class="form-select" id="programId" name="program_id" onchange="getSectionsClassList()">
                                                <?php
                                                $programs = $this->program;
                                                foreach ($programs as $program => $data) {
                                                ?>
                                                    <option value="<?= $data['program_id'] ?>"><?= $data['program_name'] ?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="col-md-3">
                                            <label class="form-label">Section <span class="text-danger">*</span></label>
                                            <select class="form-select" id="sectionId" name="section_id">
                                                <?php
                                                $sections = $this->section;
                                                foreach ($sections as $section => $data) {
                                                ?>
                                                    <option value="<?= $data['section_id'] ?>"><?= $data['section_name'] ?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="col-md-3 mt-4">
                                            <div class="d-flex align-items-center gap-2">
                                                <button type="submit" name="filter_class" class="btn btn-success w-100">Filter</button>
                                                <a href="class-list.php" class="btn btn-secondary w-100">Reset</a>
                                            </div>
                                        </div>
                                    </form>
                                    <table id="studentDatatable" class="display compact table">
                                        <thead>
                                            <tr>
                                                <?= $this->filterStudent == null ? "" : "<th><input type='checkbox'></th>" ?>
                                                <th>Student Number</th>
                                                <th>Name</th>
                                                <th>Year Level</th>
                                                <th>Program</th>
                                                <th>Section</th>
                                                <th>Date Created</th>
                                                <th>actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $studentData = $this->student;
                                            $filterStudent = $this->filterStudent;
                                            if ($filterStudent == null) {
                                                foreach ($studentData as $studentItem => $data) {
                                                    $dateString = $data['date_added'];
                                                    $timestamp = strtotime($dateString);
                                                    $formattedDate = date("F j, Y, g:i a", $timestamp);
                                                    $fullname = $data['firstname'] . " " . $data['middlename'] . " " . $data['lastname'] . " " . $data['suffix'];
                                            ?>
                                                    <tr>
                                                        <td><?= $data['student_id'] ?></td>
                                                        <td><?= $fullname ?></td>
                                                        <td><?= $data['year_level'] == "" || null ? "N/A" : $data['year_level'] ?></td>
                                                        <td><?= $data['program_code'] ?></td>
                                                        <td><?= $data['section_name'] == "" || null ? "N/A" : $data['section_name'] ?></td>
                                                        <td><?= $formattedDate ?></td>
                                                        <td>
                                                            <div class="d-inline-block text-nowrap"><button class="btn btn-sm btn-icon dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="ti ti-dots-vertical me-2"></i></button>
                                                                <div class="dropdown-menu dropdown-menu-end m-0">

                                                                    <button id="updateButton" data-bs-toggle="modal" data-bs-target="#editSection" href="javascript:0;" class="dropdown-item" onclick="editSectionDataJS('<?= htmlspecialchars(json_encode($data)); ?>')"><i class="ti ti-edit ms-1"></i>Update
                                                                    </button>

                                                                    <button href="javascript:0;" data-bs-toggle="modal" data-bs-target="#exampleModal" onclick="archiveProgramDataJS('<?= htmlspecialchars(json_encode($data)); ?>')" class="dropdown-item bg-danger text-white"><i class="ti ti-trash ms-1"></i>Archive</button>

                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                <?php
                                                }
                                            } else {
                                                foreach ($filterStudent as $studentItem => $data) {
                                                    $dateString = $data['date_added'];
                                                    $timestamp = strtotime($dateString);
                                                    $formattedDate = date("F j, Y, g:i a", $timestamp);
                                                    $fullname = $data['firstname'] . " " . $data['middlename'] . " " . $data['lastname'] . " " . $data['suffix'];
                                                ?>
                                                    <tr>
                                                        <td><input type="checkbox"></td>
                                                        <td><?= $data['student_id'] ?></td>
                                                        <td><?= $fullname ?></td>
                                                        <td><?= $data['year_level'] == "" || null ? "N/A" : $data['year_level'] ?></td>
                                                        <td><?= $data['program_code'] ?></td>
                                                        <td><?= $data['section_name'] == "" || null ? "N/A" : $data['section_name'] ?></td>
                                                        <td><?= $formattedDate ?></td>
                                                        <td>
                                                            <div class="d-inline-block text-nowrap"><button class="btn btn-sm btn-icon dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="ti ti-dots-vertical me-2"></i></button>
                                                                <div class="dropdown-menu dropdown-menu-end m-0">

                                                                    <button id="updateButton" data-bs-toggle="modal" data-bs-target="#editSection" href="javascript:0;" class="dropdown-item" onclick="editSectionDataJS('<?= htmlspecialchars(json_encode($data)); ?>')"><i class="ti ti-edit ms-1"></i>Update
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
                                    <button type="button" data-bs-toggle="modal" data-bs-target="#assignSectionModal" class="btn btn-primary">Assign Section</button>
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

        <!-- Add Student Modal -->
        <div class="modal fade" id="assignSectionModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-xl modal-dialog-centered modal-simple modal-upgrade-plan">
                <div class="modal-content p-3 p-md-5">
                    <div class="modal-body p-2">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        <div class="text-center">
                            <h3 class="mb-2">Assign Section</h3>
                        </div>
                        <form method="POST" action="action.php">
                            <input type="hidden" id="studentIds" name="studentIds[]">
                            <div class="row">
                                <div class="col-md-3">
                                    <label class="form-label">Year Level <span class="text-danger">*</span></label>
                                    <select class="form-select" id="yearLevel2" name="year_level2" onchange="getSectionsClassList2()">
                                        <option value="1st Year">1st Year</option>
                                        <option value="2nd Year">2nd Year</option>
                                        <option value="3rd Year">3rd Year</option>
                                        <option value="4th Year">4th Year</option>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label">Program <span class="text-danger">*</span></label>
                                    <select class="form-select" id="programId2" name="program_id2" onchange="getSectionsClassList2()">
                                        <?php
                                        $programs = $this->program;
                                        foreach ($programs as $program => $data) {
                                        ?>
                                            <option value="<?= $data['program_id'] ?>"><?= $data['program_name'] ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label">Section <span class="text-danger">*</span></label>
                                    <select class="form-select" id="sectionId2" name="section_id2">
                                        <?php
                                        $sections = $this->section;
                                        foreach ($sections as $section => $data) {
                                        ?>
                                            <option value="<?= $data['section_id'] ?>"><?= $data['section_name'] ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-md-3 mt-4">
                                    <div class="d-flex align-items-center gap-2">
                                        <button type="submit" name="assign_section" class="btn btn-success w-100">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Add Student Modal -->
    <?php
    }
    public function subjectTaughtContent()
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
                                    <span class="text-muted fw-light"><a href="index.php" class="text-success">Dashboard</a> /</span> Subject Taught
                                </h5>
                                <div class="d-flex align-items-center gap-3 mb-4">
                                    <button class="btn btn-primary d-flex align-items-center gap-1" data-bs-toggle="modal" data-bs-target="#retrieveStudent">
                                        <i class="ti ti-edit"></i>
                                        <span>Retrieve Data</span>
                                    </button>
                                    <button class="btn btn-success d-flex align-items-center gap-1" data-bs-toggle="modal" data-bs-target="#assignSubjectTeacher">
                                        <i class="ti ti-plus"></i>
                                        <span>Assign Course Teacher</span>
                                    </button>
                                </div>
                            </div>
                            <!-- Student Table -->
                            <div class="card">
                                <div class="card-body table-responsive">
                                    <table id="subjectTaughDatatable" class="display compact table">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Course Name</th>
                                                <th>Course Teacher</th>
                                                <th>Date Created</th>
                                                <th>actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $subjectTaughts = $this->subjectTaught;
                                            if (!$subjectTaughts) {
                                            ?>
                                                <tr>
                                                    <td colspan="5">
                                                        <h4 class="text-center text-danger mt-2">No data found yet!</h4>
                                                    </td>
                                                </tr>
                                                <?php
                                            } else {
                                                foreach ($subjectTaughts as $subjectTaught => $data) {
                                                    $dateString = $data['date_added'];
                                                    $timestamp = strtotime($dateString);
                                                    $formattedDate = date("F j, Y, g:i a", $timestamp);
                                                    $fullname = $data['firstname'] . " " . $data['middlename'] . " " . $data['lastname'] . " " . $data['suffix'] . ", " . $data['title'];
                                                ?>
                                                    <tr>
                                                        <td><?= $data['subject_taught_id'] ?></td>
                                                        <td><?= $data['course_name'] ?></td>
                                                        <td><?= $fullname ?></td>
                                                        <td><?= $formattedDate ?></td>
                                                        <td>
                                                            <div class="d-inline-block text-nowrap"><button class="btn btn-sm btn-icon dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="ti ti-dots-vertical me-2"></i></button>
                                                                <div class="dropdown-menu dropdown-menu-end m-0">

                                                                    <button id="updateButton" data-bs-toggle="modal" data-bs-target="#editSection" href="javascript:0;" class="dropdown-item" onclick="editSectionDataJS('<?= htmlspecialchars(json_encode($data)); ?>')"><i class="ti ti-edit ms-1"></i>Update
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

        <!-- Add Student Modal -->
        <div class="modal fade" id="assignSubjectTeacher" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-xl modal-dialog-centered modal-simple modal-upgrade-plan">
                <div class="modal-content p-3 p-md-5">
                    <div class="modal-body p-2">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        <div class="text-center">
                            <h3 class="mb-2">Assign Course Teacher</h3>
                        </div>
                        <form action="action.php" method="POST">
                            <div class="row">
                                <div class="col-12 col-md-12 mb-3">
                                    <input type="hidden" value="<?= $this->active_page ?>" name="current_page">
                                    <label class="form-label">Instructor</label>
                                    <select name="advisor_id" class="form-select" required>
                                        <?php
                                        $teachers = $this->advisor;
                                        foreach ($teachers as $teacher => $data) {
                                            $fullname = $data['firstname'] . " " . $data['middlename'] . " " . $data['lastname'] . " " . $data['suffix'] . ", " . $data['title'];
                                        ?>
                                            <option value="<?= $data['advisor_id'] ?>"><?= $fullname ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-12 col-md-12">
                                    <label class="form-label">Course Name</label>
                                    <br>
                                    <select id="multiple-select" multiple name="course_ids" placeholder="Select Course Name" data-search="true" data-silent-initial-value-set="true">
                                        <?php
                                        $courses = $this->subject;
                                        foreach ($courses as $course => $data) {
                                        ?>
                                            <option value="<?= $data['course_id'] ?>"><?= $data['course_name'] ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-12 d-flex justify-content-end mt-4">
                                    <button class="btn btn-success" type="submit" name="assign_course"> <span class="align-middle d-sm-inline-block d-none me-sm-1">Submit</span></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Add Student Modal -->
    <?php
    }
    public function assignAdviserContent()
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
                                    <span class="text-muted fw-light"><a href="index.php" class="text-success">Dashboard</a> /</span> Assign Adviser
                                </h5>
                                <div class="d-flex align-items-center gap-3 mb-4">
                                    <button class="btn btn-primary d-flex align-items-center gap-1" data-bs-toggle="modal" data-bs-target="#retrieveStudent">
                                        <i class="ti ti-edit"></i>
                                        <span>Retrieve Data</span>
                                    </button>
                                    <button class="btn btn-success d-flex align-items-center gap-1" data-bs-toggle="modal" data-bs-target="#assignSectionAdviser">
                                        <i class="ti ti-plus"></i>
                                        <span>Assign Section Adviser</span>
                                    </button>
                                </div>
                            </div>
                            <!-- Student Table -->
                            <div class="card">
                                <div class="card-body table-responsive">
                                    <table id="assignAdvisorDatatable" class="display compact table">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Instructor</th>
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
                                                        <h4 class="text-center text-danger mt-2">No assign adviser found yet!</h4>
                                                    </td>
                                                </tr>
                                                <?php
                                            } else {
                                                foreach ($assignAdvisers as $assignAdviser => $data) {
                                                    $dateString = $data['date_added'];
                                                    $timestamp = strtotime($dateString);
                                                    $formattedDate = date("F j, Y, g:i a", $timestamp);
                                                    $fullname = $data['firstname'] . " " . $data['middlename'] . " " . $data['lastname'] . " " . $data['suffix'] . ", " . $data['title'];
                                                ?>
                                                    <tr>
                                                        <td><?= $data['advises_id'] ?></td>
                                                        <td><?= $fullname ?></td>
                                                        <td><?= $data['section_name'] ?></td>
                                                        <td><?= $formattedDate ?></td>
                                                        <td>
                                                            <div class="d-inline-block text-nowrap"><button class="btn btn-sm btn-icon dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="ti ti-dots-vertical me-2"></i></button>
                                                                <div class="dropdown-menu dropdown-menu-end m-0">

                                                                    <button id="updateButton" data-bs-toggle="modal" data-bs-target="#editSection" href="javascript:0;" class="dropdown-item" onclick="editSectionDataJS('<?= htmlspecialchars(json_encode($data)); ?>')"><i class="ti ti-edit ms-1"></i>Update
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

        <!-- Add Student Modal -->
        <div class="modal fade" id="assignSectionAdviser" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-xl modal-dialog-centered modal-simple modal-upgrade-plan">
                <div class="modal-content p-3 p-md-5">
                    <div class="modal-body p-2">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        <div class="text-center">
                            <h3 class="mb-2">Assign Section Adviser</h3>
                        </div>
                        <form action="action.php" method="POST">
                            <div class="row">
                                <div class="col-12 col-md-12 mb-3">
                                    <label class="form-label">Instructor</label>
                                    <select name="advisor_id" id="advisorId" class="form-select" onchange="getDepartment()" required>
                                        <option value="">Select instructor</option>
                                        <?php
                                        $teachers = $this->advisor;
                                        foreach ($teachers as $teacher => $data) {
                                            $fullname = $data['firstname'] . " " . $data['middlename'] . " " . $data['lastname'] . " " . $data['suffix'] . ", " . $data['title'];
                                        ?>
                                            <option value="<?= $data['advisor_id'] ?>"><?= $fullname ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-12 col-md-12" id="sectionContainer">
                                    <label class="form-label">Section Name</label>
                                    <br>
                                    <select id="multiple-select" multiple name="section_ids" placeholder="Select Course Name" data-search="true">
                                        <?php
                                        $sections = $this->section;
                                        foreach ($sections as $section => $data) {
                                        ?>
                                            <option value="<?= $data['section_id'] ?>"><?= $data['section_name'] ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-12 d-flex justify-content-end mt-4">
                                    <button class="btn btn-success" type="submit" name="assign_section_adviser"> <span class="align-middle d-sm-inline-block d-none me-sm-1">Submit</span></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Add Student Modal -->
    <?php
    }
    public function sectionSubjectTaughtContent()
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
                                    <span class="text-muted fw-light"><a href="index.php" class="text-success">Dashboard</a> /</span> Handled Course Section
                                </h5>
                                <div class="d-flex align-items-center gap-3 mb-4">
                                    <button class="btn btn-primary d-flex align-items-center gap-1" data-bs-toggle="modal" data-bs-target="#retrieveStudent">
                                        <i class="ti ti-edit"></i>
                                        <span>Retrieve Data</span>
                                    </button>
                                    <button class="btn btn-success d-flex align-items-center gap-1" data-bs-toggle="modal" data-bs-target="#assignSubjectSection">
                                        <i class="ti ti-plus"></i>
                                        <span>Assign Handled Course Section</span>
                                    </button>
                                </div>
                            </div>
                            <!-- Student Table -->
                            <div class="card">
                                <div class="card-body table-responsive">
                                    <table id="assignCourseTeacherDatatable" class="display compact table">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Instructor</th>
                                                <th>Course</th>
                                                <th>Section</th>
                                                <th>Date Created</th>
                                                <th>actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <tbody>
                                            <?php
                                            $assignSubjectTeachers = $this->assignSubjectTeacher;
                                            if (!$assignSubjectTeachers) {
                                            ?>
                                                <tr>
                                                    <td colspan="5">
                                                        <h4 class="text-center text-danger mt-2">No assign course instructor found yet!</h4>
                                                    </td>
                                                </tr>
                                                <?php
                                            } else {
                                                foreach ($assignSubjectTeachers as $assignSubjectTeacher => $data) {
                                                    $dateString = $data['date_added'];
                                                    $timestamp = strtotime($dateString);
                                                    $formattedDate = date("F j, Y, g:i a", $timestamp);
                                                    $fullname = $data['firstname'] . " " . $data['middlename'] . " " . $data['lastname'] . " " . $data['suffix'] . ", " . $data['title'];
                                                ?>
                                                    <tr>
                                                        <td><?= $data['subject_course_id'] ?></td>
                                                        <td><?= $fullname ?></td>
                                                        <td><?= $data['course_name'] ?></td>
                                                        <td><?= $data['section_name'] ?></td>
                                                        <td><?= $formattedDate ?></td>
                                                        <td>
                                                            <div class="d-inline-block text-nowrap"><button class="btn btn-sm btn-icon dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="ti ti-dots-vertical me-2"></i></button>
                                                                <div class="dropdown-menu dropdown-menu-end m-0">

                                                                    <button id="updateButton" data-bs-toggle="modal" data-bs-target="#editSection" href="javascript:0;" class="dropdown-item" onclick="editSectionDataJS('<?= htmlspecialchars(json_encode($data)); ?>')"><i class="ti ti-edit ms-1"></i>Update
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

        <!-- Add Student Modal -->
        <div class="modal fade" id="assignSubjectSection" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-xl modal-dialog-centered modal-simple modal-upgrade-plan">
                <div class="modal-content p-3 p-md-5">
                    <div class="modal-body p-2">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        <div class="text-center">
                            <h3 class="mb-2">Assign Handled Course Section</h3>
                        </div>
                        <form action="action.php" method="POST">
                            <div class="row">
                                <div class="col-12 col-md-12 mb-3">
                                    <input type="hidden" value="<?= $this->active_page ?>" name="current_page">
                                    <label class="form-label">Course</label>
                                    <select name="course_id" id="courseId" class="form-select" required onchange="getSubjectTaught()">
                                        <?php
                                        $courses = $this->subject;
                                        foreach ($courses as $course => $data) {
                                        ?>
                                            <option value="<?= $data['course_id'] ?>"><?= $data['course_name'] ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-12 col-md-12 mb-3">
                                    <label class="form-label">Instructor</label>
                                    <select name="advisor_id" id="advisorId" class="form-select" required>
                                        <?php
                                        $teachers = $this->advisor;
                                        foreach ($teachers as $teacher => $data) {
                                            $fullname = $data['firstname'] . " " . $data['middlename'] . " " . $data['lastname'] . " " . $data['suffix'] . ", " . $data['title'];
                                        ?>
                                            <option value="<?= $data['advisor_id'] ?>"><?= $fullname; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-12 col-md-12">
                                    <label class="form-label">Section</label>
                                    <br>
                                    <select id="multiple-select" multiple name="sectionIds" placeholder="Select Section Name" data-search="true" data-silent-initial-value-set="true">
                                        <?php
                                        $sections = $this->section;
                                        foreach ($sections as $section => $data) {
                                        ?>
                                            <option value="<?= $data['section_id'] ?>"><?= $data['section_name'] ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-12 d-flex justify-content-end mt-4">
                                    <button class="btn btn-success" type="submit" name="assign_handle_course_section"> <span class="align-middle d-sm-inline-block d-none me-sm-1">Submit</span></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Add Student Modal -->
    <?php
    }

    public function gradingSystemContent()
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
                                    <span class="text-muted fw-light"><a href="index.php" class="text-success">Dashboard</a> /</span> Grading Criteria
                                </h5>
                                <div class="d-flex align-items-center gap-3 mb-4">
                                    <button class="btn btn-primary d-flex align-items-center gap-1" data-bs-toggle="modal" data-bs-target="#retrieveStudent">
                                        <i class="ti ti-edit"></i>
                                        <span>Retrieve Data</span>
                                    </button>
                                    <button class="btn btn-success d-flex align-items-center gap-1" data-bs-toggle="modal" data-bs-target="#addGradingCriteria">
                                        <i class="ti ti-plus"></i>
                                        <span>Add Grading Criteria</span>
                                    </button>
                                </div>
                            </div>
                            <!-- Student Table -->
                            <div class="card">
                                <div class="card-body table-responsive">
                                    <table id="gradingCriteriaDatatable" class="display compact table">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Year Level</th>
                                                <th>Program</th>
                                                <th>Criteria</th>
                                                <th>Date Created</th>
                                                <th>actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $gradingCriterias = $this->gradingCriteria;
                                            if (!$gradingCriterias) {
                                            ?>
                                                <tr>
                                                    <td colspan="5">
                                                        <h4 class="text-center text-danger mt-2">No grading criteria found yet!</h4>
                                                    </td>
                                                </tr>
                                                <?php
                                            } else {
                                                foreach ($gradingCriterias as $gradingCriteria => $data) {
                                                    $dateString = $data['date_added'];
                                                    $timestamp = strtotime($dateString);
                                                    $formattedDate = date("F j, Y, g:i a", $timestamp);
                                                    $criteria = "Seatwork = " . $data['seatwork'] . "% | Quizzes = " . $data['quizzes'] . "% | Assignment = " . $data['assignment'] . "% | Examination = " . $data['examination'] . "% | Others = " . $data['others'] . "%";
                                                ?>
                                                    <tr>
                                                        <td><?= $data['grading_system_id'] ?></td>
                                                        <td><?= $data['year_level'] ?></td>
                                                        <td><?= $data['program_code'] ?></td>
                                                        <td><?= $criteria ?></td>
                                                        <td><?= $formattedDate ?></td>
                                                        <td>
                                                            <div class="d-inline-block text-nowrap"><button class="btn btn-sm btn-icon dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="ti ti-dots-vertical me-2"></i></button>
                                                                <div class="dropdown-menu dropdown-menu-end m-0">

                                                                    <button id="updateButton" data-bs-toggle="modal" data-bs-target="#editSection" href="javascript:0;" class="dropdown-item" onclick="editSectionDataJS('<?= htmlspecialchars(json_encode($data)); ?>')"><i class="ti ti-edit ms-1"></i>Update
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

        <!-- Add Student Modal -->
        <div class="modal fade" id="addGradingCriteria" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-xl modal-dialog-centered modal-simple modal-upgrade-plan">
                <div class="modal-content p-3 p-md-5">
                    <div class="modal-body p-2">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        <div class="text-center">
                            <h3 class="mb-2">Add Grading Criteria</h3>
                        </div>
                        <form action="action.php" method="POST">
                            <div class="row">
                                <div class="col-12 col-md-12 mb-3">
                                    <input type="hidden" value="<?= $this->active_page ?>" name="current_page">
                                    <label class="form-label">Year Level</label>
                                    <select class="form-select" name="year_level" required>
                                        <option value="1st year">1st Year</option>
                                        <option value="2nd Year">2nd Year</option>
                                        <option value="3rd Year">3rd Year</option>
                                        <option value="4th Year">4th Year</option>
                                    </select>
                                </div>
                                <div class="col-12 col-md-12 mb-3">
                                    <label class="form-label">Program</label>
                                    <select name="program_id" id="program_id" class="form-select" required>
                                        <?php
                                        $programs = $this->program;
                                        foreach ($programs as $program => $data) {
                                        ?>
                                            <option value="<?= $data['program_id'] ?>"><?= $data['program_name']; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                                <!-- <div class="col-md-6 mb-3">
                                    <button type="button" id="addGradeComponent" class="btn btn-success">Add Grade Component</button>
                                </div>

                                <div class="col-sm-12 col-md-12 mb-3" id="gradeComponents">
                                </div> -->

                                <div class="col-md-3 mb-3">
                                    <label class="form-label">Seatwork/Participation</label>
                                    <input type="number" class="form-control" name="seatwork" required placeholder="Percentage">
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label class="form-label">Quizzes</label>
                                    <input type="number" class="form-control" name="quizzes" required placeholder="Percentage">
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label class="form-label">Assignments</label>
                                    <input type="number" class="form-control" name="assignment" required placeholder="Percentage">
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label class="form-label">Examination</label>
                                    <input type="number" class="form-control" name="examination" required placeholder="Percentage">
                                </div>
                                <div class="col-md-12">
                                    <label class="form-label">Others</label>
                                    <input type="number" class="form-control" name="others" placeholder="Percentage">
                                </div>
                                <div class="col-12 d-flex justify-content-end mt-4">
                                    <button class="btn btn-success" type="submit" name="add_grading_criteria"> <span class="align-middle d-sm-inline-block d-none me-sm-1">Submit</span></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Add Student Modal -->
    <?php
    }

    public function semesterContent()
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
                                    <span class="text-muted fw-light"><a href="index.php" class="text-success">Dashboard</a> /</span> Semester
                                </h5>
                                <div class="d-flex align-items-center gap-3 mb-4">
                                    <button class="btn btn-primary d-flex align-items-center gap-1" data-bs-toggle="modal" data-bs-target="#retrieveSemester">
                                        <i class="ti ti-edit"></i>
                                        <span>Retrieve Data</span>
                                    </button>
                                    <button class="btn btn-success d-flex align-items-center gap-1" data-bs-toggle="modal" data-bs-target="#addSemester">
                                        <i class="ti ti-plus"></i>
                                        <span>Add Semester</span>
                                    </button>
                                </div>
                            </div>
                            <!-- Student Table -->
                            <div class="card">
                                <div class="card-body table-responsive">
                                    <table id="semesterDatatable" class="display compact table">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Semester</th>
                                                <th>Academic Year</th>
                                                <th>Date Created</th>
                                                <th>actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $semesters = $this->semester;
                                            if (!$semesters) {
                                            ?>
                                                <tr>
                                                    <td colspan="5">
                                                        <h4 class="text-center text-danger mt-2">No semester found yet!</h4>
                                                    </td>
                                                </tr>
                                                <?php
                                            } else {
                                                foreach ($semesters as $semester => $data) {
                                                    $dateString = $data['date_added'];
                                                    $timestamp = strtotime($dateString);
                                                    $formattedDate = date("F j, Y, g:i a", $timestamp);
                                                ?>
                                                    <tr>
                                                        <td><?= $data['semester_id'] ?></td>
                                                        <td><?= $data['semester_name'] ?></td>
                                                        <td><?= $data['year'] ?></td>
                                                        <td><?= $formattedDate ?></td>
                                                        <td>
                                                            <div class="d-inline-block text-nowrap"><button class="btn btn-sm btn-icon dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="ti ti-dots-vertical me-2"></i></button>
                                                                <div class="dropdown-menu dropdown-menu-end m-0">

                                                                    <button id="updateButton" data-bs-toggle="modal" data-bs-target="#editSection" href="javascript:0;" class="dropdown-item" onclick="editSectionDataJS('<?= htmlspecialchars(json_encode($data)); ?>')"><i class="ti ti-edit ms-1"></i>Update
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

        <!-- Add Semester Modal -->
        <div class="modal fade" id="addSemester" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-xl modal-dialog-centered modal-simple modal-upgrade-plan">
                <div class="modal-content p-3 p-md-5">
                    <div class="modal-body p-2">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        <div class="text-center">
                            <h3 class="mb-2">Add Semester</h3>
                        </div>
                        <form action="action.php" method="POST">
                            <div class="row">
                                <div class="col-12 col-md-12 mb-3">
                                    <input type="hidden" value="<?= $this->active_page ?>" name="current_page">
                                    <label class="form-label">Semester</label>
                                    <select class="form-select" name="semester_name" required>
                                        <option value="1st Semester">1st Semester</option>
                                        <option value="2nd Semester">2nd Semester</option>
                                    </select>
                                </div>
                                <div class="col-12 col-md-12 mb-3">
                                    <label class="form-label">Academic Year</label>
                                    <input type="text" name="year" class="form-control" placeholder="2023 - 2024">
                                </div>
                                <div class="col-12 d-flex justify-content-end mt-4">
                                    <button class="btn btn-success" type="submit" name="add_semester"> <span class="align-middle d-sm-inline-block d-none me-sm-1">Submit</span></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Add Semester Modal -->
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
                <h3 class="fw-bold mb-0">Welcome, KLD Admin! 👋</h3>
                <span>Sign in first to get started.</span>
                <div class="form-group mb-3 mt-2">
                    <label class="form-label">Username</label>
                    <input type="text" class="form-control" name="username" placeholder="Enter username" required>
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
}
?>