<?php
require_once 'dbConfig.php';
if (isset($_POST['InsertIntoRegistration'])) {
    echo "<pre>";
    print_r($_POST);
    echo "<pre>";
}

?>
<?php
require_once 'dbConfig.php';
require_once 'models.php';

if (isset($_POST['InsertIntoRegistration'])) {
    $First_Name = $_POST['First_Name'];
    $Last_Name = $_POST['Last_Name'];
    $YearOfExperience = $_POST['YearOfExperience'];
    $Specialization = $_POST['Specialization'];
    $EmailAddress = $_POST['EmailAddress'];
    $PhoneNumber = $_POST['PhoneNumber'];
    $ExpectedSalary = $_POST['ExpectedSalary'];


    $query = InsertIntoRegistration($pdo,$First_Name,$Last_Name,$YearOfExperience,$Specialization,
    $EmailAddress,$PhoneNumber,$ExpectedSalary);

    if ($query) {
        header("index.php");
    } else {
        echo "FAILED";
    }
}



?>