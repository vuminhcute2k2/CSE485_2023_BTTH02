-- a. Liệt kê các bài viết về các bài hát thuộc thể loại Nhạc trữ tình 
SELECT baiviet.ma_bviet, baiviet.tieude, baiviet.ten_bhat, baiviet.ma_tloai, baiviet.tomtat, baiviet.noidung, baiviet.ma_tgia, baiviet.hinhanh 
from baiviet
LEFT JOIN theloai on theloai.ma_tloai=baiviet.ma_tloai
WHERE theloai.ten_tloai LIKE "Nhac tru tinh";

-- b. Liệt kê các bài viết của tác giả “Nhacvietplus”
SELECT baiviet.ma_bviet, baiviet.tieude, baiviet.ten_bhat, baiviet.ma_tloai, baiviet.tomtat, baiviet.noidung, baiviet.ma_tgia, baiviet.hinhanh 
from baiviet
LEFT JOIN tacgia on tacgia.ma_tgia=baiviet.ma_tgia
WHERE tacgia.ten_tgia = "Nhacvietplus";

-- c. Liệt kê các thể loại nhạc chưa có bài viết cảm nhận nào
SELECT ten_tloai FROM theloai WHERE ma_tloai Not IN (SELECT ma_tloai FROM baiviet);

-- d. Liệt kê các bài viết với các thông tin sau: mã bài viết, tên bài viết, tên bài hát, tên tác giả, tên 
-- thể loại, ngày viết.
select baiviet.ma_bviet,baiviet.tieude, baiviet.ten_bhat, tacgia.ten_tgia, theloai.ten_tloai, baiviet.ngayviet
FROM baiviet
INNER JOIN tacgia on tacgia.ma_tgia = baiviet.ma_tgia 
INNER JOIN theloai on theloai.ma_tloai = baiviet.ma_tloai

-- e. Tìm thể loại có số bài viết nhiều nhất
SELECT theloai.ten_tloai FROM theloai
INNER JOIN baiviet on baiviet.ma_tloai = theloai.ma_tloai
GROUP BY baiviet.ma_tloai
ORDER BY COUNT(baiviet.ma_tloai) DESC LIMIT 1;

--f. Liệt kê 2 tác giả có số bài viết nhiều nhất
SELECT tacgia.ma_tgia,tacgia.ten_tgia from baiviet,tacgia
WHERE tacgia.ma_tgia = baiviet.ma_tgia 
GROUP BY baiviet.ma_tgia
ORDER BY COUNT(baiviet.ma_tgia) DESC LIMIT 2;

-- g. Liệt kê các bài viết về các bài hát có tựa bài hát chứa 1 trong các từ “yêu”, “thương”, “anh”,“em”

SELECT * from baiviet 
WHERE ten_bhat LIKE '%yêu%' OR ten_bhat LIKE '%thương%' OR ten_bhat LIKE '%anh%' OR ten_bhat LIKE '%em%';

--h. Liệt kê các bài viết về các bài hát có tiêu đề bài viết hoặc tựa bài hát chứa 1 trong các từ 
--“yêu”, “thương”, “anh”, “em”
SELECT *
FROM baiviet
WHERE tieude LIKE '%yêu%'
  OR tieude LIKE '%anh%'
    OR tieude LIKE '%em%'
    OR tieude LIKE '%thương%';
    
    
-- i. Tạo 1 view có tên vw_Music để hiển thị thông tin về Danh sách các bài viết kèm theo Tên 
-- thể loại và tên tác giả
CREATE VIEW vw_Music AS

SELECT baiviet.ma_bviet, baiviet.tieude, baiviet.ten_bhat, baiviet.tomtat, baiviet.noidung, baiviet.ngayviet, theloai.ten_tloai, tacgia.ten_tgia
FROM baiviet
INNER JOIN theloai on theloai.ma_tloai = baiviet.ma_tloai
INNER JOIN tacgia on tacgia.ma_tgia = baiviet.ma_tgia

-- j. Tạo 1 thủ tục có tên sp_DSBaiViet với tham số truyền vào là Tên thể loại và trả về danh sách 
-- Bài viết của thể loại đó. Nếu thể loại không tồn tại thì hiển thị thông báo lỗi.
DELIMITER $$
DROP PROCEDURE IF EXISTS `sp_DSBaiViet`$$
CREATE PROCEDURE sp_DSBaiViet(IN ten_tloai varchar(50))
BEGIN
    SELECT * from baiviet
    INNER JOIN theloai on theloai.ma_tloai = baiviet.ma_tloai
    WHERE theloai.ten_tloai LIKE ten_tloai; 
    
END; $$

CALL sp_DSBaiViet('Nhạc trẻ');

-- l. Bổ sung thêm bảng Users để lưu thông tin Tài khoản đăng nhập và sử dụng cho chức năng 
-- Đăng nhập/Quản trị trang web.

CREATE TABLE `user` (
  `ma_ngdung` int(10) UNSIGNED NOT NULL,
  `ten_dnhap` varchar(30) NOT NULL,
  `mat_khau` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`ma_ngdung`, `ten_dnhap`, `mat_khau`) VALUES
(1, 'damvuong', '123456'),
(2, 'nguyenmanhtien', '456789');







