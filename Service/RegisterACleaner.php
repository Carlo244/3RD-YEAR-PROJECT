<!DOCTYPE html>
<html>
<head>
    <title>Home Cleaning Service</title>
</head>
<body>
    <h1>Register Cleaner</h1>
    <form action="insert_cleaner.php" method="post">
        <label for="cleaner_name">Cleaner Name:</label>
        <input type="text" id="cleaner_name" name="cleaner_name" required>
        <br>
        <label for="contact_info">Contact Info:</label>
        <input type="text" id="contact_info" name="contact_info" required>
        <br>
        <input type="submit" value="Register Cleaner">
    </form>
