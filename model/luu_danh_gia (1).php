<?php 
require('../require.php');

$danhgiadb = new Danhgia_db();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_GET['spid'])){

    $idsp = $_GET['spid'];
    $rating = $_POST['rating'];
    $comment = $_POST['comment'];

    // Gọi hàm themdanhgia và truyền giá trị từ form vào
    $danhgiadb->themdanhgia(19, $idsp, $rating, $comment);

    // Chuyển hướng trở lại trang gốc hoặc trang thành công
    header('Location: shop-details.php?spid=' . $idsp);
    exit;
}


?> 