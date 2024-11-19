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
    margin: 0 auto;
    padding: 20px;
    overflow-x: hidden; /* Không tạo thanh cuộn ngang */
}

.table {
    width: 100%;
    /* table-layout: fixed; Cố định độ rộng cột để tránh tràn */
    border-collapse: collapse;
    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
    background-color: #fff;
    border-radius: 12px;
    font-size: 14px;
    overflow: hidden;
}

.table th, .table td {
    text-align: center;
    border-bottom: 1px solid #ddd;
    font-size: 14px;
    height: 60px;
    padding: 5px;
    vertical-align: middle;
    overflow: hidden;
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
    min-width: 100px;
    padding: 8px;
    border: 1px solid #ddd;
    border-radius: 4px;
    font-size: 14px;
    background-color: #fff;
}

select.form-control option {
    padding: 8px;
}

.btn {
    padding: 10px 15px;
    border: none;
    border-radius: 5px;
    color: #fff;
    text-decoration: none;
    cursor: pointer;
    font-size: 14px;
    width: 100%; /* Đảm bảo nút chiếm toàn bộ chiều rộng */
    margin-bottom: 5px; /* Khoảng cách giữa hai nút */
}

.btn-primary {
    background-color: #28a745;
}

.btn-primary:hover {
    background-color: #218838;
}

.btn-info {
    background-color: #17a2b8;
}

.btn-info:hover {
    background-color: #138496;
}

.table td .text-center {
    display: flex;
    flex-direction: column; /* Đặt các nút theo chiều dọc */
    gap: 5px; /* Khoảng cách giữa các nút */
    align-items: center;
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
                        <th>Địa chỉ</th>
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