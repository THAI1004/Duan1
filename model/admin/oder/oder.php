<?php
class oderModel
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
    public function getAllOrder()
    {
        $sql = "SELECT orders.*, users.username, vouchers.code, users.email, users.phone, users.address
                FROM orders 
                JOIN users ON orders.user_id = users.id
                LEFT JOIN vouchers ON orders.voucher_id = vouchers.voucher_id";
        $data = $this->pdo->query($sql)->fetchAll();
        return $data;
    }

    public function getOrder($id)
    {
        $sql = "
    SELECT orders.*, vouchers.*
    FROM orders 
    LEFT JOIN vouchers ON orders.voucher_id = vouchers.voucher_id
    WHERE orders.id = $id
    ";
        $data = $this->pdo->query($sql)->fetch();
        return $data;
    }
    public function getOrderByIdUser($id)
    {
        $sql = "
    SELECT *
    FROM orders 
    WHERE user_id  = $id
    ";
        $data = $this->pdo->query($sql)->fetchAll();
        return $data;
    }
    public function updateOrder($id, $payment_status = null, $shipping_status = null)
    {
        // Khởi tạo mảng để lưu các trường cần cập nhật
        $fields = [];

        // Nếu có cập nhật payment_status
        if ($payment_status && in_array($payment_status, ["pending", "completed", "failed"])) {
            $fields[] = "payment_status = '$payment_status'";
        }

        // Nếu có cập nhật shipping_status
        if ($shipping_status && in_array($shipping_status, ["pending", "shipped", "delivered"])) {
            $fields[] = "shipping_status = '$shipping_status'";
        }

        // Chỉ thực hiện truy vấn nếu có dữ liệu để cập nhật
        if (!empty($fields)) {
            $query = "UPDATE orders SET " . implode(', ', $fields) . " WHERE id = $id";
            $this->pdo->exec($query);
        }
    }
    public function getOrderUser($id)
    {
        $sql = "SELECT * FROM orders WHERE user_id =$id";
        $data = $this->pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }
    public function getOrderById($id)
    {

        $sql = "SELECT orders.id AS order_id, 
        orders.created_at AS order_date,
        users.username AS customer_name, 
        GROUP_CONCAT(products.product_name SEPARATOR '\n \n ') AS product_names,
        GROUP_CONCAT(product_variants.image_variant SEPARATOR ', ') AS variant_images,
        GROUP_CONCAT(order_items.quantity SEPARATOR '\n \n ') AS quantities,
        GROUP_CONCAT(order_items.unit_price SEPARATOR '\n \n ') AS prices
 FROM orders
 JOIN users ON orders.user_id = users.id
 JOIN order_items ON orders.id = order_items.order_id
 JOIN product_variants ON order_items.variant_id = product_variants.id
 JOIN products ON product_variants.product_id = products.id
 WHERE orders.id = $id
 GROUP BY orders.id";
        $data = $this->pdo->query($sql)->fetch();
        return $data;
    }
    public function getThongKe()
    {
        $sql = "SELECT DATE(created_at) AS order_day, COUNT(*) AS total_orders
FROM orders
GROUP BY DATE(created_at)
ORDER BY order_day;
";
        $data = $this->pdo->query($sql)->fetchAll();
        return $data;
    }
    public function insertOrder($user_id, $guest_name, $guest_email, $guest_phone, $shipping_address, $total_price, $created_at, $updated_at, $voucher_id, $thanh_pho, $huyen, $ten_duong, $so_nha, $ordernote)
    {
        try {
            // Nếu voucher_id không hợp lệ (ví dụ: 0), thì set thành NULL
            $voucher_id = ($voucher_id > 0) ? $voucher_id : NULL;

            // Câu lệnh SQL chuẩn, voucher_id có thể là NULL
            $sql = "INSERT INTO `orders` 
                (`user_id`, `guest_name`, `guest_email`, `guest_phone`, `shipping_address`, `total_price`, `created_at`, `updated_at`, `voucher_id`, `thanh_pho`, `huyen`, `ten_duong`, `so_nha`, `ordernote`)
                VALUES 
                (:user_id, :guest_name, :guest_email, :guest_phone, :shipping_address, :total_price, :created_at, :updated_at, :voucher_id, :thanh_pho, :huyen, :ten_duong, :so_nha, :ordernote)";

            // Chuẩn bị câu lệnh SQL
            $stmt = $this->pdo->prepare($sql);

            // Liên kết tham số với câu lệnh SQL
            $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
            $stmt->bindParam(':guest_name', $guest_name, PDO::PARAM_STR);
            $stmt->bindParam(':guest_email', $guest_email, PDO::PARAM_STR);
            $stmt->bindParam(':guest_phone', $guest_phone, PDO::PARAM_STR);
            $stmt->bindParam(':shipping_address', $shipping_address, PDO::PARAM_STR);
            $stmt->bindParam(':total_price', $total_price, PDO::PARAM_STR);
            $stmt->bindParam(':created_at', $created_at, PDO::PARAM_STR);
            $stmt->bindParam(':updated_at', $updated_at, PDO::PARAM_STR);
            $stmt->bindParam(':voucher_id', $voucher_id, PDO::PARAM_INT); // voucher_id có thể là NULL
            $stmt->bindParam(':thanh_pho', $thanh_pho, PDO::PARAM_STR);
            $stmt->bindParam(':huyen', $huyen, PDO::PARAM_STR);
            $stmt->bindParam(':ten_duong', $ten_duong, PDO::PARAM_STR);
            $stmt->bindParam(':so_nha', $so_nha, PDO::PARAM_STR);
            $stmt->bindParam(':ordernote', $ordernote, PDO::PARAM_STR);

            // Thực thi câu lệnh SQL
            if ($stmt->execute()) {
                // Lấy ID của đơn hàng vừa được thêm vào
                $order_id = $this->pdo->lastInsertId();
                return $order_id;  // Trả về ID đơn hàng vừa được thêm
            } else {
                return false;  // Trả về false nếu có lỗi
            }
        } catch (Exception $er) {
            echo "Lỗi insertOrder: " . $er->getMessage();
            return false;
        }
    }
    public function getAllItem($id)
    {
        $sql = "SELECT order_items.*, 
                   products.product_name, 
                   product_colors.color_name, 
                   product_sizes.size_name, 
                   product_variants.image_variant
            FROM order_items
            JOIN product_variants ON order_items.variant_id = product_variants.id
            JOIN products ON product_variants.product_id = products.id
            JOIN product_colors ON product_variants.color_id = product_colors.id
            JOIN product_sizes ON product_variants.size_id = product_sizes.id
            WHERE order_items.order_id = $id;
    ";
        $data = $this->pdo->query($sql)->fetchAll();
        return $data;
    }
    public function getAllOderById($id)
    {
        $sql = "SELECT * From orders WHERE id=$id
";
        $data = $this->pdo->query($sql)->fetchAll();
        return $data;
    }
    public function insertOrderItem($order_id, $variant_id, $quantity, $unit_price)
    {
        try {
            $sql = "INSERT INTO order_items (order_id , variant_id , quantity, unit_price) 
                    VALUES ('$order_id', '$variant_id', '$quantity', '$unit_price')";
            $stmt = $this->pdo->exec($sql);

            // Kiểm tra nếu câu lệnh thực thi thành công
            if ($stmt > 0) {
                return "OK";  // Trả về "OK" nếu thành công
            } else {
                return "Failed";  // Trả về "Failed" nếu không có dòng nào bị ảnh hưởng
            }
        } catch (Exception $er) {
            echo "Lỗi hàm insertOrderItem " . $er->getMessage();
        }
    }
    public function getActiveOrdersByUser($userId)
    {
        // Tạo câu lệnh SQL
        $sql = "SELECT * FROM orders WHERE user_id = :user_id AND payment_status = 'completed' 
                AND shipping_status IN ('pending', 'shipped')";

        // Chuẩn bị câu lệnh
        $stmt = $this->pdo->prepare($sql);

        // Gán giá trị cho tham số
        $stmt->bindParam(':user_id', $userId, PDO::PARAM_INT);

        // Thực thi câu lệnh SQL
        $stmt->execute();

        // Trả về kết quả dưới dạng mảng
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function deleteOrder($id)
    {
        try {
            $sql = "DELETE FROM orders WHERE id=$id";
            $data = $this->pdo->exec($sql);
            if ($data === 1) {
                return "OK";
            }
        } catch (Exception $er) {
            echo "Lỗi hàm xóa :" . $er->getMessage();
            echo "<hr>";
        }
    }
}
