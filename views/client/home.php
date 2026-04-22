<div class="container mt-4">
    <div id="slide-demo" class="carousel slide shadow" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#slide-demo" data-bs-slide-to="0" class="active"></button>
            <button type="button" data-bs-target="#slide-demo" data-bs-slide-to="1"></button>
            <button type="button" data-bs-target="#slide-demo" data-bs-slide-to="2"></button>
            <button type="button" data-bs-target="#slide-demo" data-bs-slide-to="3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="./assets/uploads/img1.webp" class="d-block w-100" alt="Banner 1">
            </div>
            <div class="carousel-item">
                <img src="./assets/uploads/img2.webp" class="d-block w-100" alt="Banner 2">
            </div>
            <div class="carousel-item">
                <img src="./assets/uploads/img3.webp" class="d-block w-100" alt="Banner 3">
            </div>
            <div class="carousel-item">
                <img src="./assets/uploads/img4.webp" class="d-block w-100" alt="Banner 4">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#slide-demo" data-bs-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#slide-demo" data-bs-slide="next">
            <span class="carousel-control-next-icon"></span>
        </button>
    </div>

    <div class="pt-5 pb-5">
        <div class="d-flex justify-content-between align-items-end mb-4">
            <div>
                <h2 class="fw-bold text-uppercase m-0">Sản phẩm mới nhất</h2>
                <div class="bg-danger" style="height: 4px; width: 60px;"></div>
            </div>
            <a href="#" class="text-danger fw-bold text-decoration-none">Xem tất cả →</a>
        </div>

        <div class="row g-4">
            <?php foreach ($data as $pro): ?>
            
                <div class="col-6 col-md-4 col-lg-3">
                    <div class="card h-100 shadow-sm custom-card">
                        <div class="product-img-container">
                            <img src="<?= BASE_ASSETS_UPLOADS_PRODUCT . $pro['image_url'] ?>" alt="<?= $pro['name'] ?>">
                        </div>
                        <div class="card-body p-3 text-center d-flex flex-column">
                            <p class="text-muted small mb-1">GT Badminton Shop</p>
                            <h6 class="card-title fw-bold text-truncate" title="<?= $pro['name'] ?>"><?= $pro['name'] ?></h6>
                            <div class="mb-3">
                                <span class="price-new"><?= number_format($pro['price']) ?>đ</span><br>
                                <span class="price-old"><?= number_format($pro['price'] * 1.2) ?>đ</span>
                            </div>
                            <button type="button" class="btn btn-danger mt-auto w-100 rounded-pill btn-sm fw-bold shadow-sm" data-bs-toggle="modal" data-bs-target="#modalProductHome<?= $pro['id'] ?>">
                                <i class="fa-solid fa-cart-plus me-1"></i> Mua ngay
                            </button>
                        </div>
                    </div>
                </div>

                <div class="modal fade" id="modalProductHome<?= $pro['id'] ?>" tabindex="-1" aria-hidden="true">
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
        </div>
    </div>
</div>