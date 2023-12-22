<?php 
require('../require.php');
if(isset($_GET['id'])){
$hangdb=new hangdb();
$hangdb->xoahang($_GET['id']);


header('Location: ../quanly/quanlydanhmuc.php');
exit();
}

?> 