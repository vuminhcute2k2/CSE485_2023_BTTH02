<?php
class author{
    // Thuộc tính

    private $MATG;
    private $TENTG;
    private $HINHTG;


    public function __construct($MATG, $TENTG,$HINHTG){
        $this->MATG = $MATG;
        $this->TENTG = $TENTG;
        $this->HINHTG = $HINHTG;
    }

    // Setter và Getter
    public function getMATG(){
        return $this->MATG;
    }
    public function setMATG($newMATG){
        return $this->MATG = $newMATG;
    }
    public function getTENTG(){
        return $this->TENTG;
    }
    public function setTENTG($newTENTG){
        return $this->TENTG = $newTENTG;
    }
    public function getHINHTG(){
        return $this->HINHTG;
    }
    public function setHINHTG($newHINHTG){
        return $this->HINHTG = $newHINHTG;
    }
}