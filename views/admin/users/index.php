<div class="d-flex justify-content-between align-items-center mb-4">
    <h3 class="fw-bold text-dark m-0">Quản lý Tài khoản</h3>
</div>

<div class="card admin-card">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover table-custom mb-0">
                <thead class="bg-light">
                    <tr>
                        <th class="ps-4">ID</th>
                        <th>Tên đăng nhập</th>
                        <th>Email</th>
                        <th>Ngày tạo</th>
                        <th>Trạng thái</th>
                        <th class="text-center pe-4">Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($users as $u): ?>
                    <tr>
                        <td class="ps-4 fw-bold text-muted">#<?= $u['id'] ?></td>
                        <td>
                            <div class="fw-bold text-dark"><?= $u['username'] ?></div>
                            <?php if($u['is_admin'] == 1): ?>
                                <span class="badge bg-danger rounded-pill" style="font-size: 0.65rem;">Admin</span>
                            <?php endif; ?>
                        </td>
                        <td><?= $u['email'] ?></td>
                        <td><?= date('d/m/Y H:i', strtotime($u['created_at'])) ?></td>
                        <td>
                            <?php if($u['status'] == 1): ?>
                                <span class="badge bg-success">Đang hoạt động</span>
                            <?php else: ?>
                                <span class="badge bg-secondary">Tạm khóa</span>
                            <?php endif; ?>
                        </td>
                        <td class="text-center pe-4">
                            <?php if($u['is_admin'] != 1): // Không cho phép khóa/xóa Admin khác ?>
                                <?php if($u['status'] == 1): ?>
                                    <a href="<?= BASE_URL_ADMIN ?>&action=user-toggle&id=<?= $u['id'] ?>" class="btn btn-sm btn-outline-warning me-1">Khóa</a>
                                <?php else: ?>
                                    <a href="<?= BASE_URL_ADMIN ?>&action=user-toggle&id=<?= $u['id'] ?>" class="btn btn-sm btn-outline-success me-1">Mở khóa</a>
                                <?php endif; ?>
                                <a href="<?= BASE_URL_ADMIN ?>&action=user-delete&id=<?= $u['id'] ?>" class="btn btn-sm btn-outline-danger" onclick="return confirm('Xóa vĩnh viễn tài khoản này?')">Xóa</a>
                            <?php endif; ?>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>