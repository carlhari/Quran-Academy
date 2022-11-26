<?php
# ========================== CREDENTIALS OF DATABASE ===========================
$host = "localhost";
$user = "sibylsystem";
$password = "sibylsystem";
$dbName = "ouran_portal";
$tableName = "users";

echo '<div class="loading-container">';

# =========================== INITIAL CONNECTION ==============================
$conn = mysqli_connect($host, $user, $password);
if ($conn->connect_error) {
    die("Connection failed : " . $conn->connect_error);
}

# ========================== NEW CONNECTIOJN ===================================

$conn = mysqli_connect($host, $user, $password, $dbName);
if ($conn->connect_error) {
    die("Connection had a problem : " . $conn->connect_error);
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <link rel="shortcut icon" type="image/x-icon" href="images/ouran-logo.png" />
    <title>LOADING...</title>
</head>
<body>
    <div class="createObjects">
        <div>
            <?php
# ========================= CREATION OF DATABASE ==============================
$sql = "CREATE DATABASE IF NOT EXISTS " . $dbName;
$retval = mysqli_query($conn, $sql);
if (!$retval) {
    die('DATABASE CREATION FAILED ' . mysqli_error($this->db_link));
} else {
    echo '<p>DATABASE <b>' . $dbName . '</b> CREATION <span style="color:green;"> SUCCESS </span></p>';
}
?>
        </div>
        <br><br>
        <div>
            <?php
# =========================== CREATION OF TABLE ===============================

$sql = "CREATE TABLE IF NOT EXISTS " . $tableName . "(" . "stud_id int(10) NOT NULL AUTO_INCREMENT PRIMARY KEY," .
    "username varchar(40) NOT NULL," .
    "password varchar(30) NOT NULL," .
    "name varchar(100) NOT NULL," .
    "department varchar(100) NOT NULL," .
    "level varchar(30) NOT NULL," .
    "course varchar(100) NOT NULL," .
    "gender char(1) NOT NULL," .
    "contact_num varchar(20) NOT NULL," .
    "religion varchar(100) NOT NULL," .
    "mariStat varchar(50) NOT NULL," .
    "homeAddress varchar(200) NOT NULL," .
    "emailAddress varchar(200) NOT NULL," .
    "mothers_name varchar(100) NOT NULL," .
    "fathers_name varchar(100) NOT NULL," .
    "picture varchar(255) NOT NULL," .
    "birthday date NOT NULL," .
    "origProvince varchar(100) NOT NULL," .
    "nationality varchar(50) NOT NULL," .
    "studbatch year(4) NOT NULL," .
    "birthPlace varchar(100) NOT NULL," .
    "contactPerson varchar(100) NOT NULL," .
    "contactPersonRs varchar(50) NOT NULL," .
    "contactPersonNum varchar(20) NOT NULL); ";

$retval = mysqli_query($conn, $sql);
if (!$retval) {
    die('TABLE CREATION FAILED ' . mysqli_error($this->db_link));
} else {
    echo '<p>TABLE <b>' . $tableName . '</b> CREATION <span style="color:green;"> SUCCESS </span> </p>';
}
?>
        </div>
        <br><br>
        <div>
            <?php
# ============================== ADMIN CONNECTION ============================

$sql = "SELECT * FROM " . $tableName . " WHERE username ='admin'";
$retval = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($retval);

if (is_array($row)) {
    echo '<p style="color: Green"><b>ADMIN CONNECTED!</b></p>';
} else {
    echo '<p style="color: Red"><b>ADMIN FAILED TO CONNECT!</b></p>';
}
?>
        </div>
        <br><br>
        <div>
            <p style="text-align: center">Redirecting to school portal....</p>
        </div>
        <br><br>
        <div>
            <a href="login.php"><p style="text-align: center" class="redirecting"><b>Click to head to the page if it doesnt return at 5 seconds.</b></p></a>
        </div>
        </div>
</div>

    <script>
        setTimeout(function(){
            window.location.href='login.php';
        }, 5000);
    </script>
</body>
</html>
