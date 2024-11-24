<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">

    <!-- CSS
	============================================ -->
    <!-- google fonts -->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,300i,400,400i,700,900" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="./corano/assets/css/vendor/bootstrap.min.css">
    <!-- Pe-icon-7-stroke CSS -->
    <link rel="stylesheet" href="./corano/assets/css/vendor/pe-icon-7-stroke.css">
    <!-- Font-awesome CSS -->
    <link rel="stylesheet" href="./corano/assets/css/vendor/font-awesome.min.css">
    <!-- Slick slider css -->
    <link rel="stylesheet" href="./corano/assets/css/plugins/slick.min.css">
    <!-- animate css -->
    <link rel="stylesheet" href="./corano/assets/css/plugins/animate.css">
    <!-- Nice Select css -->
    <link rel="stylesheet" href="./corano/assets/css/plugins/nice-select.css">
    <!-- jquery UI css -->
    <link rel="stylesheet" href="./corano/assets/css/plugins/jqueryui.min.css">
    <!-- main style css -->
    <link rel="stylesheet" href="./corano/assets/css/style.css">
</head>
<style>
  .blog-main-wrapper {
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
  }

  .container.main {
    margin: 0 auto; 
    max-width: 80%; 
  }

  .col-lg-9 {
    margin: 0 auto; 
    float: none; 
  }
</style>

<body>
    <?php foreach($listBlog as $listBlog): ?>

        
    <div class="breadcrumb-area">
        <div class="container">
                <div class="col-12">
                    <div class="breadcrumb-wrap">
                        <nav aria-label="breadcrumb">
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="?act=homeClient"><i class="fa fa-home"></i></a></li>
                                <li class="breadcrumb-item"><a href="?act=homeBlog">blog</a></li>
                                <li class="breadcrumb-item active" aria-current="page"><?= $listBlog['title'] ?></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb area end -->

    <!-- blog main wrapper start -->
    <div class="blog-main-wrapper section-padding">
        <div class="container main">
                <div class="col-lg-9 order-1">
                    <div class="blog-item-wrapper">
                        <!-- blog post item start -->
                        <div class="blog-post-item blog-details-post">
                            <figure class="blog-thumb">
                                <div class="blog-carousel-2 slick-row-15 slick-arrow-style slick-dot-style">
                                    <div class="blog-single-slide">
                                        <img src="<?= $listBlog['thumbnail'] ?>" alt="blog image">
                                    </div>
                                </div>
                            </figure>
                            <div class="blog-content">
                                <h3 class="blog-title">
                                <?= $listBlog['title'] ?>                                </h3>
                                <div class="blog-meta">
                                    <p><?= $listBlog['created_at'] ?> | <a href="#">Corano</a></p>
                                </div>
                                <div class="entry-summary">
                                    <p><?= $listBlog['content'] ?></p>
                                    <?php endforeach ?>
                                    <div class="blog-share-link">
                                        <h6>Share :</h6>
                                        <div class="blog-social-icon">
                                            <a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
                                            <a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
                                            <a href="#" class="pinterest"><i class="fa fa-pinterest"></i></a>
                                            <a href="#" class="google"><i class="fa fa-google-plus"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="./corano/assets/js/vendor/modernizr-3.6.0.min.js"></script>
    <!-- jQuery JS -->
    <script src="./corano/assets/js/vendor/jquery-3.6.0.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="./corano/assets/js/vendor/bootstrap.bundle.min.js"></script>
    <!-- slick Slider JS -->
    <script src="./corano/assets/js/plugins/slick.min.js"></script>
    <!-- Countdown JS -->
    <script src="./corano/assets/js/plugins/countdown.min.js"></script>
    <!-- Nice Select JS -->
    <script src="./corano/assets/js/plugins/nice-select.min.js"></script>
    <!-- jquery UI JS -->
    <script src="./corano/assets/js/plugins/jqueryui.min.js"></script>
    <!-- Image zoom JS -->
    <script src="./corano/assets/js/plugins/image-zoom.min.js"></script>
    <!-- Images loaded JS -->
    <script src="./corano/assets/js/plugins/imagesloaded.pkgd.min.js"></script>
    <!-- mail-chimp active js -->
    <script src="./corano/assets/js/plugins/ajaxchimp.js"></script>
    <!-- contact form dynamic js -->
    <script src="./corano/assets/js/plugins/ajax-mail.js"></script>
    <!-- google map api -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCfmCVTjRI007pC1Yk2o2d_EhgkjTsFVN8"></script>
    <!-- google map active js -->
    <script src="./corano/assets/js/plugins/google-map.js"></script>
    <!-- Main JS -->
    <script src="./corano/assets/js/main.js"></script>
</body>

</html>
<?php
include "./include/footerClient.php";
?>