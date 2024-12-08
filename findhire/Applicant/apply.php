<?php
require_once '../core/dbconfig.php';
require_once '../core/models.php';
session_start();
if ($_SESSION['role'] != 'APPLICANT') {
    header("Location: ../login.php");
    exit();
}

if (!isset($_GET['job_id'])) {
    echo "No job ID provided.";
    exit();
}

$jobId = $_GET['job_id'];
$jobDetails = getJobDetails($pdo, $jobId);

if (!$jobDetails) {
    echo "Job not found.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Applicant Dashboard - Application</title>
    <link rel="stylesheet" type="text/css" href="apply.css">
</head>
<body>
    <div class="main">
        <div class="jobPostContainer">
            <h2>Applying for: <?php echo htmlspecialchars($jobDetails['job_title']); ?></h2>
            <p><?php echo htmlspecialchars($jobDetails['job_description']); ?></p>
            <p>Posted by: <?php echo htmlspecialchars($jobDetails['hr_username']); ?></p>
        </div>

        
        <form action="../core/handleform.php" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="job_id" value="<?php echo $jobId; ?>">
        <p>
        <label for="application_message">Why are you the best applicant for this role?</label>
        <textarea id="application_message" name="application_message" required></textarea>
        </p>
        <p>
        <label for="resume">Attach your resume (PDF only):</label>
        <input type="file" id="resume" name="resume" accept=".pdf" required>
        </p>
        <p>
        <input type="submit" name="Apply" value="Apply" class="applyButton ">
        </p>
        </form>

       
        <form method="post" action="applicant_dashboard.php" style="display:flex-end;">
            <button type="submit" class="home">Home</button>
        </form>
    </div>
</body>
</html>
