<?php
class categoryController{
    public $categoryModel;
    public function __construct()

    {
        $this->categoryModel = new categoryModel();
    }
    public function listCategory(){
        $listcategory = $this->categoryModel->getAllCategory();
        include './views/category/listCategory.php';
    }
    public function formCategory(){
        include './views/category/addCategory.php';
    }
    public function addCategory(){
        if(isset($_POST['submitAddCategory'])){
            $name= $_POST['category_name'];
            $description = $_POST['description'];
            date_default_timezone_set('Asia/Ho_Chi_Minh');
            $created_at = date('Y-m-d H:i:s');  
            $updated_at = date('Y-m-d H:i:s');
            $this->categoryModel->insertCategories($name,$description,$created_at,$updated_at);
            header('location:?act=listDanhMuc');
        }
    }
    public function delete($id){
        $this->categoryModel->deleteC($id);
        header('location:?act=listDanhMuc');
    }
    public function formEdit($id){
        $edit = $this->categoryModel->getIdDM($id);
        include './views/category/editCategory.php';
    }
    public function update($id){
        if(isset($_POST['update'])){
            $name =$_POST['category_name'];
            $description = $_POST['description'];
            $this->categoryModel->updateDM($id,$name,$description);
            header('location:?act=listDanhMuc');
        }
    }
}

?>