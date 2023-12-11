<?php
class sanphamdb{
 public function getallsanpham(){
$db = database::getDB();
$querry='SELECT sanpham.idsanpham, sanpham.tensanpham, sanpham.mota,sanpham.hinhanh,sanpham.giaban,sanpham.loai,sanpham.hang,loai.tenloai,hang.tenhang
FROM sanpham
                  INNER JOIN loai
                      ON loai.idloai = sanpham.loai
                         INNER JOIN hang
                         on sanpham.hang = hang.idhang';
$result = $db->query($querry);
$listsanpham=array();

foreach($result as $row){
    $sanpham=new sanpham();
        $sanpham->setidsanpham($row['idsanpham']);
        $sanpham->settensanpham($row['tensanpham']);
        $sanpham->setmota($row['mota']);
        $sanpham->sethinhanh($row['hinhanh']);
        $sanpham->setgiaban($row['giaban']);
        $sanpham->setloai($row['loai']);
        $sanpham->sethang($row['hang']);
        $sanpham->settenloai($row['tenloai']);
        $sanpham->settenhang($row['tenhang']);
$listsanpham[]=$sanpham;
}
return $listsanpham;
}

public function getallsanphamdesc(){
    $db = database::getDB();
    $querry='SELECT sanpham.idsanpham, sanpham.tensanpham, sanpham.mota,sanpham.hinhanh,sanpham.giaban,sanpham.loai,sanpham.hang,loai.tenloai,hang.tenhang
    FROM sanpham
                      INNER JOIN loai
                          ON loai.idloai = sanpham.loai
                             INNER JOIN hang
                             on sanpham.hang = hang.idhang order by sanpham.idsanpham desc';
    $result = $db->query($querry);
    $listsanpham=array();
    
    foreach($result as $row){
        $sanpham=new sanpham();
            $sanpham->setidsanpham($row['idsanpham']);
            $sanpham->settensanpham($row['tensanpham']);
            $sanpham->setmota($row['mota']);
            $sanpham->sethinhanh($row['hinhanh']);
            $sanpham->setgiaban($row['giaban']);
            $sanpham->setloai($row['loai']);
            $sanpham->sethang($row['hang']);
            $sanpham->settenloai($row['tenloai']);
            $sanpham->settenhang($row['tenhang']);
    $listsanpham[]=$sanpham;
    }
    return $listsanpham;
    }
    

public function getsanphambyloaivahang($loai,$hang){
    $db = database::getDB();
$querry='SELECT sanpham.idsanpham, sanpham.tensanpham, sanpham.mota,sanpham.hinhanh,sanpham.giaban,sanpham.loai,sanpham.hang,loai.tenloai,hang.tenhang
FROM sanpham
                  INNER JOIN loai
                      ON loai.idloai = sanpham.loai
                         INNER JOIN hang
                         on sanpham.hang = hang.idhang
                         WHERE loai='.$loai.' and hang ='.$hang.'';
$result = $db->query($querry);
$listsanpham=array();

foreach($result as $row){
    $sanpham=new sanpham();
        $sanpham->setidsanpham($row['idsanpham']);
        $sanpham->settensanpham($row['tensanpham']);
        $sanpham->setmota($row['mota']);
        $sanpham->sethinhanh($row['hinhanh']);
        $sanpham->setgiaban($row['giaban']);
        $sanpham->setloai($row['loai']);
        $sanpham->sethang($row['hang']);
$listsanpham[]=$sanpham;
}
return $listsanpham;
}


public function suasanpham($sanphamc) {
    $sanpham = $sanphamc;
    $idsanpham = $sanpham->getidsanpham();
    $tensp = $sanpham->gettensanpham();
    $mota = $sanpham->getmota();
    $hinhanh = $sanpham->gethinhanh();
    $loai = $sanpham->getloai();
    $hang = $sanpham->gethang();
    $giaban=$sanpham->getgiaban();

    try {
        $db = database::getDB();

        // Sử dụng Prepared Statements để cập nhật thông tin sản phẩm trong cơ sở dữ liệu
        $query = "UPDATE sanpham SET tensanpham = '$tensp', mota = '$mota',  loai = '$loai', hang = '$hang',giaban= '$giaban' WHERE idsanpham = $idsanpham";
     

        // Thực thi truy vấn
        if ($db->query($query)) {
           echo $hinhanh;
           return true;
        } else {
            echo "Lỗi khi cập nhật thông tin sản phẩm.";
        }

        // Đóng kết nối đến cơ sở dữ liệu
        $db = null;
    } catch (PDOException $e) {
        echo "Lỗi: " . $e->getMessage();
    }
}
public function suahinhanh($idsp,$hinhanh) {


    try {
        $db = database::getDB();

        // Sử dụng Prepared Statements để cập nhật thông tin sản phẩm trong cơ sở dữ liệu
        $query = "UPDATE sanpham SET hinhanh = '$hinhanh' WHERE idsanpham = $idsp";
     

        // Thực thi truy vấn
        if ($db->query($query)) {
           echo $hinhanh;
           return true;
        } else {
            echo "Lỗi khi cập nhật thông tin sản phẩm.";
        }

        // Đóng kết nối đến cơ sở dữ liệu
        $db = null;
    } catch (PDOException $e) {
        echo "Lỗi: " . $e->getMessage();
    }
}
public function getsanphambyloai($loai){
    $db = database::getDB();
$querry='SELECT sanpham.idsanpham, sanpham.tensanpham, sanpham.mota,sanpham.hinhanh,sanpham.giaban,sanpham.loai,sanpham.hang,loai.tenloai,hang.tenhang
FROM sanpham
                  INNER JOIN loai
                      ON loai.idloai = sanpham.loai
                         INNER JOIN hang
                         on sanpham.hang = hang.idhang
                         WHERE loai='.$loai.'';
$result = $db->query($querry);
$listsanpham=array();

foreach($result as $row){
    $sanpham=new sanpham();
        $sanpham->setidsanpham($row['idsanpham']);
        $sanpham->settensanpham($row['tensanpham']);
        $sanpham->setmota($row['mota']);
        $sanpham->sethinhanh($row['hinhanh']);
        $sanpham->setgiaban($row['giaban']);
        $sanpham->setloai($row['loai']);
        $sanpham->sethang($row['hang']);
$listsanpham[]=$sanpham;
}
return $listsanpham;
}


public function getsanhambyhang($hang){
    $db = database::getDB();
$querry='SELECT sanpham.idsanpham, sanpham.tensanpham, sanpham.mota,sanpham.hinhanh,sanpham.giaban,sanpham.loai,sanpham.hang,loai.tenloai,hang.tenhang
FROM sanpham
                  INNER JOIN loai
                      ON loai.idloai = sanpham.loai
                         INNER JOIN hang
                         on sanpham.hang = hang.idhang
                         WHERE hang ='.$hang.'';
$result = $db->query($querry);
$listsanpham=array();

foreach($result as $row){
    $sanpham=new sanpham();
        $sanpham->setidsanpham($row['idsanpham']);
        $sanpham->settensanpham($row['tensanpham']);
        $sanpham->setmota($row['mota']);
        $sanpham->sethinhanh($row['hinhanh']);
        $sanpham->setgiaban($row['giaban']);
        $sanpham->setloai($row['loai']);
        $sanpham->sethang($row['hang']);
$listsanpham[]=$sanpham;
}
return $listsanpham;
}


public function getallphukien(){
    $db = database::getDB();
$querry='SELECT sanpham.idsanpham, sanpham.tensanpham, sanpham.mota,sanpham.hinhanh,sanpham.giaban,sanpham.loai,sanpham.hang,loai.tenloai,hang.tenhang
FROM sanpham
                  INNER JOIN loai
                      ON loai.idloai = sanpham.loai
                         INNER JOIN hang
                         on sanpham.hang = hang.idhang
                         WHERE loai<>1';
$result = $db->query($querry);
$listsanpham=array();

foreach($result as $row){
    $sanpham=new sanpham();
        $sanpham->setidsanpham($row['idsanpham']);
        $sanpham->settensanpham($row['tensanpham']);
        $sanpham->setmota($row['mota']);
        $sanpham->sethinhanh($row['hinhanh']);
        $sanpham->setgiaban($row['giaban']);
        $sanpham->setloai($row['loai']);
        $sanpham->sethang($row['hang']);
$listsanpham[]=$sanpham;
}
return $listsanpham;
}

public function getsanphambyid($id){
    $db = database::getDB();
$querry='SELECT sanpham.idsanpham, sanpham.tensanpham, sanpham.mota,sanpham.hinhanh,sanpham.giaban,sanpham.loai,sanpham.hang,loai.tenloai,hang.tenhang
FROM sanpham
                  INNER JOIN loai
                      ON loai.idloai = sanpham.loai
                         INNER JOIN hang
                         on sanpham.hang = hang.idhang
                         WHERE sanpham.idsanpham ='. $id.'';
$result = $db->query($querry);

$sanpham=new sanpham();
foreach($result as $row){
   
        $sanpham->setidsanpham($row['idsanpham']);
        echo $sanpham->getidsanpham();
        $sanpham->settensanpham($row['tensanpham']);
        $sanpham->setmota($row['mota']);
        $sanpham->sethinhanh($row['hinhanh']);
        $sanpham->setgiaban($row['giaban']);
        $sanpham->setloai($row['loai']);
        $sanpham->sethang($row['hang']);

}
return $sanpham;
}

public function getsanphambyName($name){

    $db = database::getDB();
    $querry = "SELECT * FROM sanpham WHERE tensanpham LIKE '%" . $name . "%'";
    $result = $db->query($querry);
    $listsanpham=array();
    
    foreach($result as $row){
        $sanpham=new sanpham();
            $sanpham->setidsanpham($row['idsanpham']);
            $sanpham->settensanpham($row['tensanpham']);
            $sanpham->setmota($row['mota']);
            $sanpham->sethinhanh($row['hinhanh']);
            $sanpham->setgiaban($row['giaban']);
            $sanpham->setloai($row['loai']);
            $sanpham->sethang($row['hang']);
    $listsanpham[]=$sanpham;
    }
    return $listsanpham;


}

public function xoasanpham($id){
    $db = database::getDB();
    try {
       
        $querry="DELETE FROM sanpham WHERE `sanpham`.`idsanpham` = $id";
$db->query($querry);

    } catch (PDOException $th) {
       echo $th;
    }




}




}


?>
