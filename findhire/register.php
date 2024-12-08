<?php 
require_once 'core/dbconfig.php'; 
require_once 'core/models.php'; 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Find Hire - Register</title>
    <link rel="stylesheet" type="text/css" href="style/style.css">
</head>
<body>
    <form method="POST" action="core/handleform.php">    
        <div class="login">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>
        
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>

        <label for="full_name">Full Name:</label>
        <input type="text" id="full_name" name="full_name" required>

        <input type="submit" value="Register" name="RegisterUser">
        <p>Already have an account? <a href="login.php">Login here</a></p>
        </div>
    </form>
</body>
</html>