<div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="myModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header d-flex align-items-center" style="background:var(--green-cl);">
                <h4 class="modal-title " id="myModal" style="">Đăng nhập</h4>
                <button type="button" class="btn-close btn" style="font-size:20px;" data-dismiss="modal" aria-label="Close">X</button>
            </div>
            <div class="modal-body">
                <form action="page/xulydangnhap.php" class="formlogin" onsubmit="return checkLogin()" method="POST">
                    <div class="userName fieldtext row d-flex align-items-center my-2">
                        <label for="loginusername" class="col-4">Tên tài khoản</label>
                        <input class="form-control col-md-7" placeholder="Nhập tên tài khoản" type="text" name="loginusername" id="loginusername" required />
                    </div>
                    <div class="password fieldtext row d-flex align-items-center my-2">
                        <label for="loginpassword" class="col-4">Mật khẩu</label>
                        <input class="form-control col-md-7" placeholder="Nhập mật khẩu" name="loginpassword" id="loginpassword" type="password" required data-toggle="password" />
                    </div>
                    <button type="submit" class="btnsub btn btn-success me-md-2 main">Đăng
                        Nhập</button>
                </form>
            </div>
            <div class="modal-footer col-md-7">
                <p class="noacc">Bạn chưa có tài khoản ? <a href="#" data-dismiss="modal" data-toggle="modal" data-target="#modalSigup">Đăng
                        ký</a></p>
            </div>
        </div>
    </div>
</div>
<script src="">
    function checkLogin() {
        var loName = document.getElementById('loginusername').value;
        var loPass = document.getElementById('loginpassword').value;
        if (loName == '' || loPass == '') {
            alert('tai khoan hoac mat khau khong duoc trong');
            return false;
        }
        return true
    }
</script>