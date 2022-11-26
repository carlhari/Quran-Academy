<?php
# Run before opening other site
# Run Only Once
$initConn = mysqli_connect('localhost', 'root', '');

# Create Database, User and Add Password
$dbName = 'ouran_portal';
$dbUser = 'sibylsystem';
$dbPass = 'sibylsystem';

# The MYSQL Query to Execute Line by Line
$queries = array(
    "CREATE DATABASE IF NOT EXISTS `$dbName` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci",
    "CREATE USER IF NOT EXISTS '$dbUser'@'localhost' IDENTIFIED BY '$dbPass'",
    "GRANT ALL ON * . * TO '$dbUser'@'localhost' IDENTIFIED BY '$dbPass' WITH MAX_QUERIES_PER_HOUR 0 MAX_CONNECTIONS_PER_HOUR 0 MAX_UPDATES_PER_HOUR 0 MAX_USER_CONNECTIONS 0",
    "GRANT SELECT , INSERT , UPDATE, DELETE ON `$dbName` . * TO '$dbUser'@'localhost'",
    "FLUSH PRIVILEGES",
);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <link rel="shortcut icon" type="image/x-icon" href="images/ouran-logo.png" />
    <title>OA Portal | Create</title>
</head>
<body>

    <div class="createUser">
<?php
# Execute the MySQL Query
foreach ($queries as $query) {
    echo '<div><p><b>Executing query: "' . htmlentities($query) . '" ... ';
    $rs = mysqli_query($initConn, $query);
    echo ($rs ? '<span style="color:green;">OK</span></b></p></div>' : '<span style="color:red;">FAIL</span></b></p></div>') . '<br/><br/>';
}
?>
    </div>

    <script>
        // Script to perform to redirect the page to index.php
        setTimeout(function(){
            window.location.href='index.php';
        }, 5000);
    </script>

</body>
</html>
