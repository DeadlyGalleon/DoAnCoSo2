<?php 
class giohangdb
{
   public function themgiohangvaocoso($idtaikhoan, $idsanpham, $tensanpham, $mota, $hinhanh, $soluong, $giaban, $thanhtien) {
      $db = database::getDB();
  
      $query = "INSERT INTO giohang (idtaikhoan, idsanpham, tensanpham, mota, hinhanh, soluong, giaban, thanhtien) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
      $statement = $db->prepare($query);
      $statement->execute([$idtaikhoan, $idsanpham, $tensanpham, $mota, $hinhanh, $soluong, $giaban, $thanhtien]);

  }

     public function kiemtrasanpham($idsanpham){
      $db =  database::getDB();

      $query =  'select * from giohang where idsanpham= '.$idsanpham.' ';
      $result=$db->query($query);
       if ($result >= 1) {
        return true;
    } else {
        return false;
    }
   }

   public function laygiohang($idtaikhoan){

      $db =  database::getDB();

      $query =  'select * from giohang where idtaikhoan= '.$idtaikhoan.' ';
      $result=$db->query($query);
      if(count($result)>=1){
         foreach($result as $row){}
      }
      else return false;


   }
     
}
?>