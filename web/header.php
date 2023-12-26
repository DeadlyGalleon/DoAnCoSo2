<?php

require('../require.php');

$taikhoan=new taikhoan();


// Check if 'taikhoan' object exists in the session and is an instance of 'taikhoan' class
if (isset($_SESSION['taikhoan'])) {
    $tkdb=new taikhoandb();
   
    $taikhoan = $tkdb->gettaikhoan($_SESSION['idtk']);
   
}else {$taikhoan=null;}

?>
    <div class="header-area">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <div class="user-menu">
                            <ul>
                        
                        <?php if($taikhoan!=null){    ?> 
                                
                                    
                                    
                                
                                    <li >Xin Chào <?php echo $taikhoan->gettentaikhoan() ?> </li>
                            
                                    
                                    
                                    
                        
                                
                                
                                
                            <?php if($taikhoan->getquanly()==1){ 
                                
                                  echo '  <li><a href="../quanly/"><i class="fa fa-user"></i> Trang Quản Lý</a></li>';
            
                     }?> 
                                    
                            <?php if($taikhoan->getadmin()==1){ ?> 
                             <li><a href="../quanly/"><i class="fa fa-user"></i> Trang Quản Lý</a></li>
                               
                                
                                    <?php }?> 
                                
                                
                            <?php if($taikhoan->getquanly()!=1 and $taikhoan->getadmin()!=1  ){?> 
                                    <li><a href="lichsudonhang.php"><i class="fa fa-user"></i>Lịch Sử Mua Hàng</a></li>

                                    <?php }?> 
                                
                                <li><a href="../control/dangxuat.php"><i class="fa fa-user"></i> Đăng Xuất</a></li>
                            
                                
                                <?php }else{?> 
                                
                                
                                
                                
                            
                                
                                <li><a href="dangnhap.php"><i class="fa fa-user"></i> Đăng Nhập</a></li>
                                
                                
                                
                        <?php }?> 
                                
                                
                            
                                
                                
                            </ul>
                        </div>
                    </div>
                    
                    <div class="col-md-4">
                        
                        
                        <form action="search.php" method="get">
            <input type="text" name="txt" placeholder="Tìm kiếm...">
            <button type="submit">Tìm kiếm</button>
                    </form>
                        
                    </div>
                </div>
            </div>
        </div>


