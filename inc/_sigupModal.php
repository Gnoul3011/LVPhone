<div class="modal fade" id='modalSigup' tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header d-flex align-items-center" style="background:var(--green-cl);">
                <h4 class="modal-title fs-5" id="modalSigup">Đăng Ký</h4>
                <button type="button" class="btn-close btn" data-dismiss="modal" style="font-size:20px" aria-label="Close">X</button>
            </div>
            <div class="modal-body">
                <form name="frmregister" action="page/xulydangky.php" id="RegisterForm" onsubmit="return checkSigup()" method="POST">
                    <div class="user-details">
                        <div class="reg-input-box my-2 row">
                            <span class="details col-4">Họ và tên</span>
                            <input type="text" class="col-6" id="reg-fullname" name="reg-fullname" placeholder="Nhập họ tên đầy đủ" required>
                        </div>
                        <div class="reg-input-box my-2 row">
                            <span class="details col-4">Tên đăng nhập</span>
                            <input type="text" class="col-6" id="reg-id" name="reg-id" placeholder="Nhập mã số sinh viên" required>
                            <div id="noteid"></div>
                        </div>
                        <div class="reg-input-box my-2 row">
                            <span class="details col-4">Gmail</span>
                            <input type="email" class="col-6" id="reg-mail" name="reg-mail" placeholder="Nhập địa chỉ gmail" required>
                            <div id="notemail"></div>
                        </div>
                        <div class="reg-input-box my-2 row">
                            <span class="details col-4">Số Điện Thoại</span>
                            <input type="text" class="col-6" id="reg-phone" name="reg-phone" placeholder="Nhập số điện thoại" required>
                            <div id="notephone"></div>
                        </div>
                        <div class="reg-input-box my-2 row">
                            <span class="details col-4">Mật khẩu</span>
                            <input type="password" class="col-6" id="reg-pass" data-toggle="password" name="reg-pass" minlength="3" maxlength="15" placeholder="Nhập mật khẩu" required>
                        </div>
                        <div class="reg-input-box my-2 row">
                            <span class="details col-4">Nhập lại mật khẩu</span>
                            <input type="password" class="col-6" id="reg-cpass" data-toggle="password" name="reg-cpass" minlength="3" maxlength="15" placeholder="Nhập lai mât khẩu" required>
                            <div id="notecpass"></div>
                        </div>
                    </div>
                    <div class="register-button">
                        <input id="reg-submit-btn" class="btnsub btn btn-success me-md-2" type="submit" value="Đăng ký">
                    </div>

                </form>
            </div>
            <div class="modal-footer col-md-7">
                <p class="noacc col-12">Bạn đã có tài khoản ? <a href="#" data-dismiss="modal" data-toggle="modal" data-target="#myModal">Đăng
                        nhập</a></p>
            </div>
        </div>
    </div>
    <script>
        function checkSigup() {
            function validateId(regid) {
                var re = /\S+/;
                // var re = /([K]+[H])([a-zA-z]{5})(\d{4})$/;
                return re.test(regid);
            }

            function validateEmail(mail) {
                var re = /^\S+@\S+\.\S+/;
                return re.test(mail);
            }

            function validatePhone(rephone) {
                var re = /^0(\d{9}|9\d{8})$/;
                return re.test(rephone);
            }

            function validatePass(repass, recpass) {
                var pass = repass;
                var cpass = recpass;
                if (pass == recpass) {
                    return true;
                }
            }
            let check = true;
            remail = document.getElementById("reg-mail").value;
            rephone = document.getElementById("reg-phone").value;
            regid = document.getElementById("reg-id").value;
            repass = document.getElementById("reg-pass").value;
            recpass = document.getElementById("reg-cpass").value;

            if (!validateId(regid)) {
                document.getElementById("noteid").innerText = "Tên đăng nhập không hợp lệ";
                document.getElementById("noteid").style.color = "red";
                return false;


            }
            if (!validateEmail(remail)) {
                document.getElementById("notemail").innerText = "Email không hợp lệ";
                document.getElementById("notemail").style.color = "red";
                return false;
            }
            if (!validatePhone(rephone)) {
                document.getElementById("notephone").innerText = "Số điện thoại không đúng";
                document.getElementById("notephone").style.color = "red";
                return false;
            }
            if (!validatePass(repass, recpass)) {
                document.getElementById("notecpass").innerText = "Mật khẩu không trung khớp";
                document.getElementById("notecpass").style.color = "red";
                return false;

            }
            return true;
        }
    </script>
</div>