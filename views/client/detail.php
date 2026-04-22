<div class="container mt-4 mb-5">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-transparent p-0 mb-4">
            <li class="breadcrumb-item"><a href="<?= BASE_URL ?>" class="text-decoration-none text-dark">Trang chủ</a></li>
            <li class="breadcrumb-item active fw-bold text-danger" aria-current="page"><?= $product['name'] ?></li>
        </ol>
    </nav>

    <div class="row g-5">
        <div class="col-md-6">
            <div class="sticky-top" style="top: 100px; z-index: 1;">
                <div class="border rounded-4 overflow-hidden bg-white shadow-sm mb-3">
                    <img src="<?= BASE_ASSETS_UPLOADS_PRODUCT . $product['image_url'] ?>" class="img-fluid w-100" id="mainImage" style="object-fit: contain; height: 500px;">
                </div>
                <div class="d-flex gap-2">
                    <div class="border rounded p-1" style="width: 80px; cursor: pointer;">
                        <img src="<?= BASE_ASSETS_UPLOADS_PRODUCT . $product['image_url'] ?>" class="img-fluid rounded">
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="product-info-header mb-4">
                <span class="badge bg-danger mb-2 px-3 py-2 text-uppercase">Mới về</span>
                <h2 class="fw-bold text-dark mb-2"><?= $product['name'] ?></h2>
                <div class="d-flex align-items-center gap-3 mb-3">
                    <span class="text-warning"><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star-half-stroke"></i></span>
                    <span class="text-muted small">| Đã bán: 1.2k</span>
                </div>
                <div class="d-flex align-items-center gap-3">
                    <h2 class="text-danger fw-bold m-0"><?= number_format($product['price']) ?> ₫</h2>
                    <del class="text-muted fs-5"><?= number_format($product['price'] * 1.2) ?> ₫</del>
                    <span class="badge bg-danger rounded-pill">-20%</span>
                </div>
            </div>

            <div class="border-top border-bottom py-3 mb-4">
                <div class="row g-2">
                    <div class="col-6"><span class="text-muted">Thương hiệu:</span> <span class="fw-bold text-primary">Yonex</span></div>
                    <div class="col-6"><span class="text-muted">Tình trạng:</span> <span class="fw-bold text-success">Còn hàng</span></div>
                    <div class="col-6"><span class="text-muted">Mã sản phẩm:</span> <span class="fw-bold">GT-<?= $product['id'] ?></span></div>
                    <div class="col-6"><span class="text-muted">Bảo hành:</span> <span class="fw-bold">12 tháng</span></div>
                </div>
            </div>

            <div class="card border-danger mb-4 bg-light shadow-sm">
                <div class="card-header bg-danger text-white fw-bold"><i class="fa-solid fa-gift me-2"></i> KHUYẾN MÃI ĐẶC BIỆT</div>
                <div class="card-body py-2">
                    <ul class="list-unstyled mb-0 small" style="line-height: 2;">
                        <li><i class="fa-solid fa-circle-check text-danger me-2"></i> Tặng bao vợt đơn chính hãng</li>
                        <li><i class="fa-solid fa-circle-check text-danger me-2"></i> Miễn phí căng vợt (nếu mua kèm cước)</li>
                        <li><i class="fa-solid fa-circle-check text-danger me-2"></i> Miễn phí ship đơn hàng trên 2 triệu</li>
                    </ul>
                </div>
            </div>

            <form action="<?= BASE_URL ?>?action=add-to-cart&id=<?= $product['id'] ?>" method="POST">
                <div class="d-flex align-items-center gap-3 mb-4">
                    <div class="input-group" style="width: 140px;">
                        <button class="btn btn-outline-secondary px-3" type="button" onclick="this.nextElementSibling.stepDown()">-</button>
                        <input type="number" name="quantity" class="form-control text-center fw-bold" value="1" min="1" max="<?= $product['quantity'] ?>" readonly>
                        <button class="btn btn-outline-secondary px-3" type="button" onclick="this.previousElementSibling.stepUp()">+</button>
                    </div>
                    <div class="text-muted small">Còn <strong><?= $product['quantity'] ?></strong> sản phẩm</div>
                </div>

                <div class="row g-2">
                    <div class="col-6">
                        <button type="submit" name="buy_now" value="0" class="btn btn-outline-danger w-100 py-3 fw-bold rounded-3">
                            <i class="fa-solid fa-cart-plus me-2"></i> THÊM GIỎ HÀNG
                        </button>
                    </div>
                    <div class="col-6">
                        <button type="submit" name="buy_now" value="1" class="btn btn-danger w-100 py-3 fw-bold rounded-3 shadow">
                            MUA NGAY
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="row mt-5 pt-5">
        <div class="col-12">
            <ul class="nav nav-tabs border-bottom-2 mb-4" id="productTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active fw-bold px-4 py-3 text-uppercase" data-bs-toggle="tab" data-bs-target="#desc" type="button">Mô tả sản phẩm</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link fw-bold px-4 py-3 text-uppercase" data-bs-toggle="tab" data-bs-target="#spec" type="button">Thông số kỹ thuật</button>
                </li>
            </ul>
            <div class="tab-content bg-white p-4 rounded shadow-sm border">
                <div class="tab-pane fade show active" id="desc">
                    <div class="lh-lg text-muted">
                        <?= nl2br($product['description'] ?? 'Đang cập nhật nội dung mô tả chi tiết cho sản phẩm này...') ?>
                    </div>
                </div>
                <div class="tab-pane fade" id="spec">
                    <table class="table table-bordered mb-0">
                        <tr class="bg-light"><th width="30%">Độ cứng</th><td>Trung bình</td></tr>
                        <tr><th>Trọng lượng</th><td>4U (83g)</td></tr>
                        <tr class="bg-light"><th>Sức căng tối đa</th><td>28 - 30 lbs</td></tr>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="mt-5 pt-4">
        <h3 class="fw-bold mb-4 border-start border-danger border-4 ps-3">SẢN PHẨM LIÊN QUAN</h3>
        <div class="row g-4">
            <?php foreach (array_slice($relatedProducts, 0, 4) as $rp): ?>
                <div class="col-md-3">
                    <div class="card h-100 border-0 shadow-sm custom-card text-center p-3">
                        <a href="<?= BASE_URL ?>?action=detail&id=<?= $rp['id'] ?>">
                            <img src="<?= BASE_ASSETS_UPLOADS . $rp['image_url'] ?>" class="img-fluid mb-2" style="height: 180px; object-fit: contain;">
                        </a>
                        <h6 class="fw-bold small mb-2"><?= $rp['name'] ?></h6>
                        <div class="text-danger fw-bold"><?= number_format($rp['price']) ?>đ</div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>