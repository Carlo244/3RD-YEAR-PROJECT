<?php
require_once 'dbconfig.php';
require_once 'models.php';
session_start();

if (isset($_POST['editApplicantBtn'])) {
    $applicant_id = $_GET['applicant_id']; 
    $first_name = $_POST['first_name']; 
    $last_name = $_POST['last_name']; 
    $email = $_POST['email']; 
    $phone_number = $_POST['phone_number']; 
    $position_applied = $_POST['position_applied']; 
    $updated_by = $_SESSION['username']; 
    editApplicant($pdo, $applicant_id, $first_name, $last_name, $email, $phone_number, $position_applied, $updated_by); 
    header("Location: ../index.php"); 
    exit(); }


if (isset($_POST['AddApplicantBtn'])) {
    $first_name = $_POST['first_name']; 
    $last_name = $_POST['last_name']; 
    $email = $_POST['email']; 
    $phone_number = $_POST['phone_number']; 
    $position_applied = $_POST['position_applied']; 
    $created_by = $_SESSION['username'];
    addApplicant($pdo, $first_name, $last_name, $email, $phone_number, $position_applied, $created_by); 
    $_SESSION['message'] = "Applicant added successfully by " . 
    $created_by; header("Location: ../index.php"); exit();
}


if (isset($_POST['deleteApplicantBtn'])) {
    $applicant_id = $_GET['applicant_id'];
    deleteApplicant($pdo, $applicant_id);
    header("Location: ../index.php");
    exit();
}

if (isset($_POST['registermanager'])) {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    createManager($pdo, $firstname, $lastname, $username, $password);
    header("Location: ../index.php");
    exit();
}


if (isset($_POST['loginmanager'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $user = getmanager($pdo, $username);
    if ($user && password_verify($password, $user['password'])) {
        // Password is correct, set session variables
        $_SESSION['logged_in'] = true;
        $_SESSION['username'] = $user['username'];
        header("Location: ../index.php");
        exit();
    } else {
        $_SESSION['error'] = "Incorrect username or password.";
        header("Location: ../login.php"); // Redirect back to login with error
        exit();
    }
}

?>
