<?php
class cartModel
{
    public $pdo = null;
    public function __construct()
    {
        $this->pdo = connect();
    }
    public function __destruct()
    {
        $this->pdo = null;
    }
    public function getAllCartItemByIdUser($id)
    {
        $sql = "
        SELECT
    products.id,
    products.product_name,           
    products.price,                   
    carts.total_price,                 
    carts.voucher_code,                
    product_variants.*,                
    cart_items.*,                      
    cart_items.id AS cart_item_id,     
    product_colors.color_name,                 
    product_sizes.size_name                   
FROM cart_items
INNER JOIN carts ON cart_items.cart_id = carts.id                  
INNER JOIN product_variants ON cart_items.variant_id = product_variants.id  
INNER JOIN products ON product_variants.product_id = products.id  
LEFT JOIN product_colors ON product_variants.color_id = product_colors.id          
LEFT JOIN product_sizes ON product_variants.size_id = product_sizes.id           
WHERE carts.user_id = $id;      

    ";



        $data = $this->pdo->query($sql)->fetchAll();
        return $data;
    }
    public function getCartBy($id)
    {
        $sql = "SELECT * from carts where user_id=$id      ";



        $data = $this->pdo->query($sql)->fetch();
        return $data;
    }
    public function deleteCart($id)
    {
        try {
            $sql = "DELETE FROM cart_items WHERE id=$id";
            $data = $this->pdo->exec($sql);
            if ($data === 1) {
                return "OK";
            }
        } catch (Exception $er) {
            echo "Lỗi hàm insert :" . $er->getMessage();
            echo "<hr>";
        }
    }
    public function deleteCartItemsByCartId($cart_id)
    {
        try {
            // Xóa tất cả các sản phẩm trong giỏ hàng theo `cart_id`
            $sql = "DELETE FROM cart_items WHERE cart_id = :cart_id";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(':cart_id', $cart_id, PDO::PARAM_INT);
            $stmt->execute();

            // Kiểm tra nếu có sản phẩm nào bị xóa
            $affectedRows = $stmt->rowCount();
            if ($affectedRows > 0) {
                return "OK";
            } else {
                return "No items to delete";
            }
        } catch (Exception $e) {
            echo "Lỗi: " . $e->getMessage();
            return "Error";
        }
    }



    public function updateCart($cartItemId, $newQuantity)
    {

        $query = "UPDATE cart_items SET quantity = $newQuantity WHERE id = $cartItemId";
        $data = $this->pdo->exec($query);
        if ($data === 1 || $data === 0) {
            return "OK";
        }
    }
    public function getVoucherByIdUser($id)
    {

        $query = "SELECT 
    vouchers.*,              
    user_vouchers.*          
FROM 
    vouchers
INNER JOIN 
    user_vouchers ON vouchers.voucher_id  = user_vouchers.voucher_id  
WHERE 
    user_vouchers.user_id = $id; ";
        $data = $this->pdo->query($query)->fetchAll();

        return $data;
    }
    public function updateCartVoucher($id, $voucher)
    {
        // Dùng prepare và bindParam để tránh SQL Injection
        $sql = "UPDATE carts SET voucher_code = :voucher WHERE user_id = :user_id";
        $stmt = $this->pdo->prepare($sql);

        // Liên kết tham số vào câu SQL
        $stmt->bindParam(':voucher', $voucher);
        $stmt->bindParam(':user_id', $id);

        // Thực thi câu lệnh SQL
        if ($stmt->execute()) {
            // Lấy ID của đơn hàng vừa được thêm vào
            $order_id = $this->pdo->lastInsertId();
            return $order_id;  // Trả về ID đơn hàng vừa được thêm
        } else {
            return false;  // Trả về false nếu có lỗi
        }
    }
    public function getVoucher($id)
    {
        $sql = "SELECT * FROM `carts` where user_id=$id";
        $data = $this->pdo->query($sql)->fetch();
        return $data;
    }
    public function getCartByIdUser($id)
    {
        $sql = "SELECT * FROM `carts` where user_id=$id";
        $data = $this->pdo->query($sql)->fetch();
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
            echo "lỗi: " . $e->getMessage();
            return "Error";
        }
    }
    public function insertCart($user_id, $total, $voucher, $create_at, $updated_at)
    {
        try {
            // Tạo câu lệnh SQL
            $sql = "INSERT INTO carts (user_id, total_price, voucher_code, create_at, updated_at) 
                VALUES (:user_id, :total_price, :voucher_code, :created_at, :updated_at)";

            // Chuẩn bị câu lệnh SQL
            $stmt = $this->pdo->prepare($sql);

            // Gán giá trị cho các tham số
            $stmt->bindParam(':user_id', $user_id);
            $stmt->bindParam(':total_price', $total);
            $stmt->bindParam(':voucher_code', $voucher);
            $stmt->bindParam(':create_at', $created_at);
            $stmt->bindParam(':updated_at', $updated_at);

            // Thực thi câu lệnh SQL
            $stmt->execute();

            // Lấy ID của giỏ hàng vừa được tạo
            $lastInsertId = $this->pdo->lastInsertId();

            // Kiểm tra nếu có giá trị lastInsertId hợp lệ
            if ($lastInsertId) {
                return $lastInsertId;  // Trả về ID của giỏ hàng vừa được chèn
            } else {
                return "Failed";  // Trả về "Failed" nếu không có ID nào được chèn
            }
        } catch (Exception $e) {
            // In ra lỗi nếu có lỗi xảy ra
            echo "Error: " . $e->getMessage();
            return "Error";
        }
    }
}
