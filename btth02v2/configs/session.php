<?php
session_start();
if (!isset($_SESSION['LAST_ACTIVITY'])) {
    $message = "Đăng nhập để vào trang admin";
    $invalid = true;
    // session_unset('LAST_ACTIVITY');
    session_destroy();
    include("views/home/login.php");
    // header("Location: ?controller=login");
    exit;
} else {
    if ((time() - $_SESSION['LAST_ACTIVITY'] > 60)) {
        $message = "Đã hết thời gian làm việc vui lòng đăng nhập";
        $invalid = true;
        session_destroy();
        header("Location: ?action=login");
        exit;
    } else {
        $_SESSION['LAST_ACTIVITY'] = time();
    }
}
?>