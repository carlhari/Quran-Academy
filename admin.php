<?php
# Start the Session
session_start();

#  Check if the person logged in is not the Admin, then if not return to login.php
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
    <title>Ouran Academy Portal</title>
    <link rel="stylesheet" href="styles.css" />
    <link rel="shortcut icon" type="image/x-icon" href="images/ouran-logo.png" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <div class="header">
        <div class="header-school">
            <p class="header-title"><b>OURAN</b></p>
            <a href="#"><img class="header-logo" src="images/ouran-logo.png" /></a>
            <p class="header-title"><b>ACADEMY</b></p>
        </div>
        <div class="header-menu">
            <span class="menu"><b>MAIN MENU</b></span>
            <a href="logout.php" class="logout">LOGOUT</a>
        </div>
    </div>
    <div>
        <h2 class="username"><?php echo '<span class="processText">' . $_SESSION['uName'] . '</span> Connected <span style="color: Green">successfully. </span>' ?></h2>
        <div class="buttons">
            <div class="button-set">
                <a href="enroll.php"><i class="fa-solid fa-file-circle-plus"></i></i>Enroll</a>
                <a href="update.php"><i class="fa-solid fa-file-circle-check"></i></i>Update Existing Data</a>
                <a href="viewAdmin.php"><i class="fa-solid fa-id-card-clip"></i></i>View Existing Data</a>
            </div>
        </div>
    </div>
    <div class="footer">
        <p>ALL RIGHTS RESERVED 2022 | SYBIL SYSTEM</p>
    </div>
</body>

</html>
