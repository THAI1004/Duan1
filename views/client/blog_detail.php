<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
                                <li class="breadcrumb-item"><a href="index.html"><i class="fa fa-home"></i></a></li>
                                <li class="breadcrumb-item"><a href="blog-left-sidebar.html">blog</a></li>
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
</body>

</html>
<?php
include "./include/footerClient.php";
?>