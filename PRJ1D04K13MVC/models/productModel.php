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
//    function thêm sản phẩm lên giỏ hàng
    function add_to_cart(){
//        Lấy được id của sản phẩm vừa được thêm vào
        $product_id = $_GET['id'];
//        Lưu lên session id sản phầm và số lượng mặc định là 1
//        Kiểm tra xem giỏ hàng đã tồn tại hay chưa
        if(isset($_SESSION['cart'])){
            if(isset($_SESSION['cart'][$product_id])){
                $_SESSION['cart'][$product_id]++;
            } else {
                $_SESSION['cart'][$product_id] = 1;
            }
        } else {
            $_SESSION['cart'] = array();
            $_SESSION['cart'][$product_id] = 1;
        }
    }
//    function hiển thị giỏ hàng
    function view_cart(){
        include_once 'connect/openConnect.php';
        $sqlCustomer = "SELECT * FROM customer";
        $customers = mysqli_query($connect, $sqlCustomer);
        $cart = array();
        $infor = array();
        if(isset($_SESSION['cart'])){
            foreach ($_SESSION['cart'] as $product_id => $amount){
//                Lấy tên sp và giá theo product_id
                $sql = "SELECT * FROM product WHERE id = '$product_id'";
                $products = mysqli_query($connect, $sql);
                foreach ($products as $product){
                    $cart[$product_id]['product_name'] = $product['name'];
                    $cart[$product_id]['price'] = $product['price'];
                    $cart[$product_id]['amount'] = $amount;
                }
            }
        }
        include_once 'connect/closeConnect.php';
        $infor['customer'] = $customers;
        $infor['cart'] = $cart;
        return $infor;
    }
//        function thay đổi số lượng trong giỏ hàng
    function change_amount(){
//Lấy product_id và amount
        $infor = $_POST['amount'];
        foreach ($infor as $product_id => $value){
            $_SESSION['cart'][$product_id] = $value;
        }
    }
//    function thêm đơn hàng lên db
    function add_order_to_db(){
        $customer_id = $_POST['customer_id'];
        $date_buy = date('Y-m-d');
        $admin_id = $_SESSION['admin_id'];
        $status = 0;
        include_once 'connect/openConnect.php';
        $sqlOrder = "INSERT INTO orders(date_buy, customer_id, admin_id, status) VALUES ('$date_buy', '$customer_id', '$admin_id', '$status')";
        mysqli_query($connect, $sqlOrder);
        $sqlOrderID = "SELECT MAX(id) as order_id FROM orders WHERE customer_id = '$customer_id'";
        $orderIDs = mysqli_query($connect, $sqlOrderID);
        foreach ($orderIDs as $value){
            $orderID = $value['order_id'];
        }
        foreach ($_SESSION['cart'] as $product_id => $amount){
            $sqlPriceProduct = "SELECT price FROM product WHERE id = '$product_id'";
            $priceProduct = mysqli_query($connect, $sqlPriceProduct);
            foreach ($priceProduct as $each){
                $price = $each['price'];
            }
            $sql = "INSERT INTO order_detail VALUES ('$orderID', '$product_id', '$price', '$amount')";
            mysqli_query($connect, $sql);
        }
        include_once 'connect/closeConnect.php';
        unset($_SESSION['cart']);
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
        case 'add_cart':
            add_to_cart();
            break;
        case 'view_cart':
            $infor = view_cart();
            break;
        case 'change_amount':
            change_amount();
            break;
        case 'add_order_to_db':
            add_order_to_db();
            break;
    }
?>