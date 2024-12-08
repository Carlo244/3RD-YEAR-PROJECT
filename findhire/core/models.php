<?php

function getAllJobPosts($pdo, $searchInput = '') {
    $sql = "SELECT jobposts.*, users.username AS hr_username 
            FROM jobposts 
            JOIN users ON jobposts.posted_by = users.user_id
            WHERE users.role = 'HR'";
    
    if (!empty($searchInput)) {
        $sql .= " AND (JobPosts.job_title LIKE :search OR JobPosts.job_description LIKE :search)";
    }

    $stmt = $pdo->prepare($sql);

    if (!empty($searchInput)) {
        $searchTerm = '%' . $searchInput . '%';
        $stmt->bindParam(':search', $searchTerm);
    }

    $stmt->execute();
    return $stmt->fetchAll();
}



function createUser($pdo, $username, $password, $role, $full_name) {
    $sql = "INSERT INTO users (username, password, role, full_name) VALUES (?, ?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([ $username, $password, $role, $full_name]);

}

function getUser($pdo, $username) {
    $sql = "SELECT * FROM users WHERE username = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$username]);
    return $stmt->fetch();
}



function getAllApplicant($pdo) {
    $sql = "SELECT * FROM users";
    $stmt = $pdo->query($sql);
    return $stmt->fetchAll();
}
function getAllHRUsers($pdo) {
    $sql = "SELECT * FROM Users WHERE role = 'HR'";
    $stmt = $pdo->query($sql);
    return $stmt->fetchAll();
}

function getJobDetails($pdo, $jobId) {
    $sql = "SELECT jobposts.*, users.username AS hr_username 
            FROM jobposts 
            JOIN users ON jobposts.posted_by = users.user_id
            WHERE jobposts.job_id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$jobId]);
    return $stmt->fetch();
}

function getJobPostsByHR($pdo, $hrId) {
    $sql = "SELECT jobposts.*, users.username AS hr_username 
            FROM JobPosts 
            JOIN users ON jobposts.posted_by = users.user_id
            WHERE users.username = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$hrId]);
    return $stmt->fetchAll();
}
function getApplicationsForHR($pdo, $hrId) {
    $sql = "SELECT applications.*, jobposts.job_title, users.full_name AS applicant_name
            FROM applications
            JOIN jobposts ON applications.job_id = jobposts.job_id
            JOIN users ON applications.applicant_id = users.user_id
            WHERE jobposts.posted_by = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$hrId]);
    return $stmt->fetchAll();
}


function insertApplication($pdo, $jobId, $applicantId, $applicationMessage, $resumePath) {
    $sql = "INSERT INTO Applications (job_id, applicant_id, application_message, resume_path) VALUES (?, ?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    return $stmt->execute([$jobId, $applicantId,  $applicationMessage, $resumePath]);
}

function getApplicantbyusername($pdo, $username) {
     $sql = "SELECT u.user_id FROM users u 
            WHERE u.username = ? AND u.role = 'APPLICANT'"; 
     $stmt = $pdo->prepare($sql); 
     $stmt->execute([$username]);
     $result = $stmt->fetch(); 
     return $result['user_id'] ?? null;

}

function insertjob ($pdo, $job_title, $job_description, $posted_by){
    $sql = "INSERT INTO jobposts (job_title, job_description, posted_by) VALUES (?,?,?)";
    $stmt = $pdo->prepare($sql);
    return $stmt->execute([$job_title, $job_description, $posted_by]); 
}

function getHRbyusername($pdo, $username) {
    $sql = "SELECT u.user_id FROM users u 
           WHERE u.username = ? AND u.role = 'HR'"; 
    $stmt = $pdo->prepare($sql); 
    $stmt->execute([$username]);
    $result = $stmt->fetch(); 
    return $result['user_id'] ?? null;

}


function updateApplicationStatus($pdo, $application_id, $status) {
    $sql = "UPDATE Applications 
            SET application_status = ? 
            WHERE application_id = ?";
    $stmt = $pdo->prepare($sql);
    return $stmt->execute([$status, $application_id]);
}

function deleteApplication($pdo, $application_id) {
    $sql = "DELETE FROM Applications WHERE application_id = ?";
    $stmt = $pdo->prepare($sql);
    return $stmt->execute([$application_id]);
}

function sendMessageToApplicant($pdo, $sender_id, $recipient_id, $message_content) {
    $sql = "INSERT INTO Messages (sender_id, recipient_id, message_content) VALUES (?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    return $stmt->execute([$sender_id, $recipient_id, $message_content]);
}

function getMessagesForApplicant($pdo, $applicantId) {
    $sql = "SELECT Messages.*, Users.username AS sender_name 
            FROM Messages 
            JOIN Users ON Messages.sender_id = Users.user_id 
            WHERE Messages.recipient_id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$applicantId]);
    return $stmt->fetchAll();
}

function getMessagesForHR($pdo, $hrId) {
    $sql = "SELECT Messages.*, Users.username AS sender_name 
            FROM Messages 
            JOIN Users ON Messages.sender_id = Users.user_id 
            WHERE Messages.recipient_id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$hrId]);
    return $stmt->fetchAll();
}

?>