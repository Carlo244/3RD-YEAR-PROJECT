<?php require_once 'core/dbconfig.php'; ?>
<?php require_once 'core/models.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Register Client</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Register Client</h1>
        <form action="core/handleform.php" method="post">
            <label for="client_name">Client Name:</label>
            <input type="text" id="client_name" name="client_name" required>
            <label for="client_name">Client Last Name:</label>
            <input type="text" id="client_lname" name="client_lname" required>
            <label for="client_address">Client Address:</label>
            <input type="text" id="client_address" name="client_address" required>
            <label for="cleaner_id">Cleaner ID:</label>
            <input type="text" id="cleaner_id" name="cleaner_id" placeholder="Choose ID in the table below" required>
            <label for="cleaning_date">Cleaning Date:</label>
            <input type="date" id="cleaning_date" name="cleaning_date" required>
            <label for="cleaning_time">Cleaning Time:</label>
            <input type="time" id="cleaning_time" name="cleaning_time" required>
            <br>
            <input type="submit" value="Register Client" name="Clientbtn">
            <br>
        </form>
        <form action="index.php" method="get">
            <br>
            <input type="submit" value="Back">
        </form>
        
        <h2>Available Cleaners</h2>
        <table border="1">
            <tr>
                <th>Cleaner ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Contact Info</th>
            </tr>
            <?php
            // Create connection
            $conn = new mysqli($host, $user, $password, $dbname);

            $sql = "SELECT CleanerID, CleanerName, CleanerLName, ContactInfo FROM Cleaners";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // Output data of each row
                while($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>".$row["CleanerID"]."</td>
                            <td>".$row["CleanerName"]."</td>
                            <td>".$row["CleanerLName"]."</td>
                            <td>".$row["ContactInfo"]."</td>
                          </tr>";
                }
            } else {
                echo "<tr><td colspan='4'>No cleaners available</td></tr>";
            }
            $conn->close();
            ?>
        </table>
    </div>
</body>
</html>
