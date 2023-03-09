<?php
include('configs/functions.php');
include('configs/validate.php');
include('services/ArticleService.php');
class ArticleController{
    // Hàm xử lý hành động index
    public function index(){
        $title = "Bài viết";

        $articleService = new ArticleService();
        $articles = $articleService->getAllArticles();
        $success = $_GET['success'] ?? null;
        $failure = $_GET['failure'] ?? null;

        include("views/article/list_article.php");
    }

    public function add_edit(){
        $title = 'Sửa bài viết';

        $uploads = 'assets' . DIRECTORY_SEPARATOR . 'images' . DIRECTORY_SEPARATOR . 'songs'. DIRECTORY_SEPARATOR;
        $file_types      = ['image/jpeg', 'image/png', 'image/gif'];
        $file_extensions = ['jpg', 'jpeg', 'png', 'gif'];
        $max_size        = '5242880';  

        $id     = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
        $temp   = $_FILES['image']['tmp_name'] ?? '';
        $destination = ''; //Nơi lưu trữ file

        $dbConn = new DBConnection();
        $conn = $dbConn->getConnection();
        $articleService = new ArticleService();
        $article = new Article($id, '', '', '', '', '', '', '', '');

        $errors = [
            'warning'   => '',
            'tieude'    => '',
            'ten_bhat'  => '',
            'tomtat'    => '',
            'noidung'   => '',
            'tacgia'    => '',
            'theloai'   => '',
            'hinhanh'   => '',
        ];

        if($id){
            $article = $articleService->getArticleDetail($id);
            
            if(!$article){
                redirect('?controller=article&failure=Không+tìm+thấy+bài+viết');
            }
        }

        $saved_image = $article->getHinhanh() ? true : false;

        $sql        = "SELECT ma_tgia, ten_tgia FROM tacgia";
        $stmt = $conn->query($sql);
        $authors    = $stmt->fetchAll();

        $sql        = "SELECT ma_tloai, ten_tloai FROM theloai";
        $stmt = $conn->query($sql);
        $categories = $stmt->fetchAll();

        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            // $errors['hinhanh'] = ($temp === '' and $_FILES['image']['error'] === 1) ? 'Kích cỡ file quá lớn' : '';

            if($temp and $_FILES['image']['error'] === 0){
                $errors['hinhanh'] = in_array(mime_content_type($temp), $file_types) ? '' : 'Sai loại file';
                $extension = strtolower(pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION));
                $errors['hinhanh'] .= in_array($extension, $file_extensions) ? '' : 'Sai phần mở rộng của file';
                $errors['hinhanh'] .= ($_FILES['image']['size'] <= $max_size) ? '' : 'Kích cỡ file quá lớn';

                if($errors['hinhanh'] === ''){
                    $article->setHinhanh(create_filename($_FILES['image']['name'], $uploads));//tên không trùng lặp trên kho
                    $destination = $uploads . $article->getHinhanh();
                }
            }

            $article->setTieude($_POST['tieude']);
            $article->setTen_bhat($_POST['ten_bhat']);
            $article->setTomtat($_POST['tomtat']);
            $article->setNoidung($_POST['noidung']);
            $article->setMa_tgia($_POST['ma_tgia']);
            $article->setMa_tloai($_POST['ma_tloai']);

            $errors['tieude']    = is_text($article->getTieude(), 1, 80) ? '' : 'Tiêu đề phải chứa 1 - 80 kí tự';
            $errors['ten_bhat']  = is_text($article->getTen_bhat(), 1, 80) ? '' : 'Tên bài hát phải chứa 1 - 80 kí tự';
            $errors['tomtat']    = is_text($article->getTomtat(), 1, 500) ? '' : 'Tóm tắt phải chứa từ 1 - 500 kí tự';
            $errors['noidung']   = is_text($article->getNoidung(), 1, 100000) ? '' : 'Nội dung phải chứa từ 1 - 100,000 kí tự';
            $errors['tacgia']    = is_author_id($article->getMa_tgia(), $authors) ? '' : 'Vui lòng chọn tác giả';
            $errors['theloai']   = is_category_id($article->getMa_tloai(), $categories) ? '' : 'Vui lòng chọn thể loại';

            $invalid = implode($errors);

            if($invalid){
                $errors['warning'] = 'Hãy sửa các lỗi ở trên';
            } 
            else{
                $arguments = [
                    'ma_bviet'  => $article->getMa_bviet(),
                    'tieude'    => $article->getTieude(),
                    'ten_bhat'  => $article->getTen_bhat(),
                    'tomtat'    => $article->getTomtat(),
                    'noidung'   => $article->getNoidung(),
                    'ma_tgia'   => $article->getMa_tgia(),
                    'ma_tloai'  => $article->getMa_tloai(),
                    'hinhanh'   => $article->getHinhanh()
                ];
                if($id){
                    $articleService->updateArticle($arguments);
                }
                else{
                    unset($arguments['ma_bviet']);
                    $articleService->insertArticle($arguments);
                }
                move_uploaded_file($temp, $destination);
                redirect('?controller=article&success=Đã+lưu+bài+viết');
            }
            if($saved_image != $article->getHinhanh()){
                $article->setHinhanh('');
            }
        }
                include("views/article/add_edit_article.php");
    }

    public function delete(){
        $title = "Xóa bài viết";

        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
        if(!$id){
            redirect('?controller=article&failure=Không+tìm+thấy+bài+viết');
        }

        $article = false;
        $articleService = new ArticleService();
        $article = $articleService->getArticleDetail($id);
        if(!$article){
            redirect('?controller=article&failure=Không+tìm+thấy+bài+viết');
        }

        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $articleService->deleteArticle($id);
            redirect('?controller=article&success=Đã+xóa+bài+viết');
        }
        include("views/article/delete_article.php");
    }

    public function detail(){
        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
        if(!$id){
            die('<h1>Không có bài viết này!</h1>');
        }

        $articleService = new ArticleService();
        $articleDetail = $articleService->getArticleDetail($id);
        if(!$articleDetail){
            die('<h1>Không có bài viết này!</h1>');
        }

        $nameAC = $articleService->getNameAuthorAndCategory($id);

        $title = $articleDetail->getTen_bhat();
        include('views/article/article_detail.php');
    }
}
?>