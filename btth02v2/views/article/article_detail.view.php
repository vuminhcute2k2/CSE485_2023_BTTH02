<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./article.css">
  <script src="/CSE485_2023_BTTH02/btth02v2/assets/bootstrap/js/bootstrap.min.js"></script>
  <script src="/CSE485_2023_BTTH02/btth02v2/assets/font-awesome/brands.min.js"></script>
  <script src="/CSE485_2023_BTTH02/btth02v2/assets/font-awesome/fontawesome.min.js"></script>
  <script src="/CSE485_2023_BTTH02/btth02v2/assets/font-awesome/solid.min.js"></script>
  <title>Sign in</title>
</head>

<body>
  <?php include_once("../layouts/navbar.view.php") ?>

  <main class="container mt-5">

    <div class="row mb-5">
      <div class="col-sm-4">
        <img src="<?php echo $articleDetail->getHinhAnh ?>" class="img-fluid" alt="articleImage">
      </div>
      <div class="col-sm-8">
        <h5 class="card-title mb-2">
          <a href="" class="text-decoration-none"></a>
        </h5>
        <p class="card-text"><span class=" fw-bold">Bài hát: </span><?php echo $title ?></p>
        <p class="card-text"><span class=" fw-bold">Thể loại: </span><?php echo $nameAC['theloai']; ?></p>
        <p class="card-text"><span class=" fw-bold">Tóm tắt: </span><?php echo $articleDetail->getTomTat() ?></p>
        <p class="card-text"><span class=" fw-bold">Nội dung: </span><?php echo $articleDetail->getNoiDung() ?></p>
        <p class="card-text"><span class=" fw-bold">Tác giả: </span><?php echo $nameAC['tacgia'] ?></p>

      </div>
    </div>
  </main>
</body>

</html>