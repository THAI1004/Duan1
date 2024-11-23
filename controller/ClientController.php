<?php
    class clientController{
        public $productModel;
        public $userModel;
        public $oderModel;
        public $categoryModel;
        public $slideModel;
        public $reviewModel;
        public $blogModel;
        public $projectInforModel;
        public function __construct()
        {
            $this->productModel=new productModel();
            $this->userModel=new AccountModel();
            $this->oderModel=new oderModel();
            $this->categoryModel=new categoryModel();
            $this->slideModel=new sliderModel();
            $this->reviewModel=new reviewModel();
            $this->blogModel=new blogModel();
            $this->projectInforModel=new projectInforModel();
        }
        public function HomeClient(){
            $listCate=$this->categoryModel->getAllCategory();
            $listCateTop=$this->categoryModel->getCategoryTop();
            $listCateTopOrder=$this->categoryModel->getCategoryTopOrder();
            $listProduct=$this->productModel->getAllProduct();
            $projectInfor=$this->projectInforModel->getAllProjectInfor();
            // var_dump($listProduct);
            $productLimit20=$this->productModel->getProductLimit20();
            $listBlogs=$this->blogModel->getAllBlog();
            $listSlider=$this->slideModel->getAllSlider();
            
           
            require "./views/client/index.php";
            
        }
        public function formLogin(){
            include "./views/client/login.php";
        }
        public function blog($id){
            $listBlog=$this->blogModel->getBlogById($id);
         
            include "./views/client/blog_detail.php";
        }
        public function includeClient(){
            $listCate=$this->categoryModel->getAllCategory();
            $listBlogs=$this->blogModel->getAllBlog();
            include "./include/headerClient.php";
        }
        public function homeBlog(){
            $listBlogs=$this->blogModel->getAllBlog();
            include "./views/client/homeBlog.php";
        }
        public function productDetail($id){
            // $listProduct=$this->productModel->getAllProduct();
            $listProductById=$this->productModel->getProductById($id);
            $getAllProductSize=$this->productModel->getAllProductVariant($id);
            $getAllProductImage=$this->productModel->getAllProductVariant($id);
            $getAllProductImagePhu=$this->productModel->getAllProductVariant($id);
            $getAllProductColor=$this->productModel->getAllProductVariant($id);
            include "./views/client/product_detail.php";
        }
        
    }
?>