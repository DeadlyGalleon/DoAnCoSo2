

   <div class="header-area">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="user-menu">
                        <ul>
                             <c:if test="${sessionScope.account != null}">
                                 
                                 
                             <c:if test="${sessionScope.account != null}">
                                <li >Xin Chào ${sessionScope.account.tennguoidung}</li>
                            </c:if>
                                
                                
                                
                      
                            
                            
                            
                            <c:if test="${sessionScope.account.quanly == 1}">
                            
                                <li><a href="quanlysanpham.php"><i class="fa fa-user"></i> Quản Lý Sản Phẩm</a></li>
                                       <li><a href="quanlysp"><i class="fa fa-user"></i> Lịch Sử Đơn Hàng</a></li>
                             </c:if>
                                
                              <c:if test="${sessionScope.account.admin == 1}">
                              <li><a href="quanlytk"><i class="fa fa-user"></i> Quản Lý Tài Khoản</a></li>
                              <li><a href="quanlysp"><i class="fa fa-user"></i> Quản Lý Sản Phẩm</a></li>
                                 <li><a href="quanlysp"><i class="fa fa-user"></i> Lịch Sử Đơn Hàng</a></li>
                              
                             </c:if>
                            
                            
                                <c:if test="${sessionScope.account.quanly==0 && sessionScope.account.admin==0 }">
                                  <li><a href="lichsumuahang"><i class="fa fa-user"></i>Lịch Sử Mua Hàng</a></li>
                                </c:if>
                            
                            <li><a href="logout"><i class="fa fa-user"></i> Đăng Xuất</a></li>
                            </c:if>
                            
                            
                            
                            
                            
                            
                           
                            
                                <c:if test="${sessionScope.account == null}">

                            <li><a href="dangnhap.php"><i class="fa fa-user"></i> Đăng Nhập</a></li>
                             
                            
                            </c:if>
                            
                            
                           
                            
                            
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


