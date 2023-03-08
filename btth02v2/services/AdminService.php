<?php
require_once("configs/DBConnection.php");
//include("models/Admin.php");
class AdminService {
    public function checkLogin($username, $password) {
        $db = new DBConnection();
        $conn = $db->getConnection();

        $sql = "SELECT * FROM user WHERE ten_dnhap = :ten_dnhap AND mat_khau = :mat_khau";
        $stmt = $conn->prepare($sql);
        $stmt->execute(['ten_dnhap' => $username, 'mat_khau' => $password]);
        $row = $stmt->fetch();

        $admin = new Admin($row['ten_dnhap'], $row['mat_khau']);
        return $admin;
    }

    public function getNumberOfArticles(){
        $dbConn = new DBConnection();
        $conn = $dbConn->getConnection();

        $sql = "SELECT COUNT(*) AS so_luong FROM baiviet";
        $stmt = $conn->query($sql);
        $num_of_articles = $stmt->fetch();
        return $num_of_articles;
    }

    public function getNumberOfUsers(){
        $dbConn = new DBConnection();
        $conn = $dbConn->getConnection();

        $sql = "SELECT COUNT(*) AS so_luong FROM user";
        $stmt = $conn->query($sql);
        $num_of_users = $stmt->fetch();
        return $num_of_users;
    }

    public function getNumberOfCategories(){
        $dbConn = new DBConnection();
        $conn = $dbConn->getConnection();

        $sql = "SELECT COUNT(*) AS so_luong FROM theloai";
        $stmt = $conn->query($sql);
        $num_of_categories = $stmt->fetch();
        return $num_of_categories;
    }

    public function getNumberOfAuthors(){
        $dbConn = new DBConnection();
        $conn = $dbConn->getConnection();

        $sql = "SELECT COUNT(*) AS so_luong FROM tacgia";
        $stmt = $conn->query($sql);
        $num_of_authors = $stmt->fetch();
        return $num_of_authors;
    }
}
?>