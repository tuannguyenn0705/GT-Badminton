<div class="card shadow border-0">
    <div class="card-header bg-success text-white">
        <h5 class="mb-0">Thêm Danh Mục Mới</h5>
    </div>
    <div class="card-body">
        <form action="<?= BASE_URL_ADMIN ?>&action=category-create" method="POST">
            <div class="mb-3">
                <label class="form-label fw-bold">Tên danh mục</label>
                <input type="text" class="form-control" name="name" required placeholder="Ví dụ: Vợt cầu lông Yonex...">
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Mô tả (Không bắt buộc)</label>
                <textarea class="form-control" name="description" rows="3" placeholder="Nhập mô tả ngắn..."></textarea>
            </div>
            <button type="submit" class="btn btn-success">Lưu lại</button>
            <a href="<?= BASE_URL_ADMIN ?>&action=categories" class="btn btn-secondary">Hủy</a>
        </form>
    </div>
</div>