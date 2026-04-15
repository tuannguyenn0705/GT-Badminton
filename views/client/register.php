<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng ký - GT Badminton</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <div class="container" style="margin-top: 80px;">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card shadow">
                    <div class="card-header text-center bg-success text-white">
                        <h4 class="mb-0">Đăng Ký Tài Khoản</h4>
                    </div>
                    <div class="card-body p-4">
                        
                        <?php if(isset($error)): ?>
                            <div class="alert alert-danger text-center">
                                <?= $error ?>
                            </div>
                        <?php endif; ?>

                        <form action="<?= BASE_URL ?>?action=register" method="POST">
                            <div class="mb-3">
                                <label for="username" class="form-label fw-bold">Tên hiển thị</label>
                                <input type="text" class="form-control" id="username" name="username" required placeholder="Nhập tên của bạn...">
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label fw-bold">Email</label>
                                <input type="email" class="form-control" id="email" name="email" required placeholder="Nhập email...">
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label fw-bold">Mật khẩu</label>
                                <input type="password" class="form-control" id="password" name="password" required placeholder="Tạo mật khẩu...">
                            </div>
                            <div class="mb-4">
                                <label for="confirm_password" class="form-label fw-bold">Nhập lại mật khẩu</label>
                                <input type="password" class="form-control" id="confirm_password" name="confirm_password" required placeholder="Xác nhận lại mật khẩu...">
                            </div>
                            <button type="submit" class="btn btn-success w-100 fw-bold">ĐĂNG KÝ MỚI</button>
                        </form>
                        
                    </div>
                    <div class="card-footer text-center bg-white py-3">
                        Đã có tài khoản? <a href="<?= BASE_URL ?>?action=login" class="text-decoration-none">Đăng nhập</a>
                    </div>
                </div>
                <div class="text-center mt-3">
                    <a href="<?= BASE_URL ?>" class="text-decoration-none text-muted"><< Quay lại trang chủ</a>
                </div>
            </div>
        </div>
    </div>

</body>
</html>