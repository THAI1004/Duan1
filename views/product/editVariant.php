<?php include $_SERVER['DOCUMENT_ROOT'] . '/aff/include/header.php';
if (!empty($thongBaoTC)) {
  echo "<script>
      if (confirm('Bạn đã thêm sản phẩm thành công. Nhấn OK để quay lại danh sách sản phẩm.')) {
          window.location.href = '?act=listProductVariant&id=$product_id; // Chuyển hướng đến trang danh sách sản phẩm
      }
  </script>";}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm sản phẩm</title>
    <script>
      window.onload = function() {
        // Kiểm tra lỗi và focus vào trường bị bỏ trống đầu tiên
        <?php if (!empty($thongBaoLoiColor)): ?>
            document.getElementById('color_id').focus();
        <?php elseif (!empty($thongBaoLoiSize)): ?>
            document.getElementById('size_id').focus();
        <?php elseif (!empty($thongBaoLoiQuantity)): ?>
            document.getElementById('stock_quantity').focus();
        <?php endif; ?>
      };
    </script>
</head>
<body>

<h1>Sửa Biến thể của sản phẩm: <?=$product["product_name"]?> </h1>
<form action="?act=submitEditProductVariant&id=<?=$product["id"]?>&idVariant=<?=$variant["id"]?>" method="post" enctype="multipart/form-data">
  <div class="mb-3">
    <label for="product_name" class="form-label">Tên sản phẩm:</label>
    <input type="text" class="form-control" id="product_name" name="product_name" value="<?=$product_name?>" disabled required>
  </div>
  <div class="mb-3">
  <label for="color_id" class="form-label mr-3">Chọn màu:</label>
    <select class="form-select p-1" name="color_id" id="color_id">
      <option value="<?=$color_id?>" selected> <?=$color_name?></option>
      <?php foreach ($colors as $row): ?>
        <option value="<?= $row['id'] ?>"><?= $row['color_name'] ?></option>
      <?php endforeach; ?>
    </select>
    <?php if (!empty($thongBaoLoiColor)): ?>
      <div class="alert alert-danger"><?= htmlspecialchars($thongBaoLoiColor) ?></div>
    <?php endif; ?>
  </div>
  <div class="mb-3">
  <label for="size_id" class="form-label mr-3">Chọn size:</label>
    <select class="form-select p-1" name="size_id" id="size_id">
    <option value="<?=$size_id?>" selected><?=$size_name?></option>
      <?php foreach ($sizes as $row): ?>
        <option value="<?= $row['id'] ?>"> <?= $row['size_name'] ?></option>
      <?php endforeach; ?>
    </select>
    <?php if (!empty($thongBaoLoiSize)): ?>
      <div class="alert alert-danger"><?= htmlspecialchars($thongBaoLoiSize) ?></div>
    <?php endif; ?>
  </div>
  <div class="mb-3">
    <label  for="stock_quantity" class="form-label mr-3">Thêm số lượng:</label>
    <input type="number" class="form-control" name="stock_quantity" min=0 value="<?= isset($stock_quantity) ? htmlspecialchars($stock_quantity) : '' ?>" placeholder="Mời nhập số lượng">
    <?php if (!empty($thongBaoLoiQuantity)): ?>
      <div class="alert alert-danger"><?= htmlspecialchars($thongBaoLoiQuantity) ?></div>
    <?php endif; ?>
  </div>
  <div class="mb-3">
    <label for="image_variant" class="form-label">Hình ảnh Biến thể:</label>
    <input type="file" class="form-control" id="image_variant" name="image_variant" accept="image/*" value="<?= isset($image_variant) ? htmlspecialchars($image_variant) : '' ?>" required>
    <?php if (!empty($thongBaoLoiUploadVảiant)): ?>image_variant
      <div class="alert alert-danger"><?= htmlspecialchars($thongBaoLoiUploadVariant) ?></div>
    <?php endif; ?>
  </div>
  <a class="btn btn-primary" href="?act=listProductVariant&id=<?=$id?>">Quay lại</a>
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

<?php include $_SERVER['DOCUMENT_ROOT'] . '/aff/include/footer.php'; ?>
