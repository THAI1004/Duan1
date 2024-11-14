<?php

include $_SERVER['DOCUMENT_ROOT'] . '../include/header.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
   
<h1>Danh sách sản Phẩm</h1>
<table class="table table-striped table-nowrap align-middle mb-0 table text-center ">
<thead style="background-image: radial-gradient(circle 248px at center, #16d9e3 0%, #30c7ec 47%, #46aef7 100%);">
    <tr>
        <th scope="col">STT</th>
        <th scope="col">Tên</th>
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
    <tr>
        <td><?=$i++?></td>
        <td><?=$row["product_name"]?></td>
        <td><?=$row["description"]?></td>
        <td><?=$row["price"]?></td>
        <td><?=$row["created_at"]?></td>
        <td><?=$row["updated_at"]?></td>
        <td>
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
