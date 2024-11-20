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
    <link rel="stylesheet" href="navigation.css">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Josefin Sans', sans-serif;
        }

        .main_container {
            position: relative;
        }

        /* Navigation Bar */
        .navbar {
            width: 100%;
            height: 65px;
            display: flex;
            justify-content: space-around;
            align-items: center;
        }

        .logo a {
            font-family: 'Allura', cursive;
            font-size: 32px;
            color: #ffff00;
        }

        .navbar_items ul {
            display: flex;
        }

        .navbar_items ul li {
            margin: 0 5px;
        }

        .navbar_items ul li a {
            text-transform: uppercase;
            color: #ffff00;
        }

        .banner_image {
            height: 100%;
            width: 100%;
            background-image: linear-gradient(rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.4)), url(note.jpg);
            background-position: center;
            background-size: cover;
            position: relative;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .form-box {
            width: 25%;
            height: 70%;
            position: relative;
            margin: 6% auto;
            background: #ffffff;
            padding: 5px;
            overflow: hidden;
        }

        h2 {
            color: #f76605;
            margin-bottom: 20px;
        }

        ul {
            list-style-type: none;
            padding: 0;
        }

        li {
            margin: 10px 0;
        }

        a {
            color: #ff1e5f;
            text-decoration: none;
            font-size: 18px;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
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
