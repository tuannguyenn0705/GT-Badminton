<div class="card shadow border-0">
    <div class="card-header bg-success text-white">
        <h5 class="mb-0">Thêm Sản Phẩm Mới</h5>
    </div>
    <div class="card-body">
        <form action="<?= BASE_URL_ADMIN ?>&action=product-create" method="POST" enctype="multipart/form-data">
            
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-bold">Tên sản phẩm</label>
                    <input type="text" class="form-control" name="name" required placeholder="Nhập tên vợt/áo/giày...">
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-bold">Danh mục</label>
                    <select class="form-select" name="category_id" required>
                        <option value="">-- Chọn danh mục --</option>
                        <?php foreach($categories as $cat): ?>
                            <option value="<?= $cat['id'] ?>"><?= $cat['name'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-bold">Giá bán (VNĐ)</label>
                    <input type="number" class="form-control" name="price" required placeholder="Ví dụ: 1500000">
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-bold">Số lượng (Tồn kho)</label>
                    <input type="number" class="form-control" name="quantity" required placeholder="Ví dụ: 50">
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label fw-bold">Ảnh đại diện</label>
                <input type="file" class="form-control" name="image" accept="image/*" required>
            </div>

            <div class="mb-3">
                <label class="form-label fw-bold">Mô tả chi tiết</label>
                <textarea class="form-control" name="description" rows="4" placeholder="Nhập mô tả sản phẩm..."></textarea>
            </div>

            <button type="submit" class="btn btn-success">Lưu Sản Phẩm</button>
            <a href="<?= BASE_URL_ADMIN ?>&action=products" class="btn btn-secondary">Hủy</a>
        </form>
    </div>
</div>