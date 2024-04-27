<?php

include "includes/includes.php";
session_start();
$control = new Control('KLD-23-75890', 'advisor');

?>

<!DOCTYPE html>

<html lang="en" class="dark-style layout-compact layout-menu-fixed" data-theme="theme-default" data-template="horizontal-menu-template">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

  <title>KLD Grades Portal - eCOG</title>

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
  <link rel="stylesheet" href="assets/css/toastify.min.css" />
  <link rel="stylesheet" href="assets/css/virtual-select.min.css">
  <link rel="stylesheet" href="assets/css/dataTables.bootstrap5.css" />

  <!-- Helpers -->
  <script src="assets/vendor/js/helpers.js"></script>
  <script src="assets/js/config.js"></script>
</head>

<body>

  <?php $control->advisor(); ?>
  <!-- Core JS -->
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
  <script src="assets/js/virtual-select.min.js"></script>

  <!-- Main JS -->
  <script src="assets/js/main.js"></script>

  <!-- Page JS -->
  <script src="assets/js/modal-create-student.js"></script>
  <script src="assets/js/forms-pickers.js"></script>
  <script src="assets/js/forms-extras.js"></script>
  <script src="assets/js/toastify.min.js"></script>
  <script src="assets/js/dataTables.bootstrap5.js"></script>
  <script src="assets/js/dataTables.js"></script>

  <script>
    new DataTable('#advisoryDatatable', {
      lengthMenu: [
        [5, 10, 25, 50, -1],
        [5, 10, 25, 50, 'All']
      ],
      paging: true
    });
  </script>

</body>

</html>