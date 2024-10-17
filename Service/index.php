<?php require_once 'dbconfig.php'; ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Cleaning Service</title>

</head>
<body>
 <h1>Welcome to Home Cleaning Service</h1>
    <form method="post" action="">
        <label for="user_type">Are you a:</label>
        <input type="radio" id="cleaner" name="user_type" value="cleaner">
        <label for="cleaner">Cleaner</label>
        <input type="radio" id="client" name="user_type" value="client">
        <label for="client">Client</label>
        <br><br>
        <input type="submit" name="submit" value="Next">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
        $user_type = $_POST['user_type'];
        if ($user_type == "cleaner") {
            header("Location: RegisterACleaner.php");
        } elseif ($user_type == "client") {
            header("Location: RegisterAClient.php");
        }
        exit();
    }
    ?>

</body>
</html>