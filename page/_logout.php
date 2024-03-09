<?php
session_start();
echo "Tạm biệt bạn tôi....";
unset($_SESSION["loggedin"]);
unset($_SESSION["username"]);
unset($_SESSION["accountID"]);

// session_unset();
// session_destroy();

header("location: /LV_Phones/index.php");
?>