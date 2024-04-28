<?php
include ('includes/includes.php');

$control = new Control();
$model = new Model();

if (isset($_POST['signin'])) {
    $advisor_id = $_POST['advisor_id'];
    $password = $_POST['password'];
    $model->callSignin($advisor_id, $password);
};