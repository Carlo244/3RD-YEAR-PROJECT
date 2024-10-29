<?php
session_start();
require_once '../core/dbconfig.php';
require_once '../core/models.php';

$scheduleID = $_GET['scheduleID'];
$schedule = getScheduleById($pdo, $scheduleID);
$cleaners = getAllCleaners($pdo);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Schedule</title>
    <link rel="stylesheet" type="text/css" href="../core/style.css">
</head>
<body>
    <form action="../core/handleform.php?scheduleID=<?php echo $scheduleID; ?>" method="POST">
        <div class="container">
        <p><label for="cleaner">Cleaner:</label>
        <select id="cleaner" name="cleaner">
            <!-- Populate with cleaners from the database -->
            <?php
            foreach ($cleaners as $cleaner) {
                $selected = $cleaner['CleanerID'] == $schedule['CleanerID'] ? 'selected' : '';
                echo "<option value='{$cleaner['CleanerID']}' $selected>{$cleaner['cleanerfirstname']}</option>";
            }
            ?>
        </select></p>
        
        <p><label for="CleaningDate">Date</label> 
        <input type="date" name="CleaningDate" value="<?php echo ($schedule['CleaningDate']); ?>"></p>
        
        <p><label for="CleaningTime">Time</label> 
        <input type="time" name="CleaningTime" value="<?php echo ($schedule['CleaningTime']); ?>"></p>
        
        <p><label for="Address">Address</label> 
        <input type="text" name="Address" value="<?php echo ($schedule['Address']); ?>"></p>
        
        <p><label for="CleaningDescription">Description</label>
        <textarea id="description" name="CleaningDescription" rows="4" required><?php echo ($schedule['CleaningDescription']); ?></textarea></p>
        
        <p><input type="submit" name="editScheduleBtn"></p>
        </div>
    </form>
</body>
</html>
