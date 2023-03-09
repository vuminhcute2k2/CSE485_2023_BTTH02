<?php
$currPage = $_GET["controller"];

$isAuthor = $currPage === 'author';

$isCategory = $currPage == 'category';

$isArticle = $currPage === 'article';

$isHome = $currPage === 'home';
$isLogged = false;

?>
<nav class="navbar navbar-expand-lg bg-body-tertiary shadow p-3 bg-white rounded">
  <div class="container-fluid">
    <div class="h3">
      <a class="navbar-brand text-primary text-uppercase" href="/CSE485_2023_BTTH02/btth02v2/index.php?controller=home&action=index">Music</a>
    </div>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link <?php echo $isHome ? "active fw-bold" : '' ?>" aria-current="page" href="/CSE485_2023_BTTH02/btth02v2/index.php?controller=home&action=index">Trang chủ</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#"><?php echo $isLogged ? 'Đăng nhập' : 'Đăng xuất' ?></a>
        </li>
        <?php if ($isLogged) : ?>
          <li class="nav-item">
            <a class="nav-link <?php echo $isCategory ? "active fw-bold" : '' ?>" href="/CSE485_2023_BTTH02/btth02v2/index.php?controller=category&action=index">Thể loại</a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?php echo $isAuthor ? "active fw-bold" : '' ?>" href="/CSE485_2023_BTTH02/btth02v2/index.php?controller=author&action=index">Tác giả</a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?php echo $isArticle ? "active fw-bold" : '' ?>" href="/CSE485_2023_BTTH02/btth02v2/index.php?controller=article&action=index">Bài viết</a>
          </li>
        <?php endif; ?>
      </ul>
    </div>
  </div>
</nav>