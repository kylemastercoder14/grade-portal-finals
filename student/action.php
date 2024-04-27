<?php


include "includes/includes.php";
$model = new Model();

if (isset($_POST['signin'])) {
    $student_id = $_POST['student_id'];
    $password = $_POST['password'];
    $model->callSignin($student_id, $password);
}

?>