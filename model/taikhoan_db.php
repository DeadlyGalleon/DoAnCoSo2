<?php
class taikhoandb{
    public function getalltaikhoan(){
        $db=database::getDB();
    $querry='SELECT * FROM `taikhoan`';
    $result = $db->query($querry);
$listtaikhoan=array();

foreach($result as $row){
    $taikhoan=new taikhoan();
        $taikhoan->setidtaikhoan($row['idtaikhoan']);
        $taikhoan->settentaikhoan($row['tentaikhoan']);
        $taikhoan->setmatkhau($row['matkhau']);
        $taikhoan->setsodienthoai($row['sodienthoai']);
        $taikhoan->setemail($row['email']);
        $taikhoan->setquanly($row['quanly']);
        $taikhoan->setadmin($row['admin']);
        
$listtaikhoan[]=$taikhoan;
}
return $listtaikhoan;
}
public function kiemtrataikhoan($taikhoan, $matkhau) {
    $db = database::getDB();

    // Sanitize inputs to prevent SQL injection
    $sanitized_taikhoan = $db->escape_string($taikhoan);
    $sanitized_matkhau = $db->escape_string($matkhau);

    // Construct the SQL query
    $query = "SELECT * FROM `taikhoan` WHERE tentaikhoan = '$sanitized_taikhoan' AND matkhau = '$sanitized_matkhau'";

    // Perform the query
    $result = $db->query($query);

    // Check if the query executed successfully
    if ($result) {
        // Check if any rows were returned
        if ($result->num_rows > 0) {
            // Fetch the user information
            $taikhoanc = $result->fetch_assoc();

            // Create a 'taikhoan' object and set user data
            $taikhoan = new taikhoan();
            $taikhoan->setidtaikhoan($taikhoanc['idtaikhoan']);
            $taikhoan->settentaikhoan($taikhoanc['tentaikhoan']);
            $taikhoan->setmatkhau($taikhoanc['matkhau']);
            $taikhoan->setsodienthoai($taikhoanc['sodienthoai']);
            $taikhoan->setemail($taikhoanc['email']);
            $taikhoan->setquanly($taikhoanc['quanly']);
            $taikhoan->setadmin($taikhoanc['admin']);

            return $taikhoan;
        } else {
            // No matching user found
            return false;
        }
    } else {
        // Query execution failed
        // Handle the database error accordingly
        // For example:
        // echo "Error: " . $db->error;
        return false;
    }
}



}

?> 