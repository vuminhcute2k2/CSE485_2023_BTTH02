<?php
$articles = [
    ['ma_bviet' => 1, 'tieude' => 'Lorem ipsum dolor sit amet', 'tomtat' => 'Integer accumsan arcu eget semper molestie. Orci varius natoque penatibus et magnis dis parturient montes.', 'hinhanh' => ''],
    ['ma_bviet' => 2, 'tieude' => 'Lorem ipsum dolor sit amet', 'tomtat' => 'Integer accumsan arcu eget semper molestie. Orci varius natoque penatibus et magnis dis parturient montes.', 'hinhanh' => ''],
    ['ma_bviet' => 3, 'tieude' => 'Lorem ipsum dolor sit amet', 'tomtat' => 'Integer accumsan arcu eget semper molestie. Orci varius natoque penatibus et magnis dis parturient montes.', 'hinhanh' => ''],
];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./home.css">
    <script src="/CSE485_2023_BTTH02/btth02v2/assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="/CSE485_2023_BTTH02/btth02v2/assets/font-awesome/brands.min.js"></script>
    <script src="/CSE485_2023_BTTH02/btth02v2/assets/font-awesome/fontawesome.min.js"></script>
    <script src="/CSE485_2023_BTTH02/btth02v2/assets/font-awesome/solid.min.js"></script>
    <title>Home</title>
</head>

<body>
    <?php include_once("../layouts/navbar.view.php") ?>

    <main class="container-fluid mt-3">
        <h3 class="text-center text-uppercase mb-3 text-primary">TOP bài hát yêu thích</h3>
        <div class="row row-cols-1 row-cols-md-3 g-4 container self-center">
            <?php foreach ($articles as $article) : ?>
                <div class="col">
                    <div class="card">
                        <img src="../../assets/images/songs/hardrock.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $article['tieude'] ?></h5>
                            <p class="card-text"><?php echo $article['tomtat'] ?></p>
                        </div>
                    </div>
                </div>
            <?php endforeach ?>
        </div>
        </div>
    </main>

</body>

</html>