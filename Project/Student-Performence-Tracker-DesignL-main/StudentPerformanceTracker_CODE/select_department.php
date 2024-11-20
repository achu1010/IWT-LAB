<?php
session_start();
if (!isset($_SESSION['teacher_logged_in'])) {
    header("Location: login.php"); // Redirect if not logged in
    exit();
}

$con = mysqli_connect("localhost", "root", "", "spt");
$query = "SELECT DISTINCT stud_dept FROM student_login";
$result = mysqli_query($con, $query);
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Select Department</title>
    <link rel="stylesheet" href="design.css"> <!-- Include your CSS -->
    <link rel="stylesheet" href="navigation.css">
</head>

<body>
    <div class="main_container" id="home">
        <div class="navbar">
            <div class="logo">
                <a href="#">Student Performance Tracker</a>
            </div>
            <div class="navbar_items">
                <ul>
                    <li><a href="logout.php">Logout</a></li>
                    <li><a href="home.php">CONTACT US</a></li>
                    <li><a href="stud_login.php">STUDENT</a></li>
                    <li><a href="home.php">HOME</a></li>
                </ul>
            </div>
        </div>

        <div class="banner_image">
            <div class="form-box">
                <div class="button-box">
                    <h2><center>Select Department</center></h2>
                </div>
                <form method="POST" action="student_list.php">
                    <select name="stud_dept" required class="input-field"> <!-- Add class for styling -->
                        <?php
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<option value='{$row['stud_dept']}'>{$row['stud_dept']}</option>";
                        }
                        ?>
                    </select>
                    <div>
                        <button type="submit" class="submit-btn">View Students</button> <!-- Button styling -->
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
