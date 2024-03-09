<?php
include('../db/connect.php');
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userId = $_SESSION['accountID'];
    if (isset($_POST['addCart'])) {
        $productId = $_POST['itemId'];
        $str_sql_product = "SELECT * FROM product WHERE productID = '$productId'";
        $product_query = mysqli_query($con, $str_sql_product);
        $product_Row = mysqli_fetch_assoc($product_query);
        $strsql = "SELECT * FROM cart WHERE productID = '$productId' AND  accountID = '$userId'";
        $query = mysqli_query($con, $strsql);
        $row = mysqli_fetch_row($query);
        $productName = $product_Row['productName'];
        $productPrice = $product_Row['productPrice'];
        $productImage = $product_Row['productImage'];
        if ($row > 0) {
            echo '<script>alert("Đã Thêm");
                    window.history.back(1);
                    </script>';
        } else {
            $sql_cre = "INSERT INTO cart(productID,productName,productImage,productPrice,cartQuantity,accountID) values ('$productId','$productName','$productImage','$productPrice','1','$userId' )";
            $queryCart = mysqli_query($con, $sql_cre);
            echo '<script>;
                    window.history.back(1);
                    </script>';
        }
    }
    if (isset($_POST['removeItem'])) {
        $productId = $_POST["itemId"];
        $sql = "DELETE FROM cart WHERE productID='$productId' AND `accountID`='$userId'";
        $result = mysqli_query($con, $sql);
        echo "<script>
                window.history.back(1);
            </script>";
    }
    if (isset($_POST['removeAll'])) {
        $sql = "DELETE FROM cart WHERE `accountID`='$userId'";
        $result = mysqli_query($con, $sql);
        echo "<script>
                window.history.back(1);
            </script>";
    }
    if (isset($_POST['add'])) {
        $productId = $_POST['productId'];
        $str = "SELECT cartQuantity FROM cart WHERE productID = $productId";
        $query = mysqli_query($con, $str);
        $row = mysqli_fetch_row($query);
        echo $row;
        // $quan = $_POST['quantity'];
        // $updatesql = "UPDATE cart SET cartQuantity='$quan' WHERE productID='$productId' AND accountID = '$userId'";
        // $updateresult = mysqli_query($con, $updatesql);
    }
    if (isset($_POST['payEnd'])) {
        echo $password = $_POST['inputPassword'];
        echo $totalPrice = $_POST['totalPrice'];
        echo $totalQuan = $_POST['totalQuan'];
        echo $address = $_POST['inputAddress'];
        $sql = "SELECT * FROM account WHERE accountID='$userId'";
        $result = mysqli_query($con, $sql);
        $num = mysqli_fetch_assoc($result);
        if (password_verify($password, $num['password'])) {
            $strIn = "INSERT INTO bill (accountID,address,totalProduct,totalPrice) VALUES ($userId,'$address',$totalQuan,$totalPrice)";
            $result = mysqli_query($con, $strIn);
            if ($result) {
                $delete = "DELETE FROM cart WHERE accountID = $userId";
                $query = mysqli_query($con, $delete);
                header("location: /LV_Phones/index.php?paysuccess=true");
                exit();
            }
        } else {
            // session_start();
            // $_SESSION['payfalse'] = false;
            header("location: /LV_Phones/cart.php?payfalse=false");
            exit();
        }
    }
    if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
        $productId = $_POST['productId'];
        $quan = $_POST['quantity'];
        $getqtyProduct = "SELECT productQuantity FROM product WHERE productID = $productId";
        $queryqty = mysqli_query($con, $getqtyProduct);
        $row = mysqli_fetch_row($queryqty);
        $Qtyproduct = $row[0];
        if ($quan <= $Qtyproduct) {
            $updatesql = "UPDATE cart SET cartQuantity='$quan' WHERE productID='$productId' AND accountID = '$userId'";
            $updateresult = mysqli_query($con, $updatesql);
        }
    }
}
