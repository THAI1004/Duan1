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
    public function insertCategories($name,$description,$created_at,$updated_at){
        $query ="INSERT INTO categories(category_name,description,created_at,updated_at) VALUES ('$name','$description','$created_at','$updated_at')";
        $this->pdo->exec($query);
    }
    public function deletec($id){
        $query = "DELETE FROM categories WHERE id=$id";
        $this->pdo->exec($query);
    }
    public function getIdDM($id){
        $query = "SELECT * FROM categories WHERE id=$id";
        $results = $this->pdo->query($query)->fetchAll(PDO::FETCH_ASSOC);
        return $results;
    }
    public function updateDM($id,$name,$description){
        $query ="UPDATE categories SET category_name='$name',description='$description' WHERE id=$id";
        $this->pdo->exec($query);
    }
}

?>