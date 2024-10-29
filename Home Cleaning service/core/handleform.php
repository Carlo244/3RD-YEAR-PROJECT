<?php
session_start();
require_once 'dbconfig.php';
require_once 'models.php';

// Handle user registration
if (isset($_POST['RegisterUser'])) {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hashing the password
    $role = $_POST['role'];
    if (userExists($pdo, $username)) {
        echo "Username already taken!";
    } else {
        try {
            if (createUser($pdo, $firstname, $lastname, $username, $password, $role)) {
                $_SESSION['message'] = "Registration successful!";
                header("Location: ../login.php"); // Redirect to login page after successful registration
                exit();
            } else {
                echo "Error in registration!";
            }
        } catch (Exception $e) {
            echo "Failed to register: " . $e->getMessage();
        }
    }
}

// Handle user login
if (isset($_POST['LoginUser'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $user = getUser($pdo, $username);
    if ($user && password_verify($password, $user['password'])) {
        // Password is correct, set session variables
        $_SESSION['logged_in'] = true;
        $_SESSION['username'] = $user['username'];
        $_SESSION['role'] = $user['role'];
        // Ensure no output before this line
        header("Location: ../index.php");
        exit();
    } else {
        $_SESSION['error'] = "Incorrect username or password.";
        header("Location: ../login.php"); // Redirect back to login with error
        exit();
    }
}


// Handle adding a new schedule
// Handle adding a new schedule
if (isset($_POST['AddSchedule'])) {
    $cleanerID = $_POST['cleaner'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $address = $_POST['address'];
    $description = $_POST['description'];
    $clientID = getClientIDByUsername($pdo, $_SESSION['username']);

    if ($clientID) {
        addCleaningSchedule($pdo, $clientID, $cleanerID, $date, $time, $address, $description);
        header("Location:../client/clientdashboard.php");
        exit();
    } else {
        echo "Error: Client not found.";
    }
}

// Handle editing a schedule
if (isset($_POST['editScheduleBtn'])) {
    $scheduleID = $_GET['scheduleID'];
    $cleanerID = $_POST['cleaner'];
    $date = $_POST['CleaningDate'];
    $time = $_POST['CleaningTime'];
    $address = $_POST['Address'];
    $description = $_POST['CleaningDescription'];

    editSchedule($pdo, $scheduleID, $cleanerID, $date, $time, $address, $description);
    header("Location:../client/clientdashboard.php");
    exit();
}



// Handle deleting a schedule
if (isset($_POST['deleteSchedule'])) {
    $scheduleID = $_POST['scheduleID'];
    deleteCleaningSchedule($pdo, $scheduleID);
    header("Location: ../cleaner/cleanerdashboard.php");
    exit();
}


?>
