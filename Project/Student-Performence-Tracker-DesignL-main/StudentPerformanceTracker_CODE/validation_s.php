
<?php
error_reporting(0);
// header('location:home.php');
session_start();
$con = mysqli_connect('localhost', 'root');
if ($con) {
    // echo "connection successfull";

    mysqli_select_db($con, 'spt');
    $stud_id = $_POST['stud_id'];
    $stud_password = $_POST['stud_password'];

    $sql = "select * from `spt`.`student_login` where `stud_id` = '$stud_id' and `stud_password` = '$stud_password'";
    $result = mysqli_query($con, $sql);

    // $num = mqsqli_num_rows($result);
    $num = $result->num_rows;

    if ($num == 1) {
        //echo "Successfully login";
        header('location:stud_portal.php');
    } else {
        header('location:stud_login.php');
    }
} else {
    echo "no connection";
}

?>