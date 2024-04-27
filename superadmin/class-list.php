<?php

include "includes/includes.php";
// kailangan parehas ang second argument nito sa table name ng database
$control = new Control(1, 'class_list');

?>

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
    <link rel="stylesheet" href="assets/css/toastify.min.css" />
    <link rel="stylesheet" href="assets/css/dataTables.bootstrap5.css" />

    <!-- Helpers -->
    <script src="assets/vendor/js/helpers.js"></script>
    <script src="assets/js/config.js"></script>
</head>

<body>

    <?php $control->classList();  ?>


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
    <script src="assets/js/modal-create-student.js"></script>
    <script src="assets/js/forms-pickers.js"></script>
    <script src="assets/js/forms-extras.js"></script>
    <script src="assets/js/toastify.min.js"></script>
    <script src="assets/js/dataTables.bootstrap5.js"></script>
    <script src="assets/js/dataTables.js"></script>

    <script>
        new DataTable('#studentDatatable', {
            lengthMenu: [
                [5, 10, 25, 50, -1],
                [5, 10, 25, 50, 'All']
            ],
            paging: true
        });
    </script>

    <script>
        function getSections() {
            var programId = document.getElementById("programId").value;
            var yearLevel = document.getElementById("yearLevel").value;

            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    // Update the section dropdown with new options
                    var sectionDropdown = document.getElementById("sectionId");
                    sectionDropdown.innerHTML = this.responseText;
                }
            };
            xhttp.open("GET", "fetch_sections.php?program_id=" + programId + "&year_level=" + yearLevel, true);
            xhttp.send();
        }

        function getSections2() {
            var programId2 = document.getElementById("programId2").value;
            var yearLevel2 = document.getElementById("yearLevel2").value;

            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    // Update the section dropdown with new options
                    var sectionDropdown2 = document.getElementById("sectionId2");
                    sectionDropdown2.innerHTML = this.responseText;
                }
            };
            xhttp.open("GET", "fetch_sections.php?program_id=" + programId2 + "&year_level=" + yearLevel2, true);
            xhttp.send();
        }
    </script>

    <script>
        // Array to store selected student IDs
        let selectedStudentIds = [];

        // Select the header checkbox
        const headerCheckbox = document.querySelector('#studentDatatable thead input[type="checkbox"]');

        // Select all checkboxes in tbody
        const checkboxes = document.querySelectorAll('#studentDatatable tbody input[type="checkbox"]');

        // Function to update the student IDs in the text field
        function updateStudentIdsField() {
            document.getElementById("studentIds").value = selectedStudentIds.join(",");
        }

        // Function to handle checkbox change event
        function handleCheckboxChange(event) {
            // If the clicked checkbox is in the header
            if (event.target === headerCheckbox) {
                // Loop through all checkboxes in tbody and set their checked state to be the same as headerCheckbox
                checkboxes.forEach((checkbox) => {
                    checkbox.checked = headerCheckbox.checked;
                    if (checkbox.checked) {
                        // Add student ID to selectedStudentIds array if checkbox is checked
                        selectedStudentIds.push(checkbox.parentNode.nextElementSibling.textContent.trim());
                    } else {
                        // Remove student ID from selectedStudentIds array if checkbox is unchecked
                        selectedStudentIds = selectedStudentIds.filter(id => id !== checkbox.parentNode.nextElementSibling.textContent.trim());
                    }
                });
            } else {
                // If the clicked checkbox is in the tbody
                // Check if all checkboxes in tbody are checked and update the headerCheckbox accordingly
                let allChecked = true;
                checkboxes.forEach((checkbox) => {
                    if (!checkbox.checked) {
                        allChecked = false;
                    }
                });
                headerCheckbox.checked = allChecked;

                // Update selectedStudentIds array based on checkbox state
                if (event.target.checked) {
                    // Add student ID to selectedStudentIds array if checkbox is checked
                    selectedStudentIds.push(event.target.parentNode.nextElementSibling.textContent.trim());
                } else {
                    // Remove student ID from selectedStudentIds array if checkbox is unchecked
                    selectedStudentIds = selectedStudentIds.filter(id => id !== event.target.parentNode.nextElementSibling.textContent.trim());
                }
            }

            // Log selected student IDs
            console.log(selectedStudentIds);

            // Update the text field with selected student IDs
            updateStudentIdsField();
        }

        // Add event listener to header checkbox
        headerCheckbox.addEventListener('change', handleCheckboxChange);

        // Add event listener to each checkbox in tbody
        checkboxes.forEach((checkbox) => {
            checkbox.addEventListener('change', handleCheckboxChange);
        });

        // Function to handle modal show event
        function handleModalShow() {
            // Update the text field with selected student IDs
            updateStudentIdsField();
        }

        // Select the modal element
        const assignSectionModal = document.querySelector('#assignSectionModal');

        // Add event listener for modal show event
        assignSectionModal.addEventListener('show.bs.modal', handleModalShow);
    </script>

    <script>
        <?php
        $messageStatus = $control->callStatusMessage($_GET['message']);
        ?>
        Toastify({
            text: "<?php echo $messageStatus['message'] ?>",
            duration: 3000,
            gravity: "top",
            position: "right",
            stopOnFocus: true,
            style: {
                background: "<?php echo $messageStatus['status'] ?>",
            },
            onClick: function() {}
        }).showToast();
    </script>
</body>

</html>