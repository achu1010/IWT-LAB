
<?php
/*error_reporting(0);
// header('location:home.php');
session_start();
$con = mysqli_connect('localhost', 'root');
if ($con) {
    // echo "connection successfull";

    mysqli_select_db($con, 'spt');
    $t_email = $_POST['t_email'];
    $t_password = $_POST['t_password'];

    $sql = "select * from `spt`.`teacher_login` where `t_email` = '$t_email' and `t_password` = '$t_password'";
    $result = mysqli_query($con, $sql);

    // $num = mqsqli_num_rows($result);
    $num = $result->num_rows;

    if ($num == 1) {
        echo "Successfully login";
        header('location:teach_portal.php');
    } else {
        header('location:teach_login.php');
    }
} else {
    echo "no connection";
}
*/

error_reporting(0);
session_start();
$con = mysqli_connect('localhost', 'root');
if ($con) {
    mysqli_select_db($con, 'spt');
    
    $t_email = $_POST['t_email'];
    $t_password = $_POST['t_password'];

    $sql = "SELECT * FROM `spt`.`teacher_login` WHERE `t_email` = '$t_email' AND `t_password` = '$t_password'";
    $result = mysqli_query($con, $sql);

    $num = $result->num_rows;

    if ($num == 1) {
        $_SESSION['teacher_logged_in'] = true; // Optional: set a session variable
        header('Location: select_department.php'); // Corrected location header
        exit();
    } else {
        header('Location: teach_login.php');
        exit();
    }
} else {
    echo "No connection";
}

?> 