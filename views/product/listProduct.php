<?php
include $_SERVER['DOCUMENT_ROOT'] . '/Duan1/include/header.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách sản phẩm</title>
    <style>
    .custom-table {
        border-radius: 10px; /* Bo góc cho bảng */
        overflow: hidden; /* Đảm bảo các góc được bo tròn */
        box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15); /* Đổ bóng */
        font-family: 'Arial', sans-serif; /* Kiểu chữ */
    }
    .custom-table th, .custom-table td {
        vertical-align: middle; /* Căn giữa theo chiều dọc */
        font-weight: bold; /* Chữ đậm */
        padding: 10px; /* Thêm khoảng cách */
    }
    .custom-table th {
        background-color: #007bb5; /* Màu nền xanh đậm cho tiêu đề */
        color: white; /* Màu chữ trắng */
        font-size: 16px; /* Kích thước chữ lớn hơn */
    }
    .custom-table td {
        font-size: 14px; /* Kích thước chữ nhỏ hơn trong nội dung */
    }
    .custom-table img {
        object-fit: cover; /* Cắt ảnh cho phù hợp */
        border-radius: 5px; /* Bo góc ảnh */
    }
    .btn-info {
        background-color: #28a745; /* Màu xanh lá */
        border-color: #28a745;
        color: white;
        font-weight: bold; /* Chữ đậm */
    }
    .btn-danger {
        background-color: #dc3545; /* Màu đỏ tươi */
        border-color: #dc3545;
        color: white;
        font-weight: bold;
    }
    .btn-secondary {
        background-color: #17a2b8; /* Màu xanh dương nhạt */
        border-color: #17a2b8;
        color: white;
        font-weight: bold;
    }
    .btn-info:hover {
        background-color: #218838; /* Đậm hơn khi hover */
        border-color: #1e7e34;
    }
    .btn-danger:hover {
        background-color: #c82333; /* Đậm hơn khi hover */
        border-color: #bd2130;
    }
    .btn-secondary:hover {
        background-color: #138496; /* Đậm hơn khi hover */
        border-color: #117a8b;
    }
    tbody tr:hover {
        background-color: #f8f9fa; /* Hiệu ứng hover cho hàng */
    }
    tbody td {
        color: #333; /* Màu chữ đậm cho nội dung */
    }
    .custom-title {
        font-size: 28px; /* Kích thước chữ lớn */
        font-weight: bold; /* Chữ đậm */
        color: #007bb5; /* Màu xanh chủ đạo */
        text-align: center; /* Căn giữa tiêu đề */
        margin-bottom: 20px; /* Khoảng cách dưới tiêu đề */
        padding-top: 20px; /* Khoảng cách trên tiêu đề */
        font-family: 'Arial', sans-serif; /* Kiểu chữ */
        text-transform: uppercase; /* Viết hoa toàn bộ */
    }
    .header-left {
        flex: 1;
    }
    .flex{
        display: flex;
        justify-content: space-between;
    }
    .search-form input[type="search"] {
        padding: 8px;
        border-radius: 5px;
        border: 1px solid #ccc;
    }
    .search-form button {
        background-color: transparent;
        border: none;
    }
    </style>
</head>
<body>
<div class="container flex">
    <h1 class="pt-3 custom-title">Danh sách sản phẩm</h1>
    <div class="header-left">
        <form class="search-form" action="?act=searchProduct" method="post">
            <input type="search" name="search" value="<?= isset($_POST['search']) ? htmlspecialchars($_POST['search']) : '' ?>" class="form-control" placeholder="Tìm kiếm sản phẩm">
            <button><span class="input-group-text bg-transparent border-0 pr-2 pr-sm-3" id="basic-addon1"><i class="mdi mdi-magnify"></i></span></button>
        </form>
    </div>
</div>

<?php if (isset($listProduct) && !empty($listProduct)): ?>
    <table class="table table-striped table-hover table-bordered table-sm text-center custom-table">
        <thead>
            <tr>
                <th scope="col">STT</th>
                <th scope="col">Tên</th>
                <th scope="col">Ảnh sản phẩm</th>
                <th scope="col">Mô tả</th>
                <th scope="col">Giá</th>
                <th scope="col">Ngày tạo</th>
                <th scope="col">Ngày sửa</th>
                <th scope="col" colspan="3" class="text-center align-middle">Thao tác</th>
            </tr>
        </thead>
        <tbody>
        <?php
        $i = 1;
        foreach($listProduct as $row) { ?>
            <tr>
                <td><?= $i++ ?></td>
                <td><?= htmlspecialchars($row["product_name"]) ?></td>
                <td>
                    <img style="width: 100px; height: 100px;" src="<?= htmlspecialchars($row["image"]) ?>" alt="Ảnh sản phẩm">
                </td>
                <td><?= htmlspecialchars($row["description"]) ?></td>
                <td><?= htmlspecialchars($row["price"]) ?></td>
                <td><?= htmlspecialchars($row["created_at"]) ?></td>
                <td><?= htmlspecialchars($row["updated_at"]) ?></td>
                <td>
                    <a class="btn btn-info btn-sm" href="?act=listProductVariant&id=<?= $row['id'] ?>">Xem biến thể</a>
                    <a class="btn btn-danger btn-sm" href="?act=editProduct&id=<?= $row['id'] ?>">Sửa</a>
                    <a class="btn btn-secondary btn-sm" onclick="return confirm('Bạn có chắc chắn muốn xóa không?')" href="?act=deleteProduct&id=<?= $row['id'] ?>">Xóa</a>
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
<?php else: ?>
    <p>Không tìm thấy sản phẩm nào.</p>
<?php endif; ?>
<a class="btn btn-primary" href="?act=addProduct">Thêm sản phẩm</a>
</body>
</html>

<?php
include $_SERVER['DOCUMENT_ROOT'] . '/Duan1/include/footer.php';
?>
