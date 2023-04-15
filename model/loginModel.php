<?php
function loginProcess(){
    $user_email = $_POST['email'];
    $user_password = $_POST['password'];
    include_once 'connect/open.php';
    $sql = "SELECT *, COUNT(*) AS count_user FROM user WHERE $user_email = '$user_email' AND $user_password = '$user_password'";
    $user = mysqli_query($connect, $sql);
    foreach ($user as $user){
        if($user['count_customer'] == 0){
//                login sai
            return 0;
        } else {
//                login đúng
            $_SESSION['$user_email'] = $user['$user_email'];
            $_SESSION['$user_password'] = $user['$user_password'];
            return 1;
        }
    }
    include_once 'connect/close.php';
}

function logout(){
    session_destroy();
}

switch ($action){
    case 'loginProcess':
        $user = loginProcess();
        break;
    case 'logout':
        logout();
        break;
}
?>