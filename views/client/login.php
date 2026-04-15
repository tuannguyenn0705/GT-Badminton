<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập - GT Badminton</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <div class="container" style="margin-top: 100px;">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card shadow">
                    <div class="card-header text-center bg-primary text-white">
                        <h4 class="mb-0">Đăng Nhập Hệ Thống</h4>
                    </div>
                    <div class="card-body p-4">

                        <?php if (isset($_GET['msg']) && $_GET['msg'] == 'registered'): ?>
                            <div class="alert alert-success text-center">
                                Đăng ký thành công! Vui lòng đăng nhập.
                            </div>
                        <?php endif; ?>
                        <?php if (isset($error)): ?>
                            <div class="alert alert-danger text-center">
                                <?= $error ?>
                            </div>
                        <?php endif; ?>

                        <form action="<?= BASE_URL ?>?action=login" method="POST">
                            <div class="mb-3">
                                <label for="email" class="form-label fw-bold">Email</label>
                                <input type="email" class="form-control" id="email" name="email" required placeholder="Nhập email của bạn...">
                            </div>
                            <div class="mb-4">
                                <label for="password" class="form-label fw-bold">Mật khẩu</label>
                                <input type="password" class="form-control" id="password" name="password" required placeholder="Nhập mật khẩu...">
                            </div>
                            <button type="submit" class="btn btn-primary w-100 fw-bold">ĐĂNG NHẬP</button>
                        </form>

                    </div>
                    <div class="card-footer text-center bg-white py-3">
                        Chưa có tài khoản? <a href="<?= BASE_URL ?>?action=register" class="text-decoration-none">Đăng ký ngay</a>
                    </div>
                </div>

                <div class="text-center mt-3">
                    <a href="<?= BASE_URL ?>" class="text-decoration-none text-muted">
                        << Quay lại trang chủ</a>
                </div>
            </div>
        </div>
    </div>

</body>

</html>