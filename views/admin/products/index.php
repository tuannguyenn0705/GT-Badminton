<div class="d-flex justify-content-between align-items-center mb-3">
    <h2>Danh sách Sản phẩm</h2>
    <a href="<?= BASE_URL_ADMIN ?>&action=product-create" class="btn btn-success">+ Thêm mới</a>
</div>

<div class="table-responsive">
    <table class="table table-bordered table-hover align-middle text-center">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Hình ảnh</th>
                <th>Tên Vợt/Áo</th>
                <th>Danh mục</th>
                <th>Giá</th>
                <th>Tồn kho</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($products as $pro): ?>
                <tr>
                    <td><?= $pro['id'] ?></td>
                    <td>
                        <?php if (!empty($pro['image_url'])): ?>
                            <img src="<?= BASE_ASSETS_UPLOADS . $pro['image_url'] ?>" alt="" width="60" height="60" class="object-fit-cover rounded">
                        <?php else: ?>
                            <span class="badge bg-secondary">Chưa có ảnh</span>
                        <?php endif; ?>
                    </td>
                    <td class="fw-bold text-primary text-start"><?= $pro['name'] ?></td>
                    <td><span class="badge bg-info text-dark"><?= $pro['category_name'] ?></span></td>
                    <td class="text-danger fw-bold"><?= number_format($pro['price']) ?> đ</td>
                    <td><?= $pro['quantity'] ?></td>
                    <td>
                        <a href="<?= BASE_URL_ADMIN ?>&action=product-edit&id=<?= $pro['id'] ?>" class="btn btn-warning btn-sm">Sửa</a>
                        <a href="<?= BASE_URL_ADMIN ?>&action=product-delete&id=<?= $pro['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Xóa sản phẩm này?')">Xóa</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>