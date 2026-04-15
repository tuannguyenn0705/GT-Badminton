<?php

$action = $_GET['action'] ?? '/';

match ($action) {
    '/'          => (new AdminHomeController)->index(),
    'categories' => (new AdminCategoryController)->index(),
};