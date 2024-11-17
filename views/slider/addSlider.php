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
    <!-- Link Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom Styles -->
    <style>
        body {
            background-color: #f8f9fa;
        }

        .container {
            margin-top: 50px;
        }

        .form-title {
            margin-bottom: 30px;
            text-align: center;
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }
    </style>
</head>

<body>

    <div class="container">
        <h1 class="form-title">Thêm Mới Banner</h1>
        <form action="?act=addSlider" method="post" enctype="multipart/form-data" class="shadow p-4 bg-white rounded">
            <!-- Hình ảnh -->
            <div class="mb-3">
                <label for="image_url" class="form-label">Hình ảnh:</label>
                <input type="file" class="form-control" id="image_url" name="image_url" accept="image/*" required>
                <?php if (!empty($thongBaoLoiUpload)): ?>
                    <div class="alert alert-danger mt-2"><?= htmlspecialchars($thongBaoLoiUpload) ?></div>
                <?php endif; ?>
            </div>

            <!-- Link -->
            <div class="mb-3">
                <label for="link" class="form-label">Link ảnh:</label>
                <input type="text" class="form-control" id="link" name="link" 
                    value="<?= isset($_POST['link']) ? htmlspecialchars($_POST['link']) : '' ?>" required>
                <?php if (!empty($thongBaoLoilink)): ?>
                    <div class="alert alert-danger mt-2"><?= htmlspecialchars($thongBaoLoilink) ?></div>
                <?php endif; ?>
            </div>

            <!-- Nút hành động -->
            <div class="d-flex justify-content-between">
                <a href="?act=listSlider" class="btn btn-secondary">Quay lại</a>
                <button type="submit" name="submit" class="btn btn-primary">Thêm mới</button>
            </div>

            <!-- Thông báo lỗi -->
            <?php if (!empty($thongBaoLoi)): ?>
                <div class="alert alert-danger mt-4">
                    <?= htmlspecialchars($thongBaoLoi); ?>
                </div>
            <?php endif; ?>

            <!-- Thông báo thành công -->
            <?php if (!empty($thongBaoTC)): ?>
                <div class="alert alert-success mt-4">
                    <?= htmlspecialchars($thongBaoTC); ?>
                </div>
            <?php endif; ?>
        </form>
    </div>

    <!-- Link Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>

<?php include './include/footer.php'; ?>
