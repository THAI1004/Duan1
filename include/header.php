
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    
    <!-- theme meta -->
    <meta name="theme-name" content="quixlab" />
  
    <title>Quixlab - Bootstrap Admin Dashboard Template by Themefisher.com</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="./images/favicon.png">
    <!-- Pignose Calender -->
    <link href="./plugins/pg-calendar/css/pignose.calendar.min.css" rel="stylesheet">
    <!-- Chartist -->
    <link rel="stylesheet" href="./plugins/chartist/css/chartist.min.css">
    <link rel="stylesheet" href="./plugins/chartist-plugin-tooltips/css/chartist-plugin-tooltip.css">
    <!-- Custom Stylesheet -->
    <link href="./css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
</head>
<body>
    

    <div id="preloader">
        <div class="loader">
            <svg class="circular" viewBox="25 25 50 50">
                <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="3" stroke-miterlimit="10" />
            </svg>
        </div>
    </div>
 
    <div id="main-wrapper">


        <div class="nav-header">
            <div class="brand-logo">
                <a href="?act=Trangchu">
                    <b class="logo-abbr"><img src="./images/logo.png" alt=""> </b>
                    <span class="logo-compact"><img src="./images/logo-compact.png" alt=""></span>
                    <span class="brand-title">
                        <img src="./images/logo-text.png" alt="">
                    </span>
                </a>
            </div>
        </div>

        <div class="header">    
            <div class="header-content clearfix">
                
                <div class="nav-control">
                    <div class="hamburger">
                        <span class="toggle-icon"><i class="icon-menu"></i></span>
                    </div>
                </div>
                
                <div class="header-right">
                    <ul class="clearfix">
                        <li class="icons dropdown">
                            <div class="user-img c-pointer position-relative"   data-toggle="dropdown">
                                <i class="fa-regular fa-user" style="font-size: 20px" ></i>
                            </div>
                            <div class="drop-down dropdown-profile animated fadeIn dropdown-menu">
                                <div class="dropdown-content-body">
                                    <ul>
                                        <li>
                                            <a href="?act=homeClient"><i class="icon-user"></i> <span>Home</span></a>
                                        </li>
                                        <hr class="my-2">
                                       
                                        <li><a href="?act=logout"><i class="icon-key"></i> <span>Logout</span></a></li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="nk-sidebar">           
            <div class="nk-nav-scroll">
                <ul class="metismenu" id="menu">
                    <li class="mega-menu mega-menu-sm">
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                        <i class="fa-solid fa-list"></i><span class="nav-text">Danh Mục</span>
                        </a>
                        <ul aria-expanded="false">
                        <li><a href="?act=listDanhMuc">Danh Sách Danh Mục</a></li>
                            <li><a href="?act=addCategory">Thêm Danh Mục</a></li>
                        </ul>
                    </li>
                    <li class="mega-menu mega-menu-sm">
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                        <i class="fa-brands fa-product-hunt"></i><span class="nav-text">Sản Phẩm</span>
                        </a>
                        <ul aria-expanded="false">
                        <li><a href="?act=listProduct">Danh Sách sản phẩm</a></li>
                            <li><a href="?act=addProduct">Thêm Sản Phẩm</a></li>
                        </ul>
                    </li>
                    <li class="mega-menu mega-menu-sm">
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                        <i class="fa-solid fa-user"></i><span class="nav-text">Tài khoản</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="?act=listTKNV">Danh sách nhân viên</a></li>
                            <li><a href="?act=listTKC">Danh sách khách hàng</a></li>
                        </ul>
                    </li>
                    <li class="mega-menu mega-menu-sm">
                        <a  href="?act=listOrder" aria-expanded="false">
                        <i class="fa-solid fa-cart-shopping"></i><span class="nav-text">Quản lý đơn hàng</span>
                        </a>
                    </li>
                    <li class="mega-menu mega-menu-sm">

                        <a href="?act=listReview" aria-expanded="false">
                            <i class="icon-globe-alt menu-icon"></i><span class="nav-text">Quản lý bình luận</span>         
                        </a>
                    </li>
                    <li class="mega-menu mega-menu-sm">
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                        <i class="fa-solid fa-image"></i><span class="nav-text">Quản lí Banner</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="?act=listSlider">Danh sách banner</a></li>
                            <li><a href="?act=addSlider">Thêm Banner</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
        <div class="content-body">

            <div class="container-fluid mt-3">
 
</body>
</html>