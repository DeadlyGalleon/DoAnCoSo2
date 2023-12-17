<?php
session_start();
require('../require.php');
$taikhoandb = new taikhoandb();

// Hardcoded credentials for demonstration purposes


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $tentaikhoan = $_POST['user'];
    $matkhau = $_POST['pass'];

 
    $authenticated_user = $taikhoandb->kiemtrataikhoan($tentaikhoan, $matkhau);
   
    echo $tentaikhoan;
    echo $matkhau;
    if ($authenticated_user != false) {
      
        $_SESSION['taikhoan'] = $authenticated_user;
        header('Location: shop.php');
        exit;
    } else {
        $error = "Tài Khoản Hoặc Mật Khẩu Không Chính Xác! Xin Hãy Thử Lại.";
        include '../web/dangnhap.php';
    }
}
?>
