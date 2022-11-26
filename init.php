<?php

# this script is only to be run after the index has been run atleast once
include 'connection.php';

# MySQL Query to create the admin
$sql = "INSERT INTO " . $tableName . "(stud_id, username, password)" . "VALUES('0', 'admin', 'admin')";
$createAdmin = mysqli_query($conn, $sql);
if (!$createAdmin) {
    die("Admin Creation Failed.");
}

# Script that is to create custom primary key auto increment
$sql = "ALTER TABLE " . $tableName . " AUTO_INCREMENT=2022000";
$studIDinc = mysqli_query($conn, $sql);
if (!$createAdmin) {
    die("Student ID Generation Failed.");
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
    <title>Initial Configuration Page</title>
</head>
<body>
    <div class="init">
        <h3>ADMIN CREATION <span style="color:green;">SUCCESSFUL</span></h3>
        <h3>STUDENT ID GENERATION <span style="color:green;">SUCCESSFUL</span></h3>
        <h4>Redirecting Page...</h4>
    </div>

    <script>
        setTimeout(function(){
            window.location.href='index.php';
        }, 5000);
    </script>
</body>
</html>
