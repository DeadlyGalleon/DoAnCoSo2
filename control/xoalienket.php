<?php 
require('../require.php');
if(isset($_GET['idloai']) && isset($_GET['idhang'])){
$hangdb=new hangdb();
$hangdb->xoalienket($_GET['idloai'],$_GET['idhang']);

header('Location: ../quanly/quanlydanhmuc.php');
exit();


}

?> 