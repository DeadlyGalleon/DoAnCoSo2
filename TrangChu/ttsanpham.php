
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
  <body>
   
   <?php include 'header.php' ?> 

 <div class="site-branding-area">
        <div class="container">
            
        </div>
    </div> <!-- End site branding area -->
    
 <?php
 include 'danhmuc.php';
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
       <?php
       if (isset($_GET['spid']) ) {
        $idsp = $_GET['spid'];
        $sanphamdb=new sanphamdb();
$ttsanpham=$sanphamdb->getsanphambyid($idsp);






       }
       ?> 
               
                <div class="col">
                    <div class="product-content-right">
                     
                        
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="product-images">
                                    <center>
                                        
                                   
                                    <div class="product-main-img">
                        <?php     echo '          <img width="400px" height="600px" class="img-fluid" src="'. $ttsanpham->gethinhanh()  .'" alt="">'; ?>
                                    </div>
                                     </center>
                            
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
                                        
                                        <c:url value="/shop/addtocart?spid=${sanpham.idsanpham}" var="addtocart"/>
                                        <a href="${addtocart}" class="add_to_cart_button"><i class="fa fa-shopping-cart"></i> Thêm Vào Giỏ Hàng</a>
                                        
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
                        
                        
                                                    
                                                    
                        <div class="related-products-wrapper">
                            <h2 class="related-products-title">Sản Phẩm Liên Quan</h2>
                            
                            
                            <div class="related-products-carousel">
                                
                                
                                
                                

                      
                                <c:forEach items="${listsanphamlienquan}" var="o">
                                    
                              
                                <div class="single-product">
                                    <div class="product-f-image">
                                        <img  src="${o.hinhanh}" alt="">
                                        <div class="product-hover">
                                            
                                            <a href="ttsanpham?spid=${o.idsanpham}" class="view-details-link"><i class="fa fa-link"></i> Xem Thông Tin</a>
                                        </div>
                                    </div>

                                    <h2><a href=""></a></h2>
                                    <div class="product-carousel-price">
                                        <ins></ins>
                                    </div> 
                                </div>
                                    
                                      </c:forEach>
                                                         
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
  </body>
</html>