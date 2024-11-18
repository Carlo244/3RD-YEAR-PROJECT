<?php
require_once 'core/dbconfig.php';
require_once 'core/models.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Applicant</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <form action="core/handleform.php" method="POST">
        <div class="container">
            <p>
                <label for="first_name">First Name</label>
                <input type="text" name="first_name" >
            </p>
            <p>
                <label for="last_name">Last Name</label>
                <input type="text" name="last_name">
            </p>
            <p>
                <label for="email">Email</label>
                <input type="text" name="email" >
            </p>
            <p>
                <label for="phone_number">Phone Number</label>
                <input type="text" name="phone_number">
            </p>
            <p>
                <label for="position_applied">Position Applied</label>
                <input type="text" name="position_applied" >
            </p>
            <p>
                <input type="submit" name="AddApplicantBtn" value="Add Applicant">
            </p>
        </div>
    </form>
</body>
</html>
