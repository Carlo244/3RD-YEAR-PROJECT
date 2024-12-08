<?php
require_once '../core/dbconfig.php';
require_once '../core/models.php';
session_start();

if ($_SESSION['role'] != 'HR') {
    header("Location: ../login.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $applicationId = $_POST['application_id'];
    $status = $_POST['status'];
    $hrId = $_SESSION['user_id'];

    // Retrieve application details
    $sql = "SELECT * FROM Applications WHERE application_id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$applicationId]);
    $application = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($status === 'REJECTED') {
        // Delete the application
        if (deleteApplication($pdo, $applicationId)) {
            // Send a rejection message to the applicant
            $messageContent = "We regret to inform you that your application for the position of " . htmlspecialchars($application['job_title']) . " has been rejected.";
            if (sendMessageToApplicant($pdo, $hrId, $application['applicant_id'], $messageContent)) {
                header("Location: applications.php");
                exit();
            } else {
                echo "Failed to send the rejection message.";
            }
        } else {
            echo "Failed to delete the application.";
        }
    } elseif ($status === 'ACCEPTED') {
        // Update application status and send an acceptance message to the applicant
        if (updateApplicationStatus($pdo, $applicationId, $status)) {
            // Send an acceptance message to the applicant
            $messageContent = "Congratulations! Your application for the position of " . htmlspecialchars($application['job_title']) . " has been accepted.";
            if (sendMessageToApplicant($pdo, $hrId, $application['applicant_id'], $messageContent)) {
                header("Location: applications.php");
                exit();
            } else {
                echo "Failed to send the acceptance message.";
            }
        } else {
            echo "Failed to update the application status.";
        }
    }
}
?>
