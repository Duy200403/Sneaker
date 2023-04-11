<?php
//function lấy dữ liệu từ db về
function index(){
    include_once 'connect/open.php';
    $sql = "SELECT * FROM categories";
    $categories = mysqli_query($connect, $sql);
    include_once 'connect/close.php';
    return $categories;
}
//    function thêm dữ liệu lên db
function store(){
//        Lấy dữ liệu từ form về
    $cate_name = $_POST['cate_name'];
    include_once 'connect/open.php';
    $sql = "INSERT INTO categories(cate_name) VALUES ('$cate_name')";
    mysqli_query($connect, $sql);
    include_once 'connect/close.php';
}
//    function để lấy dữ liệu theo id
function edit(){
//        Lấy id
    $cate_id = $_GET['id'];
    include_once 'connect/open.php';
    $sql = "SELECT * FROM categories WHERE cate_id = '$cate_id'";
    $categories = mysqli_query($connect, $sql);
    include_once 'connect/close.php';
    return $categories;
}
//    function sửa dữ liệu trên db theo id
function update(){
//        Lấy dữ liệu cần update lên db
    $cate_id = $_POST['cate_id'];
    $cate_name = $_POST['cate_name'];

    include_once 'connect/open.php';
    $sql = "UPDATE categories SET cate_name = '$cate_name' WHERE cate_id = '$cate_id'";
    $categories = mysqli_query($connect, $sql);
    include_once 'connect/close.php';
}
//    function xóa dữ liệu trên db theo id
function destroy(){
//        Lấy id
    $cate_id = $_GET['id'];
    include_once 'connect/open.php';
    $sql = "DELETE FROM categories WHERE cate_id = '$cate_id'";
    mysqli_query($connect, $sql);
    include_once 'connect/close.php';
}

//    Kiểm tra đang thực hiện hành động gì
switch ($action){
    case '':
        //Lấy dữ liệu từ db về
        $categories = index();
        break;
    case 'store':
        //Thêm dữ liệu lên DB
        store();
        break;
    case 'edit':
        //Lấy bản ghi theo id
        $categories = edit();
        break;
    case 'update':
        //Sửa dữ liệu trên db theo id
        update();
        break;
    case 'destroy':
//            Xóa dữ liệu trên db theo id
        destroy();
        break;
}
?>