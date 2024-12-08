<?php
session_start();
require_once '../core/dbconfig.php';
require_once '../core/models.php';
if ($_SESSION['role'] != 'HR') {
    header("Location: ../login.php");
    exit();
}

$hrId = $_SESSION['user_id']; 
$applications = getApplicationsForHR($pdo, $hrId);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HR Dashboard</title>
    <link rel="stylesheet" type="text/css" href="applications.css">
</head>
<body>
    <div class="main">
        <?php include "searchbar.php"; ?>
        <h1>HR Dashboard</h1>
        <section>
        <h2>Applications</h2>
        <?php if ($applications) { ?> 
            <table class="application-table"> 
                <thead> 
                    <tr> 
                        <th>APPLICANT NAME</th> 
                        <th>JOB TITLE</th> 
                        <th>STATUS</th> 
                        <th>RESUME</th> 
                        <th>ACTIONS</th> 
                    </tr> 
                </thead> 
                <tbody> 
                    <?php foreach ($applications as $application) { 
                        if ($application['application_status'] !== 'ACCEPTED') { ?> 
                        <tr> 
                            <td><?php echo htmlspecialchars($application['applicant_name']); ?></td> 
                            <td><?php echo htmlspecialchars($application['job_title']); ?></td> 
                            <td><?php echo htmlspecialchars($application['application_status']); ?></td> 
                            <td>
                                <?php if (!empty($application['resume_path'])) { ?>
                                    <a href="<?php echo htmlspecialchars($application['resume_path']); ?>" target="_blank">View Resume</a>
                                <?php } else { ?>
                                    <span>No resume uploaded</span>
                                <?php } ?>
                            </td> 
                            <td>
                                <form action="update_status.php" method="POST" class="inline-form"> 
                                    <input type="hidden" name="application_id" value="<?php echo $application['application_id']; ?>"> 
                                    <input type="hidden" name="status" value="ACCEPTED"> 
                                    <button type="submit" class="button">Accept</button> 
                                </form><br>
                                <form action="update_status.php" method="POST" class="inline-form reject"> 
                                    <input type="hidden" name="application_id" value="<?php echo $application['application_id']; ?>"> 
                                    <input type="hidden" name="status" value="REJECTED"> 
                                    <button type="submit" class="buttonreject">Reject</button> 
                                </form>
                            </td> 
                        </tr>
                    <?php } } ?> 
                </tbody> 
            </table> 
        <?php } else { ?> 
            <p>No applications found.</p>
        <?php } ?>
        </section>
    </div>
</body>
</html>
