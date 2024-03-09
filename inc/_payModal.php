<div class="modal fade" id="payModal" tabindex="-1" role="dialog" aria-labelledby="payModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="payModal">Thanh Toán</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="row g-3" method="POST" action="page/xulygiohang.php">
                    <div class="col-12">
                        <label for="inputEmail" class="form-label">Email</label>
                        <input type="email" class="form-control" id="inputEmail" pattern="^\S+@\S+\.\S+" required>
                    </div>

                    <div class="col-12">
                        <label for="inputAddress" class="form-label">Address</label>
                        <input type="text" class="form-control" name="inputAddress" placeholder="123 Main St" required>
                    </div>
                    <div class="col-md-6">
                        <label for="inputPhone" class="form-label">Phone</label>
                        <input type="Phone" class="form-control" id="inputPhone" placeholder="+84" pattern="^0(\d{9}|9\d{8})$" required>
                    </div>
                    <div class="col-md-6">
                        <label for="inputPassword" class="form-label">Password</label>
                        <input type="password" class="form-control" id="inputPassword" name="inputPassword" required>
                    </div>
                    
                    <div class="col-12">
                        <input type="hidden" name="totalPrice" value="<?php echo $totalPrice?>">
                        <input type="hidden" name="totalQuan" value="<?php echo $totalQuan?>">
                        <button type="submit" name="payEnd" class="btn btn-success payEnd mt-2">Thanh toán</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>