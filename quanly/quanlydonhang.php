<?php 
require('../require.php');
session_start();
if(isset($_SESSION['idtk'])){
$taikhoandb=new taikhoandb();
$taikhoan=$taikhoandb->gettaikhoan($_SESSION['idtk']);
if($taikhoan->getquanly()==1 || $taikhoan->getadmin()==1){

?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Quản Lý Sản Phẩm</title>
      
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link href="css/manager.css" rel="stylesheet">
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
        <style>
            img{
                width: 200px;
                height: 120px;
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
.block-container {
    border: 2px solid #435d7d; /* Màu và độ rộng viền */
    padding: 10px; /* Khoảng cách nội dung và viền */
    margin-bottom: 20px; /* Khoảng cách giữa các khối */
}
        </style>
    <body>
       
        <div class="container">
        <div class="row">
        <a href="../web">   <button type="submit">Trở Về Trang Chủ</button></a>
           
           <a  href="../quanly/"><button type="submit">Quản lý Sản Phẩm</button></a>
           <?php if($taikhoan->getadmin()==1){ ?>
           
           <a href="quanlytaikhoan.php"><button type="submit">Quản lý tài khoản</button></a>
           <?php }?> 
           <a href="quanlydanhmuc.php"><button type="submit">Quản lý danh mục</button></a>
           </div> 


            <div class="table-wrapper">
                <div class="table-title">
                    <div class="row">
                        <div class="col-sm-6">
                            <h2>Quản Lý <b>Đơn Hàng</b></h2>
                        </div>
                      
                    </div>
                </div>

                
                    <?php 
                    $donhangdb= new donhangdb();
                    $listalldonhang= $donhangdb->getalldonhang();

                
                
        
                ?>


           
    
     
             
            </div>

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
                        <td>Số Điện Thoại: 0<?php echo $donhang['thongtindonhang']['sodienthoai'] ?> </td>
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
        
        if($donhang['thongtindonhang']['trangthai'] !== 1 && !$donhang['thongtindonhang']['trangthai']!==4){

        ?> 
         <form action="../control/update_trangthai.php" method="post">
            <input type="hidden" name="iddonhang" value="<?php echo $donhang['thongtindonhang']['iddonhang']; ?>">
            <h3>Trạng Thái:</h3>  
            <select name="trangthai">
                <option value="0" <?php if($donhang['thongtindonhang']['trangthai'] === 0) echo 'selected'; ?>>Chưa Xác Nhận</option>
                <option value="2" <?php if($donhang['thongtindonhang']['trangthai'] === 2) echo 'selected'; ?>>Đã Xác Nhận</option>
                <option value="3" <?php if($donhang['thongtindonhang']['trangthai'] === 3) echo 'selected'; ?>>Đang Giao</option>
                <option value="4" <?php if($donhang['thongtindonhang']['trangthai'] === 4) echo 'selected'; ?>>Đã Giao</option>
            </select>
            <button type="submit">Lưu</button>
        </form>

<?php }       

?>




          

            <?php
        echo '</div>';
        } 
      
        
        
        ?>

 </div>
        <!-- Edit Modal HTML -->
        
        
        
        
        


        </script>
        <script src="js/ajax.js"></script>
        
        
    <script src="js/manager.js" type="text/javascript"></script>
</body>
</html>
<?php }

}
?>