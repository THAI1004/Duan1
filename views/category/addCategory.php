<?php
include './include/header.php';
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
<form action="?act=submitAddCategory" method="post">
  <div class="mb-3">
    <label for="category_name" class="form-label">Tên Danh Mục:</label>
    <input type="text" class="form-control" id="category_name" name="category_name">
  </div>
  <div class="mb-3">
    <label for="description" class="form-label">Mô tả :</label>
    <input type="text" class="form-control" id="description" name="description">
  </div>
  
  <a class="btn btn-primary" href="?act=addCategory">Quay lại</a>
  <button type="submit" name="submitAddCategory" class="btn btn-primary" onclick="return confirm('Bạn đã thêm thành công')">Thêm mới</button>
</form>

</body>
</html>
<?php
include './include/footer.php';
?>