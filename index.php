<?php
// 1. Nhúng các file cần thiết
include_once "./model/admin/product/product.php";
include_once "./model/admin/category/category.php";
include_once "./model/admin/taikhoan/taikhoan.php";
include_once "./controller/product.php";
include_once "./controller/category.php";
include_once "./controller/taiKhoan.php";
$act = $_GET['act'] ?? 'Trangchu';
$id = "";
if (isset($_GET["id"])) {
    $id = $_GET["id"];
}
$idVariant = "";
if (isset($_GET["idVariant"])) {
    $idVariant = $_GET["idVariant"];
}
$categoryC = new categoryController();
$taiKhoan = new AccountController();
$productC = new productController();
switch ($act) {
    case "Trangchu":
        include "views/index.php";
        break;
    case "listProduct":

        $productC->listProduct();
        break;
    case "searchProduct":
        $keyword = $_POST['search'] ?? '';
        $productC->searchProduct($keyword);
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
    case "deleteVariant":

        $productC->deleteVariant($id, $idVariant);
        break;
    case "addVariant":

        $productC->showFormAddVariant($id);
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
        $taiKhoan->listTKC();
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
}
