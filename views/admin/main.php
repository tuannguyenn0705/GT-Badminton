<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?= $title ?? 'Home' ?></title>

    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>

    <nav class="navbar navbar-expand-xxl bg-light justify-content-center">
    <ul class="navbar-nav gap-3">
            <li class="nav-item">
                <a class="nav-link text-uppercase" href="<?= BASE_URL_ADMIN ?>"><b>Dashboard</b></a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-uppercase text-primary" href="<?= BASE_URL_ADMIN ?>&action=categories"><b>Quản lý Danh mục</b></a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-uppercase text-primary" href="<?= BASE_URL_ADMIN ?>&action=products"><b>Quản lý Sản phẩm</b></a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-uppercase text-danger" href="<?= BASE_URL ?>"><b>>> Về trang khách</b></a>
            </li>
        </ul>
    </nav>

    <div class="container">
        <h1 class="mt-3 mb-3"><?= $title ?? 'Home' ?></h1>

        <?php if (isset($_SESSION['success'])): ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Thành công!</strong> <?= $_SESSION['success'] ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php unset($_SESSION['success']); ?>
        <?php endif; ?>

        <?php if (isset($_SESSION['error'])): ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Lỗi!</strong> <?= $_SESSION['error'] ?>
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