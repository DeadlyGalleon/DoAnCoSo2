<?php
require('../require.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $hangdb=new hangdb();
$loai=$_POST['category'];
$hang=$_POST['brands'];
$hangdb->themlienket($loai,$hang);
header('Location: ../quanly/quanlydanhmuc.php');
exit();

}
?>
