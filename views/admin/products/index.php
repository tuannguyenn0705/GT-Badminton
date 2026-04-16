<div class="d-flex justify-content-between align-items-center mb-4">
    <h3 class="fw-bold text-dark m-0">Quản lý kho hàng</h3>
    <a href="<?= BASE_URL_ADMIN ?>&action=product-create" class="btn btn-cyan shadow-sm rounded-pill px-4">
        <i class="fa-solid fa-plus me-1"></i> Thêm sản phẩm
    </a>
</div>

<div class="card admin-card">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover table-custom mb-0">
                <thead class="bg-light">
                    <tr>
                        <th class="ps-4">Sản phẩm</th>
                        <th>Danh mục</th>
                        <th>Giá bán</th>
                        <th>Tồn kho</th>
                        <th class="text-center pe-4">Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($products as $pro): ?>
                    <tr>
                        <td class="ps-4">
                            <div class="d-flex align-items-center">
                                <img src="<?= BASE_ASSETS_UPLOADS . $pro['image_url'] ?>" class="rounded shadow-sm me-3" width="48" height="48" style="object-fit: cover;">
                                <div>
                                    <div class="fw-bold text-dark"><?= $pro['name'] ?></div>
                                    <small class="text-muted">ID: #<?= $pro['id'] ?></small>
                                </div>
                            </div>
                        </td>
                        <td><span class="badge bg-light text-info border border-info px-2 py-1"><?= $pro['category_name'] ?></span></td>
                        <td><span class="fw-bold text-dark"><?= number_format($pro['price']) ?>đ</span></td>
                        <td>
                            <?php if($pro['quantity'] > 10): ?>
                                <span class="badge bg-success bg-opacity-10 text-success px-2 py-1"><?= $pro['quantity'] ?> sản phẩm</span>
                            <?php else: ?>
                                <span class="badge bg-warning bg-opacity-10 text-warning px-2 py-1"><?= $pro['quantity'] ?> (Sắp hết)</span>
                            <?php endif; ?>
                        </td>
                        <td class="text-center pe-4">
                            <a href="<?= BASE_URL_ADMIN ?>&action=product-edit&id=<?= $pro['id'] ?>" class="btn btn-sm btn-light text-primary me-1"><i class="fa-solid fa-pen-to-square"></i> Sửa</a>
                            <a href="<?= BASE_URL_ADMIN ?>&action=product-delete&id=<?= $pro['id'] ?>" class="btn btn-sm btn-light text-danger" onclick="return confirm('Xác nhận xóa?')"><i class="fa-solid fa-trash"></i> Xóa</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>