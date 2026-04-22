<style>
    /* CSS tùy chỉnh màu cho Tab */
    .nav-pills .nav-link.active {
        background-color: #dc3545 !important;
        color: #fff !important;
        box-shadow: 0 4px 10px rgba(220, 53, 69, 0.3);
    }
    .nav-pills .nav-link {
        color: #495057;
        background-color: #fff;
        border: 1px solid #dee2e6;
        transition: all 0.3s;
    }
    .nav-pills .nav-link:hover:not(.active) {
        background-color: #f8f9fa;
        color: #dc3545;
    }
</style>

<div class="container mt-4 mb-5" style="min-height: 50vh;">
    <ul class="nav nav-pills mb-4 justify-content-center" id="pills-tab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active fw-bold px-5 py-2 mx-2 rounded-pill" id="pills-cart-tab" data-bs-toggle="pill" data-bs-target="#pills-cart" type="button" role="tab" aria-selected="true">
                <i class="fa-solid fa-cart-shopping me-2"></i> Giỏ hàng của bạn
            </button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link fw-bold px-5 py-2 mx-2 rounded-pill" id="pills-history-tab" data-bs-toggle="pill" data-bs-target="#pills-history" type="button" role="tab" aria-selected="false">
                <i class="fa-solid fa-clipboard-list me-2"></i> Đơn đã đặt
            </button>
        </li>
    </ul>

    <div class="tab-content" id="pills-tabContent">
        
        <div class="tab-pane fade show active" id="pills-cart" role="tabpanel" aria-labelledby="pills-cart-tab">
            <?php if (empty($cart)): ?>
                <div class="text-center py-5 bg-white rounded shadow-sm border">
                    <img src="https://deo.shopeemobile.com/shopee/shopee-pcmall-live-sg/cart/9bdd8040b334d31946f4.png" alt="Empty" width="150" class="mb-3">
                    <h5 class="text-muted">Giỏ hàng của bạn đang trống</h5>
                    <a href="<?= BASE_URL ?>" class="btn btn-danger mt-3 px-4 rounded-pill">Tiếp tục mua sắm</a>
                </div>
            <?php else: ?>
                <form action="<?= BASE_URL ?>?action=update-cart" method="POST">
                    <div class="row">
                        <div class="col-lg-8 mb-4">
                            <div class="card border-0 shadow-sm">
                                <div class="card-body p-0">
                                    <div class="table-responsive">
                                        <table class="table align-middle mb-0">
                                            <thead class="bg-light">
                                                <tr>
                                                    <th class="ps-4">Sản phẩm</th>
                                                    <th class="text-center">Đơn giá</th>
                                                    <th class="text-center">Số lượng</th>
                                                    <th class="text-end pe-4">Thành tiền</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php 
                                                $totalPrice = 0;
                                                foreach ($cart as $item): 
                                                    $subTotal = $item['price'] * $item['quantity'];
                                                    $totalPrice += $subTotal;
                                                ?>
                                                <tr>
                                                    <td class="ps-4 py-3">
                                                        <div class="d-flex align-items-center">
                                                            <img src="<?= BASE_ASSETS_UPLOADS_PRODUCT . $item['image_url'] ?>" class="rounded border p-1 me-3" width="70" height="70" style="object-fit: contain;">
                                                            <div class="fw-bold text-dark" style="font-size: 0.95rem; max-width: 250px;"><?= $item['name'] ?></div>
                                                        </div>
                                                    </td>
                                                    <td class="text-center fw-semibold text-muted"><?= number_format($item['price']) ?>đ</td>
                                                    <td class="text-center" style="width: 140px;">
                                                        <div class="input-group input-group-sm mx-auto">
                                                            <button class="btn btn-outline-secondary px-2 fw-bold" type="button" onclick="this.nextElementSibling.stepDown(); this.form.submit();">-</button>
                                                            <input type="number" class="form-control text-center fw-bold px-1" name="quantities[<?= $item['id'] ?>]" value="<?= $item['quantity'] ?>" min="1" onchange="this.form.submit();">
                                                            <button class="btn btn-outline-secondary px-2 fw-bold" type="button" onclick="this.previousElementSibling.stepUp(); this.form.submit();">+</button>
                                                        </div>
                                                    </td>
                                                    <td class="text-end pe-4 fw-bold text-danger"><?= number_format($subTotal) ?>đ</td>
                                                    <td class="text-center">
                                                        <a href="<?= BASE_URL ?>?action=delete-cart&id=<?= $item['id'] ?>" class="text-danger" title="Xóa" onclick="return confirm('Xóa sản phẩm này?')">
                                                            <i class="fa-solid fa-trash-can fs-5"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="card border-0 shadow-sm rounded-3">
                                <div class="card-body p-4">
                                    <h5 class="fw-bold mb-3 border-bottom pb-3">Tóm tắt đơn hàng</h5>
                                    <div class="d-flex justify-content-between mb-2">
                                        <span class="text-muted">Tổng phụ:</span>
                                        <span class="fw-semibold"><?= number_format($totalPrice) ?>đ</span>
                                    </div>
                                    <div class="d-flex justify-content-between mb-3 border-bottom pb-3">
                                        <span class="text-muted">Phí vận chuyển:</span>
                                        <span class="fw-semibold text-success">Miễn phí</span>
                                    </div>
                                    <div class="d-flex justify-content-between mb-4">
                                        <span class="fw-bold fs-5">Tổng cộng:</span>
                                        <span class="fw-bold fs-4 text-danger"><?= number_format($totalPrice) ?>đ</span>
                                    </div>
                                    <a href="<?= BASE_URL ?>?action=checkout" class="btn btn-danger w-100 py-2 fw-bold text-uppercase rounded-pill shadow-sm">
                                        Tiến hành thanh toán
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            <?php endif; ?>
        </div>

        <div class="tab-pane fade" id="pills-history" role="tabpanel" aria-labelledby="pills-history-tab">
            <?php if (empty($orders)): ?>
                <div class="text-center py-5 bg-white rounded shadow-sm border">
                    <h5 class="text-muted">Bạn chưa có đơn hàng nào.</h5>
                    <button class="btn btn-danger mt-3 px-4 rounded-pill" onclick="document.getElementById('pills-cart-tab').click()">Mua sắm ngay</button>
                </div>
            <?php else: ?>
                <div class="card border-0 shadow-sm rounded-3">
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-hover align-middle mb-0">
                                <thead class="bg-light">
                                    <tr>
                                        <th class="ps-4 py-3">Mã ĐH</th>
                                        <th>Ngày đặt</th>
                                        <th>Tổng tiền</th>
                                        <th>Phương thức</th>
                                        <th>Trạng thái</th>
                                        <th>Mã QR</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($orders as $od): ?>
                                        <tr>
                                            <td class="ps-4 fw-bold text-danger">GT<?= $od['id'] ?></td>
                                            <td><?= date('d/m/Y H:i', strtotime($od['created_at'])) ?></td>
                                            <td class="fw-bold"><?= number_format($od['total_amount']) ?>đ</td>
                                            <td><?= $od['payment_method'] == 1 ? 'Tiền mặt (COD)' : 'Chuyển khoản' ?></td>
                                            <td>
                                                <?php 
                                                    if($od['status'] == 0) echo '<span class="badge bg-warning text-dark">Chờ xác nhận</span>';
                                                    if($od['status'] == 1) echo '<span class="badge bg-primary">Đã xác nhận</span>';
                                                    if($od['status'] == 2) echo '<span class="badge bg-info text-dark">Đang giao</span>';
                                                    if($od['status'] == 3) echo '<span class="badge bg-success">Hoàn thành</span>';
                                                ?>
                                            </td>
                                            <td>
                                                <?php if($od['payment_method'] == 2 && $od['status'] == 0): ?>
                                                    <button class="btn btn-sm btn-outline-danger rounded-pill" data-bs-toggle="modal" data-bs-target="#qrModal<?= $od['id'] ?>">
                                                        <i class="fa-solid fa-qrcode"></i> Xem QR
                                                    </button>

                                                    <div class="modal fade" id="qrModal<?= $od['id'] ?>" tabindex="-1" aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered modal-sm">
                                                            <div class="modal-content text-center p-4">
                                                                <h6 class="fw-bold text-danger mb-3">Thanh toán đơn GT<?= $od['id'] ?></h6>
                                                                <img src="https://img.vietqr.io/image/VCB-1049308625-compact2.png?amount=<?= $od['total_amount'] ?>&addInfo=Thanh toan don GT<?= $od['id'] ?>&accountName=NGUYEN GIA TUAN" class="img-fluid rounded shadow-sm" alt="QR">
                                                                <p class="small text-muted mt-3 mb-0">Sử dụng App ngân hàng để quét mã.</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php else: ?>
                                                    <span class="text-muted">-</span>
                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </div>

    </div>
</div>