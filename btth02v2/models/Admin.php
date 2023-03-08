<?php 
class Admin{
    private $ten_dnhap;
    private $mat_khau;

    public function __construct($ten_dnhap, $mat_khau){
        $this->ten_dnhap = $ten_dnhap;
        $this->mat_khau = $mat_khau;
    }

    public function getTen_dnhap()
    {
        return $this->ten_dnhap;
    }

    public function setTen_dnhap($ten_dnhap)
    {
        $this->ten_dnhap = $ten_dnhap;

        return $this;
    }

    public function getMat_khau()
    {
        return $this->mat_khau;
    }
 
    public function setMat_khau($mat_khau)
    {
        $this->mat_khau = $mat_khau;

        return $this;
    }
}
?>