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
    include('inc/load.php');
    include('db/connect.php');
    include('inc/header.php');

    ?>
    <div id="productlist">
        <div class="container">
            <?php
            $noResult = true;
            $queryName = $_GET['search'];
            $str = "SELECT * FROM product WHERE MATCH(productName, productDetail) against('$queryName')";
            $product_sql = mysqli_query($con, $str);
            echo "<h2 class='row' >sản phẩm cho từ khóa:<strong style='margin-left:10px;'>$queryName</strong> </h2>";
            ?>

            <div class='product_listitem'>
                <?php
                while ($row = mysqli_fetch_array($product_sql)) {
                    $noResult = false;
                    $productId = $row['productID'];
                    $productName = $row['productName'];
                    $productPrice = $row['productPrice'];
                    $productDetail = $row['productDetail'];
                    $productCategorieId = $row['categoryID'];
                    $productImage = $row['productImage'];
                    echo "
                <div class='product_item'>
                    <div class='product_item-img'>
                        <a href='' class='aimg'><img src='images/$productImage ' alt='' /></a>
                    </div>
                    <a href='' class='product_item-content'>
                        <span class='name'>
                            $productName
                        </span>
                        <p class='price'>
                            $productPrice
                        </p>
                    </a>
                        <div class='action'>";
                    $productSql = "SELECT * FROM product WHERE productID = $productId";
                    $productQuery = mysqli_query($con, $productSql);
                    $row = mysqli_fetch_array($productQuery);
                    if ($row['productQuantity'] <= 0) {
                        echo "<button class='btn-danger btn btnnouser' disabled >Hết hàng</button>";
                    } else {
                        if ($loggedin) {
                            $quaSql = "SELECT `cartQuantity` FROM `cart` WHERE productID = '$productId' AND accountID='$userId'";
                            $quaresult = mysqli_query($con, $quaSql);
                            $quaExistRows = mysqli_num_rows($quaresult);
                            if ($quaExistRows == 0) {
                                echo "<form action='page/xulygiohang.php' method='POST'>
                                            <input type='hidden' name='itemId' value='$productId'>
                                            <button type='submit' name='addCart' class='btn btn-info mx-2'>Add to Cart</button>";
                            } else {
                                echo "<a href='viewCart.php'><button class='btn btn-info '>Go to Cart</button></a>";
                            }
                        } else {
                            echo "<button class='btn btn-info btnnouser' data-toggle='modal' data-target='#myModal'>Add to Cart</button>";
                        }
                    }

                    echo "</form>
                                    <a href='viewproduct.php?productId=$productId'><button class='btn btn-info'>Chi Tiết</button></a>";

                    echo "</div>
                        
                       </div>";
                }
                ?>
            </div>
            <?php
            if ($noResult) {
                echo '
            <h1>Bạn tìm - <em>"' . $_GET['search'] . '"</em> - không có rồi</h1>
            <p class="lead" style="margin-left: 20px ;"> Gọi ý tìm kiếm:
            <ul>
                <li style="margin-left: 40px ;">Đảm bảo ghi đúng chính tả.</li>
                <li style="margin-left: 40px ;">Hãy thử ghi dấu.</li>
                <li style="margin-left: 40px ;">Hãy chắc chắn rằng nó ở đây</li>
            </ul>
            </p>
            ';
            } ?>
        </div>
    </div>
    <?php
    include('inc/_loginModal.php');
    include('inc/_sigupModal.php');

    ?>
    <?php
    include('inc/footer.php');
    ?>
</body>
<script src="js/lib/flickity.min.js"></script>
<script src="js/main.js"></script>

</html>