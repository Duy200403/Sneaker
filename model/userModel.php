<?php
function loginProcess(){
    $user_email = $_POST['email'];
    $user_password = $_POST['password'];
    include_once 'connect/open.php';
    $sql = "SELECT *, COUNT(*) AS count_user FROM user WHERE email = '$user_email' AND password = '$user_password'";
    $user = mysqli_query($connect, $sql);
    foreach ($user as $customer){
        if($customer['count_customer'] == 0){
//                login sai
            return 0;
        } else {
//                login đúng
            $_SESSION['$user_email'] = $customer['$user_email'];
            $_SESSION['$user_password'] = $customer['$user_password'];
            return 1;
        }
    }
    include_once 'connect/close.php';
}

function logout(){
    session_destroy();
}

switch ($action){
    case 'loginProcess':
        $test = loginProcess();
        break;
    case 'logout':
        logout();
        break;
}
?>