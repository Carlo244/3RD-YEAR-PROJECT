<?php require_once 'dbConfig.php'; ?>
<?php require_once 'models.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <style>
        body{
            font-family: "Comic-sans";
        }
        input {
            font-size: auto;
            height: 25px;
            width: 200px;
        }
        table, th, td {
		  border:1px solid black;
		}

    </style>
</head>
<body>
<p><h3>Welcome guys</h3></p>
    <form action="handleform.php" method="POST">
    <p><label for="First_Name">First Name </label><input type="text" name="First_Name"></p>
    <p><label for="Last_Name">Last Name </label><input type="text" name="Last_Name"></p>
    <p><label for="YearOfExperience">Year Of Experience </label><input type="text" name="YearOfExperience"></p>
    <p><label for="Specialization">Specialization </label><input type="text" name="Specialization"></p>
    <p><label for="EmailAddress">EmailAddress </label><input type="text" name="EmailAddress"></p>
    <p><label for="PhoneNumber">PhoneNumber </label><input type="text" name="PhoneNumber"></p>
    <p><label for="ExpectedSalary">ExpectedSalary </label><input type="text" name="ExpectedSalary">
        <input type="submit" name="InsertRegistrationBtn">
    </p>
    </form>

    <table style="width:50%; margin-top: 50px;">
	  <tr>
	    <th>Applicant ID</th>
	    <th>First Name</th>
	    <th>Last Name</th>
	    <th>Year Of Experience</th>
	    <th>Specialization</th>
	    <th>EmailAddress</th>
	    <th>PhoneNumber</th>
	    <th>ExpectedSalary</th>
	  </tr>

      <?php $seeAllApplicant = seeAllApplicant($pdo); ?>
	  <?php foreach ($seeAllApplicant as $row) { ?>
	  <tr>
	  	<td><?php echo $row['Applicant_id']; ?></td>
	  	<td><?php echo $row['First_Name']; ?></td>
	  	<td><?php echo $row['Last_Name']; ?></td>
	  	<td><?php echo $row['YearOfExperience']; ?></td>
	  	<td><?php echo $row['Specialization']; ?></td>
	  	<td><?php echo $row['EmailAddress']; ?></td>
	  	<td><?php echo $row['PhoneNumber']; ?></td>
	  	<td><?php echo $row['ExpectedSalary']; ?></td>
	  	<td>
	  		<a href="editApplicant.php?Applicant_id=<?php echo $row['Applicant_id'];?>">Edit</a>
	  		<a href="deleteApplicant.php?Applicant_id=<?php echo $row['Applicant_id'];?>">Delete</a>
	  	</td>
	  </tr>
	  <?php } ?>
	</table>

</body>
</html>