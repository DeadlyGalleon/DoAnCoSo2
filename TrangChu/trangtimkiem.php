

<!DOCTYPE html>
<!--
	ustora by freshdesignweb.com
	Twitter: https://twitter.com/freshdesignweb
	URL: https://www.freshdesignweb.com/ustora/
-->
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Shop Page- Ustora Demo</title>
    
    <!-- Google Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,200,300,700,600' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,100' rel='stylesheet' type='text/css'>
    
    <!-- Bootstrap -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="css/font-awesome.min.css">
    
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/owl.carousel.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/responsive.css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
     <jsp:include page="header.jsp" />
    <div class="site-branding-area">
        <div class="container">
        
        </div>
    </div> <!-- End site branding area -->
    
    <div class="mainmenu-area">
        <div class="container">
            <div class="row">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div> 
                <div class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li ><a href="shop">Home</a></li>
                        <li class="active"><a href="search">Tìm KIếm</a></li>
                        <li><a href="cart">Cart</a></li>
                    </ul>
                </div>  
            </div>
        </div>
    </div> <!-- End mainmenu area -->
    
    <div class="product-big-title-area">
        <div class="container">
            <div class="row">   
                <div class="col-md-12">
                    <div class="product-bit-title text-center">
                        <h2>Sản Phẩm Tìm Được:</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="single-product-area">
    <div class="zigzag-bottom"></div>
 <div class="container">
    

 
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <c:if test="${listsanphambyname == null}">
                    <h1>Sản Phẩm Không Tồn Tại...</h1>
                </c:if>
                <c:forEach items="${listsanphambyname}" var="o">
                    
                    <div class="col-md-3 col-sm-6">
                        <div class="card border">
                            <div class="single-shop-product">
                                <div class="product-upper">
                                    <img src="${o.hinhanh}" width="600px" height="600px" class="img-fluid" alt="">
                                </div>
                                <h2><a href="ttsanpham?spid=${o.idsanpham}">${o.tensanpham}</a></h2>
                                <div class="product-carousel-price">
                                    <ins>${o.giaban}</ins>
                                </div>
                                <div class="product-option-shop">
                                    <a class="add_to_cart_button" data-quantity="1" data-product_sku="" data-product_id="%{o.idsanpham}" rel="nofollow" href="/canvas/shop/?add-to-cart=70">Add to cart</a>
                                </div>
                            </div>
                        </div>
                    </div>
                                
                                
                                
                                
                </c:forEach>
            </div>
        </div>
    </div>
     
     
     
</div>

 </div>



    <jsp:include page="footer.jsp"/>
   
   
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