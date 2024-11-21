<?php
class blogModel{
    public $pdo;
    public function __construct()
    {
        $this->pdo=connect();
    }
    public function __destruct()
    {
        $this->pdo=null;
    }
    public function getAllBlog(){
        $sql="SELECT * FROM `blogs`";
        $data=$this->pdo->query($sql)->fetchAll();
        return $data;
    }
    public function getBlogById($id){
        $sql="SELECT * FROM `blogs` WHERE id=$id";
        $data=$this->pdo->query($sql)->fetchAll();
        return $data;
    }
}

?>