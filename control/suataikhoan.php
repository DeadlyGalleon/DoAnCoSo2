<?php
// Kiểm tra xem dữ liệu POST được gửi từ biểu mẫu không
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Đảm bảo rằng các thư viện, lớp và tệp cần thiết đã được đưa vào (require)
    require('../require.php');

    // Xử lý dữ liệu được gửi từ biểu mẫu
    $taikhoandb = new taikhoandb();

    // Lấy dữ liệu từ biểu mẫu
    $id = $_POST['id'];
    $ten = $_POST['name'];
    $sodienthoai = $_POST['sdt'];
    $matkhau = $_POST['pass'];
   $quyen=$_POST['role'];
   $taikhoan=new taikhoan();
   $taikhoan->setidtaikhoan($id);
   $taikhoan->settentaikhoan($ten);
   $taikhoan->setsodienthoai($sodienthoai);
   $taikhoan->setmatkhau($matkhau);
   $taikhoan->setquanly($quyen);



    if ($taikhoandb->suataikhoan($taikhoan)) {

        header('Location: ../quanly/quanlytaikhoan.php');
        exit();
    } else {
        // Xử lý lỗi nếu cập nhật không thành công
        echo "Có lỗi xảy ra trong quá trình cập nhật thông tin sản phẩm.";
    }
}
?>
