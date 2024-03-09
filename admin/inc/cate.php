<header class="main-content-header ">
    <div>
        <label class="button-hiden" for="menu-toggle">
            <i class="fa-solid fa-bars"></i>
        </label>
    </div>
    <div>
        <a href="" class="main-content_link ">
            <i class="fa-sharp fa-solid fa-folder"></i>
            <span>Danh mục sản phẩm</span>
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
    <div class="product-info">
        <form action="pages/_cateHandle.php" method="POST" class="product-info-left1">
            <div class="product-info-left-header">
                Thêm danh mục mới
            </div>
            <div class="product-info-left-body">
                <div class="form-group">
                    <label class="control-label" for="">Thêm danh mục:</label>
                    <br>
                    <input type="text" class="form-control" name="nameCate" required>
                </div>
                <!-- <div class="form-group">
                            <label class=" control-label" for="">Mô tả:</label>
                            <br>
                            <input type="text" class="form-control" name="desc" required> -->
                <!-- </div> -->
                <!-- <div class="form-group">
                            <label for="image" class="control-label
                            ">Ảnh</label>
                            <input type="file" name="img" id="img" accept=".jpg" class="form-control" required>
                            <small id="info" class="form-text">
                                Chọn file .jpg
                            </small>
                        </div> -->
            </div>
            <div class="product-info-left-footer">
                <button type='submit' name="cateadd" class="btn-main btn-block btn " style="width: auto !important;">Thêm</button>
            </div>
        </form>

        <div class="product-info-right">
            <div class="product-info-right-body">
                <table class="table table-product-info">
                    <thead class="table-product-info-header">
                        <tr>
                            <th class="text-center" style="width:7%;">ID</th>
                            <th class="text-center">Ảnh</th>
                            <th class="text-center" style="width:58%;">Chi tiết danh mục</th>
                            <th class="text-center" style="width:18%;">Hành động</th>
                        </tr>
                    </thead>
                    <?php

                    $string = "SELECT * FROM category ";
                    $query = mysqli_query($con, $string);
                    $count = 0;
                    while ($row = mysqli_fetch_array($query)) {
                        $categoryID = $row['categoryID'];
                        $categoryName = $row['categoryName'];
                        $count++;
                        echo " <tbody>
                                <tr class='table-product-info-body'>
                                    <td class='text-center'>$categoryID</b></td>
                                    <td><img src='assets/img/img1.jpg' alt='image for this Category' width='150px' height='150px'></td>
                                    <td>
                                        <p>Tên: <b>$categoryName</b></p>
                                            </b></p>
                                    </td>
                                    <td class='text-center'>
                                        <div class='action' style='width:112px'>
                                            <div>
                                                <label class='btn btn-active edit-text' for='edit-toggle'>
                                                <input type='hidden' id='catereIn' name='catereIn' value='$categoryID'>
                                                    Sửa
                                                </label>
                                            </div>
                                            <form action='pages/_cateHandle.php' method='POST' onsubmit='return delitem()'>
                                                <button name='removeCategory' class='btn  btn-danger'>Xóa</button>
                                                <input type='hidden' name='catere' value='$categoryID'>
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
    <input type="checkbox" id="edit-toggle">
    <div class="overlay">
        <label for="edit-toggle">
        </label>
    </div>
    <?php
    $string = "SELECT * FROM category ";
    $query = mysqli_query($con, $string);
    $count = 0;
    while ($row = mysqli_fetch_array($query)) {
        $categoryID = $row['categoryID'];
        $categoryName = $row['categoryName'];
    ?>
        <div class="modal-dialog" id="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="updateCat2">ID Danh mục: <b><?php echo $categoryID ?></b></h5>
                </div>
                <div class="modal-body">
                    <form action="partials/_categoryManage.php" method="post" enctype="multipart/form-data">
                        <div class="display" style="border-bottom: 2px solid #dee2e6;">
                            <div class="form-group ">
                                <b><label for="image">Ảnh</label></b>
                                <input type="file" name="catimage" id="catimage" accept=".jpg" class="form-control" required style="border:none;" onchange="document.getElementById('itemPhoto').src = window.URL.createObjectURL(this.files[0])">
                                <small id="Info" class="form-text ">Chọn file .jpg</small>
                                <input type="hidden" id="catId" name="catId" value="1">
                                <button type="submit" class="btn btn-success my-1" name="updateCatPhoto">Cập
                                    nhật</button>
                            </div>
                            <div class="form-group ">
                                <img src="./assets/img/img1.jpg" style="width: 50px; height: 50px;" id="itemPhoto" name="itemPhoto" alt="Category image" width="100" height="100">
                            </div>
                        </div>
                    </form>
                    <form action="partials/_categoryManage.php" method="post">
                        <div class="text-left">
                            <b><label for="name">Tên</label></b>
                            <input class="form-control" id="name" name="name" value="Iphone" type="text" required>
                        </div>
                        <br>
                        <div class="text-left">
                            <b><label for="desc">Mô tả</label></b>
                            <textarea class="form-control" id="desc" name="desc" rows="2" required minlength="6">....</textarea>
                        </div>
                        <br>
                        <input type="hidden" id="catId" name="catId" value="2">
                        <button type="submit" class="btn btn-success" name="updateCategory">Cập nhật</button>
                    </form>
                </div>
            </div>
        </div>
    <?php } ?>
</main>
<script>
    function updateCate() {
        var cateID = document.querySelectorAll('#catereIn').value;
        console.log(cateID);
    }
    updateCate()
</script>