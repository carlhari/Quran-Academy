<?php
# Start the Session
session_start();
include "connection.php";
# Check if the person logged in is the user or the admin
# If logged in is admin, then redirect to admin.php to avoid unwanted connection
if (isset($_SESSION['loggedInAsAdmin']) && $_SESSION['loggedInAsAdmin']) {
    header("Location:admin.php");
}
# If nothing is logged in, redirect to login.php to prompt for login
if (!$_SESSION['loggedInAsUser']) {
    header("Location:login.php");
}

# MySql Query to perform to retrieve the values using stud_id
$sql = "SELECT * FROM " . $tableName . " WHERE stud_id='" . $_SESSION["stud_id"] . "';";
$getUser = mysqli_query($conn, $sql);

# Array that contains all of the data
$stud_data = mysqli_fetch_array($getUser);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Ouran Academy Portal</title>
    <link rel="stylesheet" href="styles.css" />
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
            <a href="logout.php" class="logout">LOGOUT</a>
        </div>
    </div>

    <div class="viewBox">
        <div class="side">
            <img class="profilePic" src="<?php echo $stud_data['picture'] ?>" />
            <hr>
            <div class="information">
                <div class="info-box">
                    <p><b><?php echo $stud_data['name'] ?></b></p>
                </div>
                <div class="info-box">
                    <p><i><u>Student ID : <?php echo $stud_data['stud_id'] ?></u></i></p>
                </div>
                <div class="info-box">
                    <p><i><u>Student batch : <?php echo $stud_data['studbatch'] ?></u></i></p>
            </div>
            </div>
        </div>


        <div class="viewSection">
            <p><i><b><?php echo $stud_data['department'] . ", " . $stud_data['course'] . ", " . $stud_data['level'] ?></b></i></p>
            <hr />
            <div class="infoBox">
                <h2 class="viewHead">BASIC INFORMATION</h2>
                <p><b>Gender : </b><?php echo $stud_data['gender'] ?></p>
                <p><b>Contact Number : </b><?php echo $stud_data['contact_num'] ?></p>
                <p><b>Email Address : </b><?php echo $stud_data['emailAddress'] ?></p>
                <p><b>Permanent Address : </b><?php echo $stud_data['homeAddress'] ?></p>
            </div>
            <hr />
            <div class="infoBox">
                <h2 class="viewHead">PERSONAL INFORMATION</h2>
                <p><b>Birthday : </b><?php echo $stud_data['birthday'] ?></p>
                <p><b>Province Origin : </b><?php echo $stud_data['origProvince'] ?></p>
                <p><b>Nationality : </b><?php echo $stud_data['nationality'] ?></p>
                <p><b>Religion : </b><?php echo $stud_data['religion'] ?></p>
                <p><b>Marital Status : </b><?php echo $stud_data['mariStat'] ?></p>
                <p><b>Mother's Name : </b><?php echo $stud_data['mothers_name'] ?></p>
                <p><b>Father's Name : </b><?php echo $stud_data['fathers_name'] ?></p>
            </div>
            <hr />
            <div class="infoBox">
                <h2 class="viewHead">IN CASE OF EMERGENCY</h2>
                <p><b>Contact Person : </b><?php echo $stud_data['contactPerson'] ?></p>
                <p><b>Relationship with Contact Person : </b><?php echo $stud_data['contactPersonRs'] ?></p>
                <p><b>Contact Person Number : </b><?php echo $stud_data['contactPersonNum'] ?></p>
            </div>
        </div>
    </div>
    <div class="footer">
        <p>ALL RIGHTS RESERVED 2022 | SYBIL SYSTEM</p>
    </div>
</body>

</html>

