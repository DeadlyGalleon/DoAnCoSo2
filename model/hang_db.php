<?php
class hangdb{
public function getallhang(){
    $db=database::getDB();
$querry='SELECT * FROM `hang`';
$result=$db->query($querry);
$listhang=array();

foreach($result as $row){
    $hang=new hang();
    $hang->setidhang($row['idhang']);
  
    $hang->settenhang($row['tenhang']);
    $listhang[]=$hang;

}

return $listhang;

}

public function getalllienket(){
    $db = database::getDB();
    $query = 'SELECT lienket.idloai, loai.tenloai, lienket.idhang, hang.tenhang
              FROM lienket
              INNER JOIN loai ON lienket.idloai = loai.idloai
              INNER JOIN hang ON lienket.idhang = hang.idhang order by lienket.idloai';
    $result = $db->query($query);
    $listlienket = array();

    foreach ($result as $row) {
        $lienketItem = array(
            'idloai' => $row['idloai'],
            'tenloai' => $row['tenloai'],
            'idhang' => $row['idhang'],
            'tenhang' => $row['tenhang']
        );

        $listlienket[] = $lienketItem; // Thêm mảng vào mảng kết quả
    }

    return $listlienket;
}

public function gethangbyloai($loai){
    $db = database::getDB();
    $query = 'SELECT lienket.idloai, loai.tenloai, lienket.idhang, hang.tenhang
              FROM lienket
              INNER JOIN loai ON lienket.idloai = loai.idloai
              INNER JOIN hang ON lienket.idhang = hang.idhang
              where lienket.idloai='.$loai.'
               order by lienket.idloai ';
    $result = $db->query($query);
    $listlienket = array();

    foreach ($result as $row) {
        $lienketItem = array(
            'idloai' => $row['idloai'],
            'tenloai' => $row['tenloai'],
            'idhang' => $row['idhang'],
            'tenhang' => $row['tenhang']
        );

        $listlienket[] = $lienketItem; // Thêm mảng vào mảng kết quả
    }

    return $listlienket;
}
public function themlienket($loai,$hang){
    $db = database::getDB();
    $query = 'INSERT INTO `lienket` (`idloai`, `idhang`) VALUES ('.$loai.','.$hang.')';
    $db->query($query);
 
}
public function xoalienket($loai,$hang){
    $db = database::getDB();
    $query = 'DELETE FROM lienket WHERE idhang = '.$hang.'  and idloai = '.$loai.'';
    $db->query($query);
 
}
public function themhang($hang) {
    $db = database::getDB();
    $querry = 'INSERT INTO `hang` (`idhang`, `tenhang`) VALUES (NULL, :hang)';
    
    // Prepare the SQL statement
    $stmt = $db->prepare($querry);

    // Bind the parameter
    $stmt->bindParam(':hang', $hang);

    // Execute the statement
    $stmt->execute();
}
public function xoahang($hang) {
    $db = database::getDB();
    $querry = 'DELETE FROM hang WHERE `hang`.`idhang` = '.$hang.'';
    
 
   $db->query($querry);
}

public function gethangbyid($hang) {
    $db = database::getDB();
    $querry = 'SELECT * FROM `hang` WHERE idhang = '.$hang.'';
    
    // Prepare the SQL statement

  $result= $db->query($querry);
  $hang=new hang();
  foreach($result as $row){
   
    $hang->setidhang($row['idhang']);
  
    $hang->settenhang($row['tenhang']);
  

}
return $hang;

}
public function suatenhang($hang, $tenhang) {
    $db = database::getDB();
    $query = 'UPDATE `hang` SET `tenhang` = :tenhang WHERE `hang`.`idhang` = :hang';
    
    // Prepare the SQL statement
    $statement = $db->prepare($query);

    // Bind parameters and execute the query
    $statement->bindParam(':tenhang', $tenhang);
    $statement->bindParam(':hang', $hang);
    $statement->execute();
}

}

?>
