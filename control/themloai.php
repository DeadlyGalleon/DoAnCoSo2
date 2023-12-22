<?php

require('../require.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $loaidb=new loaidb();
$loai=$_POST['nameloai'];
$loaidb->themloai($loai);




header('Location: ../quanly/quanlydanhmuc.php');
exit();

}



?> 