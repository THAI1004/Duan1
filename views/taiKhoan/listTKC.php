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
    <h1>Danh sách khách hàng</h1>
    <form action="" method="post">
        <table class="table table-bordered">
            <thead style="background-image: radial-gradient(circle 248px at center, #16d9e3 0%, #30c7ec 47%, #46aef7 100%);">
                <tr>
                    <th scope="col">STT</th>
                    <th scope="col">Username</th>
                    <th scope="col">Email</th>
                    <th scope="col">Password</th>
                    <th scope="col">Ngày tạo</th>
                    <th scope="col">Ngày sửa</th>
                    <th scope="col">Vai trò</th>
                    <th scope="col" colspan="2">Trạng Thái</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($listTK as $listTK): ?>
                    <tr>
                        <td><?= $listTK['id'] ?></td>
                        <td><?= $listTK['username'] ?></td>
                        <td><?= $listTK['email'] ?></td>
                        <td><?= $listTK['password'] ?></td>
                        <td><?= $listTK['created_at'] ?></td>
                        <td><?= $listTK['updated_at'] ?></td>
                        <td>
                            <select name="role[<?= $listTK['id'] ?>]" class="form-control">
                                <option value="1" <?= $listTK['role'] == 1 ? 'selected' : '' ?>>ADMIN</option>
                                <option value="2" <?= $listTK['role'] == 2 ? 'selected' : '' ?>>Nhân Viên</option>
                                <option value="3" <?= $listTK['role'] == 3 ? 'selected' : '' ?>>Khách Hàng</option>
                            </select>
                        </td>
                        <td>
                            <select name="status[<?= $listTK['id'] ?>]" class="form-control">
                                <option value="1" <?= $listTK['status'] == 1 ? 'selected' : '' ?>>Active</option>
                                <option value="0" <?= $listTK['status'] == 0 ? 'selected' : '' ?>>Inactive</option>
                            </select>
                        </td>
                        <td class="text-center align-middle">
                            <input type="submit" name="save_status" class="btn btn-primary" value="Lưu">
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </form>
</body>

</html>
<?php
include './include/footer.php';
?>