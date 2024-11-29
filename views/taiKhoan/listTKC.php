<?php
include './include/header.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách khách hàng</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f4f8fb;
            color: #333;
            overflow-x: hidden;
        }

        .container {
            width: 90%;
            max-width: 1200px;
            margin: 0;
            padding: 20px 20px 20px 0px;
        }

        h1 {
            color: #007bb5;
            margin-bottom: 30px;
            font-weight: 700;
            font-size: 36px;
            text-align: left;
        }

        .table {
            width: 100%;
            table-layout: auto;
            border-collapse: collapse;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
            background-color: #fff;
            border-radius: 12px;
            font-size: 16px;
            overflow: hidden;
        }

        .table th,
        .table td {
            padding: 6px;
            text-align: center;
            border-bottom: 1px solid #ddd;
            font-size: 16px;
            height: 70px;
            vertical-align: middle;
            white-space: nowrap;
            word-wrap: break-word;
        }

        .table thead {
            background-color: #007bb5;
            color: #fff;
        }

        .table tbody tr:nth-child(even) {
            background-color: #e9f6fc;
        }

        .table tbody tr:nth-child(odd) {
            background-color: #fdfdfd;
        }

        .table tbody tr:hover {
            background-color: #d1efff;
        }

        select.form-control {
            width: 100%;
            min-width: 150px;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 16px;
            background-color: #fff;
            box-sizing: border-box;
            text-align: left;
            white-space: nowrap;
            overflow: hidden;
        }

        select.form-control option {
            padding: 10px;
            white-space: nowrap;
        }

        .btn {
            padding: 12px 20px;
            border: none;
            border-radius: 5px;
            color: #fff;
            text-decoration: none;
            cursor: pointer;
            transition: background-color 0.3s ease;
            font-size: 16px;
        }

        .btn-primary {
            background-color: #28a745;
        }

        .btn-primary:hover {
            background-color: #218838;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Danh sách khách hàng</h1>
        <form action="?act=listTKC" method="post">
            <table class="table">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Password</th>
                        <th>Ngày tạo</th>
                        <th>Ngày sửa</th>
                        <th>Voucher</th>
                        <th>Trạng Thái</th>
                        <th>Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($listTK as $index => $item): ?>
                        <tr>
                            <td><?= $index + 1 ?></td>
                            <td><?= $item['username'] ?></td>
                            <td><?= $item['email'] ?></td>
                            <td><?= $item['password'] ?></td>
                            <td><?= $item['created_at'] ?></td>
                            <td><?= $item['updated_at'] ?></td>
                            <td><?= !empty($item['vouchers']) ? nl2br($item['vouchers']) : 'Không có voucher' ?></td>
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
    </div>
</body>

</html>


<?php
include './include/footer.php';
?>