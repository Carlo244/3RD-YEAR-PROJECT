<?php
require_once 'dbConfig.php';

function InsertIntoRegistration($pdo,$First_Name,$Last_Name,$YearOfExperience,$Specialization,
$EmailAddress,$PhoneNumber,$ExpectedSalary) {
    $sql = "INSERT INTO users (First_Name,Last_Name,YearOfExperience,Specialization,
            EmailAddress,PhoneNumber,ExpectedSalary) VALUES (?,?,?,?,?,?,?)";
$stmt = $pdo->prepare($sql);
$executeQuery = $stmt->execute(array($First_Name,$Last_Name,$YearOfExperience,$Specialization,
                $EmailAddress,$PhoneNumber,$ExpectedSalary));

if($executeQuery) {
    return true;
}
}
?>