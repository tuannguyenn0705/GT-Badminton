<?php

class AdminHomeController
{
    public function index() 
    {
        // Tạm thời hiển thị một chữ chào mừng ở trang chủ Admin
        $title = 'Bảng Điều Khiển (Dashboard)';
        require_once PATH_VIEW_ADMIN . 'main.php';
    }
}
?>