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
                        <div class="card-body p-3 text-center">
                            <p class="text-muted small mb-1">GT Badminton Shop</p>
                            <h6 class="card-title fw-bold text-truncate" title="<?= $pro['name'] ?>"><?= $pro['name'] ?></h6>
                            <div class="mb-3">
                                <span class="price-new"><?= number_format($pro['price']) ?>đ</span><br>
                                <span class="price-old"><?= number_format($pro['price'] * 1.2) ?>đ</span>
                            </div>
                            <a href="<?= BASE_URL ?>?action=detail&id=<?= $pro['id'] ?>" class="btn btn-danger btn-buy w-100 shadow-sm">Mua ngay</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>