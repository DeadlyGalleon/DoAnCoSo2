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
           
<a  href="quanlydanhmuc.php"><button type="submit">Quản lý danh mục</button></a>
<?php if($taikhoan->getadmin()==1){ ?>

<a href="quanlytaikhoan.php"><button type="submit">Quản lý tài khoản</button></a>
<?php }?> 
<a href="quanlydonhang.php"><button type="submit">Quản lý đơn hàng</button></a>
</div> 
            <div class="row">
    <div class="col-sm-6">
    
    <form action="" method="post">
            <input type="text" name="txt" placeholder="Tìm kiếm...">
            <button type="submit">Tìm kiếm</button>
                    </form>
    </div>
 
</div>

            <div class="table-wrapper">
                <div class="table-title">
                    <div class="row">
                        <div class="col-sm-6">
                            <h2>Quản Lý <b>Sản Phẩm</b></h2>
                        </div>
                        <div class="col-sm-6">
                            <a href="#addsanpham"  class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Thêm Sản Phẩm</span></a>
                           						
                        </div>
                    </div>
                </div>

                
                <?php 
                $sanphamdb=new sanphamdb();
               
                $listallsanpham=$sanphamdb->getallsanphamdesc();
                if(isset($_get['txt']))
                
                { $listallsanpham=$sanphamdb->getsanphambyName($_get['txt']);}
                ?> 
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                         
                            <th>Id</th>
                            <th>Tên</th>
                            <th>Hình Ảnh</th>
                            <th>Loại</th>
                            <th>Hãng</th>
                            <th>Giá</th>
                        
                            <th>Hành Động</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                        <?php foreach($listallsanpham as $sanpham){ ?>
                            <tr>
                               
                                <td><?php echo $sanpham->getidsanpham() ?> </td>
                                <td><?php echo $sanpham->gettensanpham() ?> </td>
                                <td>
                                    <img width="auto" src="../image/<?php echo $sanpham->gethinhanh() ?>">
                                </td>
                                <td><?php echo $sanpham->gettenloai() ?> </td>
                                <td><?php echo $sanpham->gettenhang() ?> </td>

                                

                                <td><?php echo $sanpham->getgiaban() ?> vnd</td>
                                <td>
                                    <a href="SuaSanPham.php?spid=<?php echo $sanpham->getidsanpham() ?>"  class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Sửa">&#xE254;</i></a>
                                    <a href="javascript:void(0);" onclick="confirmDelete(<?php echo $sanpham->getidsanpham(); ?>)">
        <i class="material-icons" data-toggle="tooltip" title="Xóa">&#xE872;</i>
                                    </a>
                                    <script>
    function confirmDelete(idSanPham) {
        if (confirm("Bạn có chắc chắn muốn xóa sản phẩm này không?")) {
            window.location.href = "../control/xoasanpham.php?spid=" + idSanPham;
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
                        <label>Hình Ảnh Chi Tiết</label>
                        <input name="imagechitiet[]" type="file" class="form-control-file" multiple>
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
}else{

    echo "Trang Không Tồn Tại";
}
?> 