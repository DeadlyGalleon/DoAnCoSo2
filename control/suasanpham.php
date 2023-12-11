<?php
// Kiểm tra xem dữ liệu POST được gửi từ biểu mẫu không
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Đảm bảo rằng các thư viện, lớp và tệp cần thiết đã được đưa vào (require)
    require('../require.php');

    // Xử lý dữ liệu được gửi từ biểu mẫu
    $sanphamdb = new sanphamdb();

    // Lấy dữ liệu từ biểu mẫu
    $idSanPham = $_POST['spid'];
    $tenSanPham = $_POST['name'];
    $giaBan = $_POST['price'];
    $moTa = $_POST['mota'];
    $loaiSanPham = $_POST['category'];
    $hangSanPham = $_POST['brand'];

    // Kiểm tra và xử lý hình ảnh
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $hinhanh = $_FILES['image']['name'];

        // Thực hiện các bước tiếp theo để di chuyển và lưu trữ hình ảnh
        $targetDirectory = "../image/";
        $targetFile = $targetDirectory . basename($_FILES["image"]["name"]);

        if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {
            // Nếu di chuyển file ảnh thành công, thực hiện các thao tác tiếp theo ở đây
        } else {
            // Xử lý lỗi khi di chuyển file ảnh không thành công
            echo "Sorry, there was an error uploading your file.";
        }
    }

    // Tạo một đối tượng sản phẩm với dữ liệu mới
    $sanPhamUpdate = new sanpham();
    $sanPhamUpdate->setidsanpham($idSanPham);
    $sanPhamUpdate->settensanpham($tenSanPham);
    $sanPhamUpdate->setgiaban($giaBan);
    $sanPhamUpdate->setmota($moTa);
    $sanPhamUpdate->setloai($loaiSanPham);
    $sanPhamUpdate->sethang($hangSanPham);

    // Gán tên hình ảnh vào đối tượng sản phẩm
    $sanPhamUpdate->sethinhanh($hinhanh);

    // Cập nhật thông tin sản phẩm trong cơ sở dữ liệu
    if ($sanphamdb->suasanpham($sanPhamUpdate)) {
        // Nếu cập nhật thành công, bạn có thể chuyển hướng người dùng đến một trang khác hoặc thực hiện hành động mong muốn
        header('Location: ../TrangChu/quanlysanpham.php');
        exit();
    } else {
        // Xử lý lỗi nếu cập nhật không thành công
        echo "Có lỗi xảy ra trong quá trình cập nhật thông tin sản phẩm.";
    }
}
?>
