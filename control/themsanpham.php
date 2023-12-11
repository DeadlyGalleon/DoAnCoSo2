<?php
require('../require.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $sanpham = new sanpham();

    // Kiểm tra và xử lý tên sản phẩm
    if (isset($_POST['name'])) {
        $sanpham->settensanpham($_POST['name']);
    }

    // Kiểm tra và xử lý file ảnh
    if (isset($_FILES['image'])) {
        $hinhanh = $_FILES['image']['name'];
        $sanpham->sethinhanh($hinhanh);
        $targetDirectory = "../image/"; // Thay đổi đường dẫn thư mục lưu trữ file ảnh
        $targetFile = $targetDirectory . basename($_FILES["image"]["name"]);
echo $targetFile;
        // Di chuyển file ảnh vào thư mục đích
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {
            // Thành công: file ảnh đã được di chuyển và sẵn sàng để lưu vào cơ sở dữ liệu
        } else {
            // Xử lý lỗi khi di chuyển file ảnh
            echo "Sorry, there was an error uploading your file.";
        }
    }

    // Kiểm tra và xử lý giá bán
    if (isset($_POST['price'])) {
        $sanpham->setgiaban($_POST['price']);
    }

    // Kiểm tra và xử lý mô tả sản phẩm
    if (isset($_POST['mota'])) {
        $productDescription = $_POST['mota'];
        $mota = nl2br($productDescription);
        $sanpham->setmota($mota);
    }

    // Kiểm tra và xử lý loại sản phẩm
    if (isset($_POST['category'])) {
        $sanpham->setloai($_POST['category']);
    }

    // Kiểm tra và xử lý hãng sản phẩm
    if (isset($_POST['brands'])) {
        $sanpham->sethang($_POST['brands']);
    }

    try {
        $dao = new dao();
        $dao->themsanpham($sanpham);
    } catch (\Throwable $th) {
        echo $th;
    }
    header('Location: ../trangchu/quanlysanpham.php');
    exit();
}
?>
