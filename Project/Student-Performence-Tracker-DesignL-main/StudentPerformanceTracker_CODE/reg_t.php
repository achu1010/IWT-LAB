<?php
error_reporting(0);
header('location:teach_login.php');
session_start();
$con = mysqli_connect('localhost', 'root');
if ($con) {
    // echo "connection successul";
    mysqli_select_db($con, 'spt');
    $t_name = $_POST['t_name'];
    $sub_id = $_POST['sub_id'];
    $sub_name = $_POST['sub_name'];
    $t_phno = $_POST['t_phno'];
    $t_email = $_POST['t_email'];
    $t_password = $_POST['t_password'];

    if (!preg_match('/^\d{10}$/', $t_phno)) {
        echo "Phone number must contain exactly 10 digits.";
        exit;
    }  

    $sql = "SELECT * FROM `spt`.`teacher_login` where `t_email` = '$t_email' AND `t_password` = '$t_password'";
    $result = mysqli_query($con, $sql);
    $num = $result->num_rows;

    if ($num == 1) {
        echo "duplicate data";
        
    } else {
        $qy = "INSERT INTO `spt`.`teacher_login`
        (`t_name`,`sub_id`,`sub_name`,`t_phno`,`t_email`,`t_password`) 
        values('$t_name','$sub_id','$sub_name','t_phno','$t_email','$t_password')";
        mysqli_query($con, $qy);
    }
} else {
    echo "connection error";
}
?>