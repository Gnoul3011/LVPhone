<?php
include('../db/connect.php');
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['addPro'])) {
        $namePro = $_POST['name'];
        $detailPro = $_POST['desc'];
        $pricePro = $_POST['price'];
        $qtyPro = $_POST['quantity'];
        $cateID = $_POST['categoryId'];
        // echo "$namePro $detailPro  $pricePro $qtyPro  $cateID ";
        $str_query = "INSERT INTO product(`categoryID`, `productName`, `productPrice`, `productQuantity`, `productDetail`) 
                        VALUES ('$cateID','$namePro','$pricePro','$qtyPro' ,'$detailPro')";
        $query = mysqli_query($con, $str_query);
        $proID = $con->insert_id;
        if ($query) {
            $check = getimagesize($_FILES["img"]["tmp_name"]);
            if ($check != false) {
                $newname = "phone-$proID";
                $newfile = "$newname.jpg";
                $targetdir = $_SERVER['DOCUMENT_ROOT'] . '/LV_Phones/images/';
                $targetfile = "$targetdir$newfile";
                if (move_uploaded_file($_FILES["img"]["tmp_name"], $targetfile)) {
                    $str_query = "UPDATE `product` SET `productImage`='$newfile' WHERE productID = $proID";
                    $query = mysqli_query($con, $str_query);
                    if ($query) {
                        echo "<script>alert('dat ten Thành công');
                            window.location=document.referrer;
                            </script>";
                    }
                } else {
                    echo "<script>alert('chuyển không thành công');
                        window.location=document.referrer;
                    </script>";
                }
            } else {
                echo "<script>alert('Chọn lại hình sản phẩm');
                    window.location=document.referrer;
                </script>";
            }
        } else {
            echo "<script>alert('Truy vấn không thành công');
                    window.location=document.referrer;
                </script>";
        }
    }
    if (isset($_POST['delPro'])) {
        $proID = $_POST['proId'];
        // echo $proID;
        $str_query = "DELETE FROM product WHERE productID = $proID";
        $query = mysqli_query($con, $str_query);
        if ($query) {
            echo "<script>alert('Thành công');
            window.location=document.referrer;
        </script>";
        } else {
            echo "
            <script>alert('không thành công');
            window.location=document.referrer;
        </script>";
        }
    }
}
