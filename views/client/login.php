<?php
include "./include/headerClient.php"
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <!-- breadcrumb area start -->
    <div class="breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb-wrap">
                        <nav aria-label="breadcrumb">
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html"><i class="fa fa-home"></i></a></li>
                                <li class="breadcrumb-item active" aria-current="page">login-Register</li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb area end -->

    <!-- login register wrapper start -->
    <div class="login-register-wrapper section-padding">
        <div class="container">
            <div class="member-area-from-wrap">
                <div class="row">
                    <!-- Login Content Start -->
                    <div class="col-lg-6">
                        <div class="login-reg-form-wrap">
                            <h5>Sign In</h5>


                            <form action="?act=login" method="post">
                                <div class="single-input-item">
                                    <input type="text" name="username" placeholder="Username" required />
                                </div>
                                <div class="single-input-item">
                                    <input type="password" name="password" placeholder="Enter your Password" required />
                                </div>
                                <div class="single-input-item">
                                    <div class="login-reg-form-meta d-flex align-items-center justify-content-between">
                                        <div class="remember-meta">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="rememberMe">
                                                <label class="custom-control-label" for="rememberMe">Remember Me</label>
                                            </div>
                                        </div>
                                        <?php
                                        if (isset($_SESSION['login_error'])) {
                                            echo "<p style='color: red;'>" . $_SESSION['login_error'] . "</p>";
                                            unset($_SESSION['login_error']);
                                        }
                                        ?>
                                        <a href="#" class="forget-pwd">Forget Password?</a>
                                    </div>
                                </div>
                                <div class="single-input-item">
                                    <button name="login" class="btn btn-sqr">Login</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- Login Content End -->

                    <!-- Register Content Start -->
                    <div class="col-lg-6">
                        <div class="login-reg-form-wrap sign-up-form">
                            <h5>Singup Form</h5>
                            <form action="?act=singup" method="post">
                                <div class="single-input-item">
                                    <input name="username" type="text" placeholder="Enter your Username" required />
                                    <span class="error-message"><?php echo $usernameError ?? ''; ?></span>
                                </div>
                                <div class="single-input-item">
                                    <input name="email" type="email" placeholder="Enter your Email" required />
                                    <span class="error-message"><?php echo $emailError ?? ''; ?></span>
                                </div>
                                <div class="single-input-item">
                                    <input name="phone" type="phone" placeholder="Enter your Phone" required />
                                    <span class="error-message"><?php echo $phoneError ?? ''; ?></span>
                                </div>
                                <div class="single-input-item">
                                    <input name="address" type="address" placeholder="Enter your Address" required />
                                    <span class="error-message"><?php echo $addressError ?? ''; ?></span>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="single-input-item">
                                            <input name="password" type="password" placeholder="Enter your Password" required />
                                            <span class="error-message"><?php echo $passwordError ?? ''; ?></span>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="single-input-item">
                                            <input name="repeatPassword" type="password" placeholder="Repeat your Password" required />
                                            <span class="error-message"><?php echo $repeatPasswordError ?? ''; ?></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="single-input-item">
                                    <button name="singup" class="btn btn-sqr">Register</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- Register Content End -->
                </div>
            </div>
        </div>
    </div>
    <!-- login register wrapper end -->
</body>

</html>
<?php
include "./include/footerClient.php";
?>