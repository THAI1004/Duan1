<?php
include './include/header.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Danh sách danh mục</h1>
    <table class="table table-bordered">
        <thead style="background-image: radial-gradient(circle 248px at center, #16d9e3 0%, #30c7ec 47%, #46aef7 100%);">
            <tr>
                <th scope="col">STT</th>
                <th scope="col" >Tên</th>
                <th scope="col" >Mô tả</th>
                <th scope="col" >Ngày tạo</th>
                <th scope="col" >Ngày cập nhật</th>
                <th scope="col" colspan="3" >Thao tác</th>
        </thead>
        <tbody>
            <?php foreach ($listcategory as $listcategory): ?>
                <tr>
                    <td><?= $listcategory['id'] ?></td>
                    <td><?= $listcategory['category_name'] ?></td>
                    <td><?= $listcategory['description'] ?></td>
                    <td><?= $listcategory['created_at'] ?></td>
                    <td><?= $listcategory['updated_at'] ?></td>
                    <td class="text-center align-middle"><a class="btn btn-danger" href="?act=editCategory&id=<?= $listcategory['id'] ?>">Sửa</a></td>
                     <td class="text-center align-middle"><a class="btn btn-secondary" onclick="return confirm('Bạn có chắc chắn muốn xóa không?')" href="?act=deleteCategory&id=<?= $listcategory['id'] ?>">Xóa</a></td>
                     <td class="text-start align-middle"> <a class="btn btn-primary" href="?act=addCategory">Thêm Danh Mục</a>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</body>

</html>
<?php
include './include/footer.php';
?>