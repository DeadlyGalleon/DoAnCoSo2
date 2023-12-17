<?php
session_start();
require('../require.php');

// Kiểm tra xử lý dữ liệu khi có POST request
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $sanphamdb = new sanphamdb();

    // Lấy dữ liệu từ biểu mẫu
    $idSanPham = $_POST['spid'];
    $tenSanPham = $_POST['name'];
    $giaBan = $_POST['price'];
    $moTa = $_POST['mota'];
    $loaiSanPham = $_POST['category'];
    $hangSanPham = $_POST['brand'];

    // Tạo một đối tượng sản phẩm với dữ liệu mới
    $sanPhamUpdate = new sanpham();
    $sanPhamUpdate->setidsanpham($idSanPham);
    $sanPhamUpdate->settensanpham($tenSanPham);
    $sanPhamUpdate->setgiaban($giaBan);
    $sanPhamUpdate->setmota($moTa);
    $sanPhamUpdate->setloai($loaiSanPham);
    $sanPhamUpdate->sethang($hangSanPham);

    // Cập nhật thông tin sản phẩm trong cơ sở dữ liệu
    if ($sanphamdb->suasanpham($sanPhamUpdate)) {
        // Kiểm tra và xử lý hình ảnh khi có file được tải lên
    
        if (isset($_FILES['new_image']) && $_FILES['new_image']['error'] === UPLOAD_ERR_OK) {
            
            $newImage = $_FILES['new_image']['name'];
            $targetDirectory = "../image/";
            $targetFile = $targetDirectory . basename($_FILES["new_image"]["name"]);

            if (move_uploaded_file($_FILES["new_image"]["tmp_name"], $targetFile)) {
            
                // Lấy thông tin sản phẩm cần cập nhật
                $sanpham = $sanphamdb->getsanphambyid($idSanPham);
                $oldImage = $sanpham->gethinhanh();

                // Xóa hình ảnh cũ
                unlink($targetDirectory . $oldImage);

                // Cập nhật hình ảnh mới cho sản phẩm
                $sanphamdb->suahinhanh($idSanPham, $newImage);
                
                // Chuyển hướng sau khi cập nhật thành công
                
               
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
           
        }

        header('Location: ../trangchu/quanlysanpham.php');
        exit();
    } else {
        // Xử lý lỗi nếu cập nhật thông tin sản phẩm không thành công
        echo "Có lỗi xảy ra trong quá trình cập nhật thông tin sản phẩm.";
    }
}
?>



<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
 
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link href="css/manager.css" rel="stylesheet" type="text/css"/>
        <style>
            img{
                width: 200px;
                height: 120px;
            }
        </style>
    <body>
        <?php

        if(isset($_GET['spid'])){
$sanphamdb=new sanphamdb();
    
$sanpham=$sanphamdb->getsanphambyid($_GET['spid']);

        }
        
        ?>

        
        <div class="container">
           <div id="SuaSanPhamForm" >
            <div class="modal-dialog">
                <div class="modal-content">
                    <form  method="POST" enctype="multipart/form-data">
                        <div class="modal-header">						
                            <h4 class="modal-title">Sửa Sản Phẩm</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        </div>
                        <div class="modal-body">	
                             <div class="form-group">
                                <label>ID</label>
                                <input value="<?php echo $sanpham->getidsanpham() ?>" name="spid" type="text" class="form-control" readonly="" required>
                            </div>
                            <div class="form-group">
                                <label>Tên</label>
                                <input value="<?php echo $sanpham->gettensanpham() ?>" name="name" type="text" class="form-control" required>
                            </div>
                            <div class="form-group">
    <label>Hình Ảnh</label>
    <img src="../image/<?php echo $sanpham->gethinhanh(); ?>" id="previewImage" alt="Current Image" class="preview-image">
    <input name="new_image" type="file" class="form-control-file" id="newImageInput">
</div>
<script>
    document.getElementById('newImageInput').addEventListener('change', function() {
        var input = this;
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('previewImage').setAttribute('src', e.target.result);
            };
            reader.readAsDataURL(input.files[0]);
        }
    });
</script>

                           
                           <div class="form-group">
    <label>Giá Bán</label>
    <input value="<?php echo $sanpham->getgiaban() ?>" name="price" id="priceInput" type="text" class="form-control" required>
    <span id="priceError" style="color: red;"></span>
</div>


                            <div class="form-group">
                                <label>Mô Tả</label>
                                <?php 
                                $loaidb=new loaidb();
                                $listallloai=$loaidb->getallloai();
                                $hangdb=new hangdb();
                                $listallhang=$hangdb->getallhang();
                                ?> 
                                <textarea   name="mota" class="form-control" required><?php echo  $sanpham->getmota(); ?></textarea>
                            </div>
                          
                            <div class="form-group">
    <label>Loại Sản Phẩm</label>
    <select name="category" class="form-select" aria-label="Default select example">
        <?php 
        // Lấy thông tin loại sản phẩm của sản phẩm hiện tại
        $currentCategoryName = $sanpham->gettenloai(); // Lấy tên loại sản phẩm của sản phẩm hiện tại

        foreach ($listallloai as $loai) {
            $selected = ($loai->gettenloai() == $currentCategoryName) ? "selected" : "";
        ?> 
            <option value="<?php echo $loai->getidloai(); ?>" <?php echo $selected; ?>><?php echo $loai->gettenloai(); ?></option>
        <?php } ?> 
    </select>
</div>

<div class="form-group">
    <label>Hãng Sản Phẩm</label>
    <select name="brand" class="form-select" aria-label="Default select example">
        <?php 
        // Lấy thông tin hãng sản phẩm của sản phẩm hiện tại
        $currentBrandName = $sanpham->gettenhang(); // Lấy tên hãng sản phẩm của sản phẩm hiện tại

        foreach ($listallhang as $hang) {
            $selected = ($hang->gettenhang() == $currentBrandName) ? "selected" : "";
        ?> 
            <option value="<?php echo $hang->getidhang(); ?>" <?php echo $selected; ?>><?php echo $hang->gettenhang(); ?></option>
        <?php } ?> 
    </select>
</div>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <a href="quanlysanpham.php">  <input type="button" class="btn btn-default" data-dismiss="modal" value="Quay Về"></a>
                            <input type="submit" class="btn btn-success" value="Sửa">
                        </div>
                    </form>
                </div>
            </div>
           
      
        <!-- Edit Modal HTML -->
        
        
        
        
        <script>
    var priceInput = document.getElementById('priceInput');
    var priceError = document.getElementById('priceError');

    priceInput.addEventListener('input', function() {
        var priceValue = priceInput.value;

        if (!isInteger(priceValue)) {
            priceError.textContent = "Giá phải là số nguyên";
        } else {
            priceError.textContent = "";
        }
    });

    function isInteger(value) {
        return /^-?\d+$/.test(value);
    }
</script>
        
        
    <script src="js/manager.js" type="text/javascript"></script>
</body>
</html>



