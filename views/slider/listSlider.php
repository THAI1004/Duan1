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
   
<h1>Danh sách banner</h1>
<table class="table table-striped table-hover table-bordered table-sm text-center custom-table">
<thead  class="table-dark">
    <tr>
            <tr>
                <th scope="col">STT</th>
                <th scope="col">Ảnh</th>
                <th scope="col">Link</th>
                <th scope="col">Ngày tạo</th>
                <th scope="col">Ngày sửa</th>
                <th scope="col" colspan="2" class="text-center align-middle">Thao tác</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $i=1;
             foreach ($listSlider as $listSlider) {?>
                <tr>
                    <td><?= $i++ ?></td>
                    <td><img src="<?=$listSlider['image_url'] ?>" alt="" width="200px"></td>
                    <td><?=$listSlider['link'] ?></td>
                    <td><?=$listSlider['created_at'] ?></td>
                    <td><?=$listSlider['updated_at'] ?></td>
                    <td >
                        <a class="btn btn-danger" href="?act=editSlider&id=<?= $listSlider["id"]?>">Sửa</a>
                        <a  class="btn btn-secondary" onclick="return confirm('Bạn có chắc chắn muốn xóa không?')" href="?act=deleteSlider&id=<?= $listSlider["id"] ?>">Xóa</a>
                    </td>
                </tr>
            <?php }?>
        </tbody>
    </table>
    <a class="btn btn-primary" href="?act=addSlider">Thêm banner</a>
</body>
</html>
<?php

include './include/footer.php';

?>
