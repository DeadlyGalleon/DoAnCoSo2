<?php 
 class Danhgia_db{
    public function themdanhgia($iduser = 11, $idsp, $sosao, $binhluan){
        $db = database::getDB();
        $query = "INSERT INTO danhgia (iduser, idsp, sosao, binhluan) VALUES (:iduser, :idsp, :sosao, :binhluan)";
        $statement = $db->prepare($query);
        $statement->bindParam(':iduser', $iduser);
        $statement->bindParam(':idsp', $idsp);
        $statement->bindParam(':sosao', $sosao);
        $statement->bindParam(':binhluan', $binhluan);
        $statement->execute();
    }
    public function getalldanhgiabyidsp($idsp)
    {
        $db = database::getDB();
        $query = "SELECT * FROM danhgia WHERE idsp = '$idsp'";
        $result = $db->query($query);
        
        $danhGiaList = array(); // Mảng chứa danh sách đánh giá
        
             foreach($result as $row){
                $danhgia = new DanhGia();
                
                    $danhgia->setIduser($row['iduser']);
                    $danhgia->setIdSanPham($row['idsp']);
                    $danhgia->setsosao($row['sosao']);
                    $danhgia->setBinhLuan($row['binhluan']);
                    $danhGiaList[] = $danhgia;
            }
            return $danhGiaList;
        }
        
        
    
 }
?>