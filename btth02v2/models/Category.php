<?php
class Category{
    // Thuộc tính

    private $MATL;
    private $TENTL;
    


    public function __construct($MATL, $TENTL){
        $this->MATL = $MATL;
        $this->TENTL = $TENTL;
        
    }

    // Setter và Getter
    public function getMATL(){
        return $this->MATL;
    }
    public function setMATL($newMATL){
        return $this->MATL = $MATL;
    }
    public function getTENTL(){
        return $this->TENTL;
    }
    public function setTENTL($newTENTL){
        return $this->TENTL = $TENTL;
    }
}
