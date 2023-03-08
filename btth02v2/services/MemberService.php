<?php
require_once("configs/DBConnection.php");
include ("models/Member.php");
class MemberService {
    private $conn = null;
    public function __construct()
    {
        $db = new DBConnection();
        $this->conn = $db->getConnection();
    }

    public function getAllMembers() {
        $sql = "SELECT * FROM tacgia";
        $stmt = $this->conn->query($sql);

        $members = [];
        while($row = $stmt->fetch()) {
            $member = new Member($row['ma_tgia'], $row['ten_tgia'], $row['hinh_tgia']);
            array_push($members, $member);
        }
        return $members;
    }

    public function getMemberById($ma_tgia) {
        $sql = "SELECT * FROM tacgia WHERE ma_tgia = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(1, $ma_tgia);
        $stmt->execute();
        $row = $stmt->fetch();
        $member = new Member($row['ma_tgia'], $row['ten_tgia'], $row['hinh_tgia']);
        return $member;
    }

    public function create($ten_tgia, $hinh_tgia) {
        $sql = "INSERT INTO tacgia (ten_tgia, hinh_tgia) VALUES (?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(1, $ten_tgia);
        $stmt->bindParam(2, $hinh_tgia);
        return $stmt->execute();
    }

    public function edit($ma_tgia, $ten_tgia, $hinh_tgia){
        $sql = "UPDATE tacgia SET ten_tgia = ?, hinh_tgia = ? WHERE ma_tgia = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(1, $ten_tgia);
        $stmt->bindParam(2, $hinh_tgia);
        $stmt->bindParam(3, $ma_tgia);
        return $stmt->execute();
    }

    public function delete($ma_tgia){
        $sql = "DELETE FROM tacgia WHERE ma_tgia = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(1, $ma_tgia);
        return $stmt->execute();
    }
}
