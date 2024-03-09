<?php 
    include('../db/connect.php');
    session_start();
    $userId = $_SESSION['accountID'];
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if(isset($_POST['profile-button'])){
            $fullname = $_POST['fullname'];
            $email= $_POST['email'];
            $phone = $_POST['phone'];
            $address = $_POST['address'];
            $username = $_POST['username'];
            // echo ("$fullname + $email +$address + $phone");
            $str = "UPDATE account SET `fullname`='$fullname',`username`='$username',`phone`='$phone',`email`='$email',`address`='$address' WHERE accountID= $userId";
            $query = mysqli_query($con, $str);
            echo '<script>;window.history.back(1);</script>';

        };
    }
?>