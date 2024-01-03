<?php
session_start();
ob_start();
require('../require.php');



$taikhoandb = new taikhoandb();


// Hardcoded credentials for demonstration purposes


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $tentaikhoan = $_POST['user'];
    $matkhau = $_POST['pass'];

    
    $authenticated_user = $taikhoandb->kiemtrataikhoan($tentaikhoan, $matkhau);
   
  
    if ($authenticated_user != false) {
    
      
        $_SESSION['taikhoan'] = $authenticated_user;
        $_SESSION['idtk']=$authenticated_user->getidtaikhoan();
        $taikhoan=new taikhoan();
$taikhoan=$_SESSION['taikhoan'];

echo "<script>
alert('Đăng nhập thành công!');
window.location.href = '../mainwweb';
</script>";

exit();
      
    } else {
        $error = "Tài Khoản Hoặc Mật Khẩu Không Chính Xác! Xin Hãy Thử Lại.";
     
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
        <title>Đăng Nhập</title>
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
            <form class="form-signin" action="dangnhap.php" method="post">
                <h1 class="h3 mb-3 font-weight-normal" style="text-align: center">Đăng Nhập</h1>
                <?php
                if (isset($_SESSION['success_message'])) {
                    echo '<p style="color: green;">' . $_SESSION['success_message'] . '</p>';
                    unset($_SESSION['success_message']); // Xóa thông báo sau khi hiển thị
                }
                ?> 
                <p class="text-danger"><?php echo isset($error) ? $error : ''; ?></p>
                <input name="user"  type="text" id="inputEmail" class="form-control" placeholder="Tài Khoản" required="" autofocus="">
                <input name="pass"  type="password" id="inputPassword" class="form-control" placeholder="Mật Khẩu" required="">

            

                <button class="btn btn-success btn-block" type="submit"><i class="fas fa-sign-in-alt"></i> Đăng Nhập</button>
                <hr>
                <a href="dangki.php"><button class="btn btn-primary btn-block" type="button" id="btn-signup"><i class="fas fa-user-plus"></i> Đăng Ký Tài Khoản Mới</button></a> 
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