<?php
class homeController{
    public $productModel;
    public $userModel;
    public $orderModel;
    public $categoryModel;
    public function __construct()

    {
        $this->productModel = new productModel();
        $this->userModel = new AccountModel();
        $this->orderModel = new oderModel();
        $this->categoryModel = new categoryModel();

    }
    public function home(){
        $thongkeCate=$this->categoryModel->thongKe();
        $thongKeOrder=$this->orderModel->getThongKe();
        // var_dump($thongKeOrder);
        include "./views/index.php";
}
}