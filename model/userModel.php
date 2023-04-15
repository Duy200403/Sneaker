<?php
function index(){
    include_once('connect/open.php');
    $array = mysqli_query($connect, "SELECT * FROM user");
    include_once('connect/close.php');
    return $array;
}
function create(){
    include_once('connect/open.php');
    $array = mysqli_query($connect, "SELECT * FROM user");
    include_once('connect/close.php');
    return $array;
}
function store(){
    include_once('connect/open.php');
    $user_name = $_POST['user_name'];
    $user_email = $_POST['user_email'];
    $user_password = $_POST['user_password'];
    $phone_number = $_POST['phone_number'];
    $user_address = $_POST['user_address'];
    $user_level = $_POST['user_level'];
    $sql = "INSERT INTO user (user_name, phone_number, user_email, user_password, user_level, user_address) 
                VALUE ('$user_name','$phone_number',' $user_email','$user_password','$user_level','$user_address')";
    mysqli_query($connect, $sql);
    include_once('connect/close.php');

}
function edit(){
    include_once('connect/open.php');
    $id = $_GET['id'];
    $sql ="SELECT * FROM user WHERE user_id = '$id'";
    $array = mysqli_query($connect, $sql);
    include_once('connect/close.php');
    return $array;
}
function update(){
    $id = $_GET['id'];
    $user_name = $_POST['user_name'];
    $user_email = $_POST['user_email'];
    $user_password = $_POST['user_password'];
    $phone_number = $_POST['phone_number'];
    $user_address = $_POST['user_address'];
    $user_level = $_POST['user_level'];
    include_once 'connect/open.php';
    $sql = "UPDATE user 
            SET user_name = '$user_name', 
                phone_number = '$phone_number', 
                user_email = '$user_email', 
                user_password = '$user_password', 
                user_level = '$user_level', 
                user_address = '$user_address' 
            WHERE user_id = '$id'";
    mysqli_query($connect, $sql);
    include_once('connect/close.php');
}
function destroy(){
    $id = $_GET['id'];
    include_once('connect/open.php');
    $sql = "DELETE FROM user WHERE user_id = '$id'";
    mysqli_query($connect, $sql);
    include_once('connect/close.php');
}
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

}

?>