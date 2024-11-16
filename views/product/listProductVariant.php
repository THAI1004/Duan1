<?php

include $_SERVER['DOCUMENT_ROOT'] . '../include/header.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
    .custom-table {
        border-radius: 8px; /* Bo góc */
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Đổ bóng */
        overflow: hidden; /* Để đảm bảo các góc được bo tròn */
    }
</style>
<link rel="stylesheet" href="http://yourdomain.com/Duan1/csss/bootstrap.min.css">
<link rel="stylesheet" href="./csss/font-awesome.min.css">
<link rel="stylesheet" href="./csss/ionicons.min.css">
<link rel="stylesheet" href="./csss/animate.css">
<link rel="stylesheet" href="./csss/nice-select.css">
<link rel="stylesheet" href="./csss/owl.carousel.min.css">
<link rel="stylesheet" href="./csss/mainmenu.css">
<link rel="stylesheet" href="./csss/style.css">
<link rel="stylesheet" href="./csss/responsive.css">

<script src="./jss/vendor/modernizr-2.8.3.min.js"></script>
</head>
<body>
   
<h1>Sản Phẩm</h1>
<div class="content-wraper mt-95">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col">
                            <div class="row single-product-area">
                                <div class="col-xl-4  col-lg-6 offset-xl-1 col-md-5 col-sm-12">
                                    <div class="single-product-tab">
                                        <div class="zoomWrapper">
                                            <div id="img-1" class="zoomWrapper single-zoom">
                                                <a href="#">
                                                    <img id="zoom1" style="width:100%"  src="<?=$Product['image']?>" data-zoom-image="<?=$Product['image']?>" alt="big-1">
                                                </a>
                                            </div>
                                            <br>
                                            <div class="single-zoom-thumb">
                                                <ul class="s-tab-zoom single-product-active owl-carousel" id="gallery_01">
                                                    <?php
                                                    foreach($productVariant as $row){?>

                                            
                                                    <li>
                                                        <a href="#" class="elevatezoom-gallery active" data-update="" data-image="<?=$row['image_variant']?>" data-zoom-image="<?=$row['image_variant']?>"><img src="<?=$row['image_variant']?>" alt="zo-th-1"/></a>
                                                    </li>
                                                    <?php }?>
                                                </ul>
                                            </div>
                                        </div>
                                    </div> 
                                </div>
                                <div class="col-xl-7 col-lg-6 col-md-7 col-sm-12">
                                    <!-- product-thumbnail-content start -->
                                    <div class="quick-view-content">
                                        <div class="product-info">
                                            
                                            <h2><?=$Product['product_name']?></h2>
                                            <div class="rating-box">
                                                <ul class="rating">
                                                    <li><i class="fa fa-star"></i></li>
                                                    <li><i class="fa fa-star"></i></li>
                                                    <li><i class="fa fa-star"></i></li>
                                                    <li><i class="fa fa-star"></i></li>
                                                    <li><i class="fa fa-star"></i></li>
                                                </ul>
                                            </div>
                                            <div class="price-box">
                                               <span class="new-price"><?=$Product['price']?></span>
                                               <span class="old-price">$250.00</span>
                                            </div>
                                            <p>100% cotton double printed dress. Black and white striped top and orange high waisted skater skirt bottom.</p>
                                            <div class="modal-size">
                                                <h4>Size</h4>
                                                <select>
                                                <?php
                                                    foreach($productVariant as $row){?>

                                                        <option title="<?=$row["size_name"]?>" value="1"><?=$row["size_name"]?></option>
                                                    <?php }?>
                                                    
                                                </select>
                                            </div>
                                            <div class="modal-color">
                                                <h4>Color</h4>
                                                <div class="color-list">
                                                    <ul>
                                                    <?php
                                                    foreach($productVariant as $row){?>

                                                        <li><a href="#" style="background:<?=$row['color_code']?> none repeat scroll 0 0;" class=" active"></a></li>
                                                    <?php }?>

                                                        
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="quick-add-to-cart">
                                                <form class="modal-cart">
                                                    <div class="quantity">
                                                        <label>Quantity</label>
                                                        <div class="cart-plus-minus">
                                                            <input disabled class="cart-plus-minus-box" type="number" value="<?=$Product['stock_quantity']?>">
                                                        </div>
                                                    </div>
                                                    <button class="add-to-cart" type="submit">Add to cart</button>
                                                </form>
                                            </div>
                                            <div class="instock">
                                                <p>In stock </p>
                                            </div>
                                            <div class="social-sharing">
                                                <h3>Share</h3>
                                                <ul>
                                                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- product-thumbnail-content end -->
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
            <!-- content-wraper end -->
            
<!-- <table class="table table-striped table-hover table-bordered table-sm text-center custom-table">
<thead class="table-dark">
    <tr>
        <th scope="col">STT</th>
        <th scope="col">Tên</th>
        <th scope="col">Ảnh sản phẩm</th>
        <th scope="col">Mô tả</th>
        <th scope="col">Giá</th>
        <th scope="col">Ngày tạo</th>
        <th scope="col">Ngày sửa</th>
        <th scope="col" colspan="3" class="text-center align-middle">Thao tác</th>
    </tr>
</thead>
<tbody>
    <tr>
        <td><?=$i++?></td>
        <td><?=$Product['product_name']?></td>
        <td >
            <img style="width:100%;height: 100px; " src="<?=$Product['image']?>" alt="">
            </td>
        <td><?=$Product['description']?></td>
        <td><?=$Product['price']?></td>
        <td><?=$Product['created_at']?></td>
        <td><?=$Product['updated_at']?></td>
        <td>
            <a class="btn btn-danger" href="?act=editProduct&id=<?= $row["id"]?>">Sửa</a>
            <a class="btn btn-secondary" onclick="return confirm('Bạn có chắc chắn muốn xóa không?')" href="?act=deleteProduct&id=<?= $row["id"] ?>">Xóa</a>
        </td>
    </tr>
</tbody>
</table>
<h1>Biến thể</h1>
<table class="table table-striped table-hover table-bordered table-sm text-center custom-table">
<thead class="table-dark">
    <tr>
        <th scope="col">STT</th>
        <th scope="col">Màu</th>
        <th scope="col">Size</th>
        <th scope="col">Số lượng</th>
        <th scope="col">Giá giảm</th>
        <th scope="col" colspan="3" class="text-center align-middle">Thao tác</th>
    </tr>
</thead>
<tbody>
    <tr>
        <td><?=$i++?></td>
        <td><?=$Product['product_name']?></td>
        <td >
            <img style="width:100%;height: 100px; " src="<?=$Product['image']?>" alt="">
            </td>
        <td><?=$Product['description']?></td>
        <td><?=$Product['price']?></td>
        <td><?=$Product['created_at']?></td>
        <td><?=$Product['updated_at']?></td>
        <td>
            <a class="btn btn-danger" href="?act=editProduct&id=<?= $row["id"]?>">Sửa</a>
            <a class="btn btn-secondary" onclick="return confirm('Bạn có chắc chắn muốn xóa không?')" href="?act=deleteProduct&id=<?= $row["id"] ?>">Xóa</a>
        </td>
    </tr>
</tbody>
</table> -->
<a class="btn btn-primary" href="?act=addProduct">Thêm biến thể</a>
<script src="./jss/vendor/jquery-3.5.1.min.js"></script>
<script src="./jss/vendor/jquery-migrate-3.3.0.min.js"></script>
<script src="./jss/bootstrap.min.js"></script>
<script src="./jss/owl.carousel.min.js"></script>
<script src="./jss/jquery.mainmenu.js"></script>
<script src="./jss/ajax-email.js"></script>
<script src="./jss/plugins.js"></script>
<script src="./jss/main.js"></script>
</body>
</html>

<?php

include $_SERVER['DOCUMENT_ROOT'] . '/Duan1/include/footer.php';

?>
