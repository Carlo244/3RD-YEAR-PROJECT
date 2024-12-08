

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Find Hire - Login</title>
    <link rel="stylesheet" type="text/css" href="style/style.css">
</head>
<style>
.alert {
    padding: 15px;
    margin-bottom: 20px;
    border: 1px solid transparent;
    border-radius: 4px;
    font-size: 14px;
    text-align: center;
}

</style>
<body>

    <form method="POST" action="core/handleform.php">
        <div class="login">
<?php
session_start(); 
if (isset($_SESSION['message'])) { 
    echo '<div class="alert" style="color: #ff0400;">'
    .$_SESSION['message'].
    '</div>'; 
    unset($_SESSION['message']); 
    unset($_SESSION['status']); 
} 
?>
        <h2>Login</h2>
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
        <input type="submit" value="Login" name="LoginUser">
        <p>Don't have an account? <a href="register.php">Register here</a></p>
        </div>
    </form>
    
</body>
</html>