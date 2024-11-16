<?php
class AccountModel{
    public $pdo;
    public function __construct()
    {
        $this->pdo=connect();
    }
    public function __destruct()
    {
        $this->pdo=null;
    }
    public function getAllTaiKhoan($role){
        $query="SELECT * FROM users WHERE role= $role";
        $results= $this->pdo->query($query)->fetchAll(PDO::FETCH_ASSOC);
        return $results;
    }
    public function getIdTK($id){
        $query = "SELECT * FROM users WHERE id=$id";
        $results = $this->pdo->query($query)->fetchAll(PDO::FETCH_ASSOC);
        return $results;
    }
    public function updateStatus($id, $status){
        if(!in_array($status,[0,1])){
            return false;
        }
        $query = "UPDATE users SET  status='$status' WHERE id = $id";
        $this->pdo->exec($query);
    }
    public function updateRole($id, $role){
        if(!in_array($role,[1,2,3])){
            return false;
        }
        $query = "UPDATE users SET  role='$role' WHERE id = $id";
        $this->pdo->exec($query);
    }
}