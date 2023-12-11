<?php
class sanpham {
    private $idsanpham, $tensanpham, $mota, $hinhanh, $giaban, $loai, $hang,$tenhang,$tenloai;

    public function __construct() {
        
        $this->idsanpham = 0;
        $this->tensanpham = '';
        $this->mota = '';
        $this->hinhanh = '';
        $this->giaban = 0;
        $this->loai=null;
        $this->hang=0;
    }

    public function getidsanpham() {
        return $this->idsanpham;
    }

    public function setidsanpham($value) {
        $this->idsanpham = $value;
    }
    public function gettenhang() {
        return $this->tenhang;
    }

    public function settenhang($value) {
        $this->tenhang = $value;
    }
    public function gettenloai() {
        return $this->tenloai;
    }

    public function settenloai($value) {
        $this->tenloai = $value;
    }

    public function gettensanpham() {
        return $this->tensanpham;
    }

    public function settensanpham($value) {
        $this->tensanpham = $value;
    }

    public function getmota() {
        return $this->mota;
    }

    public function setmota($value) {
        $this->mota = $value;
    }

    public function gethinhanh() {
        return $this->hinhanh;
    }

    public function sethinhanh($value) {
        $this->hinhanh = $value;
    }

    public function getgiaban() {
       
        return $this->giaban;
    }

    public function setgiaban($value) {
        $this->giaban = $value;
    }

    public function getloai() {
       return $this->loai;
    }
    public function setloai($value){
        $this->loai=$value;
    }

    public function gethang() {
        return $this->hang;
     }
     public function sethang($value){
         $this->hang=$value;
     }

   

   

    public function getImageFilename() {
        $image_filename = $this->hinhanh . '.png';
        return $image_filename;
    }

    public function getImagePath() {
        $image_path = '../images/' . $this->getImageFilename();
        return $image_path;
    }

    public function getImageAltText() {
        $image_alt = 'Image: ' . $this->getImageFilename();
        return $image_alt;
    }
}
?>