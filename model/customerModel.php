<?php
function loginProcess(){
    $cus_email = $_POST['email'];
    $cus_password = $_POST['password'];
    include_once 'connect/open.php';
    $sql = "SELECT *, COUNT(*) AS count_customer FROM customers WHERE email = '$cus_email' AND password = '$cus_password'";
    $customers = mysqli_query($connect, $sql);
    foreach ($customers as $customer){
        if($customer['count_customer'] == 0){
//                login sai
            return 0;
        } else {
//                login đúng
            $_SESSION['$cus_email'] = $customer['$cus_email'];
            $_SESSION['$cus_password'] = $customer['$cus_password'];
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