<?php
session_start();
class clientController
{
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
        $this->productModel = new productModel();
        $this->userModel = new AccountModel();
        $this->oderModel = new oderModel();
        $this->categoryModel = new categoryModel();
        $this->slideModel = new sliderModel();
        $this->reviewModel = new reviewModel();
        $this->blogModel = new blogModel();
        $this->projectInforModel = new projectInforModel();
        $this->wishlistModel = new WishlistModel();
    }
    public function HomeClient()
    {
        $listCate = $this->categoryModel->getAllCategory();
        $listCateTop = $this->categoryModel->getCategoryTop();
        $listCateTopOrder = $this->categoryModel->getCategoryTopOrder();
        $listProduct = $this->productModel->getAllProduct();
        $projectInfor = $this->projectInforModel->getAllProjectInfor();
        // var_dump($listProduct);
        $productLimit20 = $this->productModel->getProductLimit20();
        $listBlogs = $this->blogModel->getAllBlog();
        $listSlider = $this->slideModel->getAllSlider();
        if(isset($_SESSION['user_id'])){
        $wishlist = $this->wishlistModel->getWishlistById($_SESSION["user_id"]);
        $user= $this->userModel->getIdTK($_SESSION["user_id"]);
        }
        require "./views/client/index.php";
    }
    public function listProduct()
    {
        $listCate = $this->categoryModel->getAllCategory();
        $listProduct = $this->productModel->getAllProduct();
        include "./views/client/listProduct.php";
    }
    public function formLogin()
    {
        include "./views/client/login.php";
    }
    public function login()
    {
        if (isset($_POST['login'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $account = $this->userModel->getAccount($username, $password);
            if ($account === false) {
                $_SESSION['login_error'] = "Sai tài khoản hoặc mật khẩu!";
                include "./views/client/login.php";
            } else {
                $_SESSION['user_id'] = $account['id'];  // Lưu ID người dùng
                $_SESSION['username'] = $account['username'];  // Lưu tên người dùng
                header('Location: index.php');
                exit();
            }
        }
    }
    public function logout()
    {
        session_unset();
        header('location: index.php');
    }
    public function singup()
    {
        $thongBaoLoi = "";
        $thongBaoTC = "";
        if (isset($_POST['singup'])) {
            $username = $_POST['username'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $address = $_POST['address'];
            $password = $_POST['password'];
            $repeatPassword = $_POST['repeatPassword'];
            $usernameError = "";
            $emailError = "";
            $phoneError = "";
            $addressError = "";
            $passwordError = "";
            $repeatPasswordError = "";
            if (empty($username)) {
                $usernameError = "Username is required.";
            }
            if (empty($email)) {
                $emailError = "Email is required.";
            } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $emailError = "Invalid email format.";
            }
            if (empty($phone)) {
                $phoneError = "Phone number is required.";
            } elseif (!preg_match('/^[0-9]{10,11}$/', $phone)) {
                $phoneError = "Invalid phone number. It should be 10 or 11 digits.";
            }
            if (empty($address)) {
                $addressError = "Address is required.";
            }
            if (empty($password)) {
                $passwordError = "Password is required.";
            } elseif (strlen($password) < 6) {
                $passwordError = "Password must be at least 6 characters.";
            }
            if (empty($repeatPassword)) {
                $repeatPasswordError = "Please repeat your password.";
            } elseif ($password !== $repeatPassword) {
                $repeatPasswordError = "Passwords do not match.";
            }
            $result = $this->userModel->insertTaiKhoan($username, $email, $phone, $address, $password);
            if ($result === "OK") {
                // Gửi thông báo đăng ký thành công
                $_SESSION['message'] = "success|Đăng ký thành công! Mời bạn đăng nhập.";
                header('Location: ?act=formLogin'); // Chuyển về trang đăng nhập
                exit();
            } else {
                $_SESSION['message'] = "error|Lỗi khi thêm tài khoản. Vui lòng thử lại.";
                header('Location: ?act=formLogin'); // Quay lại trang đăng ký
                exit();
            }
        }
    }
    public function blog($id)
    {
        $listBlog = $this->blogModel->getBlogById($id);
        include "./views/client/blog_detail.php";
    }
    public function includeClient()
    {
        if(isset($_SESSION['user_id'])){
        $user= $this->userModel->getIdTK($_SESSION["user_id"]);
        }
        // Lấy tất cả danh mục và blog
        $listCate = $this->categoryModel->getAllCategory();
        $listBlogs = $this->blogModel->getAllBlog();

        // Kiểm tra xem session đã có user_id chưa, nếu chưa gán giá trị mặc định
        // Lấy danh sách wishlist của người dùng
        if (isset($_SESSION["user_id"])) {
            $wishlist = $this->wishlistModel->getWishlistById($_SESSION["user_id"]);
        }
        include "./include/headerClient.php";
    }

    public function homeBlog()
    {
        $listBlogs = $this->blogModel->getAllBlog();
        include "./views/client/homeBlog.php";
    }
    public function ProductByCategory($id)
    {
        $category = $this->categoryModel->getIdDM($id);
        $listCate = $this->categoryModel->getAllCategory();
        $listProductById = $this->productModel->getProductByCategoryId($id);
        include "./views/client/productByCategory.php";
    }
    public function gioiThieu()
    {
        include "./views/client/gioiThieu.php";
    }
    // Controller: ClientController.php
    public function addWishlist($id)
    {

        // Khởi tạo đối tượng WishlistModel
        $wishlistModel = new WishlistModel();

        // Gọi phương thức addWishlist() để thêm sản phẩm vào wishlist
        $wishlistModel->addWishlist($id);
    }

    // Phương thức này gọi Model để thêm sản phẩm vào wishlist
    public function listWishlist()
    {
        if (isset($_SESSION["user_id"])) {
            $wishlist = $this->wishlistModel->getAllWishlist($_SESSION["user_id"]);
        }
        include "./views/client/wishlist.php";
    }
    public function deleteWishlist($id)
    {
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
