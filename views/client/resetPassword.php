<?php
if (isset($_SESSION['login_success'])) {
    echo "<script>
        alert('" . $_SESSION['login_success'] . "');
        window.location.href = 'index.php?act=homeClient';  // Chuyển hướng sau khi nhấn OK
    </script>";
    unset($_SESSION['login_success']);  // Xóa thông báo sau khi đã hiển thị
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="shortcut icon" type="image/x-icon" href="./corano/assets/img/favicon.ico">

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
                                <li class="breadcrumb-item"><a href="?act=homeClient"><i class="fa fa-home"></i></a></li>
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
                            <h5>Nhập Lại Mật Khẩu</h5>

                            <form action="?act=resetPassword" method="post">
                                <div class="single-input-item">
                                    <div class="single-input-item">
                                        <input type="email" name="email" placeholder="Email" required />
                                    </div>
                                    <div class="single-input-item">
                                        <input type="password" name="temp_password" placeholder="Enter temporary password" required>
                                    </div>
                                    <div class="single-input-item">
                                        <input type="password" name="new_password" placeholder="Enter new password" required>
                                    </div>
                                </div>
                                <div class="single-input-item">
                                    <button class="btn btn-sqr">Send Email</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- Login Content End -->

                </div>
            </div>
        </div>
    </div>

</body>

</html>
<?php
include "./include/footerClient.php";
?>