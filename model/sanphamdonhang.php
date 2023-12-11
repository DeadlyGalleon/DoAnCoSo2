<?php
class sanphamc{
    private $iddonhang, $idsanpham, $giacu, $soluong , $thanhtien;
    public function getiddonhang() {
        return $this->iddonhang;
    }
    
    public function setiddonhang($value) {
        $this->iddonhang = $value;
    }
    public function getidsanpham() {
        return $this->idsanpham;
    }
    
    public function setidsanpham($value) {
        $this->idsanpham = $value;
    }
    public function getgiacu() {
        return $this->giacu;
    }
    
    public function setgiacu($value) {
        $this->giacu = $value;
    }
    public function getsoluong() {
        return $this->soluong;
    }
    
    public function setsoluong($value) {
        $this->soluong = $value;
    }

    public function getthanhthien() {
        return $this->thanhtien;
    }
    
    public function setthanhtien($value) {
        $this->thanhtien = $value;
    }
}
?>
