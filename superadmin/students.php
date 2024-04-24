<?php

include "includes/includes.php";
// kailangan parehas ang second argument nito sa table name ng database
$control = new Control(1, 'student');

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

    <!-- Helpers -->
    <script src="assets/vendor/js/helpers.js"></script>
    <script src="assets/js/config.js"></script>
</head>

<body>

    <?php $control->student();  ?>

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
    <script src="assets/js/modal-create-student.js"></script>
    <script src="assets/js/forms-pickers.js"></script>
    <script src="assets/js/forms-extras.js"></script>
    <script src="assets/js/toastify.min.js"></script>
    <!-- <script src="assets/js/modal-edit-user.js"></script> -->

    <script>
        // Function to fetch cities based on the selected province
        function fetchCities(provinceCode) {
            $.getJSON(`https://psgc.gitlab.io/api/provinces/${provinceCode}/cities-municipalities/`, function(data) {
                $('#city').empty(); // Clear existing options
                // Loop through the data and append options to the city dropdown
                $.each(data, function(index, city) {
                    $('#city').append($('<option>', {
                        value: city.code, // Use city code as value
                        text: city.name
                    }));
                });
            }).fail(function(jqxhr, textStatus, error) {
                var err = textStatus + ", " + error;
                console.log("Request Failed: " + err);
            });
        }

        // Function to fetch barangays based on the selected city
        function fetchBarangays(cityCode) {
            $.getJSON(`https://psgc.gitlab.io/api/cities-municipalities/${cityCode}/barangays/`, function(data) {
                $('#barangay').empty(); // Clear existing options
                // Loop through the data and append options to the barangay dropdown
                $.each(data, function(index, barangay) {
                    $('#barangay').append($('<option>', {
                        value: barangay.code, // Use barangay code as value
                        text: barangay.name
                    }));
                });
            }).fail(function(jqxhr, textStatus, error) {
                var err = textStatus + ", " + error;
                console.log("Request Failed: " + err);
            });
        }

        // Wait for the document to be ready
        $(document).ready(function() {
            // Fetch data for provinces and populate the province dropdown
            $.getJSON('https://psgc.gitlab.io/api/regions/040000000/provinces/', function(data) {
                // Loop through the data and append options to the province dropdown
                $.each(data, function(index, province) {
                    $('#province').append($('<option>', {
                        value: province.code, // Use province code as value
                        text: province.name
                    }));
                });

                // Trigger change event for the province dropdown to fetch cities for the initially selected province
                $('#province').change(function() {
                    var selectedProvinceCode = $(this).val(); // Use province code
                    fetchCities(selectedProvinceCode);
                    var selectedProvinceName = $(this).find('option:selected').text();
                    $('#provinceName').val(selectedProvinceName); // Set hidden input with province name
                }).change(); // Trigger change event initially

                // Trigger change event for the city dropdown to fetch barangays for the initially selected city
                $('#city').change(function() {
                    var selectedCityCode = $(this).val(); // Use city code
                    fetchBarangays(selectedCityCode);
                    var selectedCityName = $(this).find('option:selected').text();
                    $('#cityName').val(selectedCityName); // Set hidden input with city name
                }).change(); // Trigger change event initially

                // Trigger change event for the barangay dropdown to populate the barangay name input
                $('#barangay').change(function() {
                    var selectedBarangayName = $(this).find('option:selected').text();
                    $('#barangayName').val(selectedBarangayName); // Set hidden input with barangay name
                });
            }).fail(function(jqxhr, textStatus, error) {
                var err = textStatus + ", " + error;
                console.log("Request Failed: " + err);
            });
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