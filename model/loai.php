<?php
class loai {
    private $idloai;
    private $tenloai;

    public function __construct() {
        $this->idloai = 0;
        $this->tenloai = '';
    }

    public function getidloai() {
        return $this->idloai;
    }

    public function setidloai($value) {
        $this->idloai = $value;
    }

    public function gettenloai() {
        return $this->tenloai;
    }

    public function settenloai($value) {
        $this->tenloai = $value;
    }
}
?>