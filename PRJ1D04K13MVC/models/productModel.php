<?php
//function lấy dữ liệu
    function indexProduct(){
        include_once 'connect/openConnect.php';
        $sql = "SELECT product.*, brand.name AS brand_name FROM product INNER JOIN brand ON product.brand_id = brand.id";
        $products = mysqli_query($connect, $sql);
        include_once 'connect/closeConnect.php';
        return $products;
    }
    function createProduct(){
        include_once 'connect/openConnect.php';
        $sql = "SELECT * FROM brand";
        $brands = mysqli_query($connect, $sql);
        include_once 'connect/closeConnect.php';
        return $brands;
    }
//    function lưu dữ liệu lên db
    function storeProduct(){
//        Lấy dữ liệu từ form
        $name = $_POST['name'];
        $price = $_POST['price'];
        $amount = $_POST['amount'];
        $brand_id = $_POST['brand_id'];
        include_once 'connect/openConnect.php';
        $sql = "INSERT INTO product(name, price, amount, brand_id) VALUES ('$name', '$price', '$amount', '$brand_id')";
        mysqli_query($connect, $sql);
        include_once 'connect/closeConnect.php';
    }
//    function lấy dữ liệu bản ghi từ DB
    function editProduct(){
//        Lấy id
        $id = $_GET['id'];
        include_once 'connect/openConnect.php';
        $sqlBrand = "SELECT * FROM brand";
        $brands = mysqli_query($connect, $sqlBrand);
        $sql = "SELECT * FROM product WHERE id = '$id'";
        $products = mysqli_query($connect, $sql);
        include_once 'connect/closeConnect.php';
        $array = array();
        $array['brands'] = $brands;
        $array['products'] = $products;
        return $array;
    }
    function updateProduct(){
        $id = $_POST['id'];
        $name = $_POST['name'];
        $price = $_POST['price'];
        $amount = $_POST['amount'];
        $brand_id = $_POST['brand_id'];
        include_once 'connect/openConnect.php';
        $sql = "UPDATE product SET name = '$name', price = '$price', amount = '$amount', brand_id = '$brand_id' WHERE id = '$id'";
        mysqli_query($connect, $sql);
        include_once 'connect/closeConnect.php';
    }
    function destroyProduct(){
        $id = $_GET['id'];
        include_once 'connect/openConnect.php';
        $sql = "DELETE FROM product WHERE id = '$id'";
        mysqli_query($connect, $sql);
        include_once 'connect/closeConnect.php';
    }

//    Kiểm tra hành động hiện tại
    switch ($action){
        case '':
    //        Lấy dữ liệu từ DB về
            $products = indexProduct();
            break;
        case 'create':
            $brands = createProduct();
            break;
        case 'store':
//            Lưu dữ liệu lên DB
            storeProduct();
            break;
        case 'edit':
//            Lấy dữ liệu bản ghi từ DB
            $array = editProduct();
            break;
        case 'update':
            updateProduct();
            break;
        case 'destroy':
            destroyProduct();
            break;

    }
?>