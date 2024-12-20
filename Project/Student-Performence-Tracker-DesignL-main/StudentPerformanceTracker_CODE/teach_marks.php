<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher Portal</title>
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
			    <li><a href="teach_login.php">TEACHER</a></li>
			    <li><a href="home.php">HOME</a></li>
			  </ul>
		    </div>
	</div> 
<div class="banner_image">
        <div class="form-box">
        	<div class="button-box">
                <div>
                <h2><center>Update Marks</center></h2></div>
                </div>
	<form method="POST">
		<input type="text" name="stud_id" id="stud_name" class="input-field" placeholder="Enter Student ID" required>
		<input type="text" name="sub_id" id="stud_name" class="input-field" placeholder="Enter Subject ID" required>
		<div>
		<select name="Semester" id="Semester" class="input-field" required>
                          <option value="">Semester</option>
                          <option value="1">1</option>
                          <option value="2">2</option>
                          <option value="3">3</option>
                          <option value="4">4</option>
                      </select>
		</div>
		<input type="number" name="total" id="total" class="input-field" placeholder="Enter Total Marks" required>
		<input type="number" name="marks" id="marks" class="input-field" placeholder="Enter Marks" required>
		<div>
        <button type="submit" name="submit" value="Submit" class="submit-btn"> Submit </button>
        </div>
	</form>


	<!-- Create/Insert data into db  -->
	<?php
	$host = 'localhost';  
	$username = 'root';  
	$password = '';
	$dbname='spt';
	$conn=mysqli_connect ($host , $username , $password) or die("unable to connect to host");  
	mysqli_select_db ($conn,"spt") or die("unable to connect to database");
	if (isset($_POST['submit'])) {
		$stud_id = $_POST['stud_id'];
		$sub_id = $_POST['sub_id'];
		$Semester = $_POST['Semester'];
		$total = $_POST['total'];
		$marks = $_POST['marks'];

		//checking before inserting is it exist in db or not
		$sql = "SELECT * FROM `result` WHERE stud_id='$stud_id' AND sub_id='$sub_id' AND Semester='$Semester'";
		$result = $conn->query($sql);

		//if these not exist then create
		if ($result->num_rows ==0) {
			// output data of each row

			$sql = "INSERT INTO result (stud_id, sub_id, Semester, total, marks)VALUES ('$stud_id', '$sub_id', '$Semester', '$total', '$marks')";
			if ($conn->query($sql) === TRUE)
				echo "<script>alert('submitted successfully')</script>";
			else
				echo "<script>alert('not submitted')</script>";
		} else {
			echo "<script>alert('Already updated')</script>";
		}
	}
	?>


</body>

</html>