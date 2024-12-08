<?php
session_start();
require_once '../core/dbconfig.php';
require_once '../core/models.php';
if ($_SESSION['role'] != 'HR') {
    header("Location: ../login.php");
    exit();
}

$hrId = $_SESSION['username'];
$jobPosts = getJobPostsByHR($pdo, $hrId);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HR Dashboard</title>
    <link rel="stylesheet" type="text/css" href="dashboard.css">
</head>
<body>
    <div class="main">
        <?php 
        include "searchbar.php"; 
        ?>
        <h1>HR Dashboard</h1>
        <p>Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?>!</p>
            <h2>Write a Job Post</h2>
            <form action=" ../core/handleform.php" method="POST" class="formcontainer">
                <label for="job_title">Job Title:</label>
                <input type="text" id="job_title" name="job_title" required>

                <label for="job_description">Job Description:</label>
                <textarea id="job_description" name="job_description" required></textarea>

                <button type="submit" name="post_job">Post Job</button>
                
            </form>
        <div class="jobPosts">
            <h2>Your Job Posts</h2>
            <?php if ($jobPosts) { ?>

                    <?php foreach ($jobPosts as $post) { ?>
                        <div class="jobPostContainer">
                            <div class="jobPost" style="margin-bottom: 20px; padding: 15px; display: center;">
                                
                                <h3><?php echo htmlspecialchars($post['job_title']); ?></h3>
                                <p><?php echo htmlspecialchars($post['job_description']); ?></p>
                                
                            </div>
                        </div>
                    <?php } ?>
                
            <?php } else { ?>
                <p>You have not posted any jobs yet.</p>
            <?php } ?>
        
        </div>
    </div>
</body>
</html>
