<section class="hero">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
               <?php include('danhmuc.php'); ?> 
                </div>
                <div class="col-lg-9">
                    <div class="hero__search">
                        <div class="hero__search__form">
                            <form action="../mainwweb/timkiem.php" method="Post">
                          
                                <input type="text" placeholder="Tìm Kiếm Sản Phẩm">
                                <button type="submit" class="site-btn">Tìm Kiếm</button>
                            </form>
                        </div>
                   
                    </div>
                  <section class="latest-product spad">
      <?php
      $sanphamdb=new sanphamdb();
      $sanphammoi = $sanphamdb->getsanphammoi(); // Danh sách cần chia

$moi1 = array_slice($sanphammoi, 0, count($sanphammoi) / 2); // Danh sách đầu tiên
$moi2 = array_slice($sanphammoi, count($sanphammoi) / 2);    // Danh sách thứ hai

      ?> 
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="latest-product__text">
                    
                        <h4>Sản Phẩm Mới</h4>
                        <br>
                        <br>
                    
                        <div class="latest-product__slider owl-carousel">
                            <div class="latest-prdouct__slider__item">
  <?php foreach($moi1 as $sanpham){ ?>

                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="../image/<?php echo $sanpham->gethinhanh(); ?> " alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6><?php echo $sanpham->gettensanpham(); ?> </h6>
                                        <span><?php echo $sanpham->getgiaban(); ?> VNĐ </span>
                                    </div>
                                </a>
                                <?php } ?>
                            </div>
                            <div class="latest-prdouct__slider__item">
                            <?php foreach($moi2 as $sanpham){ ?>

<a href="#" class="latest-product__item">
    <div class="latest-product__item__pic">
    <img src="../image/<?php echo $sanpham->gethinhanh(); ?> " alt="">
    </div>
    <div class="latest-product__item__text">
        <h6><?php echo $sanpham->gettensanpham(); ?> </h6>
        <span><?php echo $sanpham->getgiaban(); ?> VNĐ </span>
    </div>
</a>
<?php } ?>
                               
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="latest-product__text">
                        <h4>Sản Phẩm Bán Chạy</h4>
                        <br>
                        <br>

                        <div class="latest-product__slider owl-carousel">
                            <div class="latest-prdouct__slider__item">
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="img/latest-product/lp-1.jpg" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Crab Pool Security</h6>
                                        <span>$30.00</span>
                                    </div>
                                </a>
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="img/latest-product/lp-2.jpg" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Crab Pool Security</h6>
                                        <span>$30.00</span>
                                    </div>
                                </a>
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="img/latest-product/lp-3.jpg" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Crab Pool Security</h6>
                                        <span>$30.00</span>
                                    </div>
                                </a>
                            </div>
                            <div class="latest-prdouct__slider__item">
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="img/latest-product/lp-1.jpg" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Crab Pool Security</h6>
                                        <span>$30.00</span>
                                    </div>
                                </a>
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="img/latest-product/lp-2.jpg" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Crab Pool Security</h6>
                                        <span>$30.00</span>
                                    </div>
                                </a>
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="img/latest-product/lp-3.jpg" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Crab Pool Security</h6>
                                        <span>$30.00</span>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="latest-product__text">
                        <h4>Sản phẩm được đánh giá cao</h4>
                        <br>
                    
                        <div class="latest-product__slider owl-carousel">
                            <div class="latest-prdouct__slider__item">
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="img/latest-product/lp-1.jpg" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Crab Pool Security</h6>
                                        <span>$30.00</span>
                                    </div>
                                </a>
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="img/latest-product/lp-2.jpg" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Crab Pool Security</h6>
                                        <span>$30.00</span>
                                    </div>
                                </a>
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="img/latest-product/lp-3.jpg" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Crab Pool Security</h6>
                                        <span>$30.00</span>
                                    </div>
                                </a>
                            </div>
                            <div class="latest-prdouct__slider__item">
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="img/latest-product/lp-1.jpg" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Crab Pool Security</h6>
                                        <span>$30.00</span>
                                    </div>
                                </a>
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="img/latest-product/lp-2.jpg" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Crab Pool Security</h6>
                                        <span>$30.00</span>
                                    </div>
                                </a>
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="img/latest-product/lp-3.jpg" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Crab Pool Security</h6>
                                        <span>$30.00</span>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
     
    </section>
                </div>
            </div>
        </div>
</section>