<?php
class AccountModel
{
    public $pdo;
    public function __construct()
    {
        $this->pdo = connect();
    }
    public function __destruct()
    {
        $this->pdo = null;
    }
    public function getAllTaiKhoan($role)
    {
        $query = "SELECT users.*, GROUP_CONCAT(vouchers.code SEPARATOR '\n \n ') AS vouchers FROM users JOIN user_vouchers ON users.id = user_vouchers.user_id 
        JOIN vouchers ON user_vouchers.voucher_id = vouchers.voucher_id GROUP BY users.id";
        $results = $this->pdo->query($query)->fetchAll(PDO::FETCH_ASSOC);
        return $results;
    }
    public function getIdTK($id)
    {
        $query = "SELECT * FROM users WHERE id=$id";
        $results = $this->pdo->query($query)->fetchAll(PDO::FETCH_ASSOC);
        return $results;
    }
    public function updateStatus($id, $status)
    {
        if (!in_array($status, [0, 1])) {
            return false;
        }
        $query = "UPDATE users SET  status='$status' WHERE id = $id";
        $this->pdo->exec($query);
    }
    
}
