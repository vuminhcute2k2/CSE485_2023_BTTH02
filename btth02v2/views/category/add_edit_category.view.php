<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./category.css">
  <script src="/CSE485_2023_BTTH02/btth02v2/assets/bootstrap/js/bootstrap.min.js"></script>
  <script src="/CSE485_2023_BTTH02/btth02v2/assets/font-awesome/brands.min.js"></script>
  <script src="/CSE485_2023_BTTH02/btth02v2/assets/font-awesome/fontawesome.min.js"></script>
  <script src="/CSE485_2023_BTTH02/btth02v2/assets/font-awesome/solid.min.js"></script>
  <title>Category</title>
</head>

<body>
  <?php include_once("../layouts/navbar.view.php") ?>

  <main class="container mt-5 mb-5">
    <div class="row">
      <div class="col-sm">
        <h3 class="text-center text-uppercase fw-bold"><?php echo $id ? "Sửa thông tin" : "Thêm" ?> thể loại</h3>
        <?php include_once("../layouts/alert.view.php") ?>
        <form action="process_add_category.php" method="post">

          <div class="input-group mt-3 mb-3">
            <input type="text" class="form-control" name="ma_tloai" value=<?php echo $id ? $id : "" ?> readonly>
          </div>

          <div class="input-group mt-3 mb-3">
            <span class="input-group-text" id="lblCatName">Tên thể loại</span>
            <input type="text" class="form-control" name="ten_tloai" value=<?php echo $id ? $category->getTen_tloai() : "" ?>>
          </div>

          <div class="form-group  float-end ">
            <input type="submit" value="Lưu lại" class="btn btn-primary">
            <a href="/CSE485_2023_BTTH02/btth02v2/index.php?controller=category&action=index" class="btn btn-secondary ">Quay lại</a>
          </div>
        </form>
      </div>
    </div>
  </main>

  <?php include_once("./layouts/footer.view.php") ?>
</body>