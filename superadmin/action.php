<?php

include "includes/includes.php";
$model = new Model();

// kailangan parehas ang pagkakasunod at pangalan ng text input field sa column ng data table. archive_program 
if (isset($_POST['add_program'])) {
    $program_id = 'KLD-' . $_POST['program_code'] . "-" . rand();
    $currentPage = $_POST['current_page'];
    $data = array(
        'program_id' => $program_id,
        'program_name' => $_POST['program_name'],
        'program_code' => $_POST['program_code'],
    );
    $model->callInsertProgram($data, $currentPage);
} else if (isset($_POST['edit_program'])) {

    $currentPage = $_POST['current_page'];
    $data = array(
        'program_id' => $_POST['programId'],
        'program_name' => $_POST['editProgramName'],
        'program_code' => $_POST['editProgramCode'],
    );
    $model->callEditProgram($data, $currentPage);
} else if (isset($_POST['archive_program'])) {

    $currentPage = $_POST['current_page'];
    $data = array(
        'program_id' => $_POST['archiveProgramId'],
        'program_name' => $_POST['archiveProgramName'],
        'program_code' => $_POST['archiveProgramCode'],
    );
    $model->callArchiveProgram($data, $currentPage);
} else if (isset($_POST['unarchive_program'])) {
    $currentPage = $_POST['current_page'];
    $program_id = $_POST['program_id'];

    $model->callUnarchiveProgram($program_id, $currentPage);
} else if (isset($_POST['add_section'])) {
    $yearToday = date("Y");
    $section_id = $_POST['program_id'] . "-" . $yearToday . rand();
    $section_name = strtoupper($_POST['section_name']);
    $currentPage = $_POST['current_page'];
    $data = array(
        'section_id' => $section_id,
        'section_name' => $section_name,
        'program_id' => $_POST['program_id'],
        'year_level' => $_POST['year_level'],

    );
    $model->callInsertSection($data, $currentPage);
} else if (isset($_POST['add_subject'])) {
    $course_id = 'KLD-' . $_POST['course_code'] . "-" . rand();
    $currentPage = $_POST['current_page'];
    $data = array(
        'course_id' => $course_id,
        'course_name' => $_POST['course_name'],
        'course_code' => $_POST['course_code'],
        'course_unit' => $_POST['course_unit'],
        'pre_requisite' => $_POST['pre_requisite']
    );

    $model->callInsertSubject($data, $currentPage);
} else if (isset($_POST['add_student'])) {
    $currentPage = $_POST['current_page'];
    $data = array(
        'student_id' => $_POST['student_id'],
        'firstname' => $_POST['firstname'],
        'middlename' => $_POST['middlename'],
        'lastname' => $_POST['lastname'],
        'suffix' => $_POST['suffix'],
        'birthdate' => $_POST['birthdate'],
        'age' => $_POST['age'],
        'gender' => $_POST['gender'],
        'civil_status' => $_POST['civil_status'],
        'contact_number' => $_POST['contact_number'],
        'province' => $_POST['province'],
        'city' => $_POST['city'],
        'barangay' => $_POST['barangay'],
        'house_no' => $_POST['house_no'],
        'zip_code' => $_POST['zip_code'],
        'kld_email' => $_POST['kld_email'],
        'year_level' => $_POST['year_level'],
        'program_id' => $_POST['program_id'],
        'section_id' => $_POST['section_id'],
        'elementary' => $_POST['elementary'],
        'highschool' => $_POST['highschool'],
        'password' => $_POST['student_id'],
    );

    $model->callInsertStudent($data, $currentPage);
} else if (isset($_POST['add_advisor'])) {
    $currentPage = $_POST['current_page'];
    $data = array(
        'advisor_id' => $_POST['advisor_id'],
        'firstname' => $_POST['firstname'],
        'middlename' => $_POST['middlename'],
        'lastname' => $_POST['lastname'],
        'suffix' => $_POST['suffix'],
        'birthdate' => $_POST['birthdate'],
        'age' => $_POST['age'],
        'gender' => $_POST['gender'],
        'civil_status' => $_POST['civil_status'],
        'contact_number' => $_POST['contact_number'],
        'province' => $_POST['province'],
        'city' => $_POST['city'],
        'barangay' => $_POST['barangay'],
        'house_no' => $_POST['house_no'],
        'zip_code' => $_POST['zip_code'],
        'kld_email' => $_POST['kld_email'],
        'program_id' => $_POST['program_id'],
        'password' => $_POST['student_id'],
    );

    $model->callInsertAdvisor($data, $currentPage);
}else if(isset($_POST['backup'])) {
    $db = new Dbconfig();
    $db->backupDatabase();
    header("Location: index.php");
}
