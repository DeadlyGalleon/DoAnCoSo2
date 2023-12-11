<?php
class Donhang{
private $iddonhang,$idtaikhoan,$listsanphamdonhang,$ngaygio,$trangthai, $tongtien;
public function gettongtien() {
    return $this->tongtien;
}

public function settongtien($value) {
    $this->tongtien = $value;
}

public function getiddonhang() {
    return $this->iddonhang;
}

public function setiddonhang($value) {
    $this->iddonhang = $value;
}
public function getidtaikhoan() {
    return $this->idtaikhoan;
}

public function setidtaikhoan($value) {
    $this->idtaikhoan = $value;
}
public function getlistsanphamdonhang() {
    return $this->listsanphamdonhang;
}

public function setlistsanphamdonhang($value) {
    $this->listsanphamdonhang = $value;
}
public function getngaygio() {
    return $this->ngaygio;
}

public function setngaygio($value) {
    $this->ngaygio = $value;
}
public function gettrangthai() {
    return $this->trangthai;
}

public function settrangthai($value) {
    $this->trangthai = $value;
}

}


?>
