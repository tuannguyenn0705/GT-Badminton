<div class="card shadow border-0">
    <div class="card-header bg-warning">
        <h5 class="mb-0">Sửa Danh Mục: <?= $category['name'] ?></h5>
    </div>
    <div class="card-body">
        <form action="<?= BASE_URL_ADMIN ?>&action=category-edit&id=<?= $category['id'] ?>" method="POST">
            <div class="mb-3">
                <label class="form-label fw-bold">Tên danh mục</label>
                <input type="text" class="form-control" name="name" required value="<?= $category['name'] ?>">
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Mô tả</label>
                <textarea class="form-control" name="description" rows="3"><?= $category['description'] ?></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Cập nhật</button>
            <a href="<?= BASE_URL_ADMIN ?>&action=categories" class="btn btn-secondary">Hủy</a>
        </form>
    </div>
</div>