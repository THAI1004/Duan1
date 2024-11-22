<?php
session_start();
include "./controller/product.php";
include "./controller/category.php";
include "./controller/taiKhoan.php";
include_once "./model/admin/taiKhoan/taiKhoan.php";
include_once "./model/admin/product/product.php";
include_once "./model/admin/product/wishlist.php";
include_once "./model/admin/category/category.php";
include_once "./model/admin/review/review.php";
include_once "./model/admin/slider/slider.php";
include_once "./model/admin/oder/oder.php";
include_once "./model/admin/blog/blog.php";
include_once "./model/admin/projectInfo/projectInfo.php";
include_once "./controller/product.php";
include_once "./controller/review.php";
include_once "./controller/slider.php";
include_once "./controller/oder.php";
include_once "./controller/home.php";
include_once "./controller/ClientController.php";

$act = $_GET['act'] ?? 'Trangchu';
$id = "";
if (isset($_GET["id"])) {
    $id = $_GET["id"];
}
if (isset($_GET["idVariant"])) {
    $idVariant = $_GET["idVariant"];}
$productC = new productController();
// 3. Kiểm tra giá trị "act" và gọi xuống controller tương ứng
$categoryC = new categoryController();
$taiKhoan = new AccountController();
$productC = new productController();
$oder=new oderController();
$home=new homeController();
$client=new clientController();
switch ($act) {
    case "Trangchu":
        $client->HomeClient();
        break;
    case "Admin":
        $home->home();
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
        break;
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
    case 'listDanhMuc':
        $categoryC->listCategory();
        break;
    case 'addCategory':
        $categoryC->formCategory();
        break;
    case 'submitAddCategory':
        $categoryC->addCategory();
        break;
    case 'deleteCategory':
        $id = $_GET['id'];
        $categoryC->delete($id);
        break;
    case 'editCategory':
        $id = $_GET['id'];
        $categoryC->formEdit($id);
        break;
    case 'update':
        $id = $_GET['id'];
        $categoryC->update($id);
        break;
    case 'listTKNV':
        $taiKhoan->listTKNV();
        break;
    case 'listTKC':
        $taiKhoan->listTKC($id);
        break;
    case 'listOrder':
        $oder->listOrder();
        break;
    case 'chitietorder':
        $oder->chitietOrder($id);
        break;   
    case "homeClient":
        $client->HomeClient($id);
        break;
    case "login":
        $client->formLogin();
        break;
    case "blog":
        $client->includeClient();
        $client->blog($id);
        break;
    case "homeBlog":
        $client->includeClient();
        $client->homeBlog();
        break;
    case "gioiThieu":
        $client->includeClient();
        $client->GioiThieu();
        break;
    case "addWishlist":
        $client->addWishlist($id);
        break;
    case "wishlist":
        $client->includeClient();
        $client->listWishlist();
        break;
    case "deleteWishlist":
        $client->deleteWishlist($id);
        break;
}
