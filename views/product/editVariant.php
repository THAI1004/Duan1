<?php include './include/header.php'; 
if (!empty($thongBaoTC)) {
    echo "<script>
        if (confirm('Bạn đã thêm sản phẩm thành công. Nhấn OK để quay lại danh sách sản phẩm.')) {
            window.location.href = '?act=listProductVariant&id=$product_id'; // Chuyển hướng đến trang danh sách sản phẩm
        }
    </script>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa Biến thể của sản phẩm</title>
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

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
        }
        form {
            width: 85%;  /* Chiều rộng của form bằng 85% chiều rộng của body */
            margin: 0 auto;  /* Căn giữa form trong body */
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            font-weight: 600; /* Đặt độ đậm cho label */
            font-size: 1.1rem; /* Tăng kích thước chữ lên 1.1rem */
        }

        .form-control, .form-select {
            border: 2px solid #d6d8db;  /* Viền màu xám nhạt */
            border-radius: 5px;  /* Bo góc */
            padding: 10px;  /* Padding cho thoải mái */
        }

        .form-control:focus, .form-select:focus {
            border-color: #b0b3b8;  /* Màu viền xám đậm hơn một chút khi focus */
            box-shadow: 0 0 8px rgba(176, 179, 184, 0.5); /* Hiệu ứng shadow khi focus */
        }

        .btn {
            padding: 10px 20px;
            font-size: 1rem;
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }

        .alert {
            margin-top: 10px;
        }

        .d-flex {
            justify-content: center;
        }

        /* Đảm bảo form không quá rộng trên màn hình nhỏ */
        @media (max-width: 768px) {
            form {
                width: 95%;  /* Form chiếm 95% trên màn hình nhỏ */
            }
        }
    </style>
</head>
<body>

<h1 class="text-center mb-4">Sửa Biến thể của sản phẩm: <?=$product["product_name"]?></h1>

<form action="?act=submitEditProductVariant&id=<?=$product["id"]?>&idVariant=<?=$variant["id"]?>" method="post" enctype="multipart/form-data">
  
  <div class="mb-3">
    <label for="product_name" class="form-label">Tên sản phẩm:</label>
    <input type="text" class="form-control rounded-3 shadow-sm" id="product_name" name="product_name" value="<?=$product_name?>" disabled required>
  </div>
  
  <!-- Chọn màu -->
  <div class="mb-3">
    <label for="color_id" class="form-label">Chọn màu:</label>
    <select class="form-select rounded-3 shadow-sm" name="color_id" id="color_id">
      <option value="<?=$color_id?>" selected><?=$color_name?></option>
      <?php foreach ($colors as $row): ?>
        <option value="<?= $row['id'] ?>"><?= $row['color_name'] ?></option>
      <?php endforeach; ?>
    </select>
    <?php if (!empty($thongBaoLoiColor)): ?>
      <div class="alert alert-danger"><?= htmlspecialchars($thongBaoLoiColor) ?></div>
    <?php endif; ?>
  </div>

  <!-- Chọn size -->
  <div class="mb-3">
    <label for="size_id" class="form-label">Chọn size:</label>
    <select class="form-select rounded-3 shadow-sm" name="size_id" id="size_id">
      <option value="<?=$size_id?>" selected><?=$size_name?></option>
      <?php foreach ($sizes as $row): ?>
        <option value="<?= $row['id'] ?>"><?= $row['size_name'] ?></option>
      <?php endforeach; ?>
    </select>
    <?php if (!empty($thongBaoLoiSize)): ?>
      <div class="alert alert-danger"><?= htmlspecialchars($thongBaoLoiSize) ?></div>
    <?php endif; ?>
  </div>

  <!-- Thêm số lượng -->
  <div class="mb-3">
    <label for="stock_quantity" class="form-label">Thêm số lượng:</label>
    <input type="number" class="form-control rounded-3 shadow-sm" name="stock_quantity" min="0" value="<?= isset($stock_quantity) ? htmlspecialchars($stock_quantity) : '' ?>" placeholder="Mời nhập số lượng">
    <?php if (!empty($thongBaoLoiQuantity)): ?>
      <div class="alert alert-danger"><?= htmlspecialchars($thongBaoLoiQuantity) ?></div>
    <?php endif; ?>
  </div>

  <!-- Hình ảnh Biến thể -->
  <div class="mb-3">
    <label for="image_variant" class="form-label">Hình ảnh Biến thể:</label>
    <input type="file" class="form-control rounded-3 shadow-sm" id="image_variant" name="image_variant" accept="image/*" value="<?= isset($image_variant) ? htmlspecialchars($image_variant) : '' ?>" required>
    <?php if (!empty($thongBaoLoiUploadVariant)): ?>
      <div class="alert alert-danger"><?= htmlspecialchars($thongBaoLoiUploadVariant) ?></div>
    <?php endif; ?>
  </div>

  <!-- Các nút hành động -->
  <div class="d-flex justify-content-center mt-4">
    <a class="btn btn-secondary mx-2" href="?act=listProductVariant&id=<?=$id?>">Quay lại</a>
    <button type="submit" name="submit" class="btn btn-primary mx-2">Cập nhật</button>
  </div>

  <?php if (!empty($thongBaoLoi)): ?>
    <div class="alert alert-danger mt-3"><?= htmlspecialchars($thongBaoLoi); ?></div>
  <?php endif; ?>

  <?php if (!empty($thongBaoTC)): ?>
    <div class="alert alert-success mt-3"><?= htmlspecialchars($thongBaoTC); ?></div>
  <?php endif; ?>

</form>

</body>
</html>

<?php include './include/footer.php'; ?>
