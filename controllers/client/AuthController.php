<?php

class AuthController
{
    private $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function showLogin()
    {
        require_once PATH_VIEW_CLIENT . 'login.php'; 
    }

    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'] ?? '';
            $password = $_POST['password'] ?? '';

            $user = $this->userModel->getUserByEmail($email);

            if ($user && $user['password'] === $password) {
                
                // Đăng nhập thành công -> Lưu thông tin vào Session
                $_SESSION['user'] = [
                    'id' => $user['id'],
                    'username' => $user['username'],
                    'email' => $user['email'],
                    'is_admin' => $user['is_admin']
                ];

                // Phân quyền điều hướng
                if ($user['is_admin'] == 1) {
                    header('Location: ' . BASE_URL_ADMIN); // Vô trang quản trị
                } else {
                    header('Location: ' . BASE_URL); // Vô trang chủ
                }
                exit();
            } else {
                // Đăng nhập thất bại -> Báo lỗi
                $error = "Email hoặc mật khẩu không chính xác!";
                require_once PATH_VIEW_CLIENT . 'login.php';
            }
        }
    }

    public function showRegister()
    {
        require_once PATH_VIEW_CLIENT . 'register.php';
    }

    public function register(){
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $username = trim($_POST['username'] ?? '');
            $email = trim($_POST['email'] ?? '');
            $password = ($_POST['password'] ?? '');
            $confirm_password = ($_POST['confirm_password'] ?? '');
        }

        if ($password !== $confirm_password) {
            $error = "Mật khẩu xác nhận không khớp!";
            require_once PATH_VIEW_CLIENT . 'register.php';
            return; // Dừng lại không làm tiếp
        }

        // Kiểm tra email tồn tại chưa
        $existUser = $this->userModel->getUserByEmail($email);
            if ($existUser) {
                $error = "Email này đã được sử dụng. Vui lòng chọn email khác!";
                require_once PATH_VIEW_CLIENT . 'register.php';
                return;
            }

        $this->userModel->insertUser($username, $email, $password);

        header('Location: ' . BASE_URL . '?action=login&msg=registered');
        exit();
    }

    // Xử lý logic đăng xuất
    public function logout()
    {
        session_unset();
        session_destroy();
        header('Location: ' . BASE_URL);
        exit();
    }
}
?>