<?php
// Start the session
session_start();

// Kiểm tra và hiển thị thông tin giỏ hàng
if (isset($_SESSION['giohang']) && !empty($_SESSION['giohang'])) {
    foreach ($_SESSION['giohang'] as $key => $sanpham) {
        echo '<div class="product">';
        echo '    <img src="' . $sanpham['hinhanh'] . '" alt="Product Image">';
        echo '    <h2>' . $sanpham['tensp'] . '</h2>';
        echo '    <p>Giá: ' . $sanpham['giaban'] . ' VND</p>';
        echo '    <p>Số lượng: ' . $sanpham['soluong'] . '</p>';
        echo '</div>';
    }
} else {
    echo 'Giỏ hàng của bạn đang trống.';
}
?>
