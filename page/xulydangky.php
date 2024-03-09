<?php
$showAlert = false;
$showError = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include('../db/connect.php');

    $fullname = $_POST["reg-fullname"];
    $username = $_POST["reg-id"];
    $email = $_POST["reg-mail"];
    $phone = $_POST["reg-phone"];
    $password = $_POST["reg-pass"];
    $cpassword = $_POST["reg-cpass"];
    echo $fullname; //+ $username + $email + $password + $phone + $cpassword; // Check whether this username exists
    $existSql = "SELECT * FROM `account` WHERE username = '$username'";
    $result = mysqli_query($con, $existSql);
    $numExistRows = mysqli_num_rows($result);
    if ($numExistRows > 0) {
        $showError = "Username đã tồn tại";
        header("Location: /LV_Phones/index.php?signupsuccess=false&error=$showError");
    } else {
        if (($password == $cpassword)) {
            $hash = password_hash($password, PASSWORD_DEFAULT);
            $sql = "INSERT INTO `account` ( `fullname`, `username`, `password`, `phone`, `role`,`email`) VALUES ('$fullname',
'$username', '$hash', '$phone', '0', '$email')";
            $result = mysqli_query($con, $sql);
            if ($result) {
                $showAlert = true;
                header("Location: /LV_Phones/index.php?signupsuccess=true");
            }
        } else {
            $showError = "Mật khẩu không đúng";
            header("Location: /LV_Phones/index.php?signupsuccess=false&error=$showError");
        }
    }
}
?>