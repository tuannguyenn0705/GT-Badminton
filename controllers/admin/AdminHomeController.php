<?php

class AdminHomeController
{
    public function index() 
    {
        $title = 'Bảng Điều Khiển (Dashboard)';
        require_once PATH_VIEW_ADMIN . 'main.php';
    }
}
?>