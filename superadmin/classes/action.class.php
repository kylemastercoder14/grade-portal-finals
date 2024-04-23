<?php

include "../includes/includes.php";
$model = new Model();

if(isset($_POST['add_program'])) {
    $program_name = $_POST['program_name'];
    $program_code = $_POST['program_code'];

    $model->callInsertProgram($program_name,$program_code);
}

?>