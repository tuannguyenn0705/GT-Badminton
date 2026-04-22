<?php

class CartController
{
    private $productModel;

    public function __construct()
    {
        $this->productModel = new ProductModel();
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        }
    }

    // Hàm kiểm tra đăng nhập dùng chung
    private function checkLogin()
    {
        if (!isset($_SESSION['user'])) {
            $_SESSION['error'] = "Vui lòng đăng nhập để mua hàng!";
            header('Location: ' . BASE_URL . '?action=login');
            exit();
        }
    }

    public function add()
    {
        // 1. Chặn người chưa đăng nhập
        $this->checkLogin();

        $id = $_GET['id'] ?? 0;
        // 2. Nhận số lượng từ form (mặc định là 1 nếu không có)
        $quantity = isset($_POST['quantity']) ? (int)$_POST['quantity'] : 1;
        // 3. Kiểm tra xem khách bấm nút nào (Mua ngay = 1, Thêm giỏ = 0)
        $is_buy_now = (isset($_POST['buy_now']) && $_POST['buy_now'] == 1);

        $product = $this->productModel->getById($id);

        if ($product) {
            if (isset($_SESSION['cart'][$id])) {
                $_SESSION['cart'][$id]['quantity'] += $quantity;
            } else {
                $_SESSION['cart'][$id] = [
                    'id' => $product['id'],
                    'name' => $product['name'],
                    'price' => $product['price'],
                    'image_url' => $product['image_url'],
                    'quantity' => $quantity
                ];
            }
            $_SESSION['success'] = "Đã thêm " . $product['name'] . " vào giỏ hàng!";
        } else {
            $_SESSION['error'] = "Sản phẩm không tồn tại!";
        }

        // 4. Chuyển hướng dựa theo nút bấm
        if ($is_buy_now) {
            header('Location: ' . BASE_URL . '?action=checkout'); // Tới trang thanh toán
        } else {
            header('Location: ' . ($_SERVER['HTTP_REFERER'] ?? BASE_URL)); // Trở lại trang cũ
        }
        exit();
    }

    public function view()
    {
        $this->checkLogin(); // Chặn
        $cart = $_SESSION['cart'] ?? [];
        $title = 'Giỏ hàng của bạn';
        $view = 'cart';
        require_once PATH_VIEW_CLIENT . 'main.php';
    }

    public function delete()
    {
        $this->checkLogin(); // Chặn
        $id = $_GET['id'] ?? 0;
        if (isset($_SESSION['cart'][$id])) {
            unset($_SESSION['cart'][$id]);
            $_SESSION['success'] = "Đã xóa sản phẩm khỏi giỏ hàng!";
        }
        header('Location: ' . BASE_URL . '?action=view-cart');
        exit();
    }

    public function update()
    {
        $this->checkLogin(); // Chặn bảo mật

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['quantities'])) {
            // Duyệt qua mảng số lượng gửi lên
            foreach ($_POST['quantities'] as $id => $qty) {
                $qty = (int)$qty;
                // Đảm bảo số lượng lớn hơn 0 và sản phẩm có trong giỏ
                if ($qty > 0 && isset($_SESSION['cart'][$id])) {
                    $_SESSION['cart'][$id]['quantity'] = $qty;
                }
            }
            $_SESSION['success'] = "Đã cập nhật số lượng sản phẩm!";
        }
        
        header('Location: ' . BASE_URL . '?action=view-cart');
        exit();
    }
}
?>