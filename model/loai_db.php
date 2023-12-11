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


}

?>
