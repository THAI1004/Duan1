<?php
class categoryController{
    public $categoryModel;
    public function __construct()

    {
        $this->categoryModel = new categoryModel();
    }
    public function listCategory(){
        $listcategory = $this->categoryModel->getAllCategory();
    }
}

?>