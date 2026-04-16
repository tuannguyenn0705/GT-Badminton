<div class="card shadow border-0">
    <div class="card-header bg-warning text-dark">
        <h5 class="mb-0">Cập nhật sản phẩm: <?= $product['name'] ?></h5>
    </div>
    <div class="card-body">
        <form action="<?= BASE_URL_ADMIN ?>&action=product-edit&id=<?= $product['id'] ?>" method="POST" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-bold">Tên sản phẩm</label>
                    <input type="text" class="form-control" name="name" value="<?= $product['name'] ?>" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-bold">Danh mục</label>
                    <select class="form-select" name="category_id" required>
                        <?php foreach($categories as $cat): ?>
                            <option value="<?= $cat['id'] ?>" <?= $product['category_id'] == $cat['id'] ? 'selected' : '' ?>>
                                <?= $cat['name'] ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-bold">Giá bán</label>
                    <input type="number" class="form-control" name="price" value="<?= $product['price'] ?>" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-bold">Số lượng</label>
                    <input type="number" class="form-control" name="quantity" value="<?= $product['quantity'] ?>" required>
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label fw-bold">Ảnh hiện tại</label><br>
                <img src="<?= BASE_ASSETS_UPLOADS . $product['image_url'] ?>" width="100" class="mb-2 rounded shadow-sm">
                <input type="file" class="form-control" name="image" accept="image/*">
                <small class="text-muted text-italic">(Chỉ chọn nếu muốn thay đổi ảnh)</small>
            </div>

            <div class="mb-3">
                <label class="form-label fw-bold">Mô tả</label>
                <textarea class="form-control" name="description" rows="4"><?= $product['description'] ?></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Cập nhật ngay</button>
            <a href="<?= BASE_URL_ADMIN ?>&action=products" class="btn btn-secondary">Quay lại</a>
        </form>
    </div>
</div>