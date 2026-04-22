<div class="container mt-4 mb-5" style="min-height: 50vh;">
    <h3 class="fw-bold text-uppercase mb-4"><i class="fa-solid fa-clock-rotate-left text-danger"></i> Lịch sử đơn hàng</h3>

    <?php if (empty($orders)): ?>
        <div class="text-center py-5 bg-white rounded shadow-sm border">
            <h5 class="text-muted">Bạn chưa có đơn hàng nào.</h5>
            <a href="<?= BASE_URL ?>" class="btn btn-danger mt-3 px-4 rounded-pill">Mua sắm ngay</a>
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
                                            if($od['status'] == 0) echo '<span class="badge bg-warning text-dark">Chờ xử lý</span>';
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