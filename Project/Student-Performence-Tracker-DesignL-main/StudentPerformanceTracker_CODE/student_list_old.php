<?php
session_start();
if (!isset($_SESSION['teacher_logged_in'])) {
    header("Location: login.php"); // Redirect if not logged in
    exit();
}

$con = mysqli_connect("localhost", "root", "", "spt");
$stud_dept = $_POST['stud_dept'];

$query = "SELECT stud_id, stud_name FROM student_login WHERE stud_dept = '$stud_dept'";
$result = mysqli_query($con, $query);
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student List</title>
    <link rel="stylesheet" href="layout.css"> <!-- Include your CSS -->
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

        <div class="banner_image form-box">
            <h2>Students in <?php echo htmlspecialchars($stud_dept); ?></h2>
            <ul>
                <?php
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<li><a href='teacher_portal.php?stud_id={$row['stud_id']}'>{$row['stud_name']}</a></li>";
                }
                ?>
            </ul>
        </div>
    </div>
</body>

</html>
