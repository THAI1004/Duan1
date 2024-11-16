<?php   
    class reviewController{
        public $reviewModel;
        public function __construct()
        {
            $this->reviewModel=new reviewModel();
        }
    
    public function listReview(){
        $listReview = $this->reviewModel->getAllReview();
        // var_dump($listReview );
        require_once './views/review/listReview.php';
    }

    public function delete($id){
        $this->reviewModel->deleteReview($id);
        header('location:?act=listReview');
    }
}