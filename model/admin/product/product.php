<?php
require_once "./PDO/conn.php";
class productModel{
    public $pdo=null;
    public function __construct()
    {
        $this->pdo=connect();
    }
    public function __destruct()
    {
        $this->pdo=null;
    }
 
    public function getAllProduct(){
        $sql = "SELECT * FROM `products`";
        $data=$this->pdo->query($sql)->fetchAll();
        return $data;
    }
    public function addProduct($product_name, $description, $category_id, $price, $created_at, $updated_at) {
        try {
            // Tạo câu lệnh SQL
            $sql = "INSERT INTO products (product_name, description, category_id, price, created_at, updated_at) 
                    VALUES ('$product_name', '$description', '$category_id', '$price', '$created_at', '$updated_at')";
            
            // Thực thi câu lệnh SQL
            $stmt = $this->pdo->exec($sql);
    
            // Kiểm tra nếu câu lệnh thực thi thành công
            if ($stmt > 0) {
                return "OK";  // Trả về "OK" nếu thành công
            } else {
                return "Failed";  // Trả về "Failed" nếu không có dòng nào bị ảnh hưởng
            }
        } catch (Exception $e) {
            // In ra lỗi nếu có lỗi xảy ra
            echo "Error: " . $e->getMessage();
            return "Error";
        }
    }
    public function deleteProduct($id){
        try{
            $sql="DELETE FROM products WHERE id=$id";
            $data=$this->pdo->exec($sql);
            if($data===1){
                return "OK";
            }
        }catch(Exception $er){
            echo "Lỗi hàm insert :" .$er->getMessage();
            echo "<hr>";
        }
        
    }
}

?>