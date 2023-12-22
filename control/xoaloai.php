<?php 
require('../require.php');
if(isset($_GET['id'])){
$loaidb=new loaidb();
$loaidb->xoaloai($_GET['id']);

header('Location: ../quanly/quanlydanhmuc.php');
exit();
}

?> 