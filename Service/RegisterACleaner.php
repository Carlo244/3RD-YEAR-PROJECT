<?php require_once 'core/dbconfig.php'; ?>
<?php require_once 'core/models.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Home Cleaning Service</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Register Cleaner</h1>
        <form action="core/handleform.php" method="post">
            <label for="cleaner_firstname">First Name:</label>
            <input type="text" id="cleaner_name" name="cleaner_name" required>
            <label for="cleaner_lastname">Last Name:</label>
            <input type="text" id="cleaner_lname" name="cleaner_lname" required>
            <label for="contact_info">Contact Info:</label>
            <input type="text" id="contact_info" name="contact_info" required>
            <input type="submit" value="Register Cleaner" name="Cleanerbtn">
        </form>

        <form action="index.php" method="get">
            <br>
            <input type="submit" value="Back">
        </form>
    </div>
</body>
</html>
