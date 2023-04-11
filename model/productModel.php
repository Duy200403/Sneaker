<?php
//function Lấy dữ liệu từ DB
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
//    $sql = "SELECT p.*, c.cate_name, s.size
//        FROM products p
//        JOIN categories c ON p.cate_id = c.cate_id
//        JOIN size s ON p.size_id = s.size_id;";
    $sql_1 = "SELECT * FROM categories";
    $query_1 = mysqli_query($connect, $sql_1);
    $sql_2 = "SELECT * FROM size";
    $query_2 = mysqli_query($connect, $sql_2);
//    $products = mysqli_query($connect, $sql);
    include_once 'connect/close.php';
    $values = array(); // tạo một mảng rỗng để lưu giá trị
    $values['categories'] = $query_1;
    $values['size'] = $query_2;
    return $values;
}
function store(){
    $Prd_name = $_POST['prd_name'];
    $prd_ima = $_POST['prd_ima'];
    $Prd_price = $_POST['Prd_price'];
    if(isset($_POST['prd_featured'])){
        $featured = 1;
    }else{
        $featured = 0;
    }
    $Prd_new = $_POST['prd_new'];
    $Prd_status = $_POST['prd_status'];
    include_once 'connect/open.php';
    $sql = "INSERT INTO Products (Prd_name, Prd_ima, Prd_price, Prd_featured,Prd_new,Prd_status, cate_id) VALUES ('Prd_name', 'Prd_ima', 'Prd_price', 'Prd_featured','Prd_new','Prd_status', 'cate_id')";
    mysqli_query($connect, $sql);
    include_once 'connect/close.php';
}
function edit(){
    $prd_id = $_GET['id'];
    include_once 'connect/open.php';
    $sql = "SELECT * FROM products WHERE prd_id = '$prd_id'";
    $products = mysqli_query($connect, $sql);
    include_once 'connect/close.php';
    $array = array();
    $array['products'] = $products;
    return $array;
}
function update(){
    $prd_id = $_POST['prd_id'];
    $prd_name = $_POST['prd_name'];
    $prd_ima = $_POST['prd_ima'];
    $prd_price = $_POST['prd_price'];
    $prd_featured = $_POST['prd_featured'];
    $cate_id = $_POST['cate_id'];

    include_once 'connect/open.php';
    $sql = "UPDATE Products SET Prd_name='".$prd_name."', Prd_ima='".$prd_ima."', Prd_price='".$prd_price."', Prd_featured='".$prd_featured."', cate_id='".$cate_id."'
            WHERE Prd_id=".$prd_id;
    mysqli_query($connect, $sql);
    include_once 'connect/close.php';
}

function destroy(){
    $prd_id = $_GET['prd_id'];
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
        $classes = create();
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
}
?>