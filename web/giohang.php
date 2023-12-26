<?php session_start(); ?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Giỏ Hàng</title>
    
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
</head>
<body>



<?php include 'header.php' ?>

<div class="site-branding-area">
    <div class="container">
        <center><h1>Của Hàng Bán Điện thoại, Phụ Kiện</h1></center>
    </div>
</div> <!-- End site branding area -->


  <?php
  

  include 'danhmuc.php' ?>
<div class="product-big-title-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="product-bit-title text-center">
                    <h2>Giỏ Hàng Của Bạn</h2>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="single-product-area">
    <div class="zigzag-bottom"></div>
    <div class="container">
        <table cellspacing="0" class="shop_table cart">
            <thead>
                <tr>
                <th class="product-remove">ID</th>
                <th class="product-thumbnail">Hình Ảnh</th>
                <th class="product-name">Tên</th>
                <th class="product-price">Giá</th>
                <th class="product-quantity">Số Lượng</th>
                <th class="product-subtotal">Tiền</th>
                <th class="product-subtotal"></th>
                </tr>
            </thead>
          


                <?php
       


       if (isset($_SESSION['giohang']) && !empty($_SESSION['giohang'])) {
        foreach ($_SESSION['giohang'] as $key => $sanpham) {
            echo '<tbody>
            <tr class="cart_item">
                <td class="product-remove">
                   '.$sanpham['idsanpham'].'
                </td>
        
                <td class="product-thumbnail">
                    <a href="ttsanpham.php?spid='.$sanpham['idsanpham'].'"><img width="145" height="145" alt="poster_1_up" class="shop_thumbnail" src="../image/'.$sanpham['hinhanh'].'"></a>
                </td>
        
                <td class="product-name">
                    <a href="ttsanpham.php?spid='.$sanpham['idsanpham'].'">'.$sanpham['tensanpham'].'</a> 
                </td>
        
                <td class="product-price">
                    <span class="amount">'.$sanpham['giaban'].' VNĐ</span> 
                </td>
        
                <td class="product-quantity">
                <button class="giamsoluong-btn" data-spid="'.$sanpham['idsanpham'].'">-</button>
                    
                <span class="quantity-text">'.$sanpham['soluong'].'</span>
                <button class="themsoluong-btn" data-spid="'.$sanpham['idsanpham'].'">+</button>
            </td>
        
                <td class="product-subtotal">
                    <span class="amount">'.$sanpham['thanhtien'].' VNĐ</span>
                </td>
                <td class="product-remove">
                <a title="Xóa sản phẩm này" class="remove-item" data-spid="'.$sanpham['idsanpham'].'" " href="#">&#10006;</a>
               
              
                
             

                </td>
            </tr>
        </tbody>';
        }

    } else {
        echo 'Giỏ hàng của bạn đang trống.';
    }
    
                ?>


           
        </table>
        
      <?php if(isset($_SESSION['taikhoan']) && !empty($_SESSION['giohang'])){?> 
                                            <a href="dathang.php"> <input type="submit" value="Đặt Hàng" name="proceed" class="checkout-button button alt wc-forward"></a> 
                 
                                            <?php }elseif(!isset($_SESSION['taikhoan'])){ ?>

         <center><h3>Hãy Đăng Nhập Để Mua Hàng!</h3></center>
                                            
              
                                           


                                            
                                            <?php }?>

              
    </div>
</div>
<?php include('footer.php'); ?> 


<!-- Các phần khác của trang -->

<!-- Các file JavaScript -->
<script src="js/ajax.js"></script>
<script src="https://code.jquery.com/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/jquery.sticky.js"></script>
<script src="js/jquery.easing.1.3.min.js"></script>
<script src="js/main.js"></script>
<script src="https://code.jquery.com/jquery.min.js"></script>
<script>


</script>

</body>
</html>
