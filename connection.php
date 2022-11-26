<?php
# Connection Credentials
$host = "localhost";
$user = "sibylsystem";
$password = "sibylsystem";
$dbName = "ouran_portal";
$tableName = "users";

# Connection Command
$conn = mysqli_connect($host, $user, $password, $dbName) or die("Unable to connect " . $conn->connect_error);
