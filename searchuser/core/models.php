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



function editApplicant($pdo, $applicant_id, $first_name, $last_name, $email, $phone_number, $position_applied) {
    $sql = "UPDATE applicants SET first_name = ?, last_name = ?, email = ?, phone_number = ?, position_applied = ? WHERE applicant_id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$first_name, $last_name, $email, $phone_number, $position_applied, $applicant_id]);
}


function AddApplicant($pdo, $first_name, $last_name, $email, $phone_number, $position_applied) {
	$sql = "INSERT INTO applicants (first_name, last_name, email, phone_number, position_applied) VALUES (?, ?, ?, ?, ?)";
	$stmt = $pdo->prepare($sql);
	$stmt->execute([$first_name, $last_name, $email, $phone_number, $position_applied]);
}


function deleteApplicant($pdo, $applicant_id) {
    $sql = "DELETE FROM applicants WHERE applicant_id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$applicant_id]);
}

?>