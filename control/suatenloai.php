<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Đảm bảo rằng các thư viện, lớp và tệp cần thiết đã được đưa vào (require)
    require('../require.php');

    $loaidb=new loaidb();
    $idloai=$_POST['idloai'];
    $tenloai=$_POST['nameloai'];
    $loaidb->suatenloai($idloai,$tenloai);
    header('Location: ../quanly/quanlydanhmuc.php');
exit();
}
?>

