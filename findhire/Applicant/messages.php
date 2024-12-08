<?php
session_start();
require_once '../core/dbconfig.php';
require_once '../core/models.php';
if ($_SESSION['role'] != 'APPLICANT') {
    header("Location: ../login.php");
    exit();
}

$applicantId = $_SESSION['user_id'];
$messages = getMessagesForApplicant($pdo, $applicantId);
$hrUsers = getAllHRUsers($pdo);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Applicant Dashboard - Messages</title>
    <link rel="stylesheet" type="text/css" href="../style/message.css">
</head>
<body>
    <div class="main">
        <?php include "searchbar.php"; ?>
        <h2>Messages from HR</h2>
        <?php if ($messages) { ?>
            <ul>
                <?php foreach ($messages as $message) { ?>
                    <li>
                        <?php echo htmlspecialchars($message['message_content']); ?> - <strong>
                        <?php echo htmlspecialchars($message['sender_name']); ?></strong></li>
                <?php } ?>
            </ul>
        <?php } else { ?>
            <p>No messages found.</p>
        <?php } ?>
        
        <h2>Send Message to HR</h2>
        <form action="../core/handleform.php" method="POST">
            <label for="recipient">Select HR Representative:</label>
            <select id="recipient" name="recipient_id" required>
                <?php foreach ($hrUsers as $user) { ?>
                    <option value="<?php echo $user['user_id']; ?>"><?php echo htmlspecialchars($user['username']); ?></option>
                <?php } ?>
            </select>
            <label for="message_content">Message:</label>
            <textarea id="message_content" name="message_content" required></textarea>
            <button type="submit" name="sendmessagetohr">Send Message</button>
        </form>
    </div>
</body>
</html>
