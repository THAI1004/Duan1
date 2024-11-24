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
            
            $productLimit20=$this->productModel->getProductLimit20();
            $listBlogs=$this->blogModel->getAllBlog();
            $listSlider=$this->slideModel->getAllSlider();
            if(isset($_SESSION["user_id"])){
            $wishlist = $this->wishlistModel->getWishlistById($_SESSION["user_id"]);
            $listCart=$this->cartModel->getAllCartItemByIdUser($_SESSION["user_id"]);
            // var_dump($listCart);
            $user= $this->userModel->getIdTK($_SESSION["user_id"]);


            $cart=count($listCart);
            $vouchers=$this->cartModel->getVoucherByIdUser($_SESSION["user_id"]);
            $voucher=$this->cartModel->getVoucher($_SESSION["user_id"]);

            }
            include "./views/client/index.php";
        }
    public function formLogin()
    {
        include "./views/client/login.php";
    }
    public function blog($id)
    {
        $listBlog = $this->blogModel->getBlogById($id);

        include "./views/client/blog_detail.php";
    }
    public function homeBlog()
    {
        $listBlogs = $this->blogModel->getAllBlog();
        include "./views/client/homeBlog.php";
    }
    
    public function searchProductClient($keyword)
    {
        $listCate = $this->categoryModel->getAllCategory();
        if ($keyword == "") {
        }
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
        $productsToDisplay = array_slice($listProduct, $startIndex, $productsPerPage); // Gọi model để tìm kiếm sản phẩm
        require_once './views/client/listProduct.php';
        // Hiển thị kết quả trong view
    }

    public function listProduct()
    {
        $listCate = $this->categoryModel->getAllCategory();
        $listProduct = $this->productModel->getAllProduct();
        // Giả sử bạn có danh sách sản phẩm từ cơ sở dữ liệu là $listProduct
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
        $productsToDisplay = array_slice($listProduct, $startIndex, $productsPerPage);

        include "./views/client/listProduct.php";
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
                $_SESSION['login_success'] = "Đăng nhập thành công mời bạn bắt đầu mua hàng!";  // Lưu thông báo thành công

                // Chuyển hướng sau khi nhấn OK vào alert
                include "./views/client/login.php";  // Chuyển sang trang redirect
            }
        }
    }


    public function viewCart()
    {
        $listCart = $this->cartModel->getAllCartItemByIdUser($_SESSION["user_id"]);
        // var_dump($listCart);
        if (isset($_SESSION["user_id"])) {
            $vouchers = $this->cartModel->getVoucherByIdUser($_SESSION["user_id"]);
            $voucher = $this->cartModel->getVoucher($_SESSION["user_id"]);

            // var_dump($voucher);
        }
        include "./views/client/cart.php";
    }
    public function deleteCart($id)
    {
        if ($id !== "") {
            $datadelete = $this->cartModel->deleteCart($id);
            if ($datadelete === "OK") {
                header("location: ?act=viewCart");
            }
            // chuyển hướng về trang danh sách

        } else {
            echo "Không có thông tin id mời bạn kiểm tra lại";
        }
    }
    public function updateCart()
    {
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
    public function updateCartVoucher()
    {
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
    public function updateAccount()
    {
        if (isset($_SESSION['user_id'])) {
            $user = $this->userModel->getIdTK($_SESSION["user_id"]);
        }
        if (isset($_SESSION['user_id'])) {
            $orders = $this->oderModel->getOrderUser($_SESSION['user_id']);
        }
        // Khởi tạo các biến lỗi
        $thongBaoLoi = "";
        $usernameError = "";
        $phoneError = "";
        $addressError = "";
        $emailError = "";
        $passwordError = "";
        $currentPasswordError = "";
        $confirmPasswordError = "";

        // Nếu form được gửi đi
        if (isset($_POST['changeAccount'])) {
            // Lấy thông tin từ form
            $id = $_SESSION['user_id']; // Lấy ID người dùng từ session
            $username = $_POST['username'];
            $phone = $_POST['phone'];
            $address = $_POST['address'];
            $email = $_POST['email'];
            $currentPassword = $_POST['currentPassword'];
            $password = $_POST['password'];
            $confirmPassword = $_POST['confirmPassword'];

            // Kiểm tra các trường và gán thông báo lỗi
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
            $currentAccount = $this->userModel->getIdTK($_SESSION['user_id']);
            if ($currentPassword == '' || $password == '' || $confirmPassword == '') {
                $currentPassword = $password = $confirmPassword = $currentAccount['password'];
            } else {
                if ($currentPassword !== $currentAccount['password']) {
                    $currentPasswordError = "Current password does not match.";
                }
                if (strlen($password) < 6) {
                    $passwordError = "Password must be at least 6 characters.";
                }
                if (empty($confirmPassword)) {
                    $confirmPasswordError = "Please confirm your password.";
                } elseif ($password !== $confirmPassword) {
                    $confirmPasswordError = "Passwords do not match.";
                }
            }
            // Nếu có lỗi, không cập nhật vào DB mà giữ lại lỗi
            if ($usernameError || $emailError || $phoneError || $addressError || $passwordError || $currentPasswordError || $confirmPasswordError) {
                // Nếu có lỗi, chỉ hiển thị lại form và lỗi mà không reload trang
                $_SESSION['errors'] = [
                    'username' => $usernameError,
                    'email' => $emailError,
                    'phone' => $phoneError,
                    'address' => $addressError,
                    'currentPassword' => $currentPasswordError,
                    'password' => $passwordError,
                    'confirmPassword' => $confirmPasswordError
                ];
                $_SESSION['form_data'] = $_POST; // Giữ lại dữ liệu form để người dùng không phải nhập lại
            } else {
                // Nếu không có lỗi, thực hiện cập nhật tài khoản vào DB
                $result = $this->userModel->updateTaiKhoan($id, $username, $email, $phone, $address, $password);
                if ($result === "OK") {
                    $_SESSION['message'] = "success|Account updated successfully!";
                    header('Location: ?act=myAccount'); // Chuyển hướng về trang tài khoản sau khi cập nhật
                    exit();
                }
            }
        }
        include './views/client/account.php';
    }

    public function logout()
    {
        session_destroy();
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
    
    public function includeClient()
    {
        if (isset($_SESSION['user_id'])) {
            $user = $this->userModel->getIdTK($_SESSION["user_id"]);
            $listCart = $this->cartModel->getAllCartItemByIdUser($_SESSION["user_id"]);
            $cart = count($listCart);

            $vouchers = $this->cartModel->getVoucherByIdUser($_SESSION["user_id"]);
            $voucher = $this->cartModel->getVoucher($_SESSION["user_id"]);
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

    public function ProductByCategory($id)
    {
        $category = $this->categoryModel->getIdDM($id);
        $listCate = $this->categoryModel->getAllCategory();
        $listProductById = $this->productModel->getProductByCategoryId($id);
        $productsPerPage = 9; // Số sản phẩm hiển thị trên mỗi trang
        $totalProducts = count($listProductById); // Tổng số sản phẩm
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
        $productsToDisplay = array_slice($listProductById, $startIndex, $productsPerPage);
        include "./views/client/productByCategory.php";
    }
    public function ProductByPrice()
    {
        // Kiểm tra nếu có khoảng giá được gửi qua POST
        if (isset($_POST['price_range']) && !empty($_POST['price_range'])) {
            // Lấy khoảng giá từ input
            $price_range = $_POST['price_range'];
            $price_parts = explode(" - ", $price_range);

            // Kiểm tra xem khoảng giá có hợp lệ không
            if (count($price_parts) == 2 && is_numeric($price_parts[0]) && is_numeric($price_parts[1])) {
                $min_price = (int) $price_parts[0];
                $max_price = (int) $price_parts[1];

                // Lấy danh sách sản phẩm trong khoảng giá (cập nhật logic SQL để lấy sản phẩm trực tiếp từ cơ sở dữ liệu)
                $listCate = $this->categoryModel->getAllCategory();
                $listProductByPrice = $this->productModel->getProductByPrice($min_price, $max_price);

                // Phân trang sản phẩm
                $productsPerPage = 9; // Số sản phẩm hiển thị trên mỗi trang
                $totalProducts = count($listProductByPrice); // Tổng số sản phẩm
                $totalPages = ceil($totalProducts / $productsPerPage); // Tổng số trang

                // Lấy trang hiện tại từ URL, mặc định là trang 1
                $currentPage = isset($_GET['page']) && is_numeric($_GET['page']) ? (int) $_GET['page'] : 1;

                // Tính toán vị trí bắt đầu
                $startIndex = ($currentPage - 1) * $productsPerPage;

                // Lấy danh sách sản phẩm cho trang hiện tại
                $productsToDisplay = array_slice($listProductByPrice, $startIndex, $productsPerPage);

                // Bao gồm view để hiển thị sản phẩm
                include "./views/client/listProduct.php";
            } else {
                echo "Invalid price range.";
            }
        } else {
            echo "Please select a valid price range.";
        }
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
            // var_dump($wishlist);

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
    public function myAccount()
    {
        if (isset($_SESSION['user_id'])) {
            $user = $this->userModel->getIdTK($_SESSION["user_id"]);
        }
        if (isset($_SESSION['user_id'])) {
            $orders = $this->oderModel->getOrderUser($_SESSION['user_id']);
        }
        include './views/client/account.php';
    }
    public function contactUS()
    {

        include "./views/client/contactUS.php";
    }
    public function productDetail($id)
    {
        $Product = $this->productModel->getProductById($id);
        $listProducVariant = $this->productModel->getAllProductVariant($id);
        $getAllProductImagePhu = $this->productModel->getAllProductVariant($id);
        $getAllColor = $this->productModel->getAllColor();
        $getAllSize = $this->productModel->getAllSize();
        $listProduct = $this->productModel->getAllProduct();
        $productLimit20 = $this->productModel->getProductLimit20();
        $listReview=$this->reviewModel->getReviewById($id);
        $countReview=count($listReview);
        $totalRating = 0;  // Biến lưu tổng điểm rating
        $countReview = count($listReview);  // Đếm số lượng review

        // Duyệt qua tất cả các review và cộng dồn rating
        foreach ($listReview as $row) {
            $totalRating += $row['rating'];
        }

        // Nếu có ít nhất một review, tính điểm trung bình
        $averageRating = ($countReview > 0) ? $totalRating / $countReview : 0;  // Tránh chia cho 0
        // var_dump($productLimit20);
        include "./views/client/product_detail.php";
    }

    
}
