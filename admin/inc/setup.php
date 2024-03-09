<header class="main-content-header ">
    <div>
        <label class="button-hiden" for="menu-toggle">
            <i class="fa-solid fa-bars"></i>
        </label>
    </div>
    <div>
        <a href="" class="main-content_link ">
            <i class="fa-solid fa-gear"></i>
            <span>Cài đặt</span>
        </a>
    </div>
    <div class="main-content-header-avartar">
        <div>
            <img src="./assets/img/img1.jpg" alt="">
        </div>
        <div class="main-content-header-avartar-info">
            <div>
                <h4>ADMIN</h4>
            </div>
        </div>
    </div>
</header>
<main>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script>
        $('.nav-siteManage').addClass('active')
    </script>

    <div class="container-fluid">
        <div class="card">
            <div class="title" style="background-color:#000;">
                <em>
                    <h2 class="text-center text-white" style="margin-top: 1.5rem;
                            padding: .5rem;
                            ">IPHONE</h2>
                </em>
            </div>
            <div class="card-body pd-1">
                <form action="partials/_siteManage.php" method="post">
                    <div class="form-group">
                        <label for="name" class="control-label">Tên hệ thống+</label>
                        <input type="text" class="form-control" id="name" name="name" value="IPHONE" required>
                    </div>
                    <div class="form-group">
                        <label for="email" class="control-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="vanluong3011@gmail.com" required>
                    </div>
                    <div class="form-group">
                        <label for="contact" class="control-label">Liên hệ - 1</label>
                        <input type="tel" class="form-control" id="contact1" name="contact1" value="902590504" required>
                    </div>
                    <div class="form-group">
                        <label for="contact" class="control-label">Liên hệ - 2 (tùy chọn)</label>
                        <input type="tel" class="form-control" id="contact2" name="contact2" value="902590504" required>
                    </div>
                    <div class="form-group">
                        <label for="address" class="control-label">Địa chỉ</label>
                        <input type="text" class="form-control" id="address" name="address" value="273 An Dương Vương" required>
                    </div>
                    <div>
                        <button name="updateDetail" class="btn btn-block btn-main">Lưu</button>
                    </div>
                </form>
            </div>
        </div>
</main>