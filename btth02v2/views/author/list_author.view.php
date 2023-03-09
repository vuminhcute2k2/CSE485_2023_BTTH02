<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./author.css">
  <script src="../../bootstrap/js/bootstrap.min.js"></script>
  <script src="/CSE485_2023_BTTH02/btth02v2/assets/bootstrap/js/bootstrap.min.js"></script>
  <script src="/CSE485_2023_BTTH02/btth02v2/assets/font-awesome/brands.min.js"></script>
  <script src="/CSE485_2023_BTTH02/btth02v2/assets/font-awesome/fontawesome.min.js"></script>
  <script src="/CSE485_2023_BTTH02/btth02v2/assets/font-awesome/solid.min.js"></script>
  <title>Author</title>
</head>

<body>
  <?php include_once("./layouts/navbar.view.php") ?>
  <main class="container mt-5 mb-5">
    <div class="row">
      <div class="col-sm">
        <a href="CSE485_2023_BTTH02/btth02v2/index.php?controller=member&action=edit&id=" class="btn btn-success">Thêm mới</a>
        <table class="table">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Tên tác giả</th>
              <th scope="col">Hình tác giả </th>
              <th>Sửa</th>
              <th>Xóa</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $index = 1;
            foreach ($authors as $author) : ?>
              <tr>
                <th scope="row"><?php global $index;
                                echo $index ?></th>
                <td><?php echo $author->getTen_tgia(); ?></td>
                <td><?php echo $author->getHinh_tgia(); ?></td>
                <td>
                  <a href=/CSE485_2023_BTTH02/btth02v2/index.php?controller=member&action=edit&id=<?php echo $category->getMa_tgia() ?>><i class="fa-solid fa-pen-to-square"></i></a>
                </td>
                <td>
                  <a href=""><i class="fa-solid fa-trash"></i></a>
                </td>
              </tr>
            <?php $index++;
            endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </main>
  <?php include_once("./layouts/footer.view.php") ?>
</body>

</html>