<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'Admin Dashboard' ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <style>
    /* Style dùng chung cho toàn bộ Admin */
    .admin-card { border-radius: 12px; border: none; box-shadow: 0 4px 15px rgba(0,0,0,0.05); }
    .admin-card-header { background: linear-gradient(135deg, #0dcaf0 0%, #0bacce 100%); color: white; border-radius: 12px 12px 0 0 !important; padding: 15px 20px; }
    .table-custom th { color: #6c757d; font-weight: 600; text-transform: uppercase; font-size: 0.85rem; border-bottom: 2px solid #e9ecef; }
    .table-custom td { vertical-align: middle; color: #495057; }
    .btn-cyan { background-color: #0dcaf0; color: white; border: none; }
    .btn-cyan:hover { background-color: #0bacce; color: white; }
    </style>
</head>

<body>

    <nav class="navbar navbar-expand-xxl bg-light justify-content-center shadow-sm">
        <ul class="navbar-nav gap-3">
            <li class="nav-item">
                <a class="nav-link text-uppercase text-primary" href="<?= BASE_URL_ADMIN ?>&action=categories"><b>Quản lý Danh mục</b></a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-uppercase text-primary" href="<?= BASE_URL_ADMIN ?>&action=products"><b>Quản lý Sản phẩm</b></a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-uppercase text-info" href="<?= BASE_URL_ADMIN ?>&action=users"><b>Quản lý Tài khoản</b></a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-uppercase text-danger" href="<?= BASE_URL ?>"><b>>> Về trang khách</b></a>
            </li>
        </ul>
    </nav>

    <div class="container mt-4">
        <?php if (isset($_SESSION['success'])): ?>
            <div class="alert alert-success alert-dismissible fade show border-0 shadow-sm" role="alert">
                <i class="fa-solid fa-check-circle me-2"></i><strong>Thành công!</strong> <?= $_SESSION['success'] ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php unset($_SESSION['success']); ?>
        <?php endif; ?>

        <?php if (isset($_SESSION['error'])): ?>
            <div class="alert alert-danger alert-dismissible fade show border-0 shadow-sm" role="alert">
                <i class="fa-solid fa-triangle-exclamation me-2"></i><strong>Lỗi!</strong> <?= $_SESSION['error'] ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php unset($_SESSION['error']); ?>
        <?php endif; ?>

        <div class="row">
            <?php
            if (isset($view)) {
                require_once PATH_VIEW_ADMIN . $view . '.php';
            }
            ?>
        </div>
    </div>

</body>
</html>