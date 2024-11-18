<?php 
require_once 'core/dbconfig.php';
require_once 'core/models.php'; 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Applicants</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <?php if (isset($_SESSION['message'])) { ?>
        <h1 style="color: green; text-align: center; background-color: ghostwhite; border-style: solid;">   
            <?php echo $_SESSION['message']; ?>
        </h1>
    <?php } unset($_SESSION['message']); ?>
    <h1>List Of Applicants</h1>
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="GET">
        <input type="text" name="searchInput" placeholder="Search here" value="<?php echo isset($_GET['searchInput']) ? htmlspecialchars($_GET['searchInput']) : ''; ?>">
    
        <div class="button-container-wrapper">
            <div class="button-container">
                <button type="submit" name="searchBtn">Search</button>
                </form>
                <form action="index.php" method="GET" style="display:inline;">
                <button type="submit">Clear</button></form>
            </div>
            <div class="button-container2">
                <form action="add_applicant.php" method="GET" style="display:inline;">
                <button type="submit">Insert New Employee?</button></form>
            </div>
        </div>  
    </form>

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
                        </form>
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
                        </form>
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
