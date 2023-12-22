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
<style>

.block-container {
    border: 2px solid #435d7d; /* Màu và độ rộng viền */
    padding: 10px; /* Khoảng cách nội dung và viền */
    margin-bottom: 20px; /* Khoảng cách giữa các khối */
}
</style>
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
                    <h2>Lịch Sử Đơn Hàng</h2>
                </div>
            </div>
        </div>
        
    </div>





</div>
<div class="container">
<?php 
                    $donhangdb= new donhangdb();
                    $listalldonhang= $donhangdb->getalldonhangcuataikhoan($_SESSION['idtk']);

                
                
        
                    ?>
                    <br>
                    <br>
                    <br>
                      <?php
              foreach ($listalldonhang as $donhang) {
                
                ?> 
                 <div class="block-container">

<table cellspacing="0" class="shop_table cart">
                <thead>
                    <tr>
                        <th colspan="60">Thông Tin Đơn Hàng</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $taikhoandb=new taikhoandb();
                $taikhoan=$taikhoandb->gettaikhoan($donhang['thongtindonhang']['idtaikhoan']);
                    ?> 
                    <tr>
                        <td>ID Đơn hàng: <?php echo $donhang['thongtindonhang']['iddonhang']; ?></td>
                        <td>Được đặt bởi: <?php echo $taikhoan->gettentaikhoan() ?> </td> 
                        <td>Số Điện Thoại: <?php echo $donhang['thongtindonhang']['sodienthoai'] ?> </td>
                        <td>Ngày Đặt hàng: </br> <?php echo $donhang['thongtindonhang']['ngaydat']; ?></td>
                        <td>Địa chỉ: <?php echo $donhang['thongtindonhang']['diachi']; ?></td>
                        <td>Trạng Thái: 
                            
                            <?php if($donhang['thongtindonhang']['trangthai']===0){
                                echo('Chưa Xác Nhận');

                        } elseif($donhang['thongtindonhang']['trangthai']===1){
                            echo('Đã Huỷ');

                        } elseif($donhang['thongtindonhang']['trangthai']===2){
                            echo('Đã Xác Nhận');

                        }elseif($donhang['thongtindonhang']['trangthai']===3){
                            echo('Đang Giao');
                        }else{
                         echo('Đã Giao');
                        }
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        ?></td>
                        <td>Ngày Giao: </br> <?php echo $donhang['thongtindonhang']['ngaygiao'] ?>  </td>
                        
                    </tr>
                </tbody>
            </table>                
<table cellspacing="0" class="shop_table cart">
            <thead>
                <tr>
                <th class="product-remove">ID</th>
                <th class="product-thumbnail">Hình Ảnh</th>
                <th class="product-name">Tên</th>
                <th class="product-price">Giá</th>
                <th class="product-quantity">Số Lượng</th>
                <th class="product-subtotal">Tiền</th>
             
                </tr>
            </thead>
          


                <?php
                foreach ($donhang['sanphamdonhang'] as $sanpham) {
       


       
                    echo '<tbody>
                    <tr class="cart_item">
                        <td class="product-remove">
                           '.$sanpham['idsanpham'].'
                        </td>
                
                        <td class="product-thumbnail">
                            <a href="ttsanpham.php?spid='.$sanpham['idsanpham'].'"><img width="145" height="145" alt="poster_1_up" class="shop_thumbnail" src="../image/'.$sanpham['hinhanh'].'"></a>
                        </td>
                
                        <td class="product-name">
                            <a href="single-product.html">'.$sanpham['tensanpham'].'</a> 
                        </td>
                
                        <td class="product-price">
                            <span class="amount">'.$sanpham['giacu'].' VND</span> 
                        </td>
                
                        <td class="product-quantity">
        
                            
                        <span class="quantity-text">'.$sanpham['soluong'].'</span>
                       
                    </td>
                
                        <td class="product-subtotal">
                            <span class="amount">'.$sanpham['thanhtiengiacu'].' VND</span>
                    </tr>
                </tbody>';
                }
        echo'
        <tfoot>
            <tr class="cart_item">
                <td class="product-remove"></td>
                <td class="product-thumbnail"></td>
                <td class="product-name"></td>
                <td class="product-price"></td>
                <td class="product-quantity">Tổng:</td>
                <td class="product-subtotal">
                    <span>'.$donhang['thongtindonhang']['tongtien'].' VND</span>
                </td>
             
            </tr>
        </tfoot>
        </table>'; 
        
        if($donhang['thongtindonhang']['trangthai'] <1){

        ?> 
        <form action="../control/huydonhang.php" method="post">
            <input type="hidden" name="iddonhang" value="<?php echo $donhang['thongtindonhang']['iddonhang']; ?>">
            <button type="submit" name="trangthai" value="1">Huỷ Đơn Hàng</button>
        </form>

<?php }       

?>




          

            <?php
        echo  '</div>';
        } ?>



</div>





              
    </div>
</div>


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
