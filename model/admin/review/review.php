<?php
class reviewModel {
    public $pdo=null;

    public function __construct() 
    {
        $this->pdo = connect();
    }
    public function __destruct()
    {
        $this->pdo=null;
    }

    // Lấy danh sách tất cả reviews
    public function getAllReview() {
        $sql = "SELECT 
    reviews.*,
    users.username AS customer_name,
    products.product_name
FROM reviews
LEFT JOIN users ON reviews.user_id = users.id
LEFT JOIN products ON reviews.product_id = products.id";
        $data=$this->pdo->query($sql)->fetchAll();
        return $data;
    }

    // Xóa một review theo ID
    public function deleteReview($id) {
        $query = "DELETE FROM reviews WHERE id =$id";
        $this->pdo->exec($query);
    }
    public function getReviewById($id) {
        $query = "SELECT reviews.*, users.username
FROM reviews
JOIN users ON reviews.user_id = users.id
WHERE reviews.product_id = $id;";
        $data=$this->pdo->query($query)->fetchAll();
        return $data;
    }
}
