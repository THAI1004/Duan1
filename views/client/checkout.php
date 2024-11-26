<!-- CSS
	============================================ -->
<!-- google fonts -->
<link href="https://fonts.googleapis.com/css?family=Lato:300,300i,400,400i,700,900" rel="stylesheet">
<!-- Bootstrap CSS -->
<link rel="stylesheet" href="./cẩnoassets/css/vendor/bootstrap.min.css">
<!-- Pe-icon-7-stroke CSS -->
<link rel="stylesheet" href="./cẩnoassets/css/vendor/pe-icon-7-stroke.css">
<!-- Font-awesome CSS -->
<link rel="stylesheet" href="./cẩnoassets/css/vendor/font-awesome.min.css">
<!-- Slick slider css -->
<link rel="stylesheet" href="./cẩnoassets/css/plugins/slick.min.css">
<!-- animate css -->
<link rel="stylesheet" href="./cẩnoassets/css/plugins/animate.css">
<!-- Nice Select css -->
<link rel="stylesheet" href="./cẩnoassets/css/plugins/nice-select.css">
<!-- jquery UI css -->
<link rel="stylesheet" href="./cẩnoassets/css/plugins/jqueryui.min.css">
<!-- main style css -->
<link rel="stylesheet" href="./cẩnoassets/css/style.css">
<main>
    <!-- breadcrumb area start -->
    <div class="breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb-wrap">
                        <nav aria-label="breadcrumb">
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html"><i class="fa fa-home"></i></a></li>
                                <li class="breadcrumb-item"><a href="shop.html">shop</a></li>
                                <li class="breadcrumb-item active" aria-current="page">checkout</li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb area end -->

    <!-- checkout main wrapper start -->
    <div class="checkout-page-wrapper section-padding">
        <div class="container">
            <div class="row">
                <div class="col-12">
                </div>
            </div>
            <div class="row">
                <!-- Checkout Billing Details -->
                <div class="col-lg-6">
                    <div class="checkout-billing-details-wrap">
                        <h5 class="checkout-title">Thông tin đơn hàng</h5>
                        <div class="billing-form-wrap">
                            <?php
                            // session_start();

                            // Kiểm tra nếu có dữ liệu POST được gửi từ form
                            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                                // Lưu thông tin người dùng vào session
                                $_SESSION['user_data'] = [
                                    'name' => $_POST['name'] ?? '',
                                    'email' => $_POST['email'] ?? '',
                                    'phone' => $_POST['phone'] ?? '',
                                    'address' => $_POST['address'] ?? '',
                                    'city' => $_POST['city'] ?? '',
                                    'huyen' => $_POST['huyen'] ?? '',
                                    'road' => $_POST['road'] ?? '',
                                    'number' => $_POST['number'] ?? '',
                                    'note' => $_POST['ordernote'] ?? '',
                                    'voucher_code' => $_POST['voucher_code'] ?? '',
                                    'voucher_discount' => $_POST['voucher'] ?? 0,
                                    'shipping' => $_POST['shipping'] ?? 0,  // Giả sử voucher là giá trị giảm giá
                                    // Giả sử voucher là giá trị giảm giá
                                ];
                            }

                            // Lấy dữ liệu từ session để điền vào form
                            $user_data = $_SESSION['user_data'] ?? [];

                            ?>

                            <form action="" method="post">
                                <div class="row">
                                    <div class="col-md-6">
                                    </div>
                                </div>
                                <div class="single-input-item">
                                    <label for="name" class="required">Vui lòng nhập tên:</label>
                                    <input type="text" id="name" name="name" placeholder="Enter Name" value="<?= $user_data['name'] ?? '' ?>" required />
                                </div>

                                <div class="single-input-item">
                                    <label for="email" class="required">Email:</label>
                                    <input type="email" id="email" name="email" placeholder="Enter Email" value="<?= $user_data['email'] ?? '' ?>" required />
                                </div>

                                <div class="single-input-item">
                                    <label for="phone">Số điện thoại:</label>
                                    <input type="text" id="phone" name="phone" placeholder="Enter Phone" value="<?= $user_data['phone'] ?? '' ?>" required />
                                </div>

                                <div class="single-input-item">
                                    <label for="street-address" class="required mt-20">Địa chỉ:</label>
                                    <input type="text" id="street-address" name="address" placeholder="Enter Street address Line" value="<?= $user_data['address'] ?? '' ?>" required />
                                </div>

                                <div class="single-input-item">
                                    <label for="town" class="required ">Thành phố:</label>
                                    <input type="text" id="town" name="city" placeholder="City" value="<?= $user_data['city'] ?? '' ?>" required />
                                </div>

                                <div class="single-input-item">
                                    <label for="huyen" class="required ">Tên Huyện:</label>
                                    <input type="text" id="huyen" name="huyen" placeholder="Enter District" value="<?= $user_data['huyen'] ?? '' ?>" />
                                </div>

                                <div class="single-input-item">
                                    <label for="road" class="required ">Tên đường:</label>
                                    <input type="text" id="road" name="road" placeholder="Enter Road" value="<?= $user_data['road'] ?? '' ?>" />
                                </div>

                                <div class="single-input-item">
                                    <label for="number" class="required">Số nhà:</label>
                                    <input type="text" id="number" name="number" placeholder="Enter Number" value="<?= $user_data['number'] ?? '' ?>" required />
                                </div>

                                <div class="single-input-item">
                                    <label for="ordernote">Order Note</label>
                                    <textarea name="ordernote" id="ordernote" cols="30" rows="3" placeholder="Notes about your order, e.g. special notes for delivery."><?= $user_data['note'] ?? '' ?></textarea>
                                </div>

                                <form action="?act=updateCartVoucher" method="post" class="d-block d-md-flex">
                                    <?php if (isset($_SESSION["user_data"])) { ?> <td>
                                            <label for="shipping">Mã giảm giá:</label>
                                            <select name="voucher" id="voucher">
                                                <!-- Nếu voucher discount là 0, hiển thị option mặc định -->
                                                <option value="0" <?= $_SESSION["user_data"]["voucher_discount"] == 0 ? 'selected' : '' ?>>Chọn voucher của bạn</option>

                                                <?php foreach ($vouchers as $row) { ?>
                                                    <option value="<?= $row["discount_amount"] ?>" <?= $_SESSION["user_data"]["voucher_discount"] == $row["discount_amount"] ? 'selected' : '' ?>>
                                                        <?= $row["code"] ?>
                                                    </option>
                                                <?php } ?>
                                            </select>
                                        </td>
                                        <div class="single-input-item">
                                            <label for="shipping">Phương thức vận chuyển:</label>
                                            <select name="shipping" id="shipping">
                                                <option value="50000" <?= $_SESSION['user_data']['shipping'] == 50000 ? 'selected' : '' ?>>Hỏa tốc: 50000đ</option>
                                                <option value="0" <?= $_SESSION['user_data']['shipping'] == 0 ? 'selected' : '' ?>>Free Shipping</option>
                                            </select>
                                        </div>
                                    <?php } else { ?>
                                        <td>
                                            <label for="shipping">Mã giảm giá:</label>
                                            <select name="voucher" id="voucher">
                                                <!-- Nếu voucher discount là 0, hiển thị option mặc định -->
                                                <option value="0">Chọn voucher của bạn</option>

                                                <?php foreach ($vouchers as $row) { ?>
                                                    <option value="<?= $row["discount_amount"] ?>">
                                                        <?= $row["code"] ?>
                                                    </option>
                                                <?php } ?>
                                            </select>
                                        </td>
                                        <div class="single-input-item">
                                            <label for="shipping">Phương thức vận chuyển:</label>
                                            <select name="shipping" id="shipping">
                                                <option value="50000">Hỏa tốc: 50000đ</option>
                                                <option value="0">Free Shipping</option>
                                            </select>
                                        </div>
                                    <?php } ?>



                                    <td>
                                        <button type="submit" name="submit" class="btn btn-sqr">Áp dụng voucher</button>
                                    </td>
                                </form>
                            </form>

                        </div>
                    </div>
                </div>

                <!-- Order Summary Details -->
                <div class="col-lg-6">
                    <div class="order-summary-details">
                        <h5 class="checkout-title">Your Order Summary</h5>
                        <div class="order-summary-content">
                            <!-- Order Summary Table -->
                            <div class="order-summary-table table-responsive text-center">
                                <table class="table table-bordered">
                                    <thead>

                                    </thead>
                                    <tbody>
                                        <?php
                                        foreach ($listCart as $product) {
                                            $total = $product["unit_price"] * $product["quantity"];
                                        ?>
                                            <tr>
                                                <td><a href="?act=productDetail&id=<?= $product["id"] ?>"> <?= $product["product_name"] ?><strong> × <?= $product["quantity"] ?></strong>
                                                        <p><?= $product["color_name"] ?> - <?= $product["size_name"] ?></p>
                                                    </a></td>
                                                <td><?= $total ?>đ</td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td>Tổng tiền thanh toán</td>
                                            <td><strong><?= $subTotal ?>đ</strong></td>
                                        </tr>
                                        <tr>
                                            <td>Voucher</td>
                                            <td><strong><?= $voucherDiscount ?>đ</strong></td>
                                        </tr>

                                        <tr>
                                            <td>Shipping</td>

                                            <td><strong><?= isset($_SESSION["user_data"]) ? $_SESSION["user_data"]["shipping"] : 0 ?>đ</strong></td>

                                        </tr>
                                        <tr>
                                            <td>Tổng phí thanh toán</td>
                                            <td><strong><?= $totalAmount ?>đ</strong></td>
                                        </tr>
                                    </tfoot>

                                </table>
                            </div>
                            <!-- Order Payment Method -->
                            <div class="order-payment-method">
                                <div class="single-payment-method show">
                                    <div class="payment-method-name">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="cashon" name="paymentmethod" value="cash" class="custom-control-input" checked />
                                            <label class="custom-control-label" for="cashon">Cash On Delivery</label>
                                        </div>
                                    </div>
                                    <div class="payment-method-details" data-method="cash">
                                        <p>Pay with cash upon delivery.</p>
                                    </div>
                                </div>
                                <div class="single-payment-method">
                                    <div class="payment-method-name">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="directbank" name="paymentmethod" value="bank" class="custom-control-input" />
                                            <label class="custom-control-label" for="directbank">Direct Bank
                                                Transfer</label>
                                        </div>
                                    </div>
                                    <div class="payment-method-details" data-method="bank">
                                        <p>Make your payment directly into our bank account. Please use your Order
                                            ID as the payment reference. Your order will not be shipped until the
                                            funds have cleared in our account..</p>
                                    </div>
                                </div>
                                <div class="single-payment-method">
                                    <div class="payment-method-name">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="checkpayment" name="paymentmethod" value="check" class="custom-control-input" />
                                            <label class="custom-control-label" for="checkpayment">Pay with
                                                Check</label>
                                        </div>
                                    </div>
                                    <div class="payment-method-details" data-method="check">
                                        <p>Please send a check to Store Name, Store Street, Store Town, Store State
                                            / County, Store Postcode.</p>
                                    </div>
                                </div>
                                <div class="single-payment-method">
                                    <div class="payment-method-name">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="paypalpayment" name="paymentmethod" value="paypal" class="custom-control-input" />
                                        </div>
                                    </div>
                                    <div class="payment-method-details" data-method="paypal">
                                        <p>Pay via PayPal; you can pay with your credit card if you don’t have a
                                            PayPal account.</p>
                                    </div>
                                </div>
                                <div class="summary-footer-area">
                                    <div class="custom-control custom-checkbox mb-20">
                                        <input type="checkbox" class="custom-control-input" id="terms" required />
                                        <label class="custom-control-label" for="terms">I have read and agree to
                                            the website <a href="index.html">terms and conditions.</a></label>
                                    </div>
                                    <button type="submit" class="btn btn-sqr">Place Order</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- checkout main wrapper end -->

    <!-- JS
============================================ -->

    <!-- Modernizer JS -->
    <script src="./cẩnoassets/js/vendor/modernizr-3.6.0.min.js"></script>
    <!-- jQuery JS -->
    <script src="./cẩnoassets/js/vendor/jquery-3.6.0.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="./cẩnoassets/js/vendor/bootstrap.bundle.min.js"></script>
    <!-- slick Slider JS -->
    <script src="./cẩnoassets/js/plugins/slick.min.js"></script>
    <!-- Countdown JS -->
    <script src="./cẩnoassets/js/plugins/countdown.min.js"></script>
    <!-- Nice Select JS -->
    <script src="./cẩnoassets/js/plugins/nice-select.min.js"></script>
    <!-- jquery UI JS -->
    <script src="./cẩnoassets/js/plugins/jqueryui.min.js"></script>
    <!-- Image zoom JS -->
    <script src="./cẩnoassets/js/plugins/image-zoom.min.js"></script>
    <!-- Images loaded JS -->
    <script src="./cẩnoassets/js/plugins/imagesloaded.pkgd.min.js"></script>
    <!-- mail-chimp active js -->
    <script src="./cẩnoassets/js/plugins/ajaxchimp.js"></script>
    <!-- contact form dynamic js -->
    <script src="./cẩnoassets/js/plugins/ajax-mail.js"></script>
    <!-- google map api -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCfmCVTjRI007pC1Yk2o2d_EhgkjTsFVN8"></script>
    <!-- google map active js -->
    <script src="./cẩnoassets/js/plugins/google-map.js"></script>
    <!-- Main JS -->
    <script src="./cẩnoassets/js/main.js"></script>
</main>
<?php include "./include/footerClient.php"; ?>