<html>
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Student Portal</title>
<link rel="stylesheet" href="chart.css">
<link rel="stylesheet" href="navigation.css">
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
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
        <h2><center>Marks Chart</center></h2>
      </div>

      <form method="POST" action="marks_chart.php">
        <input type="text" name="stud_id" placeholder="Student id" required>
        <input type="text" name="sub_id" placeholder="Subject Code" required>
        <button type="submit">Fetch Marks</button>
      </form>

      <?php
      session_start(); // Start session to retrieve student ID
      $con = mysqli_connect("localhost", "root", "", "spt");
      if(!$con){
          echo "Connection Error...";
          exit();
      }

      if ($_SERVER['REQUEST_METHOD'] === 'POST') {
          $stud_id = $_POST['stud_id'];
          $sub_id = $_POST['sub_id'];

          // Fetch data from database
          $sql = "SELECT * FROM `result` WHERE stud_id='$stud_id' AND sub_id='$sub_id'";
          $fire = mysqli_query($con, $sql);
      ?>

      <h3>Marks Table</h3>
      <div>
        <button onclick="showTable()">Table</button>
        <button onclick="showChart()">Graph</button>
      </div>

      <div id="marksTable" style="display:block;"> <!-- Show table by default -->
        <table border="1" style="width:100%">
          <tr>
            <th>Subject Code</th>
            <th>Total Marks</th>
            <th>Marks Obtained</th>
          </tr>
          <?php
          while ($result = mysqli_fetch_assoc($fire)) {
            echo "<tr><td>{$result['sub_id']}</td><td>{$result['total']}</td><td>{$result['marks']}</td></tr>";
          }
          ?>
        </table>
      </div>

      <div id="chart_div" style="display:none;"></div> <!-- Hide chart by default -->

      <script>
      google.charts.load('current', { packages: ['corechart'] });
      google.charts.setOnLoadCallback(drawLineChart);

      function drawLineChart() {
        var data = google.visualization.arrayToDataTable([
          ['Semester', 'Marks'],
          <?php
          $sem_sql = "SELECT Semester, SUM(marks) as total_marks FROM `result` WHERE stud_id='$stud_id' GROUP BY Semester ORDER BY Semester";
          $sem_result = mysqli_query($con, $sem_sql);
          while ($row = mysqli_fetch_assoc($sem_result)) {
            echo "['Semester " . $row['Semester'] . "', " . $row['total_marks'] . "],";
          }
          ?>
        ]);

        var options = {
          title: 'Progress Over Semesters',
          hAxis: { title: 'Semester' },
          vAxis: { title: 'Total Marks' },
          curveType: 'function'
        };

        var chart = new google.visualization.LineChart(document.getElementById('chart_div'));
        chart.draw(data, options);
      }

      function showTable() {
        document.getElementById('marksTable').style.display = 'block';
        document.getElementById('chart_div').style.display = 'none';
      }

      function showChart() {
        document.getElementById('marksTable').style.display = 'none';
        document.getElementById('chart_div').style.display = 'block';
      }
      </script>

      <?php
      } // End of if POST
      ?>
    </div>
  </div>
</body>
</html>
