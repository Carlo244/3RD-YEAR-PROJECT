<?php 
require_once 'core/dbconfig.php';
require_once 'core/models.php'; 
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
	<?php if (isset($_SESSION['message'])) { ?>
		<h1 style="color: green; text-align: center; background-color: ghostwhite; border-style: solid;">	
			<?php echo $_SESSION['message']; ?>
		</h1>
	<?php } unset($_SESSION['message']); ?>

	<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="GET">
		<input type="text" name="searchInput" placeholder="Search here">
		<input type="submit" name="searchBtn">
	</form>

	<p><a href="index.php">Clear Search Query</a></p>
	<p><a href="insert.php">Insert New User</a></p>

	<table style="width:100%; margin-top: 20px;">
		<tr>
			<th>First Name</th>
			<th>Last Name</th>
			<th>Email</th>
			<th>Phone Number</th>
			<th>Position Applied</th>
			<th>Date Added</th>
            <th>Actions</th>
		</tr>

		<?php if (!isset($_GET['searchBtn'])) { ?>
			<?php $getAllUsers = getAllUsers($pdo); ?>
				<?php foreach ($getAllUsers as $row) { ?>
					<tr>
						<td><?php echo $row['first_name']; ?></td>
						<td><?php echo $row['last_name']; ?></td>
						<td><?php echo $row['email']; ?></td>
						<td><?php echo $row['phone_number']; ?></td>
						<td><?php echo $row['position_applied']; ?></td>
						<td><?php echo $row['application_date']; ?></td>
						<td>
                        <form action="edit_applicant.php" method="GET" style="display:inline;">
                        <input type="hidden" name="applicant_id" value="<?php echo $row['applicant_id']; ?>">
                        <button type="submit">Edit</button>
                        <form action="delete_applicant.php" method="GET" style="display:inline;">
                        <input type="hidden" name="applicant_id" value="<?php echo $row['applicant_id']; ?>">
                        <button type="submit">Delete</button>
                        </form>
						</td>
					</tr>
			<?php } ?>
			
		<?php } else { ?>
			<?php $searchForAUser =  searchForAUser($pdo, $_GET['searchInput']); ?>
				<?php foreach ($searchForAUser as $row) { ?>
					<tr>
                        <td><?php echo $row['first_name']; ?></td>
						<td><?php echo $row['last_name']; ?></td>
						<td><?php echo $row['email']; ?></td>
						<td><?php echo $row['phone_number']; ?></td>
						<td><?php echo $row['position_applied']; ?></td>
						<td><?php echo $row['application_date']; ?></td>
						<td>
                        <form action="edit_applicant.php" method="GET" style="display:inline;">
                        <input type="hidden" name="applicant_id" value="<?php echo $row['applicant_id']; ?>">
                        <button type="submit">Edit</button>
                        <form action="delete_applicant.php" method="GET" style="display:inline;">
                        <input type="hidden" name="applicant_id" value="<?php echo $row['applicant_id']; ?>">
                        <button type="submit">Delete</button>
                        </form>
						</td>
					</tr>
				<?php } ?>
		<?php } ?>	
	</table>
</div>
</body>
</html>