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
</body>

</html>
<?php
include "./include/footerClient.php"
?>