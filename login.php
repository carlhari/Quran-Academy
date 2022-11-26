<?php
# Start the Session
session_start();
include 'connection.php';

# Check if the person logged in is the user or admin
# If logged in is admin, then redirect to admin.php to avoid session confusion
if (isset($_SESSION['loggedInAsAdmin']) && $_SESSION['loggedInAsAdmin']) {
    header("Location:admin.php");
}
# If logged in is user, then redirect to user.php to avoid session confusion
if (isset($_SESSION['loggedInAsUser']) && $_SESSION['loggedInAsUser']) {
    header("Location:user.php");
}
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
    <div class="main-page">
        <div class="login">
        <img src="images/ouran-logo.png" alt="Ouran Academy" class=logo>
            <div class="school-title">
                <p><b>OURAN ACADEMY PORTAL</b></p>
            </div>
            <form action="<?=$_SERVER['PHP_SELF'];?>" method="POST">
                <input class="unForm" type="text" name="username" placeholder="Enter Username" autocomplete="off" required />

                <input class="pwForm" type="password" name="password" placeholder="Enter Password" autocomplete="off" required />

                <input class="submit-btn" type="submit" name="login" value="Log In" />

            </form>
<?php
# Form acts on its own page to check for the credentials
if (isset($_POST['login'])) {
    $uName = $_POST['username'];
    $pWord = $_POST['password'];

    # MySql Query to check for the credentials given
    $sql = mysqli_query($conn, "SELECT stud_id, username, password FROM " . $tableName . " WHERE username = '" . $uName . "' AND password = '" . $pWord . "';");
    # Fetch the Student ID, Username, and Password to assign to the session var
    $stud = mysqli_fetch_array($sql);

    # If needed variables is successfully fetched, assign the credentials to  session var
    if (is_array($stud)) {
        $_SESSION["uName"] = $stud['username'];
        $_SESSION["pWord"] = $stud['password'];
    }
    # If there is no variable fetched, then echo the error
    else {
        echo '<span style="color:red;">Invalid username or password</span>';
    }

    # Check if there is already a set Session Variable Username
    if (isset($_SESSION["uName"])) {
        # If the username is admin, then lead to admin.php
        if ($_SESSION["uName"] == "admin") {
            $_SESSION['loggedInAsAdmin'] = true;
            header("Location:admin.php");
        }
        #  If the username is not admin, then it is user.php
        else {
            $_SESSION["stud_id"] = $stud['stud_id'];
            $_SESSION['loggedInAsUser'] = true;
            header("Location:user.php");
        }
    }

}

?>
        </div>
        <div style="clear: both"></div>


    </div>
</body>

</html>
