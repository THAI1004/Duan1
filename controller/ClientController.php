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
        public $wishlistModel;
        
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
        }
        public function HomeClient(){
            $listCate=$this->categoryModel->getAllCategory();
            $listCateTop=$this->categoryModel->getCategoryTop();
            $listCateTopOrder=$this->categoryModel->getCategoryTopOrder();
            $listProduct=$this->productModel->getAllProduct();
            $projectInfor=$this->projectInforModel->getAllProjectInfor();
            // var_dump($listProduct);
            $_SESSION["user_id"]=2;
            $productLimit20=$this->productModel->getProductLimit20();
            $listBlogs=$this->blogModel->getAllBlog();
            $listSlider=$this->slideModel->getAllSlider();
            $wishlist = $this->wishlistModel->getWishlistById($_SESSION["user_id"]);
            
           
            require "./views/client/index.php";
            
        }
        public function formLogin(){
            include "./views/client/login.php";
        }
        public function login(){
            if(isset($_POST['login'])){
                $username =$_POST['username'];
                $password =$_POST['password'];
                $account = $this->userModel->getAccount($username,$password);
                if(is_array($account)){
                    $_SESSION['username']=$account;
                    header('location:index.php');
                }else{
                    echo"Sai tài khoản hoặc mật khẩu !!!";
                }

            }
        }
        public function logout(){
            session_unset();
            header('location: index.php');
        }
        public function singup(){
            if(isset($_POST['singup'])){
                $username=$_POST['username'];
                $email = $_POST['email'];
                $password=$_POST['password'];
            }
        }
        public function blog($id){
            $listBlog=$this->blogModel->getBlogById($id);
            include "./views/client/blog_detail.php";
        }
        public function includeClient(){
            // Lấy tất cả danh mục và blog
            $listCate = $this->categoryModel->getAllCategory();
            $listBlogs = $this->blogModel->getAllBlog();
        
            // Kiểm tra xem session đã có user_id chưa, nếu chưa gán giá trị mặc định
            if (!isset($_SESSION["user_id"])) {
                $_SESSION["user_id"] = 2;  // Gán user_id mặc định cho session
            }
        
            // Lấy danh sách wishlist của người dùng
            $wishlist = $this->wishlistModel->getWishlistById($_SESSION["user_id"]);

            include "./include/headerClient.php";
        }
        
        public function homeBlog(){
            $listBlogs=$this->blogModel->getAllBlog();
            include "./views/client/homeBlog.php";
        }
        public function ProductByCategory($id){
            $category = $this->categoryModel->getIdDM($id);
            $listCate=$this->categoryModel->getAllCategory();
            $listProductById=$this->productModel->getProductByCategoryId($id);
            include "./views/client/productByCategory.php";
        }
        public function gioiThieu(){
            include "./views/client/gioiThieu.php";
        }
        // Controller: ClientController.php
        public function addWishlist($id) {
                
                // Khởi tạo đối tượng WishlistModel
                $wishlistModel = new WishlistModel();
                
                // Gọi phương thức addWishlist() để thêm sản phẩm vào wishlist
                $wishlistModel->addWishlist($id);
            
        }
    
        // Phương thức này gọi Model để thêm sản phẩm vào wishlist
       public function listWishlist(){
        if(isset($_SESSION["user_id"])){
            $wishlist=$this->wishlistModel->getAllWishlist($_SESSION["user_id"]);
        }
        include "./views/client/wishlist.php";
       }
       public function deleteWishlist($id){
        if ($id !== "") {
            // Kiểm tra xem có tham số xác nhận xóa trong URL không
            if (isset($_GET['confirm_delete']) && $_GET['confirm_delete'] == 'true') {
                // Nếu có xác nhận, thực hiện xóa
                $datadelete = $this->wishlistModel->deleteWishlist($id);
                if ($datadelete === "OK") {
                    header("location: ?act=wishlist");
                    exit();
                }
            } else {
                // Hiển thị hộp thoại xác nhận xóa
                echo '<script>
                        if (confirm("Bạn có chắc chắn muốn xóa sản phẩm khỏi trang yêu thích không?")) {
                            // Nếu người dùng xác nhận, thêm tham số "confirm_delete=true" vào URL và chuyển hướng
                            window.location.href = "?act=deleteWishlist&id=' . $id . '&confirm_delete=true";
                        } else {
                            // Nếu người dùng hủy, quay lại trang wishlist
                            window.location.href = "?act=wishlist";
                        }
                      </script>';
            }
        } else {
            echo "Không có thông tin id, mời bạn kiểm tra lại";
        }
    }
    
    
}
?>