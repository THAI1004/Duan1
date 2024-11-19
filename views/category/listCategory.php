<?php
include './include/header.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách danh mục</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f4f8fb;
            color: #333;
            margin: 0;
            padding: 0;
            font-family: 'Poppins', sans-serif;
            background-color: #f4f8fb;
            width: 100%;
        }

        .container {
            max-width: 1300px;
            margin: 0 auto;
        }

        h1 {
            color: #007bb5;
            margin-bottom: 20px;
            font-weight: 600;
            font-size: 28px;
            text-align: left;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);
            background-color: #fff;
            overflow: hidden;
            border-radius: 10px;
        }

        .table th,
        .table td {
            padding: 14px 20px;
            text-align: center;
            border-bottom: 1px solid #ddd;
            font-size: 15px;
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

        .btn {
            padding: 8px 16px;
            border: none;
            border-radius: 5px;
            color: #fff;
            text-decoration: none;
            transition: background-color 0.3s ease;
        }

        .btn-danger {
            background-color: #ff4d4d;
        }

        .btn-secondary {
            background-color: #6c757d;
        }

        .btn-primary {
            background-color: #28a745;
        }

        .btn:hover {
            opacity: 0.85;
        }

        .table img {
            width: 150px;
            height: 80px;
            object-fit: cover;
            border-radius: 10%;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Danh sách danh mục</h1>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">STT</th>
                    <th scope="col">Tên</th>
                    <th scope="col">Logo</th>
                    <th scope="col">Mô tả</th>
                    <th scope="col">Ngày tạo</th>
                    <th scope="col">Ngày cập nhật</th>
                    <th scope="col" colspan="3">Thao tác</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($listcategory as $listcategory): ?>
                    <tr>
                        <td><?= $listcategory['id'] ?></td>
                        <td><?= $listcategory['category_name'] ?></td>
                        <td><img src="./images/category/<?= $listcategory['image_category'] ?>" alt=""></td>
                        <td><?= $listcategory['description'] ?></td>
                        <td><?= $listcategory['created_at'] ?></td>
                        <td><?= $listcategory['updated_at'] ?></td>
                        <td><a class="btn btn-danger" href="?act=editCategory&id=<?= $listcategory['id'] ?>">Sửa</a></td>
                        <td><a class="btn btn-secondary" onclick="return confirm('Bạn có chắc chắn muốn xóa không?')" href="?act=deleteCategory&id=<?= $listcategory['id'] ?>">Xóa</a></td>
                        <td><a class="btn btn-primary" href="?act=addCategory">Thêm Danh Mục</a></td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</body>

</html>
<?php
include './include/footer.php';
?>