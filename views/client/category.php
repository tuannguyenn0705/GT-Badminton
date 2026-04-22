<div class="container mt-4 mb-5">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= BASE_URL ?>" class="text-decoration-none text-dark"><i class="fa-solid fa-house"></i> Trang chủ</a></li>
            <li class="breadcrumb-item active fw-bold text-danger" aria-current="page"><?= $category['name'] ?></li>
        </ol>
    </nav>

    <div class="row mt-4">
        <div class="col-lg-3 d-none d-lg-block">
            <div class="border rounded p-3 bg-white shadow-sm">
                <h6 class="fw-bold mb-3 border-bottom pb-2">CHỌN MỨC GIÁ</h6>
                <div class="form-check mb-2">
                    <input class="form-check-input" type="checkbox" id="price1">
                    <label class="form-check-label text-muted" for="price1">Giá dưới 500.000đ</label>
                </div>
                <div class="form-check mb-2">
                    <input class="form-check-input" type="checkbox" id="price2">
                    <label class="form-check-label text-muted" for="price2">500.000đ - 1 triệu</label>
                </div>
                <div class="form-check mb-2">
                    <input class="form-check-input" type="checkbox" id="price3">
                    <label class="form-check-label text-muted" for="price3">1 - 2 triệu</label>
                </div>
                <div class="form-check mb-2">
                    <input class="form-check-input" type="checkbox" id="price4">
                    <label class="form-check-label text-muted" for="price4">2 - 3 triệu</label>
                </div>
                <div class="form-check mb-2">
                    <input class="form-check-input" type="checkbox" id="price5">
                    <label class="form-check-label text-muted" for="price5">Giá trên 3 triệu</label>
                </div>

                <h6 class="fw-bold mb-3 mt-4 border-bottom pb-2">THƯƠNG HIỆU</h6>
                <div class="form-check mb-2"><input class="form-check-input" type="checkbox"><label class="form-check-label text-muted">Yonex</label></div>
                <div class="form-check mb-2"><input class="form-check-input" type="checkbox"><label class="form-check-label text-muted">Lining</label></div>
                <div class="form-check mb-2"><input class="form-check-input" type="checkbox"><label class="form-check-label text-muted">Victor</label></div>
            </div>
        </div>

        <div class="col-lg-9">
            <div class="d-flex justify-content-between align-items-center mb-4 bg-light p-2 rounded">
                <h5 class="fw-bold text-uppercase m-0 ps-2" style="color: #333;"><?= $category['name'] ?></h5>
                <div class="d-flex align-items-center">
                    <span class="me-2 text-muted small"><i class="fa-solid fa-arrow-down-a-z"></i> Sắp xếp:</span>
                    <select class="form-select form-select-sm border-0 shadow-sm" style="width: 150px;">
                        <option>Mặc định</option>
                        <option>Giá từ thấp đến cao</option>
                        <option>Giá từ cao đến thấp</option>
                    </select>
                </div>
            </div>

            <div class="row g-3">
                <?php if (empty($products)): ?>
                    <div class="col-12 text-center py-5">
                        <img src="https://shopvnb.com/templates/default/images/no-product.png" alt="No product" width="100">
                        <p class="text-muted mt-3">Đang cập nhật sản phẩm cho danh mục này...</p>
                    </div>
                <?php else: ?>
                    <?php foreach ($products as $pro): ?>
                        
                        <div class="col-6 col-md-4 col-lg-3">
                            <div class="card h-100 border-0 shadow-sm custom-card">
                                <div class="position-absolute top-0 end-0 m-2 badge bg-danger rounded-1">Premium</div>
                                <a href="<?= BASE_URL ?>?action=detail&id=<?= $pro['id'] ?>" class="d-block text-center p-3 bg-white" style="height: 220px; overflow: hidden;">
                                    <img src="<?= BASE_ASSETS_UPLOADS . $pro['image_url'] ?>" class="img-fluid transition-img h-100" style="object-fit: contain;" alt="<?= $pro['name'] ?>">
                                </a>
                                <div class="card-body p-3 pt-0 text-left d-flex flex-column">
                                    <a href="<?= BASE_URL ?>?action=detail&id=<?= $pro['id'] ?>" class="text-decoration-none text-dark">
                                        <h6 class="card-title product-title mb-2"><?= $pro['name'] ?></h6>
                                    </a>
                                    <div class="text-danger fw-bold fs-6 mb-2"><?= number_format($pro['price']) ?> đ</div>
                                    <div>
                                        <span class="d-inline-block bg-danger text-white small px-2 py-1 rounded-pill fw-bold mb-3" style="font-size: 0.75rem;">- 10%</span>
                                    </div>
                                    <button type="button" class="btn btn-danger mt-auto w-100 rounded-pill btn-sm fw-bold shadow-sm" data-bs-toggle="modal" data-bs-target="#modalProduct<?= $pro['id'] ?>">
                                        <i class="fa-solid fa-cart-plus me-1"></i> Mua ngay
                                    </button>
                                </div>
                            </div>
                        </div>

                        <div class="modal fade" id="modalProduct<?= $pro['id'] ?>" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-lg">
                                <div class="modal-content border-0 shadow-lg">
                                    <div class="modal-header border-0 pb-0">
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body pt-0 px-4 pb-4">
                                        <div class="row">
                                            <div class="col-md-5 text-center mb-3 mb-md-0 d-flex align-items-center justify-content-center">
                                                <img src="<?= BASE_ASSETS_UPLOADS_PRODUCT . $pro['image_url'] ?>" class="img-fluid rounded" style="max-height: 350px; object-fit: contain;">
                                            </div>
                                            <div class="col-md-7 text-start">
                                                <h4 class="fw-bold mb-2"><?= $pro['name'] ?></h4>
                                                <p class="text-muted small mb-2">
                                                    Thương hiệu: <span class="text-primary fw-bold">Đang cập nhật</span> |
                                                    Tình trạng: <span class="text-success fw-bold">Còn hàng</span>
                                                </p>
                                                <h3 class="text-danger fw-bold mb-3"><?= number_format($pro['price']) ?> ₫</h3>

                                                <div class="border rounded p-3 mb-4 bg-light">
                                                    <h6 class="fw-bold text-danger mb-2"><i class="fa-solid fa-gift me-1"></i> ƯU ĐÃI KHI MUA</h6>
                                                    <ul class="list-unstyled text-muted small mb-0" style="line-height: 1.8;">
                                                        <li><i class="fa-solid fa-check text-success me-2"></i> Sản phẩm cam kết chính hãng 100%</li>
                                                        <li><i class="fa-solid fa-check text-success me-2"></i> Thanh toán sau khi kiểm tra và nhận hàng</li>
                                                        <li><i class="fa-solid fa-check text-success me-2"></i> Bảo hành chính hãng theo nhà sản xuất</li>
                                                    </ul>
                                                </div>

                                                <form action="<?= BASE_URL ?>?action=add-to-cart&id=<?= $pro['id'] ?>" method="POST">
                                                    <div class="d-flex align-items-center mb-4">
                                                        <span class="me-3 fw-bold">Chọn số lượng:</span>
                                                        <div class="input-group input-group-sm" style="width: 130px;">
                                                            <button class="btn btn-outline-secondary px-3 fw-bold" type="button" onclick="this.nextElementSibling.stepDown()">-</button>
                                                            <input type="number" class="form-control text-center fw-bold" name="quantity" value="1" min="1" max="<?= $pro['quantity'] ?>" readonly>
                                                            <button class="btn btn-outline-secondary px-3 fw-bold" type="button" onclick="this.previousElementSibling.stepUp()">+</button>
                                                        </div>
                                                        <span class="ms-3 text-muted small">(Kho: <?= $pro['quantity'] ?>)</span>
                                                    </div>

                                                    <div class="d-flex gap-2">
                                                        <button type="submit" name="buy_now" value="0" class="btn btn-outline-danger w-50 py-2 fw-bold text-uppercase">
                                                            Thêm vào giỏ
                                                        </button>
                                                        <button type="submit" name="buy_now" value="1" class="btn btn-danger w-50 py-2 fw-bold text-uppercase shadow-sm">
                                                            Mua ngay
                                                        </button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>