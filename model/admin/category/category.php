<?php
class categoryModel{
    public $pdo;
    public function __construct()
    {
        $this->pdo=connect();
    }
    public function __destruct()
    {
        $this->pdo=null;
    }
    public function getAllCategory(){
        $sql = "SELECT * FROM `categories`";
        $data=$this->pdo->query($sql)->fetchAll();
        return $data;
    }
    public function getCategoryTop(){
        $sql = "SELECT categories.id, categories.category_name, categories.image_category, COUNT(products.id) AS product_count
FROM categories 
LEFT JOIN products  ON categories.id = products.category_id
GROUP BY categories.id, categories.category_name, categories.image_category
ORDER BY product_count DESC
LIMIT 4;
";
        $data=$this->pdo->query($sql)->fetchAll();
        return $data;
    }
    public function getCategoryTopOrder(){
        $sql = "SELECT products.*, products.product_name, categories.category_name, SUM(order_items.quantity) AS total_sold
FROM categories 
JOIN products ON categories.id = products.category_id
JOIN product_variants ON products.id = product_variants.product_id
JOIN order_items ON product_variants.id = order_items.variant_id
JOIN orders ON order_items.order_id = orders.id
JOIN (
    SELECT products.category_id
    FROM products
    JOIN product_variants ON products.id = product_variants.product_id
    JOIN order_items ON product_variants.id = order_items.variant_id
    GROUP BY products.category_id
    ORDER BY SUM(order_items.quantity) DESC
    LIMIT 4
) AS TopCategories ON categories.id = TopCategories.category_id
GROUP BY categories.id, products.id, product_variants.id
ORDER BY total_sold DESC;



";
        $data=$this->pdo->query($sql)->fetchAll();
        return $data;
    }
    public function insertCategories($name,$image_category,$description,$created_at,$updated_at){
        $query ="INSERT INTO categories(category_name,image_category,description,created_at,updated_at) VALUES ('$name','$image_category','$description','$created_at','$updated_at')";
        $this->pdo->exec($query);
    }
    public function deletec($id){
        $query = "DELETE FROM categories WHERE id=$id";
        $this->pdo->exec($query);
    }
    public function getIdDM($id){
        $query = "SELECT * FROM categories WHERE id=$id";
        $results = $this->pdo->query($query)->fetchAll(PDO::FETCH_ASSOC);
        return $results;
    }
    public function updateDM($id,$name,$image_category,$description){
        $query ="UPDATE categories SET category_name='$name',description='$description',image_category='$image_category' WHERE id=$id";
        $this->pdo->exec($query);
    }
    public function thongKe(){
        $sql=" SELECT categories.*, COUNT(products.category_id ) AS 'number_cate' 
                FROM products 
                INNER JOIN categories ON products.category_id  = categories.id  
                GROUP BY products.category_id ;";
                $data=$this->pdo->query($sql)->fetchALl();
                return $data;
    }

}

?>