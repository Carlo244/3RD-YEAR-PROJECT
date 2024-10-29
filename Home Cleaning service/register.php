<?php 
require_once 'core/dbconfig.php'; 
require_once 'core/models.php'; 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cleaning Services - Register</title>
    <link rel="stylesheet" type="text/css" href="core/style.css">
</head>
<body>
    <form action="core/handleform.php" method="POST">
        <div class="login">
        <label for="firstname">First Name:</label>
        <input type="text" id="firstname" name="firstname" required>
        
        <label for="lastname">Last Name:</label>
        <input type="text" id="lastname" name="lastname" required>
        
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>
        
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>

        <label for="role">Role:</label>
        <select id="role" name="role">
            <option value="cleaner">Cleaner</option>
            <option value="client">Client</option>
        </select>
        <br>
        <br>
        <input type="submit" value="Register" name="RegisterUser">
        <p>Already have an account? <a href="login.php">Login here</a></p>
        </div>
    </form>
</body>
</html>
