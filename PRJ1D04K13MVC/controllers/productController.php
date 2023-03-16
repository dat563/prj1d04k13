<?php
//Lấy hành động hiện tại
    $action = '';
    if(isset($_GET['action'])){
        $action = $_GET['action'];
    }
//    Kiểm tra hành động hiện tại
    switch ($action){
        case '':
//            Lấy dữ liệu từ DB
            include_once 'models/productModel.php';
//            Đổ dữ liệu lên view
            include_once 'views/products/index.php';
            break;
        case 'create':
            include_once 'models/productModel.php';
//            Hiển thị form thêm
            include_once 'views/products/create.php';
            break;
        case 'store':
//            Lưu dữ liệu lên DB
            include_once 'models/productModel.php';
//            Hiển thị trang danh sách
            header('Location:index.php?controller=product');
            break;
        case 'edit':
//            Lấy dữ liệu của bản ghi từ db
            include_once 'models/productModel.php';;
//            Hiển thị form sửa
            include_once 'views/products/edit.php';
            break;
        case 'update':
            include_once 'models/productModel.php';
            header('Location:index.php?controller=product');
            break;
        case 'destroy':
            include_once 'models/productModel.php';
            header('Location:index.php?controller=product');
            break;
        case 'view_cart':
            include_once 'models/productModel.php';
            include_once 'views/cart/index.php';
            break;
        case 'add_cart':
            include_once 'models/productModel.php';
            header('Location:index.php?controller=product&action=view_cart');
            break;
        case 'change_amount':
            include_once 'models/productModel.php';
            header('Location:index.php?controller=product&action=view_cart');
            break;
        case 'add_order_to_db':
            include_once 'models/productModel.php';
            header('Location:index.php?controller=product&action=view_cart');
            break;
        case 'delete_product_in_order':
            include_once 'models/productModel.php';
            header('Location:index.php?controller=product&action=view_cart');
            break;
        case 'delete_cart':
            include_once 'models/productModel.php';
            header('Location:index.php?controller=product&action=view_cart');
            break;
    }
?>