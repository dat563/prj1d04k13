<?php
    function loginAdmin(){
        $email = $_POST['email'];
        $password = $_POST['password'];
        include_once 'connect/openConnect.php';
        $sql = "SELECT *, COUNT(*) AS count_user FROM user WHERE email = '$email' AND password = '$password'";
        $users = mysqli_query($connect, $sql);
        include_once 'connect/closeConnect.php';
        foreach ($users as $user){
            if($user['count_user'] == 0){
                return 0;
            } elseif ($user['count_user'] == 1){
                $_SESSION['email'] = $email;
                return 1;
            }
        }
    }

    switch ($action){
        case 'loginAccess':
            $test = loginAdmin();
            break;
        case 'logout':
            session_destroy();
            break;
    }
?>