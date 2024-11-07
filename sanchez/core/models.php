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
?>