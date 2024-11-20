<html>
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Portal</title>
    <link rel="stylesheet" href="chart.css">
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
                <li><a href="admin_login.php">ADMIN</a></li>
                <li><a href="home.php">HOME</a></li>
              </ul>
            </div>
    </div> 
    <div class="banner_image">
        <div class="form-box">
          <div class="button-box">
                <div>
                <h2><center>Teacher Details</center></h2></div>
                </div>
<?php

# Init the MySQL Connection
$con = mysqli_connect("localhost", "root", "", "spt");
if ($con) {
    echo "";
} else {
    echo "Connection Error...";
}

# Prepare the SELECT Query
$selectSQL = "SELECT * FROM `teacher_login`";
# Execute the SELECT Query
if (!($selectRes = mysqli_query($con, $selectSQL))) {
    echo " ";
} else {
?><style>
.form-box {
    width: 80%; /* Adjust width to fit table */
    max-width: 800px;
    height: auto;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    background: #ffffff;
    padding: 40px; /* Extra padding */
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
    border-radius: 15px;
    overflow: hidden; /* Ensures content stays inside */
}

table {
    width: 95%; /* Slightly narrower */
    margin: 0 auto; /* Center table inside form-box */
    border-collapse: collapse;
}

th, td {
    padding: 12px; /* Increase padding for readability */
    text-align: left;
}

th {
    background-color: #04AA6D;
    color: white;
}

tr:nth-child(even) {
    background-color: #f2f2f2;
}

</style>
 <!--    <h2>Teacher Details</h2> -->
    <table border="2">
        <thead>
            <tr>
                <th>Name</th>
                <th>Subject Code</th>
                <th>Subject Name</th>
                <th>Phone No.</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if (mysqli_num_rows($selectRes) == 0) {
                echo '<tr><td colspan="4">No Rows Returned</td></tr>';
            } else {
                while ($row = mysqli_fetch_assoc($selectRes)) {
                    echo "<tr><td>{$row['t_name']}</td><td>{$row['sub_id']}</td><td>{$row['sub_name']}</td>
                    <td>{$row['t_phno']}</td><td>{$row['t_email']}</td></tr>\n";
                }
            }
            ?>
        </tbody>
    </table>
<?php
}

?>
</div>
</div>
</body>
</html>