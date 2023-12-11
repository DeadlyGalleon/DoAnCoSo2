<?php
class taikhoan{
private $idtaikhoan,$tentaikhoan,$matkhau,$sodienthoai,$email,$quanly,$admin;
//

public function getidtaikhoan() {
    return $this->idtaikhoan;
}

public function setidtaikhoan($value) {
    $this->idtaikhoan = $value;
}
public function gettentaikhoan() {
    return $this->tentaikhoan;
}

public function settentaikhoan($value) {
    $this->tentaikhoan = $value;
}

///
public function getmatkhau() {
    return $this->matkhau;
}

public function setmatkhau($value) {
    $this->matkhau = $value;
}

//
public function getsodienthoai() {
    return $this->sodienthoai;
}

public function setsodienthoai($value) {
    $this->sodienthoai = $value;
}
//

public function getemail() {
    return $this->email;
}

public function setemail($value) {
    $this->email = $value;
}
//

public function getquanly() {
    return $this->quanly;
}

public function setquanly($value) {
    $this->quanly = $value;
}
//

public function getadmin() {
    return $this->admin;
}

public function setadmin($value) {
    $this->admin = $value;
}


}
?>
