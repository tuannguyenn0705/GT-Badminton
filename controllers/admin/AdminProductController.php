<?php

class AdminProductController
{
    private $productModel;
    private $categoryModel;

    public function __construct()
    {
        $this->productModel = new ProductModel();
        $this->categoryModel = new CategoryModel();
    }

    public function index()
    {
        $products = $this->productModel->getAllProducts();
        $title = 'Quản lý sản phẩm';
        $view = 'products/index';
        require_once PATH_VIEW_ADMIN . 'main.php';
    }

    public function create()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = trim($_POST['name'] ?? '');
            $category_id = $_POST['category_id'] ?? 0;
            $price = $_POST['price'] ?? 0;
            $quantity = $_POST['quantity'] ?? 0;
            $description = trim($_POST['description'] ?? '');

            $product_id = $this->productModel->insertProduct($category_id, $name, $price, $quantity, $description);

            $file = $_FILES['image'] ?? null;
            if ($file && $file['size'] > 0) {
                $image_url = upload_file('products', $file);
                $this->productModel->insertProductImage($product_id, $image_url);
            }
            $_SESSION['success'] = 'Thêm sản phẩm thành công!';
            header('Location:' . BASE_URL_ADMIN . '&action=products');
            exit();
        }
        $categories = $this->categoryModel->getAll();
        $title = 'Thêm sản phẩm mới';
        $view = 'products/create';
        require_once PATH_VIEW_ADMIN . 'main.php';
    }

    public function edit() {
        $id = $_GET['id'] ?? 0;
        $product = $this->productModel->getById($id);

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = trim($_POST['name'] ?? '');
            $category_id = $_POST['category_id'] ?? 0;
            $price = $_POST['price'] ?? 0;
            $quantity = $_POST['quantity'] ?? 0;
            $description = trim($_POST['description'] ?? '');

            $this->productModel->updateProduct($id, $category_id, $name, $price, $quantity, $description);

            // Xử lý ảnh mới nếu khách có chọn
            $file = $_FILES['image'] ?? null;
            if ($file && $file['size'] > 0) {
                $image_url = upload_file('products', $file);
                $this->productModel->updateProductImage($id, $image_url);
            }

            $_SESSION['success'] = 'Cập nhật sản phẩm thành công!';
            header('Location: ' . BASE_URL_ADMIN . '&action=products');
            exit();
        }

        $categories = $this->categoryModel->getAll();
        $title = 'Cập nhật sản phẩm';
        $view = 'products/edit';
        require_once PATH_VIEW_ADMIN . 'main.php';
    }

    public function delete() {
        $id = $_GET['id'] ?? 0;
        if ($id) {
            $this->productModel->deleteProduct($id);
            $_SESSION['success'] = 'Xóa sản phẩm thành công!';
        }
        header('Location: ' . BASE_URL_ADMIN . '&action=products');
        exit();
    }
}
