<?php

include './include/header.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
        padding: 10px; 
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
    
    .container {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 15px;
    border-bottom: 1px solid #e0e0e0;
}

.custom-title {
    font-size: 24px;
    font-weight: bold;
    color: #333;
    margin: 0;
}

.header-left {
    display: flex;
    align-items: center;
}

.search-form {
    display: flex;
    align-items: center;
}

.search-form input {
    padding: 10px 15px;
    font-size: 16px;
    border: 1px solid #ccc;
    border-radius: 30px; /* Bo góc */
    outline: none;
    width: 250px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Shadow */
    transition: all 0.3s ease;
}

.search-form input:focus {
    border-color: #dddd;
    box-shadow: 0 4px 8px rgba(0, 123, 255, 0.3); /* Tăng shadow khi focus */
}

.search-form button {
    background-color: #007bff;
    border: none;
    color: white;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 10px;
    margin-left: -5px; /* Đẩy nút về phía input để khớp bo góc */
    cursor: pointer;
    border-radius: 50%; /* Hình tròn cho nút */
    width: 40px;
    height: 40px; /* Đảm bảo kích thước bằng nhau với input */
    transition: background-color 0.3s ease;
}

.search-form button:hover {
    background-color: #0056b3;
}

.search-form .mdi-magnify {
    font-size: 20px;
    color: #fff;
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

<table class="table table-striped table-hover table-bordered table-sm text-center custom-table">
<thead  class="table-dark">
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
$i=1;
foreach($listProduct as $row){?>

    <tr >
        <td><?=$i++?></td>
        <td><?=$row["product_name"]?></td>
        <td >
            <img style="width:100%;height: 100px; " src="<?=$row["image"]?>" alt="">
            </td>
        <td><?=$row["description"]?></td>
        <td><?=$row["price"]?></td>
        <td><?=$row["created_at"]?></td>
        <td><?=$row["updated_at"]?></td>
        <td>
            <a class="btn btn-info" href="?act=listProductVariant&id=<?=$row['id']?>">Xem biến thể</a>
            <a class="btn btn-danger" href="?act=editProduct&id=<?= $row["id"]?>">Sửa</a>
            <a class="btn btn-secondary" onclick="return confirm('Bạn có chắc chắn muốn xóa không?')" href="?act=deleteProduct&id=<?= $row["id"] ?>">Xóa</a>
        </td>
    </tr>
<?php } ?>
</tbody>
</table>
<a class="btn btn-primary" href="?act=addProduct">Thêm sản phẩm</a>
</body>
</html>

<?php

include './include/footer.php';

?>
