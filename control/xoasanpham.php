<?php
require('../require.php');
if (isset($_GET['spid'])) {
    // Lấy ID sản phẩm từ yêu cầu GET
    $idSanPham = $_GET['spid'];

    // Thực hiện xóa sản phẩm có ID tương ứng từ cơ sở dữ liệu ở đây
    // Ví dụ:
 $sanphamdb = new sanphamdb();
    $sanphamdb->xoasanpham($idSanPham);

    // Sau khi xóa thành công, bạn có thể chuyển hướng người dùng đến trang quản lý sản phẩm hoặc trang nào đó khác.
    header('Location: ../quanly/quanlysanpham.php');
    exit();
}
?>
