<?php 

session_start();

spl_autoload_register(function ($class) {    
    $fileName = "$class.php";

    $fileModel              = PATH_MODEL . $fileName;
    $fileControllerClient         = PATH_CONTROLLER_CLIENT . $fileName;
    $fileControllerAdmin         = PATH_CONTROLLER_ADMIN . $fileName;

    if (is_readable($fileModel)) {
        require_once $fileModel;
    } 
    else if (is_readable($fileControllerClient)) {
        require_once $fileControllerClient;
    }
    else if (is_readable($fileControllerAdmin)) {
        require_once $fileControllerAdmin;
    }
});

require_once './configs/env.php';
require_once './configs/helper.php';

// Điều hướng
$mode = $_GET['mode'] ?? 'client';
if($mode == 'client'){
    // require điều hướng của client
    require_once './routes/client/index.php';
}else{
    // Kiểm tra đăng nhập tài khoản có quyền admin hay không
    // Nếu không có quyền admin đẩy sang route của client
    // Nếu có quyền admin thi điều hướng vào route admin
    require_once './routes/admin/index.php';
}
// require_once './routes/index.php';
