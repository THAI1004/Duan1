<?php include $_SERVER['DOCUMENT_ROOT'] . '/aff/include/header.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm sản phẩm</title>
</head>
<body>

<h1>Trang thêm mới</h1>
<form action="?act=submitEditProduct&id=<?=$product_id?>" method="post">
  <div class="mb-3">
    <label for="product_name" class="form-label">Tên sản phẩm:</label>
    <input type="text" class="form-control" id="product_name" name="product_name" value="<?= $product["product_name"]?>" required>    
    <?php if (!empty($thongBaoLoiProductName)): ?>
      <div class="alert alert-danger"><?= htmlspecialchars($thongBaoLoiProductName) ?></div>
    <?php endif; ?>
  </div>
  
  <div class="mb-3">
    <label for="description" class="form-label">Mô tả:</label>
    <input type="text" class="form-control" id="description" name="description"  value="<?=$product["description"]?>" required>
    <?php if (!empty($thongBaoLoiDescription)): ?>
      <div class="alert alert-danger"><?= htmlspecialchars($thongBaoLoiDescription) ?></div>
    <?php endif; ?>
  </div>
  
  <div class="mb-3">
        <select class="form-select" name="category_id" aria-label="Chọn danh mục" required>
            <option value="" selected>Chọn danh mục:</option>
            <?php foreach($listCategory as $row): ?>
                <option value="<?= $row['id'] ?>" <?= ( $product["category_id"] == $row['id']) ? 'selected' : '' ?>>
                    <?= htmlspecialchars($row['category_name']) ?>
                </option>
            <?php endforeach; ?>
        </select>
        <?php if (!empty($thongBaoLoiCategory)): ?>
            <div class="alert alert-danger"><?= htmlspecialchars($thongBaoLoiCategory) ?></div>
        <?php endif; ?>
    </div>
  
  <div class="mb-3">
    <label for="price" class="form-label">Giá sản phẩm:</label>
    <input type="number" class="form-control" id="price" name="price" min="0"  value="<?=$product["price"]?>" required>
    <?php if (!empty($thongBaoLoiPrice)): ?>
      <div class="alert alert-danger"><?= htmlspecialchars($thongBaoLoiPrice) ?></div>
    <?php endif; ?>
  </div>

  <a class="btn btn-primary" href="?act=listProduct">Quay lại</a>
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
