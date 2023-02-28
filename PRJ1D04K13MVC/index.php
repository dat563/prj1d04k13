<?php
    //Lấy controller đang làm việc
    $controller = '';
    if(isset($_GET['controller'])){
        $controller = $_GET['controller'];
    }
    //Kiểm tra đó là controller nào
    switch ($controller){
        case '':
            include_once 'views/index.php';
            break;
        case 'brand':
            include_once 'controllers/brandController.php';
            break;
        case 'product':
            include_once 'controllers/productController.php';
            break;
        default:
            echo "Chưa chọn controller nào";
            break;
    }
?>