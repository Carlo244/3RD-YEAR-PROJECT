<?php
session_start();
require_once '../core/dbconfig.php';
require_once '../core/models.php';
if ($_SESSION['role'] != 'APPLICANT') {
    header("Location: ../login.php");
    exit();
}

$searchInput = isset($_GET['searchInput']) ? $_GET['searchInput'] : '';
$jobPosts = getAllJobPosts($pdo, $searchInput);
$hrUsers = getAllHRUsers($pdo);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Applicant Dashboard</title>
    <link rel="stylesheet" type="text/css" href="dashboard.css">
</head>
<body>
    <div class="main">
        <h1>Applicant Dashboard</h1>
        <p>Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?>!</p>
        <?php 
        include "searchbar.php"; 
        ?>

        <div class="container jobPosts"> 
            <h1>Job Posts</h1> 
            <?php if (!empty($jobPosts)) { ?>
                <?php foreach ($jobPosts as $post) { ?> 
                    <div class="jobPostContainer"> 
                        <div class="jobPost" style="margin-bottom: 20px; padding: 15px;">
                            <h2><?php echo htmlspecialchars($post['job_title']); ?></h2> 
                            <p><?php echo htmlspecialchars($post['job_description']); ?></p> 
                            <p>Posted by: <?php echo htmlspecialchars($post['hr_username']); ?></p> 
                            <form action="apply.php" method="GET"> 
                                <input type="hidden" name="job_id" value="<?php echo $post['job_id']; ?>"> 
                                <button type="submit" class="applyButton">Apply</button> 
                            </form>
                        </div> 
                    </div> 
                <?php } ?> 
            <?php } else { ?>
                <p>No job posts found matching your search criteria.</p>
            <?php } ?>
        </div>
    </div>
</body>
</html>
