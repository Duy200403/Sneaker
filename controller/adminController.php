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
//            Hiển thị dữ liệu lên views
        include_once 'view/admin/admin.php';
        break;
    case 'create':
        //Hiển thị ra form để thêm
        include_once 'view/admin/admin.php';
        break;
    case 'store':
        //Thêm dữ liệu lên DB
//            Quay về trang danh sách
        include_once 'view/admin/admin.php';
        break;
    case 'edit':
        //Lấy dữ liệu của bản ghi đang được sửa
        //Hiển thị ra form để sửa
        include_once 'view/admin/admin.php';
        break;
    case 'update':
        //Sửa dữ liệu trên DB

//            Quay về trang danh sách
        header('Location:index.php?controller=admin');
        break;
    case 'destroy':
//            Xóa dữ liệu trên db
//            Quay về trang danh sách
        header('Location:index.php?controller=admin');
        break;
}
?>