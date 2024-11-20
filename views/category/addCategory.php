<?php
include './include/header.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm sản phẩm</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEJZL2rYf5nx3jwfiV6IkBh2dzMYYzjqOmaKK4jcA2ld+cF1M98h5TR6bxvR" crossorigin="anonymous">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f8f9fa;
            color: #333;
        }

        h1 {
            text-align: center;
            color: #007bb5;
            margin-bottom: 40px;
            font-size: 32px;
            font-weight: 600;
        }

        .form-container {
            background-color: #fff;
            padding: 40px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            margin: 0 auto;
        }

        .form-label {
            font-weight: 500;
            color: #333;
        }

        .form-control {
            border-radius: 6px;
            box-shadow: none;
            font-size: 16px;
            height: 45px;
        }

        .btn {
            padding: 10px 20px;
            font-size: 16px;
            border-radius: 6px;
            transition: background-color 0.3s ease;
        }

        .btn-primary {
            background-color: #007bb5;
            border: none;
        }

        .btn-primary:hover {
            background-color: #005f87;
        }

        .btn-back {
            text-decoration: none;
            display: inline-block;
            padding: 10px 20px;
            background-color: #f0f0f0;
            color: #007bb5;
            border-radius: 6px;
            border: 1px solid #007bb5;
            transition: background-color 0.3s ease;
        }

        .btn-back:hover {
            background-color: #007bb5;
            color: #fff;
        }

        .alert {
            margin-top: 20px;
        }
    </style>
</head>

<body>

    <div class="container form-container">
        <h1>Thêm Danh Mục Sản Phẩm</h1>

        <!-- Hiển thị thông báo khi thành công -->
        <?php if (isset($_GET['success'])) : ?>
            <div class="alert alert-success" role="alert">
                Danh mục đã được thêm thành công!
            </div>
        <?php endif; ?>

        <form action="?act=submitAddCategory" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="category_name" class="form-label">Tên Danh Mục:</label>
                <input type="text" class="form-control" id="category_name" name="category_name" required>
            </div>
            <div class="mb-3">
                <label for="image_category" class="form-label">Logo:</label>
                <input type="file" class="form-control" id="image_category" name="image_category" required>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Mô tả:</label>
                <input type="text" class="form-control" id="description" name="description" required>
            </div>

            <div class="d-flex justify-content-between">
                <a class="btn btn-back" href="?act=addCategory">Quay lại</a>
                <button type="submit" name="submitAddCategory" class="btn btn-primary" onclick="return confirm('Bạn có chắc chắn muốn thêm mới danh mục này?')">Thêm mới</button>
            </div>
        </form>
    </div>

</body>

</html>
<?php
include './include/footer.php';
?>
