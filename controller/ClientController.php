<?php
    class clientController{
        public $productModel;
        public $userModel;
        public $oderModel;
        public $categoryModel;
        public $slideModel;
        public $reviewModel;
        public $blogModel;
        
        public function __construct()
        {
            $this->productModel=new productModel();
            $this->userModel=new AccountModel();
            $this->oderModel=new oderModel();
            $this->categoryModel=new categoryModel();
            $this->slideModel=new sliderModel();
            $this->reviewModel=new reviewModel();
            $this->blogModel=new blogModel();
        }
        public function HomeClient(){
            $listCate=$this->categoryModel->getAllCategory();
            $listCateTop=$this->categoryModel->getCategoryTop();
            $listCateTopOrder=$this->categoryModel->getCategoryTopOrder();
            var_dump($listCateTopOrder);
            $listBlog=$this->blogModel->getAllBlog();
            $listSlider=$this->slideModel->getAllSlider();
            require "./views/client/index.php";
        }
    }
?>