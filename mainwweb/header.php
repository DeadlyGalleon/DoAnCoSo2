<?php
session_start();

require('../require.php');

$taikhoan=new taikhoan();


// Check if 'taikhoan' object exists in the session and is an instance of 'taikhoan' class
if (isset($_SESSION['taikhoan'])) {
    $tkdb=new taikhoandb();
    $taikhoan = $tkdb->gettaikhoan($_SESSION['idtk']);
   
}else {$taikhoan=null;}

?>
<header class="header">
        <div class="header__top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="header__top__left">
                            <?php if(isset($_SESSION['taikhoan'])){


                            ?>
                            <ul>
                                <li><i class="fa fa-envelope"></i> Xin Chào <?php echo $taikhoan->gettentaikhoan(); ?> </li>
                            
                            </ul>
                            <?php }?> 

                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="header__top__right">
                        <?php if(!isset($_SESSION['taikhoan'])){
            
              echo '              <div class="header__top__right__auth">
                                <a href="dangnhap.php"><i class="fa fa-user"></i> Đăng Nhập</a>
                            </div>'       ;
                        }else{

                            echo '              <div class="header__top__right__auth">
                            <a href="../control/dangxuat.php"><i class="fa fa-user"></i> Đăng Xuất</a>
                        </div>'       ;  
                        }

                            ?> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
              
                </div>
                <div class="col-lg-6">
                    <nav class="header__menu">
                        <ul>
                            <li><a href="../mainwweb/">Trang Chủ</a></li>
                            <li><a href="shop.php">Cửa Hàng</a></li>
                       
                            <li><a href="./blog.html">Blog</a></li>
                            <li><a href="./contact.html">Liên Hệ</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="col-lg-3">
                    <div class="header__cart">
                        <ul>
                            
                            <li><a href="giohang.php"><i class="fa fa-shopping-bag"></i> <span></span></a></li>
                        </ul>
                        <div class="header__cart__price">item: <span>$150.00</span></div>
                    </div>
                </div>
            </div>
            <div class="humberger__open">
                <i class="fa fa-bars"></i>
            </div>
        </div>
    </header>