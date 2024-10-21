<?php require_once 'core/dbconfig.php'; ?>
<?php require_once 'core/models.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Cleaning Service</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Welcome to Home Cleaning Service</h1>
        <form action="core/handleform.php" method="post">
            <label for="user_type">Are you a:</label>
            <input type="radio" id="cleaner" name="user_type" value="cleaner">
            <label for="cleaner">Cleaner</label>
            <input type="radio" id="client" name="user_type" value="client">
            <label for="client">Client</label>
            <br>
            <input type="submit" name="submit" value="Next">
        <br><br>
        <button type="submit" name="viewbtn">View Schedule</button>
        </form>
    </div>
</body>
</html>
