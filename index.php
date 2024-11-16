<?php
// 1. Nhúng các file cần thiết
include_once "./model/admin/product/product.php";
include_once "./model/admin/category/category.php";
include_once "./model/admin/review/review.php";
include_once "./model/admin/slider/slider.php";
include_once "./controller/product.php";
include_once "./controller/admin/category/category.php";
include_once "./controller/review.php";
include_once "./controller/slider.php";
$act = $_GET['act'] ?? 'Trangchu';
$id = "";
if (isset($_GET["id"])) {
    $id = $_GET["id"];
}
// 3. Kiểm tra giá trị "act" và gọi xuống controller tương ứng
switch ($act) {
    case "Trangchu":
        include './views/index.php';
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
    case "editProduct":
        // Gọi xuống controller để xử lý logic và hiển thị file view
        $productC = new productController();
        $productC->showFormEdit($id);
        break;
    case "submitEditProduct":
        // Gọi xuống controller để xử lý logic và hiển thị file view
        $productC = new productController();
        $productC->submitEdit($id);

    case "listReview":
        $review = new reviewController();
        $review->listReview();
        break;

    case "deleteReview":
        // Gọi xuống controller để xử lý logic và hiển thị file view
        $review = new reviewController();
        $review->delete($id);
        break;

    case "listSlider":
        $slider = new sliderController();
        $slider->listSlider();
        break;

    case "addSlider":
        // Gọi xuống controller để xử lý logic và hiển thị file view
        $slider = new sliderController();
        $slider->addSlider();
        break;

        case "editSlider":
            // Gọi xuống controller để xử lý logic và hiển thị file view
            $slider = new sliderController();
            $slider->showFormEdit($id);
            break;
        case "submitEditSlider":
            // Gọi xuống controller để xử lý logic và hiển thị file view
            $slider = new sliderController();
            $slider->submitEdit($id);
            case "deleteSlider":
                // Gọi xuống controller để xử lý logic và hiển thị file view
                $review = new sliderController();
                $review->delete($id);
                break;
}
