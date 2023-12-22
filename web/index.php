<!DOCTYPE html>
<?php session_start(); 
ob_start();

?> 

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
    <link rel="stylesheet" href="../web/css/owl.carousel.css">
    <link rel="stylesheet" href="../web/style.css">
    <link rel="stylesheet" href="../web/css/responsive.css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <style>
    .product-box {
    border: 1px solid #ccc; /* Đặt màu và độ dày khung viền */
    border-radius: 5px; /* Đặt góc bo tròn cho khung viền */
    padding: 10px; /* Đặt khoảng cách giữa nội dung và khung viền */
    
}

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

.single-shop-product,
    .product-box {
        width: 230px;
        height: 340px; /* Đã điều chỉnh chiều cao để tránh tràn */
        border-radius: 5px;
        border: 1px solid #ccc;
        padding: 10px;
        margin: 10px;
    }

    .single-shop-product .product-upper img,
    .product-box .product-upper img {
        max-width: 100%;
        height: auto;
        object-fit: contain; /* Để hình ảnh điều chỉnh kích thước tự động trong khung */
        max-height: 200px; /* Đã điều chỉnh kích thước tối đa */
    }

    .product-title {
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        max-width: 100%;
        margin-top: 10px;
        font-size: 16px;
    }

    .product-carousel-price ins {
        font-weight: bold;
        color: #435d7d;
        display: block;
        margin-top: 10px;
    }

    .product-option-shop {
        margin-top: 10px;
        text-align: center;
    }

    .add-to-cart-btn {
        display: block;
        background-color: #435d7d;
        color: #fff;
        padding: 10px 20px;
        text-decoration: none;
        border-radius: 5px;
        margin-top: 10px;
        transition: background-color 0.3s ease;
    }

    .add-to-cart-btn:hover {
        background-color: #34495e;
    }
    img {
        max-width: 100%; /* Hình ảnh sẽ không vượt quá chiều rộng của phần tử chứa */
        height: auto; /* Đảm bảo tỷ lệ chiều cao được duy trì */
        display: block; /* Loại bỏ khoảng trống dư thừa */
    }
    
  </style>
  <?php 

if (!isset($_SESSION['giohang']) || empty($_SESSION['giohang'])) {

  $_SESSION['giohang'] = array();
}

  ?>




  

  <body class="bg-light" >
   


    <?php include 'header.php' ?>

    
    
    
    
    <div class="site-branding-area">
        <div class="container">
            <center> <h1>Cửa Hàng Bán Điện thoại, Phụ Kiện</h1></center>
        </div>
    </div> <!-- End site branding area -->
    
   
   



   
  
<?php include '../web/danhmuc2.php' ?>



<?php include '../web/shop.php' ?>






















<?php include '../web/footer.php' ?> 
   
   
   <!-- Latest jQuery form server -->
   <script src="https://code.jquery.com/jquery.min.js"></script>
   
   <!-- Bootstrap JS form CDN -->
   <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
   
   <!-- jQuery sticky menu -->
   <script src="../web/js/owl.carousel.min.js"></script>
   <script src="../web/js/jquery.sticky.js"></script>
   
   <!-- jQuery easing -->
   <script src="js/jquery.easing.1.3.min.js"></script>
   
   <!-- Main Script -->
   <script src="../web/js/main.js"></script>
   <script>
       $(document).ready(function() {
   $('.add-to-cart-btn').click(function(event) {
       event.preventDefault();
       var spid = $(this).data('spid'); // Lấy ID sản phẩm từ thuộc tính dữ liệu

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
 </body>
</html>


















