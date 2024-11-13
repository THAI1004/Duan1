<?php

class productController{
    public $productModel;
    public $categoryModel;
    public function __construct()

    {
        $this->categoryModel=new categoryModel();
        $this->productModel = new productModel();
    }
    public function listProduct(){
        $listProduct = $this->productModel->getAllProduct();
        
        require_once './views/product/listProduct.php';
    }
    public function showFormCreate(){
        $listCategory=$this->categoryModel->getAllCategory();
        require_once './views/product/addProduct.php';
    }
    public function addProduct(){
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
        
            // Nếu không có lỗi, thực hiện thêm sản phẩm
            if (empty($thongBaoLoiProductName) && empty($thongBaoLoiDescription) && empty($thongBaoLoiCategory) && empty($thongBaoLoiPrice)) {
                // Kiểm tra hợp lệ và gọi model để thêm sản phẩm
                $date = new DateTime('now', new DateTimeZone('Asia/Ho_Chi_Minh'));
                $created_at = $date->format('Y-m-d H:i:s');
                $updated_at = $created_at;

                $result = $this->productModel->addProduct($product_name, $description, $category_id, $price, $created_at, $updated_at);
                
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
    
    public function delete($id){
        if($id!==""){
            $datadelete=$this->productModel->deleteProduct($id);
            if($datadelete==="OK"){
                header("location: ?act=listProduct");
            }
            // chuyển hướng về trang danh sách
           
        }else{
            echo "Không có thông tin id mời bạn kiểm tra lại";
        }
    } 
    public function showFormEdit($id) {
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
        $product_id=$_GET["id"];
        $product_name = trim($product["product_name"]);
        $description = trim($product["description"]);
        $category_id = trim($product["category_id"]);
        $price = trim($product["price"]);
        $created_at = trim($product["created_at"]);
        
        // Gọi view để hiển thị form
        require_once './views/product/editProduct.php';
    }
    
    public function submitEdit($id) {
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
    
            // Nếu không có lỗi, thực hiện cập nhật sản phẩm
            if (empty($thongBaoLoiProductName) && empty($thongBaoLoiDescription) && empty($thongBaoLoiCategory) && empty($thongBaoLoiPrice)) {
                $date = new DateTime('now', new DateTimeZone('Asia/Ho_Chi_Minh'));
                $updated_at = $date->format('Y-m-d H:i:s');
    
               
                    $created_at = $product["created_at"]; // Giữ nguyên created_at từ sản phẩm cũ
               
                
                $result = $this->productModel->update( $id,$product_name,$description,$category_id,$price,$created_at,$updated_at);
                
                if ($result === "OK") {
                    $thongBaoTC = "Sửa sản phẩm thành công. Mời bạn tiếp tục tạo mới hoặc quay lại trang danh sách.";
                    // Chuyển hướng hoặc hiển thị thông báo thành công
                    if (!empty($thongBaoTC)) {
                        echo "<script>
                            if (confirm('Bạn đã sửa sản phẩm thành công. Nhấn OK để quay lại danh sách sản phẩm.')) {
                                window.location.href = '?act=listProduct'; // Chuyển hướng đến trang danh sách sản phẩm
                            }
                        </script>";}
                    exit;
                } else {
                    $thongBaoLoi = "Có lỗi xảy ra trong quá trình sửa sản phẩm.";
                }
            }
        }
    
        // Nếu có lỗi, hiển thị lại form với thông báo lỗi
        $this->showFormEdit($id); // Gọi lại hàm hiển thị form với ID sản phẩm
    }
    }

?>