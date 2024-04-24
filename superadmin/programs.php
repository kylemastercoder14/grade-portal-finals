<?php

include "includes/includes.php";
// kailangan parehas ang second argument nito sa table name ng database
$control = new Control(1, 'program');

?>

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
    <link rel="stylesheet" href="assets/vendor/libs/@form-validation/form-validation.css" />
    <link rel="stylesheet" href="assets/vendor/libs/bs-stepper/bs-stepper.css" />
    <link rel="stylesheet" href="assets/css/toastify.min.css" />
    <link rel="stylesheet" href="assets/css/dataTables.bootstrap5.css" />

    <!-- Helpers -->
    <script src="assets/vendor/js/helpers.js"></script>
    <script src="assets/js/config.js"></script>
</head>

<body>

    <?php $control->program(); ?>
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
    <script src="assets/js/toastify.min.js"></script>
    <script src="assets/js/dataTables.bootstrap5.js"></script>
    <script src="assets/js/dataTables.js"></script>

    <!-- Main JS -->
    <script src="assets/js/main.js"></script>

    <script>
        new DataTable('#programDatatable', {
            lengthMenu: [
                [5, 10, 25, 50, -1],
                [5, 10, 25, 50, 'All']
            ],
            paging: true
        });
    </script>

    <script>
        function editProgramDataJS(programData) {
            console.log(programData);

            // need ko iparse kase naka json state sya dahil inencode ko sya
            var data = JSON.parse(programData);

            document.getElementById('editProgramName').value = data['program_name'];
            document.getElementById('editProgramCode').value = data['program_code'];
            document.getElementById('programId').value = data['program_id'];
        }

        function archiveProgramDataJS(programData) {
            try {
                var data = JSON.parse(programData);
                console.log(data);
                document.getElementById('archiveProgramName').value = data['program_name'] || '';
                document.getElementById('archiveProgramCode').value = data['program_code'] || '';
                document.getElementById('archiveProgramId').value = data['program_id'] || '';
            } catch (error) {
                console.error('Error parsing JSON:', error);
                // Optionally, you can display an error message to the user
            }
        }
    </script>

    <script>
        Toastify({
            text: "<?= $_SESSION['message'] ?>",
            duration: 3000,
            gravity: "top",
            position: "right",
            stopOnFocus: true,
            style: {
                background: "<?= $_SESSION['status'] ?>",
            },
            onClick: function() {}
        }).showToast();

        // Unset the session after displaying the message
        <?php unset($_SESSION['message']); ?>
    </script>

</body>

</html>