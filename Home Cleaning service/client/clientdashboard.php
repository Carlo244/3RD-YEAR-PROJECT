<?php
session_start();
require_once '../core/dbconfig.php';
require_once '../core/models.php';

if ($_SESSION['role'] != 'client') {
    header("Location: ../login.php");
    exit();
}

// Fetch client schedules
$username = $_SESSION['username'];
$userFullName = getUserFullName($pdo, $username);
$clientSchedules = getClientSchedules($pdo, $username);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Client Dashboard</title>
    <link rel="stylesheet" type="text/css" href="../core/style.css">
</head>
<body>
    <div class="container">
    <h1>Welcome, <?php echo ($userFullName['firstname']),' ', ($userFullName['lastname']) ?>
        <h2>Upcoming Cleaning Schedules</h2>
        <table>
            <tr>
                <th>Cleaner Name</th>
                <th>Date</th>
                <th>Time</th>
                <th>Address</th>
                <th>Description</th>
                <th>Created At</th>
                <th>Last Updated</th>
                <th>Actions</th>
            </tr>
            <?php foreach ($clientSchedules as $schedule): ?>
            <tr>
                <td><?php echo $schedule['CleanerName']; ?></td>
                <td><?php echo $schedule['CleaningDate']; ?></td>
                <td><?php echo $schedule['CleaningTime']; ?></td>
                <td><?php echo $schedule['Address']; ?></td>
                <td><?php echo $schedule['CleaningDescription']; ?></td>
                <td><?php echo $schedule['CreatedAt']; ?></td>
                <td><?php echo $schedule['UpdatedAt']; ?></td>
                <td>
                    <form action="edit_schedule.php" method="GET" style="display:inline;">
                    <input type="hidden" name="scheduleID" value="<?php echo $schedule['ScheduleID']; ?>">
                    <button type="submit">Edit</button>
                    </form>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <br>
        <form action="../logout.php" method="POST" style="display: inline;">
            <button type="submit">Logout</button>
        </form>
        <form action="add_schedule.php" method="GET" style="display: inline;">
            <button type="submit">Add New</button>
        </form>
    </div>
</body>
</html>
