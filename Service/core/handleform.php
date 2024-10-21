<?php 

require_once 'dbconfig.php'; 
require_once 'models.php';

if (isset($_POST['Cleanerbtn'])) {

	$query = Register($pdo, $_POST['cleaner_name'], $_POST['cleaner_lname'], 
		$_POST['contact_info']);

	if ($query) {
		header("Location: ../index.php");
	}
	else {
		echo "Insertion failed";
	}

}

if (isset($_POST['Clientbtn'])) {
    
    $query = Client($pdo, $_POST['client_name'], $_POST['client_lname'], $_POST['client_address'],
    $_POST['cleaner_id'], $_POST['cleaning_date'], $_POST['cleaning_time']);
    if ($query) {
		header("Location: ../RegisterAClient.php");
	}
	else {
		echo "Insertion failed";
	}
}


if (isset($_POST['submit'])) {
	$user_type = $_POST['user_type'];
	if ($user_type == "cleaner") {
		header("Location: ../RegisterACleaner.php");
	} elseif ($user_type == "client") {
		header("Location: ../RegisterAClient.php");
	}
	exit();
}


if (isset($_POST['viewbtn'])) {
    header(header: "Location: ../ViewSchedule.php");
}

if (isset($_POST['backbtn'])) {
	header(header: "Location: ../index.php");
}
?>