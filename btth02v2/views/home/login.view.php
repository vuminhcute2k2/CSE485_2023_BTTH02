<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../style.css">
  <script src="..\..\bootstrap\js\bootstrap.min.js"></script>
  <script defer src="../../fa-icons/brands.min.js"></script>
  <script defer src="../../fa-icons/fontawesome.min.js"></script>
  <script defer src="../../fa-icons/solid.min.js"></script>
  <title>Sign in</title>
</head>

<body>
  <?php include_once("../layouts/navbar.view.php") ?>

  <main class="container mt-5 mb-5">
    <div class="row sign-in">
      <div class="col-sm">
        <h3 class="text-center text-uppercase fw-bold mb-5">Đăng nhập</h3>
        <div class="p-5 border border-primary-subtle rounded">
          <form class="border-bottom pb-3" action="process_add_category.php" method="get">

            <div class="input-group mt-3 mb-3">
              <span class="input-group-text" id="lblCatName"><i class="fa-solid fa-user"></i></span>
              <input type="text" class="form-control" name="username" placeholder="Tên người dùng - email">
            </div>
            <div class="input-group mt-3 mb-3">
              <span class="input-group-text" id="lblCatName"><i class="fa-solid fa-lock"></i></span>
              <input type="password" class="form-control" name="password" placeholder="Mật khẩu">
            </div>

            <div class="form-group ">
              <input type="submit" value="Đăng nhập" class="btn btn-primary">
            </div>

          </form>
          <div class="text-primary float-end mt-2 "><a href="#">Đăng ký tài khoản</a></div>

        </div>
      </div>
    </div>
  </main>
</body>

</html>