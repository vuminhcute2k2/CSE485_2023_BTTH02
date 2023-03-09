<?php
include("services/ArticleService.php");
include("services/AdminService.php");
class HomeController{
    // Hàm xử lý hành động index
    public function index(){
        // Nhiệm vụ 1: Tương tác với Services/Models
        $articleService = new ArticleService();
        $articles = $articleService->getAllArticles();
        // Nhiệm vụ 2: Tương tác với View
        $title = 'Trang chủ';
        include("views/home/index.php");
    }

    public function login(){
        include("views/home/login.php");
    }

    public function checkLogin() {
        $username = $_GET['username'] ?? '';
        $password = $_GET['password'] ?? '';

        if($username != '' and $password != '') {
            $adminService = new AdminService();
            if ($adminService->checkLogin($username, $password) !== NULL) {
                session_start();
                $_SESSION['LAST_ACTIVITY'] = time();
                // include("views/admin/index.php");
                header("Location: ?controller=admin");
            } else {
                $message = "Lỗi không đăng nhập được";
                $invalid = true;
                include("views/home/login.php");
            }
        } else {
            $message = "Lỗi không đăng nhập được";
            $invalid = true;
            include("views/home/login.php");
        }
    }

    public function logout() {
        session_start();
        if (isset($_SESSION['LAST_ACTIVITY'])) {
            session_destroy();
            header("Location: ?action=login");
        }
    }
}
?>