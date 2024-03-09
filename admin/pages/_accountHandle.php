<?php
include('../db/connect.php');
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (isset($_POST['DelAcc'])) {
        $accountID = $_POST['AccId'];
        $qtr = "DELETE FROM `account` WHERE `accountID` = $accountID";
        $query = mysqli_query($con, $qtr);
        header('location: http://localhost/LV_Phones/admin/index.php?chon=t&id=6');
    }
    if (isset($_POST['cateadd'])) {
        $cate = $_POST['nameCate'];
        $qtr = "INSERT INTO category(`categoryName`) VALUES ('$cate')";
        $query = mysqli_query($con, $qtr);
        header('location: http://localhost/LV_Phones/admin/index.php?chon=t&id=3');
    }
}
