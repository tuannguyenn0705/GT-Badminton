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

    <!-- Khu vực header -->
    <nav class="navbar navbar-expand-sm bg-light shadow">
        <div class="container-fluid">
            <div class="d-flex align-items-center">
                <a class="navbar-brand" href="#">
                    <img src="./assets/uploads/logo.png" alt="Logo" width="50" height="50">
                </a>
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a href="" class="nav-link">Danh mục 1</a>
                    </li>
                    <li class="nav-item">
                        <a href="" class="nav-link">Danh mục 2</a>
                    </li>
                </ul>
            </div>
         
          <!-- Menu -->
          <ul class="navbar-nav">
            <?php if(isset($_SESSION['user'])): ?>
                <li class="nav-item">
                    <span class="nav-link text-primary fw-bold">Xin chào, <?= $_SESSION['user']['username'] ?></span>
                </li>
                
                <?php if($_SESSION['user']['is_admin'] == 1): ?>
                    <li class="nav-item">
                        <a href="<?= BASE_URL_ADMIN ?>" class="nav-link text-danger fw-bold">Trang Quản Trị</a>
                    </li>
                <?php endif; ?>

                <li class="nav-item">
                    <a href="<?= BASE_URL ?>?action=logout" class="nav-link">Đăng xuất</a>
                </li>
            <?php else: ?>
                <li class="nav-item">
                    <a href="<?= BASE_URL ?>?action=login" class="nav-link">Đăng nhập</a>
                </li>
                <li class="nav-item">
                    <a href="<?= BASE_URL ?>?action=register" class="nav-link">Đăng ký</a>
                </li>
            <?php endif; ?>
          </ul>
        </div>
      </nav>

    <div class="container">
        <!-- Khu vự nội dung chính -->
        <div class="pt-4" style="min-height: calc(100vh - 132px);">
          <div class="container">
            <!-- Slideshow -->
            <div id="slide-demo" class="carousel slide">
              <div class="carousel-indicators">
                <button type="button" data-bs-target="#slide-demo" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#slide-demo" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#slide-demo" data-bs-slide-to="2" aria-label="Slide 3"></button>
                <button type="button" data-bs-target="#slide-demo" data-bs-slide-to="3" aria-label="Slide 4"></button>
              </div>
              <div class="carousel-inner">
                <div class="carousel-item active">
                  <img src="./assets/uploads/slide1.png" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                  <img src="./assets/uploads/slide2.png" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                  <img src="./assets/uploads/slide3.png" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                  <img src="./assets/uploads/slide4.png" class="d-block w-100" alt="...">
                </div>
              </div>
              <button class="carousel-control-prev" type="button" data-bs-target="#slide-demo" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
              </button>
              <button class="carousel-control-next" type="button" data-bs-target="#slide-demo" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
              </button>
            </div>
            <!-- Nội dung chính -->
            <!-- Khu vực sản phẩm -->
            <h3 class="mt-3">Sản phẩm mới giảm giá</h3>
            <div class="row">
                <?php foreach($data as $pro): ?>
                <!-- Box sản phẩm -->
                <div class="col-3">
                  <div class="border rounded overflow-hidden mb-4">
                      <div class="bg-light d-flex justify-content-center align-items-center" style="height: 400px;">
                          <img src="<?= BASE_ASSETS_UPLOADS_PRODUCT . $pro['image_url'] ?>" alt="" class="mw-100 mh-100">
                      </div>
                      <!-- Hiển thị text và button -->
                      <div class="p-2">
                      <h5>Tên sản phẩm</h5>
                      <div class="d-flex justify-content-between">
                          <span class="fw-bold"><?=  $pro['price'] ?></span>
                          <span class="text-danger text-decoration-line-through">200.000</span>
                      </div>
                      <button class="btn btn-danger rounded-pill w-100 btn-sm">Mua ngay</button>
                      </div>
                  </div>
                </div>
                <!-- Hết box sản phẩm -->
            </div>
            <?php endforeach; ?>
            <!-- Hết nội dung chính  -->
            
          </div>  
        </div>
      
    </div>

</body>

</html>