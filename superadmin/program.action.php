<?php

include "includes/includes.php";
$model = new Model();

// kailangan parehas ang pagkakasunod at pangalan ng text input field sa column ng data table.
if(isset($_POST['add_program'])){
    $program_id = 'KLD-' . $_POST['program_code'] . "-" . rand();
    $currentPage = $_POST['current_page'];
    $data = array(
        'program_id' => $program_id,
        'program_name' => $_POST['program_name'],
        'program_code' => $_POST['program_code'],
    );
    $model->callInsertProgram($data,$currentPage);
}



?>