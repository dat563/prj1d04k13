<?php
    //function để lấy dữ liệu từ DB về
    function index(){
        include_once 'connect/openConnect.php';
        $sql = "SELECT * FROM brand";
        $brands = mysqli_query($connect, $sql);
        include_once 'connect/closeConnect.php';
        return $brands;
    }
    switch ($action){
        case '':
            //Lấy dữ liệu từ DB về
            $brands = index();
            break;
    }
?>