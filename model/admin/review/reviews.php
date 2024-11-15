<?php
require_once "./PDO/conn.php";

class reviewModel{
    public $pdo=null;
    public function __construct()
    {
        $this->pdo=connect();
    }
    public function __destruct()
    {
        $this->pdo=null;
    }
 
    public function getAllReview(){
        $sql = "SELECT * FROM `reviews`";
        $data=$this->pdo->query($sql)->fetchAll();
        return $data;
    }
    public function getReviewById($id){
        $sql = "SELECT * FROM `reviews` where id=$id";
        $data=$this->pdo->query($sql)->fetch();
        return $data;
    }

    public function deleteRe($id){
        try{
            $sql="DELETE FROM reviews WHERE id=$id";
            $data=$this->pdo->exec($sql);
            if($data===1){
                return "OK";
            }
        }catch(Exception $er){
            echo "Lỗi hàm delete :" .$er->getMessage();
            echo "<hr>";
        }
}

}