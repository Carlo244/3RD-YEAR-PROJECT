<?php
require_once 'dbconfig.php';

function getAllUsers($pdo) {
	$sql = "SELECT * FROM applicants
			ORDER BY first_name ASC";
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute();
	if ($executeQuery) {
		return $stmt->fetchAll();
	}
}

function getApplicantByID($pdo, $applicant_id) {
	$sql = "SELECT * FROM applicants WHERE applicant_id = ?";
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$applicant_id]);
	if ($executeQuery) {
		return $stmt->fetch();
	}
}

function getApplicantInfo($pdo, $applicant_id) {
    $sql = "SELECT first_name, last_name, email, phone_number, position_applied FROM applicants WHERE applicant_id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$applicant_id]);
    return $stmt->fetch();
}


function searchForAUser($pdo, $searchQuery) {
	
	$sql = "SELECT * FROM applicants WHERE 
			CONCAT(first_name,last_name,email,phone_number,
				position_applied,application_date) 
			LIKE ?";

	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute(["%".$searchQuery."%"]);
	if ($executeQuery) {
		return $stmt->fetchAll();
	}
}	



function editApplicant($pdo, $applicant_id, $first_name, $last_name, $email, $phone_number, $position_applied, $updated_by) {
    $sql = "UPDATE Applicants 
            SET first_name = ?, last_name = ?, email = ?, phone_number = ?, position_applied = ?, updated_by = ? 
            WHERE applicant_id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$first_name, $last_name, $email, $phone_number, $position_applied, $updated_by, $applicant_id]);
}



function addApplicant($pdo, $first_name, $last_name, $email, $phone_number, $position_applied, $created_by) {
    $sql = "INSERT INTO Applicants (first_name, last_name, email, phone_number, position_applied, created_by) 
            VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$first_name, $last_name, $email, $phone_number, $position_applied, $created_by]);
}



function deleteApplicant($pdo, $applicant_id) {
    $sql = "DELETE FROM applicants WHERE applicant_id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$applicant_id]);
}

function createManager($pdo, $firstname, $lastname, $username, $password) {
	$sql = "INSERT INTO manager (firstname, lastname, username, password) VALUES(?, ?, ?, ?)";
	$stmt = $pdo->prepare($sql);
	$stmt->execute([$firstname, $lastname, $username, $password]);
}


function getmanager($pdo, $username) {
    $sql = "SELECT * FROM manager WHERE username = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$username]);
    return $stmt->fetch();
}

?>