<header class="main-content-header ">
    <div>
        <label class="button-hiden" for="menu-toggle">
            <i class="fa-solid fa-bars"></i>
        </label>
    </div>
    <div>
        <a href="" class="main-content_link ">
            <i class="fa-solid fa-cart-shopping"></i>
            <span>Sản phẩm</span>
        </a>
    </div>
    <div class="main-content-header-avartar">
        <div>
            <img src="/assets/img/img1.jpg" alt="">
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
        <form action="pages/_productHandle.php" method="POST" enctype="multipart/form-data" class="product-info-left">
            <div class="product-info-left-header">
                Thêm Sản Phẩm Mới
            </div>
            <div class="product-info-left-body">
                <div class="form-group">
                    <label class="control-label" for="">Tên:</label>
                    <br>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
                <div class="form-group">
                    <label class=" control-label" for="">Mô tả:</label>
                    <br>
                    <input type="text" class="form-control" id="desc" name="desc" required>
                </div>
                <div class="form-group">
                    <label class="control-label">Giá</label>
                    <input type="number" class="form-control" id="price" name="price" required min="1">
                </div>
                <div class="form-group">
                    <label class="control-label">Số lượng</label>
                    <input type="number" class="form-control" id="quantity" name="quantity" required min="1">
                </div>
                <div class="form-group">
                    <label class="control-label">Danh mục</label>
                    <br>
                    <select name="categoryId" id="categoryId" class="custom-select browser-default" required>
                        <option hidden disabled selected value>---</option>
                        <?php

                        $string = "SELECT * FROM category ";
                        $query = mysqli_query($con, $string);
                        $count = 0;
                        while ($row = mysqli_fetch_array($query)) {
                            $categoryID = $row['categoryID'];
                            $categoryName = $row['categoryName'];
                            echo "<option value='$categoryID'>$categoryName</option>";
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
        <div class="product-info-right">
            <div class="product-info-right-body">
                <table class="table table-product-info">
                    <thead class="table-product-info-header">
                        <tr>
                            <th class="text-center" style="width:7%;">ID</th>
                            <th class="text-center">Ảnh</th>
                            <th class="text-center" style="width:58%;">Chi Tiết Sản Phẩm</th>
                            <th class="text-center" style="width:18%;">Hành động</th>
                        </tr>
                    </thead>
                    <?php

                    $string = "SELECT * FROM product ";
                    $query = mysqli_query($con, $string);
                    while ($row = mysqli_fetch_array($query)) {
                        $productID = $row['productID'];
                        $categoryID = $row['categoryID'];
                        $productName = $row['productName'];
                        $productPrice = $row['productPrice'];
                        $productImage = $row['productImage'];
                        $productDetail = $row['productDetail'];
                        $productQuantity = $row['productQuantity'];
                        echo "
                                <tbody>
                                <tr class='table-product-info-body'>
                                    <td class='text-center'><b>$productID</b></td>
                                    <td><img src='../images/$productImage' alt='image for this Category' width='150px' height='150px'></td>
                                    <td class='detail-product'>
                                        <p>Tên: <b>$productName</b></p>
                                        <p>Giá: <b class='truncate'>$productPrice
                                            </b></p>
                                            <p>Số lượng: <b>$productQuantity</b></p>
                                            <p>Danh mục: <b>$productDetail</b></p>
                                    </td>
                                    <td class='text-center'>
                                        <div class='action' style='width:112px'>
                                            <div>
                                                <label class='btn btn-active edit-text' for='edit-toggle'>
                                                    Sửa
                                                </label>
                                            </div>
                                                
                                            <form action='pages/_productHandle.php' method='POST' onsubmit='return delitem()'>
                                                <button type='submit' name='delPro' class='btn  btn-danger'>Xóa</button>
                                                <input type='hidden' name='proId' value='$productID'>
                                            </form>
                                            
                                        </div>
                                        </div>
                                    </td>
                                </tr>

                            </tbody>
                                ";
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
    <div class="modal-dialog1" id="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateCat2">ID Sản Phẩm: <b>1</b></h5>
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
                    <div class="form-group">
                        <b><label for="price">Price</label></b>
                        <input class="form-control" id="price" name="price" value="20" type="number" min="1" required>
                    </div>

                    <div class="form-group">
                        <b><label for="catId">Category Id</label></b>
                        <input class="form-control" id="catId" name="catId" value="5" type="number" min="1" required>
                    </div>
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
</main>