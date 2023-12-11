<!DOCTYPE html>

<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Shop Bán Hàng</title>
    
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
  <style>
    .product-col {
    padding: 10px;
    text-align: center;
}

.product-title {
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
    max-width: 100%;
}

      input[type="submit"], button[type=submit] {
    background: none repeat scroll 0 0 #435d7d;
    border: medium none;
    color: #fff;
    padding: 11px 20px;
    text-transform: uppercase;
}

input, button, select, textarea {
    font-family: inherit;
    font-size: inherit;
    line-height: inherit;
}
/* CSS cho mã HTML của bạn */
.col-md-2 {
  width: 100%;
  padding: 10px;
}

.card {
  border: 1px solid #ccc;
  border-radius: 5px;
  padding: 10px;
}

.single-shop-product {
  text-align: center;
}

.product-upper img {
  max-width: 100%;
  height: auto;
}

h2 a {
  color: #333;
  text-decoration: none;
}

.product-carousel-price ins {
  font-weight: bold;
  color: #ff0000;
}

.product-option-shop a.add_to_cart_button {
  display: inline-block;
  background-color: #ff0000;
  color: #fff;
  padding: 10px 20px;
  text-decoration: none;
  border-radius: 5px;
}
.single-shop-product {
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: space-between;
  height: 100%;
}

.product-upper {
  flex-grow: 1;
  display: flex;
  align-items: center;
  justify-content: center;
}

.product-option-shop {
  margin-top: 10px;
  text-align: center;
}


  </style>
  

  <body class="bg-light" >
   


    <?php include 'header.php' ?>

    
    
    
    
    <div class="site-branding-area">
        <div class="container">
            <center> <h1>Cửa Hàng Bán Điện thoại, Phụ Kiện</h1></center>
        </div>
    </div> <!-- End site branding area -->
    
   
   





<?php include 'danhmuc.php' ?>

    
    
    
    <div class="product-big-title-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="product-bit-title text-center">
                        <h2>Sản Phẩm </h2>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php


// Kiểm tra xem có tham số category_id và brand_id trong URL không
if (isset($_GET['brands']) ) {

    $hangid = $_GET['brands'];
   
   

    // Truy vấn cơ sở dữ liệu để lấy danh sách sản phẩm dựa trên category_id và brand_id
    $sanphamdb = new sanphamdb();

    $listsanpham = $sanphamdb->getsanhambyhang($hangid);
   echo ' <div class="single-product-area">';
   echo '<div class="zigzag-bottom"></div>';
 echo '<div class="container">';
            
            
            
             
        


              echo '<div class="row">';

foreach ($listsanpham as $sanpham) {
    echo '<div class="col-md-3 product-col">'; // Sử dụng col-md-3 để tạo 4 cột trên mỗi hàng
    echo '    <div class="single-shop-product">';
    echo '        <div class="product-upper">';
    echo '           <img src="' . $sanpham->gethinhanh() . '" width="180px" height="260px" class="img-fluid" alt="">';
    echo '        </div>';
    echo '        <h2 class="product-title"><a href="ttsanpham.php?spid=' . $sanpham->getidsanpham() . '">' . $sanpham->gettensanpham() . '</a></h2>';
    echo '        <div class="product-carousel-price">';
    echo '            <ins>' . $sanpham->getgiaban() . ' vnd</ins>';
    echo '        </div>';
    echo '        <div class="product-option-shop">';
    echo '            <c:url value="/shop/addtocart?spid=' . $sanpham->getidsanpham() . '" var="addtocart"/>';
    echo '            <a class="add_to_cart_button" data-quantity="1" data-product_sku="" data-product_id="' . $sanpham->getidsanpham() . '" rel="nofollow" href="shop.php">Thêm Vào Giỏ Hàng</a>';
    echo '        </div>';
    echo '    </div>';
    echo '</div>';
}

echo '</div>';

              
            

               
            
    
echo '</div>';

   echo  '</div>';

} else {
    echo "sieuuuuuuuuuuuu  ";
}
?>

    
 



   <?php include 'footer.php' ?> 
   
   
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
    <script>
        
         
    </script>
  </body>
</html>