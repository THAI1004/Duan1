<?php include './include/header.php';
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
</head>

<body>

    <h1>Trang thêm mới</h1>
    <form action="?act=addSlider" method="post" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="image_url" class="form-label">Hình ảnh:</label>
            <input type="file" class="form-control" id="image_url" name="image_url" accept="image_url/*" required>
            <?php if (!empty($thongBaoLoiUpload)): ?>
                <div class="alert alert-danger"><?= htmlspecialchars($thongBaoLoiUpload) ?></div>
            <?php endif; ?>
        </div>

        <div class="mb-3">
            <label for="link" class="form-label">Link ảnh:</label>
            <input type="text" class="form-control" id="link" name="link" value="<?= isset($_POST['link']) ? htmlspecialchars($_POST['link']) : '' ?>" required>
            <?php if (!empty($thongBaoLoilink)): ?>
                <div class="alert alert-danger"><?= htmlspecialchars($thongBaoLoilink) ?></div>
            <?php endif; ?>
        </div>



        <a class="btn btn-primary" href="?act=listSlider">Quay lại</a>
        <button type="submit" name="submit" class="btn btn-primary">Thêm mới</button>

        <?php if (!empty($thongBaoLoi)): ?>
            <div class="alert alert-danger">
                <?= htmlspecialchars($thongBaoLoi); ?>
            </div>
        <?php endif; ?>

        <?php if (!empty($thongBaoTC)): ?>
            <div class="alert alert-success">
                <?= htmlspecialchars($thongBaoTC); ?>
            </div>
        <?php endif; ?>
    </form>



</body>

</html>

<?php include './include/footer.php'; ?>