<header class="main-content-header ">
    <div>
        <label class="button-hiden" for="menu-toggle">
            <i class="fa-solid fa-bars"></i>
        </label>
    </div>
    <div>
        <a href="" class="main-content_link ">
            <i class="fa-solid fa-user"></i>
            <span>Tài khoản</span>
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

    <div class="">
        <div class="">
            <div class='add-user'>
                <label for=show-add-user class='btn btn-main mt-1' type=button>Thêm Người Dùng</label>
                <div class="card-body">
                    <table class="table add-user-info" style="margin-top: 1rem; ">
                        <thead class="add-user-info-header">
                            <tr>
                                <th>ID người dùng</th>
                                <th style="width:10%">Ảnh</th>
                                <th>Tên người dùng</th>
                                <th>Tên</th>
                                <th>Email</th>
                                <th>Số điện thoại</th>
                                <th>Phân quyền</th>
                                <th>Hành động</th>
                            </tr>
                        </thead>

                        <?php

                        $string = "SELECT * FROM account ";
                        $query = mysqli_query($con, $string);
                        $count = 0;
                        while ($row = mysqli_fetch_array($query)) {
                            $accountID = $row['accountID'];
                            $fullname = $row['fullname'];
                            $username = $row['username'];
                            $password = $row['password'];
                            $phone = $row['phone'];
                            $role = $row['role'];
                            $email = $row['email'];
                            $address = $row['address'];
                            $count++;
                            echo "  
                                <tbody style= background-color: #fff;>
                                <tr>
                                    <td>$count</td>
                                    <td><img src=./assets/img/img1.jpg alt=image for this user onError=this.src ='/OnlinePizzaDelivery/img/profilePic.jpg' width=100px height=100px></td>
                                    <td>$username</td>
                                    <td>
                                        <p>$fullname</p>
                                    </td>
                                    <td>$email</td>
                                    <td>$phone</td>
                                    <td>$role</td>
                                    <td class=text-center>
                                        <div class=display style=width:112px>
                                            <label for=show-toggle class= 'btn btn-active'  type=button>Sửa</label>
                                            <form action='pages/_accountHandle.php' method='POST' onsubmit='return delitem()'>
                                            <button style='margin-bottom: .5rem;
                                            margin-left: .5rem;' type='submit' name='DelAcc' class='btn  btn-danger'>Xóa</button>
                                            <input type='hidden' name='AccId' value='$accountID'>
                                        </form>
                                        </div>
                                        
                                    </td>
                                </tr>
                                </tbody>";
                        }
                        ?>

                    </table>

                </div>
            </div>
        </div>
        <input type="checkbox" name="" id="show-toggle">
        <div class="overlay">
            <label for="show-toggle">
            </label>
        </div>
        <div class="modal">
            <div class="" role="document">
                <div class="modal-content">
                    <div class="modal-header add-user-header">
                        <h5 class="modal-title" id="editUser1">ID Tài khoản: <b>1</b></h5>
                    </div>
                    <div class="modal-body">

                        <div class="text-left display" style="border-bottom: 2px solid #dee2e6;">
                            <div class="form-group ">
                                <form action="partials/_userManage.php" method="post" enctype="multipart/form-data">
                                    <b><label for="image">Profile Picture</label></b>
                                    <input type="file" name="userimage" id="userimage" accept=".jpg" class="form-control" required style="border:none;">
                                    <small id="Info" class="form-text text-muted mx-3">Chọn file .jpg.</small>
                                    <input type="hidden" id="userId" name="userId" value="1">
                                    <button type="submit" class="btn btn-success" name="updateProfilePhoto">Cập
                                        nhật</button>
                                </form>
                            </div>
                            <div class="form-group">
                                <img class="img-style" src="/assets/img/img1.jpg" alt="Profile Photo" onError="this.src ='/OnlinePizzaDelivery/img/profilePic.jpg'">
                                <input type="hidden" id="userId" name="userId" value="1">
                                <button type="submit" class="btn btn-success" name="removeProfilePhoto">Xóa
                                    ảnh</button>
                                </form>
                            </div>
                        </div>


                        <div class="form-user">
                            <div class="form-user-left">
                                <div class="form-group">
                                    <b><label for="username">Tên tài khoản</label></b>
                                    <input class="form-control" id="username" name="username" value="admin" type="text" disabled>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <b><label for="firstName">Họ:</label></b>
                                        <input type="text" class="form-control" id="firstName" name="firstName" value="admin" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <b><label for="lastName">Tên:</label></b>
                                        <input type="text" class="form-control" id="lastName" name="lastName" value="admin" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-user-right">
                                <div class="form-group ml-1">
                                    <b><label for="email">Email:</label></b>
                                    <input type="email" class="form-control" id="email" name="email" value="admin@gmail.com" required>
                                </div>
                                <div class="form-group ml-1">
                                    <div class="form-group ">
                                        <b><label for="phone">Số điện thoại:</label></b>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                            </div>
                                            <input type="tel" class="form-control" id="phone" name="phone" value="1111111111" required pattern="[0-9]{10}" maxlength="10">
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <b><label for="userType">Phân quyền:</label></b>
                                        <select name="userType" id="userType" class="custom-select browser-default" required>
                                            <option value="0">User</option>
                                            <option value="1" selected>Admin</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <input type="hidden" id="userId" name="userId" value="1">
                        <button type="submit" name="editUser" class="btn btn-success" style="margin-left: 12rem;">Cập nhật</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <input type="checkbox" name="" id="show-add-user">
        <div class="overlay1">
            <label for="show-add-user">
            </label>
        </div>
        <div class="show-add-users">
            <form action="pages/_productHandle.php" method="POST" enctype="multipart/form-data" class="show-add-user">
                <div class="product-info-left-header">
                    Thêm Người Dùng
                </div>
                <div class="product-info-left-body">
                    <div class="form-group">
                        <label class="control-label" for="">Tên người dùng:</label>
                        <br>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="form-group">
                        <label class=" control-label" for="">Tên:</label>
                        <br>
                        <input type="text" class="form-control" id="desc" name="desc" required>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Email</label>
                        <input type="email" class="form-control" id="price" name="price" required min="1">
                    </div>
                    <div class="form-group">
                        <label class="control-label">Số thoại</label>
                        <input type="number" class="form-control" id="quantity" name="quantity" required min="1">
                    </div>
                    <div class="form-group">
                        <label class="control-label">Phân quyền</label>
                        <br>
                        <select name="categoryId" id="categoryId" class="custom-select browser-default" required>
                            <option hidden disabled selected value>---</option>
                            <?php

                            $string = "SELECT * FROM account ";
                            $query = mysqli_query($con, $string);
                            $count = 0;
                            while ($row = mysqli_fetch_array($query)) {
                                $role = $row['role'];
                                echo "<option value='$role'>$role</option>";
                            } ?>

                        </select>
                    </div>
                    <div class="form-group">
                        <label for="image" class="control-label
                            ">Ảnh</label>
                        <input type="file" name="img" id="img" accept=".jpg" class="form-control" required>
                        <small id="info" class="form-text">
                            Chọn file .jpg
                        </small>
                    </div>
                </div>
                <div class="product-info-left-footer">
                    <button type="submit" class="btn-main btn-block btn" name="addPro" style="width: auto !important;">Thêm</button>
                </div>
            </form>
        </div>
</main>