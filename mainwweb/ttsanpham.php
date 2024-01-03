
<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ogani Template">
    <meta name="keywords" content="Ogani, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Chi Tiết Sản Phẩm</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
</head>

<body>
    <!-- Page Preloder -->


    <!-- Humberger Begin -->
    <div class="humberger__menu__overlay"></div>
    <div class="humberger__menu__wrapper">
        <div class="humberger__menu__logo">
            <a href="#"><img src="img/logo.png" alt=""></a>
        </div>
        <div class="humberger__menu__cart">
            <ul>
                <li><a href="#"><i class="fa fa-heart"></i> <span>1</span></a></li>
                <li><a href="#"><i class="fa fa-shopping-bag"></i> <span>3</span></a></li>
            </ul>
            <div class="header__cart__price">item: <span>$150.00</span></div>
        </div>
        <div class="humberger__menu__widget">
            <div class="header__top__right__language">
                <img src="img/language.png" alt="">
                <div>English</div>
                <span class="arrow_carrot-down"></span>
                <ul>
                    <li><a href="#">Spanis</a></li>
                    <li><a href="#">English</a></li>
                </ul>
            </div>
            <div class="header__top__right__auth">
                <a href="#"><i class="fa fa-user"></i> Login</a>
            </div>
        </div>
        <nav class="humberger__menu__nav mobile-menu">
            <ul>
                <li class="active"><a href="./index.html">Home</a></li>
                <li><a href="./shop-grid.html">Shop</a></li>
                <li><a href="#">Pages</a>
                    <ul class="header__menu__dropdown">
                        <li><a href="./shop-details.html">Shop Details</a></li>
                        <li><a href="./shoping-cart.html">Shoping Cart</a></li>
                        <li><a href="./checkout.html">Check Out</a></li>
                        <li><a href="./blog-details.html">Blog Details</a></li>
                    </ul>
                </li>
                <li><a href="./blog.html">Blog</a></li>
                <li><a href="./contact.html">Contact</a></li>
            </ul>
        </nav>
        <div id="mobile-menu-wrap"></div>
        <div class="header__top__right__social">
            <a href="#"><i class="fa fa-facebook"></i></a>
            <a href="#"><i class="fa fa-twitter"></i></a>
            <a href="#"><i class="fa fa-linkedin"></i></a>
            <a href="#"><i class="fa fa-pinterest-p"></i></a>
        </div>
        <div class="humberger__menu__contact">
            <ul>
                <li><i class="fa fa-envelope"></i> hello@colorlib.com</li>
                <li>Free Shipping for all Order of $99</li>
            </ul>
        </div>
    </div>
    <!-- Humberger End -->

    <!-- Header Section Begin -->
  
    <!-- Header Section End -->
<?php include('header.php'); ?> 

<?php 




if (isset($_GET['spid']) ) {   
$sanphamdb=new sanphamdb();
$ttsanpham=$sanphamdb->getsanphambyid($_GET['spid']);



$listsanphamlienquan = $sanphamdb->getsanphambyloai($ttsanpham->getloai(),10,0);
$listHinhAnhChiTiet=$sanphamdb->gethinhanhbyidsanpham($_GET['spid']);



$danhgiadb = new Danhgia_db();
$listdanhgia = $danhgiadb->getalldanhgiabyidsp($_GET['spid']);
}

?> 
    <!-- Hero Section Begin -->
 <?php include('vungtimkiem.php'); ?> 
    <!-- Hero Section End -->

    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="img/breadcrumb.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Thông Tin Sản Phẩm</h2>
                        <div class="breadcrumb__option">
                            <a href="../mainwweb"><?php echo $ttsanpham->gettenloai() ?> </a>
                            <a href="../sanpham"><?php echo $ttsanpham->gettenhang() ?> </a>
                            <span><?php echo $ttsanpham->gettensanpham() ?> </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Product Details Section Begin -->
    <section class="product-details spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <?php
                 echo'   <div class="product__details__pic">';
                 echo  '     <div class="product__details__pic__item">';
                 echo'           <img class="product__details__pic__item--large"';
                  echo'              src="../image/'.$ttsanpham->gethinhanh().'" alt="">';
                  echo'      </div>';
                   echo'     <div class="product__details__pic__slider owl-carousel">';

                    echo'        <img data-imgbigurl="../image/'.$ttsanpham->gethinhanh().'"';
                    // Hình ảnh phụ  chưa port ra
                    echo'            src="../image/'.$ttsanpham->gethinhanh().'" alt="">';
foreach($listHinhAnhChiTiet as $hinhanh){
    echo'        <img data-imgbigurl="../image/'.$hinhanh['hinhanh'].'"';
    // Hình ảnh phụ  chưa port ra
    echo'            src="../image/'.$hinhanh['hinhanh'].'" alt="">';

}

                    echo'    </div>';
                   
                   echo' </div>';
                echo'</div>';
                ?>
                <div class="col-lg-6 col-md-6">
                    <div class="product__details__text">
                        <h3><?php echo $ttsanpham->gettensanpham() ?> </h3>
                      <?php 
                      echo'<div>'.$ttsanpham->gettensanpham().'</div>';
                      echo'  <div class="product__details__price">Giá bán: '.$ttsanpham->getgiaban().'</div> ';
                      echo '<p></p>';
                      echo'<div class="product__details__quantity">';
                      echo'  <div class="quantity">';
                      echo'      <div class="pro-qty">';
                      echo'          <input type="text" value="1">';
                        echo'    </div>';
                     echo'   </div>';
                     echo'    </div>';
                     echo'    <a href="#" class="primary-btn">ADD TO CARD</a>';
                     echo'    <a href="#" class="heart-icon"><span class="icon_heart_alt"></span></a>';
                     echo'    <ul>';
                     echo'      <li><b>Trạng thái</b> <span>Còn hàng</span></li>';
                     
                     echo'     <li><b>Chia sẻ</b>';
                     echo'         <div class="share">';
                     echo'             <a href="#"><i class="fa fa-facebook"></i></a>';
                                echo'             <a href="#"><i class="fa fa-twitter"></i></a>';
                                echo'            <a href="#"><i class="fa fa-instagram"></i></a>';
                                echo'            <a href="#"><i class="fa fa-pinterest"></i></a>';
                                echo'        </div>';
                                echo'     </li>';
                                echo'     </ul>';
                                echo'    </div>';
                                echo'    </div>';
                      ?>  
                      
                <div class="col-lg-12">
                    <div class="product__details__tab">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab"
                                    aria-selected="true">Mô Tả</a>
                            </li>
                        
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#tabs-3" role="tab"
                                    aria-selected="false">Reviews <span>(1)</span></a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="tabs-1" role="tabpanel">
                                <div class="product__details__tab__desc">
                                    <h6>Mô tả</h6>
                                    <p><?php echo $ttsanpham->getmota() ?> </p>
                                </div>
                            </div>
                
                            <div class="tab-pane" id="tabs-3" role="tabpanel">
                                <div class="product__details__tab__desc">
                                    <h6>Đánh giá</h6>
                                    <div class="container">
  <!-- <h3>Đánh giá sản phẩm</h3>
  <form method="post" action="luu_danh_gia.php?spid=<?php echo $ttsanpham->getidsanpham() ?>">
  <div class="form-group d-flex align-items-center">
    <label class="mr-2" for="rating">Đánh giá:</label>
    <select class="form-control" id="rating" name="rating">
      <option value="5">5 sao</option>
      <option value="4">4 sao</option>
      <option value="3">3 sao</option>
      <option value="2">2 sao</option>
      <option value="1">1 sao</option>
    </select>
  </div>
  <div class="form-group">
    <label for="comment">Bình luận:</label>
    <textarea class="form-control" id="comment" name="comment" rows="3"></textarea>
  </div>
  
  <div class="form-group">
    <button type="submit" class="btn btn-warning">Gửi đánh giá</button>
  </div>
</form> -->
<div class="container">
  <h2>Các đánh giá</h2>
  <?php
    $db = database::getDB();
    // Kiểm tra xem người dùng đã bình luận cho sản phẩm này trước đó hay chưa
    $idtk;
    if(isset($_SESSION['idtk'])) $idtk=$_SESSION['idtk'];
    $hasCommented = false; // Biến để kiểm tra

    // Thực hiện truy vấn cơ sở dữ liệu để kiểm tra
    $previousCommentQuery = "SELECT * FROM danhgia WHERE iduser = '$idtk' AND idsp = '{$ttsanpham->getidsanpham()}'";
    $previousCommentResult = $db->query($previousCommentQuery);
    if ($previousCommentResult->rowCount() > 0) {
        $hasCommented = true;
    }   

    // Kiểm tra biến $hasCommented để xác định liệu người dùng đã bình luận trước đó hay chưa

    if ($hasCommented) {
        // Người dùng đã bình luận trước đó, hiển thị thông báo
        echo '<p>Bạn đã bình luận cho sản phẩm này trước đó.</p>';}
      else{
          $idsanpham = $ttsanpham->getidsanpham();
          echo'  <form method="post" action="../control/luu_danh_gia.php?spid='.$idsanpham.'">';
          echo'  <div class="form-group d-flex align-items-center">';
          echo'    <label class="mr-2" for="rating">Đánh giá:</label>';
          echo'    <select class="form-control" id="rating" name="rating">';
          echo'      <option value="5">5 sao</option>';
          echo'      <option value="4">4 sao</option>';
          echo'      <option value="3">3 sao</option>';
           echo'     <option value="2">2 sao</option>';
           echo'     <option value="1">1 sao</option>';
           echo'   </select>';
          echo'  </div>';
         echo'   <div class="form-group">';
         echo'     <label for="comment">Bình luận:</label>';
         echo'     <textarea class="form-control" id="comment" name="comment" rows="3"></textarea>';
         echo'   </div>';
            
         echo'   <div class="form-group">';
          echo'    <button type="submit" class="btn btn-warning">Gửi đánh giá</button>';
         echo'   </div>';
         echo' </form>';
        }   
    
        if (!empty($listdanhgia)) {
            // Lặp qua mảng $listdanhgia từ cuối đến đầu
            for ($i = count($listdanhgia) - 1; $i >= 0; $i--) {
              $binhluan = $listdanhgia[$i];
              
              echo '<div class="card mb-3">';
              echo '  <div class="card-body">';
              echo '    <h5 class="card-title">Đánh giá: '.$binhluan->getsosao().' sao</h5>';
              echo '    <p class="card-text">Khách hàng:'.$binhluan->getIduser().'</p>';
              echo '    <p class="card-text">'.$binhluan->getBinhLuan().'</p>';
              echo '  </div>';
              echo '</div>';
            }
          } else {
            echo '<p>Chưa có đánh giá nào.</p>';
          }
      
      
    ?>
</div>
</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Product Details Section End -->

    <!-- Related Product Section Begin -->
    <section class="related-product">
        <div class="container">
            <div class="row">
                
                <div class="col-lg-12">
                    <div class="section-title related__product__title">
                        <h2>Related Product</h2>
                    </div>
                </div>
            </div>
            <div class="row">
            <?php
            foreach($listsanphamlienquan as $sanphamc){
            echo' <div class="col-lg-3 col-md-4 col-sm-6">';
            echo' <div class="product__item">';
             echo'    <div class="product__item__pic set-bg" data-setbg="../image/'.$sanphamc->gethinhanh().'">';
             echo'        <ul class="product__item__pic__hover">';
              echo'           <li><a href="#"><i class="fa fa-heart"></i></a></li>';
              echo'           <li><a href="#"><i class="fa fa-retweet"></i></a></li>';
              echo'           <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>';
              echo'       </ul>';
              echo'   </div>';
              echo'   <div class="product__item__text">';
              echo'       <h6><a href="#">'.$sanphamc->gettensanpham().'</a></h6>';
              echo'       <h5>Giá bán: '.$sanphamc->getgiaban().'</h5>';
             echo'    </div>';
           echo'  </div>';
        echo' </div> ';
            }
        ?>
               
             
            </div>
        </div>
    </section>
    <!-- Related Product Section End -->

    <!-- Footer Section Begin -->
 <?php include('footer.php'); ?> 
    <!-- Footer Section End -->

    <!-- Js Plugins -->
 
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.nice-select.min.js"></script>
    <script src="js/jquery-ui.min.js"></script>
    <script src="js/jquery.slicknav.js"></script>
    <script src="js/mixitup.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/main.js"></script>


</body>

</html>