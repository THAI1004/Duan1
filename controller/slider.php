<?php
    class sliderController{
        public $sliderModel;
        public function __construct(){
            $this->sliderModel = new sliderModel();
        }

        public function listSlider(){
            $listSlider = $this->sliderModel->getAllSlider();
            // var_dump($listReview );
            require_once './views/slider/listSlider.php';
        }
        public function showFormCreate(){
            $listSlider = $this->sliderModel->getAllSlider();
            require_once './views/slider/addSlider.php';
        }
        public function addSlider(){
            $thongBaoLoi = "";
            $thongBaoTC = "";

            // Kiểm tra submit
        if (isset($_POST['submit'])) {
            $image_url = trim($_POST['image_url']);
            $link = trim($_POST['link']);
            
            //biến thông báo lỗi từng trường
            $thongBaoLoiImage = "";
            $thongBaoLoiLink = "";    
            // Kiểm tra lỗi cho từng trường
            if (empty($image_url)) {
                $thamSo1=$_FILES["image"]["tmp_name"];
            $thamSo2="./images/imgs".$_FILES["image"]["name"]; //đường dẫn để di chuyển file từ bộ nhớ tạm vào

            if(move_uploaded_file($thamSo1, $thamSo2)){
                $image="./images/imgs".$_FILES["image"]["name"];
            }else{
                $thongBaoLoiUpload="upload thất bại";
            }
            }
            if (empty($link)) {
                $thongBaoLoiLink = "Vui lòng nhập link";
}
            if (empty($thongBaoLoiImage) && empty($thongBaoLoiLink)) {
                $created_at = date("Y-m-d H:i:s");
                $updated_at = date("Y-m-d H:i:s");
                $result = $this->sliderModel->addSlider($image_url,$link,$created_at,$updated_at);
                if ($result == "OK") {
                    $thongBaoTC = "Thêm mới thành công";
                } else {
                    $thongBaoTC = "thất bại";                
                }                
            }
        }
            require_once './views/slider/addSlider.php';

    }
}