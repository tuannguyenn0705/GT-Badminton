<?php
// Tự động định nghĩa Thương hiệu theo Danh mục ID
$brand_list = [];
if ($category['id'] == 4) $brand_list = ['Yonex', 'Lining', 'Victor', 'Mizuno', 'VSE']; // Vợt
if ($category['id'] == 9) $brand_list = ['Yonex', 'Lining', 'Victor', 'Mizuno', 'Kawasaki']; // Giày
if ($category['id'] == 7) $brand_list = ['Yonex', 'Lining', 'Victor', 'Mizuno']; // Áo
if ($category['id'] == 11) $brand_list = ['Yonex', 'Lining', 'Victor']; // Phụ kiện
?>

<div class="container mt-4 mb-5">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= BASE_URL ?>" class="text-decoration-none text-dark"><i class="fa-solid fa-house"></i> Trang chủ</a></li>
            <li class="breadcrumb-item active fw-bold text-danger" aria-current="page"><?= $category['name'] ?></li>
        </ol>
    </nav>

    <div class="row mt-4">
        <div class="col-lg-3">
            <form action="<?= BASE_URL ?>" method="GET" id="filterForm">
                <input type="hidden" name="action" value="category">
                <input type="hidden" name="id" value="<?= $category['id'] ?>">

                <div class="border rounded p-3 bg-white shadow-sm mb-4">
                    <h6 class="fw-bold mb-3 border-bottom pb-2">CHỌN MỨC GIÁ</h6>
                    <?php
                    $price_options = [
                        'under-500' => 'Giá dưới 500.000đ',
                        '500-1000' => '500.000đ - 1 triệu',
                        '1000-2000' => '1 - 2 triệu',
                        '2000-3000' => '2 - 3 triệu',
                        'over-3000' => 'Giá trên 3 triệu'
                    ];
                    foreach ($price_options as $key => $label):
                        $checked = in_array($key, $_GET['prices'] ?? []) ? 'checked' : '';
                    ?>
                        <div class="form-check mb-2">
                            <input class="form-check-input" type="checkbox" name="prices[]" value="<?= $key ?>" id="p-<?= $key ?>" <?= $checked ?> onchange="this.form.submit()">
                            <label class="form-check-label text-muted small" for="p-<?= $key ?>"><?= $label ?></label>
                        </div>
                    <?php endforeach; ?>

                    <h6 class="fw-bold mb-3 mt-4 border-bottom pb-2">THƯƠNG HIỆU</h6>
                    <?php foreach ($brand_list as $brand): 
                        $checked_brand = in_array($brand, $_GET['brands'] ?? []) ? 'checked' : '';
                    ?>
                        <div class="form-check mb-2">
                            <input class="form-check-input" type="checkbox" name="brands[]" value="<?= $brand ?>" id="b-<?= $brand ?>" <?= $checked_brand ?> onchange="this.form.submit()">
                            <label class="form-check-label text-muted small" for="b-<?= $brand ?>"><?= $brand ?></label>
                        </div>
                    <?php endforeach; ?>
                    
                    <?php if(!empty($_GET['brands']) || !empty($_GET['prices'])): ?>
                        <a href="<?= BASE_URL ?>?action=category&id=<?= $category['id'] ?>" class="btn btn-sm btn-outline-secondary w-100 mt-3 rounded-pill">Xóa bộ lọc</a>
                    <?php endif; ?>
                </div>
            </form>
        </div>

        <div class="col-lg-9">
            <div class="d-flex justify-content-between align-items-center mb-4 bg-light p-2 rounded">
                <h5 class="fw-bold text-uppercase m-0 ps-2" style="color: #333;"><?= $category['name'] ?></h5>
            </div>

            <div class="row g-3">
                <?php if (empty($products)): ?>
                    <div class="col-12 text-center py-5">
                        <p class="text-muted mt-3">Không tìm thấy sản phẩm nào khớp với bộ lọc.</p>
                    </div>
                <?php else: ?>
                    <?php foreach ($products as $pro): ?>
                        <div class="col-6 col-md-4 col-lg-3">
                            <div class="card h-100 border-0 shadow-sm custom-card">
                                <a href="<?= BASE_URL ?>?action=detail&id=<?= $pro['id'] ?>" class="d-block text-center p-3">
                                    <img src="<?= BASE_ASSETS_UPLOADS . $pro['image_url'] ?>" class="img-fluid" style="height: 180px; object-fit: contain;">
                                </a>
                                <div class="card-body p-3 pt-0 d-flex flex-column text-center">
                                    <h6 class="product-title fw-bold mb-2"><?= $pro['name'] ?></h6>
                                    <div class="text-danger fw-bold mb-2"><?= number_format($pro['price']) ?> đ</div>
                                    <button type="button" class="btn btn-danger mt-auto rounded-pill btn-sm" data-bs-toggle="modal" data-bs-target="#modalProduct<?= $pro['id'] ?>">Mua ngay</button>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>