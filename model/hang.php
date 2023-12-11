<?php 
class hang{
private $idhang, $tenhang;

function __construct(){
$this->idhang=0;
$this->tenhang='';


}


public function getidhang(){
return $this->idhang;
}
public function setidhang($value){
   $this->idhang=$value;
    }

    public function gettenhang(){
        return $this->tenhang;
        }
        public function settenhang($value){
           $this->tenhang=$value;
            }


}


?> 