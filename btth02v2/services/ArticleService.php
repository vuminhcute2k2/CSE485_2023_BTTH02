<?php
require_once("configs/DBConnection.php");
include("models/Article.php");
class ArticleService{
    public function getAllArticles(){
        $dbConn = new DBConnection();
        $conn = $dbConn->getConnection();

        $sql = "SELECT bv.ma_bviet, bv.tieude, bv.ten_bhat, bv.hinhanh, bv.tomtat, bv.noidung, bv.ngayviet,
                        tg.ten_tgia     AS tacgia, tg.ma_tgia,
                        tl.ten_tloai    AS theloai, tl.ma_tloai
                    FROM baiviet        AS bv
                    INNER JOIN tacgia   AS tg ON bv.ma_tgia = tg.ma_tgia
                    INNER JOIN theloai  AS tl ON bv.ma_tloai = tl.ma_tloai
                    ORDER BY bv.ma_bviet;";
        $stmt = $conn->query($sql);

        $articles = [];
        while($row = $stmt->fetch()){
            $article = new Article($row['ma_bviet'], $row['tieude'], $row['ten_bhat'], $row['tomtat'], $row['noidung'], $row['ngayviet'], $row['ma_tloai'], $row['ma_tgia'], $row['hinhanh']);
            array_push($articles, $article);
        }
        return $articles;
    }

    public function getArticleDetail($id){
        $dbConn = new DBConnection();
        $conn = $dbConn->getConnection();

        $sql = "SELECT bv.ma_bviet, bv.tieude, bv.ten_bhat, bv.tomtat, bv.noidung, bv.hinhanh, bv.ngayviet,
                        tg.ten_tgia     AS tacgia, tg.ma_tgia,
                        tl.ten_tloai    AS theloai, tl.ma_tloai
                    FROM baiviet        AS bv
                    INNER JOIN tacgia   AS tg ON bv.ma_tgia = tg.ma_tgia
                    INNER JOIN theloai  AS tl ON bv.ma_tloai = tl.ma_tloai
                    WHERE bv.ma_bviet = :id;";
        $stmt = $conn->prepare($sql);
        $stmt->execute(['id' => $id]);
        $article = $stmt->fetch();
        
        $articleDetail = new Article($article['ma_bviet'], $article['tieude'], $article['ten_bhat'], $article['tomtat'], $article['noidung'], $article['ngayviet'], $article['ma_tloai'], $article['ma_tgia'], $article['hinhanh']);
        return $articleDetail;
    }

    public function getNameAuthorAndCategory($id){
        $dbConn = new DBConnection();
        $conn = $dbConn->getConnection();

        $sql = "SELECT tg.ten_tgia     AS tacgia, 
                       tl.ten_tloai    AS theloai
                FROM baiviet           AS bv
                INNER JOIN tacgia      AS tg ON bv.ma_tgia = tg.ma_tgia
                INNER JOIN theloai     AS tl ON bv.ma_tloai = tl.ma_tloai
                WHERE bv.ma_bviet = :id;";

        $stmt = $conn->prepare($sql);
        $stmt->execute(['id' => $id]);
        $nameAC = $stmt->fetch();
        return $nameAC;
    }

    public function insertArticle($arguments){
        $dbConn = new DBConnection();
        $conn = $dbConn->getConnection();

        $sql = "INSERT INTO baiviet(tieude, ten_bhat, tomtat, noidung, ma_tgia, ma_tloai, hinhanh)
                    VALUES (:tieude, :ten_bhat, :tomtat, :noidung, :ma_tgia, :ma_tloai, :hinhanh)";

        $stmt = $conn->prepare($sql);
        $stmt->execute($arguments);
    }

    public function updateArticle($arguments){
        $dbConn = new DBConnection();
        $conn = $dbConn->getConnection();

        $sql = "UPDATE baiviet 
                SET tieude = :tieude, ten_bhat = :ten_bhat, tomtat = :tomtat, noidung = :noidung,
                    ma_tgia = :ma_tgia, ma_tloai = :ma_tloai, hinhanh = :hinhanh
                WHERE ma_bviet = :ma_bviet";
        $stmt = $conn->prepare($sql);
        $stmt->execute($arguments);
    }

    public function deleteArticle($id){
        $dbConn = new DBConnection();
        $conn = $dbConn->getConnection();

        $sql = "DELETE FROM baiviet
                    WHERE ma_bviet = " . $id . ";";
        $stmt = $conn->query($sql);
    }
}