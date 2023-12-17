<?php
  
class donhangdb {


    public function getalldonhang() {
        $db = database::getDB();
    
        $query = 'SELECT donhang.iddonhang, donhang.idtaikhoan, donhang.thanhtien, donhang.ngaygio, donhang.trangthai,
                  sanphamdonhang.iddonhang, sanphamdonhang.idsanpham, sanphamdonhang.giacu, sanphamdonhang.soluong, sanphamdonhang.thanhtiengiacu
                  FROM donhang
                  JOIN sanphamdonhang ON donhang.iddonhang = sanphamdonhang.iddonhang;';
    
        $statement = $db->prepare($query);
        $statement->execute();
    
        $listalldonhang = $statement->fetchAll(PDO::FETCH_ASSOC);
    
        $orders = array();
    
        foreach ($listalldonhang as $donhang) {
            $orderID = $donhang['iddonhang'];
    
            if (!array_key_exists($orderID, $orders)) {
                $orders[$orderID] = array(
                    'order_info' => array(
                        'id' => $donhang['iddonhang'],
                        'idtaikhoan' => $donhang['idtaikhoan'],
                        'thanhtien' => $donhang['thanhtien'],
                        'ngaygio' => $donhang['ngaygio'],
                        'trangthai' => $donhang['trangthai']
                    ),
                    'products' => array()
                );
            }
    
            $orders[$orderID]['products'][] = array(
                'idsanpham' => $donhang['idsanpham'],
                'giacu' => $donhang['giacu'],
                'soluong' => $donhang['soluong'],
                'thanhtiengiacu' => $donhang['thanhtiengiacu']
            );
        }
    
        $result = array_values($orders);
    
        return $result;
    }
    
    






    public function getalldonhangcuataikhoan($taikhoan) {
        $db = database::getDB();
    
        $idTaiKhoan = $taikhoan->getidtaikhoan(); // Lấy giá trị ID tài khoản
    
        $query = 'SELECT *
            FROM donhang
            JOIN sanphamdonhang ON donhang.iddonhang = sanphamdonhang.iddonhang 
            WHERE donhang.iddonhang = :taikhoan  order by donhang.iddonhang desc ';
    
        $statement = $db->prepare($query);
        $statement->bindParam(':taikhoan', $idTaiKhoan);
        $statement->execute();
    
        // Lấy tất cả các hàng dữ liệu từ kết quả truy vấn
        $listalldonhang = $statement->fetchAll(PDO::FETCH_ASSOC);
    
        return $listalldonhang;
    }



    public function dathang($diachi,$sodienthoai) {
        
        $idtaikhoan = $_SESSION['idtk'];
$tongtien = 0; 
$db = database::getDB();


$idtaikhoan = $_SESSION['idtk'];
$tongtien = 0; 


$sql_donhang = "INSERT INTO donhang (idtaikhoan, tongtien, ngaydat, diachi, ngaygiao,sodienthoai, trangthai) VALUES ('$idtaikhoan', '$tongtien', NOW(), '$diachi', '','$sodienthoai', 0)";

if ($db->exec($sql_donhang)) {
    $iddonhang = $db->lastInsertId();

   
    if (isset($_SESSION['giohang']) && !empty($_SESSION['giohang'])) {
        foreach ($_SESSION['giohang'] as $key => $sanpham) {
            $idsanpham = $sanpham['idsanpham']; 
            $giacu = $sanpham['giaban']; 
            $soluong = $sanpham['soluong']; 
            $thanhtiengiacu = $sanpham['thanhtien']; 
$tongtien+=  $sanpham['thanhtien'];
         
            $sql_sanpham_donhang = "INSERT INTO sanphamdonhang (iddonhang, idsanpham, giacu, soluong, thanhtiengiacu) VALUES ('$iddonhang', '$idsanpham', '$giacu', '$soluong', '$thanhtiengiacu')";

          $db->query($sql_sanpham_donhang);
             
       
        }
    $querry=  'UPDATE `donhang` SET `tongtien` = '.$tongtien.' WHERE `donhang`.`iddonhang` = '.$iddonhang.'';
    $db->query($querry);
        echo "Đã thêm giỏ hàng vào cơ sở dữ liệu thành công!";
    }
} else {
    echo "Lỗi khi thêm đơn hàng!";
}
        
    
        
    }
    




}






 ?>
