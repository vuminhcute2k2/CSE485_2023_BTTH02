<?php
require("services/MemberService.php");
class MemberController {
    private $memberService;
    public function __construct()
    {
        $this->memberService = new MemberService();
    }

    public function index() {
        $authors = $this->memberService->getAllMembers();
        include("views/author/list_author.php");
    }

    public function add() {
        require 'configs/functions.php';
        require 'configs/validate.php';

        $uploads = 'assets' . DIRECTORY_SEPARATOR . 'images' . DIRECTORY_SEPARATOR . 'authors' . DIRECTORY_SEPARATOR;
        $file_types      = ['image/jpeg', 'image/png', 'image/gif'];
        $file_extensions = ['jpg', 'jpeg', 'png', 'gif'];
        $max_size        = '5242880'; // 5 MB
        $temp   = $_FILES['hinh_tgia']['tmp_name'] ?? '';
        $destination = ''; //Nơi lưu trữ file

        $name_author_error = $image_author_error = $warning = '';
        $name_author = $image_author = '';

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if ($_FILES['hinh_tgia']['error'] === 0) {
                $image_author_error = in_array(mime_content_type($temp), $file_types) ? '' : 'Sai loại file';
                $extension          = strtolower(pathinfo($_FILES['hinh_tgia']['name'], PATHINFO_EXTENSION));
                $image_author_error = in_array($extension, $file_extensions) ? '' : 'Sai phần mở rộng của file';
                $image_author_error = ($_FILES['hinh_tgia']['size'] <= $max_size) ? '' : 'Kích cỡ file quá lớn';


                if ($image_author_error === '') {
                    $image_author = create_filename($_FILES['hinh_tgia']['name'], $uploads);
                    $destination = $uploads . $image_author;
                }

                $name_author        = $_POST['ten_tgia'];
                $name_author_error  = is_text($name_author, 1, 30) ? '' : 'Tên tác giả phải chứa 1 - 30 kí tự';

                $invalid = $name_author_error && $image_author_error;
                if ($invalid) {
                    $warning = 'Hãy thêm đầy đủ thông tin';
                    include("views/author/add_author.php");
                    exit;
                } else {
                    $save = $this->memberService->create($name_author, $image_author);
                    if ($save) {
                        move_uploaded_file($temp, $destination);
                        redirect('?controller=member', ['success' => 'Đã lưu thành công']);
                    } else {
                        redirect('?controller=member', ['failure' => 'Lưu không thành công']);
                    }
                }
            }
        }
        include("views/author/add_author.php");
    }   
    
    public function edit() {

    }

    public function delete() {

    }
}
?>