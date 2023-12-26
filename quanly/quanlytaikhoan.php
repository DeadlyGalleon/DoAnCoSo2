<?php 
require('../require.php');
session_start();
if(isset($_SESSION['idtk'])){
$taikhoandb=new taikhoandb();
$taikhoan=$taikhoandb->gettaikhoan($_SESSION['idtk']);
if($taikhoan->getadmin()==1){

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
        </style>
    <body>
       
        <div class="container">
        <div class="row">
        <a href="../web">   <button type="submit">Trở Về Trang Chủ</button></a>
           
           <a  href="../quanly"><button type="submit">Quản lý Sản Phẩm</button></a>
           <?php if($taikhoan->getadmin()==1){ ?>
           
           <a href="quanlydanhmuc.php"><button type="submit">Quản lý danh mục</button></a>
           <?php }?> 
           <a href="quanlydonhang.php"><button type="submit">Quản lý đơn hàng</button></a>
           </div> 



            <div class="row">
    <div class="col-sm-6">
        <!-- Thêm ô tìm kiếm -->
        <input type="text" id="searchInput" class="form-control" placeholder="Tìm kiếm sản phẩm...">
    </div>
    <!-- ... (các cột khác) ... -->
</div>

            <div class="table-wrapper">
                <div class="table-title">
                    <div class="row">
                        <div class="col-sm-6">
                            <h2>Quản Lý <b>Tài khoản</b></h2>
                        </div>
                        <div class="col-sm-6">
                            
                           						
                        </div>
                    </div>
                </div>

                
                <?php 
                $taikhoandb=new taikhoandb();
                $listalltaikhoan=$taikhoandb->getalltaikhoan();
                ?> 
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                         
                            <th>Id</th>
                            <th>Tên Tài Khoản</th>
                            <th>Số Điện Thoại</th>
                            <th>Là</th>
                       
                        
                            <th>Hành Động</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                        <?php foreach($listalltaikhoan as $taikhoan){ ?>
                            <tr>
                               
                                <td><?php echo $taikhoan->getidtaikhoan() ?> </td>
                                <td><?php echo $taikhoan->gettentaikhoan() ?> </td>
                           
                                <td><?php echo $taikhoan->getsodienthoai() ?> </td>
                                <td><?php if($taikhoan->getquanly()===0){
                                    echo "Khách Hàng";
                                }else{ echo "Quản Lý";} ?> </td>

<td>
                                    <a href="suataikhoan.php?id=<?php echo $taikhoan->getidtaikhoan() ?>"  class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Sửa">&#xE254;</i></a>
                                    <a href="javascript:void(0);" onclick="confirmDelete(<?php echo $taikhoan->getidtaikhoan(); ?>)">
        <i class="material-icons" data-toggle="tooltip" title="Xóa">&#xE872;</i>
                                    </a>
                                    <script>
    function confirmDelete(idSanPham) {
        if (confirm("Bạn có chắc chắn muốn xóa tài khoản này không?")) {
            window.location.href = "../control/xoataikhoan.php?id=" + idSanPham;
        }
    }
</script>

                                </td>

            
                            </tr>
                      
                        <?php  } ?> 
                    </tbody>
                </table>
             
            </div>
          

        </div>
        
        <!-- Edit Modal HTML -->
        
        
        
        
        
<div id="addsanpham" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="addsanphamform" action="../control/themsanpham.php" method="post" enctype="multipart/form-data">
                <div class="modal-header">
                    <h4 class="modal-title">Thêm Sản Phẩm</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Tên</label>
                        <input name="name" type="text" class="form-control" required>
                    </div>
                   <div class="form-group">
    <label>Hình Ảnh</label>
    <input name="image" type="file" class="form-control-file">
</div>

                    <div class="form-group">
                        <label>Giá Bán</label>
                        <input id="price" name="price" type="text" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Mô Tả</label>
                        <textarea name="mota" class="form-control" required></textarea>
                    </div>
                    <div class="form-group">
                        <label>Loại Sản Phẩm</label>
                        <select name="category" class="form-select" aria-label="Default select example">
                          
                                <?php $loaidb=new loaidb();
                                $listallloai=$loaidb->getallloai();
                                foreach($listallloai as $loai){    ?> 
                                <option value="<?php echo $loai->getidloai() ?>"><?php echo $loai->gettenloai() ?></option>
                           <?php } ?>

                        </select>
                    </div>
                    <div class="form-group">
                        <label>Hãng Sản Phẩm</label>
                        <select name="brands" class="form-select" aria-label="Default select example">
                          
                                <?php $hangdb=new hangdb();
                                $listallhang=$hangdb->getallhang();
                                foreach($listallhang as $hang){    ?> 
                                <option value="<?php echo $hang->getidhang() ?>"><?php echo $hang->gettenhang() ?></option>
                           <?php } ?>

                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Trở Lại">
                    <input type="submit" class="btn btn-success" value="Thêm">
                </div>
            </form>
        </div>
    </div>
</div>


<?php

?>

        <script>
          
    document.addEventListener('DOMContentLoaded', function() {
        // Lắng nghe sự kiện khi form được gửi
        document.getElementById('addsanphamform').addEventListener('submit', function(event) {
            var priceInput = document.getElementById('price');
            var priceValue = priceInput.value;

            // Kiểm tra nếu giá trị không phải số nguyên
            if (!Number.isInteger(Number(priceValue))) {
                // Ngăn chặn gửi biểu mẫu
                event.preventDefault();
                // Hiển thị thông báo lỗi
                alert('Giá bán phải là một số nguyên.');
                // Đặt lại giá trị của ô nhập liệu giá bán
                priceInput.value = '';
                // Tập trung vào ô nhập liệu giá bán
                priceInput.focus();
            }
        });
    });


        </script>
        <script src="js/ajax.js"></script>
        
        
    <script src="js/manager.js" type="text/javascript"></script>
</body>
</html>

<?php 


}
}

?> 