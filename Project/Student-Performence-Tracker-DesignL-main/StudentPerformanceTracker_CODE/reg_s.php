<?php
error_reporting(0);
header('location:stud_login.php');
session_start();
$con = mysqli_connect('localhost', 'root');
if ($con) {
    mysqli_select_db($con, 'spt');
    $stud_name = $_POST['stud_name'];
    $stud_id = $_POST['stud_id'];
    $stud_year = $_POST['stud_year'];
    $stud_sem = $_POST['stud_sem'];
    $stud_dept = $_POST['stud_dept'];
    $stud_phno = $_POST['stud_phno'];
    $stud_email = $_POST['stud_email'];
    $stud_password = $_POST['stud_password'];

    // Validate that stud_phno contains exactly 10 digits
    if (!preg_match('/^\d{10}$/', $stud_phno)) {
        echo "Phone number must contain exactly 10 digits.";
        exit;
    }

    $sql = "SELECT * FROM `spt`.`student_login` WHERE `stud_email` = '$stud_email' AND `stud_password` = '$stud_password'";
    $result = mysqli_query($con, $sql);
    $num = $result->num_rows;

    if ($num == 1) {
        echo "Duplicate data";
    } else {
        $qy = "INSERT INTO `spt`.`student_login` 
        (`stud_id`, `stud_name`, `stud_year`, `stud_sem`, `stud_dept`, `stud_phno`, `stud_email`, `stud_password`) 
        VALUES ('$stud_id', '$stud_name', '$stud_year', '$stud_sem', '$stud_dept', '$stud_phno', '$stud_email', '$stud_password')";
        mysqli_query($con, $qy);
    }
} else {
    echo "Connection error";
}
?>
