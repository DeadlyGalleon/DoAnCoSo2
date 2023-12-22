<?php session_start(); ?> 
<!DOCTYPE html>

<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Thông Tin Sản Phẩm</title>
    

    <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,200,300,700,600' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,100' rel='stylesheet' type='text/css'>

    <link rel="stylesheet" href="css/bootstrap.min.css">

    <link rel="stylesheet" href="css/font-awesome.min.css">

    <link rel="stylesheet" href="css/owl.carousel.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/responsive.css">

  </head>
  <style>
    .product-f-image img {
        height: 270px; /* Đặt chiều cao mong muốn cho hình ảnh */
        width: auto; /* Để hình ảnh tự động điều chỉnh chiều rộng */
        /* Các thuộc tính khác tùy thuộc vào thiết kế cụ thể của bạn */
    }
    .product-images {
        text-align: center;
        margin-bottom: 20px;
    }

    .product-images .product-main-img {
        display: inline-block;
        margin-bottom: 20px;
        width: 360px; /* Giới hạn chiều rộng tối đa */
        height: 500px; /* Giới hạn chiều cao tối đa */
        overflow: hidden; /* Ẩn phần thừa nếu hình ảnh vượt quá kích thước đã định */
    }

    .product-images img {
        width: 100%; /* Đảm bảo hình ảnh lấp đầy khung hình */
        height: auto;
    }

    .product-images button {
        background-color: #ffffff;
        color: #333333;
        border: 1px solid #cccccc;
        padding: 8px 16px;
        margin: 0 5px;
        cursor: pointer;
        transition: all 0.3s ease;
        border-radius: 4px;
    }

    .product-images button:hover {
        background-color: #f0f0f0;
    }
    .product-main-img img {
        transition: transform 0.3s ease; /* Áp dụng hiệu ứng chuyển động */
    }
</style>
  <body>
   
   <?php include 'header.php' ?> 

 <div class="site-branding-area">
        <div class="container">
            
        </div>
    </div> <!-- End site branding area -->
    
 <?php
 include 'danhmuc.php';
 ?>  
    
    <?php
       if (isset($_GET['spid']) ) {
       
        $sanphamdb=new sanphamdb();
$ttsanpham=$sanphamdb->getsanphambyid($_GET['spid']);
$listsanphamlienquan = $sanphamdb->getsanphambyloai($ttsanpham->getloai(),10,0);

$listHinhAnhChiTiet=$sanphamdb->gethinhanhbyidsanpham($_GET['spid']);



       }
       ?> 
    
    <div class="product-big-title-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="product-bit-title text-center">
                        <h2>Thông Tin Sản Phẩm</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    
    <div class="single-product-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
 
               
                <div class="col">
                    <div class="product-content-right">
                     
                        
                        <div class="row">
                            <div class="col-sm-6">
                            <div class="product-images">
    <div class="product-main-img">
        <!-- Ảnh chính hiển thị -->
        <img id="mainImage" width="400px" height="600px" class="img-fluid" src="../image/<?php echo $ttsanpham->gethinhanh() ?>" alt="">
    </div>

    <!-- Nút chuyển đổi hình ảnh -->
    <div>
        <!-- Nút chuyển sang hình ảnh trước đó -->
        <button onclick="showPrevImage()">Trước</button>
        <!-- Nút chuyển sang hình ảnh kế tiếp -->
        <button onclick="showNextImage()">Kế tiếp</button>
    </div>
</div>



                            </div>
                            
                            <div class="col-sm-6">
                                <div class="product-inner">
                                    
                                    <?php 
                                 echo   ' <h2 class="product-name">'. $ttsanpham->gettensanpham() .'</h2>'?> 
                                    <div class="product-inner-price">
                               <?php    echo '    <ins>VND '. $ttsanpham->getgiaban() .'</ins> ' ?> 
                                    </div>    
                                    
                                    <form action="" class="cart">
                            
                                        <a href="" data-quantity="1" data-spid="<?php echo $ttsanpham->getidsanpham() ?>" class="add_to_cart_button"  data-product_sku="" data-product_id="<?php echo $ttsanpham->getidsanpham()  ?>" rel="nofollow" href="#" ><i class="fa fa-shopping-cart" ></i> Thêm Vào Giỏ Hàng</a>
                                        
                                    </form>   
                                    
                                    <div class="product-inner-category">
                                    
                                    </div> 
                                    
                                    <div role="tabpanel">
                                        
                                        
                                        
                                        <ul class="product-tab" role="tablist">
                                            <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Mô Tả</a></li>
                                        </ul>
                                        <div class="tab-content">
                                            <div role="tabpanel" class="tab-pane fade in active" id="home">
                                                <h2>Mô Tả Sản Phẩm </h2>  
                                                <p>
                                                  
                                                    <?php echo $ttsanpham->getmota() ?>

                                                    
                                                </p>
                                            
                                            
                                            
                                            </div>
                                            
                              
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                        <br>
                        <br><br><br><br>
                        <br>
                        <br>

                        
                                                    
                                                    
                        <div class="related-products-wrapper">
                            <h2 class="related-products-title">Sản Phẩm Liên Quan</h2>
                            
                            
                            <div class="related-products-carousel">
                                
                                
                                
                                

                      
                            <?php  foreach($listsanphamlienquan as $sanphamc) {?> 
                      
                          
                                    
                              
                      <div class="single-product">
                          <div class="product-f-image">
                              <img class="img-fluid" height="100px" src="../image/<?php echo $sanphamc->gethinhanh() ?> " alt="">
                              <div class="product-hover">
                                  
                                  <a href="ttsanpham.php?spid=<?php echo $sanphamc->getidsanpham() ?>   " class="view-details-link"><i class="fa fa-link"></i> Xem Thông Tin</a>
                              </div>
                          </div>

                          <h2><a href="ttsanpham.php?spid=<?php echo $sanphamc->getidsanpham() ?>"><?php echo $sanphamc->gettensanpham() ?> </a></h2>
                          <div class="product-carousel-price">
                              <ins><?php echo $sanphamc->getgiaban() ?> VND </ins>
                          </div> 
                      </div>
                          
                      
                                            <?php }?>    
                                                         
                            </div>
                        </div>
                    </div>                    
                </div>
            </div>
        </div>
    </div>

    <div class="footer-top-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-4">
                    <div class="footer-about-us">
                        <h2><span></span></h2>
                       
             
                    </div>
                </div>
                
                <div class="col-md-3 col-sm-4">
                    <div class="footer-menu">
                        <h2 class="footer-wid-title"> </h2>
                                     
                    </div>
                </div>
                
                <div class="col-md-3 col-sm-4">
                    <div class="footer-menu">
                        <h2 class="footer-wid-title"></h2>
                        <ul>
                           
                        </ul>                        
                    </div>
                </div>
                
                <div class="col-md-3 col-sm-4">
                    <div class="footer-newsletter">
                        <h2 class="footer-wid-title"></h2>
                      
                    </div>
                </div>
            </div>
        </div>
    </div>
   
   
    <!-- Latest jQuery form server -->
    <script src="https://code.jquery.com/jquery.min.js"></script>
    
    <!-- Bootstrap JS form CDN -->
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    
    <!-- jQuery sticky menu -->
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.sticky.js"></script>
    
    <!-- jQuery easing -->
    <script src="js/jquery.easing.1.3.min.js"></script>
    
    <!-- Main Script -->
    <script src="js/main.js"></script>
    <script scr="js/ajax.js" ></script>
  </body>
</html>
<script>
   var images = [

        <?php
        echo "'../image/" . $ttsanpham->gethinhanh() . "',";
        if (!empty($listHinhAnhChiTiet)) {
            foreach ($listHinhAnhChiTiet as $hinhAnhChiTiet) {
                echo "'../image/" . $hinhAnhChiTiet['hinhanh'] . "',";
            }
        }
        ?>
    ];
    
    var currentImageIndex = 0;

    function showNextImage() {
        currentImageIndex = (currentImageIndex + 1) % images.length;
        displayImage(currentImageIndex);
    }

    function showPrevImage() {
        currentImageIndex = (currentImageIndex - 1 + images.length) % images.length;
        displayImage(currentImageIndex);
    }

    function displayImage(index) {
        var mainImage = $('#mainImage');
        if (images[index]) {
            mainImage.fadeOut(200, function() {
                mainImage.attr('src', images[index]);
                mainImage.fadeIn(200);
            });
        }
    }
</script>


<script>
$(document).ready(function() {
    $('.add_to_cart_button').click(function(event) {
        event.preventDefault();
        var spid = $(this).attr('data-spid'); // Lấy ID sản phẩm từ thuộc tính dữ liệu

        $.ajax({
            type: 'GET',
            url: '../control/themvaogiohang.php?sanphamid=' + spid,
            success: function(response) {
                // Hiển thị thông báo khi thêm sản phẩm vào giỏ hàng thành công
                alert('Sản phẩm đã được thêm vào giỏ hàng!');
            },
            error: function() {
                alert('Đã xảy ra lỗi khi thêm sản phẩm vào giỏ hàng.');
            }
        });
    });
});
        
   </script>