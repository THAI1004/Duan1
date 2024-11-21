<!doctype html>
<html class="no-js" lang="en">


<!-- Mirrored from htmldemo.net/corano/corano/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 29 Jun 2024 09:53:03 GMT -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Corano - Jewelry Shop eCommerce Bootstrap 5 Template</title>
    <meta name="robots" content="noindex, follow" />
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">

    <!-- CSS
	============================================ -->
    <!-- google fonts -->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,300i,400,400i,700,900" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="./corano//assets/css/vendor/bootstrap.min.css">
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
    <style>
        .product-item {
    position: relative;
    margin-bottom: 30px;
}

.product-thumb {
    position: relative;
    overflow: hidden;
}

.product-thumb img {
    width: 100%;
    height: 300px; /* Đặt chiều cao cố định cho hình ảnh */
    object-fit: cover; /* Đảm bảo hình ảnh được cắt vừa khung mà không bị méo */
}

.product-caption {
    padding: 15px;
}

.price-box {
    margin-top: 10px;
}

    </style>
</head>

<body>
    

        


    <main>
        <!-- hero slider area start -->
        <section class="slider-area">
            <div class="hero-slider-active slick-arrow-style slick-arrow-style_hero slick-dot-style">
                <!-- single slider item start -->
                <?php foreach($listSlider as $row){?>
                <div class="hero-single-slide hero-overlay">
                    
                    <div class="hero-slider-item bg-img" data-bg="<?= $row["image_url"]?>">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="hero-slider-content slide-1">
                                        <h2 class="slide-title"><?= $row["content"]?></span></h2>
                                        <h4 class="slide-desc"><?= $row["description"]?></h4>
                                        <a href="shop.html" class="btn btn-hero">Read More</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                   
                </div>
                <?php }?>
                <!-- single slider item start -->
            </div>
        </section>
        <!-- hero slider area end -->



        <!-- service policy area start -->
        <div class="service-policy section-padding">
            <div class="container">
                <div class="row mtn-30">
                    <div class="col-sm-6 col-lg-3">
                        <div class="policy-item">
                            <div class="policy-icon">
                                <i class="pe-7s-plane"></i>
                            </div>
                            <div class="policy-content">
                                <h6>Free Shipping</h6>
                                <p>Free shipping all order</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3">
                        <div class="policy-item">
                            <div class="policy-icon">
                                <i class="pe-7s-help2"></i>
                            </div>
                            <div class="policy-content">
                                <h6>Support 24/7</h6>
                                <p>Support 24 hours a day</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3">
                        <div class="policy-item">
                            <div class="policy-icon">
                                <i class="pe-7s-back"></i>
                            </div>
                            <div class="policy-content">
                                <h6>Money Return</h6>
                                <p>30 days for free return</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3">
                        <div class="policy-item">
                            <div class="policy-icon">
                                <i class="pe-7s-credit"></i>
                            </div>
                            <div class="policy-content">
                                <h6>100% Payment Secure</h6>
                                <p>We ensure secure payment</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- service policy area end -->

        <!-- banner statistics area start -->
       
        <!-- banner statistics area end -->

        <!-- product area start -->
        <section class="product-area section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <!-- section title start -->
                        <div class="section-title text-center">
                            <h2 class="title">Top bán chạy</h2>
                            <p class="sub-title">Top các sản phẩm bán chạy nhất</p>
                        </div>
                        <!-- section title start -->
                    </div>
                </div>
                <div class="row">
    <div class="col-12">
    <div class="product-container">
        <!-- product tab menu start -->
        <div class="product-tab-menu">
    <ul class="nav justify-content-center">
        <?php 
        $i = 1; 
        $printedCategories = []; // Mảng để lưu các danh mục đã in
        foreach($listCateTopOrder as $category) {
            // Kiểm tra nếu danh mục chưa được in
            if (!in_array($category["category_id"], $printedCategories)) {
                $printedCategories[] = $category["category_id"]; // Lưu danh mục đã in
        ?>
        <li>
            <a href="#tab<?= $i ?>" class="<?= ($i == 1) ? 'active' : '' ?>" data-bs-toggle="tab">
                <?= $category["category_name"] ?>
            </a>
        </li>
        <?php $i++; } } ?>
    </ul>
</div>
<!-- product tab menu end -->

<!-- product tab content start -->
<div class="tab-content">
    <?php 
    $i = 1; 
    $printedCategories = []; // Mảng theo dõi lại các danh mục đã hiển thị trong nội dung tab
    foreach($listCateTopOrder as $category) { 
        // Chỉ hiển thị nếu danh mục chưa được in
        if (!in_array($category["category_id"], $printedCategories)) {
            $printedCategories[] = $category["category_id"]; // Lưu lại danh mục đã hiển thị
    ?>
    <div class="tab-pane fade <?= ($i == 1) ? 'show active' : '' ?>" id="tab<?= $i ?>">
        <div class="row">
            <?php 
            
            $found = false; // Đặt cờ để kiểm soát việc hiển thị sản phẩm
            foreach($listProduct as $product) { 
                $discountPercentage = (($product["price"] - $product["discount_price"]) / $product["price"]) * 100;
                // Hiển thị sản phẩm chỉ khi category_id khớp với id của danh mục hiện tại
                if ($product["category_id"] == $category["category_id"]) {
                    $found = true; // Khi tìm thấy ít nhất một sản phẩm
            ?>
            <div class="col-md-3 col-sm-6">
                <div class="product-item">
                    <figure class="product-thumb">
                        <a href="?act=productDetail&id=<?= $product["id"] ?>">
                            <img class="pri-img" src="<?= $product["image"] ?>" alt="product">
                            <img class="sec-img" src="<?= $product["image"] ?>" alt="product">
                        </a>
                        <div class="product-badge">
                            <div class="product-label new">
                                <span>new</span>
                            </div>
                            <div class="product-label discount">
                            <span>
    <script>
        var discountPercentage = <?= $discountPercentage ?>;
        document.write(Math.round(discountPercentage) + "%");
    </script>    
</span>
                            </div>
                        </div>
                        <div class="button-group">
                            <a href="" style="" data-bs-toggle="tooltip" data-bs-placement="left" title="Add to wishlist">
                                <i style="margin-top: 10px;" class="pe-7s-like"></i>
                            </a>
                            <a href="" data-bs-toggle="tooltip" data-bs-placement="left" title="Add to Compare">
                                <i style="margin-top: 10px;" class="pe-7s-refresh-2"></i>
                            </a>
                            <a href="" data-bs-toggle="modal" data-bs-target="#quick_view">
                                <span data-bs-toggle="tooltip" data-bs-placement="left" title="Quick View">
                                    <i style="margin-top: 10px;" class="pe-7s-search"></i>
                                </span>
                            </a>
                        </div>
                        <div class="cart-hover">
                            <button class="btn btn-cart">add to cart</button>
                        </div>
                    </figure>
                    <div class="product-caption text-center">
                        <h6 class="product-name">
                            <a href="?act=productDetail&id=<?= $product["id"] ?>"><?= $product["product_name"] ?></a>
                        </h6>
                        <div class="price-box">
                            <span class="price-regular"><?= $product["discount_price"] ?? $product["price"] ?>đ</span>
                            <?php if ($product["discount_price"]): ?>
                            <span class="price-old"><del><?= $product["price"] ?>đ</del></span>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php 
                } // end if 
            } // end foreach products 

            // Nếu không tìm thấy sản phẩm nào cho danh mục, thông báo
            if (!$found) {
                echo "<p>Không có sản phẩm nào trong danh mục này.</p>";
            }
            ?>
        </div>
    </div>
    <?php $i++; } } ?>
</div>


</div>


        <!-- product tab content end -->
    </div>
</div>

</div>

                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- product area end -->

        <!-- product banner statistics area start -->
        <section class="product-banner-statistics">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="product-banner-carousel slick-row-10">
                            <!-- banner single slide start -->
                             <?php foreach($listCate as $cate){?>
                            <div class="banner-slide-item">
                                <figure class="banner-statistics">
                                    <a href="#">
                                        <img src="./images/category/<?= $cate["image_category"]?>" alt="product banner">
                                    </a>
                                    <div class="banner-content banner-content_style2">
                                        <!-- <h5 class="banner-text3"><a href="?act=listProductByCate&id=<?= $cate['id'] ?>"><?= $cate["category_name"]?></a></h5> -->
                                    </div>
                                </figure>
                            </div>
                            <?php }?>
                            <!-- banner single slide start -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- product banner statistics area end -->

        <!-- featured product area start -->
        <section class="feature-product section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <!-- section title start -->
                        <div class="section-title text-center">
                            <h2 class="title">Sản phẩm mới nhất</h2>
                            <p class="sub-title">Top sản phẩm mới tại cửa hàng</p>
                        </div>
                        <!-- section title start -->
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="product-carousel-4_2 slick-row-10 slick-arrow-style">
                            <!-- product item start -->
                             <?php  foreach($productLimit20 as $row){
                                $discountPercentage = (($row["price"] - $row["discount_price"]) / $row["price"]) * 100;
                                ?>
                            <div class="product-item">
                                <figure class="product-thumb">
                                    <a href="product-details.html">
                                        <img style="width:100%;" class="pri-img" src="<?=$row["image"]?>" alt="product">
                                        <img class="sec-img" src="<?=$row["image"]?>" alt="product">
                                    </a>
                                    <div class="product-badge">
                                        <div class="product-label new">
                                            <span>new</span>
                                        </div>
                                        <div class="product-label discount">
                                        <span>
    <script>
        var discountPercentage = <?= $discountPercentage ?>;
        document.write(Math.round(discountPercentage) + "%");
    </script>    
</span>
                                        </div>
                                    </div>
                                    <div class="button-group">
                                        <a href="" data-bs-toggle="tooltip" data-bs-placement="left"
                                            title="Add to wishlist"><i class="pe-7s-like"></i></a>
                                        <a href="" data-bs-toggle="tooltip" data-bs-placement="left"
                                            title="Add to Compare"><i class="pe-7s-refresh-2"></i></a>
                                        <a href="" data-bs-toggle="modal" data-bs-target="#quick_view"><span
                                                data-bs-toggle="tooltip" data-bs-placement="left" title="Quick View"><i
                                                    class="pe-7s-search"></i></span></a>
                                    </div>
                                    <div class="cart-hover">
                                        <button class="btn btn-cart">add to cart</button>
                                    </div>
                                </figure>
                                <div class="product-caption text-center">
                                    <h6 class="product-name">
                                        <a href="?act=productDetail&id=<?= $row["id"] ?>"><?= $row["product_name"] ?></a>
                                    </h6>
                                    <div class="price-box">
                                        <span class="price-regular"><?= $row["price"]?></span>
                                        <span class="price-old"><del><?= $row["discount_price"]?></del></span>
                                    </div>
                                </div>
                            </div>
                            <?php }?>
                            <!-- product item end -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- featured product area end -->

        <!-- testimonial area start -->
        <section class="testimonial-area section-padding bg-img" data-bg="./corano/assets/img/testimonial/testimonials-bg.jpg">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <!-- section title start -->
                        <div class="section-title text-center">
                            <h2 class="title">Đánh giá và góp ý</h2>
                            <p class="sub-title">Những điều cần lưu ý</p>
                        </div>
                        <!-- section title start -->
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="testimonial-content-wrapper">
                            <div class="testimonial-content-carousel">
                                <?php foreach($projectInfor as $row){?>
                                <div class="testimonial-content">
                                    <p><?= $row["message"]?></p>
                                    <div class="ratings">
                                        <span><i class="fa fa-star-o"></i></span>
                                        <span><i class="fa fa-star-o"></i></span>
                                        <span><i class="fa fa-star-o"></i></span>
                                        <span><i class="fa fa-star-o"></i></span>
                                        <span><i class="fa fa-star-o"></i></span>
                                    </div>
                                    <h5 class="testimonial-author"><?= $row["project_name"]?></h5>
                                </div>
                                <?php }?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- testimonial area end -->
        <!-- latest blog area start -->
        <section class="mt-3 latest-blog-area section-padding pt-0">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <!-- section title start -->
                        <div class="section-title text-center">
                            <h2 class="title">latest blogs</h2>
                            <p class="sub-title">There are latest blog posts</p>
                        </div>
                        <!-- section title start -->
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="blog-carousel-active slick-row-10 slick-arrow-style">
                            <!-- blog post item start -->
                             <?php foreach($listBlog as $row){?>
                            <div class="blog-post-item">
                                <figure class="blog-thumb">
                                    <a href="?act=blog&id=<?= $row["id"]?>">
                                        <img src="<?= $row["thumbnail"]?>" alt="blog image">
                                    </a>
                                </figure>
                                <div class="blog-content">
                                    <div class="blog-meta">
                                        <p><?=$row["created_at"]?> | Corano</p>
                                    </div>
                                    <h5 class="blog-title">
                                        <a href="?act=blog&id=<?= $row["id"]?>"><?= $row["title"]?></a>
                                    </h5>
                                </div>
                            </div>
                            <?php }?>
                            <!-- blog post item end -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- latest blog area end -->
    </main>

    <!-- Scroll to top start -->
    <div class="scroll-top not-visible">
        <i class="fa fa-angle-up"></i>
    </div>
    <!-- Scroll to Top End -->

    <!-- footer area start -->
    <footer class="footer-widget-area">
        <div class="footer-top section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="widget-item">
                            <div class="widget-title">
                                <div class="widget-logo">
                                    <a href="index.html">
                                        <img src="./corano/assets/img/logo/logo.png" alt="brand logo">
                                    </a>
                                </div>
                            </div>
                            <div class="widget-body">
                                <p>We are a team of designers and developers that create high quality wordpress,
                                    shopify, Opencart </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="widget-item">
                            <h6 class="widget-title">Contact Us</h6>
                            <div class="widget-body">
                                <address class="contact-block">
                                    <ul>
                                        <li><i class="pe-7s-home"></i> 4710-4890 Breckinridge USA</li>
                                        <li><i class="pe-7s-mail"></i> <a
                                                href="mailto:demo@plazathemes.com">demo@yourdomain.com </a></li>
                                        <li><i class="pe-7s-call"></i> <a href="tel:(012)800456789987">(012) 800 456
                                                789-987</a></li>
                                    </ul>
                                </address>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="widget-item">
                            <h6 class="widget-title">Information</h6>
                            <div class="widget-body">
                                <ul class="info-list">
                                    <li><a href="#">about us</a></li>
                                    <li><a href="#">Delivery Information</a></li>
                                    <li><a href="#">privet policy</a></li>
                                    <li><a href="#">Terms & Conditions</a></li>
                                    <li><a href="#">contact us</a></li>
                                    <li><a href="#">site map</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="widget-item">
                            <h6 class="widget-title">Follow Us</h6>
                            <div class="widget-body social-link">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-instagram"></i></a>
                                <a href="#"><i class="fa fa-youtube"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row align-items-center mt-20">
                    <div class="col-md-6">
                        <div class="newsletter-wrapper">
                            <h6 class="widget-title-text">Signup for newsletter</h6>
                            <form class="newsletter-inner" id="mc-form">
                                <input type="email" class="news-field" id="mc-email" autocomplete="off"
                                    placeholder="Enter your email address">
                                <button class="news-btn" id="mc-submit">Subscribe</button>
                            </form>
                            <!-- mail-chimp-alerts Start -->
                            <div class="mailchimp-alerts">
                                <div class="mailchimp-submitting"></div><!-- mail-chimp-submitting end -->
                                <div class="mailchimp-success"></div><!-- mail-chimp-success end -->
                                <div class="mailchimp-error"></div><!-- mail-chimp-error end -->
                            </div>
                            <!-- mail-chimp-alerts end -->
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="footer-payment">
                            <img src="./corano/assets/img/payment.png" alt="payment method">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="copyright-text text-center">
                            <p>&copy; 2022 <b>Corano</b> Made with <i class="fa fa-heart text-danger"></i> by <a
                                    href="https://hasthemes.com/"><b>HasThemes</b></a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- footer area end -->

    <!-- Quick view modal start -->
    <div class="modal" id="quick_view">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-bs-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <!-- product details inner end -->
                    <div class="product-details-inner">
                        <div class="row">
                            <div class="col-lg-5">
                                <div class="product-large-slider">
                                    <div class="pro-large-img img-zoom">
                                        <img src="./corano/assets/img/product/product-details-img1.jpg" alt="product-details" />
                                    </div>
                                    <div class="pro-large-img img-zoom">
                                        <img src="./corano/assets/img/product/product-details-img2.jpg" alt="product-details" />
                                    </div>
                                    <div class="pro-large-img img-zoom">
                                        <img src="./corano/assets/img/product/product-details-img3.jpg" alt="product-details" />
                                    </div>
                                    <div class="pro-large-img img-zoom">
                                        <img src="./corano/assets/img/product/product-details-img4.jpg" alt="product-details" />
                                    </div>
                                    <div class="pro-large-img img-zoom">
                                        <img src="./corano/assets/img/product/product-details-img5.jpg" alt="product-details" />
                                    </div>
                                </div>
                                <div class="pro-nav slick-row-10 slick-arrow-style">
                                    <div class="pro-nav-thumb">
                                        <img src="./corano/assets/img/product/product-details-img1.jpg" alt="product-details" />
                                    </div>
                                    <div class="pro-nav-thumb">
                                        <img src="./corano/assets/img/product/product-details-img2.jpg" alt="product-details" />
                                    </div>
                                    <div class="pro-nav-thumb">
                                        <img src="./corano/assets/img/product/product-details-img3.jpg" alt="product-details" />
                                    </div>
                                    <div class="pro-nav-thumb">
                                        <img src="./corano/assets/img/product/product-details-img4.jpg" alt="product-details" />
                                    </div>
                                    <div class="pro-nav-thumb">
                                        <img src="./corano/assets/img/product/product-details-img5.jpg" alt="product-details" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-7">
                                <div class="product-details-des">
                                    <div class="manufacturer-name">
                                        <a href="product-details.html">HasTech</a>
                                    </div>
                                    <h3 class="product-name">Handmade Golden Necklace</h3>
                                    <div class="ratings d-flex">
                                        <span><i class="fa fa-star-o"></i></span>
                                        <span><i class="fa fa-star-o"></i></span>
                                        <span><i class="fa fa-star-o"></i></span>
                                        <span><i class="fa fa-star-o"></i></span>
                                        <span><i class="fa fa-star-o"></i></span>
                                        <div class="pro-review">
                                            <span>1 Reviews</span>
                                        </div>
                                    </div>
                                    <div class="price-box">
                                        <span class="price-regular">$70.00</span>
                                        <span class="price-old"><del>$90.00</del></span>
                                    </div>
                                    <h5 class="offer-text"><strong>Hurry up</strong>! offer ends in:</h5>
                                    <div class="product-countdown" data-countdown="2022/12/20"></div>
                                    <div class="availability">
                                        <i class="fa fa-check-circle"></i>
                                        <span>200 in stock</span>
                                    </div>
                                    <p class="pro-desc">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed
                                        diam nonumy eirmod tempor invidunt ut labore et dolore magna.</p>
                                    <div class="quantity-cart-box d-flex align-items-center">
                                        <h6 class="option-title">qty:</h6>
                                        <div class="quantity">
                                            <div class="pro-qty"><input type="text" value="1"></div>
                                        </div>
                                        <div class="action_link">
                                            <a class="btn btn-cart2" href="#">Add to cart</a>
                                        </div>
                                    </div>
                                    <div class="useful-links">
                                        <a href="#" data-bs-toggle="tooltip" title="Compare"><i
                                                class="pe-7s-refresh-2"></i>compare</a>
                                        <a href="#" data-bs-toggle="tooltip" title="Wishlist"><i
                                                class="pe-7s-like"></i>wishlist</a>
                                    </div>
                                    <div class="like-icon">
                                        <a class="facebook" href="#"><i class="fa fa-facebook"></i>like</a>
                                        <a class="twitter" href="#"><i class="fa fa-twitter"></i>tweet</a>
                                        <a class="pinterest" href="#"><i class="fa fa-pinterest"></i>save</a>
                                        <a class="google" href="#"><i class="fa fa-google-plus"></i>share</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> <!-- product details inner end -->
                </div>
            </div>
        </div>
    </div>
    <!-- Quick view modal end -->

    <!-- offcanvas mini cart start -->
    <div class="offcanvas-minicart-wrapper">
        <div class="minicart-inner">
            <div class="offcanvas-overlay"></div>
            <div class="minicart-inner-content">
                <div class="minicart-close">
                    <i class="pe-7s-close"></i>
                </div>
                <div class="minicart-content-box">
                    <div class="minicart-item-wrapper">
                        <ul>
                            <li class="minicart-item">
                                <div class="minicart-thumb">
                                    <a href="product-details.html">
                                        <img src="./corano/assets/img/cart/cart-1.jpg" alt="product">
                                    </a>
                                </div>
                                <div class="minicart-content">
                                    <h3 class="product-name">
                                        <a href="product-details.html">Dozen White Botanical Linen Dinner Napkins</a>
                                    </h3>
                                    <p>
                                        <span class="cart-quantity">1 <strong>&times;</strong></span>
                                        <span class="cart-price">$100.00</span>
                                    </p>
                                </div>
                                <button class="minicart-remove"><i class="pe-7s-close"></i></button>
                            </li>
                            <li class="minicart-item">
                                <div class="minicart-thumb">
                                    <a href="product-details.html">
                                        <img src="./corano/assets/img/cart/cart-2.jpg" alt="product">
                                    </a>
                                </div>
                                <div class="minicart-content">
                                    <h3 class="product-name">
                                        <a href="product-details.html">Dozen White Botanical Linen Dinner Napkins</a>
                                    </h3>
                                    <p>
                                        <span class="cart-quantity">1 <strong>&times;</strong></span>
                                        <span class="cart-price">$80.00</span>
                                    </p>
                                </div>
                                <button class="minicart-remove"><i class="pe-7s-close"></i></button>
                            </li>
                        </ul>
                    </div>

                    <div class="minicart-pricing-box">
                        <ul>
                            <li>
                                <span>sub-total</span>
                                <span><strong>$300.00</strong></span>
                            </li>
                            <li>
                                <span>Eco Tax (-2.00)</span>
                                <span><strong>$10.00</strong></span>
                            </li>
                            <li>
                                <span>VAT (20%)</span>
                                <span><strong>$60.00</strong></span>
                            </li>
                            <li class="total">
                                <span>total</span>
                                <span><strong>$370.00</strong></span>
                            </li>
                        </ul>
                    </div>

                    <div class="minicart-button">
                        <a href="cart.html"><i class="fa fa-shopping-cart"></i> View Cart</a>
                        <a href="cart.html"><i class="fa fa-share"></i> Checkout</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- offcanvas mini cart end -->

    <!-- JS
============================================ -->

    <!-- Modernizer JS -->
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


<!-- Mirrored from htmldemo.net/corano/corano/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 29 Jun 2024 09:53:43 GMT -->

</html>
<?php
// include "./include/footerClient.php";
?>