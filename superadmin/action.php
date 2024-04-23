<?php

include "includes/includes.php";
$model = new Model();

// kailangan parehas ang pagkakasunod at pangalan ng text input field sa column ng data table. archive_program 
if(isset($_POST['add_program'])){
    $program_id = 'KLD-' . $_POST['program_code'] . "-" . rand();
    $currentPage = $_POST['current_page'];
    $data = array(
        'program_id' => $program_id,
        'program_name' => $_POST['program_name'],
        'program_code' => $_POST['program_code'],
    );
    $model->callInsertProgram($data,$currentPage);
} else if(isset($_POST['edit_program'])){
    
    $currentPage = $_POST['current_page'];
    $data = array(
        'program_id' => $_POST['programId'],
        'program_name' => $_POST['editProgramName'],
        'program_code' => $_POST['editProgramCode'],
    );
    $model->callEditProgram($data,$currentPage);
} else if(isset($_POST['archive_program'])){
    
    $currentPage = $_POST['current_page'];
    $data = array(
        'program_id' => $_POST['archiveProgramId'],
        'program_name' => $_POST['archiveProgramName'],
        'program_code' => $_POST['archiveProgramCode'],
    );
    $model->callArchiveProgram($data,$currentPage);
}else if(isset($_POST['unarchive_program'])){
    $currentPage = $_POST['current_page'];
    $program_id = $_POST['program_id'];
    
    $model->callUnarchiveProgram($program_id,$currentPage);
}else if(isset($_POST['add_section'])) {
    $yearToday = date("Y");
    $section_id = 'KLD-' . $_POST['program_code'] . "-" . $yearToday . rand();
    $section_name = $_POST['section_name'];
    $currentPage = $_POST['current_page'];
    $data = array(
        'section_id' => $section_id,
        'section_name' => $_POST['section_name'],
    );
    $model->callInsertSection($data,$currentPage);
}

?>
