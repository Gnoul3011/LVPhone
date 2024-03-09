<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include '../db/connect.php';
    $username = $_POST["loginusername"];
    $password = $_POST["loginpassword"];
    $sql = "SELECT * FROM account WHERE username='$username'";
    $result = mysqli_query($con, $sql);
    $num = mysqli_num_rows($result);
    if ($num == 1) {
        $row = mysqli_fetch_assoc($result);
        $userId = $row['accountID'];
        $hash = $row['password'];
        // echo password_verify($password, $hash);
        if (password_verify($password, $hash)) {
            if ($row['role'] == 0) {
                session_start();
                $_SESSION['loggedin'] = true;
                $_SESSION['username'] = $username;
                $_SESSION['accountID'] = $userId;
                header("location: /LV_Phones/index.php?loginsuccess=true");
                exit();
            } elseif ($row['role'] == 1) {
                session_start();
                $_SESSION['adminloggedin'] = true;
                $_SESSION['adminname'] = $username;
                $_SESSION['accountID'] = $userId;
                header("location: /LV_Phones/admin.php?loginsuccess=true");
                exit();
            } elseif ($row['role'] == 2) {
                session_start();
                $_SESSION['staffloggedin'] = true;
                $_SESSION['staffname'] = $username;
                $_SESSION['accountID'] = $userId;
                header("location: /LV_Phones/nhanvien.php?loginsuccess=true");
                exit();
            } else {
                header("location: /LV_Phones/index.php?loginsuccess=false");
                // echo ('loi');

            }
        } else {
            header("location: /LV_Phones/index.php?loginsuccess=false");
            // echo "check mk sai";
        }
    } else {
        header("location: /LV_Phones/index.php?loginsuccess=false");
    }
}
?>