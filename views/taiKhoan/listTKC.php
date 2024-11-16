<?php
include '../include/header.php';
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
                    <th scope="col">Voucher</th>
                    <th scope="col">Vai trò</th>
                    <th scope="col" colspan="2">Trạng Thái</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($listTK as $item): ?>
                    <tr>
                        <td><?= $item['id'] ?></td>
                        <td><?= $item['username'] ?></td>
                        <td><?= $item['email'] ?></td>
                        <td><?= $item['password'] ?></td>
                        <td><?= $item['created_at'] ?></td>
                        <td><?= $item['updated_at'] ?></td>
                        <td>
                            <!-- In nhiều voucher nếu có -->
                            <?php if (!empty($item['vouchers'])): ?>
                                <p><?= nl2br($item['vouchers']) ?></p>
                            <?php endif; ?>
                        </td>
                        <td>
                            <select name="role[<?= $item['id'] ?>]" class="form-control">
                                <option value="1" <?= $item['role'] == 1 ? 'selected' : '' ?>>ADMIN</option>
                                <option value="2" <?= $item['role'] == 2 ? 'selected' : '' ?>>Nhân Viên</option>
                                <option value="3" <?= $item['role'] == 3 ? 'selected' : '' ?>>Khách Hàng</option>
                            </select>
                        </td>
                        <td>
                            <select name="status[<?= $item['id'] ?>]" class="form-control">
                                <option value="1" <?= $item['status'] == 1 ? 'selected' : '' ?>>Active</option>
                                <option value="0" <?= $item['status'] == 0 ? 'selected' : '' ?>>Inactive</option>
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
