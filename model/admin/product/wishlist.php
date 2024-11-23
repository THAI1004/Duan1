<?php
class WishlistModel {
    private $pdo;

    public function __construct() {
        // Kết nối tới database (Cần đảm bảo kết nối đã được thiết lập)
        $this->pdo = connect(); // Hàm connect() đã được định nghĩa ở đâu đó để trả về đối tượng PDO
    }

    public function addWishlist($id) {
        // Kiểm tra xem người dùng đã đăng nhập chưa
        if (isset($_SESSION['user_id'])) {
            $user_id = $_SESSION['user_id']; // Lấy user_id từ session

            if (isset($id) && is_numeric($id)) {
                // Gọi Model để thêm sản phẩm vào wishlist
                $this->addProductToWishlist($user_id, $id);
            } else {
                $_SESSION['message'] = "Invalid product ID!";
            }
        } else {
            $_SESSION['message'] = "Please log in to add products to your wishlist!";
        }

        // Chuyển hướng người dùng về trang trước đó
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit();
    }

    // Phương thức này gọi Model để thêm sản phẩm vào wishlist
    private function addProductToWishlist($user_id, $product_id) {
        // Kiểm tra xem sản phẩm đã có trong wishlist chưa
        $sql = "SELECT * FROM wishlist WHERE user_id = ? AND product_id = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$user_id, $product_id]);
        $data = $stmt->fetchAll();

        if (count($data) == 0) {
            // Nếu sản phẩm chưa có trong wishlist, thêm vào
            $insertQuery = "INSERT INTO wishlist (user_id, product_id) VALUES (?, ?)";
            $stmt = $this->pdo->prepare($insertQuery);
            $stmt->execute([$user_id, $product_id]);
            
            // Thông báo thành công
            $_SESSION['message'] = "Product added to your wishlist!";
        } else {
            // Nếu sản phẩm đã có trong wishlist, thông báo
            $_SESSION['message'] = "This product is already in your wishlist!";
        }
    }
    public function getAllWishlist($id){
        $sql = "SELECT 
            products.id AS product_id,
            products.product_name AS product_name, 
            products.image AS product_image, 
            products.discount_price AS product_price
        FROM wishlist
        JOIN products ON wishlist.product_id = products.id
        WHERE wishlist.user_id = $id;

";


        $data=$this->pdo->query($sql)->fetchAll();
        return $data;
    }
    public function getWishlistById($id) {
        // Chú ý: Phải đảm bảo giá trị $id là số (integer) để tránh nguy cơ SQL injection
        $id = (int)$id;  // Chuyển $id thành kiểu integer
    
        // Truy vấn SQL để lấy số lượng sản phẩm trong wishlist
        $sql = "SELECT COUNT(*) FROM wishlist WHERE user_id = $id";
    
        // Thực thi truy vấn và lấy kết quả
        $data = $this->pdo->query($sql)->fetchColumn();
    
        // Trả về kết quả
        return $data;
    }
    
    public function deleteWishlist($id){
        try{
            $sql="DELETE FROM wishlist WHERE product_id =$id";
            $data=$this->pdo->exec($sql);
            if($data===1){
                return "OK";
            }
        }catch(Exception $er){
            echo "Lỗi hàm xóa :" .$er->getMessage();
            echo "<hr>";
        }
        
    }
}
?>
