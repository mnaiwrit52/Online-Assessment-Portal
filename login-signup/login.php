<?php
$nocred = false;
session_start();
if(isset($_POST['login'])){
    $email = $_POST['email'];
    $pwd = $_POST['pwd'];
    $hash = password_hash($pwd, PASSWORD_DEFAULT);

    $result = mysqli_query($con, "Select * from test_db.users where email = '$email' AND pwd = '$pwd'");
    $row = mysqli_fetch_array($result);

    if(is_array($row)){
        $_SESSION['name'] = $row['name'];
        $_SESSION['email'] = $row['email'];
        $_SESSION['pwd'] = $row['pwd'];
        header('location:welcome.php');
        die();
    }
    else{
        // echo "<script>alert('Invalid Credentials');</script>";
        $nocred = true;
    }
}

?>