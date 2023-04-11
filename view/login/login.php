<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="../../public/css/login.css">
    <link href="../../public/css/bootstrap.min.css" rel="stylesheet">
    <link href="../../public/css/datepicker3.css" rel="stylesheet">
    <link href="../../public/css/bootstrap-table.css" rel="stylesheet">
</head>
<body>
<div class="login-content">
    <div class="login-heading">
        <a href="login.html" style="opacity: 1;"><h2>ĐĂNG NHẬP</h2> </a>
        <a href="register.html" style="opacity: 0.5;"><h2>ĐĂNG KÍ</h2></a>

    </div>
    <br><br>
    <form role="form" method="post" action="index.php?controller=login&action=checklogin">
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email</label>
            <input type="text" class="form-control" name="user_name" aria-describedby="emailHelp" placeholder="Vui lòng nhập email của bạn">

        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Mật Khẩu</label>
            <input type="password" class="form-control" name="pass_word" placeholder="Vui lòng nhập mật khẩu">
        </div>

        <div class="button-login">
            <button type="submit" name="sbm" class="btn btn-primary">Đăng nhập</button>
            <p>Bạn chưa có tài khoản? <a href="register.html">Đăng ký ngay</a></p>
        </div>
    </form>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>