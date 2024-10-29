<?php
require_once 'dbconfig.php';

function userExists($pdo, $username) {
    $sql = "SELECT * FROM users WHERE username = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$username]);
    return $stmt->fetch();
}

function createUser($pdo, $firstname, $lastname, $username, $password, $role) {
    $sql = "INSERT INTO users (firstname, lastname, username, password, role) VALUES (?, ?, ?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    $executeQuery = $stmt->execute([$firstname, $lastname, $username, $password, $role]);

    if ($executeQuery) {
        if ($role === 'cleaner') {
            $cleanerSql = "INSERT INTO Cleaners (cleanerfirstname, cleanerlastname) VALUES (?, ?)";
            $cleanerStmt = $pdo->prepare($cleanerSql);
            return $cleanerStmt->execute([$firstname, $lastname]);
        } elseif ($role === 'client') {
            $clientSql = "INSERT INTO Clients (clientfirstname, clientlastname) VALUES (?, ?)";
            $clientStmt = $pdo->prepare($clientSql);
            return $clientStmt->execute([$firstname, $lastname]);
        }
    } 
    return false; // Handle failure of user insertion
}
function getUserFullName($pdo, $username) {
    $sql = "SELECT firstname, lastname FROM users WHERE username = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$username]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}


function getUser($pdo, $username) {
    $sql = "SELECT * FROM users WHERE username = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$username]);
    return $stmt->fetch();
}

function getAllCleaners($pdo) {
    $sql = "SELECT CleanerID, cleanerfirstname, cleanerlastname FROM Cleaners";
    $stmt = $pdo->query($sql);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function getClientSchedules($pdo, $username) {
    $sql = "SELECT 
                cs.ScheduleID, 
                cl.cleanerfirstname AS CleanerName, 
                cs.CleaningDate, 
                cs.CleaningTime,
                cs.Address, 
                cs.CleaningDescription, 
                cs.CreatedAt, 
                cs.UpdatedAt
            FROM 
                CleaningSchedule cs
            JOIN 
                Clients c ON cs.ClientID = c.ClientID
            JOIN 
                Cleaners cl ON cs.CleanerID = cl.CleanerID
            JOIN 
                users u ON u.firstname = c.clientfirstname AND u.lastname = c.clientlastname
            WHERE 
                u.username = ? AND u.role = 'client'";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$username]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}



function getClientIDByUsername($pdo, $username) {
    $sql = "SELECT u.UserID, c.ClientID 
            FROM users u 
            JOIN Clients c ON u.firstname = c.clientfirstname AND u.lastname = c.clientlastname 
            WHERE u.username = ? AND u.role = 'client'";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$username]);
    return $stmt->fetchColumn(1); // Return ClientID
}

function getCleanerIDByUsername($pdo, $username) {
    $sql = "SELECT u.UserID, c.CleanerID 
            FROM users u 
            JOIN Cleaners c ON u.firstname = c.cleanerfirstname AND u.lastname = c.cleanerlastname 
            WHERE u.username = ? AND u.role = 'cleaner'";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$username]);
    return $stmt->fetchColumn(1); // Return CleanerID
}

function addCleaningSchedule($pdo, $clientID, $cleanerID, $date, $time, $address, $description) {
    $sql = "INSERT INTO CleaningSchedule (ClientID, CleanerID, CleaningDate, CleaningTime, Address, CleaningDescription) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$clientID, $cleanerID, $date, $time, $address, $description]);
}


function editSchedule($pdo, $scheduleID, $cleanerID, $date, $time, $address, $description) {
    $sql = "UPDATE CleaningSchedule 
            SET CleanerID = ?, CleaningDate = ?, CleaningTime = ?, Address = ?, CleaningDescription = ? 
            WHERE ScheduleID = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$cleanerID, $date, $time, $address, $description, $scheduleID]);
}


function getScheduleById($pdo, $scheduleID) {
    $sql = "SELECT cs.*, cl.cleanerfirstname, cl.cleanerlastname 
            FROM CleaningSchedule cs 
            JOIN Cleaners cl ON cs.CleanerID = cl.CleanerID 
            WHERE cs.ScheduleID = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$scheduleID]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function getCleanerSchedules($pdo, $username) {
    $sql = "SELECT 
                cs.ScheduleID, 
                cl.clientfirstname, 
                cl.clientlastname, 
                cs.CleaningDate, 
                cs.CleaningTime,
                cs.Address, 
                cs.CleaningDescription
            FROM 
                CleaningSchedule cs
            JOIN 
                Clients cl ON cs.ClientID = cl.ClientID
            JOIN 
                Cleaners c ON cs.CleanerID = c.CleanerID
            JOIN 
                users u ON u.firstname = c.cleanerfirstname AND u.lastname = c.cleanerlastname
            WHERE 
                u.username = ? AND u.role = 'cleaner'
            ORDER BY 
                cs.CleaningDate ASC, cs.Cleaningtime ASC";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$username]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}


function deleteCleaningSchedule($pdo, $scheduleID) {
    $sql = "DELETE FROM CleaningSchedule WHERE ScheduleID = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$scheduleID]);
}



?>
