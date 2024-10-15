<?php require_once 'dbConfig.php'; ?>
<?php require_once 'models.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Delete</title>
	<style>
		body {
			font-family: "Arial";
		}
		input {
			font-size: 1.5em;
			height: 50px;
			width: 200px;
		}
		table, th, td {
		  border:1px solid black;
		}
	</style>
</head>
<body>
	<h1>Are you sure you want to delete this user?</h1>
	<?php $getApplicantId = getApplicantId($pdo, $_GET['Applicant_id']); ?>
	<form action="handleform.php?Applicant_id=<?php echo $_GET['Applicant_id']; ?>" method="POST">

		<div class="studentContainer" style="border-style: solid; 
		font-family: 'Arial';">
			<p>First Name: <?php echo $getApplicantId['First_Name']; ?></p>
			<p>Last Name: <?php echo $getApplicantId['Last_Name']; ?></p>
			<p>Year Of Experience: <?php echo $getApplicantId['YearOfExperience']; ?></p>
			<p>Specialization: <?php echo $getApplicantId['Specialization']; ?></p>
			<p>EmailAddress: <?php echo $getApplicantId['EmailAddress']; ?></p>
			<p>PhoneNumber: <?php echo $getApplicantId['PhoneNumber']; ?></p>
			<p>ExpectedSalary: <?php echo $getApplicantId['ExpectedSalary']; ?></p>
			<input type="submit" name="deleteApplicantBtn" value="REMOVE">
		</div>
	</form>
</body>
</html>