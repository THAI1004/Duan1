<!doctype html>
<html class="no-js" lang="zxx">


<!-- Mirrored from htmldemo.net/corano/corano/product-details.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 29 Jun 2024 09:54:00 GMT -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Corano - Jewelry Shop eCommerce Bootstrap 5 Template</title>
    <meta name="robots" content="noindex, follow" />
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="/assets/img/favicon.ico">

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
        .product-thumb img {
            width: 100%;
            /* Đảm bảo ảnh có chiều rộng 100% */
            height: 250px;
            /* Đặt chiều cao cố định cho tất cả ảnh */
            object-fit: cover;
            /* Giữ tỷ lệ ảnh nhưng làm đầy khung */
        }
    </style>
</head>

<body>
    <main>
        <!-- breadcrumb area start -->
        <div class="breadcrumb-area">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="breadcrumb-wrap">
                            <nav aria-label="breadcrumb">
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="?act=homeClient"><i class="fa fa-home"></i></a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Chi tiết sản phẩm</li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- breadcrumb area end -->

        <!-- page main wrapper start -->
        <div class="shop-main-wrapper section-padding pb-0">
            <div class="container">
                <div class="row">
                    <!-- product details wrapper start -->
                    <div class="col-lg-12 order-1 order-lg-2">
                        <!-- product details inner end -->
                        <div class="product-details-inner">
                            <div class="row">
                                <div class="col-lg-5">
                                    <div class="product-large-slider">
                                        <div class="pro-large-img img-zoom">
                                            <img src="<?= $Product["image"] ?>" alt="product-details" />
                                        </div>
                                    </div>
                                    <div class="pro-nav slick-row-10 slick-arrow-style">
                                        <?php foreach ($imageAll as $row) { ?>
                                            <div class="pro-nav-thumb">
                                                <img src="<?= $row["image_variant"] ?>" alt="product-details" />
                                            </div>
                                        <?php } ?>

                                    </div>
                                </div>
                                <div class="col-lg-7">
                                    <div class="product-details-des">

                                        <h3 class="product-name"><?= $Product["product_name"] ?></h3>
                                        <div class="ratings d-flex">
                                            <?php
                                            // In ra số sao đầy
                                            for ($i = 0; $i < $averageRating; $i++) {
                                                echo '<span class="good"><i class="fa fa-star"></i></span>';
                                            }

                                            ?>
                                            <div class="pro-review">
                                                <span><?= $countReview ?> Reviews</span>
                                            </div>
                                        </div>
                                        <div class="price-box">
                                            <span class="price-regular"><?= number_format($Product["discount_price"], 0, '.', ','); ?> VND</span>
                                            <span class="price-old"><del><?= number_format($Product["price"], 0, '.', ','); ?> VND</del></span>
                                        </div>
                                        <form id="productForm" action="?act=addCart&id=<?= $Product["id"] ?>" method="post">
                                            <div class="quantity-cart-box d-flex align-items-center">
                                                <h6 class="option-title">Số lượng:</h6>
                                                <div class="quantity">
                                                    <input style="width:50px" min="1" name="quantity" type="number" id="quantityInput">

                                                    <script>
                                                        window.onload = function() {
                                                            document.getElementById("quantityInput").value = 1;
                                                        };
                                                    </script>
                                                    <input type="hidden" value="<?= $Product["discount_price"] ?>" name="price">
                                                    <input type="hidden" value="<?= $cartUser["id"] ?>" name="cart_id">
                                                </div>
                                                <div class="action_link">
                                                    <!-- Nút Add to Cart -->
                                                    <button id="addToCartBtn" name="submit" type="submit" class="btn btn-cart2">Thêm vào giỏ hàng</button>
                                                    <!-- Nút Mua Ngay -->
                                                    <button id="buyNowBtn" name="muangay" type="submit" class="btn btn-cart2">Mua ngay</button>
                                                </div>
                                            </div>
                                            <div class="pro-size">
                                                <h6 class="option-title">size :</h6>
                                                <select class="nice-select" name="size_id">
                                                    <?php foreach ($getAllSizeById as $row) { ?>
                                                        <option value="<?= $row['id'] ?>"><?= $row["size_name"] ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                            <div class="color-option">
                                                <h6 class="option-title">Màu :</h6>
                                                <select class="nice-select" name="color_id">
                                                    <?php foreach ($getAllColorById as $row) { ?>
                                                        <option value="<?= $row['id'] ?>"><?= $row['color_name'] ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </form>


                                        <div class="useful-links">
                                            <a href="?act=addWishlist&id=<?= $Product["id"] ?>" data-bs-toggle="tooltip" title="Wishlist"><i
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
                        </div>
                        <!-- product details inner end -->

                        <!-- product details reviews start -->
                        <div class="product-details-reviews section-padding pb-0">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="product-review-info">
                                        <ul class="nav review-tab">
                                            <li>
                                                <a class="active" data-bs-toggle="tab" href="#tab_one">Mô tả</a>
                                            </li>
                                            <li>
                                                <a data-bs-toggle="tab" href="#tab_two">Chi tiết</a>
                                            </li>
                                            <li>
                                                <a data-bs-toggle="tab" href="#tab_three">reviews <?= $countReview
                                                                                                    ?></a>
                                            </li>
                                        </ul>
                                        <div class="tab-content reviews-tab">
                                            <div class="tab-pane fade show active" id="tab_one">
                                                <div class="tab-one">
                                                    <p><?= $Product["description"] ?></p>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="tab_two">
                                                <table class="table table-bordered">
                                                    <tbody>
                                                        <tr>
                                                            <td>color</td>
                                                            <td style="display: flex; gap: 10px;">
                                                                <?php foreach ($getAllColor as $row) { ?>

                                                                    <a style="background-color: <?= $row["color_code"] ?>;display: block; width: 20px; height: 20px; margin: 0;"></a>
                                                                <?php } ?>
                                                            </td>

                                                        </tr>
                                                        <tr>
                                                            <td>size</td>
                                                            <td style="display: flex; gap: 10px;">
                                                                <?php foreach ($getAllSize as $row) { ?>

                                                                    <p><?= $row["size_name"] ?></p>
                                                                <?php } ?>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="tab-pane fade" id="tab_three">

                                                <h5><?= $countReview
                                                    ?> review </h5>
                                                <div class="total-reviews">
                                                    <?php
                                                    $totalRating = 0;

                                                    foreach ($listReview as $row) {
                                                        $totalRating += $row['rating'];
                                                    ?>
                                                        <div class="review-box">
                                                            <div class="ratings">
                                                                <?php
                                                                // Lấy giá trị rating từ $row
                                                                $rating = $row['rating'];

                                                                // In ra số sao đầy
                                                                for ($i = 0; $i < $rating; $i++) {
                                                                    echo '<span class="good"><i class="fa fa-star"></i></span>';
                                                                }

                                                                ?>
                                                            </div>

                                                            <div class="post-author">
                                                                <p><span><?php echo $row['username']; ?> -</span> <?php echo date('d M, Y', strtotime($row['created_at'])); ?></p>
                                                            </div>
                                                            <p><?php echo htmlspecialchars($row['review_text']); ?></p>
                                                        </div>
                                                    <?php } ?>

                                                </div>
                                                <?php if (isset($_SESSION['user_id']) && ($checkOrder)): ?>
                                                    <form action="?act=review" method="POST" class="review-form">
                                                        <div class="form-group row">
                                                            <div class="col">
                                                                <label class="col-form-label"><span class="text-danger">*</span>
                                                                    Your Review</label>
                                                                <textarea name="review_text" class="form-control" required></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <div class="col">
                                                                <label class="col-form-label"><span class="text-danger">*</span>
                                                                    Rating</label>
                                                                &nbsp;&nbsp;&nbsp; Bad&nbsp;
                                                                <input type="radio" value="1" name="rating">
                                                                &nbsp;
                                                                <input type="radio" value="2" name="rating">
                                                                &nbsp;
                                                                <input type="radio" value="3" name="rating">
                                                                &nbsp;
                                                                <input type="radio" value="4" name="rating">
                                                                &nbsp;
                                                                <input type="radio" value="5" name="rating" checked>
                                                                &nbsp;Good
                                                            </div>
                                                        </div>
                                                        <input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id']; ?>">
                                                        <input type="hidden" name="product_id" value="<?php echo $Product["id"] ?>">
                                                        <div class="buttons">
                                                            <button class="btn btn-sqr" type="submit">Continue</button>
                                                        </div>
                                                    </form>
                                                <?php else: ?>
                                                    <p> Bạn đăng nhập và mua hàng để đánh giá được sản phẩm</p>
                                                <?php endif; ?>
                                                <!-- end of review-form -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- product details reviews end -->
                    </div>
                    <!-- product details wrapper end -->
                </div>
            </div>
        </div>
        <!-- page main wrapper end -->

        <!-- related products area start -->
        <section class="related-products section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <!-- section title start -->
                        <div class="section-title text-center">
                            <h2 class="title">Top bán chạy</h2>
                            <p class="sub-title">tổng hợp sản phẩm bán chạy nhất</p>
                        </div>
                        <!-- section title start -->
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="product-carousel-4 slick-row-10 slick-arrow-style">
                            <!-- product item start -->
                            <?php foreach ($productLimit20 as $product) {
                                $discountPercentage = (($product["price"] - $product["discount_price"]) / $product["price"]) * 100; ?>
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
                                                <span id="giamGia"><?= floor($discountPercentage) ?>%</span>
                                            </div>
                                        </div>
                                        <div class="button-group">
                                            <a href="?act=addWishlist&id=<?= $product["id"] ?>" data-bs-toggle="tooltip" data-bs-placement="left" title="Add to wishlist"><i class="pe-7s-like"></i></a>

                                        </div>
                                        <div class="cart-hover">
                                            <a class="btn btn-cart" href="?act=productDetail&id=<?= $product["id"] ?>">Chi tiết sản phẩm</a>
                                        </div>
                                    </figure>
                                    <div class="product-caption text-center">
                                        <h6 class="product-name">
                                            <a href="?act=productDetail&id=<?= $product["id"] ?>"><?= $product["product_name"] ?></a>
                                        </h6>
                                        <div class="price-box">
                                            <span class="price-regular"><?= number_format($product["discount_price"], 0, '.', ',');  ?> VND</span>
                                            <span class="price-old"><del><?= number_format($product["price"], 0, '.', ','); ?> VND</del></span>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                            <!-- product item end -->

                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- related products area end -->
    </main>

    <!-- Scroll to top start -->
    <div class="scroll-top not-visible">
        <i class="fa fa-angle-up"></i>
    </div>
    <!-- Scroll to Top End -->





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
            $('.pro-nav-thumb img').on('click', function() {
                var newImage = $(this).attr('src'); // Lấy URL ảnh từ thumbnail được click
                $('.product-large-slider .pro-large-img img').attr('src', newImage); // Đổi ảnh lớn
            });
        });
        document.querySelectorAll('.pro-nav-thumb img').forEach(function(thumbnail) {
            thumbnail.addEventListener('click', function() {
                var newImage = thumbnail.getAttribute('src'); // Lấy URL ảnh từ thumbnail
                document.querySelector('.product-large-slider .pro-large-img img').setAttribute('src', newImage); // Đổi ảnh lớn
            });
        });

        // Lấy form và các nút
        const form = document.getElementById('productForm');
        const addToCartBtn = document.getElementById('addToCartBtn');
        const buyNowBtn = document.getElementById('buyNowBtn');

        // Sự kiện khi bấm "Add to Cart"
        addToCartBtn.addEventListener('click', function() {
            // Đặt action là thêm vào giỏ hàng
            form.action = "?act=addCart&id=<?= $Product['id'] ?>";
            // Gửi form
            form.submit();
        });

        // Sự kiện khi bấm "Mua Ngay"
        buyNowBtn.addEventListener('click', function() {
            // Đặt action là mua ngay
            form.action = "?act=buyNow&id=<?= $Product['id'] ?>";
            // Gửi form
            form.submit();
        });
    </script>
</body>


<!-- Mirrored from htmldemo.net/corano/corano/product-details.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 29 Jun 2024 09:54:00 GMT -->

</html>
<?php
include "./include/footerClient.php";
?>