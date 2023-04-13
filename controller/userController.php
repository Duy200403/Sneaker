<?php
$action = '';
if(isset($_GET['action'])){
    $action = $_GET['action'];
}

switch ($action){
    case '':
        include_once  "model/userModel.php";
        include_once "view/admin/index.php";
        break;
    case 'create':
        include_once "view/admin/user/add_user.php";
        break;
    case 'store':
        include_once "model/userModel.php";
        header('Location:index.php?controller=user');
        break;
    case 'edit':
        include_once "model/userModel.php";
        include_once "view/admin/user/edit_user.php";
        break;
    case 'update':
        include_once "model/userModel.php";
        header('Location:index.php?controller=user');
        break;
    case 'remove':
        include_once "model/userModel.php";
        header('Location:index.php?controller=user');
        break;
}

?>