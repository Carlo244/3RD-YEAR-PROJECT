<?php  

function Register($pdo, $CleanerName, $CleanerLName, $ContactInfo) {

	$sql = "INSERT INTO cleaners (CleanerName, CleanerLName, ContactInfo 
	        ) VALUES(?,?,?)";

	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$CleanerName, $CleanerLName, $ContactInfo]);

	if ($executeQuery) {
		return true;
	}
}

function Client($pdo, $ClientName, $ClientLName, $ClientAddress, $CleanerID, $CleaningDate, $CleaningTime) {
    $sql = "INSERT INTO clients (ClientName, ClientLName, ClientAddress, CleanerID, CleaningDate, CleaningTime) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    $executeQuery = $stmt->execute([$ClientName, $ClientLName, $ClientAddress, $CleanerID, $CleaningDate, $CleaningTime]);

    if ($executeQuery) {
        // Get the last inserted client ID
        $ClientID = $pdo->lastInsertId();

        // Insert into CleaningSchedule table
        $sql_schedule = "INSERT INTO cleaningschedule (ClientID, CleanerID, CleaningDate, CleaningTime) VALUES (?, ?, ?, ?)";
        $stmt_schedule = $pdo->prepare($sql_schedule);
        $executeScheduleQuery = $stmt_schedule->execute([$ClientID, $CleanerID, $CleaningDate, $CleaningTime]);

        if ($executeScheduleQuery) {
            return true;
        } else {
            return false; // Handle failure of CleaningSchedule insertion
        }
    } else {
        return false; // Handle failure of Clients insertion
    }
}



?>