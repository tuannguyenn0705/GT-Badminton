<div class="container mt-4 mb-5">
    <h3 class="fw-bold text-uppercase mb-4"><i class="fa-solid fa-cart-shopping text-danger"></i> Giỏ hàng của bạn</h3>

    <?php if (empty($cart)): ?>
        <div class="text-center py-5 bg-white rounded shadow-sm border">
            <img src="https://deo.shopeemobile.com/shopee/shopee-pcmall-live-sg/cart/9bdd8040b334d31946f4.png" alt="Empty Cart" width="150" class="mb-3">
            <h5 class="text-muted">Giỏ hàng của bạn đang trống</h5>
            <a href="<?= BASE_URL ?>" class="btn btn-danger mt-3 px-4 rounded-pill">Tiếp tục mua sắm</a>
        </div>
    <?php else: ?>
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
                                        <td class="text-center">
                                            <span class="badge bg-light text-dark border px-3 py-2 fs-6"><?= $item['quantity'] ?></span>
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
                <div class="mt-3">
                    <a href="<?= BASE_URL ?>" class="text-decoration-none text-danger"><i class="fa-solid fa-arrow-left"></i> Mua thêm sản phẩm khác</a>
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
                            <span class="text-muted">Phí giao hàng:</span>
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
    <?php endif; ?>
</div>