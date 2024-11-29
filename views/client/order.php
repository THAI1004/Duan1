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
     /* Nút Hủy */
     .custom-btn {
         padding: 10px 20px;
         font-size: 16px;
         border-radius: 5px;
         background-color: #dc3545;
         color: white;
         font-weight: bold;
         text-decoration: none;
         text-align: center;
         box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
         transition: background-color 0.3s ease, transform 0.3s ease;
     }

     .custom-btn:hover {
         background-color: #c82333;
         transform: scale(1.05);
         /* Hiệu ứng phóng to khi hover */
     }

     .custom-btn:active {
         background-color: #bd2130;
         transform: scale(1);
         /* Khi nhấn, giảm hiệu ứng phóng to */
     }

     .custom-btn:focus {
         outline: none;
         box-shadow: 0 0 0 2px rgba(220, 53, 69, 0.5);
         /* Hiệu ứng focus */
     }
 </style>
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
                                 <li class="breadcrumb-item active" aria-current="page">Chi tiết đơn hàng</li>
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
         <div class="m-5">
             <h2>Chi tiết đơn hàng của tôi</h2>
             <!-- Wishlist Page Content Start -->
             <div class="section-bg-color">
                 <div class="row">
                     <div class="col-lg-12">
                         <!-- Wishlist Table Area -->

                         <div class="cart-table table-responsive">
                             <table class="table table-bordered">
                                 <thead>
                                     <tr>
                                         <th class="pro-thumbnail">Địa chỉ</th>
                                         <th class="pro-title">Tên người nhận</th>
                                         <th class="pro-price">Số điện thoại</th>
                                         <th class="pro-quantity">Trạng thái thanh toán</th>
                                         <th class="pro-subtotal">Trạng thái vận chuyển</th>
                                         <th class="pro-remove">Voucher</th>
                                         <th class="pro-remove">Tổng tiền</th>
                                         <th class="pro-remove">Note</th>
                                         <th class="pro-remove">Tương tác</th>
                                     </tr>
                                 </thead>
                                 <tbody>


                                     <tr>
                                         <td>Số nhà <?= $listOrder["so_nha"] ?>, Đường <?= $listOrder["ten_duong"] ?>, Huyện <?= $listOrder["huyen"] ?>, Thành phố <?= $listOrder["thanh_pho"] ?></td>
                                         <td><?= $listOrder["guest_name"] ?></td>
                                         <td><?= $listOrder["guest_phone"] ?></td>
                                         <td><?= $listOrder["payment_status"] ?></td>
                                         <td><?= $listOrder["shipping_status"] ?></td>
                                         <td><?= $listOrder["code"] ?></td>
                                         <td><?= $listOrder["total_price"] ?></td>
                                         <td><?= $listOrder["ordernote"] ?></td>
                                         <td>
                                             <a class="btn btn-danger custom-btn" href="?act=huyOrder&id=<?= $_GET["id"] ?>">Hủy</a>
                                         </td>
                                     </tr>
                                 </tbody>
                             </table>

                         </div>
                         <div class="cart-table table-responsive container ">
                             <h3 class="mt-3" style="text-align: center;">Danh sách sản phẩm</h3>
                             <table class="table table-bordered">
                                 <thead>
                                     <tr>
                                         <th class="pro-thumbnail">Ảnh sản phẩm</th>
                                         <th class="pro-title">Tên sản phẩm</th>
                                         <th class="pro-price">Giá</th>
                                         <th class="pro-quantity">Số lượng</th>
                                         <th class="pro-subtotal">Tổng tiền</th>
                                     </tr>
                                 </thead>
                                 <tbody>

                                     <?php


                                        foreach ($listItem as $row) {
                                            $total = $row["quantity"] * $row["unit_price"];
                                        ?>
                                         <tr>
                                             <td class="pro-thumbnail"><img class="img-fluid" src="<?= $row["image_variant"] ?>" alt="Product" /></td>
                                             <td class="pro-title"><?= $row["product_name"] ?><p><?= $row["color_name"] ?> - <?= $row["size_name"] ?></p>
                                             </td>
                                             <td class="pro-price"><span><?= $row["unit_price"] ?></span></td>
                                             <td class="pro-quantity">

                                                 <span><?= $row["quantity"] ?></span>

                                             </td>
                                             <td class="pro-subtotal"><span><?= $total ?></span></td>

                                         </tr>
                                     <?php }
                                        ?>
                                 </tbody>
                             </table>
                         </div>
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