<?php 
require('require.php');

$donhangdb=new donhangdb();
$orders =  $donhangdb->getalldonhang(); // Hàm getalldonhang() đã được cài đặt trước đó

// Hiển thị thông tin đơn hàng lên trang web
foreach ($orders as $order) {
    echo "<h2>Đơn hàng ID: " . $order['order_info']['id'] . "</h2>";
    echo "<p>Ngày đặt hàng: " . $order['order_info']['ngaygio'] . "</p>";
    echo "<p>Trạng thái: " . $order['order_info']['trangthai'] . "</p>";

    echo "<h3>Sản phẩm trong đơn hàng:</h3>";
    echo "<ul>";
    foreach ($order['products'] as $product) {
        echo "<li>Sản phẩm ID: " . $product['idsanpham'] . ", Giá cũ: " . $product['giacu'] . ", Số lượng: " . $product['soluong'] . "</li>";
    }
    echo "</ul>";
    echo "<hr>"; // Tạo đường kẻ để phân biệt giữa các đơn hàng
}


?> 