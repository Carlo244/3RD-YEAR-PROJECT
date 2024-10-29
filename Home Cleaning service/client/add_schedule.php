
<?php
session_start();
require_once '../core/dbconfig.php';
require_once '../core/models.php';

if ($_SESSION['role'] != 'client') {
    header("Location: ../login.php");
    exit();
}

// Fetch all cleaners
$cleaners = getAllCleaners($pdo);
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Add New Schedule</title>
        <link rel="stylesheet" type="text/css" href="../core/style.css">
    </head>
<body>
    <div class="container">
        <h2>Add New Schedule</h2>
        <form action="../core/handleform.php" method="POST">
            <label for="cleaner">Cleaner:</label>
            <select id="cleaner" name="cleaner">
                <!-- Populate with cleaners from the database -->
                <?php
                foreach ($cleaners as $cleaner) {
                    echo "<option value='{$cleaner['CleanerID']}'>{$cleaner['cleanerfirstname']} </option>";
                }
                ?>
            </select>
            <label for="date">Date:</label>
            <input type="date" id="date" name="date" required>
            <label for="time">Time:</label>
            <input type="time" id="time" name="time" required>
            <label for="address">Address:</label>
            <input type="text" id="address" name="address" required>
            <label for="description">Cleaning Description:</label>
            <textarea id="description" name="description" rows="4" required></textarea>
            <div class="buttons">
                <input type="submit" value="Add Schedule" name="AddSchedule">
                <button type="button" onclick="window.history.back()">Back</button>
            </div>
        </form>
    </div>
</body>
</html>
