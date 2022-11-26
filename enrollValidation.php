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

# Account Details
$name = $_POST['lName'] . ", " . $_POST['fName'] . " " . $_POST['mName'];
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
$placeOfBirth = $_POST['placeOfBirth'];
$contactPerson = $_POST['contactPerson'];
$contactRs = $_POST['contactRs'];
$cPerNum = $_POST['cPerNum'];
$mothersName = $_POST['mothersName'];
$fathersName = $_POST['fathersName'];

# File Handling Code
if (isset($_FILES['picture'])) {
    $file = $_FILES['picture'];

    $fileName = $_FILES['picture']['name'];
    $fileTmpName = $_FILES['picture']['tmp_name'];
    $fileSize = $_FILES['picture']['size'];
    $fileError = $_FILES['picture']['error'];
    $fileType = $_FILES['picture']['type'];

    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));

    $allowed = array('jpg', 'jpeg', 'png', 'webp');

    # Check if the file extension is in the allowed file types
    if (in_array($fileActualExt, $allowed)) {
        # Check if there is no File Error
        if ($fileError === 0) {
            # Check if the File Size isnt very big
            if ($fileSize < 1000000) {
                # Create a unique image id for the uploads
                $fileNameNew = uniqid('', true) . "." . $fileActualExt;
                # The information where it directs to the exact file path from the root
                $picture = "images/uploads/" . $fileNameNew;
                # Move the uploaded file to the file destination
                move_uploaded_file($fileTmpName, $picture);
            } else {
                header("Location:enroll.php");
                echo "File too big";
            }
        } else {
            header("Location:enroll.php");
            echo "Error";
        }
    } else {
        header("Location:enroll.php");
        echo "Jpg, Jpeg, Png, Webp Only";
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
            <a href="logout.php" class="logout">LOGOUT</a>
        </div>
    </div>

    <div class="borderProcess">
        <form action="enrollProcess.php" method="POST" enctype="multipart/form-data">
            <h1 class="line">ACCOUNT DETAILS</h1>
            <hr>
            <br>
            <div class="form-set">
                <span><b>Full Name : </b><?php echo $name ?></span>
                <?php echo "<input type='hidden' name='name' value='" . $name . "'>"; ?>
                <br><br>
                <span><b>Username  : </b><?php echo $username ?></span>
                <?php echo "<input type='hidden' name='username' value='" . $username . "'>"; ?>
                <br><br>
                <span><b>Password  : </b><?php echo $password ?></span>
                <?php echo "<input type='hidden' name='password' value='" . $password . "'>"; ?>
                <br><br>
                <span><b>E-Mail Address  : </b><?php echo $email_add ?></span>
                <?php echo "<input type='hidden' name='email_add' value='" . $email_add . "'>"; ?>
            </div>
    </div>

    <div class="borderProcess-1">
        <h1 class="line">IMPORTANT INFORMATION</h1>
            <hr>
            <br>
            <div class="form-set">
                <span> <b> Department : </b> <?php echo $department ?></span>
                <?php echo "<input type='hidden' name='department' value='" . $department . "'>"; ?>
                <br><br>
                <span> <b>Level : </b> <?php echo $level ?></span>
                <?php echo "<input type='hidden' name='level' value='" . $level . "'>"; ?>
                <br><br>
                <span> <b> Course : </b> <?php echo $course ?></span>
                <?php echo "<input type='hidden' name='course' value='" . $course . "'>"; ?>
                <br><br>
                <span><b>Birthdate  : </b><?php echo $birthdate ?></span>
                <?php echo "<input type='hidden' name='birthdate' value='" . $birthdate . "'>"; ?>
                <br><br>
                <span><b>Gender  :</b> <?php echo $gender ?></span>
                <?php echo "<input type='hidden' name='gender' value='" . $gender . "'>"; ?>
                <br><br>
                <span><b>Contact Number  : </b><?php echo $contactNum ?></span>
                <?php echo "<input type='hidden' name='contactNum' value='" . $contactNum . "'>"; ?>
                <br><br>
                <span><b>Religion :  </b><?php echo $religion ?></span>
                <?php echo "<input type='hidden' name='religion' value='" . $religion . "'>"; ?>
                <br><br>
                <span><b>Marital Status  : </b><?php echo $maritalStat ?></span>
                <?php echo "<input type='hidden' name='maritalStat' value='" . $maritalStat . "'>"; ?>
                <br><br>
                <span><b>Home Address  : </b><?php echo $homeAdd ?></span>
                <?php echo "<input type='hidden' name='homeAdd' value='" . $homeAdd . "'>"; ?>
                <br><br>
                <span><b>Province Origin  : </b><?php echo $provinceOrig ?></span>
                <?php echo "<input type='hidden' name='provinceOrig' value='" . $provinceOrig . "'>"; ?>
                <br><br>
                <span><b>Nationality  : </b><?php echo $nationality ?></span>
                <?php echo "<input type='hidden' name='nationality' value='" . $nationality . "'>"; ?>
                <br><br>
                <span><b>Place of Birth  : </b><?php echo $placeOfBirth ?></span>
                <?php echo "<input type='hidden' name='placeOfBirth' value='" . $placeOfBirth . "'>"; ?>
                <br><br>
                <span><b>Contact Person  : </b><?php echo $contactPerson ?></span>
                <?php echo "<input type='hidden' name='contactPerson' value='" . $contactPerson . "'>"; ?>
                <br><br>
                <span><b>Relationship  : </b><?php echo $contactRs ?></span>
                <?php echo "<input type='hidden' name='contactRs' value='" . $contactRs . "'>"; ?>
                <br><br>
                <span><b># of Contact  : </b><?php echo $cPerNum ?></span>
                <?php echo "<input type='hidden' name='cPerNum' value='" . $cPerNum . "'>"; ?>
                <br><br>
                <span><b>Mother's Name  : </b><?php echo $mothersName ?></span>
                <?php echo "<input type='hidden' name='mothersName' value='" . $mothersName . "'>"; ?>
                <br><br>
                <span><b>Father's Name  : </b><?php echo $fathersName ?></span>
                <?php echo "<input type='hidden' name='fathersName' value='" . $fathersName . "'>"; ?>
                <br><br><br><br>
                <span><b>Picture : </b></span>
                <?php echo "<img src='" . $picture . "' height='150px' width='150px'>" ?>
                <?php echo "<input type='hidden' name='picture' value='" . $picture . "'>"; ?>
                <br><br>
                <input class="confirmForm" type="submit" name="confirm" value="CONFIRM">
            </div>
        </form>
    </div>
    <div class="footer">
        <p>ALL RIGHTS RESERVED 2022 | SYBIL SYSTEM</p>
    </div>
</body>
</html>
