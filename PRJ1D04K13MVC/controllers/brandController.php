<?php
//    Lấy hành động đang thực hiện
    $action = '';
    if(isset($_GET['action'])){
        $action = $_GET['action'];
    }
//Kiểm tra hành động đang thực hiện
    switch ($action){
        case '':
            //Hiển thị danh sách các brand
            include_once 'models/brandModel.php';
            include_once 'views/brands/index.php';
            break;
    }
?>