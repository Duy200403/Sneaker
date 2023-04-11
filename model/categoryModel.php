<?php
function indexProductDetails(){
    include_once 'connect/open.php';
    $sql = "SELECT * FROM product_details";
    $product_details = mysqli_query($connect, $sql);
    include_once 'connect/close.php';
    return $product_details;
}

function createProductDetails(){
    return;
}

function storeProductDetails(){
    $prd_dt_size = $_POST['prd_dt_size'];
    $prd_dt_new = $_POST['prd_dt_new'];
    $prd_dt_color = $_POST['prd_dt_color'];
    $prd_dt_ima = $_POST['prd_dt_ima'];
    $prd_id = $_POST['prd_id'];
    include_once 'connect/open.php';
    $sql = "INSERT INTO product_details(prd_dt_size, prd_dt_new, prd_dt_color, prd_dt_ima, prd_id) VALUES ('$prd_dt_size', '$prd_dt_new', '$prd_dt_color', '$prd_dt_ima', '$prd_id')";
    mysqli_query($connect, $sql);
    include_once 'connect/close.php';
}

function editProductDetails(){
    $prd_dt_id = $_GET['prd_dt_id'];
    include_once 'connect/open.php';
    $sql = "SELECT * FROM product_details WHERE prd_dt_id = '$prd_dt_id'";
    $product_details = mysqli_query($connect, $sql);
    include_once 'connect/close.php';
    return $product_details;
}

function updateProductDetails(){
    $prd_dt_id = $_POST['prd_dt_id'];
    $prd_dt_size = $_POST['prd_dt_size'];
    $prd_dt_new = $_POST['prd_dt_new'];
    $prd_dt_color = $_POST['prd_dt_color'];
    $prd_dt_ima = $_POST['prd_dt_ima'];
    $prd_id = $_POST['prd_id'];
    include_once 'connect/open.php';
    $sql = "UPDATE product_details SET prd_dt_size = '$prd_dt_size', prd_dt_new = '$prd_dt_new', prd_dt_color = '$prd_dt_color', prd_dt_ima = '$prd_dt_ima', prd_id = '$prd_id' WHERE prd_dt_id = '$prd_dt_id'";
    mysqli_query($connect, $sql);
    include_once 'connect/close.php';
}

function destroyProductDetails(){
    $prd_dt_id = $_GET['prd_dt_id'];
    include_once 'connect/open.php';
    $sql = "DELETE FROM product_details WHERE prd_dt_id = '$prd_dt_id'";
    mysqli_query($connect, $sql);
    include_once 'connect/close.php';
}

// Kiểm tra hành động hiện tại
switch ($action){
    case '':
        $product_details = indexProductDetails();
        break;
    case 'create':
        $product_details = createProductDetails();
        break;
    case 'store':
        storeProductDetails();
        header('Location: index.php?action=');
        break;
    case 'edit':
        $product_details = editProductDetails();
        break;
    case 'update':
        updateProductDetails();
        header('Location: index.php?action=');
        break;
    case 'destroy':
        destroyProductDetails();
        header('Location: index.php?action=');
        break;
}
?>
