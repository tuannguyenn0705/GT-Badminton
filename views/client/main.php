<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'GT Badminton - Thế giới cầu lông' ?></title>

    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <style>
        html {
            scrollbar-gutter: stable;
        }

        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f8f9fa;
            overflow-y: scroll;
        }

        .navbar {
            border-bottom: 2px solid #dc3545;
        }

        .custom-card {
            transition: all 0.3s ease;
            border: none;
            border-radius: 15px;
            overflow: hidden;
        }

        .custom-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1) !important;
        }

        .product-img-container {
            height: 280px;
            background-color: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
        }

        .product-img-container img {
            transition: transform 0.5s ease;
            max-width: 90%;
            max-height: 90%;
        }

        .custom-card:hover .product-img-container img {
            transform: scale(1.1);
        }

        .btn-buy {
            border-radius: 50px;
            font-weight: bold;
            text-transform: uppercase;
            font-size: 0.8rem;
            letter-spacing: 1px;
        }

        .price-new {
            color: #dc3545;
            font-size: 1.2rem;
            font-weight: 700;
        }

        .price-old {
            color: #6c757d;
            text-decoration: line-through;
            font-size: 0.9rem;
        }

        .carousel-item img {
            border-radius: 20px;
        }

        /* Style cho trang danh mục (category) */
        .product-title {
            font-size: 0.9rem;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
            line-height: 1.4;
            height: 2.8em;
        }

        .filter-sidebar .form-check-label {
            font-size: 0.9rem;
            cursor: pointer;
        }

        .transition-img {
            transition: transform 0.3s;
        }

        .custom-card:hover .transition-img {
            transform: scale(1.08);
        }
    </style>
</head>

<body class="d-flex flex-column min-vh-100">

    <nav class="navbar navbar-expand-lg navbar-light bg-white sticky-top shadow-sm">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="<?= BASE_URL ?>">
                <img src="./assets/uploads/logo.jpg" alt="Logo" width="50" height="50" class="me-2">
                <span class="fw-bold text-danger">GT BADMINTON</span>
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link fw-bold text-uppercase" href="<?= BASE_URL ?>?action=category&id=4">Vợt Cầu Lông</a></li>
                    <li class="nav-item"><a class="nav-link fw-bold text-uppercase" href="<?= BASE_URL ?>?action=category&id=9">Giày Cầu Lông</a></li>
                    <li class="nav-item"><a class="nav-link fw-bold text-uppercase" href="<?= BASE_URL ?>?action=category&id=7">Quần Áo</a></li>
                    <li class="nav-item"><a class="nav-link fw-bold text-uppercase" href="<?= BASE_URL ?>?action=category&id=11">Phụ Kiện</a></li>
                </ul>

                <ul class="navbar-nav align-items-center">
                    <?php if (isset($_SESSION['user'])): ?>

                        <li class="nav-item me-4 d-flex align-items-center">
                            <a href="<?= BASE_URL ?>?action=view-cart" class="text-dark position-relative text-decoration-none">
                                <i class="fa-solid fa-cart-shopping fs-5"></i>
                                <?php
                                $cartCount = 0;
                                if (isset($_SESSION['cart'])) {
                                    foreach ($_SESSION['cart'] as $item) {
                                        $cartCount += $item['quantity'];
                                    }
                                }
                                if ($cartCount > 0):
                                ?>
                                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger" style="font-size: 0.65rem;">
                                        <?= $cartCount ?>
                                    </span>
                                <?php endif; ?>
                            </a>
                        </li>

                        <li class="nav-item me-3">
                            <span class="text-muted">Xin chào, </span>
                            <span class="fw-bold text-primary"><?= $_SESSION['user']['username'] ?></span>
                        </li>
                        <?php if ($_SESSION['user']['is_admin'] == 1): ?>
                            <li class="nav-item">
                                <a href="<?= BASE_URL ?>?mode=admin&action=categories" class="btn btn-outline-danger btn-sm me-2 fw-bold">ADMIN PANEL</a>
                            </li>
                        <?php endif; ?>
                        <li class="nav-item">
                            <a href="<?= BASE_URL ?>?action=logout" class="btn btn-dark btn-sm rounded-pill px-3">Đăng xuất</a>
                        </li>

                    <?php else: ?>
                        <li class="nav-item"><a href="<?= BASE_URL ?>?action=login" class="nav-link fw-bold">Đăng nhập</a></li>
                        <li class="nav-item"><a href="<?= BASE_URL ?>?action=register" class="btn btn-danger btn-sm rounded-pill px-4">Đăng ký</a></li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>

    <div class="flex-grow-1">

        <div class="container mt-3">
            <?php if (isset($_SESSION['success'])): ?>
                <div class="alert alert-success alert-dismissible fade show shadow-sm border-0" role="alert">
                    <i class="fa-solid fa-circle-check me-2"></i><strong>Thành công!</strong> <?= $_SESSION['success'] ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <?php unset($_SESSION['success']); ?>
            <?php endif; ?>

            <?php if (isset($_SESSION['error'])): ?>
                <div class="alert alert-danger alert-dismissible fade show shadow-sm border-0" role="alert">
                    <i class="fa-solid fa-triangle-exclamation me-2"></i><strong>Lỗi!</strong> <?= $_SESSION['error'] ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <?php unset($_SESSION['error']); ?>
            <?php endif; ?>
        </div>

        <?php
        if (isset($view)) {
            require_once PATH_VIEW_CLIENT . $view . '.php';
        }
        ?>
    </div>

    <footer class="bg-white py-4 border-top mt-auto">
        <div class="container text-center">
            <p class="text-muted mb-0">&copy; 2026 GT Badminton. Designed by Nguyễn Gia Tuấn - PH58197.</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>