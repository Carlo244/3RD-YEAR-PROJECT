<?php require_once 'core/dbconfig.php'; ?>
<?php require_once 'core/models.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Cleaning Schedule</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Cleaning Schedule</h1>
        <form action="core/handleform.php" method="post">
        <table border="1">
            <tr>
                <th>Schedule ID</th>
                <th>Client Name</th>
                <th>Client Address</th>
                <th>Cleaner Name</th>
                <th>Cleaning Date</th>
                <th>Cleaning Time</th>
            </tr>
            <?php
            // Create connection
            $conn = new mysqli($host, $user, $password, $dbname);


            $sql = "SELECT 
                        CleaningSchedule.ScheduleID, 
                        CONCAT(Clients.ClientName,' ',Clients.ClientLName) AS ClientName,  
                        Clients.ClientAddress, 
                        CONCAT(Cleaners.CleanerName, ' ', Cleaners.CleanerLName) AS CleanerName, 
                        CleaningSchedule.CleaningDate, 
                        CleaningSchedule.CleaningTime
                    FROM CleaningSchedule
                    JOIN Clients ON CleaningSchedule.ClientID = Clients.ClientID
                    JOIN Cleaners ON CleaningSchedule.CleanerID = Cleaners.CleanerID";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // Output data of each row
                while($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>".$row["ScheduleID"]."</td>
                            <td>".$row["ClientName"]."</td>
                            <td>".$row["ClientAddress"]."</td>
                            <td>".$row["CleanerName"]."</td>
                            <td>".$row["CleaningDate"]."</td>
                            <td>".$row["CleaningTime"]."</td>
                          </tr>";
                }
            } else {
                echo "<tr><td colspan='8'>No cleaning schedules found</td></tr>";
            }
            $conn->close();
            ?>
        </table>
        <br>
        <input type="submit" value="Back" name="backbtn">
        </form>
    </div>
</body>
</html>
