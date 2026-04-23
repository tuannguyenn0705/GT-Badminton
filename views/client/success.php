<div class="container mt-5 mb-5 text-center">
    <div class="row justify-content-center">
        <div class="col-lg-6">
            <div class="card border-0 shadow-lg rounded-4 overflow-hidden">
                <div class="bg-success py-4">
                    <i class="fa-solid fa-circle-check text-white" style="font-size: 4rem;"></i>
                    <h3 class="text-white fw-bold mt-3 m-0">ĐẶT HÀNG THÀNH CÔNG!</h3>
                </div>

                <div class="card-body p-5 bg-white">
                    <p class="fs-5 mb-1">Cảm ơn bạn đã mua sắm tại <strong>GT Badminton</strong>.</p>
                    <p class="text-muted mb-4">Mã đơn hàng của bạn là: <span class="fw-bold text-danger fs-5"><?= $order['order_id'] ?></span></p>

                    <div class="alert alert-light border shadow-sm mb-4 text-start">
                        <div class="d-flex justify-content-between mb-2">
                            <span class="text-muted">Tổng thanh toán:</span>
                            <span class="fw-bold text-danger fs-5"><?= number_format($order['total_price']) ?>đ</span>
                        </div>
                        <div class="d-flex justify-content-between">
                            <span class="text-muted">Phương thức:</span>
                            <span class="fw-bold text-dark">
                                <?= $order['payment_method'] == 1 ? 'Thanh toán khi nhận hàng (COD)' : 'Chuyển khoản ngân hàng' ?>
                            </span>
                        </div>
                    </div>

                    <?php if ($order['payment_method'] == 2): ?>
                        <div class="border border-danger border-2 rounded-3 p-4 mb-4 bg-light position-relative">
                            <span class="position-absolute top-0 start-50 translate-middle badge bg-danger fs-6 px-4 py-2 rounded-pill">Quét mã để thanh toán</span>

                            <img src="https://img.vietqr.io/image/VCB-1049308625-compact2.png?amount=<?= $order['total_price'] ?>&addInfo=Thanh toan don <?= $order['order_id'] ?>&accountName=NGUYEN GIA TUAN"
                                class="img-fluid rounded shadow-sm mb-3 mt-3"
                                style="max-width: 280px;"
                                alt="QR Code">

                            <p class="text-muted small m-0">Vui lòng sử dụng App Ngân hàng hoặc Momo/ZaloPay để quét mã.<br>Đơn hàng sẽ được xử lý ngay sau khi nhận được tiền.</p>
                        </div>
                    <?php endif; ?>

                    <a href="<?= BASE_URL ?>" class="btn btn-outline-danger rounded-pill px-5 fw-bold mt-2">
                        <i class="fa-solid fa-arrow-left me-2"></i> Quay lại trang chủ
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<?php

unset($_SESSION['order_success']);
?>