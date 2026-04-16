<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="text-uppercase fw-bold text-primary">Quản lý kho hàng</h2>
    <a href="<?= BASE_URL_ADMIN ?>&action=product-create" class="btn btn-success shadow-sm">+ Thêm sản phẩm mới</a>
</div>

<div class="card shadow-sm border-0">
    <div class="card-body p-0">
        <table class="table table-hover align-middle mb-0">
            <thead class="table-light">
                <tr>
                    <th class="ps-3">Sản phẩm</th>
                    <th>Danh mục</th>
                    <th>Giá bán</th>
                    <th>Tồn kho</th>
                    <th class="text-center">Hành động</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($products as $pro): ?>
                <tr>
                    <td class="ps-3">
                        <div class="d-flex align-items-center">
                            <img src="<?= BASE_ASSETS_UPLOADS . $pro['image_url'] ?>" class="rounded me-3 border" width="50" height="50" style="object-fit: cover;">
                            <div>
                                <div class="fw-bold"><?= $pro['name'] ?></div>
                                <small class="text-muted">ID: #<?= $pro['id'] ?></small>
                            </div>
                        </div>
                    </td>
                    <td><span class="badge bg-info text-dark fw-normal"><?= $pro['category_name'] ?></span></td>
                    <td><span class="fw-bold text-danger"><?= number_format($pro['price']) ?>đ</span></td>
                    <td>
                        <?php if($pro['quantity'] > 10): ?>
                            <span class="text-success border-bottom border-success"><?= $pro['quantity'] ?> cái</span>
                        <?php else: ?>
                            <span class="text-warning fw-bold"><?= $pro['quantity'] ?> (Sắp hết)</span>
                        <?php endif; ?>
                    </td>
                    <td class="text-center">
                        <a href="<?= BASE_URL_ADMIN ?>&action=product-edit&id=<?= $pro['id'] ?>" class="btn btn-sm btn-outline-warning me-1">Sửa</a>
                        <a href="<?= BASE_URL_ADMIN ?>&action=product-delete&id=<?= $pro['id'] ?>" class="btn btn-sm btn-outline-danger" onclick="return confirm('Xác nhận xóa?')">Xóa</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>