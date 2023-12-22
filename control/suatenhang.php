<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Đảm bảo rằng các thư viện, lớp và tệp cần thiết đã được đưa vào (require)
    require('../require.php');

    $hangdb=new hangdb();
    $idloai=$_POST['idhang'];
    $tenloai=$_POST['namehang'];
    $hangdb->suatenhang($idloai,$tenloai);
    header('Location: ../quanly/quanlydanhmuc.php');
exit();
}
?>

