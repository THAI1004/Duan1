<?php
ob_start(); // Bắt đầu output buffer
?>

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

</head>

<!-- Start Header Area -->
<header class="header-area header-wide">
    <!-- main header start -->
    <div class="main-header d-none d-lg-block">


        <!-- header middle area start -->
        <div class="header-main-area sticky">
            <div class="container">
                <div class="row align-items-center position-relative">

                    <!-- start logo area -->
                    <div class="col-lg-2">
                        <div class="logo">
                            <a href="?act=Trangchu">
                                <img src="./corano/assets/img/logo/logo.png" alt="Brand Logo">
                            </a>
                        </div>
                    </div>
                    <!-- start logo area -->

                    <!-- main menu area start -->
                    <div class="col-lg-6 position-static">
                        <div class="main-menu-area">
                            <div class="main-menu">
                                <!-- main menu navbar start -->
                                <nav class="desktop-menu">
                                    <ul> <li class="active"><a href="?act=homeClient">Home</a>
                                        </li>
                                        <li class="position-static"><a href="?act=listProductClient">Sneaker <i class="fa fa-angle-down"></i></a>
                                            <ul class="megamenu dropdown">
                                                <li class="mega-title">
                                                    <ul>
                                                        <?php
                                                        $count = 0;
                                                        foreach ($listCate as $row) {
                                                            if ($count % 4 == 0 && $count != 0) {
                                                                echo '</ul></li><li class="mega-title"><ul>'; // Đóng và mở cột mới sau mỗi 4 category
                                                            }
                                                        ?>
                                                            <li><a href="?act=listProductByCate&id=<?= $row['id'] ?>"><?= $row['category_name'] ?></a></li>

                                                        <?php
                                                            $count++;
                                                        }
                                                        ?>
                                                    </ul>
                                                </li>

                                            </ul>
                                        </li>
                                        <li><a href="?act=gioiThieu">Giới thiệu</a>
                                            
                                        </li>
                                        <li><a href="?act=homeBlog">Blog <i class="fa fa-angle-down"></i></a>
                                            <ul class="dropdown">
                                                <?php foreach ($listBlogs as $row) { ?>
                                                    <li><a href="?act=blog&id=<?= $row["id"] ?>"><?= $row["title"] ?></a></li>
                                                <?php } ?>
                                            </ul>
                                        </li>
                                        <li><a href="?act=contactUS">contactUS</a></li>
                                    </ul>
                                </nav>
                                <!-- main menu navbar end -->
                            </div>
                        </div>
                    </div>
                    <!-- main menu area end -->

                    <!-- mini cart area start -->
                    <div class="col-lg-4">
                        <div class="header-right d-flex align-items-center justify-content-xl-between justify-content-lg-end"> <div class="header-search-container">
                                <button class="search-trigger d-xl-none d-lg-block"><i class="pe-7s-search"></i></button>
                                <form action="?act=searchProductClient" method="post" class="header-search-box d-lg-none d-xl-block">
                                    <input type="search" name="search" value="<?= isset($_POST['search']) ? htmlspecialchars($_POST['search']) : '' ?>" placeholder="Tên sản phẩm ..." class="header-search-field">
                                    <button class="header-search-btn"><i class="pe-7s-search"></i></button>
                                </form>
                            </div>
                            <div class="header-configure-area">
                                <ul class="nav justify-content-end">
                                    <li class="user-hover">
                                        <a href="#">
                                            <i class="pe-7s-user"></i>
                                        </a>
                                        <ul class="dropdown-list">
                                            <?php if (isset($_SESSION['username'])) { ?>
                                                <li><a href="?act=logout">logout</a></li>
                                                <li><a href="?act=myAccount">my account</a></li>
                                                <?php if(isset($user['role']) && $user['role'] == 1){ ?>
                                                    <li><a href="?act=Admin">Login Admin</a></li>
                                                    <?php } ?>
                                            <?php } else { ?>
                                                <li><a href="?act=formLogin">login and register</a></li>
                                            <?php } ?>
                                        </ul>
                                    </li>
                                    <li>
                                    <a href="?act=wishlist">
                                        <i class="pe-7s-like"></i>
                                        <div class="notification">
                                            <?php 
                                            if (isset($_SESSION["user_id"])) {
                                                // Nếu người dùng đã đăng nhập, hiển thị số lượng sản phẩm trong wishlist từ cơ sở dữ liệu
                                                echo isset($wishlist) ? $wishlist : 0;  // $wishlist là mảng danh sách sản phẩm yêu thích
                                            } else {
                                                // Nếu chưa đăng nhập, kiểm tra cookie và đếm số lượng sản phẩm trong wishlist
                                                if (isset($_COOKIE['wishlist'])) {
                                                    $wishlist = json_decode($_COOKIE['wishlist'], true); // Giải mã cookie thành mảng PHP
                                                    echo count($wishlist); // Đếm số lượng sản phẩm trong wishlist
                                                } else {
                                                    echo 0; // Nếu không có wishlist trong cookie
                                                }
                                            }
                                            ?>
                                        </div>
                                    </a>


                                        </li>
                                    <li>
                                        <a href="#" class="minicart-btn">
                                            <i class="pe-7s-shopbag"></i>
                                            <div class="notification">
                                                <?php echo isset($_SESSION["user_id"]) ? $cart : 0;?>
                                            </div>
                                        </a>
                                    </li>
                                </ul> </div>
            </div>
        </div>
        <!-- header middle area end -->
    </div>
    <!-- main header start -->

    <!-- mobile header start -->
    <!-- mobile header start -->
    <div class="mobile-header d-lg-none d-md-block sticky">
        <!--mobile header top start -->
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-12">
                    <div class="mobile-main-header">
                        <div class="mobile-logo">
                            <a href="index.html">
                                <img src="./corano/assets/img/logo/logo.png" alt="Brand Logo">
                            </a>
                        </div>
                        <div class="mobile-menu-toggler">
                            <div class="mini-cart-wrap">
                                <a href="cart.html">
                                    <i class="pe-7s-shopbag"></i>
                                    <div class="notification">0</div>
                                </a>
                            </div>
                            <button class="mobile-menu-btn">
                                <span></span>
                                <span></span>
                                <span></span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- mobile header top start -->
    </div>
    <!-- mobile header end -->
    <!-- mobile header end -->

    <!-- offcanvas mobile menu start -->
    <!-- off-canvas menu start -->
    <aside class="off-canvas-wrapper">
        <div class="off-canvas-overlay"></div>
        <div class="off-canvas-inner-content">
            <div class="btn-close-off-canvas">
                <i class="pe-7s-close"></i>
            </div>
                <!-- mobile menu start -->
                <div class="mobile-navigation">

                    <!-- mobile menu navigation start -->
                    <nav>
                        <ul class="mobile-menu">
                            <li class="menu-item-has-children"><a href="index.html">Home</a>
                                <ul class="dropdown">
                                    <li><a href="index.html">Home version 01</a></li>
                                    <li><a href="index-2.html">Home version 02</a></li>
                                    <li><a href="index-3.html">Home version 03</a></li> <li><a href="index-4.html">Home version 04</a></li>
                                    <li><a href="index-5.html">Home version 05</a></li>
                                    <li><a href="index-6.html">Home version 06</a></li>
                                </ul>
                            </li>
                            <li class="menu-item-has-children"><a href="#">pages</a>
                                <ul class="megamenu dropdown">
                                    <li class="mega-title menu-item-has-children"><a href="#">column 01</a>
                                        <ul class="dropdown">
                                            <li><a href="shop.html">shop grid left sidebar</a></li>
                                            <li><a href="shop-grid-right-sidebar.html">shop grid right sidebar</a></li>
                                            <li><a href="shop-list-left-sidebar.html">shop list left sidebar</a></li>
                                            <li><a href="shop-list-right-sidebar.html">shop list right sidebar</a></li>
                                        </ul>
                                    </li>
                                    <li class="mega-title menu-item-has-children"><a href="#">column 02</a>
                                        <ul class="dropdown">
                                            <li><a href="product-details.html">product details</a></li>
                                            <li><a href="product-details-affiliate.html">product details affiliate</a></li>
                                            <li><a href="product-details-variable.html">product details variable</a></li>
                                            <li><a href="privacy-policy.html">privacy policy</a></li>
                                        </ul>
                                    </li>
                                    <li class="mega-title menu-item-has-children"><a href="#">column 03</a>
                                        <ul class="dropdown">
                                            <li><a href="cart.html">cart</a></li>
                                            <li><a href="checkout.html">checkout</a></li>
                                            <li><a href="compare.html">compare</a></li>
                                            <li><a href="wishlist.html">wishlist</a></li>
                                        </ul>
                                    </li>
                                    <li class="mega-title menu-item-has-children"><a href="#">column 04</a>
                                        <ul class="dropdown">
                                            <li><a href="my-account.html">my-account</a></li>
                                            <li><a href="login-register.html">login-register</a></li>
                                            <li><a href="about-us.html">about us</a></li> <li><a href="contact-us.html">contact us</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li class="menu-item-has-children "><a href="#">shop</a>
                                <ul class="dropdown">
                                    <li class="menu-item-has-children"><a href="#">shop grid layout</a>
                                        <ul class="dropdown">
                                            <li><a href="shop.html">shop grid left sidebar</a></li>
                                            <li><a href="shop-grid-right-sidebar.html">shop grid right sidebar</a></li>
                                            <li><a href="shop-grid-full-3-col.html">shop grid full 3 col</a></li>
                                            <li><a href="shop-grid-full-4-col.html">shop grid full 4 col</a></li>
                                        </ul>
                                    </li>
                                    <li class="menu-item-has-children"><a href="#">shop list layout</a>
                                        <ul class="dropdown">
                                            <li><a href="shop-list-left-sidebar.html">shop list left sidebar</a></li>
                                            <li><a href="shop-list-right-sidebar.html">shop list right sidebar</a></li>
                                            <li><a href="shop-list-full-width.html">shop list full width</a></li>
                                        </ul>
                                    </li>
                                    <li class="menu-item-has-children"><a href="#">products details</a>
                                        <ul class="dropdown">
                                            <li><a href="product-details.html">product details</a></li>
                                            <li><a href="product-details-affiliate.html">product details affiliate</a></li>
                                            <li><a href="product-details-variable.html">product details variable</a></li>
                                            <li><a href="product-details-group.html">product details group</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li class="menu-item-has-children "><a href="#">Blog</a>
                                <ul class="dropdown">
                                    <li><a href="blog-left-sidebar.html">blog left sidebar</a></li>
                                    <li><a href="blog-list-left-sidebar.html">blog list left sidebar</a></li>
                                    <li><a href="blog-right-sidebar.html">blog right sidebar</a></li> <li><a href="blog-list-right-sidebar.html">blog list right sidebar</a></li>
                                    <li><a href="blog-grid-full-width.html">blog grid full width</a></li>
                                    <li><a href="blog-details.html">blog details</a></li>
                                    <li><a href="blog-details-left-sidebar.html">blog details left sidebar</a></li>
                                    <li><a href="blog-details-audio.html">blog details audio</a></li>
                                    <li><a href="blog-details-video.html">blog details video</a></li>
                                    <li><a href="blog-details-image.html">blog details image</a></li>
                                </ul>
                            </li>
                            <li><a href="contact-us.html">Contact us</a></li>
                        </ul>
                    </nav>
                    <!-- mobile menu navigation end -->
                </div>
                <!-- mobile menu end -->

                <div class="mobile-settings">
                    <ul class="nav">
                        <li>
                            <div class="dropdown mobile-top-dropdown">
                                <a href="#" class="dropdown-toggle" id="currency" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Currency
                                    <i class="fa fa-angle-down"></i>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="currency">
                                    <a class="dropdown-item" href="#">$ USD</a>
                                    <a class="dropdown-item" href="#">$ EURO</a>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="dropdown mobile-top-dropdown">
                                <a href="#" class="dropdown-toggle" id="myaccount" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    My Account
                                    <i class="fa fa-angle-down"></i>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="myaccount">
                                    <a class="dropdown-item" href="my-account.html">my account</a>
                                    <a class="dropdown-item" href="login-register.html"> login</a>
                                    <a class="dropdown-item" href="login-register.html">register</a>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>

                <!-- offcanvas widget area start -->
                <div class="offcanvas-widget-area">
                    <div class="off-canvas-contact-widget"> <ul>
                            <li><i class="fa fa-mobile"></i>
                                <a href="#">0123456789</a>
                            </li>
                            <li><i class="fa fa-envelope-o"></i>
                                <a href="#">info@yourdomain.com</a>
                            </li>
                        </ul>
                    </div>
                    <div class="off-canvas-social-widget">
                        <a href="#"><i class="fa fa-facebook"></i></a>
                        <a href="#"><i class="fa fa-twitter"></i></a>
                        <a href="#"><i class="fa fa-pinterest-p"></i></a>
                        <a href="#"><i class="fa fa-linkedin"></i></a>
                        <a href="#"><i class="fa fa-youtube-play"></i></a>
                    </div>
                </div>
                <!-- offcanvas widget area end -->
            </div>
        </div>
    </aside>
    <!-- off-canvas menu end -->
    <!-- offcanvas mobile menu end -->
</header>
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
                        <?php if (isset($_SESSION["user_id"])) {
  
    
    // Kiểm tra nếu $listCart là mảng và có dữ liệu
    if (is_array($listCart) && !empty($listCart)) {
        foreach ($listCart as $row) {
            $total = $row["price"] * $row["quantity"];
            $totalAmount += $total;
            ?>
            <li class="minicart-item">
                <div class="minicart-thumb">
                    <a href="?act=productDetail&id=<?=$row["product_id"]?>">
                        <img src="<?= $row["image_variant"]?>" alt="product">
                    </a>
                </div>
                <div class="minicart-content">
                    <h3 class="product-name">
                        <a href="?act=productDetail&id=<?=$row["product_id"]?>"><?=$row["product_name"]?></a>
                    </h3>
                    <p>
                        <span class="cart-quantity">Số Lượng: <?=$row["quantity"]?><strong></strong></span><br>
                        <span class="cart-price">Đơn giá: <?= $row["price"]?></span>
                    </p>
                </div>
                <a href="?act=deleteCart&id=<?=$row["cart_item_id"]?>"><i class="pe-7s-close"></i></a>
            </li>
            <?php 
        }
    } else {
        echo "<li>Giỏ hàng trống</li>";
    }
}
?>

<div class="minicart-pricing-box">
    <ul>
        <li>
            <span>Tổng tiền</span>
            <span><strong><?= isset($totalAmount) ? $totalAmount : 0 ?></strong></span>
        </li>
        <li>
            <span>Voucher</span>
            <span><strong><?= isset($voucher["voucher_code"]) ? $voucher["voucher_code"] : 0 ?></strong></span>
        </li>
        <li class="total">
            <span>Tổng thanh toán</span>
            <span><strong><?= isset($totalAmount) && isset($voucher["voucher_code"]) ? $totalAmount - $voucher["voucher_code"] : 0 ?></strong></span>
        </li>
    </ul>
</div>


                    <div class="minicart-button">
                        <a href="?act=viewCart"><i class="fa fa-shopping-cart"></i> View Cart</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- end Header Area -->
<?php
ob_end_flush(); // Kết thúc output buffer và gửi ra trình duyệt
?>