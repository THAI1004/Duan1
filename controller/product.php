<?php

class productController
{
    public $productModel;
    public $categoryModel;
    public function __construct()

    {
        $this->categoryModel = new categoryModel();
        $this->productModel = new productModel();
    }
    public function listProduct()
    {

        $listProduct = $this->productModel->getAllProduct(); // Hiển thị toàn bộ sản phẩm
        require_once './views/product/listProduct.php';
    }
    // public function detailIDProduct($id){

    //         $detailIDProduct = $this->productModel->getProductById($id); // Hiển thị 1 sản phẩm
    //     require_once './views/product/listProduct.php';
    // }
    public function searchProduct($keyword)
    {
        if ($keyword == "") {
        }
        $listProduct = $this->productModel->searchProduct($keyword); // Gọi model để tìm kiếm sản phẩm
        require_once './views/product/listProduct.php';
        // Hiển thị kết quả trong view
    }
    public function showFormCreate()
    {
        $listCategory = $this->categoryModel->getAllCategory();
        require_once './views/product/addProduct.php';
    }
    public function addProduct()
    {
        // Khởi tạo biến thông báo
        $thongBaoLoi = "";
        $thongBaoTC = "";

        // 2: Kiểm tra submit
        if (isset($_POST['submit'])) {
            // Lấy giá trị từ form
            $product_name = trim($_POST['product_name']);
            $description = trim($_POST['description']);
            $category_id = trim($_POST['category_id']);
            $price = trim($_POST['price']);

            // Biến thông báo lỗi cho từng trường
            $thongBaoLoiProductName = "";
            $thongBaoLoiDescription = "";
            $thongBaoLoiCategory = "";
            $thongBaoLoiPrice = "";

            // Kiểm tra lỗi cho từng trường
            if (empty($product_name)) {
                $thongBaoLoiProductName = "Vui lòng nhập tên sản phẩm.";
            }

            if (empty($description)) {
                $thongBaoLoiDescription = "Vui lòng nhập mô tả sản phẩm.";
            }

            if (empty($category_id) || $category_id == "") {
                $thongBaoLoiCategory = "Vui lòng chọn danh mục.";
            }

            if (empty($price)) {
                $thongBaoLoiPrice = "Vui lòng nhập giá sản phẩm.";
            }
            $thamSo1 = $_FILES["image"]["tmp_name"];
            $thamSo2 = "./images/imgs" . $_FILES["image"]["name"]; //đường dẫn để di chuyển file từ bộ nhớ tạm vào

            if (move_uploaded_file($thamSo1, $thamSo2)) {
                $image = "./images/imgs" . $_FILES["image"]["name"];
            } else {
                $thongBaoLoiUpload = "upload thất bại";
            }

            // Nếu không có lỗi, thực hiện thêm sản phẩm
            if (empty($thongBaoLoiProductName) && empty($thongBaoLoiUpload)  && empty($thongBaoLoiDescription) && empty($thongBaoLoiCategory) && empty($thongBaoLoiPrice)) {
                // Kiểm tra hợp lệ và gọi model để thêm sản phẩm
                $date = new DateTime('now', new DateTimeZone('Asia/Ho_Chi_Minh'));
                $created_at = $date->format('Y-m-d H:i:s');
                $updated_at = $created_at;

                $result = $this->productModel->addProduct($product_name, $description, $category_id, $price, $created_at, $updated_at, $image);

                if ($result === "OK") {
                    $thongBaoTC = "Tạo mới thành công, mời bạn tiếp tục tạo mới hoặc quay lại trang danh sách";
                    // Reset form fields sau khi thêm thành công
                    $product_name = $description = $category_id = $price = "";
                } else {
                    $thongBaoLoi = "Có lỗi xảy ra trong quá trình tạo sản phẩm.";
                }
            }
        }


        // Gọi view và truyền thông báo
        include "./views/product/addProduct.php";
    }

    public function delete($id)
    {
        if ($id !== "") {
            $datadelete = $this->productModel->deleteProduct($id);
            if ($datadelete === "OK") {
                header("location: ?act=listProduct");
            }
            // chuyển hướng về trang danh sách

        } else {
            echo "Không có thông tin id mời bạn kiểm tra lại";
        }
    }
    public function showFormEdit($id)
    {
        // Kiểm tra xem ID có hợp lệ không
        if (empty($id)) {
            $thongBaoLoi = "ID sản phẩm không hợp lệ.";
            require_once './views/product/editProduct.php';
            return;
        }

        $listCategory = $this->categoryModel->getAllCategory();
        $product = $this->productModel->getProductById($id);

        if (!$product) {
            // Xử lý trường hợp không tìm thấy sản phẩm
            $thongBaoLoi = "Sản phẩm không tồn tại.";
            require_once './views/product/editProduct.php';
            return; // Dừng thực thi nếu không tìm thấy sản phẩm
        }

        // Khởi tạo các biến
        $product_id = $_GET["id"];
        $product_name = trim($product["product_name"]);
        $description = trim($product["description"]);
        $category_id = trim($product["category_id"]);
        $price = trim($product["price"]);
        $created_at = trim($product["created_at"]);

        // Gọi view để hiển thị form
        require_once './views/product/editProduct.php';
    }

    public function submitEdit($id)
    {
        // Kiểm tra xem ID có hợp lệ không
        if (empty($id)) {
            $thongBaoLoi = "ID sản phẩm không hợp lệ.";
            require_once './views/product/editProduct.php';
            return;
        }
        // Khởi tạo thông báo
        $thongBaoLoiProductName = "";
        $thongBaoLoiDescription = "";
        $thongBaoLoiCategory = "";
        $thongBaoLoiPrice = "";
        $thongBaoLoi = "";
        $thongBaoTC = "";

        // Lấy sản phẩm hiện tại
        $product = $this->productModel->getProductById($id);

        if (isset($_POST['submit'])) {
            // Lấy giá trị từ form
            $product_name = trim($_POST['product_name']);
            $description = trim($_POST['description']);
            $category_id = trim($_POST['category_id']);
            $price = trim($_POST['price']);

            // Kiểm tra lỗi cho từng trường
            if (empty($product_name)) {
                $thongBaoLoiProductName = "Vui lòng nhập tên sản phẩm.";
            }

            if (empty($description)) {
                $thongBaoLoiDescription = "Vui lòng nhập mô tả sản phẩm.";
            }

            if (empty($category_id)) {
                $thongBaoLoiCategory = "Vui lòng chọn danh mục.";
            }

            if (empty($price)) {
                $thongBaoLoiPrice = "Vui lòng nhập giá sản phẩm.";
            }
            $thamSo1 = $_FILES["image"]["tmp_name"];
            $thamSo2 = "./images/imgs" . $_FILES["image"]["name"]; //đường dẫn để di chuyển file từ bộ nhớ tạm vào

            if (move_uploaded_file($thamSo1, $thamSo2)) {
                $image = "./images/imgs" . $_FILES["image"]["name"];
            } else {
                $thongBaoLoiUpload = "upload thất bại";
            }
            // Nếu không có lỗi, thực hiện cập nhật sản phẩm
            if (empty($thongBaoLoiProductName) && empty($thongBaoLoiUpload) && empty($thongBaoLoiDescription) && empty($thongBaoLoiCategory) && empty($thongBaoLoiPrice)) {
                $date = new DateTime('now', new DateTimeZone('Asia/Ho_Chi_Minh'));
                $updated_at = $date->format('Y-m-d H:i:s');


                $created_at = $product["created_at"]; // Giữ nguyên created_at từ sản phẩm cũ


                $result = $this->productModel->update($id, $product_name, $description, $category_id, $price, $created_at, $updated_at, $image);

                if ($result === "OK") {
                    $thongBaoTC = "Sửa sản phẩm thành công. Mời bạn tiếp tục tạo mới hoặc quay lại trang danh sách.";
                    // Chuyển hướng hoặc hiển thị thông báo thành công
                    if (!empty($thongBaoTC)) {
                        echo "<script>
                            if (confirm('Bạn đã sửa sản phẩm thành công. Nhấn OK để quay lại danh sách sản phẩm.')) {
                                window.location.href = '?act=listProduct'; // Chuyển hướng đến trang danh sách sản phẩm
                            }
                        </script>";
                    }
                    exit;
                } else {
                    $thongBaoLoi = "Có lỗi xảy ra trong quá trình sửa sản phẩm.";
                }
            }
        }

        // Nếu có lỗi, hiển thị lại form với thông báo lỗi
        $this->showFormEdit($id); // Gọi lại hàm hiển thị form với ID sản phẩm
    }
    public function listProductVariant($id)
    {
        // Xác định trang hiện tại từ query string (nếu không có thì mặc định là trang 1)
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;

        // Xác định số lượng biến thể hiển thị trên mỗi trang
        $limit = 5;

        // Lấy thông tin sản phẩm
        $Product = $this->productModel->getProductById($id);

        // Lấy toàn bộ biến thể sản phẩm (không cần giới hạn trang ở đây)
        $allProductVariants = $this->productModel->getAllProductVariant($id);

        // Tính tổng số biến thể
        $total_variants = count($allProductVariants);

        // Tính toán tổng số trang
        $total_pages = ceil($total_variants / $limit);
        // var_dump($total_variants);

        // Tính toán offset (vị trí bắt đầu) cho trang hiện tại
        $offset = ($page - 1) * $limit;

        // Lấy các biến thể sản phẩm theo trang (chỉ lấy một phần từ mảng tổng)
        $productVariantOnPage = array_slice($allProductVariants, $offset, $limit);

        // Load view và truyền các biến cần thiết
        require_once './views/product/listProductVariant.php';
    }


    public function deleteVariant($id, $idVariant)
    {
        if ($idVariant !== "") {
            $datadelete = $this->productModel->deleteProductVariant($idVariant);
            if ($datadelete === "OK") {
                header("location: ?act=listProductVariant&id=$id");
            }
            // chuyển hướng về trang danh sách

        } else {
            echo "Không có thông tin id mời bạn kiểm tra lại";
        }
    }
    public function showFormAddVariant($id)
    {
        $product = $this->productModel->getProductById($id);
        $colors = $this->productModel->getAllColor();
        $sizes = $this->productModel->getAllSize();
        // var_dump($colors);
        require_once './views/product/addVariant.php';
    }
    public function addProductVariant($id)
    {
        $product = $this->productModel->getProductById($id);
        $colors = $this->productModel->getAllColor();
        $sizes = $this->productModel->getAllSize();
        // Khởi tạo biến thông báo
        $thongBaoLoi = "";
        $thongBaoTC = "";

        // 2: Kiểm tra submit
        if (isset($_POST['submit'])) {
            // Lấy giá trị từ form
            $product_id = $_GET["id"];
            $color_id = isset($_POST['color_id']) ? trim($_POST['color_id']) : null;
            $size_id = isset($_POST['size_id']) ? trim($_POST['size_id']) : null;
            $stock_quantity = trim($_POST['stock_quantity']);

            // Biến thông báo lỗi cho từng trường
            $thongBaoLoiColor = "";
            $thongBaoLoiSize = "";
            $thongBaoLoiQuantity = "";


            // Kiểm tra lỗi cho từng trường
            if (empty($color_id)) {
                $thongBaoLoiColor = "Vui lòng Chọn màu.";
            }

            if (empty($size_id)) {
                $thongBaoLoiSize = "Vui lòng Chọn size.";
            }

            if (empty($stock_quantity) || $stock_quantity < 0) {
                $thongBaoLoiQuantity = "Vui lòng nhập số lượng hợp lệ.";
            }
            $thamSo1 = $_FILES["image_variant"]["tmp_name"];
            $thamSo2 = "./images/imgs" . $_FILES["image_variant"]["name"]; //đường dẫn để di chuyển file từ bộ nhớ tạm vào

            if (move_uploaded_file($thamSo1, $thamSo2)) {
                $image_variant = "./images/imgs" . $_FILES["image_variant"]["name"];
            } else {
                $thongBaoLoiUploadVariant = "upload thất bại";
            }

            // Nếu không có lỗi, thực hiện thêm sản phẩm
            $thongBaoLoiUploadVariant = "upload thất bại";
            if (empty($thongBaoLoiColor) && empty($thongBaoLoiSize)  && empty($thongBaoLoiQuantity) && empty($thongBaoLoiCategory)) {
                // Kiểm tra hợp lệ và gọi model để thêm sản phẩm
                $date = new DateTime('now', new DateTimeZone('Asia/Ho_Chi_Minh'));
                $created_at = $date->format('Y-m-d H:i:s');
                $updated_at = $created_at;

                $result = $this->productModel->addProductVariant($product_id, $color_id, $size_id, $stock_quantity, $image_variant, $created_at, $updated_at);

                // if ($result === "OK") {
                //     $thongBaoTC = "Tạo mới thành công, mời bạn tiếp tục tạo mới hoặc quay lại trang danh sách";
                //     // Reset form fields sau khi thêm thành công
                //     $color_id = $size_id = $stock_quantity = $image_variant = "";
                // } else {
                //     $thongBaoLoi = "Có lỗi xảy ra trong quá trình tạo biến thể.";
                // }
            }
        }


        // Gọi view và truyền thông báo
        include "./views/product/addVariant.php";
    }
    public function showFormEditVariant($id, $idVariant)
    {
        // Kiểm tra xem ID sản phẩm và ID biến thể có hợp lệ không
        if (empty($id)) {
            $thongBaoLoi = "ID sản phẩm không hợp lệ.";
            require_once './views/product/editVariant.php';
            return;
        }
        if (empty($idVariant)) {
            $thongBaoLoi = "ID Biến thể không hợp lệ.";
            require_once './views/product/editVariant.php';
            return;
        }

        // Lấy thông tin sản phẩm và biến thể
        $product = $this->productModel->getProductById($id);
        $variant = $this->productModel->getVariantById($idVariant);
        $colors = $this->productModel->getAllColor();
        $sizes = $this->productModel->getAllSize();
        $color_id = trim($variant["color_id"]);
        $size_id = trim($variant["size_id"]);
        $color = $this->productModel->getColorById($color_id);
        $size = $this->productModel->getSizeById($size_id);

        // Kiểm tra xem sản phẩm và biến thể có tồn tại không
        if (!$product) {
            $thongBaoLoi = "Sản phẩm không tồn tại.";
            require_once './views/product/editProduct.php';
            return;
        }
        if (!$variant) {
            $thongBaoLoi = "Biến thể không tồn tại.";
            require_once './views/product/editVariant.php';
            return;
        }

        // Khởi tạo các biến từ dữ liệu của biến thể
        $product_name = trim($product["product_name"]);
        $color_name = trim($color["color_name"]);
        $size_name = trim($size["size_name"]);
        $stock_quantity = trim($variant["stock_quantity"]);
        $image_variant = trim($variant["image_variant"]);

        // Gọi view để hiển thị form
        require_once './views/product/editVariant.php';
    }

    public function submitEditVariant($id, $idVariant)
    {
        if (isset($_POST['submit'])) {
            // Lấy giá trị từ form
            $product = $this->productModel->getProductById($id);
            $variant = $this->productModel->getVariantById($idVariant);
            $colors = $this->productModel->getAllColor();
            $sizes = $this->productModel->getAllSize();
            $color_id = trim($variant["color_id"]);
            $size_id = trim($variant["size_id"]);
            $color = $this->productModel->getColorById($color_id);
            $size = $this->productModel->getSizeById($size_id);
            $product_name = trim($product["product_name"]);
            $color_name = trim($color["color_name"]);
            $size_name = trim($size["size_name"]);
            $stock_quantity = trim($variant["stock_quantity"]);
            $image_variant = trim($variant["image_variant"]);

            $product_id = $id;
            $color_id = isset($_POST['color_id']) ? trim($_POST['color_id']) : null;
            $size_id = isset($_POST['size_id']) ? trim($_POST['size_id']) : null;
            $stock_quantity = trim($_POST['stock_quantity']);
            $created_at = trim($variant["created_at"]);

            // Biến thông báo lỗi
            $thongBaoLoiColor = $thongBaoLoiSize = $thongBaoLoiQuantity = $thongBaoLoiUploadVariant = "";

            // Kiểm tra lỗi
            if (empty($color_id)) {
                $thongBaoLoiColor = "Vui lòng Chọn màu.";
            }
            if (empty($size_id)) {
                $thongBaoLoiSize = "Vui lòng Chọn size.";
            }
            if (empty($stock_quantity) || $stock_quantity < 0) {
                $thongBaoLoiQuantity = "Vui lòng nhập số lượng hợp lệ.";
            }

            // Upload ảnh
            $thamSo1 = $_FILES["image_variant"]["tmp_name"];
            $thamSo2 = "./images/imgs" . $_FILES["image_variant"]["name"];

            if (move_uploaded_file($thamSo1, $thamSo2)) {
                $image_variant = $thamSo2;
            } else {
                $thongBaoLoiUploadVariant = "Upload thất bại.";
            }

            // Nếu không có lỗi, thực hiện chỉnh sửa biến thể
            if (empty($thongBaoLoiColor) && empty($thongBaoLoiSize) && empty($thongBaoLoiQuantity) && empty($thongBaoLoiUploadVariant)) {
                $date = new DateTime('now', new DateTimeZone('Asia/Ho_Chi_Minh'));
                $updated_at = $date->format('Y-m-d H:i:s');
                $result = $this->productModel->editProductVariant($idVariant, $product_id, $color_id, $size_id, $stock_quantity, $image_variant, $created_at, $updated_at);

                if ($result === "OK") {
                    echo "<script>
                        if (confirm('Bạn đã sửa sản phẩm thành công. Nhấn OK để quay lại danh sách sản phẩm.')) {
                            window.location.href = '?act=listProductVariant&id=$product_id';
                        }
                    </script>";
                    exit;
                } else {
                    $thongBaoLoi = "Có lỗi xảy ra trong quá trình sửa sản phẩm.";
                }
            }
        }

        // Gọi view và truyền thông báo
        include "./views/product/editVariant.php";
    }
}
