<?php
// include("configs/DBConnection.php");
include("services/AdminService.php");
class AdminController {
    public function __construct()
    {
        include("configs/session.php");
    }
    public function index() {
        $adminService = new AdminService();
        $num_of_users = $adminService->getNumberOfUsers();
        $num_of_categories = $adminService->getNumberOfCategories();
        $num_of_authors = $adminService->getNumberOfAuthors();
        $num_of_articles = $adminService->getNumberOfArticles();

        $title = 'Admin';
        include("views/admin/index.php");
    }
    
    public function author() {
        include("views/admin/author/list_author.php");
    }

    public function sessionCheck() {
        session_start();
        if (!isset($_SESSION['LAST_ACTIVITY'])) {
            $message = "Đăng nhập để vào trang admin";
            $invalid = true;
            include("views/home/login.php");
            exit;
        } else {
            if ((time() - $_SESSION['LAST_ACTIVITY'] > 60)) {
                $message = "Đã hết thời gian làm việc vui lòng đăng nhập";
                $invalid = true;
                include("views/home/login.php");
                exit;
            } else {
                $_SESSION['LAST_ACTIVITY'] = time();
            }
        }
    }
}

