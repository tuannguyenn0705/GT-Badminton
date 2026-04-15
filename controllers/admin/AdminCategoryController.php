<?php

class AdminCategoryController
{
    private $categoryModel;

    public function __construct()
    {
        $this->categoryModel = new CategoryModel();
    }
    public function index()
    {
        $categories = $this->categoryModel->getAll();
        $title = 'Quản lý danh mục';
        $view = 'categories/index';
        require_once PATH_VIEW_ADMIN . 'main.php';
    }

    public function create(){
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $name = trim($_POST['name'] ?? '');
            $description = trim($_POST['description'] ?? '');

            $this->categoryModel->insert($name, $description);

            $_SESSION['success'] = 'Thêm danh mục thành công!';
            header('Location:' . BASE_URL_ADMIN . '&action=categories');
            exit();
        }
        $title = 'Thêm danh mục mới';
        $view = 'categories/create';
        require_once PATH_VIEW_ADMIN . 'main.php';
    }

    public function edit(){
        $id = $_GET['id'] ?? 0;

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $name = trim($_POST['name'] ?? '');
            $description = trim($_POST['description'] ?? '');

            $this->categoryModel->update($id, $name, $description);

            $_SESSION['success'] = 'Cập nhật danh mục thành công!';
            header('Location:' . BASE_URL_ADMIN . '&action=categories');
            exit();
        }

        $category = $this->categoryModel->getById($id);

        $title = 'Sửa danh mục';
        $view = 'categories/edit';

        require_once PATH_VIEW_ADMIN . 'main.php';
    }

    public function delete(){
        $id = $_GET['id'] ?? 0;
        if($id){
            $this->categoryModel->delete($id);
            $_SESSION['success'] = 'Xóa danh mục thành công!';
        }
        
        header('Location:' . BASE_URL_ADMIN . '&action=categories');
        exit();
    }
}

?>