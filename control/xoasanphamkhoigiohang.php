<?php
session_start();

// Kiểm tra nếu spid được truyền qua URL và phiên giỏ hàng tồn tại
// Kiểm tra nếu action 'xoasanpham' được gửi từ trang giỏ hàng
if(isset($_GET['action']) && $_GET['action']=="xoasanpham" && isset($_GET['sanphamid'])) {
    $sanpham_id = $_GET['sanphamid'];

    // Kiểm tra và xóa sản phẩm khỏi giỏ hàng
    foreach ($_SESSION['giohang'] as $key => $item) {
        if ($item['idsanpham'] == $sanpham_id) {
            unset($_SESSION['giohang'][$key]); // Xóa sản phẩm ra khỏi giỏ hàng
            break;
        }
    }

    // Chuyển hướng người dùng sau khi xóa sản phẩm khỏi giỏ hàng
    header("Location: ../trangchu/cart.php");
    exit();
}

?>
