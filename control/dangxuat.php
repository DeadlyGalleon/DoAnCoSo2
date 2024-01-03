

<?php
session_start();
unset($_SESSION['taikhoan']);
unset($_SESSION['idtk']);
header('Location: ../mainwweb');
exit;
?>
