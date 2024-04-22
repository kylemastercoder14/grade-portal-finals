<!DOCTYPE html>

<html
  lang="en"
  class="dark-style layout-compact layout-menu-fixed"
  data-theme="theme-default"
  data-template="horizontal-menu-template"
>
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />

    <title>KLD Grades Portal - eCOG</title>

    <!-- Favicon -->
    <link
      rel="icon"
      type="image/x-icon"
      href="assets/images/logo.png"
    />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com/" />
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&amp;ampdisplay=swap"
      rel="stylesheet"
    />

    <!-- Icons -->
    <link rel="stylesheet" href="assets/vendor/fonts/fontawesome.css" />
    <link rel="stylesheet" href="assets/vendor/fonts/tabler-icons.css" />
    <link rel="stylesheet" href="assets/vendor/fonts/flag-icons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="assets/vendor/css/rtl/core.css" />
    <link rel="stylesheet" href="assets/vendor/css/rtl/theme-default.css" />
    <link rel="stylesheet" href="assets/css/demo.css" />

    <!-- Vendors CSS -->
    <link
      rel="stylesheet"
      href="assets/vendor/libs/node-waves/node-waves.css"
    />
    <link
      rel="stylesheet"
      href="assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css"
    />
    <link
      rel="stylesheet"
      href="assets/vendor/libs/typeahead-js/typeahead.css"
    />
    <link
      rel="stylesheet"
      href="assets/vendor/libs/apex-charts/apex-charts.css"
    />
    <link rel="stylesheet" href="assets/vendor/libs/swiper/swiper.css" />
    <link
      rel="stylesheet"
      href="assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css"
    />
    <link
      rel="stylesheet"
      href="assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css"
    />
    <link
      rel="stylesheet"
      href="assets/vendor/libs/datatables-checkboxes-jquery/datatables.checkboxes.css"
    />

    <!-- Page CSS -->
    <link rel="stylesheet" href="assets/vendor/css/pages/cards-advance.css" />

    <!-- Helpers -->
    <script src="assets/vendor/js/helpers.js"></script>
    <script src="assets/js/config.js"></script>
  </head>

  <body>
    <!-- Layout wrapper -->
    <div
      class="layout-wrapper layout-navbar-full layout-horizontal layout-without-menu"
    >
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
              <div class="row">
                <!-- Student Overview -->
                <div class="col-lg-6 col-md-6 col-sm-12 mb-4">
                  <div class="card">
                    <div class="card-header">
                      <div class="d-flex justify-content-between">
                        <small class="d-block mb-1 text-muted"
                          >Total Students</small
                        >
                      </div>
                      <h4 class="card-title mb-1">4,083</h4>
                    </div>
                    <div class="card-body">
                      <div class="row">
                        <div class="col-4">
                          <div class="d-flex gap-2 align-items-center mb-2">
                            <span class="badge bg-label-success p-1 rounded"
                              ><i class="ti ti-users ti-xs"></i
                            ></span>
                            <p class="mb-0">2022 - 2023</p>
                          </div>
                          <h5 class="mb-0 pt-1 text-nowrap">62.2%</h5>
                          <small class="text-muted">3,260</small>
                        </div>
                        <div class="col-4">
                          <div class="divider divider-vertical">
                            <div class="divider-text">
                              <span class="badge-divider-bg bg-label-secondary"
                                >VS</span
                              >
                            </div>
                          </div>
                        </div>
                        <div class="col-4 text-end">
                          <div
                            class="d-flex gap-2 justify-content-end align-items-center mb-2"
                          >
                            <p class="mb-0">2023 - 2024</p>
                            <span class="badge bg-label-success p-1 rounded"
                              ><i class="ti ti-users ti-xs"></i
                            ></span>
                          </div>
                          <h5 class="mb-0 pt-1 text-nowrap ms-lg-n3 ms-xl-0">
                            25.5%
                          </h5>
                          <small class="text-muted">1,489</small>
                        </div>
                      </div>
                      <div class="d-flex align-items-center mt-4">
                        <div class="progress w-100" style="height: 8px">
                          <div
                            class="progress-bar bg-success"
                            style="width: 70%"
                            role="progressbar"
                            aria-valuenow="70"
                            aria-valuemin="0"
                            aria-valuemax="100"
                          ></div>
                          <div
                            class="progress-bar bg-danger"
                            role="progressbar"
                            style="width: 30%"
                            aria-valuenow="30"
                            aria-valuemin="0"
                            aria-valuemax="100"
                          ></div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!--/ Student Overview -->

                <!-- Student Grades Overview -->
                <div class="col-lg-6 col-md-6 col-sm-12 mb-4">
                  <div class="card">
                    <div class="card-header">
                      <div class="d-flex justify-content-between">
                        <small class="d-block mb-1 text-muted"
                          >Student Grades</small
                        >
                        
                      </div>
                      <h4 class="card-title mb-1">4,083</h4>
                    </div>
                    <div class="card-body">
                      <div class="row">
                        <div class="col-4">
                          <div class="d-flex gap-2 align-items-center mb-2">
                            <span class="badge bg-label-success p-1 rounded"
                              ><i class="ti ti-percentage ti-xs"></i
                            ></span>
                            <p class="mb-0">Passed</p>
                          </div>
                          <h5 class="mb-0 pt-1 text-nowrap">62.2%</h5>
                          <small class="text-muted">3,907</small>
                        </div>
                        <div class="col-4">
                          <div class="divider divider-vertical">
                            <div class="divider-text">
                              <span class="badge-divider-bg bg-label-secondary"
                                >VS</span
                              >
                            </div>
                          </div>
                        </div>
                        <div class="col-4 text-end">
                          <div
                            class="d-flex gap-2 justify-content-end align-items-center mb-2"
                          >
                            <p class="mb-0">Failed</p>
                            <span class="badge bg-label-danger p-1 rounded"
                              ><i class="ti ti-percentage ti-xs"></i
                            ></span>
                          </div>
                          <h5 class="mb-0 pt-1 text-nowrap ms-lg-n3 ms-xl-0">
                            25.5%
                          </h5>
                          <small class="text-muted">356</small>
                        </div>
                      </div>
                      <div class="d-flex align-items-center mt-4">
                        <div class="progress w-100" style="height: 8px">
                          <div
                            class="progress-bar bg-success"
                            style="width: 90%"
                            role="progressbar"
                            aria-valuenow="90"
                            aria-valuemin="0"
                            aria-valuemax="100"
                          ></div>
                          <div
                            class="progress-bar bg-danger"
                            role="progressbar"
                            style="width: 10%"
                            aria-valuenow="10"
                            aria-valuemin="0"
                            aria-valuemax="100"
                          ></div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- Student Grades Overview -->

                <!-- Total Submitted Grades -->
                <div class="col-md-6 col-sm-12 mb-4">
                  <div class="card">
                    <div
                      class="card-header d-flex justify-content-between pb-0"
                    >
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
                            <li
                              class="d-flex gap-3 align-items-center mb-lg-3 pt-2 pb-1"
                            >
                              <div class="badge rounded bg-label-danger p-1">
                                <i class="ti ti-x ti-sm"></i>
                              </div>
                              <div>
                                <h6 class="mb-0 text-nowrap">Not Submitted</h6>
                                <small class="text-muted">100</small>
                              </div>
                            </li>
                            <li
                              class="d-flex gap-3 align-items-center mb-lg-3 pb-1"
                            >
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
                        <li
                          class="mb-4 pb-1 d-flex justify-content-between align-items-center"
                        >
                          <div
                            class="d-flex justify-content-between w-100 flex-wrap"
                          >
                            <h6 class="mb-0 ms-3">Bachelor of Science in Information System</h6>
                            <div class="d-flex">
                              <p class="mb-0 fw-medium">1,111</p>
                              <p class="ms-3 text-warning mb-0">26%</p>
                            </div>
                          </div>
                        </li>
                        <li
                          class="mb-4 pb-1 d-flex justify-content-between align-items-center"
                        >
                          <div
                            class="d-flex justify-content-between w-100 flex-wrap"
                          >
                            <h6 class="mb-0 ms-3">Bachelor of Science in Psychology</h6>
                            <div class="d-flex">
                              <p class="mb-0 fw-medium">3,089</p>
                              <p class="ms-3 text-success mb-0">57%%</p>
                            </div>
                          </div>
                        </li>
                        <li
                          class="mb-4 pb-1 d-flex justify-content-between align-items-center"
                        >
                          <div
                            class="d-flex justify-content-between w-100 flex-wrap"
                          >
                            <h6 class="mb-0 ms-3">Bachelor of Science in Nursing</h6>
                            <div class="d-flex">
                              <p class="mb-0 fw-medium">705</p>
                              <p class="ms-3 text-warning mb-0">17%</p>
                            </div>
                          </div>
                        </li>
                        <li
                          class="mb-4 pb-1 d-flex justify-content-between align-items-center"
                        >
                          <div
                            class="d-flex justify-content-between w-100 flex-wrap"
                          >
                            <h6 class="mb-0 ms-3">Bachelor of Science in Engineering</h6>
                            <div class="d-flex">
                              <p class="mb-0 fw-medium">624</p>
                              <p class="ms-3 text-warning mb-0">15%</p>
                            </div>
                          </div>
                        </li>
                        <li
                          class="mb-4 pb-1 d-flex justify-content-between align-items-center"
                        >
                          <div
                            class="d-flex justify-content-between w-100 flex-wrap"
                          >
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

              </div>
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
      <a
        href="#"
        class="btn btn-danger btn-buy-now"
        >
        <i class="ti ti-headset ti-sm"></i>
        </a
      >
    </div>

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
    <script src="assets/vendor/libs/apex-charts/apexcharts.js"></script>
    <script src="assets/vendor/libs/swiper/swiper.js"></script>
    <script src="assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js"></script>

    <!-- Main JS -->
    <script src="assets/js/main.js"></script>

    <!-- Page JS -->
    <script src="assets/js/dashboards-analytics.js"></script>
  </body>
</html>
