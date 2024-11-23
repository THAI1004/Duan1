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

  .main {
    margin: 0 auto; 
    max-width: 100%; 
  }

  .col-lg-9 {
    margin: 0 auto; 
    float: none; 
  }

</style>

<body>
<div class="breadcrumb-area">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="breadcrumb-wrap">
                            <nav aria-label="breadcrumb">
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html"><i class="fa fa-home"></i></a></li>
                                    <li class="breadcrumb-item active" aria-current="page">blog left sidebar</li>
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
                <div class="row">
                    <div class="col-lg-9 order-1 order-lg-2">
                    
                        <div class="blog-item-wrapper">
                            <!-- blog item wrapper end -->
                            <div class="row mbn-30">
                            <?php foreach($listBlogs as $listBlogs): ?>
                                <div class="col-md-6">
                                    <!-- blog post item start -->
                                    <div class="blog-post-item mb-30">
                                        <figure class="blog-thumb">
                                            <a href="blog-details.html">
                                                <img src="<?= $listBlogs['thumbnail'] ?>" alt="blog image">
                                            </a>
                                        </figure>
                                        <div class="blog-content">
                                            <div class="blog-meta">
                                                <p><?= $listBlogs['created_at'] ?> | <a href="#">Corano</a></p>
                                            </div>
                                            <h4 class="blog-title">
                                                <a href="?act=blog&id=<?= $listBlogs['id'] ?>"><?= $listBlogs['title'] ?></a>
                                            </h4>
                                        </div>
                                    </div>
                                </div>
                                 <?php endforeach ?>
                            <div class="paginatoin-area text-center mb-5">
                                <ul class="pagination-box">
                                    <li><a class="previous" href="#"><i class="pe-7s-angle-left"></i></a></li>
                                    <li class="active"><a href="#">1</a></li>
                                    <li><a href="#">2</a></li>
                                    <li><a href="#">3</a></li>
                                    <li><a class="next" href="#"><i class="pe-7s-angle-right"></i></a></li>
                                </ul>
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
include "./include/footerClient.php"
?>