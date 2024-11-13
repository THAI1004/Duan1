<?php
// 1. Nhúng các file cần thiết
include_once "./model/admin/product/product.php";
include_once "./model/admin/category/category.php";
include_once "./controller/admin/product/product.php";
include_once "./controller/admin/home/home.php";
include_once "./controller/admin/category/category.php";
$act = $_GET['act'] ?? 'Trangchu';
$id = "";
if (isset($_GET["id"])) {
    $id = $_GET["id"];
}

// 3. Kiểm tra giá trị "act" và gọi xuống controller tương ứng
switch ($act) {
    case "Trangchu":
        $homeC = new homeController();
        $homeC->home();
        break;
    case "listProduct":
        // Gọi xuống controller để xử lý logic và hiển thị file view
        $productC = new productController();
        $productC->listProduct();
        break;
    case "addProduct":
        // Gọi xuống controller để xử lý logic và hiển thị file view
        $productC = new productController();
        $productC->showFormCreate();
        break;
    case "submitAddProduct":
            // Gọi xuống controller để xử lý logic và hiển thị file view
        $productC = new productController();
        $productC->addProduct();
        break;
    case "deleteProduct":
            // Gọi xuống controller để xử lý logic và hiển thị file view
    $productC = new productController();
    $productC->delete($id);
     break;
    
}
