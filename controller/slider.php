<?php
class sliderController
{
    public $sliderModel;
    public function __construct()
    {
        $this->sliderModel = new sliderModel();
    }


    public function listSlider()
    {
        $listSlider = $this->sliderModel->getAllSlider();
        // var_dump($listSlider);
        require_once './views/slider/listSlider.php';
    }

    public function addSlider()
    {
        $thongBaoLoi = "";
        $thongBaoTC = "";

        // Kiểm tra submit
        if (isset($_POST['submit'])) {
            // $image_url = trim($_FILES['image_url']);
            $link = trim($_POST['link']);

            //biến thông báo lỗi từng trường
            $thongBaoLoiImage = "";
            $thongBaoLoiLink = "";
            // Kiểm tra lỗi cho từng trường
            if (empty($image_url)) {
                $thamSo1 = $_FILES["image_url"]["tmp_name"];
                $thamSo2 = "./images/imgs" . $_FILES["image_url"]["name"]; //đường dẫn để di chuyển file từ bộ nhớ tạm vào

                if (move_uploaded_file($thamSo1, $thamSo2)) {
                    $image_url = "./images/imgs" . $_FILES["image_url"]["name"];
                } else {
                    $thongBaoLoiUpload = "upload thất bại";
                }
            }
            if (empty($link)) {
                $thongBaoLoiLink = "Vui lòng nhập link";
            }
            if (empty($thongBaoLoiImage) && empty($thongBaoLoiLink)) {
                $created_at = date("Y-m-d H:i:s");
                $updated_at = date("Y-m-d H:i:s");
                $result = $this->sliderModel->addSlider($image_url, $link, $created_at, $updated_at);
                if ($result == "OK") {
                    $thongBaoTC = "Thêm mới thành công";
                } else {
                    $thongBaoTC = "thất bại";
                }
            }
        }
        require_once './views/slider/addSlider.php';
    }

    public function showFormEdit($id)
    {
        // Kiểm tra xem ID có hợp lệ không
        if (empty($id)) {
            $thongBaoLoi = "ID không hợp lệ.";
            require_once './views/slider/editSlider.php';
            return;
        }

        $slider = $this->sliderModel->getSliderById($id);

        if (!$slider) {
            // Xử lý trường hợp không tìm thấy 
            $thongBaoLoi = " không tồn tại.";
            require_once './views/slider/editSlider.php';
            return; // Dừng thực thi nếu không tìm thấy 
        }

         // Khởi tạo các biến
         $slider_id=$_GET["id"];
         $image_url = trim($slider["image_url"]);
         $link = trim($slider["link"]);
         $created_at = trim($slider["created_at"]);

         // Gọi view để hiển thị form
        require_once './views/slider/editSlider.php';
    }
        public function submitEdit($id) {
        // Kiểm tra xem ID có hợp lệ không
        if (empty($id)) {
            $thongBaoLoi = "ID không hợp lệ.";
            require_once './views/slider/editSlider.php';
            return;
        }

        // Khởi tạo thông báo
        $thongBaoLoiImageurl = "";
        $thongBaoLoiLink = "";
        $thongBaoLoi = "";
        $thongBaoTC = "";

        // Lấy banner hiện tại
        $slider = $this->sliderModel->getSliderById($id);
    
        if (isset($_POST['submit'])) {
            // Lấy giá trị từ form
            $link = trim($_POST['link']);
          
            
            // Kiểm tra lỗi cho từng trường
            if (empty($link)) {
                $thongBaoLoiLink = "Vui lòng nhập link.";
            }
            $thamSo1=$_FILES["image_url"]["tmp_name"];
            $thamSo2="./images/imgs".$_FILES["image_url"]["name"]; //đường dẫn để di chuyển file từ bộ nhớ tạm vào

            if(move_uploaded_file($thamSo1, $thamSo2)){
                $image_url="./images/imgs".$_FILES["image_url"]["name"];
            }else{
                $thongBaoLoiUpload="upload thất bại";
            }
            // Nếu không có lỗi, thực hiện cập nhật banner
            if (empty($thongBaoLoiUpload) && empty($thongBaoLoiLink)) {
                $date = new DateTime('now', new DateTimeZone('Asia/Ho_Chi_Minh'));
                $updated_at = $date->format('Y-m-d H:i:s');
    
               
                    $created_at = $slider["created_at"]; // Giữ nguyên created_at từ banner cũ
               
                
                $result = $this->sliderModel->update( $id,$image_url,$link,$created_at,$updated_at);
                
                if ($result === "OK") {
                    $thongBaoTC = "Sửa banner thành công. Mời bạn tiếp tục tạo mới hoặc quay lại trang danh sách.";
                    // Chuyển hướng hoặc hiển thị thông báo thành công
                    if (!empty($thongBaoTC)) {
                        echo "<script>
                            if (confirm('Bạn đã sửa banner thành công. Nhấn OK để quay lại danh sách banner.')) {
                                window.location.href = '?act=listSlider'; // Chuyển hướng đến trang danh sách banner
                            }
                        </script>";}
                    exit;
                } else {
                    $thongBaoLoi = "Có lỗi xảy ra trong quá trình sửa banner.";
                }
            }
        }
    
        // Nếu có lỗi, hiển thị lại form với thông báo lỗi
        $this->showFormEdit($id); // Gọi lại hàm hiển thị form với ID banner
    }
    public function delete($id){
        $this->sliderModel->deleteSlider($id);
        header('location:?act=listSlider');
    }
 }
