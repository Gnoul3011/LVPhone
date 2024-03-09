<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
    <link rel="stylesheet" href="./font/fontawesome-free-6.3.0-web/css/all.min.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@500&display=swap" rel="stylesheet">

    <title>Document</title>
</head>

<body>
    <?php
    include('inc/load.php');
    include('db/connect.php');
    include('inc/header.php');
    ?>
    <div class="container rounded bg-white mt-5 mb-5">
        <form action="page/xulytaikhoan.php" method="post">
            <div class="row">

                <?php
                $userId = $_SESSION['accountID'];
                $str = "SELECT * FROM account WHERE accountID = '$userId'";
                $query = mysqli_query($con, $str);
                $user = mysqli_fetch_assoc($query);
                if ($user > 0) {
                    $fullname = $user['fullname'];
                    $email = $user['email'];
                    $password = $user['password'];
                    $username = $user['username'];
                    $phone = $user['phone'];
                    $address = $user['address'];
                    echo "
                    <div class='col-md-3 border-right'>
                    <div class='d-flex flex-column align-items-center text-center p-3 py-5'><img class='rounded-circle mt-5' width='150px' src='https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg'><span class='font-weight-bold'>$fullname</span><span class='text-black-50'>$email</span><span> </span></div>
                </div>
                    <div class='col-md-5 border-right'>
                    <div class='p-3 py-5'>
                        <div class='d-flex justify-content-between align-items-center mb-3'>
                            <h4 class='text-right'>Thông tin cá nhân</h4>
                        </div>
                        <div class='row'>
                            <div class='col-md-12'><label class='labels'>Họ và tên</label><input type='text' name='fullname' class='form-control' placeholder='Nhập họ và tên' value='$fullname'></div>
                        </div>
                        <div class='row mt-3'>
                            <div class='col-md-12'><label class='labels'>Email</label><input type='text' name='email' class='form-control' placeholder='Nhập vào email' value='$email'></div>
                            <div class='col-md-12'><label class='labels'>Số điện thoại</label><input type='text' name='phone' class='form-control' placeholder='Nhập số điện thoại' value='$phone'></div>
                            <div class='col-md-12'><label class='labels'>Địa chỉ</label><input type='text' name='address' class='form-control' placeholder='Nhập vào địa chỉ' value='$address'></div>
                        </div>
                        <div class='mt-5 text-center'><button type='submit' class='btn btn-primary profile-button' name='profile-button' type='button'>Lưu thông tin</button></div>
                    </div>
                </div>
                </form>
                <div class='col-md-4'>
                    <div class='p-3 py-5'>
                        <div class='d-flex justify-content-between align-items-center experience'><span>Thông tin tài khoản</span><span class='border px-3 p-1 add-experience'><i class='fa fa-plus'></i>&nbsp;Thêm thông tin</span></div><br>
                        <div class='col-md-12'><label class='labels'>Tài khoản</label><input type='text' name='username' class='form-control' placeholder='Nhập vào tài khoản' value='$username'></div> <br>
                        <div class='col-md-12'><label class='labels'>Mật khẩu</label><input type='text' class='form-control' placeholder='Nhập vào mật khẩu' value=''></div>
                        <button type='button' class='col-md-6 btn btn-info mt-1' data-target='#passModal' data-toggle='modal'>Đổi mật khẩu</button>
                    </div>
                </div>";
                };
                include('inc/_passwordModal.php');
                ?>

            </div>
        
    </div>

    <?php
  
    include('inc/footer.php');
    ?>
</body>
<script>
    function confirmSave(saveUrl) {
        if (confirm("Ban co chac chan luu khong?")) {

        }
    }
</script>

</html>