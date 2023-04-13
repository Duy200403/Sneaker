<?php
function index(){
    include_once('connect/open.php');
    $query = mysqli_query($connect, "SELECT * FROM user");
    include_once('connect/close.php');
    return $query;
}
function store(){
    include_once('connect/open.php');
    $user_name = $_POST['user_name'];
    $full_name = $_POST['full_name'];
    $user_email = $_POST['user_email'];
    $pass_word = $_POST['pass_word'];
    $user_level = $_POST['user_level'];
    $sql = "INSERT INTO user (user_name, full_name, user_email, pass_word, user_level) 
                VALUE ('$user_name','$full_name',' $user_email','$pass_word',$user_level)";
    mysqli_query($connect, $sql);
    include_once('connect/close.php');

}
function edit(){
    include_once('connect/open.php');
    $id = $_GET['user_id'];
    $sql ="SELECT * FROM user WHERE user_id = '$id'";
    $query = mysqli_query($connect, $sql);
    include_once('connect/close.php');
    return $query;
}
function update(){
    $id = $_POST['user_id'];
    include_once('connect/open.php');
    $user_name = $_POST['user_name'];
    $full_name = $_POST['full_name'];
    $user_email = $_POST['user_email'];
    $pass_word = $_POST['pass_word'];
    $user_level = $_POST['user_level'];
    $sql = "UPDATE user SET 
                user_name = '$user_name', full_name = '$full_name', user_email = ' $user_email', pass_word = '$pass_word', user_level = $user_level
                WHERE user_id = '$id' 
                ";
    mysqli_query($connect, $sql);
    include_once('connect/close.php');
}
function destroy(){
    $id = $_GET['user_id'];
    include_once('connect/open.php');
    mysqli_query($connect, "DELETE FROM user WHERE user_id = '$id'");
    include_once('connect/close.php');
}
switch($action){
    case '': $record = index(); break;
    case 'store':  store(); break;
    case 'edit': $record = edit(); break;
    case 'update':  update(); break;
    case 'destroy': destroy();

}

?>