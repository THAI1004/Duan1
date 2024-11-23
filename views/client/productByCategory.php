<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Corano - Jewelry Shop eCommerce Bootstrap 5 Template</title>
    <meta name="robots" content="noindex, follow" />
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="./corano/assets/img/favicon.ico">

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
    <style>
        .product-item .product-thumb img {
            width: 200px;
            height: 200px;
            /* Đảm bảo ảnh không bị méo */
        }
        .product-item .product-thumb {
            display: flex;
            justify-content: center;
            /* Căn giữa theo chiều ngang */
            align-items: center;
            /* Căn giữa theo chiều dọc */
            height: 200px;
            /* Đặt chiều cao cụ thể cho phần tử chứa nếu cần */
        }
    </style>
</head>

<body>
    <?php foreach ($category as $category): ?>
        <div class="breadcrumb-area">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="breadcrumb-wrap">
                            <nav aria-label="breadcrumb">
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html"><i class="fa fa-home"></i></a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Sneaker / <?= $category["category_name"] ?></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach ?>
    <!-- breadcrumb area end -->

    <!-- page main wrapper start -->

    <div class="shop-main-wrapper section-padding">
        <div class="container">
            <div class="row">
                <!-- sidebar area start -->
                <div class="col-lg-3 order-2 order-lg-1">
                    <aside class="sidebar-wrapper">
                        <!-- single sidebar start -->
                        <div class="sidebar-single">
                            <h5 class="sidebar-title">categories</h5>
                            <div class="sidebar-body">
                                <ul class="shop-categories">
                                    <?php foreach ($listCate as $listCate): ?>
                                        <li><a href="?act=listProductByCate&id=<?=$listCate["id"]?>"><?= $listCate['category_name'] ?></a></li>
                                    <?php endforeach ?>
                                </ul>
                            </div>
                        </div>

                        <!-- single sidebar end -->

                        <!-- single sidebar start -->

                        <div class="sidebar-single">
                            <h5 class="sidebar-title">price</h5>
                            <div class="sidebar-body">
                                <div class="price-range-wrap">
                                    <div class="price-range" data-min="50000" data-max="5000000"></div>
                                    <div class="range-slider">
                                        <form action="?act=productByPrice" method="post" class="d-flex align-items-center justify-content-between">
                                            <div class="price-input">
                                                <label for="amount">Price: </label>
                                                <input type="text" id="amount" name="price_range" value="<?= isset($_POST['price_range']) ? $_POST['price_range'] : '' ?>">
                                            </div>
                                            <button type="submit" class="filter-btn">Filter</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="sidebar-banner">
                            <div class="img-container">
                                <a href="#">
                                    <img src="assets/img/banner/sidebar-banner.jpg" alt="">
                                </a>
                            </div>
                        </div>
                        <!-- single sidebar end -->
                    </aside>
                </div>
                <!-- sidebar area end -->

                <!-- shop main wrapper start -->
                <div class="col-lg-9 order-1 order-lg-2">
                    <div class="shop-product-wrapper">
                        <!-- shop product top wrap start -->
                        <div class="shop-top-bar">
                            <div class="row align-items-center">
                                <div class="col-lg-7 col-md-6 order-2 order-md-1">
                                    <div class="top-bar-left">
                                        <div class="product-view-mode">
                                            <a class="active" href="#" data-target="grid-view" data-bs-toggle="tooltip" title="Grid View"><i class="fa fa-th"></i></a>
                                            <a href="#" data-target="list-view" data-bs-toggle="tooltip" title="List View"><i class="fa fa-list"></i></a>
                                        </div>
                                        
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                        <!-- shop product top wrap start -->

                        <!-- product item list wrapper start -->
                        <div class="shop-product-wrap grid-view row mbn-30">
                            <?php foreach ($productsToDisplay as $product): ?>
                                <?php $discountPercentage = (($product["price"] - $product["discount_price"]) / $product["price"]) * 100 ?>
                                <div class="col-md-4 col-sm-6">
                                    <div class="product-item">
                                        <!-- Hiển thị sản phẩm -->
                                        <figure class="product-thumb">
                                            <a href="product-details.html">
                                                <img class="pri-img" src="<?= $product['image'] ?>" alt="product">
                                                <img class="sec-img" src="<?= $product['image'] ?>" alt="product">
                                            </a>
                                            <div class="product-badge">
                                                <div class="product-label new"><span>new</span></div>
                                                <div class="product-label discount"><span><?= $discountPercentage ?> %</span></div>
                                            </div>
                                            <div class="button-group">
                                                <a href="wishlist.html" data-bs-toggle="tooltip" data-bs-placement="left" title="Add to wishlist"><i class="pe-7s-like"></i></a>
                                                <a href="compare.html" data-bs-toggle="tooltip" data-bs-placement="left" title="Add to Compare"><i class="pe-7s-refresh-2"></i></a>
                                                <a href="#" data-bs-toggle="modal" data-bs-target="#quick_view"><span data-bs-toggle="tooltip" data-bs-placement="left" title="Quick View"><i class="pe-7s-search"></i></span></a>
                                            </div>
                                            <div class="cart-hover">
                                                <button class="btn btn-cart">add to cart</button>
                                            </div>
                                        </figure>
                                        <div class="product-caption text-center">
                                            <h6 class="product-name"><a href="product-details.html"><?= $product['product_name'] ?></a></h6>
                                            <div class="price-box">
                                                <span class="price-regular"><?= $product['discount_price'] ?></span>
                                                <span class="price-old"><del><?= $product['price'] ?></del></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product-list-item">
                                        <figure class="product-thumb">
                                            <a href="product-details.html">
                                                <img class="pri-img" src="<?= $product['image'] ?>" alt="product">
                                                <img class="sec-img" src="<?= $product['image'] ?>" alt="product">
                                            </a>
                                            <div class="product-badge">
                                                <div class="product-label new">
                                                    <span>new</span>
                                                </div>
                                                <div class="product-label discount">
                                                    <span><?= $discountPercentage ?> %</span>
                                                </div>
                                            </div>
                                            <div class="button-group">
                                                <a href="?act=addWishlist" data-bs-toggle="tooltip" data-bs-placement="left" title="Add to wishlist"><i class="pe-7s-like"></i></a>
                                
                                            </div>
                                            <div class="cart-hover">
                                                <button class="btn btn-cart">add to cart</button>
                                            </div>
                                        </figure>
                                        <div class="product-content-list">
                                            <h5 class="product-name"><a href="?act=productDetail&id=<?=$product["id"]?>"></a><?= $product['product_name'] ?></h5>
                                            <div class="price-box">
                                                <span class="price-regular"><?= $product['discount_price'] ?></span>
                                                <span class="price-old"><del><?= $product['price'] ?></del></span>
                                            </div>
                                            <p><?=$product["description"]?></p>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach ?>
                        </div>
                        <!-- product item list wrapper end -->

                        <!-- start pagination area -->
                        <div class="paginatoin-area text-center">
                                <ul class="pagination-box">
                                    <?php if ($currentPage > 1): ?>
                                        <li><a class="previous" href="?act=listProductClient&page=<?= $currentPage - 1 ?>"><i class="pe-7s-angle-left"></i></a></li>
                                    <?php endif; ?>

                                    <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                                        <li class="<?= $i == $currentPage ? 'active' : '' ?>"><a href="?act=listProductClient&page=<?= $i ?>"><?= $i ?></a></li>
                                    <?php endfor; ?>

                                    <?php if ($currentPage < $totalPages): ?>
                                        <li><a class="next" href="?act=listProductClient&page=<?= $currentPage + 1 ?>"><i class="pe-7s-angle-right"></i></a></li>
                                    <?php endif; ?>
                                </ul>
                            </div>
                        <!-- end pagination area -->
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
    <script>
    $(document).ready(function() {
    $(".price-range").slider({
        range: true,
        min: 50000,
        max: 5000000, // Giới hạn giá trị tối đa, bạn có thể thay đổi nếu cần
        values: [50000, 5000000], // Giá trị mặc định
        slide: function(event, ui) {
            // Cập nhật giá trị của input mỗi khi slider thay đổi
            $("#amount").val(ui.values[0] + " - " + ui.values[1]);
        }
    });

    // Đảm bảo input được cập nhật đúng khi trang được tải lại (nếu có giá trị đã chọn trước đó)
    $("#amount").val($(".price-range").slider("values", 0) + " - " + $(".price-range").slider("values", 1));
});

   </script>
</body>

</html>
<?php
include "./include/footerClient.php";
?>