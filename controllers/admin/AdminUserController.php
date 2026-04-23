<?php

class AdminUserController
{
    private $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    // Hiển thị danh sách tài khoản
    public function index()
    {
        $users = $this->userModel->getAllUsers();
        $title = 'Quản lý Tài khoản';
        $view = 'users/index';
        require_once PATH_VIEW_ADMIN . 'main.php';
    }

    // Hàm chuyển đổi trạng thái Khóa / Mở khóa
    public function toggleStatus()
    {
        $id = $_GET['id'] ?? 0;
        $user = $this->userModel->getUserById($id);

        // Đảm bảo không ai được khóa tài khoản của Admin
        if ($user && $user['is_admin'] != 1) {
            // Đảo ngược trạng thái: Nếu đang 1 thì thành 0, đang 0 thì thành 1
            $newStatus = ($user['status'] == 1) ? 0 : 1; 
            
            $this->userModel->updateStatus($id, $newStatus);

            if ($newStatus == 0) {
                $_SESSION['success'] = "Đã khóa tài khoản " . $user['email'];
            } else {
                $_SESSION['success'] = "Đã mở khóa tài khoản " . $user['email'];
            }
        } else {
            $_SESSION['error'] = "Bạn không có quyền thao tác trên tài khoản Quản trị viên!";
        }

        header('Location: ' . BASE_URL_ADMIN . '&action=users');
        exit();
    }

    // Xóa tài khoản
    public function delete()
    {
        $id = $_GET['id'] ?? 0;
        $user = $this->userModel->getUserById($id);

        if ($user && $user['is_admin'] != 1) {
            $this->userModel->deleteUser($id);
            $_SESSION['success'] = "Đã xóa vĩnh viễn tài khoản!";
        } else {
            $_SESSION['error'] = "Không thể xóa tài khoản Quản trị viên!";
        }

        header('Location: ' . BASE_URL_ADMIN . '&action=users');
        exit();
    }
}
?>