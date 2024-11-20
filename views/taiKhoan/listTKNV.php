<?php
include './include/header.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách nhân viên</title>
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
            padding: 20px;
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
            padding: 12px;
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
        <h1>Danh sách nhân viên</h1>
        <form action="" method="post">
            <table class="table">
                <thead >
                    <tr>
                        <th scope="col">STT</th>
                        <th scope="col">Username</th>
                        <th scope="col">Email</th>
                        <th scope="col">Password</th>
                        <th scope="col">Ngày tạo</th>
                        <th scope="col">Ngày sửa</th>
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
    </div>
</body>

</html>
<?php include './include/footer.php'; ?>
