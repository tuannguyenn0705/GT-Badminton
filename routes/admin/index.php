<?php

$action = $_GET['action'] ?? '/';

match ($action) {
    '/'          => (new AdminHomeController)->index(),
    'categories' => (new AdminCategoryController)->index(),

    'category-create' => (new AdminCategoryController)->create(),
    'category-edit' => (new AdminCategoryController)->edit(),
    'category-delete' => (new AdminCategoryController)->delete(),

    'products'          => (new AdminProductController)->index(),
    'product-create'    => (new AdminProductController)->create(),

    'product-edit'   => (new AdminProductController)->edit(),
    'product-delete' => (new AdminProductController)->delete(),

    'users'       => (new AdminUserController())->index(),
    'user-toggle' => (new AdminUserController())->toggleStatus(),
    'user-delete' => (new AdminUserController())->delete(),
};
