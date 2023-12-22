<?php
class taikhoandb{
    public function getalltaikhoan(){
        $db=database::getDB();
    $querry='SELECT * FROM `taikhoan` where idtaikhoan<>1';
    $result = $db->query($querry);
$listtaikhoan=array();

foreach($result as $row){
    $taikhoan=new taikhoan();
        $taikhoan->setidtaikhoan($row['idtaikhoan']);
        $taikhoan->settentaikhoan($row['tentaikhoan']);
        $taikhoan->setmatkhau($row['matkhau']);
        $taikhoan->setsodienthoai($row['sodienthoai']);
     
        $taikhoan->setquanly($row['quanly']);
        $taikhoan->setadmin($row['admin']);
        
$listtaikhoan[]=$taikhoan;
}
return $listtaikhoan;
}
public function kiemtrataikhoantontai($taikhoan) {
    $db = database::getDB();
   
    // Prepare the SQL query with placeholders
    $query = "SELECT * FROM `taikhoan` WHERE tentaikhoan = :tentaikhoan";
    $stmt = $db->prepare($query);


    // Bind parameters to the prepared statement
    $stmt->bindParam(':tentaikhoan', $taikhoan);

    

    // Execute the prepared statement
    $stmt->execute();


    
    $taikhoanc = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($taikhoanc) {
       
    
       return true;
    } else {
        // No matching user found
        return false;
    }
}
public function kiemtrasodienthoaitontai($sodienthoai) {
    $db = database::getDB();
   
    // Prepare the SQL query with placeholders
    $query = "SELECT * FROM `taikhoan` WHERE sodienthoai = :sodienthoai";
    $stmt = $db->prepare($query);


    // Bind parameters to the prepared statement
    $stmt->bindParam(':sodienthoai', $sodienthoai);

    

    // Execute the prepared statement
    $stmt->execute();


    
    $taikhoanc = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($taikhoanc) {
       
    
       return true;
    } else {
        // No matching user found
        return false;
    }
}
public function gettaikhoan($idtk){
    $db=database::getDB();
    $querry='SELECT * FROM `taikhoan` where idtaikhoan='.$idtk.'';
    $result = $db->query($querry);
    $taikhoan=new taikhoan();

foreach($result as $row){
    
        $taikhoan->setidtaikhoan($row['idtaikhoan']);
        $taikhoan->settentaikhoan($row['tentaikhoan']);
        $taikhoan->setmatkhau($row['matkhau']);
        $taikhoan->setsodienthoai($row['sodienthoai']);
        $taikhoan->setquanly($row['quanly']);
        $taikhoan->setadmin($row['admin']);
}
return $taikhoan;

}
public function suataikhoan($taikhoanc){
  
    $db = database::getDB();
    $query = 'UPDATE `taikhoan` SET `tentaikhoan` = :tentaikhoan, `matkhau` = :matkhau, `sodienthoai` = :sodienthoai, `quanly` = :quanly WHERE `idtaikhoan` = :idtaikhoan';
$ten=$taikhoanc->gettentaikhoan();
$matkhau=$taikhoanc->getmatkhau();
$sodienthoai=$taikhoanc->getsodienthoai();
$quanly=$taikhoanc->getquanly();
$idtaikhoan=$taikhoanc->getidtaikhoan();
    $statement = $db->prepare($query);
    $statement->bindParam(':tentaikhoan', $ten);
    $statement->bindParam(':matkhau',$matkhau);
    $statement->bindParam(':sodienthoai', $sodienthoai);
    $statement->bindParam(':quanly', $quanly);
    $statement->bindParam(':idtaikhoan', $idtaikhoan);

    return $statement->execute();
}

public function xoataikhoan($id){
  
    $db = database::getDB();
    $query = 'DELETE FROM taikhoan WHERE `idtaikhoan` = :idtaikhoan';

    $statement = $db->prepare($query);
   
    $statement->bindParam(':idtaikhoan', $id);

    return $statement->execute();
}


public function dangkitaikhoan($taikhoan){
    $db = database::getDB();
    
    // Sử dụng Prepared Statements với PDO
    $query = "INSERT INTO `taikhoan` (`idtaikhoan`, `tentaikhoan`, `matkhau`, `sodienthoai`, `quanly`, `admin`) VALUES (NULL, :tentaikhoan, :matkhau, :sodienthoai, :quanly, :admin1)";
    
    $statement = $db->prepare($query);

    // Kiểm tra xem prepare có thành công không
    if ($statement) {
        // Bind các giá trị vào statement
        $statement->bindParam(':tentaikhoan', $taikhoan->gettentaikhoan());
        $statement->bindParam(':matkhau', $taikhoan->getmatkhau());
        $statement->bindParam(':sodienthoai', $taikhoan->getsodienthoai());
        $statement->bindParam(':quanly', $taikhoan->getquanly());
        $statement->bindParam(':admin1', $taikhoan->getadmin());
        
        // Thực thi truy vấn
        $statement->execute();
    } else {
        // Xử lý lỗi nếu prepare không thành công
        // Ví dụ: 
        die("Prepare statement failed");
    }
}


public function kiemtrataikhoan($taikhoan, $matkhau) {
    $db = database::getDB();
   
    // Prepare the SQL query with placeholders
    $query = "SELECT * FROM `taikhoan` WHERE tentaikhoan = :tentaikhoan AND matkhau = :matkhau";
    $stmt = $db->prepare($query);


    // Bind parameters to the prepared statement
    $stmt->bindParam(':tentaikhoan', $taikhoan);
    $stmt->bindParam(':matkhau', $matkhau);
    

    // Execute the prepared statement
    $stmt->execute();


    
    $taikhoanc = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($taikhoanc) {
       
    
        $taikhoan_obj = new taikhoan();
        $taikhoan_obj->setidtaikhoan($taikhoanc['idtaikhoan']);
        $taikhoan_obj->settentaikhoan($taikhoanc['tentaikhoan']);
        $taikhoan_obj->setmatkhau($taikhoanc['matkhau']);
        $taikhoan_obj->setsodienthoai($taikhoanc['sodienthoai']);
      
        $taikhoan_obj->setquanly($taikhoanc['quanly']);
        $taikhoan_obj->setadmin($taikhoanc['admin']);

        return $taikhoan_obj;
    } else {
        // No matching user found
        return false;
    }
}






}

?> 