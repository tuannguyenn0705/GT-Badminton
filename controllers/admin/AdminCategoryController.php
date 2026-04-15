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
}

?>