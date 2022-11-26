<?php
# Start the Session
session_start();
require_once 'connection.php';

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
    <title>OA Portal | View(Admin)</title>
    <link rel="stylesheet" href="styles.css" />
    <link rel="stylesheet" href="viewadmin.css">
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

    <div style="display:flex; justify-content:center; align-items:center; flex-direction:column">
        <h2 style="color: #ffa800; text-align:center;">VIEW EXISTING DATA</h2>
        <form action="<?=$_SERVER['PHP_SELF'];?>" method="POST" style=" display: inline-block;margin-left: auto;margin-right: auto;">
            <input style="height: 100px;width: 300px;font-size: 38px;border: 2px solid #000;transition: 0.8s ease-out; focus:outline:none;border:#ffa800 solid 2px; border-radius: 1em;" type="text" name="searchInput" placeholder="Search Student"/>
            <br />
            <br />
            <input class="div-search" style="border: none;padding: 18px 16px;font-size: 18px;color: #ffa800;background-color: #020101;cursor: pointer;transition: 0.5s;" type="submit" value="SEARCH" />
            <input class="div-search" style="border: none;padding: 18px 16px;font-size: 18px;color: #ffa800;background-color: #020101;cursor: pointer;transition: 0.5s;" name="display" type="submit" value="Display All" />
        </form>
    </div>
<?php
    if(isset($_POST['display'])){
        
        $sql = "SELECT * FROM " . $tableName . " WHERE stud_id LIKE '{2}'";
        $query = mysqli_query($conn, $sql);
    }

    if(isset($_POST['searchInput'])){
        $searchInput = $_POST['searchInput'];

        $sql = "SELECT * FROM " . $tableName . " WHERE stud_id LIKE '{$searchInput}%' OR name LIKE '{$searchInput}%' ";
        $query = mysqli_query($conn, $sql);
?>
    <?php
        # Return the values into an array called row
        if($query->num_rows > 0){
           
            while($row = $query->fetch_assoc()){
                $id = $row['stud_id'];
                $picture = $row['picture'];
                $name = $row['name'];
                $username = $row['username'];
                $department = $row['department'];
                $level = $row['level'];
                $course = $row['course'];
                $batch = $row['studbatch'];
                $gender = $row['gender'];
                $contactNum = $row['contact_num'];
                $religion = $row['religion'];
                $maritalStats = $row['mariStat'];
                $address = $row['homeAddress'];
                $email = $row['emailAddress'];
                $mother = $row['mothers_name'];
                $father = $row['fathers_name'];
                $birthday = $row['birthday'];
                $province = $row['origProvince'];
                $nationality = $row['nationality'];
                $birthplace = $row['birthPlace'];
                $contactPerson = $row['contactPerson'];
                $contactPersonRs = $row['contactPersonRs'];
                $contactPersonNum = $row['contactPersonNum'];
                if($username === 'admin')continue;
            ?>

            <table>
                <thead>
                    <tr>
                    <th>ID</th>
                    <th>Picture</th>
                    <th>Name</th>
                    <th>Username</th>
                    <th>Department</th>
                    <th>Level</th>
                    <th>Course</th>
                    <th>Student Batch</th>
                    <th>Gender</th>
                    <th>Contact Number</th>
                    <th>Religion</th>
                    <th>Marital Status</th>
                    <th>Address</th>
                    <th>Email</th>
                    <th>Mother's Name</th>
                    <th>Fathers Name</th>
                    <th>Birthday</th>
                    <th>Province</th>
                    <th>Nationality</th>
                    <th>Birth Place</th>
                    <th>Contact Person</th>
                    <th>Contact Person Relationship</th>
                    <th>Contact Person Number</th>
                    </tr>
                </thead>
                <tbody>
                   
                    <tr>

                   
                        <td><?php echo $id;?></td>
                        <td><?php echo "<img class=\"picture\" src =\"$picture\" style=\"width:150px; height:150px; border-radius:50%\"/>";?></td>
                        <td><?php echo $name;?></td>
                        <td><?php echo $username;?></td>
                        <td><?php echo $department;?></td>
                        <td><?php echo $level;?></td>
                        <td><?php echo $course;?></td>
                        <td><?php echo $batch;?></td>
                        <td><?php echo $gender;?></td>
                        <td><?php echo $contactNum;?></td>
                        <td><?php echo $religion;?></td>
                        <td><?php echo $maritalStats;?></td>
                        <td><?php echo $address;?></td>
                        <td><?php echo $email;?></td>
                        <td><?php echo $mother;?></td>
                        <td><?php echo $father;?></td>
                        <td><?php echo $birthday;?></td>
                        <td><?php echo $province;?></td>
                        <td><?php echo $nationality;?></td>
                        <td><?php echo $birthplace;?></td>
                        <td><?php echo $contactPerson;?></td>
                        <td><?php echo $contactPersonRs;?></td>
                        <td><?php echo $contactPersonNum;?></td>
                     
                    </tr>
                </tbody>
            </table>
         
         <?php
         }
        }else{
            echo 'Not Found';
        }
        
    }
?>