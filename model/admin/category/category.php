<?php
class categoryModel{
    public $pdo;
    public function __construct()
    {
        $this->pdo=connect();
    }
    public function __destruct()
    {
        $this->pdo=null;
    }
    public function getAllCategory(){
        $sql = "SELECT * FROM `categories`";
        $data=$this->pdo->query($sql)->fetchAll();
        return $data;
    }
}

?>