<?php
require_once 'dbconfig.php';
require_once 'models.php';

if (isset($_POST['editApplicantBtn'])) {
    $applicant_id = $_GET['applicant_id']; 
    $first_name = $_POST['first_name']; 
    $last_name = $_POST['last_name']; 
    $email = $_POST['email'];
    $phone_number = $_POST['phone_number'];
    $position_applied = $_POST['position_applied'];

    editApplicant($pdo, $applicant_id, $first_name, $last_name, $email, $phone_number, $position_applied);
    header("Location: ../index.php");
    exit();
}

if (isset($_POST['AddApplicantBtn'])) {
    $first_name = $_POST['first_name']; 
    $last_name = $_POST['last_name']; 
    $email = $_POST['email'];
    $phone_number = $_POST['phone_number'];
    $position_applied = $_POST['position_applied'];

    AddApplicant($pdo,  $first_name, $last_name, $email, $phone_number, $position_applied);
    header("Location: ../index.php");
    exit();
}


if (isset($_POST['deleteApplicantBtn'])) {
    $applicant_id = $_GET['applicant_id'];
    deleteApplicant($pdo, $applicant_id);
    header("Location: ../index.php");
    exit();
}


?>
