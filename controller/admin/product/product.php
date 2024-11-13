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
                $date = new DateTime();
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
    }

?>