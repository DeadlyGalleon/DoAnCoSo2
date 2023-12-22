<?php
require("../require.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $donhangdb=new donhangdb();
    $iddonhang = $_POST['iddonhang'];
    $trangthai = $_POST['trangthai'];


    $donhangdb->thaydoitrangthai($iddonhang,$trangthai);

    header('Location: ../web/lichsudonhang.php');
    exit();
}
?>