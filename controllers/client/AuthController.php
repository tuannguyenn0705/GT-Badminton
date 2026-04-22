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
        // Hứng lỗi từ Session (nếu có) và xóa nó đi
        if (isset($_SESSION['error'])) {
            $error = $_SESSION['error']; 
            unset($_SESSION['error']);
        }
        
        require_once PATH_VIEW_CLIENT . 'login.php'; 
    }

    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'] ?? '';
            $password = $_POST['password'] ?? '';

            $user = $this->userModel->getUserByEmail($email);

            if ($user && $user['password'] === $password) {
                
                // CHỈ THÊM ĐÚNG ĐOẠN NÀY: Kiểm tra tài khoản có bị khóa không
                if (isset($user['status']) && $user['status'] == 0) {
                    $error = "Tài khoản của bạn đã bị vô hiệu hóa. Vui lòng liên hệ Admin.";
                    require_once PATH_VIEW_CLIENT . 'login.php';
                    return; // Dừng lại, không cho đăng nhập
                }

                // Đăng nhập thành công -> Lưu thông tin vào Session
                $_SESSION['user'] = [
                    'id' => $user['id'],
                    'username' => $user['username'],
                    'email' => $user['email'],
                    'is_admin' => $user['is_admin']
                ];

                // Phân quyền điều hướng
                if ($user['is_admin'] == 1) {
                    header('Location: ' . BASE_URL_ADMIN); 
                } else {
                    header('Location: ' . BASE_URL); 
                }
                exit();
            } else {
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
            return; 
        }

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

    public function logout()
    {
        if(isset($_SESSION['user'])){
            unset($_SESSION['user']);
        }

        // Tạo một thông báo để khách hàng biết họ đã đăng xuất
        $_SESSION['success'] = "Đã đăng xuất tài khoản thành công!";
        
        header('Location: ' . BASE_URL);
        exit();
    }
}
?>