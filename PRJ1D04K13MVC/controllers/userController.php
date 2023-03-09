<?php
    $action = '';
    if(isset($_GET['action'])){
        $action = $_GET['action'];
    }
    switch ($action){
        case 'login':
            if(isset($_SESSION['email'])){
                header('Location:index.php');
            } else {
//            Hiển thị form đăng nhập
                include_once 'views/user/login.php';
            }
            break;
        case 'loginAccess':
//            Lấy dữ liệu login trên db
            include_once 'models/userModel.php';
            if($test == 0){
//                Login sai
                header('Location:index.php?controller=user&action=login');
            } elseif ($test == 1){
                header('Location:index.php');
            }
            break;
        case 'logout':
//            Xóa bỏ session
            include_once 'models/userModel.php';
//            quay về form đăng nhập
            header('Location:index.php?controller=user&action=login');
            break;
    }
?>