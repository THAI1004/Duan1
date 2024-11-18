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
if (isset($_GET["idVariant"])) {
    $idVariant = $_GET["idVariant"];}
$productC = new productController();
// 3. Kiểm tra giá trị "act" và gọi xuống controller tương ứng
switch ($act) {
    case "Trangchu":
        include './views/index.php';
        break;
    case "listProduct":
   
        $productC->listProduct();
        break;
    case "addProduct":
     
        $productC->showFormCreate();
        break;
    case "submitAddProduct":
       
        $productC->addProduct();
        break;
    case "deleteProduct":
       
        $productC->delete($id);
        break;
    case "editProduct":
        
        $productC->showFormEdit($id);
        break;
    case "submitEditProduct":
    
        $productC->submitEdit($id);
        case "listProductVariant":
   
            $productC->listProductVariant($id);
            break;
    case "addVariant":
        $productC->showFormAddVariant($id);
        break;
    case "submitAddProductVariant":
        $productC->addProductVariant($id);
        break;
    case "updateVariant":
        $productC->showFormEditVariant($id,$idVariant);
        break;
    case "submitEditProductVariant":
        $productC->submitEditVariant($id,$idVariant);
        break;
    case "deleteVariant":
        $productC->deleteVariant($id,$idVariant);
        break;
        case "searchProduct":
            $keyword = $_POST['search'] ?? '';
            $productC->searchProduct($keyword);
            break;





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
