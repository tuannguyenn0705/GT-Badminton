<div class="d-flex justify-content-between align-items-center mb-3">
    <h2>Danh sách Danh mục</h2>
    <a href="<?= BASE_URL_ADMIN ?>&action=category-create" class="btn btn-success">+ Thêm mới</a>
</div>

<div class="table-responsive">
    <table class="table table-bordered table-hover align-middle text-center">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Tên danh mục</th>
                <th>Mô tả</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($categories as $cat): ?>
            <tr>
                <td><?= $cat['id'] ?></td>
                <td class="fw-bold text-primary"><?= $cat['name'] ?></td>
                <td><?= $cat['description'] ?></td>
                <td>
                    <a href="<?= BASE_URL_ADMIN ?>&action=category-edit&id=<?= $cat['id'] ?>" class="btn btn-warning btn-sm">Sửa</a>
                    <a href="<?= BASE_URL_ADMIN ?>&action=category-delete&id=<?= $cat['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Bạn có chắc chắn muốn xóa danh mục này? Các sản phẩm bên trong cũng sẽ bị xóa theo!')">Xóa</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>