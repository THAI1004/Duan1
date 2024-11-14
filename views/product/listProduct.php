<?php

include $_SERVER['DOCUMENT_ROOT'] . '../include/header.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
    .custom-table {
        border-radius: 8px; /* Bo góc */
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Đổ bóng */
        overflow: hidden; /* Để đảm bảo các góc được bo tròn */
    }
</style>
</head>
<body>
   
<h1>Danh sách sản Phẩm</h1>
<table class="table table-striped table-hover table-bordered table-sm text-center custom-table">
<thead class="table-dark">
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

include $_SERVER['DOCUMENT_ROOT'] . '../include/footer.php';

?>
