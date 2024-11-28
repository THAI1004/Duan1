<?php

include './include/header.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sản Phẩm</title>
    <style>
        /* Cải tiến giao diện của bảng */
        .custom-table {
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            margin-top: 20px;
        }

        .table th,
        .table td {
            padding: 12px 15px;
            text-align: center;
            font-size: 14px;
        }

        .table th {
            background-color: #007bb5;
            color: #fff;
            font-weight: bold;
        }

        .table-striped tbody tr:nth-of-type(odd) {
            background-color: #f9f9f9;
        }

        .table-hover tbody tr:hover {
            background-color: #f1f1f1;
        }

        /* Cải tiến nút bấm */
        .btn {
            padding: 8px 16px;
            font-size: 14px;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            transition: background-color 0.3s ease, transform 0.3s ease;
            text-transform: uppercase;
        }

        .btn:hover {
            transform: translateY(-2px);
        }

        .btn-danger {
            background-color: #dc3545;
            color: white;
        }

        .btn-danger:hover {
            background-color: #c82333;
        }

        .btn-secondary {
            background-color: #6c757d;
            color: white;
        }

        .btn-secondary:hover {
            background-color: #5a6268;
        }

        .btn-primary {
            background-color: #007bff;
            color: white;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        /* Cải tiến giao diện của phần hình ảnh sản phẩm */
        /* Cân chỉnh ảnh sản phẩm */
        .single-zoom img {
            width: 100%;
            height: 300px;
            /* Đặt chiều cao cố định cho ảnh */
            object-fit: cover;
            /* Đảm bảo ảnh không bị méo và giữ tỷ lệ */
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .single-zoom-thumb img {
            width: 100%;
            height: 60px;
            /* Đặt chiều cao cố định cho thumbnail */
            object-fit: cover;
            border-radius: 8px;
            cursor: pointer;
            transition: transform 0.3s ease;
        }

        .single-zoom-thumb img:hover {
            transform: scale(1.1);
        }

        /* Cải thiện giao diện tổng thể của phần sản phẩm */
        .single-product-area {
            display: flex;
            justify-content: space-between;
            gap: 30px;
            margin-top: 20px;
        }

        .single-product-area .col-xl-4,
        .single-product-area .col-xl-7 {
            padding: 15px;
        }

        .quick-view-content {
            padding-left: 20px;
        }

        .product-info h2 {
            font-size: 1.6rem;
            font-weight: bold;
            margin-bottom: 15px;
        }

        .price-box {
            margin-bottom: 20px;
        }

        .new-price {
            font-size: 1.25rem;
            font-weight: bold;
            color: #007bff;
        }

        .old-price {
            text-decoration: line-through;
            font-size: 1rem;
            color: #6c757d;
        }

        /* Responsive cho thiết bị di động */
        @media (max-width: 768px) {
            .single-product-area {
                flex-direction: column;
                align-items: center;
            }

            .col-xl-4,
            .col-xl-7 {
                width: 100%;
                margin-bottom: 15px;
            }

            .product-info h2 {
                font-size: 1.4rem;
            }

            .new-price {
                font-size: 1.1rem;
            }

            .old-price {
                font-size: 0.9rem;
            }
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
    <div class="content-wraper">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <div class="row single-product-area">
                        <div class="col-xl-4 col-lg-6 offset-xl-1 col-md-5 col-sm-12">
                            <div class="single-product-tab">
                                <div class="zoomWrapper">
                                    <div id="img-1" class="zoomWrapper single-zoom">
                                        <a href="#">
                                            <img id="zoom1" src="<?= $Product['image'] ?>" alt="big-1">
                                        </a>
                                    </div>
                                    <br>
                                    <div class="single-zoom-thumb">
                                        <ul class="s-tab-zoom single-product-active owl-carousel" id="gallery_01">
                                            <?php foreach ($productVariant as $row) { ?>
                                                <li>
                                                    <a href="#" class="elevatezoom-gallery active" data-image="<?= $row['image_variant'] ?>" data-zoom-image="<?= $row['image_variant'] ?>">
                                                        <img src="<?= $row['image_variant'] ?>" alt="zo-th-1" />
                                                    </a>
                                                </li>
                                            <?php } ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-7 col-lg-6 col-md-7 col-sm-12">
                            <div class="quick-view-content">
                                <div class="product-info">
                                    <h2>Tên sản phẩm: <?= $Product['product_name'] ?></h2>
                                    <div class="price-box">
                                        <span class="new-price">Giá: <?= $Product['price'] ?></span>
                                        <span class="old-price"><?= $Product['discount_price'] ?></span>
                                    </div>
                                    <p>Mô tả: <?= $Product["description"] ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

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
            <?php $i = 1;
            foreach ($productVariant as $row) { ?>
                <tr>
                    <td><?= $i++ ?></td>
                    <td><?= $row["color_name"] ?></td>
                    <td><?= $row['size_name'] ?></td>
                    <td><?= $row["stock_quantity"] ?></td>
                    <td><img style="width: 70px;" src="<?= $row["image_variant"] ?>" alt=""></td>
                    <td>
                        <a class="btn btn-danger" href="?act=updateVariant&id=<?= $row['product_id'] ?>&idVariant=<?= $row["variant_id"] ?>">Sửa</a>
                        <a class="btn btn-secondary" onclick="return confirm('Bạn có chắc chắn muốn xóa không?')" href="?act=deleteVariant&id=<?= $row['product_id'] ?>&idVariant=<?= $row["variant_id"] ?>">Xóa</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

    <a class="btn btn-primary" href="?act=addVariant&id=<?= $Product['id'] ?>">Thêm biến thể</a>

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

include './include/footer.php';

?>