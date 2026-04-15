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