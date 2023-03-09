<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./">
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
                <a href="/CSE485_2023_BTTH02/btth02v2/index.php?controller=article&action=add_edit&id=" class="btn btn-success">Thêm mới</a>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Tiêu đề</th>
                            <th scope="col">Tên bài hát</th>
                            <th scope="col">Ngày viết</th>
                            <th scope="col">Hình ảnh</th>
                            <th>Sửa</th>
                            <th>Xóa</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $index = 1;
                        foreach ($articles as $article) : ?>
                            <tr>
                                <th scope="row"><?php global $index;
                                                echo $index ?></th>
                                <td><?php echo $article->getTieude(); ?></td>
                                <td><?php echo $article->getTen_bhat(); ?></td>
                                <td><?php echo $article->getNgayviet(); ?></td>
                                <td><?php echo $article->get_hinhanh(); ?></td>
                                <td>
                                    <a href="/CSE485_2023_BTTH02/btth02v2/index.php?controller=article&action=add_edit&id=<?php echo $article->getMa_bviet() ?>"><i class="fa-solid fa-pen-to-square"></i></a>
                                </td>
                                <td>
                                    <a href="/CSE485_2023_BTTH02/btth02v2/index.php?controller=article&action=delete&id=<?php echo $article->getMa_bviet() ?>"><i class="fa-solid fa-trash"></i></a>
                                </td>
                            </tr>
                        <?php $index++;
                        endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </main>
</body>

</html>