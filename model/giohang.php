<?php 
class GioHang {
    private $idsanpham;
    private $tensanpham;
    private $mota;
    private $hinhanh;
    private $idtaikhoan;
    private $giaban;
  
    private $soluong;
    private $thanhtien;
    
    // public function __construct($idsanpham, $tensanpham, $mota, $hinhanh, $idtaikhoan, $giaban, $soluong, $thanhtien) {
    //     $this->idsanpham = $idsanpham;
    //     $this->tensanpham = $tensanpham;
    //     $this->mota = $mota;
    //     $this->hinhanh = $hinhanh;
    //     $this->idtaikhoan = $idtaikhoan;
    //     $this->giaban = $giaban;

    //     $this->soluong = $soluong;
    //     $this->thanhtien = $thanhtien;
    // }
    
    public function getIdsanphamgh() {
        return $this->idsanpham;
    }
    
    public function getTensanphamgh() {
        return $this->tensanpham;
    }
    
    public function getMotagh() {
        return $this->mota;
    }
    
    public function getHinhanhgh() {
        return $this->hinhanh;
    }
    
    public function getidtaikhoangh() {
        return $this->idtaikhoan;
    }
    
    public function getGiabangh() {
        return $this->giaban;
    }
    
  
    public function getSoluonggh() {
        return $this->soluong;
    }
    
    public function getThanhtiengh() {
        return $this->thanhtien;
    }
    
    public function setIdsanphamgh($idsanpham) {
        $this->idsanpham = $idsanpham;
    }
    
    public function setTensanphamgh($tensanpham) {
        $this->tensanpham = $tensanpham;
    }
    
    public function setMotagh($mota) {
        $this->mota = $mota;
    }
    
    public function setHinhanhgh($hinhanh) {
        $this->hinhanh = $hinhanh;
    }
    
    public function setidtaikhoangh($idtaikhoan) {
        $this->idtaikhoan = $idtaikhoan;
    }
    
    public function setGiabangh($giaban) {
        $this->giaban = $giaban;
    }
    
    
    
    public function setSoluonggh($soluong) {
        $this->soluong = $soluong;
    }
    
    public function setThanhtiengh($thanhtien) {
        $this->thanhtien = $thanhtien;
    }
}
?>