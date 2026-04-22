<?php

class HomeController
{
    private $productModel;

    public function __construct() 
    {
        $this->productModel = new ProductModel();
    }

    // Trang chủ
    public function index() 
    {
        $view = 'home';
        $data = $this->productModel->getTop4Lastest();
        // debug($data);
        require_once PATH_VIEW_CLIENT . 'main.php';
    }

    // Trang danh mục sản phẩm (Vợt, Giày, Quần áo...)
    public function category() 
    {
        $id = $_GET['id'] ?? 0;
        $category = $this->productModel->getCategoryById($id);
        
        if (!$category) {
            header('Location: ' . BASE_URL);
            exit();
        }

        // Lấy dữ liệu lọc từ URL
        $selected_brands = $_GET['brands'] ?? [];
        $selected_prices = $_GET['prices'] ?? [];

        // Gọi hàm lọc mới ở Model
        $products = $this->productModel->getProductsFiltered($id, $selected_brands, $selected_prices);
        
        $title = $category['name'] . ' Chính Hãng - GT Badminton';
        $view = 'category';
        
        require_once PATH_VIEW_CLIENT . 'main.php'; 
    }

    public function detail()
    {
        $id = $_GET['id'] ?? 0;
        $product = $this->productModel->getById($id);

        if (!$product) {
            header('Location: ' . BASE_URL);
            exit();
        }

        // 1. Lấy các sản phẩm liên quan
        $relatedProducts = $this->productModel->getProductsFiltered($product['category_id']);

        // 2. PHẦN CẦN THÊM: Lấy danh sách bình luận của sản phẩm này
        require_once 'models/CommentModel.php'; // Gọi Model bình luận
        $commentModel = new CommentModel();
        $comments = $commentModel->getByProductId($id); // Lấy dữ liệu gán vào biến $comments

        $title = $product['name'] . ' - GT Badminton';
        $view = 'detail';
        require_once PATH_VIEW_CLIENT . 'main.php';
    }

    // Hàm xử lý gửi bình luận
    public function addComment() {
        if (!isset($_SESSION['user'])) {
            $_SESSION['error'] = "Vui lòng đăng nhập để gửi bình luận!";
            header('Location: ' . $_SERVER['HTTP_REFERER']);
            exit();
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            require_once 'models/CommentModel.php';
            $commentModel = new CommentModel();

            $user_id = $_SESSION['user']['id'];
            $product_id = $_POST['product_id'];
            $content = $_POST['content'];

            if (!empty(trim($content))) {
                $commentModel->add($user_id, $product_id, $content);
                $_SESSION['success'] = "Gửi bình luận thành công!";
            } else {
                $_SESSION['error'] = "Nội dung bình luận không được để trống!";
            }
            
            header('Location: ' . $_SERVER['HTTP_REFERER']);
            exit();
        }
    }
}
?>