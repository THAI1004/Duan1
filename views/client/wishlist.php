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
                                 <li class="breadcrumb-item active" aria-current="page">wishlist</li>
                             </ul>
                         </nav>
                     </div>
                 </div>
             </div>
         </div>
     </div>
     <!-- breadcrumb area end -->

     <!-- wishlist main wrapper start -->
     <div class="wishlist-main-wrapper section-padding">
         <div class="container">
             <!-- Wishlist Page Content Start -->
             <div class="section-bg-color">
                 <div class="row">
                     <div class="col-lg-12">
                         <!-- Wishlist Table Area -->
                         <?php
                            if (count($wishlist) != 0) { ?>
                             <div class="cart-table table-responsive">
                                 <table class="table table-bordered">
                                     <thead>
                                         <tr>
                                             <th class="pro-thumbnail">Thumbnail</th>
                                             <th class="pro-title">Product</th>
                                             <th class="pro-price">Price</th>
                                             <th class="pro-quantity">Stock Status</th>
                                             <th class="pro-subtotal">Chi tiết</th>
                                             <th class="pro-remove">Remove</th>
                                         </tr>
                                     </thead>
                                     <tbody>
                                         <?php if (isset($wishlist)) {
                                                foreach ($wishlist as $row) { ?>
                                                 <tr>
                                                     <td class="pro-thumbnail"><a href="?act=productDetail&id=<?= $row["product_id"] ?>"><img class="img-fluid" src="<?= $row["product_image"] ?>" alt="Product" /></a></td>
                                                     <td class="pro-title"><a href="?act=productDetail&id=<?= $row["product_id"] ?>"><?= $row["product_name"] ?></a></td>
                                                     <td class="pro-price"><span><?= number_format($row["product_price"], 0, '.', ',');   ?></span></td>
                                                     <td class="pro-quantity"><span class="text-success">In Stock</span></td>
                                                     <td class="pro-subtotal"><a href="?act=productDetail&id=<?= $row["product_id"] ?>" class="btn btn-sqr">Chi tiết sản phẩm</a></td>
                                                     <td class="pro-remove"><a href="?act=deleteWishlist&id=<?= $row["product_id"] ?>"><i class="fa fa-trash-o"></i></a></td>
                                                 </tr>
                                         <?php }
                                            } ?>
                                     </tbody>
                                 </table>
                             </div>
                         <?php } else {
                                echo ("Chưa có sản phẩm yêu thích nào mời bạn thêm sản phẩm yêu thích!!!");
                            } ?>

                     </div>
                 </div>
             </div>
             <!-- Wishlist Page Content End -->
         </div>
     </div>
     <!-- wishlist main wrapper end -->
 </main>

 <!-- Scroll to top start -->
 <div class="scroll-top not-visible">
     <i class="fa fa-angle-up"></i>
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
 <?php
    include "./include/footerClient.php";
    ?>