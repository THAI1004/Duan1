<?php
session_start();
require 'vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class clientController
{
    public $productModel;
    public $userModel;
    public $oderModel;
    public $categoryModel;
    public $slideModel;
    public $reviewModel;
    public $blogModel;
    public $wishlistModel;
    public $cartModel;

    public function __construct()
    {
        $this->productModel = new productModel();
        $this->userModel = new AccountModel();
        $this->oderModel = new oderModel();
        $this->categoryModel = new categoryModel();
        $this->slideModel = new sliderModel();
        $this->reviewModel = new reviewModel();
        $this->blogModel = new blogModel();
        $this->wishlistModel = new WishlistModel();
        $this->cartModel = new cartModel();
    }
    public function HomeClient()
    {
        $listCate = $this->categoryModel->getAllCategory();
        $listCateTop = $this->categoryModel->getCategoryTop();
        $listCateTopOrder = $this->categoryModel->getCategoryTopOrder();
        $listProduct = $this->productModel->getAllProduct();

        // var_dump($listProduct);
        if (isset($_SESSION['user_id'])) {
            $user = $this->userModel->getIdTK($_SESSION["user_id"]);
        }
        $productLimit20 = $this->productModel->getProductLimit20();
        $listBlogs = $this->blogModel->getAllBlog();
        $listSlider = $this->slideModel->getAllSlider();
        if (isset($_SESSION["user_id"])) {
            $wishlist = $this->wishlistModel->getWishlistById($_SESSION["user_id"]);
            $listCart = $this->cartModel->getAllCartItemByIdUser($_SESSION["user_id"]);
            // var_dump($listCart);
            $user = $this->userModel->getIdTK($_SESSION["user_id"]);
            // var_dump($listCart);


            $cart = count($listCart);
            $vouchers = $this->cartModel->getVoucherByIdUser($_SESSION["user_id"]);
            $voucher = $this->cartModel->getVoucher($_SESSION["user_id"]);
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
    public function contactUS()
    {

        include "./views/client/contactUS.php";
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
                if (isset($_SESSION["user_id"])) {
                    $id = $_SESSION["user_id"];
                    $total = 0;
                    $voucher = 0;
                    $date = new DateTime('now', new DateTimeZone('Asia/Ho_Chi_Minh'));
                    $created_at = $date->format('Y-m-d H:i:s');
                    $updated_at = $created_at;
                    $abc = $this->cartModel->insertCart($id, $total, $voucher, $created_at, $updated_at);
                }
                // Chuyển hướng sau khi nhấn OK vào alert
                include "./views/client/login.php";  // Chuyển sang trang redirect
            }
        }
    }


    public function viewCart()
    {

        // var_dump($listCart);
        if (isset($_SESSION["user_id"])) {
            $vouchers = $this->cartModel->getVoucherByIdUser($_SESSION["user_id"]);
            $voucher = $this->cartModel->getVoucher($_SESSION["user_id"]);
            $listCart = $this->cartModel->getAllCartItemByIdUser($_SESSION["user_id"]);
            // $cartVariant = $this->productModel->getVariantById($cartItemId);
            // var_dump($listCart);
        }
        include "./views/client/cart.php";
    }
    public function deleteCart($id)
    {
        if ($id !== "") {
            $datadelete = $this->cartModel->deleteCart($id);
            if ($datadelete === "OK") {
                echo "<script>
                
                window.history.back();  
              </script>";
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
                    echo "<script>
                    alert('Cập nhật giỏ hàng thành công!!!');
                    window.location.href='?act=viewCart';  // Quay lại trang chi tiết sản phẩm
                  </script>";
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
        // Khởi tạo thông báo lỗi
        $thongBaoLoiName = "";
        $thongBaoLoiEmail = "";
        $thongBaoLoiPhone = "";
        $thongBaoLoiAddress = "";
        $thongBaoLoiCity = "";
        $thongBaoLoiHuyen = "";
        $thongBaoLoiRoad = "";
        $thongBaoLoiNumber = "";

        if (isset($_SESSION["user_id"])) {
            $vouchers = $this->cartModel->getVoucherByIdUser($_SESSION["user_id"]);
            $voucher = $this->cartModel->getVoucher($_SESSION["user_id"]);
            $listCart = $this->cartModel->getAllCartItemByIdUser($_SESSION["user_id"]);



            $totalAmount = 0;
            $subTotal = 0;
            foreach ($listCart as $product) {
                $total = $product["unit_price"] * $product["quantity"];
                $subTotal += $total;
            }
        }

        // Kiểm tra nếu người dùng đã đăng nhập và voucher được chọn
        if (isset($_POST['voucher']) && $_POST['voucher'] !== '' && isset($_SESSION["user_id"])) {
            $voucherCode = $_POST['voucher']; // Mã voucher người dùng chọn
            $userId = $_SESSION["user_id"];   // Lấy user_id từ session
            $_SESSION['user_data']['shipping'] = $_POST['shipping'] ?? 0;
            // Gọi model để cập nhật voucher trong giỏ hàng

            $result = $this->cartModel->updateCartVoucher($userId, $voucherCode);
            if (isset($_POST["submit_user"])) {
                // Kiểm tra các trường nhập liệu có bị trống không
                if (empty(trim($_POST['name']))) {
                    $thongBaoLoiName = "Trường tên không được để trống!";
                }
                if (empty(trim($_POST['email']))) {
                    $thongBaoLoiEmail = "Trường email không được để trống!";
                }
                if (empty(trim($_POST['phone']))) {
                    $thongBaoLoiPhone = "Trường Số điện thoại không được để trống!";
                }
                if (empty(trim($_POST['address']))) {
                    $thongBaoLoiAddress = "Trường địa chỉ không được để trống!";
                }
                if (empty(trim($_POST['city']))) {
                    $thongBaoLoiCity = "Trường Thành phố không được để trống!";
                }
                if (empty(trim($_POST['huyen']))) {
                    $thongBaoLoiHuyen = "Trường huyện không được để trống!";
                }
                if (empty(trim($_POST['road']))) {
                    $thongBaoLoiRoad = "Trường tên đường không được để trống!";
                }
                if (empty(trim($_POST['number']))) {
                    $thongBaoLoiNumber = "Trường số nhà không được để trống!";
                }
                // var_dump($_SESSION["user_data"]);
                // Nếu tất cả trường hợp không có lỗi
                if ($thongBaoLoiName == "") {
                    // Lưu lại thông tin người dùng vào session
                    $_SESSION['user_data']["name"] = $_POST["name"];
                } // Lưu lại dữ liệu người dùng
                if ($thongBaoLoiEmail == "") {
                    // Lưu lại thông tin người dùng vào session
                    $_SESSION['user_data']["email"] = $_POST["email"];
                } // Lưu lại dữ liệu người dùng
                if ($thongBaoLoiPhone == "") {
                    // Lưu lại thông tin người dùng vào session
                    $_SESSION['user_data']["phone"] = $_POST["phone"];
                } // Lưu lại dữ liệu người dùng
                if ($thongBaoLoiAddress == "") {
                    // Lưu lại thông tin người dùng vào session
                    $_SESSION['user_data']["address"] = $_POST["address"];
                } // Lưu lại dữ liệu người dùng
                if ($thongBaoLoiCity == "") {
                    // Lưu lại thông tin người dùng vào session
                    $_SESSION['user_data']["city"] = $_POST["city"];
                } // Lưu lại dữ liệu người dùng
                if ($thongBaoLoiHuyen == "") {
                    // Lưu lại thông tin người dùng vào session
                    $_SESSION['user_data']["huyen"] = $_POST["huyen"];
                } // Lưu lại dữ liệu người dùng
                if ($thongBaoLoiRoad == "") {
                    // Lưu lại thông tin người dùng vào session
                    $_SESSION['user_data']["road"] = $_POST["road"];
                } // Lưu lại dữ liệu người dùng
                if ($thongBaoLoiNumber == "") {
                    // Lưu lại thông tin người dùng vào session
                    $_SESSION['user_data']["number"] = $_POST["number"];
                } // Lưu lại dữ liệu người dùng
                if (isset($_POST['voucher_id'])) {
                    $_SESSION["user_data"]["voucher_id"] = $_POST['voucher_id']; // Update voucher ID in session
                }
                $_SESSION['user_data']["ordernote"] = $_POST["ordernote"];
                $_SESSION["user_data"]["voucher_discount"] = $_POST['voucher']; // Lưu voucher discount
                $voucherDiscount = $_SESSION["user_data"]["voucher_discount"] ?? 0;
                $shippingCost = $_SESSION['user_data']['shipping'] ?? 0;
                $totalAmount = $subTotal + $shippingCost - $voucherDiscount;
                // Kiểm tra kết quả
                if ($result) {
                    if (isset($_SERVER['HTTP_REFERER'])) {
                        header("Location: " . $_SERVER['HTTP_REFERER']);
                    } else {
                        header("Location: ?act=viewCart"); // Trường hợp không có trang trước đó
                    }
                }
            }
        }
        // Lưu thông tin người dùng vào session để giữ lại sau khi redirect
        include "./views/client/checkout.php";
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
            $existingUser = $this->userModel->findUserByUsername($username);
            if ($existingUser) {
                $usernameError = "Tên người dùng đã tồn tại. Vui lòng chọn tên khác.";
            }
            // Kiểm tra các điều kiện
            if (empty($username)) {
                $usernameError = "Username is required.";
            }
            if (empty($email)) {
                $emailError = "Email is required.";
            } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $emailError = "Invalid email format.";
            } elseif ($this->userModel->findUserByEmail($email)) { // Kiểm tra email đã tồn tại
                $emailError = "This email is already registered. Please use a different email.";
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

            // Kiểm tra nếu có bất kỳ lỗi nào
            if (empty($usernameError) && empty($emailError) && empty($phoneError) && empty($addressError) && empty($passwordError) && empty($repeatPasswordError)) {

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
            } else {
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
                include "./views/client/login.php";
            }

            // Nếu không có lỗi, tiến hành gọi hàm insertTaiKhoan

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
        $totalAmount = 0;
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
    public function addToWishlist($productId)
    {
        // Kiểm tra xem người dùng đã đăng nhập chưa
        if (isset($_SESSION["user_id"])) {
            // Người dùng đã đăng nhập, thêm sản phẩm vào wishlist trong database
            $this->wishlistModel->addWishlist($productId);
        } else {
            // Người dùng chưa đăng nhập, thêm sản phẩm vào cookie

            // Lấy thông tin chi tiết của sản phẩm từ database dựa trên $productId
            $product = $this->productModel->getProductById($productId);

            // Nếu sản phẩm tồn tại
            if ($product) {
                // Lấy danh sách wishlist từ cookie (nếu có)
                if (isset($_COOKIE['wishlist'])) {
                    $wishlist = json_decode($_COOKIE['wishlist'], true); // Chuyển JSON thành mảng PHP
                } else {
                    $wishlist = []; // Nếu chưa có cookie thì tạo mảng mới
                }

                // Kiểm tra xem sản phẩm đã có trong wishlist chưa dựa vào product_id
                $found = false;
                foreach ($wishlist as $item) {
                    if ($item['product_id'] == $productId) {
                        $found = true;
                        break;
                    }
                }

                // Nếu chưa có sản phẩm này trong wishlist, thêm vào
                if (!$found) {
                    $wishlist[] = [
                        'product_id' => $product['id'],
                        'product_name' => $product['product_name'],
                        'product_price' => $product['price'],
                        'product_image' => $product['image'], // Hoặc đường dẫn ảnh
                    ];

                    // Cập nhật cookie với giá trị mới (JSON hóa mảng)
                    setcookie('wishlist', json_encode($wishlist), time() + (86400 * 30), "/"); // Lưu cookie trong 30 ngày
                }
            }
        }

        // Quay lại trang trước đó sau khi thêm sản phẩm
        if (isset($_SERVER['HTTP_REFERER'])) {
            header("Location: " . $_SERVER['HTTP_REFERER']);
        } else {
            // Nếu không có trang trước, quay về trang chủ
            header("Location: /");
        }
        exit();
    }




    // Phương thức này gọi Model để thêm sản phẩm vào wishlist
    public function listWishlist()
    {
        if (isset($_SESSION["user_id"])) {
            // Người dùng đã đăng nhập, lấy wishlist từ cơ sở dữ liệu
            $wishlist = $this->wishlistModel->getAllWishlist($_SESSION["user_id"]);
        } else {
            // Người dùng chưa đăng nhập, lấy wishlist từ cookie
            if (isset($_COOKIE['wishlist'])) {
                $wishlist = json_decode($_COOKIE['wishlist'], true); // Chuyển JSON thành mảng PHP
            } else {
                $wishlist = []; // Nếu chưa có cookie thì danh sách wishlist rỗng
            }
        }

        // Hiển thị wishlist trong view
        include "./views/client/wishlist.php";
    }

    public function deleteWishlist($id)
    {
        if (!empty($id)) {
            // Kiểm tra xem người dùng đã đăng nhập hay chưa
            if (isset($_SESSION["user_id"])) {
                // Người dùng đã đăng nhập, thực hiện xóa trong cơ sở dữ liệu
                $datadelete = $this->wishlistModel->deleteWishlist($id);
                if ($datadelete === "OK") {
                    header("location: ?act=wishlist");
                    exit();
                } else {
                    echo "Đã có lỗi xảy ra trong quá trình xóa.";
                }
            } else {
                // Người dùng chưa đăng nhập, xóa trong cookie

                // Lấy danh sách wishlist từ cookie (nếu có)
                if (isset($_COOKIE['wishlist'])) {
                    $wishlist = json_decode($_COOKIE['wishlist'], true); // Chuyển JSON thành mảng PHP

                    // Kiểm tra nếu wishlist không rỗng và có sản phẩm trong đó
                    if (!empty($wishlist)) {
                        // Tìm và xóa sản phẩm có $id trong mảng wishlist
                        foreach ($wishlist as $key => $item) {
                            if ($item['product_id'] == $id) {
                                unset($wishlist[$key]); // Xóa sản phẩm khỏi mảng
                                break; // Dừng vòng lặp khi tìm thấy sản phẩm cần xóa
                            }
                        }

                        // Nếu có sản phẩm trong wishlist, cập nhật lại cookie
                        if (!empty($wishlist)) {
                            setcookie('wishlist', json_encode(array_values($wishlist)), time() + (86400 * 30), "/"); // Cập nhật lại cookie
                        } else {
                            // Nếu wishlist trống sau khi xóa, xóa cookie
                            setcookie('wishlist', '', time() - 3600, "/");
                        }

                        // Quay lại trang wishlist
                        header("location: ?act=wishlist");
                        exit();
                    } else {
                        echo "Danh sách yêu thích trống.";
                    }
                } else {
                    echo "Không có dữ liệu wishlist trong cookie.";
                }
            }
        } else {
            echo "Không có thông tin id, mời bạn kiểm tra lại.";
        }
    }

    public function myAccount()
    {
        if (isset($_SESSION['user_id'])) {
            $user = $this->userModel->getIdTK($_SESSION["user_id"]);
            $listOrder = $this->oderModel->getOrderByIdUser($_SESSION['user_id']);
            // var_dump($listOrder);
        }
        if (isset($_SESSION['user_id'])) {
            $orders = $this->oderModel->getOrderUser($_SESSION['user_id']);
        }
        include './views/client/account.php';
    }
    public function productDetail($id)
    {
        if (isset($_SESSION['user_id'])) {
            $user = $this->userModel->getIdTK($_SESSION["user_id"]);
            $checkOrder = $this->productModel->checkUserOrder($_SESSION['user_id'], $id);
        } else {
            $checkOrder = false;  // Nếu chưa đăng nhập
        }
        $Product = $this->productModel->getProductById($id);
        $listProducVariant = $this->productModel->getAllProductVariant($id);
        $getAllColor = $this->productModel->getAllColor();
        $getAllColorById = $this->productModel->getAllColorByid($id);
        $getAllSizeById = $this->productModel->getAllSizeByid($id);
        $imageAll = $this->productModel->imageAllVariant($id);
        // var_dump($imageAll);
        // var_dump($getAllSizeById);
        $getAllSize = $this->productModel->getAllSize();
        $listProduct = $this->productModel->getAllProduct();
        $productLimit20 = $this->productModel->getProductLimit20();
        $listReview = $this->reviewModel->getReviewById($id);
        $countReview = count($listReview);
        $totalRating = 0;  // Biến lưu tổng điểm rating
        $countReview = count($listReview);  // Đếm số lượng review
        if (isset($_SESSION["user_id"])) {
            $user_id = $_SESSION["user_id"];
            $cartUser = $this->cartModel->getCartByIdUser($user_id);
        }
        // var_dump($cartUser);
        // Duyệt qua tất cả các review và cộng dồn rating
        foreach ($listReview as $row) {
            $totalRating += $row['rating'];
        }

        // Nếu có ít nhất một review, tính điểm trung bình
        $averageRating = ($countReview > 0) ? $totalRating / $countReview : 0;  // Tránh chia cho 0
        // var_dump($productLimit20);
        include "./views/client/product_detail.php";
    }

    public function addCart($id)
    {
        if (isset($_POST["submit"])) {
            // Lấy dữ liệu từ form
            $product_id = $id;
            $quantity = $_POST["quantity"];
            $size_id = $_POST["size_id"];
            $color_id = $_POST["color_id"];

            // Kiểm tra số lượng sản phẩm hợp lệ
            if ($quantity < 1) {
                echo "<script>
                        alert('Số lượng sản phẩm không hợp lệ!');
                        window.location.href='?act=productDetail&id=$id';  // Quay lại trang chi tiết sản phẩm
                      </script>";
                return; // Kết thúc hàm nếu số lượng không hợp lệ
            }

            // Kiểm tra biến thể sản phẩm có tồn tại
            $data = $this->productModel->checkVariant($product_id, $size_id, $color_id, $quantity);

            // Nếu người dùng đã đăng nhập
            if (isset($_SESSION["user_id"])) {
                // Lấy danh sách sản phẩm trong giỏ hàng của người dùng
                $listCart = $this->cartModel->getAllCartItemByIdUser($_SESSION["user_id"]);

                // Nếu biến thể sản phẩm tồn tại
                if ($data) {
                    $variant_id = $data["id"];
                    $price = $_POST["price"];
                    $cart_id = $_POST["cart_id"];
                    $existsInCart = false;

                    // Kiểm tra xem sản phẩm đã có trong giỏ hàng chưa
                    foreach ($listCart as $cartItem) {
                        if ($cartItem['variant_id'] == $variant_id) {
                            $quantityUpdate = $cartItem['quantity'] + $quantity;
                            $idCart = $cartItem["id"];
                            $existsInCart = true;
                            break;
                        }
                    }

                    // Nếu sản phẩm đã có trong giỏ hàng thì cập nhật số lượng
                    if ($existsInCart) {
                        $result = $this->cartModel->updateCart($idCart, $quantityUpdate);

                        if ($result === "OK") {
                            echo "<script>
                                    alert('Giỏ hàng đã được cập nhật!');
                                    window.location.href='?act=productDetail&id=$id';  // Quay lại trang trước
                                  </script>";
                        } else {
                            echo "<script>alert('Có lỗi xảy ra trong quá trình cập nhật giỏ hàng.');</script>";
                        }
                    } else {
                        // Nếu sản phẩm chưa có trong giỏ hàng thì thêm mới
                        $result = $this->cartModel->addCart($cart_id, $variant_id, $quantity, $price);

                        if ($result === "OK") {
                            echo "<script>
                                    alert('Sản phẩm đã được thêm vào giỏ hàng thành công!');
                                    window.location.href='?act=productDetail&id=$id';
                                  </script>";
                        } else {
                            echo "<script>alert('Có lỗi xảy ra trong quá trình thêm sản phẩm vào giỏ hàng.');</script>";
                        }
                    }
                } else {
                    // Nếu không có biến thể sản phẩm hoặc không đủ số lượng
                    echo "<script>
                            alert('Sản phẩm này đã hết hàng hoặc không đủ số lượng. Vui lòng chọn sản phẩm khác.');
                            window.location.href='?act=productDetail&id=$id';  // Quay lại trang trước
                          </script>";
                }
            } else {
                // Nếu người dùng chưa đăng nhập
                echo "<script>
                        alert('Bạn cần đăng nhập trước khi thêm vào giỏ hàng.');
                        window.location.href='?act=formLogin';  // Chuyển hướng đến trang đăng nhập
                      </script>";
            }
        }
    }
    public function muangay($id)
    {
        if (isset($_POST["muangay"])) {
            // Lấy dữ liệu từ form
            $product_id = $id;
            $quantity = $_POST["quantity"];
            $size_id = $_POST["size_id"];
            $color_id = $_POST["color_id"];

            // Kiểm tra số lượng sản phẩm hợp lệ
            if ($quantity < 1) {
                echo "<script>
                        alert('Số lượng sản phẩm không hợp lệ!');
                        window.location.href='?act=productDetail&id=$id';  // Quay lại trang chi tiết sản phẩm
                      </script>";
                return; // Kết thúc hàm nếu số lượng không hợp lệ
            }

            // Kiểm tra biến thể sản phẩm có tồn tại
            $data = $this->productModel->checkVariant($product_id, $size_id, $color_id, $quantity);

            // Nếu người dùng đã đăng nhập
            if (isset($_SESSION["user_id"])) {
                // Lấy danh sách sản phẩm trong giỏ hàng của người dùng
                $listCart = $this->cartModel->getAllCartItemByIdUser($_SESSION["user_id"]);

                // Nếu biến thể sản phẩm tồn tại
                if ($data) {
                    $variant_id = $data["id"];
                    $price = $_POST["price"];
                    $cart_id = $_POST["cart_id"];
                    $existsInCart = false;

                    // Kiểm tra xem sản phẩm đã có trong giỏ hàng chưa
                    foreach ($listCart as $cartItem) {
                        if ($cartItem['variant_id'] == $variant_id) {
                            $quantityUpdate = $cartItem['quantity'] + $quantity;
                            $idCart = $cartItem["id"];
                            $existsInCart = true;
                            break;
                        }
                    }

                    // Nếu sản phẩm đã có trong giỏ hàng thì cập nhật số lượng
                    if ($existsInCart) {
                        $result = $this->cartModel->updateCart($idCart, $quantityUpdate);

                        if ($result === "OK") {
                            echo "<script>
                                    alert('Sản phẩm đã được thêm vào giỏ hàng thành công. Bắt đầu thanh toán ngay!');
                                    window.location.href='?act=checkout';
                                  </script>";
                        } else {
                            echo "<script>alert('Có lỗi xảy ra trong quá trình cập nhật giỏ hàng.');</script>";
                        }
                    } else {
                        // Nếu sản phẩm chưa có trong giỏ hàng thì thêm mới
                        $result = $this->cartModel->addCart($cart_id, $variant_id, $quantity, $price);

                        if ($result === "OK") {
                            echo "<script>
                                    alert('Sản phẩm đã được thêm vào giỏ hàng thành công. Bắt đầu thanh toán ngay!');
                                    window.location.href='?act=checkout';
                                  </script>";
                        } else {
                            echo "<script>alert('Có lỗi xảy ra trong quá trình thêm sản phẩm vào giỏ hàng.');</script>";
                        }
                    }
                } else {
                    // Nếu không có biến thể sản phẩm hoặc không đủ số lượng
                    echo "<script>
                            alert('Sản phẩm này đã hết hàng hoặc không đủ số lượng. Vui lòng chọn sản phẩm khác.');
                            window.location.href='?act=productDetail&id=$id';  // Quay lại trang trước
                          </script>";
                }
            } else {
                // Nếu người dùng chưa đăng nhập
                echo "<script>
                        alert('Bạn cần đăng nhập trước khi thêm vào giỏ hàng.');
                        window.location.href='?act=formLogin';  // Chuyển hướng đến trang đăng nhập
                      </script>";
            }
        }
    }


    public function formEmail()
    {

        include "./views/client/forgetPassword.php";
    }
    public function sendPass()
    {
        if (isset($_POST['sendPass'])) {
            $email = $_POST['email'];
            $user = $this->userModel->findUserByEmail($email);
            if ($user) {
                $tempPassword = bin2hex(random_bytes(4));
                $expiry = date("Y-m-d H:i:s", strtotime("5 minutes"));
                $this->userModel->addTempPassword($email, $tempPassword, $expiry);
                $this->sendEmail($email, $tempPassword);
                echo "<script>
                    alert('Mật khẩu tạm thời đã được gửi đến email của bạn.');
                    window.location.href = '?act=formResetPass';
                  </script>";
                exit();
            } else {
                echo "<script>
                alert('Email không tìm thấy.');
                window.location.href = '?act=formForgetPass';
              </script>";  // Quay lại trang nhập email
                exit();
            }
        }
    }
    public function formReset()
    {
        include "./views/client/resetPassword.php";
    }
    private function sendEmail($email, $tempPassword)
    {
        $mail = new PHPMailer(true);

        try {
            // Cấu hình gửi email qua SMTP
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';  // Thay smtp.example.com bằng smtp.gmail.com
            $mail->SMTPAuth = true;
            $mail->Username = 'kimphong102005@gmail.com';  // Địa chỉ email của bạn
            $mail->Password = 'wjbt ywvp pfva wxbe';  // Thay mật khẩu ứng dụng ở đây
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;  // Đảm bảo đang sử dụng STARTTLS
            $mail->Port = 587;  // Cổng SMTP cho STARTTLS

            // Cấu hình người gửi
            $mail->setFrom('kimphong102005@gmail.com', '1Sneaker');
            $mail->addAddress($email);  // Thêm địa chỉ email người nhận

            // Nội dung email
            $mail->isHTML(true);
            $mail->Subject = 'Your Temporary Password';
            $mail->Body    = "Your temporary password is: <b>$tempPassword</b> It is valid for 10 minutes.";

            // Gửi email
            $mail->send();
        } catch (Exception $e) {
        }
    }

    public function resetPassword()
    {
        if (isset($_POST['email'], $_POST['temp_password'], $_POST['new_password'])) {
            $email = $_POST['email'];
            $tempPassword = $_POST['temp_password'];
            $newPassword = $_POST['new_password'];
            $user = $this->userModel->verifyTempPassword($email, $tempPassword);
            if ($user) {
                // Cập nhật mật khẩu mới
                $this->userModel->updatePassword($email, $newPassword);
                echo "<script>
                    alert('Lấy lại mật khẩu thành công.');
                    window.location.href = '?act=formLogin';
                  </script>";
            } else {
                echo "<script>
                    alert('Email hoặc mật khẩu tạm thời không đúng');
                    window.location.href = '?act=formResetPass';
                  </script>";  // Quay lại trang nhập mật khẩu tạm thời
                exit();
            }
        }
    }
    public function review()
    {
        if (isset($_SESSION['user_id'])) {
            $userId = $_SESSION['user_id'];
            $productId = $_POST['product_id'];
            $reviewText = $_POST['review_text'];
            $rating = $_POST['rating'];

            // Lưu review vào cơ sở dữ liệu
            $this->reviewModel->addReview($userId, $productId, $rating, $reviewText);

            // Chuyển hướng lại trang chi tiết sản phẩm
            header('Location: ?act=productDetail&id=' . $productId);
        } else {
            // Nếu người dùng chưa đăng nhập, chuyển hướng về trang đăng nhập
            header('Location: login.php');
        }
    }

    public function checkout()
    {

        if (isset($_SESSION["user_id"])) {
            $vouchers = $this->cartModel->getVoucherByIdUser($_SESSION["user_id"]);
            $voucher = $this->cartModel->getVoucher($_SESSION["user_id"]);
            $listCart = $this->cartModel->getAllCartItemByIdUser($_SESSION["user_id"]);


            // var_dump($_SESSION['user_data']);

            if (isset($_POST['submit_shipping'])) {
                $_SESSION['user_data']['shipping'] = $_POST['shipping'] ?? 0;
            }
            $totalAmount = 0;
            $subTotal = 0;
            foreach ($listCart as $product) {
                $total = $product["unit_price"] * $product["quantity"];
                $subTotal += $total;
            }
            $voucherDiscount = $_SESSION["user_data"]["voucher_discount"] ?? 0;
            $shippingCost = $_SESSION['user_data']['shipping'] ?? 0;
            $totalAmount = $subTotal + $shippingCost - $voucherDiscount;
        }


        include "./views/client/checkout.php";
    }
    public function order()
    {
        if (isset($_POST["submitOrder"])) {
            $paymentMethod = $_POST['paymentmethod'];

            if ($paymentMethod === 'cash') {
                $user_id = $_SESSION["user_id"];
                $guest_name = $_SESSION["user_data"]["name"];
                $guest_email = $_SESSION["user_data"]["email"];
                $guest_phone = $_SESSION["user_data"]["phone"];
                $shipping_address = $_SESSION["user_data"]["shipping"];
                $total_price = $_POST["total"];
                $voucher_id  = $_SESSION["user_data"]["voucher_id"] ?? "";
                $thanh_pho = $_SESSION["user_data"]["city"];
                $huyen = $_SESSION["user_data"]["huyen"];
                $ten_duong = $_SESSION["user_data"]["road"];
                $so_nha = $_SESSION["user_data"]["number"];
                $ordernote = $_SESSION["user_data"]["ordernote"];
                $date = new DateTime('now', new DateTimeZone('Asia/Ho_Chi_Minh'));
                $created_at = $date->format('Y-m-d H:i:s');
                $updated_at = $created_at;

                // Insert order
                $order_id = $this->oderModel->insertOrder($user_id, $guest_name, $guest_email, $guest_phone, $shipping_address, $total_price, $created_at, $updated_at, $voucher_id, $thanh_pho, $huyen, $ten_duong, $so_nha, $ordernote);

                // Get cart items
                $listCart = $this->cartModel->getAllCartItemByIdUser($_SESSION["user_id"]);
                $cart = $this->cartModel->getCartBy($_SESSION["user_id"]);


                if ($order_id) {
                    foreach ($listCart as $row) {
                        // Insert order item
                        $addItemOrder = $this->oderModel->insertOrderItem($order_id, $row['variant_id'], $row["quantity"], $row["unit_price"]);
                        $variant = $this->productModel->getVariantById($row["variant_id"]);
                        $quantityNew = $variant["stock_quantity"] - $row["quantity"];
                        $this->productModel->updateQuantityVariant($variant["id"], $quantityNew);
                        if ($addItemOrder === "OK") {
                            // Xóa các sản phẩm trong giỏ hàng, nhưng giữ lại giỏ hàng
                            $this->cartModel->deleteCartItemsByCartId($cart["id"]);
                        } else {
                            echo "<script>alert('Đặt hàng thất bại vui lòng kiểm tra lại!');
                            window.history.back();
                            </script>";
                            return;  // Dừng hàm nếu việc thêm đơn hàng thất bại
                        }
                    }

                    // Xóa thông tin người dùng sau khi đặt hàng thành công
                    unset($_SESSION['user_data']);

                    echo "<script>alert('Đặt hàng thành công! Chúng tôi sẽ giao hàng đến bạn trong thời gian sớm nhất.');
                window.location.href='?act=chitietOrder&id=$order_id';
                </script>";
                }
            } elseif ($paymentMethod === 'bank') {
                // Thanh toán qua Vnpay
                header('Location: vnpay_payment_page.php'); // Điều hướng đến trang thanh toán online (thay URL bằng trang thanh toán thật)
                exit();
            }
        }
    }


    public function Er404()
    {
        include "./views/404.php";
    }
    public function chitietOrder($id)
    {
        $listOrder = $this->oderModel->getOrder($id);
        $listItem = $this->oderModel->getAllItem($id);
        $listItemOrder = $this->oderModel->getAllOderById($id);
        // var_dump($listItemOrder);
        // var_dump($listItem);
        include "./views/client/order.php";
    }
    public function huyOrder($id)
    {
        // Lấy thông tin đơn hàng để hiển thị cho người dùng xác nhận
        $listItemOrder = $this->oderModel->getAllOderById($id);


        // Hiển thị hộp thoại xác nhận trong JavaScript
        echo "<script>
            var result = confirm('Bạn có chắc chắn muốn hủy đơn hàng này không?');
            if (result) {
                // Nếu người dùng đồng ý hủy, gửi yêu cầu tới PHP để thực hiện hành động
                window.location.href = '?act=deleteOrder&id=" . $id . "';
            } else {
                // Nếu người dùng không đồng ý hủy, quay lại trang chi tiết đơn hàng
                window.location.href = '?act=chitietOrder&id=" . $id . "';
            }
        </script>";

        // Dừng xử lý tiếp sau khi đã gửi JavaScript
        exit();
    }

    public function deleteOrder($id)
    {
        // Lấy giỏ hàng của người dùng
        $cart = $this->cartModel->getCartBy($_SESSION["user_id"]);
        $idCart = $cart["id"];

        // Lấy các sản phẩm trong đơn hàng
        $listItemOrder = $this->oderModel->getAllItem($id);

        // Chuyển các sản phẩm trong đơn hàng vào giỏ hàng
        foreach ($listItemOrder as $Item) {
            $variant_id = $Item["variant_id"];
            $quantity = $Item["quantity"];
            $price = $Item["unit_price"];

            // Thêm sản phẩm vào giỏ hàng
            $this->cartModel->addCart($idCart, $variant_id, $quantity, $price);
            $variant = $this->productModel->getVariantById($Item["variant_id"]);
            $quantityNew = $variant["stock_quantity"] + $Item["quantity"];
            $this->productModel->updateQuantityVariant($variant["id"], $quantityNew);
        }

        // Xóa đơn hàng
        $dataDelete = $this->oderModel->deleteOrder($id);

        if ($dataDelete == "OK") {
            echo "<script>
                alert('Hủy đơn hàng thành công!!!');
                window.location.href = '?act=viewCart';
            </script>";
        } else {
            echo "<script>
                alert('Lỗi khi hủy đơn hàng, vui lòng thử lại!');
                window.location.href = '?act=chitietOrder&id=" . $id . "';
            </script>";
        }
    }
}
