<?php session_start();
require('../require.php');
$donhangdb=new donhangdb();
$diachi='109 ngo xuan thu';
$sdt='0702723017';
$donhangdb->dathang($diachi,$sdt);

?> 

<script>
    alert("Đặt Hàng Thành Công!");
    window.location.href = '../web/shop.php';

</script>