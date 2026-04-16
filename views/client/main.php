<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'GT Badminton - Thế giới cầu lông' ?></title>

    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/alert/all.min.css">

    <style>
        body { font-family: 'Roboto', sans-serif; background-color: #f8f9fa; }
        .navbar { border-bottom: 2px solid #dc3545; }
        .custom-card { transition: all 0.3s ease; border: none; border-radius: 15px; overflow: hidden; }
        .custom-card:hover { transform: translateY(-10px); box-shadow: 0 10px 20px rgba(0,0,0,0.1) !important; }
        .product-img-container { height: 280px; background-color: #fff; display: flex; align-items: center; justify-content: center; overflow: hidden; }
        .product-img-container img { transition: transform 0.5s ease; max-width: 90%; max-height: 90%; }
        .custom-card:hover .product-img-container img { transform: scale(1.1); }
        .btn-buy { border-radius: 50px; font-weight: bold; text-transform: uppercase; font-size: 0.8rem; letter-spacing: 1px; }
        .price-new { color: #dc3545; font-size: 1.2rem; font-weight: 700; }
        .price-old { color: #6c757d; text-decoration: line-through; font-size: 0.9rem; }
        .carousel-item img { border-radius: 20px; }
    </style>
</head>

<body>

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
                    <li class="nav-item"><a class="nav-link fw-bold text-uppercase" href="#">Vợt Cầu Lông</a></li>
                    <li class="nav-item"><a class="nav-link fw-bold text-uppercase" href="#">Giày Cầu Lông</a></li>
                    <li class="nav-item"><a class="nav-link fw-bold text-uppercase" href="#">Quần Áo</a></li>
                </ul>

                <ul class="navbar-nav align-items-center">
                    <?php if(isset($_SESSION['user'])): ?>
                        <li class="nav-item me-3">
                            <span class="text-muted">Xin chào, </span>
                            <span class="fw-bold text-primary"><?= $_SESSION['user']['username'] ?></span>
                        </li>
                        <?php if($_SESSION['user']['is_admin'] == 1): ?>
                            <li class="nav-item">
                                <a href="<?= BASE_URL_ADMIN ?>" class="btn btn-outline-danger btn-sm me-2 fw-bold">ADMIN PANEL</a>
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

    <div class="container mt-4">
        <div id="slide-demo" class="carousel slide shadow" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#slide-demo" data-bs-slide-to="0" class="active"></button>
                <button type="button" data-bs-target="#slide-demo" data-bs-slide-to="1"></button>
                <button type="button" data-bs-target="#slide-demo" data-bs-slide-to="2"></button>
                <button type="button" data-bs-target="#slide-demo" data-bs-slide-to="3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="./assets/uploads/img1.webp" class="d-block w-100" alt="Banner 1">
                </div>
                <div class="carousel-item">
                    <img src="./assets/uploads/img2.webp" class="d-block w-100" alt="Banner 2">
                </div>
                <div class="carousel-item">
                    <img src="./assets/uploads/img3.webp" class="d-block w-100" alt="Banner 3">
                </div>
                <div class="carousel-item">
                    <img src="./assets/uploads/img4.webp" class="d-block w-100" alt="Banner 4">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#slide-demo" data-bs-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#slide-demo" data-bs-slide="next">
                <span class="carousel-control-next-icon"></span>
            </button>
        </div>

        <div class="pt-5 pb-5">
            <div class="d-flex justify-content-between align-items-end mb-4">
                <div>
                    <h2 class="fw-bold text-uppercase m-0">Sản phẩm mới nhất</h2>
                    <div class="bg-danger" style="height: 4px; width: 60px;"></div>
                </div>
                <a href="#" class="text-danger fw-bold text-decoration-none">Xem tất cả →</a>
            </div>

            <div class="row g-4">
                <?php foreach($data as $pro): ?>
                <div class="col-6 col-md-4 col-lg-3">
                    <div class="card h-100 shadow-sm custom-card">
                        <div class="product-img-container">
                            <img src="<?= BASE_ASSETS_UPLOADS_PRODUCT . $pro['image_url'] ?>" alt="<?= $pro['name'] ?>">
                        </div>
                        <div class="card-body p-3 text-center">
                            <p class="text-muted small mb-1">GT Badminton Shop</p>
                            <h6 class="card-title fw-bold text-truncate" title="<?= $pro['name'] ?>"><?= $pro['name'] ?></h6>
                            <div class="mb-3">
                                <span class="price-new"><?= number_format($pro['price']) ?>đ</span><br>
                                <span class="price-old"><?= number_format($pro['price'] * 1.2) ?>đ</span>
                            </div>
                            <a href="<?= BASE_URL ?>?action=detail&id=<?= $pro['id'] ?>" class="btn btn-danger btn-buy w-100 shadow-sm">Mua ngay</a>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>

    <footer class="bg-white py-4 border-top mt-5">
        <div class="container text-center">
            <p class="text-muted mb-0">&copy; 2026 GT Badminton. Designed by Nguyễn Gia Tuấn - PH58197.</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>