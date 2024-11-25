<?php
class cartModel{
    public $pdo=null;
    public function __construct()
    {
        $this->pdo=connect();
    }
    public function __destruct()
    {
        $this->pdo=null;
    }
    public function getAllCartItemByIdUser($id){
        $sql = "
        SELECT
             products.id,
            products.product_name,           -- Lấy tên sản phẩm
            products.price,                   -- Lấy giá sản phẩm từ bảng products
            carts.total_price,                -- Lấy tổng tiền từ giỏ hàng
            carts.voucher_code,               -- Lấy mã voucher từ bảng carts
            product_variants.*,               -- Lấy toàn bộ các cột từ bảng product_variants
            cart_items.*,                     -- Lấy toàn bộ các cột từ bảng cart_items
            cart_items.id AS cart_item_id     -- Lấy id của cart_item và gán alias là cart_item_id
        FROM cart_items
        INNER JOIN carts ON cart_items.cart_id = carts.id                   -- Kết nối cart_items với carts theo cart_id
        INNER JOIN product_variants ON cart_items.variant_id = product_variants.id  -- Kết nối với product_variants theo variant_id
        INNER JOIN products ON product_variants.product_id = products.id    -- Kết nối với products theo product_id
        WHERE carts.user_id = $id;        -- Lọc theo user_id của giỏ hàng
    ";
    

    
$data=$this->pdo->query($sql)->fetchAll();
return $data;
    }
    public function deleteCart($id){
        try{
            $sql="DELETE FROM cart_items WHERE id=$id";
            $data=$this->pdo->exec($sql);
            if($data===1){
                return "OK";
            }
        }catch(Exception $er){
            echo "Lỗi hàm insert :" .$er->getMessage();
            echo "<hr>";
        }
        
    }
    public function updateCart($cartItemId, $newQuantity) {

        $query = "UPDATE cart_items SET quantity = $newQuantity WHERE id = $cartItemId";
        $data=$this->pdo->exec($query);
        if($data===1||$data===0){
            return "OK";
    }
}
public function getVoucherByIdUser($id) {

    $query = "SELECT 
    vouchers.*,              
    user_vouchers.*          
FROM 
    vouchers
INNER JOIN 
    user_vouchers ON vouchers.voucher_id  = user_vouchers.voucher_id  
WHERE 
    user_vouchers.user_id = $id; ";
    $data=$this->pdo->query($query)->fetchAll();
    
        return $data;
}
public function updateCartVoucher($id, $voucher) {
    // Dùng prepare và bindParam để tránh SQL Injection
    $sql = "UPDATE carts SET voucher_code = :voucher WHERE user_id = :user_id";
    $stmt = $this->pdo->prepare($sql);
    
    // Liên kết tham số vào câu SQL
    $stmt->bindParam(':voucher', $voucher);
    $stmt->bindParam(':user_id', $id);
    
    // Thực thi câu lệnh SQL
    $stmt->execute();
    
    // Kiểm tra kết quả thực thi
    if ($stmt->rowCount() > 0) {
        return true;  // Cập nhật thành công
    } else {
        return false; // Không có thay đổi
    }
}
    public function getVoucher($id){
        $sql = "SELECT * FROM `carts` where user_id=$id";
        $data=$this->pdo->query($sql)->fetch();
        return $data;
    }
    public function getCartByIdUser($id){
        $sql = "SELECT * FROM `carts` where user_id=$id";
        $data=$this->pdo->query($sql)->fetch();
        return $data;
    }
    public function addCart($cart_id, $variant_id, $quantity, $price)
    {
        try {
            // Tạo câu lệnh SQL
            $sql = "INSERT INTO cart_items (cart_id , variant_id , quantity, unit_price) 
                    VALUES ('$cart_id', '$variant_id', '$quantity', '$price')";

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
}

?>