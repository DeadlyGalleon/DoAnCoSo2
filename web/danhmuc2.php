<link rel="stylesheet" type="text/css" href="stylemenu.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<style>
    .dropdown .dropdown-toggle {
        border: none;
    }

   
    .dropdown .dropdown-menu li a {
        background-color: transparent;
        font-weight: normal;
        color: #333; /* Màu chữ bình thường */
        transition: background-color 0.3s, color 0.3s; 
    }

    /* Tô đậm nền và màu chữ khi trỏ chuột vào */
    .dropdown .dropdown-menu li a:hover {
        background-color: #f9f9f9;
        font-weight: bold;
        color: #333;
        
    }

    
    ul.dropdown-menu-right {
        position: absolute;
        right: -340px; 
        top: 0; 
        display: none;
        background-color: #bfbfbf;
    }

    /* Hiển thị menu cấp 3 khi có lớp 'active' */
  /* CSS */
/* CSS */
ul.dropdown-menu-right.active {
    background-color: #bfbfbf;
    right: -340px;
    display: block;
    
   
}
/* CSS */
/* Điều chỉnh chiều cao của menu cấp 2 và cấp 3 */
ul.dropdown-menu, ul.dropdown-menu-right.active {
    top: 100%; /* Đặt chiều cao của menu cấp 3 bằng với menu cấp 2 */
}
li{
border: 1px black;
border-radius: 1px;
}



</style>
<?php


$query = "SELECT * FROM loai";

$loaidb=new loaidb();
?>

<script>
// JavaScript
$(document).ready(function() {
    $('li.dropdown').hover(function() {
        $(this).find('ul.dropdown-menu-right').removeClass('active');
    }, function() {
        $(this).find('ul.dropdown-menu-right').addClass('active');
    });
});


</script>

<div class="mainmenu-area">
    <div class="container">
        <div class="row">
            <nav>
            <ul class="nav navbar-nav">
                    <li><a href="../web">Trang Chủ</a></li>
                    <?php
                      $hangdb = new hangdb();
                     $listallloai=$loaidb->getallloai();
                     foreach($listallloai as $loai){
                    echo '<li class="dropdown">';
                    
                    echo '<a class="dropdown-toggle" data-toggle="dropdown" href="danhsachsanpham1.php?category_id='.$loai->getidloai().'">' .$loai->gettenloai(). '</a>';
                    echo '<ul class="dropdown-menu">';
                    
                    
                    // Danhsachhangdienthoai
                  
                    echo '<li><a href="?category_id=' . $loai->getidloai() . '">Tất Cả</a>';
                        
                        
                        echo '</li>'; 
                        $listhang=$hangdb->gethangbyloai($loai->getidloai());
                    foreach ($listhang as $hang) {
                        echo '<li><a href="?category_id=' . $loai->getidloai() . '&brand_id=' . $hang['idhang'] . '">' . $hang['tenhang'] . '</a>';
                        
                        
                        echo '</li>'; 
                    }
                    
                    echo '</ul>';
                    echo '</li>';

                }


                


                    echo '<li class="dropdown">';
                    echo '<a class="dropdown-toggle" data-toggle="dropdown" href="">' . 'Hãng' . '</a>';
                    echo '<ul class="dropdown-menu">';
                    
                    // Danhsachhangdienthoai
                   
                    $listhang = $hangdb->getallhang();
                    
                    foreach ($listhang as $hang) {
                        echo '<li><a href="?brand_id=' . $hang->getidhang() . '">' . $hang->gettenhang() . '</a>';
                        
                     //đóng mục cấp 3
                       
                        echo '</li>'; //đóng mục cấp 2
                    }
                    
                    echo '</ul>';
                    echo '</li>';

                    


                    ?>
                    <li><a href="giohang.php">Giỏ Hàng</a></li>
                </ul>
           
            
            </nav>
        </div>
    </div>
</div>
