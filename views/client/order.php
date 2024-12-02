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
             <!-- Giữ thẻ h2 inline-block để không đẩy các bảng xuống -->
             <h2 class="mt-3">Chi tiết đơn hàng của tôi</h2>

             <!-- Flex container -->
             <div class="section-bg-color" style="display: flex; justify-content: space-between; align-items: flex-start;">

                 <!-- Bảng 1: Thông tin đơn hàng -->
                 <div class="cart-table table-responsive" style="flex: 1; margin-right: 10px;">
                     <table class="table table-bordered">
                         <thead>
                             <tr>
                                 <th>Thông tin</th>
                                 <th>Chi tiết</th>
                             </tr>
                         </thead>
                         <tbody>
                             <tr>
                                 <td>Địa chỉ</td>
                                 <td>Số nhà <?= $listOrder["so_nha"] ?>, Đường <?= $listOrder["ten_duong"] ?>, Huyện <?= $listOrder["huyen"] ?>, Thành phố <?= $listOrder["thanh_pho"] ?></td>
                             </tr>
                             <tr>
                                 <td>Tên người nhận</td>
                                 <td><?= $listOrder["guest_name"] ?></td>
                             </tr>
                             <tr>
                                 <td>Số điện thoại</td>
                                 <td><?= $listOrder["guest_phone"] ?></td>
                             </tr>
                             <tr>
                                 <td>Trạng thái thanh toán</td>
                                 <td><?= $listOrder["payment_status"] ?></td>
                             </tr>
                             <tr>
                                 <td>Trạng thái vận chuyển</td>
                                 <td><?= $listOrder["shipping_status"] ?></td>
                             </tr>
                             <tr>
                                 <td>Voucher</td>
                                 <td><?= $listOrder["code"] ?></td>
                             </tr>
                             <tr>
                                 <td>Tổng tiền</td>
                                 <td><?= number_format($listOrder["total_price"], 0, '.', ',');  ?> VND</td>
                             </tr>
                             <tr>
                                 <td>Note</td>
                                 <td><?= $listOrder["ordernote"] ?></td>
                             </tr>
                             <tr>
                                 <td>Thao tác</td>
                                 <td>
                                     <?php if ($listOrder["shipping_status"] === "pending") { ?>
                                         <!-- Cho phép hủy khi trạng thái là pending -->
                                         <a class="btn btn-danger custom-btn" href="?act=huyOrder&id=<?= $_GET["id"] ?>">Hủy</a>
                                     <?php } else { ?>
                                         <!-- Thông báo alert khi trạng thái không phải là pending -->
                                         <a class="btn btn-danger custom-btn" href="javascript:void(0);" onclick="alert('Bạn không thể hủy đơn hàng vì trạng thái hiện tại không cho phép.');">Hủy</a>
                                     <?php } ?>
                                 </td>

                             </tr>
                         </tbody>
                     </table>
                 </div>

                 <!-- Bảng 2: Danh sách sản phẩm -->
                 <div class="cart-table table-responsive" style="flex: 1; margin-left: 10px;">
                     <h3 class="">Danh sách sản phẩm</h3>
                     <table class="table table-bordered">
                         <thead>
                             <tr>
                                 <th>Ảnh sản phẩm</th>
                                 <th>Chi tiết</th>
                             </tr>
                         </thead>
                         <tbody>
                             <?php foreach ($listItem as $row) {
                                    $total = $row["quantity"] * $row["unit_price"];
                                ?>
                                 <tr>
                                     <td class="pro-thumbnail">
                                         <img class="img-fluid" src="<?= $row["image_variant"] ?>" alt="Product" />
                                     </td>
                                     <td>
                                         Tên: <?= $row["product_name"] ?><br>
                                         Phân loại: <?= $row["color_name"] ?> - <?= $row["size_name"] ?><br>
                                         Giá: <?= number_format($row["unit_price"], 0, '.', ',');  ?> VND<br>
                                         Số lượng: <?= $row["quantity"] ?><br>
                                         Tổng tiền: <?= number_format($total, 0, '.', ',')  ?> VND
                                     </td>
                                 </tr>
                             <?php } ?>
                         </tbody>
                     </table>
                 </div>
             </div>
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