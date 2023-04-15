<?php
session_start();
//Lấy controller đang làm việc
$controller = '';
if(isset($_GET['controller'])){
    $controller = $_GET['controller'];
}
//    Kiểm tra đang làm việc với controller nào
switch ($controller){
    case '':
        //Cho chọn làm việc với controller nào
        include_once 'controller/indexModel.php';
        break;
    case 'product':
        //Cho chọn làm việc với controller nào
        include_once 'controller/productController.php';
        break;
    case 'user':
        include_once 'controller/userController.php';
        break;
    case 'admin':
        include_once 'controller/adminController.php';
        break;
    case 'login':
        include_once 'controller/loginController.php';
        break;
    case 'category':
        include_once 'controller/categoryController.php';
        break;
}
?>