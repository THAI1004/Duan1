<?php
    include  './include/header.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f4f8fb;
            color: #333;
            overflow-x: hidden;
        }

        .container {
            width: 90%;
            max-width: 1200px;
            margin: 0;
            padding: 20px;
        }

        h1 {
            color: #007bb5;
            margin-bottom: 30px;
            font-weight: 700;
            font-size: 36px;
            text-align: left;
        }

        .table {
            width: 100%;
            table-layout: auto;
            border-collapse: collapse;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
            background-color: #fff;
            border-radius: 12px;
            font-size: 16px;
            overflow: hidden;
        }

        .table th,
        .table td {
            padding: 12px;
            text-align: center;
            border-bottom: 1px solid #ddd;
            font-size: 16px;
            height: 70px;
            vertical-align: middle;
            white-space: nowrap;
            word-wrap: break-word;
        }

        .table thead {
            background-color: #007bb5;
            color: #fff;
        }

        .table tbody tr:nth-child(even) {
            background-color: #e9f6fc;
        }

        .table tbody tr:nth-child(odd) {
            background-color: #fdfdfd;
        }

        .table tbody tr:hover {
            background-color: #d1efff;
        }

        select.form-control {
            width: 100%;
            min-width: 150px;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 16px;
            background-color: #fff;
            box-sizing: border-box;
            text-align: left;
            white-space: nowrap;
            overflow: hidden;
        }

        select.form-control option {
            padding: 10px;
            white-space: nowrap;
        }

        .btn {
            padding: 12px 20px;
            border: none;
            border-radius: 5px;
            color: #fff;
            text-decoration: none;
            cursor: pointer;
            transition: background-color 0.3s ease;
            font-size: 16px;
        }

        .btn-primary {
            background-color: #28a745;
        }

        .btn-primary:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>
   
<h1>Danh sách bình luận</h1>
<table class="table table-striped table-nowrap align-middle mb-0 table text-center ">
<thead style="background-image: radial-gradient(circle 248px at center, #16d9e3 0%, #30c7ec 47%, #46aef7 100%);">
    <tr>
            <tr>
                <th scope="col">STT</th>
                <th scope="col">Khách hàng</th>
                <th scope="col">Sản phẩm</th>
                <th scope="col">Nội dung</th>
                <th scope="col">Đánh giá</th>
                <th scope="col">Ngày tạo</th>
                <th scope="col" colspan="3" class="text-center align-middle">Thao tác</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $i=1;
             foreach ($listReview as $listReview): ?>
                <tr>
                    <td><?= $i++ ?></td>
                    <td><?=$listReview['customer_name'] ?></td>
                    <td><?=$listReview['product_name'] ?></td>
                    <td><?=$listReview['review_text'] ?></td>
                    <td><?=$listReview['rating'] ?></td>
                    <td><?=$listReview["created_at"]?></td>
                    <td>
                        <a  class="btn btn-secondary" onclick="return confirm('Bạn có chắc chắn muốn xóa không?')" href="?act=deleteReview&id=<?= $listReview["id"] ?>">Xóa</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
<?php

include './include/footer.php';

?>
