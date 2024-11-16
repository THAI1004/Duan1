<?php

include $_SERVER['DOCUMENT_ROOT'] . '/Duan1/include/header.php';
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
<div class="content-wraper ">
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
                                            
                                            <h2>Tên sản phẩm: <?=$Product['product_name']?></h2> 
                                            <div class="price-box">
                                               <span class="new-price">Giá: <?=$Product['price']?></span>
                                               <span class="old-price"><?= $Product['discount_price']?></span>
                                            </div>
                                            <p>Mô tả: 100% cotton double printed dress. Black and white striped top and orange high waisted skater skirt bottom.</p>
                                            
                                            
                                            
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
            <br><br>
            <h3>Danh sách biến thể</h3>
<table class="table table-striped table-hover table-bordered table-sm text-center custom-table">
<thead class="table-dark">
    <tr>
        <th scope="col">STT</th>
        <th scope="col">Màu</th>
        <th scope="col">Size</th>
        <th scope="col">Số lượng</th>
        <th scope="col">Ảnh biến thể</th>
        <th scope="col" colspan="3" class="text-center align-middle">Thao tác</th>
    </tr>
</thead>
<tbody>
    
<?php
$i=1;
foreach($productVariant as $row){?>

    <tr >
        <td><?=$i++?></td>
        <td><?=$row["color_name"]?></td>
        <td><?=$row['size_name']?></td>
        <td><?=$row["stock_quantity"]?></td>
        <td><img style="width: 70px;" src="<?=$row["image_variant"]?>" alt=""></td>
        <td>
            <a class="btn btn-danger" href="?act=updateVariant&id=<?=$row['product_id']?>&idVariant=<?=$row["variant_id"]?>">Sửa</a>
            <a class="btn btn-secondary" onclick="return confirm('Bạn có chắc chắn muốn xóa không?')" href="?act=deleteVariant&id=<?=$row['product_id']?>&idVariant=<?=$row["variant_id"]?>">Xóa</a>
        </td>
    </tr>
<?php } ?>
</tbody>
</table>
<a class="btn btn-primary" href="?act=addVariant&id=<?=$Product['id']?>">Thêm biến thể</a>

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
