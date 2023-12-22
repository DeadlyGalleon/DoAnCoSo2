<?php 
require("../require.php");
if(isset($_GET['id'])){
$id=$_GET['id'];
$taikhoandb=new taikhoandb();
if($taikhoandb->xoataikhoan($id)){

    header('Location: ../quanly/quanlytaikhoan.php');
    exit();
} else {
    // Xử lý lỗi nếu cập nhật không thành công
    echo "Có lỗi xảy ra trong quá trình cập nhật thông tin sản phẩm.";
}


}
?> 
