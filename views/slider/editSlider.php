<?php include './include/header.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm sản phẩm</title>
</head>
<body>

<h1>Trang sửa banner</h1>
<form action="?act=submitEditSlider&id=<?=$slider_id?>" enctype="multipart/form-data" method="post">
<div class="mb-3">
    <label for="image_url" class="form-label">Hình ảnh banner:</label>
    <input type="file" class="form-control" id="image_url" name="image_url" required>
    <?php if (!empty($thongBaoLoiUpload)): ?>
      <div class="alert alert-danger"><?= htmlspecialchars($thongBaoLoiUpload) ?></div>
    <?php endif; ?>
  </div>
  
  <div class="mb-3">
    <label for="link" class="form-label">Link:</label>
    <input type="text" class="form-control" id="link" name="link"  value="<?=$slider["link"]?>" required>
    <?php if (!empty($thongBaoLoiLink)): ?>
      <div class="alert alert-danger"><?= htmlspecialchars($thongBaoLoiLink) ?></div>
    <?php endif; ?>
  </div>
  
  <a class="btn btn-primary" href="?act=listSlider">Quay lại</a>
  <button type="submit" name="submit" class="btn btn-primary">Update</button>

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
