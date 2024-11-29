
<?php
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
include_once "./model/admin/cart/cart.php";
include_once "./model/admin/projectInfo/projectInfo.php";
include_once "./controller/product.php";
include_once "./controller/review.php";
include_once "./controller/slider.php";
include_once "./controller/oder.php";
include_once "./controller/home.php";
include_once "./controller/ClientController.php";

$act = $_GET['act'] ?? 'homeClient';
$id = "";
if (isset($_GET["id"])) {
    $id = $_GET["id"];
}
if (isset($_GET["idVariant"])) {
    $idVariant = $_GET["idVariant"];
}
if (isset($_GET["page"])) {
    $page = $_GET["page"];
}

$productC = new productController();
// 3. Kiểm tra giá trị "act" và gọi xuống controller tương ứng
$categoryC = new categoryController();
$taiKhoan = new AccountController();
$productC = new productController();
$oder = new oderController();
$home = new homeController();
$client = new clientController();
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
        $productC->showFormEditVariant($id, $idVariant);
        break;
    case "submitEditProductVariant":
        $productC->submitEditVariant($id, $idVariant);
        break;
    case "deleteVariant":
        $productC->deleteVariant($id, $idVariant);
        break;
    case "searchProduct":
        $keyword = $_POST['search'] ?? '';
        $productC->searchProduct($keyword);
        break;
    case "searchProductClient":
        $keyword = $_POST['search'] ?? '';
        $client->includeClient();

        $client->searchProductClient($keyword);
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
    case "formLogin":
        $client->includeClient();
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
    case "listProductByCate":
        $client->includeClient();
        $client->ProductByCategory($id);
        break;
    case "login":
        $client->includeClient();
        $client->login();

        break;
    case "logout":
        $client->logout();
        break;
    case "singup":
        $client->singup();
        break;
    case "gioiThieu":
        $client->includeClient();
        $client->GioiThieu();
        break;
    case "addWishlist":
        $client->addToWishlist($id);
        break;
    case "wishlist":
        $client->includeClient();
        $client->listWishlist();
        break;
    case "deleteWishlist":
        $client->deleteWishlist($id);
        break;
    case "deleteCart":
        $client->deleteCart($id);
        break;
    case "viewCart":
        $client->includeClient();
        $client->viewCart();
        break;
    case "updateCart":
        $client->updateCart();
        break;
    case "updateCartVoucher":
        $client->includeClient();
        $client->updateCartVoucher();
        break;
    case "listProductClient":
        $client->includeClient();
        $client->listProduct();
        break;
    case "productByPrice":
        $client->includeClient();
        $client->ProductByprice($id);
        break;
    case "myAccount":
        $client->includeClient();
        $client->myAccount();
        break;
    case "changeAccount":
        $client->updateAccount();
        break;
    case "productDetail":
        $client->includeClient();
        $client->productDetail($id);
        break;
    case "contactUS":
        $client->includeClient();
        $client->contactUS();
        break;
    case "addCart":
        $client->addCart($id);
        break;
    case "formForgetPass":
        $client->includeClient();
        $client->formEmail();
        break;
    case "sendPass":
        $client->sendPass();
        break;
    case "formResetPass":
        $client->includeClient();
        $client->formReset();
        break;
    case "resetPassword":
        $client->resetPassword();
        break;
    case "review":
        $client->review();
        break;
    case "checkout":
        $client->includeClient();
        $client->checkout();
        break;
    case "order":
        $client->order();
        break;
    case "Er404":
        $client->Er404();
        break;
}
