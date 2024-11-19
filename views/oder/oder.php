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
        <h1>Danh sách đơn hàng</h1>
        <form action="" method="post">
            <table class="table">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Tên người đặt</th>
                        <th>Email</th>
                        <th>SĐT</th>
                        <th>ĐỊa chỉ</th>
                        <th>Trạng thái TT</th>
                        <th>Trạng thái giao hàng</th>
                        <th>Tổng tiền</th>
                        <th>Ngày tạo</th>
                        <th>Ngày cập nhật</th>
                        <th>Mã giảm giá</th>
                        <th>Tương tác</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    $i=1;
                    foreach($listOrder as $row){?>
                        <tr>
                            <td><?= $i++; ?></td>
                            <td><?= $row['username'] ?></td>
                            <td><?= $row['email'] ?></td>
                            <td><?= $row['phone'] ?></td>
                            <td><?= $row['address'] ?></td>
                            <td>
                                <select name="payment_status[<?= $row['id'] ?>]" class="form-control">
                                    <option value="pending" <?= $row['payment_status'] == "pending" ? 'selected' : '' ?>>Pending</option>
                                    <option value="completed" <?= $row['payment_status'] == "completed" ? 'selected' : '' ?>>Completed </option>
                                    <option value="failed" <?= $row['payment_status'] == "failed" ? 'selected' : '' ?>>Failed </option>
                                </select>
                            </td>
                            <td>
                                <select name="shipping_status[<?= $row['id'] ?>]" class="form-control">
                                    <option value="pending" <?= $row['shipping_status'] == "pending" ? 'selected' : '' ?>>pending</option>
                                    <option value="shipped" <?= $row['shipping_status'] == "shipped" ? 'selected' : '' ?>>shipped</option>
                                    <option value="delivered" <?= $row['shipping_status'] == "delivered" ? 'selected' : '' ?>>delivered</option>
                                    <option value="cancelled" <?= $row['shipping_status'] == "cancelled" ? 'selected' : '' ?>>cancelled</option>
                                </select>
                            </td>
                            <td><?= $row['total_price'] ?></td>
                            <td><?= $row['created_at'] ?></td>
                            <td><?= $row['updated_at'] ?></td>
                            <td><?= !empty($row['code']) ? nl2br($row['code']) : 'Không có voucher' ?></td>
                            <td class="text-center align-middle">
                                <input type="submit" name="status" class="btn btn-primary" value="Lưu">
                                <a class="btn btn-info" href="?act=chitietorder&id=<?= $row["id"]?>">Chi tiết đơn hàng</a>
                            </td>
                            
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </form>
    </div>
</body>

</html>


<?php
include './include/footer.php';
?>