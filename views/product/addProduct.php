
<?php include './include/header.php';?>



if (!empty($thongBaoTC)) {
  echo "<script>
      if (confirm('Bạn đã thêm sản phẩm thành công. Nhấn OK để quay lại danh sách sản phẩm.')) {
          window.location.href = '?act=listProduct'; // Chuyển hướng đến trang danh sách sản phẩm
      }
  </script>";}
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

<h3 class="text-center mb-4">Thêm sản phẩm mới</h3>

<form action="?act=submitAddProduct" method="post" enctype="multipart/form-data">
    <div class="mb-3 row">
        <div class="col-md-6">
            <label for="product_name" class="form-label">Tên sản phẩm:</label>
            <input type="text" class="form-control rounded-3 shadow-sm" id="product_name" name="product_name" value="<?= isset($_POST['product_name']) ? htmlspecialchars($_POST['product_name']) : '' ?>" placeholder="Nhập tên sản phẩm" required>
            <?php if (!empty($thongBaoLoiProductName)): ?>
                <div class="alert alert-danger mt-2"><?= htmlspecialchars($thongBaoLoiProductName) ?></div>
            <?php endif; ?>
        </div>

        <div class="col-md-6">
            <label for="description" class="form-label">Mô tả:</label>
            <input type="text" class="form-control rounded-3 shadow-sm" id="description" name="description" value="<?= isset($_POST['description']) ? htmlspecialchars($_POST['description']) : '' ?>" placeholder="Nhập mô tả sản phẩm" required>
            <?php if (!empty($thongBaoLoiDescription)): ?>
                <div class="alert alert-danger mt-2"><?= htmlspecialchars($thongBaoLoiDescription) ?></div>
            <?php endif; ?>
        </div>
    </div>

    <div class="mb-3 row">
        <div class="col-md-6">
            <label for="category_id" class="form-label">Danh mục:</label>
            <select class="form-select rounded-3 shadow-sm" name="category_id" aria-label="Chọn danh mục" required>
                <option value="" selected>Chọn danh mục</option>
                <?php foreach($listCategory as $row): ?>
                    <option value="<?= $row['id'] ?>" <?= (isset($_POST['category_id']) && $_POST['category_id'] == $row['id']) ? 'selected' : '' ?>>
                        <?= $row['category_name'] ?>
                    </option>
                <?php endforeach; ?>
            </select>
            <?php if (!empty($thongBaoLoiCategory)): ?>
                <div class="alert alert-danger mt-2"><?= htmlspecialchars($thongBaoLoiCategory) ?></div>
            <?php endif; ?>
        </div>

        <div class="col-md-6">
            <label for="price" class="form-label">Giá sản phẩm:</label>
            <input type="number" class="form-control rounded-3 shadow-sm" id="price" name="price" min="0" value="<?= isset($_POST['price']) ? htmlspecialchars($_POST['price']) : '' ?>" placeholder="Nhập giá sản phẩm" required>
            <?php if (!empty($thongBaoLoiPrice)): ?>
                <div class="alert alert-danger mt-2"><?= htmlspecialchars($thongBaoLoiPrice) ?></div>
            <?php endif; ?>
        </div>
    </div>

    <div class="mb-3">
        <label for="image" class="form-label">Hình ảnh sản phẩm:</label>
        <input type="file" class="form-control rounded-3 shadow-sm" id="image" name="image" accept="image/*" required>
        <?php if (!empty($thongBaoLoiUpload)): ?>
            <div class="alert alert-danger mt-2"><?= htmlspecialchars($thongBaoLoiUpload) ?></div>
        <?php endif; ?>
    </div>

    <div class="d-flex justify-content-center mt-4">
        <a class="btn btn-secondary  mx-2" href="?act=listProduct">Quay lại</a>
        <button type="submit" name="submit" class="btn btn-primary  mx-2">Thêm mới</button>
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


