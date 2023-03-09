<?php
    session_start();
    //Lấy controller đang làm việc
    $controller = '';
    if(isset($_GET['controller'])){
        $controller = $_GET['controller'];
    }
    //Kiểm tra đó là controller nào
    switch ($controller){
        case '':
            if(isset($_SESSION['email'])){
                include_once 'views/index.php';
            } else {
                header('Location:index.php?controller=user&action=login');
            }
            break;
        case 'brand':
            include_once 'controllers/brandController.php';
            break;
        case 'product':
            include_once 'controllers/productController.php';
            break;
        case 'user':
            include_once 'controllers/userController.php';
            break;
        default:
            echo "Chưa chọn controller nào";
            break;
    }
?>