<?php
   include('db/connect.php');
$getqtyProduct = "SELECT productQuantity FROM product WHERE productID = 58";
$queryqty = mysqli_query($con, $getqtyProduct);
$row = mysqli_fetch_row($queryqty);
echo $row[0];
?>