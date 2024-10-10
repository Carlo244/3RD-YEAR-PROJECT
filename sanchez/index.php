<?php require_once 'dbConfig.php' ?>   

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <style>
        body{
            font-family: "Comic-sans";
        }
        input {
            font-size: auto;
            height: 25px;
            width: 200px;
        }
    </style>
</head>
<body>
<p><h3>Welcome guys</h3></p>
    <form action="handleform.php" method="POST">
    <p><label for="First_Name">First Name </label><input type="text" name="First_Name"></p>
    <p><label for="Last_Name">Last Name </label><input type="text" name="Last_Name"></p>
    <p><label for="YearOfExperience">Year Of Experience </label><input type="text" name="YearOfExperience"></p>
    <p><label for="Specialization">Specialization </label><input type="text" name="Specialization"></p>
    <p><label for="EmailAddress">EmailAddress </label><input type="text" name="EmailAddress"></p>
    <p><label for="PhoneNumber">PhoneNumber </label><input type="text" name="PhoneNumber"></p>
    <p><label for="ExpectedSalary">ExpectedSalary </label><input type="text" name="ExpectedSalary">
        <input type="submit" name="InsertIntoRegistration">
    </p>
    </form>
</body>
</html>