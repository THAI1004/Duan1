<?php
class oderModel{
    public $pdo=null;
    public function __construct()
    {
        $this->pdo=connect();
    }
    public function __destruct()
    {
        $this->pdo=null;
    }
    public function getAllOder(){
        $sql = "SELECT orders.*, users.username, vouchers.code, users.email, users.phone, users.address
        FROM orders 
        JOIN users ON orders.user_id = users.id
        JOIN vouchers ON orders.voucher_id = vouchers.voucher_id";
        $data=$this->pdo->query($sql)->fetchAll();
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
    public function getOrderById($id){
       
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
    $data=$this->pdo->query($sql)->fetch();
    return $data;
}
}

?>