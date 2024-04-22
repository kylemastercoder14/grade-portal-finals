<!DOCTYPE html>

<html lang="en" class="light-style layout-compact layout-menu-fixed" data-theme="theme-default" data-template="horizontal-menu-template">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>KLD Grades Portal - eCOG</title>

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="assets/images/logo.png" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com/" />
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&amp;ampdisplay=swap" rel="stylesheet" />

    <!-- Icons -->
    <link rel="stylesheet" href="assets/vendor/fonts/fontawesome.css" />
    <link rel="stylesheet" href="assets/vendor/fonts/tabler-icons.css" />
    <link rel="stylesheet" href="assets/vendor/fonts/flag-icons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="assets/vendor/css/rtl/core.css" />
    <link rel="stylesheet" href="assets/vendor/css/rtl/theme-default.css" />
    <link rel="stylesheet" href="assets/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="assets/vendor/libs/node-waves/node-waves.css" />
    <link rel="stylesheet" href="assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
    <link rel="stylesheet" href="assets/vendor/libs/typeahead-js/typeahead.css" />
    <link rel="stylesheet" href="assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css" />
    <link rel="stylesheet" href="assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css" />
    <link rel="stylesheet" href="assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css" />
    <link rel="stylesheet" href="assets/vendor/libs/select2/select2.css" />
    <link rel="stylesheet" href="assets/vendor/libs/@form-validation/form-validation.css" />
    <link rel="stylesheet" href="assets/vendor/libs/bs-stepper/bs-stepper.css" />
    <link rel="stylesheet" href="assets/vendor/libs/flatpickr/flatpickr.css" />
    <link rel="stylesheet" href="assets/vendor/libs/bootstrap-datepicker/bootstrap-datepicker.css" />

    <!-- Helpers -->
    <script src="assets/vendor/js/helpers.js"></script>
    <script src="assets/js/config.js"></script>
</head>

<body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-navbar-full layout-horizontal layout-without-menu">
        <div class="layout-container">
            <!-- Header -->
            <?php require "includes/header.php"  ?>
            <!-- / Header -->

            <!-- Layout container -->
            <div class="layout-page">
                <!-- Content wrapper -->
                <div class="content-wrapper">
                    <!-- Navbar -->
                    <?php require "includes/navbar.php";  ?>
                    <!-- / Navbar -->
                    <!-- Content -->
                    <div class="container-xxl flex-grow-1 container-p-y">
                        <h5 class="py-2 mb-4">
                            <span class="text-muted fw-light"><a href="index.php" class="text-success">Dashboard</a> /</span> Students
                        </h5>
                        <!-- Program Table -->
                        <div class="card">
                            <div class="card-datatable table-responsive">
                                <table class="datatables-student table">
                                    <thead class="border-top">
                                        <tr>
                                            <th>Student Number</th>
                                            <th>Name</th>
                                            <th>Year Level</th>
                                            <th>Program</th>
                                            <th>Section</th>
                                            <th>actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>KLD-21-000209</td>
                                            <td>Kyle Andre D. Lim</td>
                                            <td>Junior</td>
                                            <td>Institute of Information and Computing Sciences</td>
                                            <td>BSIS305</td>
                                            <td>
                                                <div class="d-inline-block text-nowrap"><button class="btn btn-sm btn-icon dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="ti ti-dots-vertical me-2"></i></button>
                                                    <div class="dropdown-menu dropdown-menu-end m-0">
                                                        <a data-bs-toggle="modal" data-bs-target="#editStudent" href="javascript:0;" class="dropdown-item"><i class="ti ti-edit ms-1"></i>Update</a>
                                                        <a href="javascript:0;" class="dropdown-item bg-danger text-white"><i class="ti ti-trash ms-1"></i>Archive</a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- Program Table -->
                    </div>
                    <!--/ Content -->
                    <!-- Footer -->
                    <?php require "includes/footer.php";  ?>
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
                            <div class="step" data-target="#details">
                                <button type="button" class="step-trigger">
                                    <span class="bs-stepper-circle"><i class="ti ti-user ti-sm"></i></span>
                                    <span class="bs-stepper-label">
                                        <span class="bs-stepper-title text-uppercase">Personal</span>
                                    </span>
                                </button>
                            </div>
                            <div class="line"></div>
                            <div class="step" data-target="#frameworks">
                                <button type="button" class="step-trigger">
                                    <span class="bs-stepper-circle"><i class="ti ti-notebook ti-sm"></i></span>
                                    <span class="bs-stepper-label">
                                        <span class="bs-stepper-title text-uppercase">Educational</span>
                                    </span>
                                </button>
                            </div>
                        </div>
                        <div class="bs-stepper-content p-1">
                            <form onSubmit="return false">
                                <!-- Details -->
                                <div id="details" class="content pt-3 pt-lg-0">
                                    <div class="row">
                                        <div class="col-md-12 mb-2">
                                            <label class="form-label">Student Number</label>
                                            <input type="text" class="form-control" placeholder="Enter student number" required />
                                        </div>
                                        <div class="col-md-4 mb-2">
                                            <label class="form-label">First Name</label>
                                            <input type="text" class="form-control" placeholder="Enter first name" required />
                                        </div>
                                        <div class="col-md-2 mb-2">
                                            <label class="form-label">Middle Initial</label>
                                            <input type="text" class="form-control" placeholder="MI" required />
                                        </div>
                                        <div class="col-md-4 mb-2">
                                            <label class="form-label">Last Name</label>
                                            <input type="text" class="form-control" placeholder="Enter last name" required />
                                        </div>
                                        <div class="col-md-2 mb-2">
                                            <label class="form-label">Suffix</label>
                                            <input type="text" class="form-control" placeholder="JR, SR, III" required />
                                        </div>
                                        <div class="col-md-6 mb-2">
                                            <label class="form-label">Date of Birth</label>
                                            <input type="text" class="form-control" id="flatpickr-date" placeholder="YYYY-MM-DD" required />
                                        </div>
                                        <div class="col-md-6 mb-2">
                                            <label class="form-label">Age</label>
                                            <input type="text" class="form-control" placeholder="Enter age" required />
                                        </div>
                                        <div class="col-md-4 mb-2">
                                            <label class="form-label">Gender</label>
                                            <select class="form-select">
                                                <option value="" selected>Choose gender</option>
                                                <option value="Male">Male</option>
                                                <option value="Female">Female</option>
                                            </select>
                                        </div>
                                        <div class="col-md-4 mb-2">
                                            <label class="form-label">Civil Status</label>
                                            <select class="form-select">
                                                <option value="" selected>Choose civil status</option>
                                                <option value="Male">Male</option>
                                                <option value="Female">Female</option>
                                            </select>
                                        </div>
                                        <div class="col-md-4 mb-2">
                                            <label class="form-label">Contact Number</label>
                                            <input type="text" id="prefix-mask" class="form-control prefix-mask" name="contactNumber" placeholder="Enter contact number" required />
                                        </div>
                                        <div class="col-12 d-flex justify-content-between mt-4">
                                            <button class="btn btn-label-secondary btn-prev" disabled> <i class="ti ti-arrow-left ti-xs me-sm-1 me-0"></i>
                                                <span class="align-middle d-sm-inline-block d-none">Previous</span>
                                            </button>
                                            <button class="btn btn-primary btn-next"> <span class="align-middle d-sm-inline-block d-none me-sm-1">Next</span> <i class="ti ti-arrow-right ti-xs"></i></button>
                                        </div>
                                    </div>
                                </div>

                                <!-- Frameworks -->
                                <div id="frameworks" class="content pt-3 pt-lg-0">
                                    <h5>Category</h5>
                                    <ul class="p-0 m-0">
                                        <li class="d-flex align-items-start mb-3">
                                            <div class="badge bg-label-info p-2 me-3 rounded"><i class="ti ti-brand-react-native ti-md"></i></div>
                                            <div class="d-flex justify-content-between w-100">
                                                <div class="me-2">
                                                    <h6 class="mb-0">React Native</h6>
                                                    <small class="text-muted">Create truly native apps</small>
                                                </div>
                                                <div class="d-flex align-items-center">
                                                    <div class="form-check form-check-inline">
                                                        <input name="frameworks-radio" class="form-check-input" type="radio" value="" />
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="d-flex align-items-start mb-3">
                                            <div class="badge bg-label-danger p-2 me-3 rounded"><i class="ti ti-brand-angular ti-md"></i></div>
                                            <div class="d-flex justify-content-between w-100">
                                                <div class="me-2">
                                                    <h6 class="mb-0">Angular</h6>
                                                    <small class="text-muted">Most suited for your application</small>
                                                </div>
                                                <div class="d-flex align-items-center">
                                                    <div class="form-check form-check-inline">
                                                        <input name="frameworks-radio" class="form-check-input" type="radio" value="" checked="" />
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="d-flex align-items-start mb-3">
                                            <div class="badge bg-label-warning p-2 me-3 rounded"><i class="ti ti-brand-html5 ti-md"></i></div>
                                            <div class="d-flex justify-content-between w-100">
                                                <div class="me-2">
                                                    <h6 class="mb-0">HTML</h6>
                                                    <small class="text-muted">Progressive Framework</small>
                                                </div>
                                                <div class="d-flex align-items-center">
                                                    <div class="form-check form-check-inline">
                                                        <input name="frameworks-radio" class="form-check-input" type="radio" value="" checked />
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="d-flex align-items-start">
                                            <div class="badge bg-label-success p-2 me-3 rounded"><i class="ti ti-brand-vue ti-md"></i></div>
                                            <div class="d-flex justify-content-between w-100">
                                                <div class="me-2">
                                                    <h6 class="mb-0">VueJs</h6>
                                                    <small class="text-muted">JS web frameworks</small>
                                                </div>
                                                <div class="d-flex align-items-center">
                                                    <div class="form-check form-check-inline">
                                                        <input name="frameworks-radio" class="form-check-input" type="radio" value="" />
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>

                                    <div class="col-12 d-flex justify-content-between mt-4">
                                        <button class="btn btn-label-secondary btn-prev"> <i class="ti ti-arrow-left ti-xs me-sm-1 me-0"></i> <span class="align-middle d-sm-inline-block d-none">Previous</span> </button>
                                        <button class="btn btn-primary btn-next"> <span class="align-middle d-sm-inline-block d-none me-sm-1">Next</span> <i class="ti ti-arrow-right ti-xs"></i></button>
                                    </div>
                                </div>

                                <!-- Database -->
                                <div id="database" class="content pt-3 pt-lg-0">
                                    <div class="mb-3">
                                        <input type="text" class="form-control form-control-lg" id="exampleInputEmail2" placeholder="Database Name">
                                    </div>
                                    <h5>Select Database Engine</h5>
                                    <ul class="p-0 m-0">
                                        <li class="d-flex align-items-start mb-3">
                                            <div class="badge bg-label-danger p-2 me-3 rounded"><i class="ti ti-brand-firebase ti-md"></i></div>
                                            <div class="d-flex justify-content-between w-100">
                                                <div class="me-2">
                                                    <h6 class="mb-0">Firebase</h6>
                                                    <small class="text-muted">Cloud Firestone</small>
                                                </div>
                                                <div class="d-flex align-items-center">
                                                    <div class="form-check form-check-inline">
                                                        <input name="database-radio" class="form-check-input" type="radio" value="" />
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="d-flex align-items-start mb-3">
                                            <div class="badge bg-label-warning p-2 me-3 rounded"><i class="ti ti-brand-amazon ti-md"></i></div>
                                            <div class="d-flex justify-content-between w-100">
                                                <div class="me-2">
                                                    <h6 class="mb-0">AWS</h6>
                                                    <small class="text-muted">Amazon Fast NoSQL Database</small>
                                                </div>
                                                <div class="d-flex align-items-center">
                                                    <div class="form-check form-check-inline">
                                                        <input name="database-radio" class="form-check-input" type="radio" value="" checked />
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="d-flex align-items-start">
                                            <div class="badge bg-label-info p-2 me-3 rounded"><i class="ti ti-database ti-md"></i></div>
                                            <div class="d-flex justify-content-between w-100">
                                                <div class="me-2">
                                                    <h6 class="mb-0">MySQL</h6>
                                                    <small class="text-muted">Basic MySQL database</small>
                                                </div>
                                                <div class="d-flex align-items-center">
                                                    <div class="form-check form-check-inline">
                                                        <input name="database-radio" class="form-check-input" type="radio" value="" />
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                    <div class="col-12 d-flex justify-content-between mt-4">
                                        <button class="btn btn-label-secondary btn-prev"> <i class="ti ti-arrow-left ti-xs me-sm-1 me-0"></i> <span class="align-middle d-sm-inline-block d-none">Previous</span> </button>
                                        <button class="btn btn-primary btn-next"> <span class="align-middle d-sm-inline-block d-none me-sm-1">Next</span> <i class="ti ti-arrow-right ti-xs"></i></button>
                                    </div>
                                </div>

                                <!-- billing -->
                                <div id="billing" class="content">
                                    <div id="AppNewCCForm" class="row g-3 pt-3 pt-lg-0" onsubmit="return false">
                                        <div class="col-12">
                                            <div class="input-group input-group-merge">
                                                <input class="form-control app-credit-card-mask" type="text" placeholder="1356 3215 6548 7898" aria-describedby="modalAppAddCard" />
                                                <span class="input-group-text cursor-pointer p-1" id="modalAppAddCard"><span class="app-card-type"></span></span>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <input type="text" class="form-control" placeholder="John Doe" />
                                        </div>
                                        <div class="col-6 col-md-3">
                                            <input type="text" class="form-control app-expiry-date-mask" placeholder="MM/YY" />
                                        </div>
                                        <div class="col-6 col-md-3">
                                            <div class="input-group input-group-merge">
                                                <input type="text" id="modalAppAddCardCvv" class="form-control app-cvv-code-mask" maxlength="3" placeholder="654" />
                                                <span class="input-group-text cursor-pointer" id="modalAppAddCardCvv2"><i class="text-muted ti ti-help" data-bs-toggle="tooltip" data-bs-placement="top" title="Card Verification Value"></i></span>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <label class="switch">
                                                <input type="checkbox" class="switch-input" checked>
                                                <span class="switch-toggle-slider">
                                                    <span class="switch-on"></span>
                                                    <span class="switch-off"></span>
                                                </span>
                                                <span class="switch-label">Save card for future billing?</span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-12 d-flex justify-content-between mt-5">
                                        <button class="btn btn-label-secondary btn-prev"> <i class="ti ti-arrow-left ti-xs me-sm-1 me-0"></i> <span class="align-middle d-sm-inline-block d-none">Previous</span> </button>
                                        <button class="btn btn-primary btn-next"> <span class="align-middle d-sm-inline-block d-none me-sm-1">Next</span> <i class="ti ti-arrow-right ti-xs"></i></button>
                                    </div>
                                </div>

                                <!-- submit -->
                                <div id="submit" class="content text-center pt-3 pt-lg-0">
                                    <h5 class="mb-2 mt-3">Submit</h5>
                                    <p>Submit to kick start your project.</p>
                                    <!-- image -->
                                    <img src="../../assets/img/illustrations/girl-with-laptop.png" class="img-fluid" alt="Create App img" width="175">
                                    <div class="col-12 d-flex justify-content-between mt-4 pt-2">
                                        <button class="btn btn-label-secondary btn-prev"> <i class="ti ti-arrow-left ti-xs me-sm-1 me-0"></i> <span class="align-middle d-sm-inline-block d-none">Previous</span> </button>
                                        <button class="btn btn-success btn-next btn-submit" data-bs-dismiss="modal" aria-label="Close"> <span class="align-middle d-sm-inline-block d-none me-sm-1">Submit</span> <i class="ti ti-check ti-xs"></i></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Add Program Modal -->

    <!-- Edit Program Modal -->
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
    <!-- Edit Program Modal -->

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="assets/vendor/libs/jquery/jquery.js"></script>
    <script src="assets/vendor/libs/popper/popper.js"></script>
    <script src="assets/vendor/js/bootstrap.js"></script>
    <script src="assets/vendor/libs/node-waves/node-waves.js"></script>
    <script src="assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="assets/vendor/libs/hammer/hammer.js"></script>
    <script src="assets/vendor/libs/i18n/i18n.js"></script>
    <script src="assets/vendor/libs/typeahead-js/typeahead.js"></script>
    <script src="assets/vendor/js/menu.js"></script>

    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js"></script>
    <script src="assets/vendor/libs/select2/select2.js"></script>
    <script src="assets/vendor/libs/cleavejs/cleave.js"></script>
    <script src="assets/vendor/libs/cleavejs/cleave-phone.js"></script>
    <script src="assets/vendor/libs/select2/select2.js"></script>
    <script src="assets/vendor/libs/@form-validation/popular.js"></script>
    <script src="assets/vendor/libs/@form-validation/bootstrap5.js"></script>
    <script src="assets/vendor/libs/@form-validation/auto-focus.js"></script>
    <script src="assets/vendor/libs/bs-stepper/bs-stepper.js"></script>
    <script src="assets/vendor/libs/flatpickr/flatpickr.js"></script>
    <script src="assets/vendor/libs/bootstrap-datepicker/bootstrap-datepicker.js"></script>

    <!-- Main JS -->
    <script src="assets/js/main.js"></script>

    <!-- Page JS -->
    <script src="assets/js/app-student.js"></script>
    <script src="assets/js/modal-create-app.js"></script>
    <script src="assets/js/forms-pickers.js"></script>
    <script src="assets/js/forms-extras.js"></script>
    <!-- <script src="assets/js/modal-edit-user.js"></script> -->
</body>

</html>