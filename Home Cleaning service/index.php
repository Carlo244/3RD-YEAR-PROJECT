<?php
session_start();
require_once 'core/dbconfig.php';
require_once 'core/models.php';

// Redirect to login if the user is not logged in
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header("Location: login.php");
    exit();
}

// Check the user role and redirect to the appropriate dashboard
if ($_SESSION['role'] === 'cleaner') {
    header("Location: cleaner/cleanerdashboard.php");
    exit();
} elseif ($_SESSION['role'] === 'client') {
    header("Location: client/clientdashboard.php");
    exit();
} else {
    // If the user role is undefined or unknown, log them out
    header("Location: logout.php");
    exit();
}
?>
