<?php
// 1. Nhúng các file cần thiết
include_once "./model/admin/product/product.php";
include_once "./model/admin/category/category.php";
include_once "./controller/product.php";
include_once "./controller/category.php";
$act = $_GET['act'] ?? 'Trangchu';
$id = "";
if (isset($_GET["id"])) {
    $id = $_GET["id"];
}
$idVariant = "";
if (isset($_GET["idVariant"])) {
    $idVariant = $_GET["idVariant"];
}
$productC = new productController();
switch ($act) {
    case "Trangchu":
        include "views/index.php";
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
    case "deleteVariant":
   
    $productC->deleteVariant($id,$idVariant);
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
    
}
