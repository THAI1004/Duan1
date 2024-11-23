<?php
session_start();
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
            $this->wishlistModel=new WishlistModel();
            $this->cartModel=new cartModel();
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
        public function searchProductClient($keyword) {
            $listCate=$this->categoryModel->getAllCategory();
            if($keyword==""){}
            $listProduct = $this->productModel->searchProduct($keyword); 
            $productsPerPage = 9; // Số sản phẩm hiển thị trên mỗi trang
$totalProducts = count($listProduct); // Tổng số sản phẩm
$totalPages = ceil($totalProducts / $productsPerPage); // Tổng số trang

// Lấy trang hiện tại từ URL, mặc định là trang 1
if (isset($_GET['page']) && is_numeric($_GET['page'])) {
    $currentPage = (int) $_GET['page'];
} else {
    $currentPage = 1;
}

// Tính toán vị trí bắt đầu
$startIndex = ($currentPage - 1) * $productsPerPage;

// Lấy danh sách sản phẩm cho trang hiện tại
$productsToDisplay = array_slice($listProduct, $startIndex, $productsPerPage);// Gọi model để tìm kiếm sản phẩm
            require_once './views/client/listProduct.php';
            // Hiển thị kết quả trong view
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