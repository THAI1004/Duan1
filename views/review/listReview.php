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
</head>
<body>
   
<h1>Danh sách bình luận</h1>
<table class="table table-striped table-hover table-bordered table-sm text-center custom-table">
<thead  class="table-dark">
    <tr>
        <<th>ID</th>
                <th>User ID</th>
                <th>Product ID</th>
                <th>Rating</th>
                <th>Review Text</th>
                <th>Ngày tạo</th>
        <th scope="col" colspan="3" class="text-center align-middle">Thao tác</th>
    </tr>
</thead>
<tbody>
    
<h1>Danh sách đánh giá</h1>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>User ID</th>
                <th>Product ID</th>
                <th>Rating</th>
                <th>Review Text</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($reviews as $review): ?>
                <tr>
                    <td><?= htmlspecialchars($review['id']) ?></td>
                    <td><?= htmlspecialchars($review['user_id']) ?></td>
                    <td><?= htmlspecialchars($review['product_id']) ?></td>
                    <td><?= htmlspecialchars($review['rating']) ?></td>
                    <td><?= htmlspecialchars($review['review_text']) ?></td>
                    <td>
                        <a href="index.php?controller=reviews&action=delete&id=<?= $review['id'] ?>" 
                           onclick="return confirm('Bạn có chắc muốn xóa không?')">Xóa</a>
                    </td>
                </tr>
            <?php endforeach; ?>
            
        </tbody>
    </table>
</body>
</html>
<?php include $_SERVER['DOCUMENT_ROOT'] . '../include/footer.php'; ?>


