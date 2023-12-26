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

    if (isset($_FILES['imagechitiet']) && $_FILES['imagechitiet']['error'] === UPLOAD_ERR_OK) {
        $db= database::getDB();
        
        $total_images_detail = count($_FILES['imagechitiet']['name']);
    
 $querry='DELETE FROM hinhanh WHERE idsanpham ='.$idSanPham.'';
    $db->query($querry);
        // Lưu hình ảnh chi tiết vào bảng hinhanh
        for ($j = 0; $j < $total_images_detail; $j++) {
            $file_name_detail = $_FILES['imagechitiet']['name'][$j];
            $file_tmp_detail = $_FILES['imagechitiet']['tmp_name'][$j];
    
            $query_detail = "INSERT INTO `hinhanh` (`idsanpham`, `hinhanh`) VALUES (:idsanpham, :hinhanh)";
            $statement_detail = $db->prepare($query_detail);
            $statement_detail->bindParam(':idsanpham', $idSanPham); // ID sản phẩm tương ứng
            $statement_detail->bindParam(':hinhanh', $file_name_detail);
            $statement_detail->execute();
    
            // Di chuyển hình ảnh chi tiết vào thư mục lưu trữ (nếu cần)
            move_uploaded_file($file_tmp_detail, '../image/' . $file_name_detail);
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
        header('Location: ../quanly/');
        exit();
    } else {
        // Xử lý lỗi nếu cập nhật không thành công
        echo "Có lỗi xảy ra trong quá trình cập nhật thông tin sản phẩm.";
    }
}
?>
