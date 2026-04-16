<div class="d-flex justify-content-between align-items-center mb-4">
    <h3 class="fw-bold text-dark m-0">Quản lý Danh mục</h3>
    <a href="<?= BASE_URL_ADMIN ?>&action=category-create" class="btn btn-cyan shadow-sm rounded-pill px-4">
        <i class="fa-solid fa-plus me-1"></i> Thêm danh mục
    </a>
</div>

<div class="card admin-card">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover table-custom mb-0">
                <thead class="bg-light">
                    <tr>
                        <th class="ps-4">ID</th>
                        <th>Tên danh mục</th>
                        <th>Mô tả</th>
                        <th class="text-center pe-4">Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($categories as $cat): ?>
                    <tr>
                        <td class="ps-4 fw-bold text-muted">#<?= $cat['id'] ?></td>
                        <td>
                            <span class="fw-bold fs-6" style="color: #0bacce;"><?= $cat['name'] ?></span>
                        </td>
                        <td class="text-muted"><?= $cat['description'] ?></td>
                        <td class="text-center pe-4">
                            <a href="<?= BASE_URL_ADMIN ?>&action=category-edit&id=<?= $cat['id'] ?>" class="btn btn-sm btn-light text-primary me-1">
                                <i class="fa-solid fa-pen-to-square"></i> Sửa
                            </a>
                            <a href="<?= BASE_URL_ADMIN ?>&action=category-delete&id=<?= $cat['id'] ?>" class="btn btn-sm btn-light text-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa danh mục này? Các sản phẩm bên trong cũng sẽ bị xóa theo!')">
                                <i class="fa-solid fa-trash"></i> Xóa
                            </a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>