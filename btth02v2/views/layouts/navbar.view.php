<?php
$file = $_SERVER["SCRIPT_NAME"];

$isAuthor = ($file == "/cse485_2023/views/admin/author.view.php")
  || ($file == "/cse485_2023/views/admin/edit_author.view.php");

$isCategory = ($file == "/cse485_2023/views/admin/category.view.php")
  || ($file == "/cse485_2023/views/admin/edit_category.view.php");

$isArticle = ($file == "/cse485_2023/views/admin/article.view.php")
  || ($file == "/cse485_2023/views/admin/edit_article.view.php");

$isHome = ($file == "/CSE485_2023_BTTH02/btth02v2/views/home/index.php");
$isLogged = false;

?>

<!-- <ul>
  <li><a href="./index.php">Trang chủ</a></li>
  <li><a href="./index.php?controller=article&action=list">Bài viết</a></li>
</ul> -->

<nav class="navbar navbar-expand-lg bg-body-tertiary shadow p-3 bg-white rounded">
  <div class="container-fluid">
    <div class="h3">
      <a class="navbar-brand text-primary text-uppercase" href="/CSE485_2023_BTTH02/btth02v2/views/home/index.php">Music</a>
    </div>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link <?php echo $isHome ? "active fw-bold" : '' ?>" aria-current="page" href="/CSE485_2023_BTTH02/btth02v2/views/home/index.php">Trang chủ</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../client/index.view.php"><?php echo $isLogged ? 'Đăng nhập' : 'Đăng xuất' ?></a>
        </li>
        <?php if ($isLogged) : ?>
          <li class="nav-item">
            <a class="nav-link <?php echo $isCategory ? "active fw-bold" : '' ?>" href="/CSE485_2023_BTTH02/btth02v2/views/home/index.php?controller=category">Thể loại</a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?php echo $isAuthor ? "active fw-bold" : '' ?>" href="author.view.php">Tác giả</a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?php echo $isArticle ? "active fw-bold" : '' ?>" href="article.view.php">Bài viết</a>
          </li>
        <?php endif; ?>
      </ul>
    </div>
  </div>
</nav>