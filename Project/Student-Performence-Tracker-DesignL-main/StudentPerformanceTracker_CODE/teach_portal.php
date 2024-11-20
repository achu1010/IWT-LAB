<!--DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher Portal</title>
    <link rel="stylesheet" href="portal.css">
</head>
<body>
	<Welcome-->
    <!--div class="main_container" id="home">
	
	<div class="navbar">
		<div class="logo">
			<a href="#">Student Performance Tracker</a>
		</div>
		<div class="navbar_items">
			<ul>
			</li><li><a href="home.php">HOME</a></li>
				<li><a href="teach_login.php">Teacher</a></li>
			    <li><a href="home.php">Contact Us</a></li>
			    <li><a href="logout.php">Logout</a>
			</ul>
		</div>
	</div>

	<div class="banner_image">
	<button type="submit" onclick="location.href='teach_attendance.php'"class="submit-btn bb1" ><b>UPDATE ATTENDANCE</b></button>
	<button type="submit" onclick="location.href='teach_marks.php'" class="submit-btn bb2"><b>UPDATE MARKS</b></button>
	</div>
	<div class="banner_image">
	<button type="submit" onclick="location.href='stud_attendance.php'" class="submit-btn bb1"><b>VIEW ATTENDANCE</b></button>  
	<button type="submit" onclick="location.href='stud_marks.php'" class="submit-btn bb2"><b>VIEW RESULT</b></button>
	</div>
</div>
</body>
</html-->
<?php
session_start();
if (!isset($_SESSION['teacher_logged_in'])) {
    header("Location: login.php");
    exit();
}

$con = mysqli_connect("localhost", "root", "", "spt");
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

// Get the student ID from the URL
if (isset($_GET['stud_id'])) {
    $stud_id = $_GET['stud_id'];

    // Use prepared statements to avoid SQL injection
    $stmt = $con->prepare("SELECT stud_name, stud_dept FROM student_login WHERE stud_id = ?");
    $stmt->bind_param("i", $stud_id);
    $stmt->execute();
    $result = $stmt->get_result();

    // Fetch student data
    $student = $result->fetch_assoc();
} else {
    die("Student ID not provided.");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher Portal</title>
    <link rel="stylesheet" href="portal.css">
</head>
<body>
    <div class="main_container" id="home">
        <div class="navbar">
            <div class="logo">
                <a href="#">Student Performance Tracker</a>
            </div>
            <div class="navbar_items">
                <ul>
                    <li><a href="home.php">HOME</a></li>
                    <li><a href="teach_login.php">Teacher</a></li>
                    <li><a href="home.php">Contact Us</a></li>
                    <li><a href="logout.php">Logout</a></li>
                </ul>
            </div>
        </div>

        <h2>Student Information</h2>
        <?php if ($student): ?>
            <p>Name: <?php echo htmlspecialchars($student['stud_name']); ?></p>
            <p>Department: <?php echo htmlspecialchars($student['stud_dept']); ?></p>
        <?php else: ?>
            <p>No student found.</p>
        <?php endif; ?>

        <div class="banner_image">
            <button type="button" onclick="location.href='teach_attendance.php'" class="submit-btn bb1"><b>UPDATE ATTENDANCE</b></button>
            <button type="button" onclick="location.href='teach_marks.php'" class="submit-btn bb2"><b>UPDATE MARKS</b></button>
        </div>
        <div class="banner_image">
            <button type="button" onclick="location.href='stud_attendance.php'" class="submit-btn bb1"><b>VIEW ATTENDANCE</b></button>
            <button type="button" onclick="location.href='stud_marks.php'" class="submit-btn bb2"><b>VIEW RESULT</b></button>
        </div>
    </div>
</body>
</html>
