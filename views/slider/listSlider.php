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
    }

    h1 {
        color: #007bb5;
        margin-bottom: 30px;
        font-weight: 700;
        font-size: 36px;
        text-align: left;
    }

    .table-wrapper {
        width: 100%;
        overflow-x: auto;
        border-radius: 12px; /* Bo tròn bảng */
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
    }

    .table {
        width: 100%;
        min-width: 600px;
        table-layout: auto;
        border-collapse: separate; /* Để hỗ trợ bo tròn */
        border-spacing: 0; /* Xóa khoảng cách giữa các ô */
        border-radius: 12px; /* Bo tròn toàn bảng */
        overflow: hidden;
        background-color: #fff;
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
    }

    .table thead {
        background-color: #007bb5;
        color: #fff;
    }

    .table thead th:first-child {
        border-top-left-radius: 12px; /* Bo tròn góc trên trái */
    }

    .table thead th:last-child {
        border-top-right-radius: 12px; /* Bo tròn góc trên phải */
    }

    .table tbody tr:last-child td:first-child {
        border-bottom-left-radius: 12px; /* Bo tròn góc dưới trái */
    }

    .table tbody tr:last-child td:last-child {
        border-bottom-right-radius: 12px; /* Bo tròn góc dưới phải */
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

    img {
        max-width: 100%;
        height: auto;
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

    @media (max-width: 768px) {
        h1 {
            font-size: 28px;
            text-align: center;
        }

        .table {
            font-size: 14px;
        }

        .table th,
        .table td {
            padding: 8px;
            font-size: 12px;
        }

        .btn {
            padding: 10px;
            font-size: 14px;
        }
    }
</style>
</head>
<body>

<h1>Danh sách banner</h1>
<div class="table-wrapper">
    <table class="table table-striped table-hover table-bordered table-sm text-center custom-table">
        <thead class="table-dark">
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
            $i = 1;
            foreach ($listSlider as $listSlider) { ?>
                <tr>
                    <td><?= $i++ ?></td>
                    <td><img src="<?= $listSlider['image_url'] ?>" alt="" width="200px"></td>
                    <td><?= $listSlider['link'] ?></td>
                    <td><?= $listSlider['created_at'] ?></td>
                    <td><?= $listSlider['updated_at'] ?></td>
                    <td>
                        <a class="btn btn-danger" href="?act=editSlider&id=<?= $listSlider["id"] ?>">Sửa</a>
                        <a class="btn btn-secondary" onclick="return confirm('Bạn có chắc chắn muốn xóa không?')" href="?act=deleteSlider&id=<?= $listSlider["id"] ?>">Xóa</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
<a class="btn btn-primary" href="?act=addSlider">Thêm banner</a>
</body>
</html>
<?php
include './include/footer.php';
?>
