<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Desk</title>
    <link rel="stylesheet" href="layout.css">
    <link rel="stylesheet" href="navigation.css">
    <script>
      session_start();
$_SESSION['stud_id'] = $stud_id; // Assuming $stud_id is retrieved after login

function validateForm() {
    var phone = document.getElementById("stud_phno").value;
    var regNum = document.getElementById("stud_id").value;
    
    // Check if phone number contains exactly 10 digits
    if (!/^\d{10}$/.test(phone)) {
        alert("Phone number must contain exactly 10 digits.");
        return false;
    }
    return true; // Allow form submission if validation passes
}
</script>


</head>

<body>
  <div class="main_container" id="home">

  <div class="navbar">
      <div class="logo">
      <a href="#">Student Performance Tracker</a>
    </div>
        <div class="navbar_items">
        <ul>
        
          <li><a href="home.php">CONTACT US</a></li>
          <li><a href="stud_login.php">STUDENT</a></li>
          <li><a href="home.php">HOME</a></li>
        </ul>
        </div>
  </div>
   <div class="hero">
        <div class="form-box">
            <div class="button-box">
                <div id="btn"></div>
                <button type="button" class="toggle-btn" onclick="login()">Login</button>
                <button type="button" class="toggle-btn" onclick="register()">Register</button>
            </div>
                <form id="login" class="input-group" action="validation_s.php" method="post">
                      <input type="text" name="stud_id" id="stud_id" class="input-field" placeholder="User Id" required> 
                      <input type="password" name="stud_password" id="stud_password" class="input-field" placeholder="Enter Password" required>
                      <input type="checkbox" class="chech-box"><span>Remember Password</span>
                      <button type="submit" class="submit-btn"> Login </button>
                </form>
               <form id="register" class="input-groupss" action="reg_s.php" method="post" onsubmit="return validateForm()">
                      <input type="text" name="stud_name" id="stud_name" class="input-field" placeholder="Student Name" required>
                      <input type="text" name="stud_id" id="stud_id" class="input-field" placeholder="Register Number" required>
                      <select name="stud_year" id="stud_year" class="input-field" required>
                          <option value="">Studying Year</option>
                          <option value="1">1</option>
                          <option value="2">2</option>
                      </select>
                      <select name="stud_sem" id="stud_sem" class="input-field" required>
                          <option value="">Semester</option>
                          <option value="1">1</option>
                          <option value="2">2</option>
                          <option value="3">3</option>
                          <option value="4">4</option>
                      </select>
                      <select name="stud_dept" id="stud_dept" class="input-field" required>
                          <option value="">Department</option>
                          <option value="MCA">MCA</option>
                          <option value="MSc Computer Science">MSc Computer Science</option>
                          <option value="MTech">MTech</option>
                      </select>
                          <input type="email" name="stud_email" id="stud_email" class="input-field" placeholder="Email" required> 
                          <input type="text" name="stud_phno" id="stud_phno" class="input-field" placeholder="Contact No" required>
                          <input type="password" name="stud_password" id="stud_password" class="input-field" placeholder="Enter Password" required>
                          <button type="submit" class="submit-btn"> Regiser </button>
                </form>
      

<script>
    var x = document.getElementById("login");
    var y = document.getElementById("register");
    var z = document.getElementById("btn");
    function register() {
    x.style.left = "-400px";
    y.style.left= "50px";
    z.style.left = "110px";
}
    function login() {
    x.style.left = "50px";
    y.style.left= "450px";
    z.style.left = "0px";
}
</script>

</body>

</html>