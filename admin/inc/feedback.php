<header class="main-content-header ">
            <div>
                <label class="button-hiden" for="menu-toggle">
                    <i class="fa-solid fa-bars"></i>
                </label>
            </div>
            <div>
                <a href="" class="main-content_link ">
                    <i class=" fa-solid fa-comment"></i>
                    <span>Phản hồi</span>
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
                $('.nav-contactManage').addClass('active')
            </script>

            <div class="alert " role="alert" style="width:100%" id='notempty'>
                <strong>Thông báo!</strong> Nếu vấn đề không liên quan đến đơn đặt hàng thì id đơn hàng = 0.
                <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span></button>
            </div>
            <div style="margin-right: 32px;display: table;margin-left: auto;">
                <label for="edit-toggle" type="button" class="btn btn-danger-gradiant text-white mt-1"
                    data-toggle="modal" data-target="#history"><span> Lịch sử phản hồi <i
                            class="ti-arrow-right"></i></span></label>
            </div>
            <div class="container-fluid" id='empty'>
                <div>
                    <div class="card">
                        <div class="card-body">
                            <table class="table-striped table-bordered text-center">
                                <thead style="background-color: rgb(111 202 203);">
                                    <tr>
                                        <th>ID</th>
                                        <th>ID Tài khoản</th>
                                        <th>Email</th>
                                        <th>Số điện thoại</th>
                                        <th>ID hóa đơn</th>
                                        <th>Lời nhắn</th>
                                        <th>Ngày gửi</th>
                                        <th>Phản hồi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <script> document.getElementById("notempty").innerHTML = '<div class="alert" role="alert" style="width:100%; margin-bottom:10px;"> Bạn không có phản hồi nào!	</div>';
                                        document.getElementById("empty").innerHTML = '';
                                    </script>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>


            <!-- history Modal -->
            <input type="checkbox" id="edit-toggle">
            <div class="overlay">
                <label for="edit-toggle">
                </label>
            </div>
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header" style="background-color: rgb(187 188 189);">
                        <h5 class="modal-title" id="history">Lời nhắn của bạn</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" id="notReply">
                        <table class="table-striped table-bordered col-md-12 text-center">
                            <thead style="background-color: rgb(111 202 203);">
                                <tr>
                                    <th>ID Phản hồi</th>
                                    <th>Tin nhắn phản hồi</th>
                                    <th>Ngày gửi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <script> document.getElementById("notReply").innerHTML = '<div class="alert alert-info alert-dismissible fade show" role="alert" style="width:100%"> Bạn chưa trả lời phản hồi nào!	</div>';</script>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- Optional JavaScript -->
            <!-- jQuery first, then Popper.js, then Bootstrap JS -->
            <script src="https://code.jquery.com/jquery-3.4.1.min.js"
                integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
                integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
                crossorigin="anonymous"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
                integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
                crossorigin="anonymous"></script>
            <script src="https://unpkg.com/bootstrap-show-password@1.2.1/dist/bootstrap-show-password.min.js"></script>
            <script src="assetsForSideBar/js/main.js"></script>
        </main>