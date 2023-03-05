<?php
$members = [
  [
    "ma_ngdung" => '1',
    "ten_ngdung" => "nhac tru tinh",
    "email" => "abc@xyz.com"
  ],
  [
    "ma_ngdung" => '2',
    "ten_ngdung" => "nhac tru tinh",
    "email" => "abc@xyz.com"
  ],
];
?>

<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="..\style.css">
  <script src="../../bootstrap/js/bootstrap.min.js"></script>
  <script src="/CSE485_2023_BTTH02/btth02v2/assets/bootstrap/js/bootstrap.min.js"></script>
  <script src="/CSE485_2023_BTTH02/btth02v2/assets/font-awesome/brands.min.js"></script>
  <script src="/CSE485_2023_BTTH02/btth02v2/assets/font-awesome/fontawesome.min.js"></script>
  <script src="/CSE485_2023_BTTH02/btth02v2/assets/font-awesome/solid.min.js"></script>
  <title>Category</title>
</head>

<body>
  <?php include_once("./layouts/navbar.view.php") ?>
  <main class="container mt-5 mb-5">
    <div class="row">
      <div class="col-sm">
        <a href="edit_category.view.php?id=" class="btn btn-success">Thêm mới</a>
        <table class="table">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Tên người dùng</th>
              <th scope="col">Email</th>
              <th>Sửa</th>
              <th>Xóa</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $index = 1;
            foreach ($members as $member) : ?>
              <tr>
                <th scope="row"><?php global $index;
                                echo $index ?></th>
                <td><?php echo $member['ten_ngdung']; ?></td>
                <td><?php echo $member['email']; ?></td>
                <td>
                  <a href="edit_category.view.php?id=<?php echo $member['ma_ngdung'] ?>"><i class="fa-solid fa-pen-to-square"></i></a>
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

</?>