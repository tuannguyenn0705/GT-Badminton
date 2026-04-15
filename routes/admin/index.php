<?php

$action = $_GET['action'] ?? '/';

match ($action) {
    '/'          => (new AdminHomeController)->index(),
    'categories' => (new AdminCategoryController)->index(),
    
    'category-create' => (new AdminCategoryController)->create(),
    'category-edit' => (new AdminCategoryController)->edit(),
    'category-delete' => (new AdminCategoryController)->delete(),
};