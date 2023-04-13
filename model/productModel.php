<?php
//function Lấy dữ liệu từ DB
function products(){
    include_once "connect/open.php";
    $sql = "SELECT * FROM products";
    $products = mysqli_query($connect, $sql);
    $sql = "SELECT * FROM categories";
    $categories = mysqli_query($connect, $sql);
    $sql = "SELECT * FROM size";
    $size = mysqli_query($connect, $sql);
    include_once "connect/close.php";
    $array = array();
    $array['products'] = $products;
    $array['categories'] = $categories;
    $array['size'] = $size;
    return $array;
}
function categories(){
    include_once "connect/open.php";
    $sql = "SELECT * FROM categories";
    $categories = mysqli_query($connect, $sql);
    include_once "connect/close.php";
    $array = array();
    $array['categories'] = $categories;
    return $array;
}
function index(){
    include_once 'connect/open.php';
    $search = '';
    if(isset($_POST['search'])){
        $search = $_POST['search'];
    }
    $page = 1;
    if(isset($_POST['page'])){
        $page = $_POST['page'];
    }
    $recordOnePage = 3;
//        Tong so ban ghi
    $sqlCountRecord = "SELECT COUNT(*) AS count_record FROM products WHERE prd_name LIKE '%$search%'";
    $countRecords = mysqli_query($connect, $sqlCountRecord);
    $countRecord = mysqli_fetch_assoc($countRecords)['count_record'];
    $countPage = ceil($countRecord / $recordOnePage);
    $start = ($page - 1) * $recordOnePage;
    $sql = "SELECT * FROM products WHERE prd_name LIKE '%$search%' LIMIT $start, $recordOnePage";
    $sql = "SELECT p.*, c.cate_name, s.size
        FROM products p
        JOIN categories c ON p.cate_id = c.cate_id
        JOIN size s ON p.size_id = s.size_id;";
    $products = mysqli_query($connect, $sql);
    include_once 'connect/close.php';
    $array = array();
    $array['search'] = $search;
    $array['products'] = $products;
    $array['page'] = $countPage;
    return $array;
}
function create(){
    include_once 'connect/open.php';
    $sql_1 = "SELECT p.*, c.cate_name, s.size
        FROM products p
        JOIN categories c ON p.cate_id = c.cate_id
       JOIN size s ON p.size_id = s.size_id;";
    $sql_1 = "SELECT * FROM categories";
    $query_1 = mysqli_query($connect, $sql_1);
    $sql_2 = "SELECT * FROM size";
    $query_2 = mysqli_query($connect, $sql_2);
    include_once 'connect/close.php';
    $array = array(); // tạo một mảng rỗng để lưu giá trị
    $array['categories'] = $query_1;
    $array['size'] = $query_2;
    return $array;
}
function store(){
    include_once 'connect/open.php';
    $prd_name = $_POST['prd_name'];
    $prd_ima = $_FILES['prd_ima']['name'];
    $prd_price = $_POST['prd_price'];
    if(isset($_POST['prd_featured'])){
        $prd_featured = 1;
    }else{
        $prd_featured = 0;
    }
    $prd_new = $_POST['prd_new'];
    $prd_status = $_POST['prd_status'];
    $cate = $_POST['Cate_id'];
    $size = $_POST['Size_id'];
    $file_tmp = $_FILES['prd_ima']['tmp_name'];
    move_uploaded_file($file_tmp, 'Public/image/'.$prd_ima);
    $sql = "INSERT INTO products (prd_name, prd_ima, prd_price, prd_featured,prd_new,prd_status,cate_id,size_id)
    VALUES ('$prd_name', '$prd_ima', '$prd_price', '$prd_featured','$prd_new','$prd_status', '$cate' ,'$size')";
    mysqli_query($connect, $sql);
    include_once 'connect/close.php';
}
function edit(){
    include_once 'connect/open.php';
    $id = $_GET['id'];
    $sql = "SELECT p.*, c.cate_name, s.size
        FROM products p
        JOIN categories c ON p.cate_id = c.cate_id
       JOIN size s ON p.size_id = s.size_id
       WHERE prd_id = '$id'
       ";
    $products = mysqli_query($connect, $sql);
    while ($row = mysqli_fetch_assoc($products)) {
        $array['products'][] = $row; // thêm dữ liệu từ bảng categories vào mảng $values
    }
    $sql_2 = "SELECT * FROM categories" ;
    $query_2 = mysqli_query($connect, $sql_2);
    while ($row = mysqli_fetch_assoc($query_2)) {
        $array['categories'][] = $row; // thêm dữ liệu từ bảng categories vào mảng $values
    }
    $sql_4 = "SELECT * FROM size";
    $query_4 = mysqli_query($connect, $sql_4);
    while ($row = mysqli_fetch_assoc($query_4)) {
        $array['size'][] = $row;
    }
    $array = array();
    $array['products'] = $products;
    $array['categories'] = $query_2;
    $array['size'] = $query_4;
    return $array;
}
function update(){
    $id = $_GET['id'];
    $prd_name = $_POST['prd_name'];
    $prd_ima = $_FILES['prd_ima']['name'];
    $prd_price = $_POST['prd_price'];
    if(isset($_POST['prd_featured'])){
        $prd_featured = 1;
    }else{
        $prd_featured = 0;
    }
    $prd_new = $_POST['prd_new'];
    $prd_status = $_POST['prd_status'];
    $cate = $_POST['cate_id'];
    $size = $_POST['size_id'];

    include_once 'connect/open.php';
    $sql = "UPDATE Products 
        SET prd_name = '".$prd_name."', 
            prd_ima = '".$prd_ima."', 
            prd_price = '".$prd_price."', 
            prd_status = '".$prd_status."', 
            prd_featured = '".$prd_featured."',
            prd_new = '".$prd_new."',  
            cate_id = '".$cate."', 
            size_id = '".$size."' 
        WHERE prd_id = '$id'";
    mysqli_query($connect, $sql);
    include_once 'connect/close.php';
}

function destroy(){
    $prd_id = $_GET['id'];
    include_once 'connect/open.php';
    $sql = "DELETE FROM Products WHERE Prd_id = '$prd_id'";
    mysqli_query($connect, $sql);
    include_once 'connect/close.php';
}
//    Kiểm tra hành động hiện tại
switch ($action){
    case '':
//            Lấy dữ liệu từ DB
        $array = index();
        break;
    case 'create':
        $array = create();
        break;
    case 'store':
        store();
        break;
    case 'edit':
        $array = edit();
        break;
    case 'update':
        update();
        break;
    case 'destroy':
        destroy();
        break;
    case 'products':
        $array = products();
        break;
    case 'categories':
        $array = categories();
        break;
}
?>