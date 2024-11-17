<?php
    include $_SERVER['DOCUMENT_ROOT'] . '../include/header.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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

include $_SERVER['DOCUMENT_ROOT'] . '../include/footer.php';

?>
