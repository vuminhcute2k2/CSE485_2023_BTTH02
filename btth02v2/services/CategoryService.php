<?php
require_once("configs/DBConnection.php");
include("models/Category.php");
class CategoryService
{
    public function getAllCategory()
    {
        $dbConn = new DBConnection();
        $conn = $dbConn->getConnection();

        $sql = "SELECT * FROM theloai;";
        $stmt = $conn->query($sql);

        $categories = [];
        while($row = $stmt->fetch()){
            $category = new Category($row['ma_tloai'], $row['ten_tloai'], $row['SLBaiViet']);
            array_push($categories, $category);
        }
        
        return $categories;
    }

    public function getCategoryDetail($id){
        $dbConn = new DBConnection();
        $conn = $dbConn->getConnection();

        $sql = "SELECT ma_tloai, ten_tloai, SLBaiViet FROM theloai WHERE ma_tloai = :ma_tloai;";
        $stmt = $conn->prepare($sql);
        $stmt->execute(['ma_tloai' => $id]);

        $row = $stmt->fetch();
        $category = new Category($row['ma_tloai'], $row['ten_tloai'], $row['SLBaiViet']);
        return $category;
    }

    public function updateCategory($arguments)
    {
        $dbConn = new DBConnection();
        $conn = $dbConn->getConnection();

        $sql = "UPDATE theloai 
                    SET ten_tloai = :ten_tloai
                    WHERE ma_tloai = :ma_tloai";
        $stmt = $conn->prepare($sql);
        $stmt->execute($arguments);
    }

    public function insertCategory($arguments)
    {
        $dbConn = new DBConnection();
        $conn = $dbConn->getConnection();

        $sql = "INSERT INTO theloai(ten_tloai)
                    VALUES(:ten_tloai);";
        $stmt = $conn->prepare($sql);
        $stmt->execute($arguments);
    }

    public function deleteCategory($id)
    {
        $dbConn = new DBConnection();
        $conn = $dbConn->getConnection();
        
        $sql = "DELETE FROM theloai WHERE ma_tloai = " . $id . ";";
        $stmt = $conn->query($sql);
    }
}
?>