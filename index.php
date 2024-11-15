<?php
// 1. Nhúng các file cần thiết
include_once "./model/admin/product/product.php";
include_once "./model/admin/category/category.php";
include_once "./controller/product.php";
include_once "./controller/home.php";
include_once "./controller/category.php";
include_once "./model/admin/review/reviews.php";
include_once "./controller/review.php";

$act = $_GET['act'] ?? 'Trangchu';
$id = "";
if (isset($_GET["id"])) {
    $id = $_GET["id"];
}
$productC = new productController();
$reviewC = new ReviewController();
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
    
    case "listReview":
       
        $reviewC->listReview($id);
        break;
   
    case "deleteReview":
   
        $reviewC->delete($id);
        break;
    
}
