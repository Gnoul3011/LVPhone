<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/responsive.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="js/lib/jquery.min.js"></script>
    <script src="js/lib/popper.min.js"></script>
    <script src="js/lib/bootstrap.min.js"></script>
    <script src="js/lib/jquery-3.1.1.min.js"></script>
    <title>Admin</title>

</head>


<body>
    <?php
    include('db/connect.php')
    ?>
    <input type="checkbox" name="" id="menu-toggle">
    <div class="overlay">
        <label for="menu-toggle">
        </label>
    </div>
    <div class="sidebar">
        <div class="sidebar-container">
            <div class="brand">
                <a href="index.php" style='color:#000;'>
                    <h2>
                        <i class="fa-brands fa-apple"></i>
                        Iphone
                    </h2>
                </a>
            </div>

            <div class="sidebar-menu">
                <ul>
                    <li>
                        <a href="index.php?chon=t&id=1"  class="sidebar-menu_link sidebar-1">
                            <i class="sidebar-menu_icon fa-solid fa-house"></i>
                            <span>Trang Chủ</span>
                        </a>
                    </li>
                    <li>
                        <a href="index.php?chon=t&id=2"  class="sidebar-menu_link sidebar-2">
                            <i class="sidebar-menu_icon fa-solid fa-chart-simple"></i>
                            <span>Hóa đơn</span>
                        </a>
                    </li>
                    <li>
                        <a href="index.php?chon=t&id=3"  class="sidebar-menu_link sidebar-3">
                            <i class="sidebar-menu_icon fa-sharp fa-solid fa-folder"></i>
                            <span>Danh mục sản phẩm</span>
                        </a>
                    </li>
                    <li>
                        <a href="index.php?chon=t&id=4"  class="sidebar-menu_link sidebar-4">
                            <i class="sidebar-menu_icon fa-solid fa-cart-shopping"></i>
                            <span>Sản phẩm</span>
                        </a>
                    </li>
                    <li>
                        <a href="index.php?chon=t&id=5"  class="sidebar-menu_link sidebar-5">
                            <i class="sidebar-menu_icon fa-solid fa-comment"></i>
                            <span>Phản hồi</span>
                        </a>
                    </li>
                    <li>
                        <a href="index.php?chon=t&id=6"  class="sidebar-menu_link sidebar-6">
                            <i class="sidebar-menu_icon fa-solid fa-user"></i>
                            <span>Tài khoản</span>
                        </a>
                    </li>
                    <li>
                        <a href="index.php?chon=t&id=7"  class="sidebar-menu_link sidebar-7">
                            <i class="sidebar-menu_icon fa-solid fa-gear"></i>
                            <span>Cài đặt</span>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="sidebar-logout">
                <a href="login.html">
                    <button class="btn btn-main btn-block"> <i class="sidebar-menu_icon fa-solid fa-right-from-bracket"></i>
                        Đăng xuất
                    </button>
                </a>
            </div>
        </div>
    </div>
    <div class="main-content">
        <?php
        include('pages/page.php');
        ?>
    </div>

</body>
<script>
    function delitem(){
           if( confirm('ban co muon xoa?')){
            return true;
           }else{
            return false;
           }
            
        }
        <?php $page = isset($_GET['id']) ? $_GET['id'] :'1'; ?>
	  $('.sidebar-<?php echo $page; ?>').addClass('sidebar-menu_link--active')
</script>

</html>