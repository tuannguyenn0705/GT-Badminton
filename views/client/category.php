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
                <?php if(empty($products)): ?>
                    <div class="col-12 text-center py-5">
                        <img src="https://shopvnb.com/templates/default/images/no-product.png" alt="No product" width="100">
                        <p class="text-muted mt-3">Đang cập nhật sản phẩm cho danh mục này...</p>
                    </div>
                <?php else: ?>
                    <?php foreach($products as $pro): ?>
                    <div class="col-6 col-md-4 col-lg-3">
                        <div class="card h-100 border-0 shadow-sm custom-card">
                            <div class="position-absolute top-0 end-0 m-2 badge bg-danger rounded-1">Premium</div>
                            <a href="<?= BASE_URL ?>?action=detail&id=<?= $pro['id'] ?>" class="d-block text-center p-3 bg-white" style="height: 220px; overflow: hidden;">
                                <img src="<?= BASE_ASSETS_UPLOADS . $pro['image_url'] ?>" class="img-fluid transition-img h-100" style="object-fit: contain;" alt="<?= $pro['name'] ?>">
                            </a>
                            <div class="card-body p-3 pt-0 text-left">
                                <a href="<?= BASE_URL ?>?action=detail&id=<?= $pro['id'] ?>" class="text-decoration-none text-dark">
                                    <h6 class="card-title product-title mb-2"><?= $pro['name'] ?></h6>
                                </a>
                                <div class="text-danger fw-bold fs-6 mb-2"><?= number_format($pro['price']) ?> đ</div>
                                <div class="d-inline-block bg-danger text-white small px-2 py-1 rounded-pill fw-bold" style="font-size: 0.75rem;">- 10%</div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<style>
    /* Style đặc trưng giống VNB */
    .product-title { font-size: 0.9rem; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; line-height: 1.4; height: 2.8em; }
    .filter-sidebar .form-check-label { font-size: 0.9rem; cursor: pointer; }
    .custom-card { border-radius: 10px; transition: transform 0.2s, box-shadow 0.2s; background: #fff; }
    .custom-card:hover { transform: translateY(-5px); box-shadow: 0 10px 20px rgba(0,0,0,0.1) !important; border: 1px solid #dc3545; }
    .transition-img { transition: transform 0.3s; }
    .custom-card:hover .transition-img { transform: scale(1.08); }
</style>