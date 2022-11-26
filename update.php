<?php
# Start the Session
session_start();
include "connection.php";

# Check if the person logged in is the user or admin
# If logged in is user, then redirect to user.php to avoid unwanted connection
if (isset($_SESSION['loggedInAsUser']) && $_SESSION['loggedInAsUser']) {
    header("Location:user.php");
}
# If nothing is logged in, redirect to login.php to prompt for login
if (!$_SESSION['loggedInAsAdmin']) {
    header("Location:login.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>OA Portal | Update</title>
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
            <a href="admin.php" class="menu">MAIN MENU</a>
            <a href="logout.php" class="logout">LOGOUT</a>
        </div>
    </div>

    <div class="search-section">
        <h2>UPDATE EXISTING DATA</h2>
        <form action="<?=$_SERVER['PHP_SELF'];?>" method="GET">
            <input type="text" name="studID" placeholder="Enter Student ID" />
            <br />
            <br />
            <input type="submit" value="SEARCH" />
        </form>

<?php
# The form returns its data to itself it performs after getting studID
if (isset($_GET['studID'])) {
    $studID = $_GET['studID'];

    # MySQL query to confirm if there is a matching stud_id to the stud_id being queued
    $sql = "SELECT stud_id FROM " . $tableName . " WHERE stud_id = '" . $studID . "';";
    $query = mysqli_query($conn, $sql);

    # Put the stud_id in the array
    $row = mysqli_fetch_array($query);
    if (is_array($row)) {
        # The stud_id will be parsed into the url
        header("Location:updateForm.php?studID=" . urlencode(serialize($row)));
    } else {
        echo "<span>No student found with ID</span>";
    }
}
?>
    </div>
</body>

</html>
