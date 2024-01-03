<?php 
session_start();
ob_start();
require('../require.php');
$taikhoandb = new taikhoandb();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $tentaikhoan = $_POST['user'];
    $matkhau = $_POST['pass'];
    $sodienthoai = $_POST['sdt'];
    $matkhaunhaplai = $_POST['repass'];

   
    if (strlen($matkhau) < 8) {
        $error = "Mật khẩu phải có ít nhất 8 ký tự!";
    } elseif (strlen($sodienthoai) !== 10 || $sodienthoai[0] !== '0' || $sodienthoai[1] === '0') {
        $error = "Số điện thoại không hợp lệ! Số điện thoại phải có 10 chữ số và bắt đầu bằng số 0, số thứ hai khác 0.";
    } elseif ($matkhau !== $matkhaunhaplai) {
        $error = "Mật khẩu không khớp! Vui lòng thử lại.";
    } elseif($taikhoandb->kiemtrataikhoantontai($tentaikhoan)) {
        $error = "Tài khoản đã tồn tại!";

       
    }
    elseif($taikhoandb->kiemtrasodienthoaitontai($sodienthoai)) {
        $error = "Số điện thoại đã tồn tại!";

       
    }else{
        $taikhoanc=new taikhoan();
        $taikhoanc->settentaikhoan($tentaikhoan);
        $taikhoanc->setmatkhau($matkhau);
        $taikhoanc->setsodienthoai($sodienthoai);

        $taikhoanc->setquanly(0);

        $taikhoanc->setadmin(0);

        $taikhoandb->dangkitaikhoan($taikhoanc);

        $_SESSION['success_message'] = "Đăng ký thành công!";

        // Chuyển hướng về trang đăng nhập
        header("Location: dangnhap.php");
        exit(); 


    }
}
?>

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
        <link href="css/login.css" rel="stylesheet" type="text/css"/>
        <title>Đăng Ký</title>
    </head>
     <style>
            img{
                width: 200px;
                height: 120px;
            }
            
input[type="submit"], button[type=submit] {
    background: none repeat scroll 0 0 #435d7d;
    border: medium none;
    color: #fff;
    padding: 11px 20px;
    text-transform: uppercase;
}

input, button, select, textarea {
    font-family: inherit;
    font-size: inherit;
    line-height: inherit;
}
        </style>
    <body>
        <div class="container">
            <a href="../mainwweb/">   <button type="submit">Trở Về Trang Chủ</button></a>
        <div id="logreg-forms">
         

            <form method="post" class>
                 
                <h1> <class="h3 mb-3 font-weight-normal" style="text-align: center"> Đăng Kí</h1>
                <p class="text-danger"><?php echo isset($error) ? $error : ''; ?></p>
              
                <input name="user" type="text" id="user-name" class="form-control" placeholder="Tài Khoản" required="" autofocus="">
                <input name="sdt" type="text" id="user-name" class="form-control" placeholder="Số Điện Thoại" required="" autofocus="">
                <input name="pass" type="password" id="user-pass" class="form-control" placeholder="Mật Khẩu" required autofocus="">
                <input name="repass" type="password" id="user-repeatpass" class="form-control" placeholder="Nhập Lại Mật Khẩu" required autofocus="">

                <button class="btn btn-primary btn-block" type="submit"><i class="fas fa-user-plus"></i>Đăng Kí</button>
                <a href="dangnhap.php" id="cancel_signup"><i class="fas fa-angle-left"></i> trở lại</a>
            </form>
                <br>

        </div>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <script>
            
        </script>
    
        </div>
        </body>
</html>