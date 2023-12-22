<?php
require("../require.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $donhangdb=new donhangdb();
    $iddonhang = $_POST['iddonhang'];
    $trangthai = $_POST['trangthai'];
if($trangthai==='4') {
    echo "qua";
    $donhangdb->dagiao($iddonhang);
    echo "qua";
  

}else{
    $donhangdb->thaydoitrangthai($iddonhang,$trangthai);
}
header('Location: ../quanly/quanlydonhang.php');
exit();

}
?>