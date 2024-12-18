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
        $query = "SELECT users.*, 
                     GROUP_CONCAT(vouchers.code SEPARATOR '\n \n ') AS vouchers 
              FROM users 
              LEFT JOIN user_vouchers ON users.id = user_vouchers.user_id 
              LEFT JOIN vouchers ON user_vouchers.voucher_id = vouchers.voucher_id 
              WHERE users.role = '$role' 
              GROUP BY users.id";
        $results = $this->pdo->query($query)->fetchAll(PDO::FETCH_ASSOC);
        return $results;
    }

    public function getIdTK($id)
    {
        $query = "SELECT * FROM users WHERE id=$id";
        $results = $this->pdo->query($query)->fetch(PDO::FETCH_ASSOC);
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
    public function getAccount($username, $password)
    {
        $sql = "SELECT * FROM users WHERE username = :username AND password = :password";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', $password);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result ? $result : false;
    }
    public function insertTaiKhoan($username, $email, $phone, $address, $password)
    {
        if (strlen($phone) > 11) {
            return "Error: Phone number exceeds allowed length.";
        }
        $sql = "INSERT INTO users(username, email, phone, address,password) VALUES ('$username', '$email', '$phone', '$address', '$password')";
        $stmt = $this->pdo->exec($sql);
        if ($stmt > 0) {
            return "OK";  // Trả về "OK" nếu thành công
        } else {
            return "Failed";  // Trả về "Failed" nếu không có dòng nào bị ảnh hưởng
        }
    }
    public function findUserByUsername($username)
    {
        $query = "SELECT * FROM users WHERE username = :username LIMIT 1";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':username', $username);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
    }
    public function updateTaiKhoan($id, $username, $email, $phone, $address, $password)
    {
        $query = "UPDATE users SET username='$username',email='$email',phone='$phone',address='$address',password='$password' WHERE id=$id";
        $stmt = $this->pdo->exec($query);
        if ($stmt > 0) {
            return "OK";  // Trả về "OK" nếu thành công
        } else {
            return "Failed";  // Trả về "Failed" nếu không có dòng nào bị ảnh hưởng
        }
    }
    public function findUserByEmail($email)
    {
        $query = "SELECT * FROM users WHERE email = :email LIMIT 1";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
    }
    public function findUserByUsername($username){
        $query = "SELECT * FROM users WHERE username = :username LIMIT 1";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':username', $username);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
    }
    public function addtempPassword($email, $tempPassword, $expiry)
    {
        $query = "UPDATE users SET temp_password ='$tempPassword',temp_password_expiry='$expiry' WHERE email = '$email'";
        $result = $this->pdo->prepare($query)->execute();
        return $result;
    }
    public function verifyTempPassword($email, $tempPassword)
    {
        // Truy vấn kiểm tra email và mật khẩu tạm thời
        $query = "SELECT temp_password, temp_password_expiry FROM users WHERE email = :email";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
    }
    public function updatePassword($email, $newPassword)
    {
        $query = "UPDATE users SET password = '$newPassword', temp_password = NULL,temp_password_expiry = NULL WHERE email = '$email'";
        $result = $this->pdo->prepare($query)->execute();
        return $result;
    }
}
