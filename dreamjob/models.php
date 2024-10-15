<?php
require_once 'dbConfig.php';

function InsertRegistrationBtn ($pdo,$First_Name,$Last_Name,$YearOfExperience,$Specialization,
$EmailAddress,$PhoneNumber,$ExpectedSalary) {
    $sql = "INSERT INTO users (First_Name, Last_Name, YearOfExperience, Specialization,
            EmailAddress, PhoneNumber, ExpectedSalary) VALUES (?,?,?,?,?,?,?)";

$stmt = $pdo->prepare($sql);

$executeQuery = $stmt->execute([	$First_Name, $Last_Name, $YearOfExperience, $Specialization,
                $EmailAddress, $PhoneNumber, $ExpectedSalary]);

if($executeQuery) {
    return true;
}
}

function seeAllApplicant($pdo) {
	$sql = "SELECT * FROM users";
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute();
	if ($executeQuery) {
		return $stmt->fetchAll();
	}
}

function getApplicantID($pdo, $Applicant_id) {
	$sql = "SELECT * FROM users WHERE Applicant_id = ?";
	$stmt = $pdo->prepare($sql);
	if ($stmt->execute([$Applicant_id])) {
		return $stmt->fetch();
	}
}


function updateApplicant($pdo, $Applicant_id, $First_Name,$Last_Name,$YearOfExperience,$Specialization,
$EmailAddress,$PhoneNumber,$ExpectedSalary) {

	$sql = "UPDATE users
				SET First_Name = ?, 
					Last_Name = ?, 
					YearOfExperience = ?, 
					Specialization = ?, 
					EmailAddress = ?, 
					PhoneNumber = ?, 
					ExpectedSalary = ? 
			WHERE Applicant_id = ?";
	$stmt = $pdo->prepare($sql);
	
	$executeQuery = $stmt->execute([$First_Name,$Last_Name,$YearOfExperience,$Specialization,
    $EmailAddress,$PhoneNumber,$ExpectedSalary, $Applicant_id]);

	if ($executeQuery) {
		return true;
	}
}
function deleteApplicant($pdo, $Applicant_id) {

	$sql = "DELETE FROM users WHERE Applicant_id = ?";
	$stmt = $pdo->prepare($sql);

	$executeQuery = $stmt->execute([$Applicant_id]);

	if ($executeQuery) {
		return true;
	}

}





?>