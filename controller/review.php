<?php
require_once './model/admin/review/reviews.php';

class ReviewController {
    public $reviewModel;
    public function __construct(){
        $this->reviewModel = new reviewModel();
    }
    public function listReview($id){
        $i=1;
        $Review = $this->reviewModel->getReviewById($id);
        $RelistReview=$this->reviewModel->getAllReview();
        // var_dump($RelistReview);
        require_once './views/review/listReview.php';
    }
    public function delete($id){
        if($id!==""){
            $datadelete=$this->reviewModel->deleteRe($id);
            if($datadelete==="OK"){
                header("location: ?act=listReview");
            }
            // chuyển hướng về trang danh sách
           
        }else{
            echo "Không có thông tin id mời bạn kiểm tra lại";
        }
    }
}
