<?php include './include/header.php'; ?>

<?php
if (!empty($thongBaoTC)) {
    echo "<script>
        if (confirm('Bạn đã thêm sản phẩm thành công. Nhấn OK để quay lại danh sách sản phẩm.')) {
            window.location.href = '?act=listSlider'; // Chuyển hướng đến trang danh sách sản phẩm
        }
    </script>";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm Banner</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 50px auto;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: #333;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            color: #555;
        }

        .form-group input {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }

        .form-group input:focus {
            outline: none;
            border-color: #4CAF50;
            box-shadow: 0 0 5px rgba(76, 175, 80, 0.3);
        }

        .alert {
            padding: 10px;
            margin-top: 10px;
            border-radius: 4px;
            font-size: 14px;
        }

        .alert-danger {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }

        .alert-success {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }

        .button-group {
            display: flex;
            justify-content: space-between;
        }

        .button-group a,
        .button-group button {
            display: inline-block;
            padding: 10px 20px;
            font-size: 16px;
            border: none;
            border-radius: 4px;
            text-decoration: none;
            cursor: pointer;
        }

        .button-group a {
            background-color: #6c757d;
            color: #fff;
        }

        .button-group a:hover {
            background-color: #5a6268;
        }

        .button-group button {
            background-color: #007bff;
            color: #fff;
        }

        .button-group button:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>

    <div class="container">
        <h1>Thêm Mới Banner</h1>
        <form action="?act=addSlider" method="post" enctype="multipart/form-data">
            <!-- Hình ảnh -->
            <div class="form-group">
                <label for="image_url">Hình ảnh:</label>
                <input type="file" id="image_url" name="image_url" accept="image/*" required>
                <?php if (!empty($thongBaoLoiUpload)): ?>
                    <div class="alert alert-danger"><?= htmlspecialchars($thongBaoLoiUpload) ?></div>
                <?php endif; ?>
            </div>

            <!-- Link -->
            <div class="form-group">
                <label for="link">Link ảnh:</label>
                <input type="text" id="link" name="link" 
                    value="<?= isset($_POST['link']) ? htmlspecialchars($_POST['link']) : '' ?>" required>
                <?php if (!empty($thongBaoLoilink)): ?>
                    <div class="alert alert-danger"><?= htmlspecialchars($thongBaoLoilink) ?></div>
                <?php endif; ?>
            </div>

            <!-- Nút hành động -->
            <div class="button-group">
                <a href="?act=listSlider">Quay lại</a>
                <button type="submit" name="submit">Thêm mới</button>
            </div>

            <!-- Thông báo lỗi -->
            <?php if (!empty($thongBaoLoi)): ?>
                <div class="alert alert-danger">
                    <?= htmlspecialchars($thongBaoLoi); ?>
                </div>
            <?php endif; ?>

            <!-- Thông báo thành công -->
            <?php if (!empty($thongBaoTC)): ?>
                <div class="alert alert-success">
                    <?= htmlspecialchars($thongBaoTC); ?>
                </div>
            <?php endif; ?>
        </form>
    </div>

</body>

</html>

<?php include './include/footer.php'; ?>