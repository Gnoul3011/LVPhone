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
    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        if (isset($_GET['productId'])) {
            $productId = $_GET['productId'];
        }
    };
    ?>
    <div id="Viewproduct">
        <div class="container">
            <div class="Vproduct row ">
                <?php
                $sql = "SELECT * FROM product WHERE productId='$productId'";
                $result = mysqli_query($con, $sql);
                $row = mysqli_fetch_array($result);
                $productImg = $row['productImage'];
                $productName = $row['productName'];
                $productPrice   = $row['productPrice'];
                $productQuan = $row ['productQuantity'];
                echo " <div class='img'>
                                    <a><img src='./images/$productImg' class='img' /></a>
                                </div>
                                <div class='content'>
                                    <div class='info'>
                                        <h5>$productName</h5>
                                        <strong>$productPrice</strong>
                                    </div>
                                <div class='btnall'>";
                                if ($productQuan  <= 0) {
                                    echo "<button class='btn-danger btn btnnouser' disabled >Hết hàng</button>";
                                  } else {
                                    if ($loggedin) {
                                      $quaSql = "SELECT `cartQuantity` FROM `cart` WHERE productID = '$productId' AND accountID='$userId'";
                                      $quaresult = mysqli_query($con, $quaSql);
                                      $quaExistRows = mysqli_num_rows($quaresult);
                                      if ($quaExistRows == 0) {
                                        echo "<form action='page/xulygiohang.php' method='POST'>
                                             <input type='hidden' name='itemId' id='itemId' value='$productId'>
                                             <button type='submit' name='addCart' class='btn-info btnnouser btn mx-2'>Add to Cart</button>";
                                      } else {
                                        echo "<a href='viewCart.php'><button class='btn-info btn btnnouser'>Go to Cart</button></a>";
                                      }
                                    } else {
                                      echo "<button class='btn-info btn btnnouser' data-toggle='modal' data-target='#myModal' >Add to Cart</button>";
                                    }
                                  };
                echo "</form>  </div>
                    </div>";

                ?>

            </div>
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