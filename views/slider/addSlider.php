<?php include './include/header.php'; ?>

<?php
if (!empty($thongBaoTC)) {
    echo "<script>
        if (confirm('Bạn đã thêm ảnh thành công. Nhấn OK để quay lại danh sách banner.')) {
            window.location.href = '?act=listSlider'; // Chuyển hướng đến trang danh sách banner
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
        :root {
            --primary-color: #007bff;
            --secondary-color: #6c757d;
            --success-bg: #d4edda;
            --success-text: #155724;
            --danger-bg: #f8d7da;
            --danger-text: #721c24;
            --border-color: #ddd;
            --focus-color: #4CAF50;
            --background-color: #f4f4f9;
            --text-color: #333;
            --box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        body {
            font-family: Arial, sans-serif;
            background-color: var(--background-color);
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 50px auto;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: var(--box-shadow);
        }

        h1 {
            text-align: center;
            color: var(--text-color);
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            color: var(--text-color);
        }

        .form-group input {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            border: 1px solid var(--border-color);
            border-radius: 4px;
            box-sizing: border-box;
            transition: border-color 0.3s ease, box-shadow 0.3s ease;
        }

        .form-group input:focus {
            outline: none;
            border-color: var(--focus-color);
            box-shadow: 0 0 5px rgba(76, 175, 80, 0.3);
        }

        .alert {
            padding: 10px;
            margin-top: 10px;
            border-radius: 4px;
            font-size: 14px;
        }

        .alert-danger {
            background-color: var(--danger-bg);
            color: var(--danger-text);
            border: 1px solid var(--danger-bg);
        }

        .alert-success {
            background-color: var(--success-bg);
            color: var(--success-text);
            border: 1px solid var(--success-bg);
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
            transition: background-color 0.3s ease, transform 0.2s ease;
        }

        .button-group a {
            background-color: var(--secondary-color);
            color: #fff;
        }

        .button-group a:hover {
            background-color: #5a6268;
            transform: translateY(-2px);
        }

        .button-group button {
            background-color: var(--primary-color);
            color: #fff;
        }

        .button-group button:hover {
            background-color: #0056b3;
            transform: translateY(-2px);
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

            <!-- Nội dung -->
            <div class="form-group">
                <label for="content">Nội dung:</label>
                <input type="text" id="content" name="content" 
                    value="<?= isset($_POST['content']) ? htmlspecialchars($_POST['content']) : '' ?>" required>
                <?php if (!empty($thongBaoLoiContent)): ?>
                    <div class="alert alert-danger"><?= htmlspecialchars($thongBaoLoiContent) ?></div>
                <?php endif; ?>
            </div>

            <!-- Mô tả -->
            <div class="form-group">
                <label for="description">Mô tả:</label>
                <input type="text" id="description" name="description" 
                    value="<?= isset($_POST['description']) ? htmlspecialchars($_POST['description']) : '' ?>" required>
                <?php if (!empty($thongBaoLoiDescription)): ?>                
                    <div class="alert alert-danger"><?= htmlspecialchars($thongBaoLoiDescription) ?></div>
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
