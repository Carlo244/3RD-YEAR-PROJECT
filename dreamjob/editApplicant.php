<?php require_once 'dbConfig.php'; ?>
<?php require_once 'models.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Edit</title>
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
	<?php $Applicant_id = getApplicantId($pdo, $_GET['Applicant_id']); ?>
	<form action="handleform.php?Applicant_id=<?php echo $_GET['Applicant_id']; ?>" method="POST">
		<p>
			<label for="First_Name">First Name</label> 
			<input type="text" name="First_Name" value="<?php echo $Applicant_id['First_Name']; ?>">
		</p>
		<p>
			<label for="Last_Name">Last Name</label> 
			<input type="text" name="Last_Name" value="<?php echo $Applicant_id['Last_Name']; ?>">
		</p>
		<p>
			<label for="YearOfExperience">Year Of Experience</label>
			<input type="text" name="YearOfExperience" value="<?php echo $Applicant_id['YearOfExperience']; ?>">
		</p>
		<p>
			<label for="Specialization">Specialization</label>
			<input type="text" name="Specialization" value="<?php echo $Applicant_id['Specialization']; ?>">
		</p>
		<p>
			<label for="EmailAddress">EmailAddress</label>
			<input type="text" name="EmailAddress" value="<?php echo $Applicant_id['EmailAddress']; ?>">
		</p>
		<p>
			<label for="PhoneNumber">PhoneNumber</label>
			<input type="text" name="PhoneNumber" value="<?php echo $Applicant_id['PhoneNumber']; ?>"></p>
		<p>
			<label for="ExpectedSalary">ExpectedSalary</label>
			<input type="text" name="ExpectedSalary" value="<?php echo $Applicant_id['ExpectedSalary']; ?>">
			<input type="submit" name="editApplicantBtn">
		</p>
	</form>
</body>
</html>
