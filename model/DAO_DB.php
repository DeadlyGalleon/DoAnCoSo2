<?php

class dao {

   public function xoasanpham($idsanpham){
    $querry = "DELETE FROM sanpham WHERE `sanpham`.`idsanpham` = $idsanpham";
    $db=database::getDB();
    $db->query($querry);



   }

   public function themsanpham($sanphamc) {
    $sanpham = $sanphamc;

    $tensp = $sanpham->gettensanpham();
    $mota = $sanpham->getmota();
    $hinhanh = $sanpham->gethinhanh();
    $giaban = $sanpham->getgiaban();
    $loai = $sanpham->getloai();
    $hang = $sanpham->gethang();

    try {
        $db = database::getDB();

        // Sử dụng Prepared Statements để thêm sản phẩm vào cơ sở dữ liệu
        $query = "INSERT INTO `sanpham` (`tensanpham`, `mota`, `hinhanh`, `giaban`, `loai`, `hang`) 
                  VALUES (:tensp, :mota, :hinhanh, :giaban, :loai, :hang)";
        $stmt = $db->prepare($query);

        // Gắn các giá trị vào truy vấn sử dụng bindParam
        $stmt->bindParam(':tensp', $tensp);
        $stmt->bindParam(':mota', $mota);
        $stmt->bindParam(':hinhanh', $hinhanh);
        $stmt->bindParam(':giaban', $giaban);
        $stmt->bindParam(':loai', $loai);
        $stmt->bindParam(':hang', $hang);

        // Thực thi truy vấn
        if ($stmt->execute()) {
            return $db->lastInsertId();
        } else {
            echo "Lỗi khi thêm sản phẩm.";
        }

        // Đóng kết nối đến cơ sở dữ liệu
        $db = null;
    } catch (PDOException $e) {
        echo "Lỗi: " . $e->getMessage();
    }
}


public function suasanpham($sanphamc) {
    $sanpham = $sanphamc;
    $idsanpham = $sanpham->getidsanpham();
    $tensp = $sanpham->gettensanpham();
    $mota = $sanpham->getmota();
    $hinhanh = $sanpham->gethinhanh();
    $loai = $sanpham->getloai();
    $hang = $sanpham->gethang();

    try {
        $db = database::getDB();

        // Sử dụng Prepared Statements để cập nhật thông tin sản phẩm trong cơ sở dữ liệu
        $query = "UPDATE `sanpham` SET `tensanpham` = :tensp, `mota` = :mota, `hinhanh` = :hinhanh, `loai` = :loai, `hang` = :hang WHERE `sanpham`.`idsanpham` = :idsanpham";
        $stmt = $db->prepare($query);

        // Gắn các giá trị vào truy vấn sử dụng bindParam
        $stmt->bindParam(':idsanpham', $idsanpham);
        $stmt->bindParam(':tensp', $tensp);
        $stmt->bindParam(':mota', $mota);
        $stmt->bindParam(':hinhanh', $hinhanh);
        $stmt->bindParam(':loai', $loai);
        $stmt->bindParam(':hang', $hang);

        // Thực thi truy vấn
        if ($stmt->execute()) {
            echo "Thông tin sản phẩm đã được cập nhật thành công.";
        } else {
            echo "Lỗi khi cập nhật thông tin sản phẩm.";
        }

        // Đóng kết nối đến cơ sở dữ liệu
        $db = null;
    } catch (PDOException $e) {
        echo "Lỗi: " . $e->getMessage();
    }
}

public function suahinhanh($idsanpham,$hinhanh) {
 

    try {
        $db = database::getDB();

        // Sử dụng Prepared Statements để cập nhật thông tin sản phẩm trong cơ sở dữ liệu
        $query = "UPDATE `sanpham` SET `hinhanh` = :hinhanh WHERE `sanpham`.`idsanpham` = :idsanpham";
        $stmt = $db->prepare($query);

        // Gắn các giá trị vào truy vấn sử dụng bindParam
        $stmt->bindParam(':idsanpham', $idsanpham);
       
        $stmt->bindParam(':hinhanh', $hinhanh);


        // Thực thi truy vấn
        if ($stmt->execute()) {
            echo "Thông tin sản phẩm đã được cập nhật thành công.";
        } else {
            echo "Lỗi khi cập nhật thông tin sản phẩm.";
        }

        // Đóng kết nối đến cơ sở dữ liệu
        $db = null;
    } catch (PDOException $e) {
        echo "Lỗi: " . $e->getMessage();
    }
}

public function themvaogiohang($sanphamc) {
session_start();

if(isset($_SESSION['giohang'])){
$giohangc=array();
$_SESSION['giohang']=$giohangc;



}
$giohang=$_SESSION['giohang'];

    $sanpham = $sanphamc;
    $idsanpham = $sanpham->getidsanpham();
    $tensp = $sanpham->gettensanpham();
    $mota = $sanpham->getmota();
    $hinhanh = $sanpham->gethinhanh();
    $loai = $sanpham->getloai();
    $hang = $sanpham->gethang();
    $soluong=1;

    try {

        
       
    
    } catch (PDOException $e) {
        echo "Lỗi: " . $e->getMessage();
    }
}







}
?>
