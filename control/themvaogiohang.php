<?php
require('../require.php');

$sanphamdb=new sanphamdb();
// Start the session
session_start();

// Kiểm tra xem sản phẩm ID có được gửi từ trang danh sách sản phẩm không
if (isset($_GET['sanphamid'])) {
    // Lấy thông tin sản phẩm từ cơ sở dữ liệu hoặc từ bất kỳ nguồn dữ liệu nào khác
    $sanpham_id = $_GET['sanphamid'];
    $sanpham_info = $sanphamdb->getsanphambyid($sanpham_id);

    // Kiểm tra xem giỏ hàng có tồn tại không, nếu không thì tạo mới
    if (!isset($_SESSION['giohang'])) {
        $_SESSION['giohang'] = array();
    }

    // Kiểm tra xem sản phẩm đã có trong giỏ hàng hay chưa
    $sanpham_exist = false;
    foreach ($_SESSION['giohang'] as $key => $item) {
        if ($item['idsanpham'] == $sanpham_info->getidsanpham()) {
            // Sản phẩm đã tồn tại trong giỏ hàng, cập nhật số lượng
            $_SESSION['giohang'][$key]['soluong']++; // Hoặc thực hiện cập nhật số lượng theo logic của bạn
            $_SESSION['giohang'][$key]['thanhtien']+=$_SESSION['giohang'][$key]['giaban'];
            $sanpham_exist = true;
            break;
        }
    }

    if (!$sanpham_exist) {
        // Sản phẩm chưa tồn tại trong giỏ hàng, thêm sản phẩm mới
        $giohang_item = array(
            'idsanpham' => $sanpham_info->getidsanpham(),
            'tensanpham' => $sanpham_info->gettensanpham(),
            'mota' => $sanpham_info->getmota(),
            'hinhanh' => $sanpham_info->gethinhanh(),
            'loai' => $sanpham_info->getloai(),
            'giaban'=>$sanpham_info->getgiaban(),
            'hang' => $sanpham_info->gethang(),
            'soluong' => 1, // Số lượng sản phẩm
            'thanhtien'=>$sanpham_info->getgiaban()
        );
        
        $_SESSION['giohang'][] = $giohang_item;
    }

    // Chuyển hướng người dùng sau khi thêm sản phẩm vào giỏ hàng
    header("Location: ../trangchu/shop.php");
    exit();
} else {
    echo "Không có sản phẩm được chọn để thêm vào giỏ hàng";
}
?>
