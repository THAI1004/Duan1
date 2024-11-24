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
                        <h5 class="checkout-title">Billing Details</h5>
                        <div class="billing-form-wrap">
                            <form action="#">
                                <div class="row">
                                    <div class="col-md-6">
                                    </div>
                                </div>
                                <div class="single-input-item">
                                    <label for="name" class="required">Name</label>
                                    <input type="text" id="name" placeholder="Name" required />
                                </div>

                                <div class="single-input-item">
                                    <label for="email" class="required">Email Address</label>
                                    <input type="email" id="email" placeholder="Email Address" required />
                                </div>

                                <div class="single-input-item">
                                    <label for="phone">Phone</label>
                                    <input type="text" id="phone" placeholder="Phone" />
                                </div>

                                <div class="single-input-item">
                                    <label for="street-address" class="required mt-20">Street address</label>
                                    <input type="text" id="street-address" placeholder="Street address Line " required />
                                </div>

                                <div class="single-input-item">
                                    <label for="town" class="required">Town / City</label>
                                    <input type="text" id="town" placeholder="Town / City" required />
                                </div>

                                <div class="single-input-item">
                                    <label for="state">State / Divition</label>
                                    <input type="text" id="state" placeholder="State / Divition" />
                                </div>

                                <div class="single-input-item">
                                    <label for="postcode" class="required">Postcode / ZIP</label>
                                    <input type="text" id="postcode" placeholder="Postcode / ZIP" required />
                                </div>



                                <div class="checkout-box-wrap">
                                    <div class="single-input-item">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="create_pwd">
                                            <label class="custom-control-label" for="create_pwd">Create an
                                                account?</label>
                                        </div>
                                    </div>
                                    <div class="account-create single-form-row">
                                        <p>Create an account by entering the information below. If you are a
                                            returning customer please login at the top of the page.</p>
                                        <div class="single-input-item">
                                            <label for="pwd" class="required">Account Password</label>
                                            <input type="password" id="pwd" placeholder="Account Password" required />
                                        </div>
                                    </div>
                                </div>

                                <div class="checkout-box-wrap">
                                    <div class="single-input-item">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="ship_to_different">
                                            <label class="custom-control-label" for="ship_to_different">Ship to a
                                                different address?</label>
                                        </div>
                                    </div>
                                    <div class="ship-to-different single-form-row">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="single-input-item">
                                                    <label for="f_name_2" class="required">First Name</label>
                                                    <input type="text" id="f_name_2" placeholder="First Name" required />
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="single-input-item">
                                                    <label for="l_name_2" class="required">Last Name</label>
                                                    <input type="text" id="l_name_2" placeholder="Last Name" required />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="single-input-item">
                                            <label for="email_2" class="required">Email Address</label>
                                            <input type="email" id="email_2" placeholder="Email Address" required />
                                        </div>

                                        <div class="single-input-item">
                                            <label for="com-name_2">Company Name</label>
                                            <input type="text" id="com-name_2" placeholder="Company Name" />
                                        </div>

                                        <div class="single-input-item">
                                            <label for="country_2" class="required">Country</label>
                                            <select name="country" id="country_2">
                                                <option value="Bangladesh">Bangladesh</option>
                                                <option value="India">India</option>
                                                <option value="Pakistan">Pakistan</option>
                                                <option value="England">England</option>
                                                <option value="London">London</option>
                                                <option value="London">London</option>
                                                <option value="Chaina">Chaina</option>
                                            </select>
                                        </div>

                                        <div class="single-input-item">
                                            <label for="street-address_2" class="required mt-20">Street address</label>
                                            <input type="text" id="street-address_2" placeholder="Street address Line 1" required />
                                        </div>

                                        <div class="single-input-item">
                                            <input type="text" placeholder="Street address Line 2 (Optional)" />
                                        </div>

                                        <div class="single-input-item">
                                            <label for="town_2" class="required">Town / City</label>
                                            <input type="text" id="town_2" placeholder="Town / City" required />
                                        </div>

                                        <div class="single-input-item">
                                            <label for="state_2">State / Divition</label>
                                            <input type="text" id="state_2" placeholder="State / Divition" />
                                        </div>

                                        <div class="single-input-item">
                                            <label for="postcode_2" class="required">Postcode / ZIP</label>
                                            <input type="text" id="postcode_2" placeholder="Postcode / ZIP" required />
                                        </div>
                                    </div>
                                </div>

                                <div class="single-input-item">
                                    <label for="ordernote">Order Note</label>
                                    <textarea name="ordernote" id="ordernote" cols="30" rows="3" placeholder="Notes about your order, e.g. special notes for delivery."></textarea>
                                </div>
                                <form action="#" method="post" class=" d-block d-md-flex ">
                                    <input type="text" placeholder="Enter Your Coupon Code" required />
                                    <button class="btn btn-sqr">Apply Coupon</button>
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
                                        <tr>
                                            <th>Products</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><a href="product-details.html">Suscipit Vestibulum <strong> × 1</strong></a>
                                            </td>
                                            <td>$165.00</td>
                                        </tr>
                                        <tr>
                                            <td><a href="product-details.html">Ami Vestibulum suscipit <strong> × 4</strong></a>
                                            </td>
                                            <td>$165.00</td>
                                        </tr>
                                        <tr>
                                            <td><a href="product-details.html">Vestibulum suscipit <strong> × 2</strong></a>
                                            </td>
                                            <td>$165.00</td>
                                        </tr>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td>Sub Total</td>
                                            <td><strong>$400</strong></td>
                                        </tr>
                                        <tr>
                                            <td>Shipping</td>
                                            <td class="d-flex justify-content-center">
                                                <ul class="shipping-type">
                                                    <li>
                                                        <div class="custom-control custom-radio">
                                                            <input type="radio" id="flatrate" name="shipping" class="custom-control-input" checked />
                                                            <label class="custom-control-label" for="flatrate">Flat
                                                                Rate: $70.00</label>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="custom-control custom-radio">
                                                            <input type="radio" id="freeshipping" name="shipping" class="custom-control-input" />
                                                            <label class="custom-control-label" for="freeshipping">Free
                                                                Shipping</label>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Total Amount</td>
                                            <td><strong>$470</strong></td>
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