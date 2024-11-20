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

        /* Navigation Bar */
        .navbar {
            width: 100%;
            height: 65px;
            display: flex;
            justify-content: space-around;
            align-items: center;
            background-color: #333;
            position: fixed; /* Make the navbar fixed */
            top: 0; /* Stick it to the top */
            z-index: 1000; /* Ensure it stays above other content */
        }

        .logo a {
            font-family: 'Allura', cursive;
            font-size: 32px;
            color: #ffff00;
            text-decoration: none;
        }

        .navbar_items ul {
            display: flex;
        }

        .navbar_items ul li {
            margin: 0 15px;
        }

        .navbar_items ul li a {
            text-transform: uppercase;
            color: #ffff00;
            text-decoration: none;
            transition: color 0.3s;
        }

        .navbar_items ul li a:hover {
            color: #ffad06;
        }

        /* Background Image */
        body {
            background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url(note.jpg);
            background-position: center;
            background-size: cover;
            height: 100vh; /* Full height */
            display: flex;
            justify-content: center;
            align-items: center;
            padding-top: 65px; /* Adjust for navbar height */
        }

        /* Main Content Box */
        .form-box {
            width: 40%; /* Adjust as necessary */
            background: #ffffff;
            padding: 10px;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.5);
            justify-content: center;
        }

        h2 {
            color: #f76605;
            margin-bottom: 20px;
        }

        ul {
            list-style-type: none;
            padding: 20;
            justify-content: center;

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

        /* Responsive Design */
        @media (max-width: 768px) {
            .form-box {
                width: 80%; /* Make it responsive on smaller screens */
            }

            .navbar {
                flex-direction: column;
                align-items: center;
                height: auto;
            }

            .navbar_items ul {
                flex-direction: column;
                align-items: center;
            }

            .navbar_items ul li {
                margin: 10px 0;
            }
        }
    </style>
</head>

<body>
    <div class="navbar">
        <div class="logo">
            <a href="#">Student Performance Tracker</a>
        </div>
        <div class="navbar_items">
            <ul>
                <li><a href="logout.php">Logout</a></li>
                <li><a href="home.php">Contact Us</a></li>
                <li><a href="stud_login.php">Student</a></li>
                <li><a href="home.php">Home</a></li>
            </ul>
        </div>
    </div>

    <div class="form-box">
        <h2>Students in <?php echo htmlspecialchars($stud_dept); ?></h2>
        <ul>
            <?php
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<li><a href='teach_portal.php?stud_id={$row['stud_id']}'>{$row['stud_name']}</a></li>";
            }
            ?>
        </ul>
    </div>
</body>

</html>
