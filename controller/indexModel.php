<?php
//Lấy hành động muốn thực hiện
$action = '';
if(isset($_GET['action'])){
    $action = $_GET['action'];
}
switch ($action){
    case '':
        include_once 'model/productModel.php';
        include_once 'view/index.php';
        break;
    case 'category':
        include_once 'model/productModel.php';
        include_once 'view/index.php';
        break;
    case 'product':
       include_once 'model/productModel.php';
       include_once 'view/index.php';
       break;
}
?>

