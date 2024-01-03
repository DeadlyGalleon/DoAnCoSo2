<?php 
session_start();
require('../require.php');

$danhgiadb = new Danhgia_db();
$idtk = $_SESSION['idtk'];

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_GET['spid'])){

    $idsp = $_GET['spid'];
    $rating = $_POST['rating'];
    $comment = $_POST['comment'];

    // Gọi hàm themdanhgia và truyền giá trị từ form vào
    $danhgiadb->themdanhgia($idtk, $idsp, $rating, $comment);

    // Chuyển hướng trở lại trang gốc hoặc trang thành công
    header('Location: ../mainwweb/ttsanpham.php?spid=' . $idsp);
    exit;
}


?> 