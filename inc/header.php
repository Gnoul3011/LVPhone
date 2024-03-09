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
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@500&display=swap" rel="stylesheet">
<div id="header">
    <div class="container">
        <div class="header_logo"><a href="index.php">LV Phones</a></div>
        <form method="GET" action="./search.php" class="header_search">
            <input type="search" name="search" id="search" placeholder="Nhập thông tin bạn cần tìm" value="" />
            <button type="submit" title="Tìm kiếm">
                <i class="fa-solid fa-magnifying-glass"></i>
            </button>
        </form>
        <div class="header_list">
            <a href="./cart.php" class="header_list-item cart">
                <i class="fa-solid fa-cart-plus"></i>
                <span>Giỏ hàng</span>
                <?php
                $str   = "SELECT * FROM cart WHERE accountID = '$userId'";
                $query = mysqli_query($con, $str);
                $totalQuan = 0;
                if (mysqli_num_rows($query) > 0) {
                    while ($cartproduct = mysqli_fetch_assoc($query)) {
                        $qty = $cartproduct['cartQuantity'];
                        $totalQuan = $totalQuan + $qty;
                    }
                    echo "<strong class='sl'>$totalQuan</strong>";
                } else {
                    echo "<strong class='sl' style='display:none;'></strong>";
                }
                ?>
            </a>
            <a href="" class="header_list-item note">
                <i class="fa-solid fa-clipboard"></i>
                <span>Thông báo</span>
            </a>
        </div>

        <?php if ($loggedin) {
            echo "<button class='header_accout' type='button' data-toggle='modal'  aria-expanded='true'>
            <i class='fa-solid fa-user'></i>
            <span> $username </span>
            <i class='fa-sharp fa-solid fa-caret-down' ></i>
            <div class='accoption'>
            <a class='profile' href='profile.php'> Profile </a>
            <a class='logout' href='page/_logout.php'> Đăng xuất </a>
            </div>
        </button>";
        } else {
            echo "<button class='header_accout' type='button' data-toggle='modal' data-target='#myModal' aria-expanded='true'>
            <i class='fa-solid fa-user'></i>
            <span> Đăng nhập </span></button>";
        } ?>

    </div>

</div>
<div id="navigation">
    <div class="container">
        <div class="nav_menu">
            <a href="index.php" class="nav_menu-item">Trang chủ</a>
            <a href="" class="nav_menu-item">Giới thiệu</a>
            <a href="" class="nav_menu-item">Tin tức</a>
            <a href="" class="nav_menu-item">Liên hệ</a>
            <a href="" class="nav_menu-item">Chi nhánh</a>
        </div>
    </div>
</div>

<?php
if (isset($_GET['signupsuccess']) && $_GET['signupsuccess'] == "true") {
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
              <strong>Tuyệt Vời!</strong> Bạn có thể đăng nhập.
              <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span></button>
            </div>';
}
if (isset($_GET['error']) && $_GET['signupsuccess'] == "false") {
    echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
              <strong>Warning!</strong> ' . $_GET['error'] . '
              <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span></button>
            </div>';
}
if (isset($_GET['loginsuccess']) && $_GET['loginsuccess'] == "true") {
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
              <strong>Chúc mừng !</strong> Đăng nhập thành công
              <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span></button>
            </div>';
}
if (isset($_GET['loginsuccess']) && $_GET['loginsuccess'] == "false") {
    echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
              <strong>Thật đáng tiếc .</strong> Có lẽ mình không tìm thấy bạn
              <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span></button>
            </div>';
}
if (isset($_GET['paysuccess']) && $_GET['paysuccess'] == "true") {
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
              <strong>Thanh toán thành công</strong>
              <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span></button>
            </div>';
}
?>