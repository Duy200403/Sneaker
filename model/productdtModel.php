<?php
function indexProduct(){
    include_once 'connect/open.php';
    $sql = "SELECT *
        FROM Products
        INNER JOIN Product_details
        ON Products.Prd_id = Product_details.prd_id;";
    $products = mysqli_query($connect, $sql);
    include_once 'connect/close.php';
    return $products;
}

function add_to_cart(){
    $product_id = $_GET['prd_id'];
    if(isset($_SESSION['cart'])){
        if(isset($_SESSION['cart'][$product_id])){
            $_SESSION['cart'][$product_id]++;
        } else {
            $_SESSION['cart'][$product_id] = 1;
        }
    } else {
        $_SESSION['cart'] = array();
        $_SESSION['cart'][$product_id] = 1;
    }
}

function view_cart(){
    $cart = array();
    $temp = array();
    include_once 'connect/open.php';
    $sqlCustomer = "SELECT * FROM customers";
    $customers = mysqli_query($connect, $sqlCustomer);
    foreach ($_SESSION['cart'] as $product_id  => $amount){
        $sqlNameAndPrice = "SELECT Prd_name as name, Prd_price as price FROM products WHERE Prd_id = '$product_id'";
        $nameAndPrice = mysqli_query($connect, $sqlNameAndPrice);
        foreach ($nameAndPrice as $each){
            $temp[$product_id]['name'] = $each['name'];
            $temp[$product_id]['price'] = $each['price'];
            $temp[$product_id]['amount'] = $amount;
        }
    }
    include_once 'connect/close.php';
    $cart['products'] = $temp;
    $cart['customers'] = $customers;
    return $cart;
}

function update_cart(){
    $items = $_POST['amount'];
    foreach ($items as $product_id => $amount){
        $_SESSION['cart'][$product_id] = $amount;
    }
}

function delete_one_product_in_cart(){
    $product_id = $_GET['product_id'];
    unset($_SESSION['cart'][$product_id]);
}

function delete_cart(){
    unset($_SESSION['cart']);
    $_SESSION['cart'] = array();
}

function add_order(){
    $customer_id = $_POST['customer_id'];
    $dateBuy = date('Y-m-d');
    $status = 1;
    $staff_id = $_SESSION['staff_id'];
    include_once 'connect/open.php';
    $sqlAddOrder = "INSERT INTO orders(date_buy, status, customer_id, staff_id) VALUES ('$dateBuy', '$status', '$customer_id', '$staff_id')";
    mysqli_query($connect, $sqlAddOrder);
    $cart = $_SESSION['cart'];
    //Lay id orders moi nhat theo id cua khach hang
    $sqlOrderID = "SELECT MAX(id) AS max_id FROM orders WHERE customer_id = '$customer_id'";
    $orderIDs = mysqli_query($connect, $sqlOrderID);
    foreach ($orderIDs as $each){
        $orderID = $each['max_id'];
    }
    //Lay product_id, amount, price
    foreach ($cart as $product_id => $amount){
        $sqlProductPrice = "SELECT Prd_price as price FROM products WHERE Prd_id = '$product_id'";
        $productPrice = mysqli_query($connect, $sqlProductPrice);
        foreach ($productPrice as $value){
            $price = $value['price'];
        }
        //Add order details
        $sqlAddOrderDetails = "INSERT INTO order_details VALUES ('$product_id', '$orderID', '$price', '$amount')";
        mysqli_query($connect, $sqlAddOrderDetails);
    }
    switch ($action){
        case '':
            $products = indexProduct();
            break;
        case 'add_to_cart':
            add_to_cart();
            break;
        case 'view_cart':
            $cart = view_cart();
            break;
        case 'update_cart':
            update_cart();
            break;
        case 'delete_one_product_in_cart':
            delete_one_product_in_cart();
            break;
        case 'delete_cart':
            delete_cart();
            break;
        case 'add_order':
            add_order();
            break;
    }
    ?>