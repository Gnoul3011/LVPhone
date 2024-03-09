<?php
session_start();
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    $loggedin = true;
    $userId = $_SESSION['accountID'];
    $username = $_SESSION['username'];
} else {
    $loggedin = false;
    $userId = 0;
}
?>
<div class="container">
    <div class="product_listitem">
        <?php
        require '../db/connect.php';
        $productinpage = 10;
        $page = $_GET["page"];
        settype($page, 'int');
        $from = ($page - 1) * $productinpage;
        $str = "SELECT * FROM product 
                ORDER BY productID ASC
                LIMIT $from , $productinpage
        ";
        $product_sql = mysqli_query($con, $str);
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
                                echo "<a href='cart.php'><button class='btn btn-info '>Go to Cart</button></a>";
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

</div>