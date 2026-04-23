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
            header('Location: ' . BASE_URL . '?action=checkout');
        } else {
            header('Location: ' . ($_SERVER['HTTP_REFERER'] ?? BASE_URL));
        }
        exit();
    }

    public function view()
    {
        $this->checkLogin();

        $cart = $_SESSION['cart'] ?? [];

        require_once 'models/OrderModel.php';
        $orderModel = new OrderModel();
        $user_id = $_SESSION['user']['id'];
        $orders = $orderModel->getOrdersByUserId($user_id);

        $title = 'Giỏ hàng & Đơn hàng của bạn';
        $view = 'cart';
        require_once PATH_VIEW_CLIENT . 'main.php';
    }

    public function delete()
    {
        $this->checkLogin();
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
        $this->checkLogin();

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['quantities'])) {
            foreach ($_POST['quantities'] as $id => $qty) {
                $qty = (int)$qty;
                if ($qty > 0 && isset($_SESSION['cart'][$id])) {
                    $_SESSION['cart'][$id]['quantity'] = $qty;
                }
            }
            $_SESSION['success'] = "Đã cập nhật số lượng sản phẩm!";
        }
        
        header('Location: ' . BASE_URL . '?action=view-cart');
        exit();
    }

    // 5. Hiển thị trang Thanh toán
    public function checkout()
    {
        $this->checkLogin();
        
        if (empty($_SESSION['cart'])) {
            header('Location: ' . BASE_URL . '?action=view-cart');
            exit();
        }

        $cart = $_SESSION['cart'];
        $title = 'Thanh toán đơn hàng';
        $view = 'checkout';
        require_once PATH_VIEW_CLIENT . 'main.php';
    }

    // 6. Xử lý Đặt hàng (LƯU VÀO DATABASE THẬT)
    public function processCheckout()
    {
        $this->checkLogin();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $customer_name = $_POST['fullname'] ?? '';
            $customer_phone = $_POST['phone'] ?? '';
            $customer_address = $_POST['address'] ?? '';
            $customer_email = $_SESSION['user']['email'] ?? ''; // Lấy email từ session người dùng
            $payment_method = $_POST['payment_method'] ?? 1;
            
            $user_id = $_SESSION['user']['id']; 
            
            $total_amount = 0;
            foreach ($_SESSION['cart'] as $item) {
                $total_amount += $item['price'] * $item['quantity'];
            }

            require_once 'models/OrderModel.php';
            $orderModel = new OrderModel();
            
            // 1. Lưu bảng orders (đúng với cấu trúc DB của bạn)
            $order_id = $orderModel->createOrder($user_id, $customer_name, $customer_email, $customer_phone, $customer_address, $payment_method, $total_amount);
            
            // 2. Lưu bảng order_details
            foreach ($_SESSION['cart'] as $item) {
                $orderModel->createOrderDetail($order_id, $item['id'], $item['price'], $item['quantity']);
            }

            // Xóa giỏ hàng sau khi đặt thành công
            unset($_SESSION['cart']);

            // Lưu thông tin mang sang trang Thành công
            $_SESSION['order_success'] = [
                'order_id' => $order_id,
                'total_price' => $total_amount,
                'payment_method' => $payment_method
            ];

            header('Location: ' . BASE_URL . '?action=success');
            exit();
        }
    }

    // 7. Trang Đặt hàng thành công (Có QR Code)
    public function success()
    {
        $this->checkLogin();
        if (!isset($_SESSION['order_success'])) {
            header('Location: ' . BASE_URL);
            exit();
        }

        $order = $_SESSION['order_success'];
        $title = 'Đặt hàng thành công';
        $view = 'success';
        require_once PATH_VIEW_CLIENT . 'main.php';
    }

    // 8. Trang Lịch sử đơn hàng
    public function history()
    {
        $this->checkLogin();
        
        require_once 'models/OrderModel.php';
        $orderModel = new OrderModel();
        
        $user_id = $_SESSION['user']['id'];
        $orders = $orderModel->getOrdersByUserId($user_id);
        
        $title = 'Lịch sử mua hàng';
        $view = 'history';
        require_once PATH_VIEW_CLIENT . 'main.php';
    }
}
?>