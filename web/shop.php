
    
    
    
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
            
            
             
            $sanphamdb=new sanphamdb();
           
          
            $listallsanpham=$sanphamdb->getallsanpham();
           
              if(isset($_GET['category_id']) && !isset($_GET['brand_id']) && $_GET['category_id']!=='phukien'){
               
                $listallsanpham=$sanphamdb->getsanphambyloai($_GET['category_id']);
              }
elseif(isset($_GET['category_id']) && $_GET['category_id']==='phukien'){

    $listallsanpham=$sanphamdb->getallphukien();
  }
              elseif(isset($_GET['category_id']) && isset($_GET['brand_id'])){
                $listallsanpham=$sanphamdb->getsanphambyloaivahang($_GET['category_id'],$_GET['brand_id']);
              }


              echo '<div class="row">';

foreach ($listallsanpham as $sanpham) {
  echo '<div class="col-md-3 product-col">'; // Sử dụng col-md-3 để tạo 4 cột trên mỗi hàng
  echo '    <div class="single-shop-product product-box">';
  echo '        <div class="product-upper">';
  echo '            <img src="../image/' . $sanpham->gethinhanh() . '" width="230px" class="img-fluid" alt="">';
  echo '        </div>';
  echo '        <h2 class="product-title"><a href="ttsanpham.php?spid='. $sanpham->getidsanpham() .'">' . $sanpham->gettensanpham() . '</a></h2>';
  echo '        <div class="product-carousel-price">';
  echo '            <ins>' . $sanpham->getgiaban() . ' vnd</ins>';
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

 </div>



  