<!DOCTYPE html>

<html lang="en" class="dark-style layout-compact layout-menu-fixed" data-theme="theme-default" data-template="horizontal-menu-template">

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
    <link rel="stylesheet" href="assets/vendor/libs/%40form-validation/form-validation.css" />
    <link rel="stylesheet" href="assets/vendor/libs/bs-stepper/bs-stepper.css" />

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
                            <span class="text-muted fw-light"><a href="index.php" class="text-success">Dashboard</a> /</span> Programs
                        </h5>
                        <!-- Program Table -->
                        <div class="card">
                            <div class="card-datatable table-responsive">
                                <table class="datatables-programs table">
                                    <thead class="border-top">
                                        <tr>
                                            <th>#</th>
                                            <th>Program Name</th>
                                            <th>Program Code</th>
                                            <th>Date Created</th>
                                            <th>actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>Institute of Information and Computing Sciences</td>
                                            <td>IICS</td>
                                            <td>April 20, 2024</td>
                                            <td>
                                                <div class="d-inline-block text-nowrap"><button class="btn btn-sm btn-icon dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="ti ti-dots-vertical me-2"></i></button>
                                                    <div class="dropdown-menu dropdown-menu-end m-0">
                                                        <a data-bs-toggle="modal" data-bs-target="#editProgram" href="javascript:0;" class="dropdown-item"><i class="ti ti-edit ms-1"></i>Update</a>
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
    <div class="modal fade" id="addProgram" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-simple modal-edit-user modal-dialog-centered">
            <div class="modal-content p-3 p-md-5">
                <div class="modal-body">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    <div class="text-center mb-4">
                        <h3 class="mb-2">Add Program Information</h3>
                    </div>
                    <form class="row g-3" method="POST">
                        <div class="col-12 col-md-12">
                            <label class="form-label">Program Name</label>
                            <input type="text" class="form-control" placeholder="Enter program name" required />
                        </div>
                        <div class="col-12 col-md-12">
                            <label class="form-label">Program Code</label>
                            <input type="text" class="form-control" placeholder="Enter program code" required />
                        </div>
                        <div class="col-12 text-center">
                            <button type="submit" class="btn btn-success me-sm-3 me-1">Create Program</button>
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
                    <form class="row g-3" method="POST">
                        <div class="col-12 col-md-12">
                            <label class="form-label">Program Name</label>
                            <input type="text" class="form-control" placeholder="Enter program name" required />
                        </div>
                        <div class="col-12 col-md-12">
                            <label class="form-label">Program Code</label>
                            <input type="text" class="form-control" placeholder="Enter program code" required />
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
    <script src="assets/vendor/libs/%40form-validation/popular.js"></script>
    <script src="assets/vendor/libs/%40form-validation/bootstrap5.js"></script>
    <script src="assets/vendor/libs/%40form-validation/auto-focus.js"></script>
    <script src="assets/vendor/libs/bs-stepper/bs-stepper.js"></script>

    <!-- Main JS -->
    <script src="assets/js/main.js"></script>

    <!-- Page JS -->
    <script src="assets/js/app-program.js"></script>
    <!-- <script src="assets/js/modal-edit-user.js"></script> -->
</body>

</html>