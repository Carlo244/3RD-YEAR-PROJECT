<?php require_once 'dbconfig.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>
       <style>
            table {
            width: 100%;
            border-collapse: collapse;
            }
            table, th, td {
            border: 1px solid black;
            }
            th, td {
            padding: 10px;
            text-align: left;
            }
            th {
            background-color: #f2f2f2;
            }
           </style>
       </head>
       <body>
       <h1>Customers Records</h1>
       
           <?php
           //Preparing sql query to select all the attribute from the customers table
           $sql = "SELECT id, name, email, phone FROM customers";
       
           // Execute the query and fetch all results
           foreach ($pdo->query($sql) as $row) {
               if (!isset($table)) {
                   // Start table if it's the first time the loop runs
                   echo "<table border='1'>";
                   echo "<tr><th>ID</th><th>Name</th><th>Email</th><th>Phone</th></tr>";
                   $table = true;
               }
           
               // Display each row in the table
               echo "<tr>";
               echo "<td>" . $row['id'] . "</td>";
               echo "<td>" . $row['name'] . "</td>";
               echo "<td>" . $row['email'] . "</td>";
               echo "<td>" . $row['phone'] . "</td>";
               echo "</tr>";
           }
           
           // If no table has been printed, that means no customers were found
           if (!isset($table)) {
               echo "<p>No customers found.</p>";
           } else {
               // End table
               echo "</table>";
           }
           ?>
       </body>
       </html>
?>

</body>