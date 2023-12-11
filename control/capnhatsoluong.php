<?php
session_start();

if(isset($_GET['action']) && isset($_GET['sanphamid'])) {
    $sanpham_id = $_GET['sanphamid'];

    foreach ($_SESSION['giohang'] as $key => $item) {
        if ($item['idsanpham'] == $sanpham_id) {
            if ($_GET['action'] == 'plus') {
                $_SESSION['giohang'][$key]['soluong']++;
                $_SESSION['giohang'][$key]['thanhtien']+=$_SESSION['giohang'][$key]['giaban'];
                echo 'Tăng số lượng sản phẩm thành công!';
            } elseif ($_GET['action'] == 'minus' && $_SESSION['giohang'][$key]['soluong'] > 1) {
                $_SESSION['giohang'][$key]['soluong']--;
                $_SESSION['giohang'][$key]['thanhtien']-=$_SESSION['giohang'][$key]['giaban'];
                echo 'Giảm số lượng sản phẩm thành công!';
            } else {    
                echo 'Không thể giảm số lượng sản phẩm!';
            }
            break;
        }
    }
} else {
    echo 'Có lỗi xảy ra khi cập nhật số lượng sản phẩm.';
}
?>
