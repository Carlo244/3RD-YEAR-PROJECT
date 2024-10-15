<?php
require_once 'dbConfig.php';
require_once 'models.php';

if (isset($_POST['InsertRegistrationBtn'])) {
    $First_Name = trim($_POST['First_Name']);
    $Last_Name = trim($_POST['Last_Name']);
    $YearOfExperience = trim($_POST['YearOfExperience']);
    $Specialization = trim($_POST['Specialization']);
    $EmailAddress = trim($_POST['EmailAddress']);
    $PhoneNumber = trim($_POST['PhoneNumber']);
    $ExpectedSalary = trim($_POST['ExpectedSalary']);


    if (!empty($First_Name) && !empty($Last_Name) && !empty($YearOfExperience) && !empty($Specialization) && !empty($EmailAddress)  && !empty($PhoneNumber) && !empty($ExpectedSalary)) {
        $query = InsertRegistrationBtn($pdo, $First_Name, $Last_Name, $YearOfExperience, $Specialization,$EmailAddress, $PhoneNumber, $ExpectedSalary);

    if ($query) {
        header("Location: index.php");

    }

    else {
        echo "Insertion failed";
    }
}

else {
    echo "Make sure that no fields are empty";
}

}


if (isset($_POST['editApplicantBtn'])) {
    $Applicant_id = $_GET['Applicant_id'];
    $First_Name = trim($_POST['First_Name']);
    $Last_Name = trim($_POST['Last_Name']);
    $YearOfExperience = trim($_POST['YearOfExperience']);
    $Specialization = trim($_POST['Specialization']);
    $EmailAddress = trim($_POST['EmailAddress']);
    $PhoneNumber = trim($_POST['PhoneNumber']);
    $ExpectedSalary = trim($_POST['ExpectedSalary']);

	if (!empty($Applicant_id) && !empty($First_Name) && !empty($Last_Name) && !empty($YearOfExperience) && !empty($Specialization) && !empty($EmailAddress) && !empty($PhoneNumber) && !empty($ExpectedSalary)) {

		$query = updateApplicant($pdo, $Applicant_id, $First_Name, $Last_Name, $YearOfExperience, $Specialization, $EmailAddress, $PhoneNumber, $ExpectedSalary);

		if ($query) {
			header("Location: index.php");
		}
		else {
			echo "Update failed";
		}

	}

	else {
		echo "Make sure that no fields are empty";
	}

}


if (isset($_POST['deleteApplicantBtn'])) {

	$query = deleteApplicant($pdo, $_GET['Applicant_id']);

	if ($query) {
		header("Location: index.php");
	}
	else {
		echo "Deletion failed";
	}
}



?>