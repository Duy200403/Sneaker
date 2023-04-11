<?php
function index(){
    include_once('connect/open.php');
    $sql_cate = "SELECT * FROM categories ORDER BY cate_id ASC";
    $query_cate = mysqli_query($connect, $sql_cate);
    $sql_prd_featured = "SELECT p.*, c.cate_name.*, s.size.* 
        FROM products p
        INNER JOIN categories c ON p.cate_id = c.cate_id
        INNER JOIN size s ON p.size_id = s.size_id WHERE prd_featured = 1 ORDER BY prd_id DESC LIMIT 8";
    $query_prd_featured = mysqli_query($connect, $sql_prd_featured);
    $sql_prd_new = "SELECT * FROM products  ORDER BY prd_id DESC LIMIT 6";
    $query_prd_featured = mysqli_query($connect, $sql_prd_featured);

    include_once('connect/close.php');
    $arr = array();
    $arr['categories'] = $query_cate;
    $arr['featured'] = $query_prd_featured;
    $arr['new'] = $sql_prd_new;
    return $arr;
}
switch($action){
    case '': $arr = index(); break;
    case 'products': $arr = index(); break;
}
?>