<?php

require('../require.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $hangdb=new hangdb();
$hang=$_POST['namehang'];
$hangdb->themhang($hang);




header('Location: ../quanly/quanlydanhmuc.php');
exit();

}



?> 