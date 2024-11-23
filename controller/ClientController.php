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
        public $cartModel;
        
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
            $_SESSION["user_id"]=2;
            $productLimit20=$this->productModel->getProductLimit20();
            $listBlogs=$this->blogModel->getAllBlog();
            $listSlider=$this->slideModel->getAllSlider();
            $wishlist = $this->wishlistModel->getWishlistById($_SESSION["user_id"]);
            
           
            require "./views/client/index.php";
            
        }
        public function searchProductClient($keyword) {
            $listCate=$this->categoryModel->getAllCategory();
            if($keyword==""){}
            $listProductById = $this->productModel->searchProduct($keyword); // Gọi model để tìm kiếm sản phẩm
            require_once './views/client/ProductByCategory.php';
            // Hiển thị kết quả trong view
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
        public function viewCart(){
            $listCart=$this->cartModel->getAllCartItemByIdUser($_SESSION["user_id"]);
            // var_dump($listCart);
            if(isset($_SESSION["user_id"])){
                $vouchers=$this->cartModel->getVoucherByIdUser($_SESSION["user_id"]);
            $voucher=$this->cartModel->getVoucher($_SESSION["user_id"]);

                // var_dump($voucher);
            }
            include "./views/client/cart.php";
        }
        public function deleteCart($id){
            if($id!==""){
                $datadelete=$this->cartModel->deleteCart($id);
                if($datadelete==="OK"){
                    header("location: ?act=viewCart");
                }
                // chuyển hướng về trang danh sách
               
            }else{
                echo "Không có thông tin id mời bạn kiểm tra lại";
            }
        } 
        public function updateCart() {
            if (isset($_POST['cart_item_id']) && isset($_POST['quantity'])) {
                $cartItemId = $_POST['cart_item_id'];
                $newQuantity = $_POST['quantity'];
                
                // Kiểm tra xem quantity có phải là số hợp lệ
                if (is_numeric($newQuantity) && $newQuantity > 0) {
                    $cartModel = new CartModel();
                    $result = $cartModel->updateCart($cartItemId, $newQuantity);
            
                    if ($result) {
                        // Cập nhật thành công, có thể chuyển hướng về trang giỏ hàng
                        header("Location: ?act=viewCart");
                    } else {
                        // Xử lý khi cập nhật thất bại
                        echo "Update failed!";
                    }
                } else {
                    echo "Invalid quantity!";
                }
            }
        }
        public function updateCartVoucher() {
            // Kiểm tra nếu người dùng đã đăng nhập và voucher được chọn
            if (isset($_POST['voucher']) && $_POST['voucher'] !== '' && isset($_SESSION["user_id"])) {
                $voucherCode = $_POST['voucher']; // Mã voucher người dùng chọn
                $userId = $_SESSION["user_id"];   // Lấy user_id từ session
        
                // Gọi model để cập nhật voucher trong giỏ hàng
                $result = $this->cartModel->updateCartVoucher($userId, $voucherCode);
                
                // Kiểm tra kết quả
                if ($result) {
                    // Cập nhật thành công, chuyển hướng về trang giỏ hàng
                    header("Location: ?act=viewCart");
                    exit;
                } else {
                    // Thông báo khi cập nhật thất bại
                    echo "Update failed!";
                }
            } else {
                // Nếu không có voucher hoặc người dùng chưa đăng nhập
                echo "Voucher not selected or user not logged in.";
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