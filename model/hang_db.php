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


}

?>
