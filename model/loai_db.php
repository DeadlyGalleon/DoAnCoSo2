<?php
class loaidb{
public function getallloai(){
    $db=database::getDB();
$querry='SELECT * FROM `loai`';
$result=$db->query($querry);
$listloai=array();

foreach($result as $row){
    $loai=new loai();
    $loai->setidloai($row['idloai']);
  
    $loai->settenloai($row['tenloai']);
    $listloai[]=$loai;

}

return $listloai;

}

public function getallphukien(){
    $db=database::getDB();
$querry='SELECT * FROM `loai` where idloai>1';
$result=$db->query($querry);
$listloai=array();

foreach($result as $row){
    $loai=new loai();
    $loai->setidloai($row['idloai']);
  
    $loai->settenloai($row['tenloai']);
    $listloai[]=$loai;

}

return $listloai;

}
public function themloai($loai) {
    $db = database::getDB();
    $querry = 'INSERT INTO `loai` (`idloai`, `tenloai`) VALUES (NULL, :loai)';
    
    // Prepare the SQL statement
    $stmt = $db->prepare($querry);

    // Bind the parameter
    $stmt->bindParam(':loai', $loai);

    // Execute the statement
    $stmt->execute();
}

public function xoaloai($loai) {
    $db = database::getDB();
    $querry = 'DELETE FROM loai WHERE `loai`.`idloai` = '.$loai.';';
    
    // Prepare the SQL statement
   $db->query($querry);
}

public function getloaibyid($loai) {
    $db = database::getDB();
    $querry = 'SELECT * FROM `loai` WHERE idloai = '.$loai.'';
    
    // Prepare the SQL statement

  $result= $db->query($querry);
  $loai=new loai();
  foreach($result as $row){
   
    $loai->setidloai($row['idloai']);
  
    $loai->settenloai($row['tenloai']);
  

}
return $loai;

}
public function suatenloai($loai, $tenloai) {
    $db = database::getDB();
    $query = 'UPDATE `loai` SET `tenloai` = :tenloai WHERE `loai`.`idloai` = :loai';
    
    // Prepare the SQL statement
    $statement = $db->prepare($query);

    // Bind parameters and execute the query
    $statement->bindParam(':tenloai', $tenloai);
    $statement->bindParam(':loai', $loai);
    $statement->execute();
}

}


?>
