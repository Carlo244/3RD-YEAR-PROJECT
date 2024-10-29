<?php
session_start();
require_once '../core/dbconfig.php';
require_once '../core/models.php';

if ($_SESSION['role'] != 'cleaner') {
    header("Location: ../login.php");
    exit();
}

// Fetch cleaner schedules
$username = $_SESSION['username'];
$userFullName = getUserFullName($pdo, $username);
$cleanerSchedules = getCleanerSchedules($pdo, $username);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cleaner Dashboard</title>
    <link rel="stylesheet" type="text/css" href="../core/style.css">
</head>
<body>
    <div class="container">
        <h1>Welcome, <?php echo ($userFullName['firstname']),' ', ($userFullName['lastname']) ?></h1>
        <h2>Latest Schedules</h2>
        <table>
            <tr>
                <th>Client Name</th>
                <th>Date</th>
                <th>Time</th>
                <th>Address</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
            <?php foreach ($cleanerSchedules as $schedule): ?>
            <tr>
                <td><?php echo ($schedule['clientfirstname']) . ' ' . ($schedule['clientlastname']); ?></td>
                <td><?php echo ($schedule['CleaningDate']); ?></td>
                <td><?php echo ($schedule['CleaningTime']); ?></td>
                <td><?php echo($schedule['Address']); ?></td>
                <td><?php echo ($schedule['CleaningDescription']); ?></td>
                <td>
                    <form action="../core/handleform.php" method="POST" style="display:inline;">
                        <input type="hidden" name="scheduleID" value="<?php echo $schedule['ScheduleID']; ?>">
                        <button type="submit" name="deleteSchedule">Done</button>
                    </form>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <br>
        <form action="../logout.php" method="POST" style="display: inline;">
            <button type="submit">Logout</button>
        </form>
    </div>
</body>
</html>
