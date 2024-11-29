<?php include './include/header.php';

if (!empty($thongBaoTC)) {
  echo "<script>
      if (confirm('Bạn đã sửa sản phẩm thành công. Nhấn OK để quay lại danh sách sản phẩm.')) {
          window.location.href = '?act=listProduct'; // Chuyển hướng đến trang danh sách sản phẩm
      }
  </script>";
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Thêm sản phẩm</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f8f9fa;
    }

    form {
      width: 85%;
      margin: 0 auto;
      background-color: white;
      padding: 20px;
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    label {
      font-weight: 600;
      font-size: 1.1rem;
    }

    .form-control {
      border-radius: 0.375rem;
      box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
    }

    .btn {
      padding: 10px 20px;
      font-size: 1rem;
    }

    .mb-3 {
      margin-bottom: 1.5rem;
    }

    .alert {
      margin-top: 10px;
    }

    .form-label {
      font-weight: 600;
      font-size: 1.1rem;
    }

    .form-control:focus {
      border-color: #bbb;
    }

    .btn-primary {
      background-color: #007bff;
      border-color: #007bff;
    }

    .btn-primary:hover {
      background-color: #0056b3;
      border-color: #0056b3;
    }

    .d-flex {
      justify-content: center;
    }
  </style>
</head>

<body>

  <h1 class="text-center my-4">Chỉnh sửa sản phẩm</h1>

  <form action="?act=submitEditProduct&id=<?= $product_id ?>" enctype="multipart/form-data" method="post">
    <div class="mb-3 row">
      <div class="col-md-6">
        <label for="product_name" class="form-label">Tên sản phẩm:</label>
        <input type="text" class="form-control" id="product_name" name="product_name" value="<?= $product['product_name'] ?>" required>
        <?php if (!empty($thongBaoLoiProductName)): ?>
          <div class="alert alert-danger"><?= htmlspecialchars($thongBaoLoiProductName) ?></div>
        <?php endif; ?>
      </div>

      <div class="col-md-6">
        <label for="description" class="form-label">Mô tả:</label>
        <input type="text" class="form-control" id="description" name="description" value="<?= $product['description'] ?>" required>
        <?php if (!empty($thongBaoLoiDescription)): ?>
          <div class="alert alert-danger"><?= htmlspecialchars($thongBaoLoiDescription) ?></div>
        <?php endif; ?>
      </div>
    </div>

    <div class="mb-3 row">
      <div class="col-md-6">
        <label for="category_id" class="form-label">Danh mục:</label>
        <select class="form-select" name="category_id" aria-label="Chọn danh mục" required>
          <option value="" selected>Chọn danh mục</option>
          <?php foreach ($listCategory as $row): ?>
            <option value="<?= $row['id'] ?>" <?= ($product["category_id"] == $row['id']) ? 'selected' : '' ?>>
              <?= htmlspecialchars($row['category_name']) ?>
            </option>
          <?php endforeach; ?>
        </select>
        <?php if (!empty($thongBaoLoiCategory)): ?>
          <div class="alert alert-danger"><?= htmlspecialchars($thongBaoLoiCategory) ?></div>
        <?php endif; ?>
      </div>

      <div class="col-md-6">
        <label for="price" class="form-label">Giá sản phẩm:</label>
        <input type="number" class="form-control" id="price" name="price" min="0" value="<?= $product['price'] ?>" required>
        <?php if (!empty($thongBaoLoiPrice)): ?>
          <div class="alert alert-danger"><?= htmlspecialchars($thongBaoLoiPrice) ?></div>
        <?php endif; ?>
      </div>
      <div class="col-md-6">
        <label for="discount_price" class="form-label">Giá giảm</label>
        <input type="number" class="form-control" id="discount_price" name="discount_price" min="0" value="<?= $product['discount_price'] ?>" required>
        <?php if (!empty($thongBaoLoidiscount_price)): ?>
          <div class="alert alert-danger"><?= htmlspecialchars($thongBaoLoidiscount_price) ?></div>
        <?php endif; ?>
      </div>
    </div>

    <div class="mb-3">
      <label for="image" class="form-label">Hình ảnh sản phẩm:</label>
      <input type="file" class="form-control" id="image" name="image">
      <?php if (!empty($thongBaoLoiUpload)): ?>
        <div class="alert alert-danger"><?= htmlspecialchars($thongBaoLoiUpload) ?></div>
      <?php endif; ?>
    </div>

    <div class="d-flex mb-3">
      <a class="btn btn-secondary mx-2" href="?act=listProduct">Quay lại</a>
      <button type="submit" name="submit" class="btn btn-primary mx-2">Cập nhật</button>
    </div>

    <?php if (!empty($thongBaoLoi)): ?>
      <div class="alert alert-danger"><?= htmlspecialchars($thongBaoLoi); ?></div>
    <?php endif; ?>

    <?php if (!empty($thongBaoTC)): ?>
      <div class="alert alert-success"><?= htmlspecialchars($thongBaoTC); ?></div>
    <?php endif; ?>
  </form>

</body>

</html>

<?php include './include/footer.php'; ?>