<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cleaning Services - Login</title>
    <link rel="stylesheet" type="text/css" href="core/style.css">
</head>
<body>
    
    <?php
    session_start();
    ?>
    <form method="POST" action="core/handleform.php">
        <div class="login">
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
