<?php

$action = $_GET['action'] ?? '/';

match ($action) {
    '/'         => (new HomeController)->index(),
    
    // Xử lý đăng nhập
    'login'     => ($_SERVER['REQUEST_METHOD'] === 'POST') ? (new AuthController)->login() : (new AuthController)->showLogin(),
    
    // Xử lý đăng xuất
    'logout'    => (new AuthController)->logout(),
};