<?php
# Start the Session
session_start();
include 'connection.php';

# Check if the person logged in is the user or admin
# If logged in is user, then redirect to user.php to avoid unwanted connection
if (isset($_SESSION['loggedInAsUser']) && $_SESSION['loggedInAsUser']) {
    header("Location:user.php");
}
# If nothing is logged in, redirect to login.php to prompt for login
if (!$_SESSION['loggedInAsAdmin']) {
    header("Location:login.php");
}

# If the submit button was confirmed, then this will be performed
if (isset($_POST['confirm'])) {
    # Account Details
    $name = $_POST['name'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email_add = $_POST['email_add'];

    # School Data
    $department = $_POST['department'];
    $level = $_POST['level'];
    $course = $_POST['course'];

    # Personal Info
    $birthdate = date('Y-m-d', strtotime($_POST['birthdate']));
    $gender = $_POST['gender'];
    $contactNum = $_POST['contactNum'];
    $religion = $_POST['religion'];
    $maritalStat = $_POST['maritalStat'];
    $homeAdd = $_POST['homeAdd'];
    $provinceOrig = $_POST['provinceOrig'];
    $nationality = $_POST['nationality'];
    $birthPlace = $_POST['placeOfBirth'];
    $contactPerson = $_POST['contactPerson'];
    $contactRs = $_POST['contactRs'];
    $cPerNum = $_POST['cPerNum'];
    $mothersName = $_POST['mothersName'];
    $fathersName = $_POST['fathersName'];
    $picture = $_POST['picture'];

    # Query to Perform
    $sql = "INSERT INTO " . $tableName . "(" . "name, username, password, emailAddress, department, level, course, birthday, gender, contact_num, religion, mariStat, homeAddress, origProvince, nationality, studbatch, birthPlace, contactPerson, contactPersonRs, contactPersonNum, mothers_name, fathers_name, picture) " . "VALUES('" . $name . "', '" . $username . "', '" . $password . "', '" . $email_add . "', '" . $department . "', '" . $level . "', '" . $course . "', '" . $birthdate . "', '" . $gender . "', '" . $contactNum . "', '" . $religion . "', '" . $maritalStat . "', '" . $homeAdd . "', '" . $provinceOrig . "', '" . $nationality . "', " . "YEAR(CURDATE())" . ", '" . $birthPlace . "', '" . $contactPerson . "', '" . $contactRs . "', '" . $cPerNum . "', '" . $mothersName . "', '" . $fathersName . "', '" . $picture . "'); ";
    $enroll = mysqli_query($conn, $sql);

    if (!$enroll) {
        die("Error in the enrollment " . $conn->connect_error);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OA Portal | Confirm Enrollment</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="shortcut icon" type="image/x-icon" href="images/ouran-logo.png" />
</head>
<body>
    <div class="header">
        <div class="header-school">
            <p class="header-title"><b>OURAN</b></p>
            <a href="#"><img class="header-logo" src="images/ouran-logo.png" /></a>
            <p class="header-title"><b>ACADEMY</b></p>
        </div>
        <div class="header-menu">
            <a href="admin.php" class="menu">MAIN MENU</a>
            <a href="enroll.php" class="enroll">ENROLL</a>
        </div>
    </div>

    <div class="page-content">
<?php
# MySQL Query to fetch the Student ID of the newly created row
$sql = "SELECT stud_id FROM " . $tableName . " WHERE name='" . $name . "' AND username='" . $username . "';";
$retval = mysqli_query($conn, $sql);
$stud_id = mysqli_fetch_array($retval);
if (!$retval) {
    die("ERROR ON DATABASE");
}
?>
    <p class="successForm">ENROLLED  <span class="processText"> <?php echo $name ?> </span> WITH STUDENT ID  <span class="processText"> <?php echo $stud_id['stud_id'] ?></span><b style="color: Green">  SUCCESSFULLY!</b></p>
    </div>
    <div class="footer">
        <p>ALL RIGHTS RESERVED 2022 | SYBIL SYSTEM</p>
    </div>
</body>
</html>
