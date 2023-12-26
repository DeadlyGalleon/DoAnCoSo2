
    <style>
      .pagination {
    margin-top: 20px;
    text-align: center;
}

.pagination ul {
    display: inline-block;
    padding: 0;
    margin: 0;
}

.pagination ul li {
    display: inline;
    list-style: none;
    margin-right: 5px;
}

.pagination ul li a {
    text-decoration: none;
    padding: 5px 10px;
    border: 1px solid #ccc;
    border-radius: 3px;
    color: #333;
}

.pagination ul li.active a {
    background-color: #333;
    color: #fff;
    border: 1px solid #333;
}

.pagination ul li a:hover {
    background-color: #f5f5f5;
}

    </style>
    
    
    <div class="product-big-title-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="product-bit-title text-center">
                        <h2>Sản Phẩm</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>


    
    <div class="single-product-area">
    <div class="zigzag-bottom"></div>
 <div class="container">
 <?php 
            
            
            $page = isset($_GET['page']) ? $_GET['page'] : 1;
            $sanphammoitrang = 99;
            $batdautu = ($page - 1) * $sanphammoitrang;
            $sanphamdb=new sanphamdb();
           
          
            $listallsanpham=$sanphamdb->getallsanphamsb($sanphammoitrang,$batdautu);
           
              if(isset($_GET['category_id']) && !isset($_GET['brand_id']) && $_GET['category_id']!=='phukien'){
               
                $listallsanpham=$sanphamdb->getsanphambyloai($_GET['category_id'],$sanphammoitrang,$batdautu);
              }
elseif(isset($_GET['category_id']) && $_GET['category_id']==='phukien'){

    $listallsanpham=$sanphamdb->getallphukien();
  }
              elseif(isset($_GET['category_id']) && isset($_GET['brand_id'])){
                $listallsanpham=$sanphamdb->getsanphambyloaivahang($_GET['category_id'],$_GET['brand_id'],$sanphammoitrang,$batdautu);
              }elseif(!isset($_GET['category_id']) && isset($_GET['brand_id'])){
                $listallsanpham=$sanphamdb->getsanhambyhang($_GET['brand_id'],$sanphammoitrang,$batdautu);
              }

// Hiển thị danh sách sản phẩm
echo '<div class="row">';

foreach ($listallsanpham as $sanpham) {
  echo '<div class="col-md-3 product-col">'; // Sử dụng col-md-3 để tạo 4 cột trên mỗi hàng
  echo '    <div class="single-shop-product product-box">';
  echo '        <div class="product-upper">';
  echo '            <img src="../image/' . $sanpham->gethinhanh() . '" width="230px" class="img-fluid" alt="">';
  echo '        </div>';
  echo '        <h2 class="product-title"><a href="ttsanpham.php?spid='. $sanpham->getidsanpham() .'">' . $sanpham->gettensanpham() . '</a></h2>';
  echo '        <div class="product-carousel-price">';
  echo '            <ins>' . $sanpham->getgiaban() . ' VNĐ</ins>';
  echo '        </div>';
  echo '        <div class="product-option-shop">';
  echo '            <c:url value="/shop/addtocart?spid=' . $sanpham->getidsanpham() . '" var="addtocart"/>';
  echo '            <a class="add-to-cart-btn" data-quantity="1" data-spid="'.$sanpham->getidsanpham().'" data-product_sku="" data-product_id="' . $sanpham->getidsanpham() . '" rel="nofollow" href="#">Thêm Vào Giỏ Hàng</a>';
  echo '        </div>';
  echo '    </div>';
  echo '</div>';
  
}

echo '</div>';

              
              ?>

               
            
    
</div>
<center>
<?php


// echo '<div class="pagination">';
// echo '    <ul>';

// $currentPage = isset($_GET['page']) ? $_GET['page'] : 1;

// for ($i = 1; $i <= ceil($totalPages / $sanphammoitrang); $i++) {
//     if ($currentPage == $i) {
//       if(isset($_GET['category_id']) && !isset($_GET['brand_id'])){
//         echo '    <li class="active"><a href="?category_id='.$_GET['category_id'].'&page=' . $i . '">' . $i . '</a></li>';
//       }elseif(isset($_GET['category_id']) && isset($_GET['brand_id'])){
//         echo '    <li class="active"><a href="?category_id='.$_GET['category_id'].'&page=' . $i . '">' . $i . '</a></li>';
//       }

//     } else {
//         echo '    <li><a href="?page=' . $i . '">' . $i . '</a></li>';
//     }

// echo '    </ul>';
// echo '</div>';
?>

 </div></center>


 



  