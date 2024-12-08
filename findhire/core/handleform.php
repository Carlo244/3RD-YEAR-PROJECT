<?php

session_start();
require_once 'dbconfig.php';
require_once 'models.php';


if (isset($_POST['RegisterUser'])){
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $role = 'APPLICANT';  // Automatically set the role to 'APPLICANT'
    $full_name = $_POST['full_name'];
    createUser($pdo, $username, $password, $role, $full_name);
    header("Location: ../login.php");
    exit();
}



// Check if the form is submitted
if (isset($_POST['LoginUser'])) {
        $username = htmlspecialchars($_POST['username']);
        $password = $_POST['password'];
    
        // Check if the user exists in the database
        $sql = "SELECT * FROM Users WHERE username = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$username]);
        $user = $stmt->fetch();
    
        // Verify the password
        if ($user && password_verify($password, $user['password'])) {
            // Set session variables
            $_SESSION['user_id'] = $user['user_id']; // Ensure user_id is set
            $_SESSION['username'] = $user['username'];
            $_SESSION['role'] = $user['role'];
    
            // Redirect based on role
            if ($user['role'] == 'HR') {
                header("Location: ../hr/hr_dashboard.php");
            } else {
                header("Location: ../applicant/applicant_dashboard.php");
            }
            exit();
        } else {
            $_SESSION['message'] = "USERNAME/PASWORD invalid"; 
            $_SESSION['status'] = "400";
            header("Location:../login.php");
        }
    }
   


if (isset($_POST['Apply'])) {
    $jobId = $_POST['job_id'];
    $applicantId = getApplicantbyusername($pdo, $_SESSION['username']);
    $applicationMessage = htmlspecialchars($_POST['application_message']);
    $resumePath = '../resume/' . basename($_FILES['resume']['name']);

    // Move the uploaded file to the desired directory
    if (move_uploaded_file($_FILES['resume']['tmp_name'], $resumePath)) {
        if (insertApplication($pdo, $jobId, $applicantId,  $applicationMessage, $resumePath)) {
            header("Location: ../applicant/applicant_dashboard.php");
            exit();
        } else {
            echo "Failed to insert the application.";
        }
    } else {
        echo "Failed to upload the resume.";
    }
}

if(isset($_POST['post_job'])){
    $job_title = $_POST['job_title'];
    $job_description = $_POST['job_description'];
    $posted_by = getHRbyusername($pdo, $_SESSION['username']);

    insertjob($pdo, $job_title, $job_description, $posted_by);
    header("Location: ../hr/hr_dashboard.php");
    exit();
}




if (isset($_POST['sendmessagetohr'])) { 
    $senderId = $_SESSION['user_id']; 
    $recipientId = $_POST['recipient_id'];
    $messageContent = htmlspecialchars($_POST['message_content']);
    if (sendMessageToApplicant($pdo, $senderId, $recipientId, $messageContent)) { 
        header("Location: ../applicant/messages.php"); 
        exit(); 
    } else { 
        echo "Failed to send the message."; } 
    }
?>
