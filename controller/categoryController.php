<?php
//Lấy hành động muốn thực hiện
$action = '';
if(isset($_GET['action'])){
    $action = $_GET['action'];
}
//    Kiểm tra hành động đang thực hiện là gì
switch ($action){
    case '':
//            Lấy dữ liệu từ DB về
        include_once 'model/categoryModel.php';
//            Hiển thị dữ liệu lên views
        include_once 'view/admin/categories/categories.php';
        break;
    case 'create':
        //Hiển thị ra form để thêm
        include_once 'view/admin/categories/add_categories.php';
        break;
    case 'store':
        //Thêm dữ liệu lên DB
        include_once 'model/categoryModel.php';
//            Quay về trang danh sách
        header('Location:index.php?controller=category');
        break;
    case 'edit':
        //Lấy dữ liệu của bản ghi đang được sửa
        include_once 'model/categoryModel.php';
        //Hiển thị ra form để sửa
        include_once 'view/admin/categories/edit_categories.php';
        break;
    case 'update':
        //Sửa dữ liệu trên DB
        include_once 'model/categoryModel.php';
//            Quay về trang danh sách
        header('Location:index.php?controller=category');
        break;
    case 'destroy':
//            Xóa dữ liệu trên db
        include_once 'models/categoryModel.php';
//            Quay về trang danh sách
        header('Location:index.php?controller=category');
        break;
}
?>