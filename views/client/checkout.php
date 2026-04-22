<div class="container mt-4 mb-5">
    <h3 class="fw-bold text-uppercase mb-4"><i class="fa-solid fa-money-check-dollar text-danger"></i> Thanh toán đơn hàng</h3>

    <form action="<?= BASE_URL ?>?action=process-checkout" method="POST">
        <div class="row">
            <div class="col-lg-7 mb-4">
                <div class="card border-0 shadow-sm rounded-3">
                    <div class="card-body p-4">
                        <h5 class="fw-bold mb-4 border-bottom pb-2">Thông tin nhận hàng</h5>
                        
                        <div class="mb-3">
                            <label class="form-label fw-bold">Họ và tên <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="fullname" value="<?= $_SESSION['user']['username'] ?>" required>
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label fw-bold">Số điện thoại <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="phone" placeholder="Nhập số điện thoại" required>
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label fw-bold">Địa chỉ giao hàng chi tiết <span class="text-danger">*</span></label>
                            <textarea class="form-control" name="address" rows="3" placeholder="Ví dụ: Số 1, Đường Trịnh Văn Bô, Nam Từ Liêm, Hà Nội" required></textarea>
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-bold">Ghi chú đơn hàng</label>
                            <textarea class="form-control" name="note" rows="2" placeholder="Giao hàng vào giờ hành chính..."></textarea>
                        </div>

                        <h5 class="fw-bold mb-3 border-bottom pb-2">Phương thức thanh toán</h5>
                        
                        <div class="form-check border rounded p-3 mb-2 bg-light">
                            <input class="form-check-input ms-1" type="radio" name="payment_method" id="pay1" value="1" checked>
                            <label class="form-check-label fw-bold ms-2" for="pay1">
                                Thanh toán khi nhận hàng (COD)
                            </label>
                            <div class="text-muted small ms-2 mt-1">Bạn sẽ thanh toán bằng tiền mặt khi shipper giao hàng tới.</div>
                        </div>
                        
                        <div class="form-check border rounded p-3">
                            <input class="form-check-input ms-1" type="radio" name="payment_method" id="pay2" value="2">
                            <label class="form-check-label fw-bold ms-2" for="pay2">
                                Chuyển khoản ngân hàng (Quét mã QR)
                            </label>
                            <div class="text-muted small ms-2 mt-1">Hệ thống sẽ hiển thị mã QR tự động điền tiền và nội dung.</div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-5">
                <div class="card border-0 shadow-sm rounded-3">
                    <div class="card-body p-4">
                        <h5 class="fw-bold mb-4 border-bottom pb-2">Đơn hàng của bạn</h5>
                        
                        <div class="mb-4" style="max-height: 300px; overflow-y: auto;">
                            <?php 
                            $totalPrice = 0;
                            foreach ($cart as $item): 
                                $totalPrice += $item['price'] * $item['quantity'];
                            ?>
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <div class="d-flex align-items-center">
                                    <div class="position-relative">
                                        <img src="<?= BASE_ASSETS_UPLOADS_PRODUCT . $item['image_url'] ?>" class="border rounded p-1" width="50" height="50" style="object-fit: contain;">
                                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-secondary border border-light"><?= $item['quantity'] ?></span>
                                    </div>
                                    <span class="ms-3 fw-semibold small text-truncate" style="max-width: 150px;"><?= $item['name'] ?></span>
                                </div>
                                <span class="fw-bold text-danger"><?= number_format($item['price'] * $item['quantity']) ?>đ</span>
                            </div>
                            <?php endforeach; ?>
                        </div>

                        <div class="d-flex justify-content-between mb-2">
                            <span class="text-muted">Tổng tiền hàng:</span>
                            <span class="fw-semibold"><?= number_format($totalPrice) ?>đ</span>
                        </div>
                        <div class="d-flex justify-content-between mb-3 border-bottom pb-3">
                            <span class="text-muted">Phí vận chuyển:</span>
                            <span class="fw-semibold text-success">Miễn phí</span>
                        </div>
                        
                        <div class="d-flex justify-content-between mb-4">
                            <span class="fw-bold fs-5">TỔNG CỘNG:</span>
                            <span class="fw-bold fs-4 text-danger"><?= number_format($totalPrice) ?>đ</span>
                        </div>

                        <button type="submit" class="btn btn-danger w-100 py-3 fw-bold text-uppercase rounded-3 shadow">
                            XÁC NHẬN ĐẶT HÀNG
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>