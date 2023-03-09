<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./article.css">
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
                <h3 class="text-center text-uppercase fw-bold"><?php echo $id ? "Sửa thông tin" : "Thêm" ?> bài viết</h3>

                <?php include_once("../layouts/arlert.view.php"); ?>
                <form action="process_edit_add_category.php" method="post">

                    <div class="input-group mt-3 mb-3">
                        <input type="text" class="form-control" name="ma_bviet" value=<?php echo $id ? $id : "" ?>>
                    </div>
                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text" id="lblIndex">Tiêu đề</span>
                        <input type="text" class="form-control" name="tieude" value=<?php echo $id ? $article->getTieude() : "" ?>>
                    </div>
                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text" id="lblSongName">Tên bài hát</span>
                        <input type="text" class="form-control" name="ten_bhat" value=<?php echo $id ? $article->getTen_bhat() : "" ?>>
                    </div>
                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text" id="lblSum">Tóm tắt</span>
                        <textarea type="text" class="form-control" name="tomtat" value=<?php echo $id ? $article->getTomtat() : "" ?>></textarea>
                    </div>
                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text" id="lblContent">Nội dung</span>
                        <textarea type="text" class="form-control" name="noidung" value=<?php echo $id ? $article->getNoidung() : "" ?>></textarea>
                    </div>
                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text" id="lblAuthor">Tác giả</span>
                        <textarea type="text" class="form-control" name="ma_tgia" value=<?php echo $id ? $article->getMa_tacgia() : "" ?>></textarea>
                    </div>
                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text" id="lblCate">Thể loại </span>
                        <textarea type="text" class="form-control" name="ma_tloai" value=<?php echo $id ? $article->getMa_tloai() : "" ?>></textarea>
                    </div>
                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text" id="lblAuthor">Hình ảnh</span>
                        <input type="file" accept="image/png, image/jpeg" class="form-control" name="hinhanh">
                    </div>

                    <div class="form-group float-end ">
                        <input type="submit" value="Lưu lại" class="btn btn-primary">
                        <a href="/CSE485_2023_BTTH02/btth02v2/index.php?controller=article&action=index" class="btn btn-secondary ">Quay lại</a>
                    </div>
                </form>
            </div>
        </div>
    </main>


</body>