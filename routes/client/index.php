<?php

$action = $_GET['action'] ?? '/';

match ($action) {
    '/'         => (new HomeController)->index(),
    
    // Xử lý đăng nhập
    'login'     => ($_SERVER['REQUEST_METHOD'] === 'POST') ? (new AuthController)->login() : (new AuthController)->showLogin(),
    
    // Xử lý đăng xuất
    'logout'    => (new AuthController)->logout(),

    // Xử lý đăng ký
    'register'  => ($_SERVER['REQUEST_METHOD'] === 'POST') ? (new AuthController)->register() : (new AuthController)->showRegister(),

    'category' => (new HomeController())->category(),

    // CÁC ROUTE GIỎ HÀNG
    'add-to-cart' => (new CartController())->add(),
    'view-cart'   => (new CartController())->view(),
    'delete-cart' => (new CartController())->delete(),
    'update-cart' => (new CartController())->update(),

    // ROUTE THANH TOÁN
    'checkout'         => (new CartController())->checkout(),
    'process-checkout' => (new CartController())->processCheckout(),
    'success'          => (new CartController())->success(),

    'order-history' => (new CartController())->history(),
};