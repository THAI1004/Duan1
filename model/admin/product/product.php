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
    public function getProductById($id){
        $sql = "SELECT * FROM `products` where id=$id";
        $data=$this->pdo->query($sql)->fetch();
        return $data;
    }
    public function addProduct($product_name, $description, $category_id, $price, $created_at, $updated_at,$image) {
        try {
            // Tạo câu lệnh SQL
            $sql = "INSERT INTO products (product_name, description, category_id, price, created_at, updated_at,image) 
                    VALUES ('$product_name', '$description', '$category_id', '$price', '$created_at', '$updated_at','$image')";
            
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
    public function update($id,$product_name,$description,$category_id,$price,$created_at,$updated_at,$image){
        try{
            $sql = "UPDATE products 
        SET product_name = '$product_name', 
            description = '$description', 
            category_id = $category_id, 
            price = $price, 
            created_at = '$created_at', 
            updated_at = '$updated_at',
            image='$image'
        WHERE id = $id";
// Thực thi câu lệnh SQL
            $data=$this->pdo->exec($sql);
            if($data===1||$data===0){
                return "OK";
            }
        }catch(Exception $er){
            echo "Lỗi hàm insert :" .$er->getMessage();
            echo "<hr>";
        }
    }
    public function getAllProductVariant($id){
        $sql = "
        SELECT 
            pv.id AS variant_id, 
            p.product_name, 
            pc.color_name, 
            pc.color_code,
            ps.size_name, 
            pv.stock_quantity,
            pv.price_adjustment,
            pv.image_variant
        FROM 
            Product_Variants pv
        JOIN 
            Products p ON pv.product_id = p.id
        JOIN 
            Product_Colors pc ON pv.color_id = pc.id
        JOIN 
            Product_Sizes ps ON pv.size_id = ps.id
        WHERE 
            pv.product_id = $id";
    

        $data=$this->pdo->query($sql)->fetchAll();
        return $data;
    }
}

?>