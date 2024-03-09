<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LV_Phones</title>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>LV_Phones</title>
    <link rel="stylesheet" href="./css/style.css" />
    <link rel="stylesheet" href="./css/grid.css">
    <link rel="stylesheet" href="./css/lib/flickity.css" media="screen">
    <link rel="stylesheet" href="./font/fontawesome-free-6.3.0-web/css/all.min.css" />
    <link rel="stylesheet" href="css/lib/bootstrap.min.css" />
    <script src="js/lib/jquery.min.js"></script>
    <script src="js/lib/popper.min.js"></script>
    <script src="js/lib/bootstrap.min.js"></script>
</head>

<body>
    <?php
    include('db/connect.php');
    require('inc/header.php');
    if (isset($_GET['payfalse']) && $_GET['payfalse'] == "false") {
        echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                  <strong>chưa thanh toán được .</strong>
                  <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span></button>
                </div>';
    }
    ?>
    <div id="cart">
        <div class="container">
            <?php
            if ($loggedin) {
            ?>
                <h2 class="title text-center">Giỏ hàng</h2>
                <div class="cart_form ">
                    <div class="cart_detail card col-lg-8">
                        <div class="cart_detail-item row  cartnav justify-content-center  align-items-center">
                            <span class="no col">STT</span>
                            <div class="img col">
                                <span class="nameimg">Ảnh</span>
                            </div>
                            <div class="info col-3">
                                <span class="">thông tin</span>

                            </div>
                            <div class="quantitybox col-2">
                                <span class="quantity">số lượng</span>
                            </div>
                            <div class="total col-3">
                                <span class="total">tổng</span>
                            </div>
                            <div class="col-2">
                                <form action="page/xulygiohang.php" method="POST" onsubmit="return confirm('ban co muon xoa het')">
                                    <button name="removeAll" class="btn btn-sm btn-outline-danger">Xóa Tất
                                        Cả</button>
                                    <input type="hidden" name="userId" value="<?php $userId = $_SESSION['accountID'];
                                                                                echo $userId ?>">
                                </form>
                            </div>
                        </div>
                        <?php
                        $userId = $_SESSION['accountID'];
                        $str = "SELECT * FROM cart WHERE accountID = '$userId'";
                        $query = mysqli_query($con, $str);
                        $count = 0;
                        $totalPrice = 0;
                        $totalQuan = 0;
                        while ($cartquery = mysqli_fetch_assoc($query)) {

                            $productId = $cartquery['productID'];
                            $productName = $cartquery['productName'];
                            $productImage = $cartquery['productImage'];
                            $productPrice = $cartquery['productPrice'];
                            $productQuan = $cartquery['cartQuantity'];
                            $count++;
                            $total = $productPrice * $productQuan;
                            $totalPrice = $totalPrice + $total;
                            $totalQuan = $totalQuan + $productQuan;
                            echo "
                            <div class='cart_detail-item row align-items-center'>
                            <span class='no col'>$count</span>
                            <div class='img col'>
                                <img src='images/$productImage' alt=''>
                            </div>
                            <div class='info col-3'>
                                <span class='name'>$productName</span>
                                <p class='price'>$productPrice.VND</p>
                            </div>
                            <form id='quan$productId'  class='quantitybox col-2 ' >
                                <input type='hidden' name='productId' value='$productId'>
                                <input type='number' name='quantity' value='$productQuan' onchange='updateCart($productId)' class='text-center'  onkeyup='return false'  min=1 oninput='check(this)' onClick='this.select();'>
                            </form>
                            <div class='total col-3'>
                                $total.VND
                            </div>
                            <div class='col-2'>
                            <form action='page/xulygiohang.php' method='POST' onsubmit='return delitem()'>
                                <button name='removeItem' class='btn btn-sm btn-outline-danger'>Xóa</button>
                                <input type='hidden' name='itemId' value='$productId'>
                            </form></div>
                        </div> ";
                        }
                        ?>
                        <!-- -->
                    </div>

                    <div class="formxacnhan col-lg-4 card bg-light" style="max-height:300px">
                        <div class="pt-4 padding  rounded p-3">
                            <h4 class=" h4. heading text-center">Hóa đơn</h4>
                            <div class="list-group ">
                                <div class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 pb-0 bg-light">
                                    <span>Tổng sản phẩm</span>
                                    <p class="mb-0">
                                        <?php echo $totalQuan ?>
                                    </p>
                                </div>
                                <div class="list-group-item d-flex justify-content-between align-items-center px-0 bg-light " style="border-left: 0 ; border-right: 0;">
                                    <span>Tổng tiền</span>
                                    <p class="mb-0">
                                        <?php echo $totalPrice ?> .VND
                                    </p>
                                </div>
                                <div class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 mb-3 bg-light">
                                    <span>Tổng thanh toán</span>
                                    <p class="mb-0">
                                        <?php echo $totalPrice ?> .VND
                                    </p>
                                </div>
                            </div>
                            <button type="button" class="btn btn-success btn-block" data-toggle="modal" data-target="#payModal">Xác Nhận</button>
                        </div>
                    </div>
                </div>
            <?php
            } else {
                echo 'phai dang nhap';
            }
            ?>
        </div>
    </div>
    <?php
    include('inc/_loginModal.php');
    include('inc/_sigupModal.php');
    include('inc/_payModal.php');


    ?>
    <?php
    include('inc/footer.php');
    ?>
    <script>
        function check(input) {
            if (input.value <= 0) {
                input.value = 1;
            }
        }
        function updateCart(productId) {
            $.ajax({
                url: 'page/xulygiohang.php',
                type: 'POST',
                data: $("#quan" + productId).serialize(),
                success: function (res) {
                    location.reload();

                }

            });

        }
        function delitem(){
           if( confirm('ban co muon xoa?')){
            return true;
           }else{
            return false;
           }
            
        }
    </script>
</body>
<script src="js/lib/flickity.min.js"></script>
<script src="js/main.js"></script>


</html>