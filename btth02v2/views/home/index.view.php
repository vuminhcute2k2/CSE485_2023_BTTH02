<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/CSE485_2023_BTTH02/btth02v2/views/home/home.css">
    <script src="/CSE485_2023_BTTH02/btth02v2/assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="/CSE485_2023_BTTH02/btth02v2/assets/font-awesome/brands.min.js"></script>
    <script src="/CSE485_2023_BTTH02/btth02v2/assets/font-awesome/fontawesome.min.js"></script>
    <script src="/CSE485_2023_BTTH02/btth02v2/assets/font-awesome/solid.min.js"></script>
    <title>Home</title>
</head>

<body>
    <?php include_once(realpath($_SERVER["DOCUMENT_ROOT"]) . '/CSE485_2023_BTTH02/btth02v2/views/layouts/navbar.view.php') ?>

    <div id="carouselExampleIndicators" class="carousel slide container">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="../../assets/images/slideshow/slide01.jpg" class="d-block w-100 carousel-img" alt="...">
            </div>
            <div class="carousel-item">
                <img src="../../assets/images/slideshow/slide02.jpg" class="d-block w-100 carousel-img" alt="...">
            </div>
            <div class="carousel-item">
                <img src="../../assets/images/slideshow/slide03.jpg" class="d-block w-100 carousel-img" alt="...">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>


    <main class="container-fluid mt-3">
        <h3 class="text-center text-uppercase mb-3 text-primary">TOP bài hát yêu thích</h3>
        <div class="row row-cols-1 row-cols-md-3 g-4 container self-center">
            <?php foreach ($articles as $article) : ?>
                <div class="col">
                    <div class="card">
                        <img src=<?php $article->getHinhanh() ?> class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $article->getTieude() ?></h5>
                            <p class="card-text"><?php echo $article->getTomtat() ?></p>
                        </div>
                    </div>
                </div>
            <?php endforeach ?>
        </div>
    </main>

</body>

</html>