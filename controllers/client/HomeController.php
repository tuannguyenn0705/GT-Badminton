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

        $products = $this->productModel->getProductsByCategory($id);
        
        $title = $category['name'] . ' Chính Hãng - GT Badminton';
        $view = 'category';
        
        require_once PATH_VIEW_CLIENT . 'main.php'; 
    }
}
?>