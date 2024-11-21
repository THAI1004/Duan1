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
            $listBlog=$this->blogModel->getAllBlog();
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
        
    }
?>