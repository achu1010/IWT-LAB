<html>

<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Portal</title>
    <link rel="stylesheet" href="design.css">
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
                    <h2><center>View Subject Result Across Semesters</center></h2>
                </div>
	            <form method="POST" action="marks_chart.php">
    <!-- Hidden student ID field for the logged-in student -->
    <input type="text" name="stud_id" value="<?php echo $_SESSION['stud_id']; ?>">

    <!-- Input field for subject ID -->
    <div>
        <input type="text" name="sub_id" class="input-field" placeholder="Enter Subject ID" required>
    </div>

    <!-- Submit button -->
    <div>
        <button type="submit" name="submit" value="Submit" class="submit-btn">Submit</button>
    </div>
</form>


            </div>
        </div>
    </div>
</body>

</html>
