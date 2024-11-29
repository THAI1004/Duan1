<?php
require_once "./PDO/conn.php";
class productModel
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

    public function getAllProduct()
    {
        $sql = "SELECT * FROM `products`";
        $data = $this->pdo->query($sql)->fetchAll();
        return $data;
    }
    public function getProductLimit20()
    {
        $sql = "SELECT * 
            FROM products 
            ORDER BY created_at DESC 
            LIMIT 20;
            ";
        $data = $this->pdo->query($sql)->fetchAll();
        return $data;
    }
    public function getAllColor()
    {
        $sql = "SELECT * FROM `product_colors`";
        $data = $this->pdo->query($sql)->fetchAll();
        return $data;
    }
    public function getAllColorByid($id)
    {
        $sql = "SELECT DISTINCT product_colors.id, product_colors.color_name
        FROM product_variants
        JOIN product_colors ON product_variants.color_id = product_colors.id
        WHERE product_variants.product_id = $id;";

        $data = $this->pdo->query($sql)->fetchAll();
        return $data;
    }
    public function getAllSizeByid($id)
    {
        $sql = "SELECT DISTINCT product_sizes.id, product_sizes.size_name
                FROM product_variants
                JOIN product_sizes ON product_variants.size_id = product_sizes.id
                WHERE product_variants.product_id = $id;";

        $data = $this->pdo->query($sql)->fetchAll();
        return $data;
    }

    public function getAllSize()
    {
        $sql = "SELECT * FROM `product_sizes`";
        $data = $this->pdo->query($sql)->fetchAll();
        return $data;
    }
    public function getProductById($id)
    {
        $sql = "SELECT * FROM `products` where id=$id";
        $data = $this->pdo->query($sql)->fetch();
        return $data;
    }
    public function searchProduct($keyword)
    {
        $sql = "SELECT * FROM products WHERE product_name LIKE '%$keyword%'";
        $data = $this->pdo->query($sql)->fetchAll();
        return $data;
    }
    public function imageAllVariant($id)
    {
        $sql = "SELECT image_variant
        FROM product_variants
        WHERE product_id = $id
        GROUP BY image_variant;
        ";
        $data = $this->pdo->query($sql)->fetchAll();
        return $data;
    }
    public function getColorById($id)
    {
        $sql = "SELECT * FROM `product_colors` where id=$id";
        $data = $this->pdo->query($sql)->fetch();
        return $data;
    }
    public function getSizeById($id)
    {
        $sql = "SELECT * FROM `product_sizes` where id=$id";
        $data = $this->pdo->query($sql)->fetch();
        return $data;
    }
    public function addProduct($product_name, $description, $category_id, $price, $discount_price, $created_at, $updated_at, $image)
    {
        try {
            // Tạo câu lệnh SQL
            $sql = "INSERT INTO products (product_name, description, category_id, price,discount_price, created_at, updated_at,image) 
                    VALUES ('$product_name', '$description', '$category_id', '$price','$discount_price', '$created_at', '$updated_at','$image')";

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
    public function deleteProduct($id)
    {
        try {
            $sql = "DELETE FROM products WHERE id=$id";
            $data = $this->pdo->exec($sql);
            if ($data === 1) {
                return "OK";
            }
        } catch (Exception $er) {
            echo "Lỗi hàm insert :" . $er->getMessage();
            echo "<hr>";
        }
    }
    public function update($id, $product_name, $description, $category_id, $price, $discount_price, $created_at, $updated_at, $image)
    {
        try {
            if (isset($image)) {
                $sql = "UPDATE products 
        SET product_name = '$product_name', 
            description = '$description', 
            category_id = $category_id, 
            price = $price, 
            discount_price=$discount_price,
            created_at = '$created_at', 
            updated_at = '$updated_at',
            image='$image'
        WHERE id = $id";
            } else {
                $sql = "UPDATE products 
                SET product_name = '$product_name', 
                    description = '$description', 
                    category_id = $category_id, 
                    price = $price, 
                    discount_price=$discount_price
                    created_at = '$created_at', 
                    updated_at = '$updated_at'
                WHERE id = $id";
            }
            // Thực thi câu lệnh SQL
            $data = $this->pdo->exec($sql);
            if ($data === 1 || $data === 0) {
                return "OK";
            }
        } catch (Exception $er) {
            echo "Lỗi hàm insert :" . $er->getMessage();
            echo "<hr>";
        }
    }

    public function getAllProductVariant($id)
    {
        // Tính toán giá trị OFFSET


        // Truy vấn SQL có phân trang
        $sql = "
    SELECT DISTINCT
        product_variants.id AS variant_id, 
        product_variants.product_id,  
        products.product_name, 
        product_colors.color_name, 
        product_colors.color_code,
        product_sizes.size_name, 
        product_variants.stock_quantity,
        product_variants.image_variant
    FROM 
        product_variants 
    JOIN 
        products  ON product_variants.product_id = products.id
    JOIN 
        product_colors  ON product_variants.color_id = product_colors.id
    JOIN 
        product_sizes  ON product_variants.size_id = product_sizes.id
    WHERE 
        product_variants.product_id = :product_id";




        // Chuẩn bị câu lệnh truy vấn
        $stmt = $this->pdo->prepare($sql);

        // Liên kết tham số vào truy vấn
        $stmt->bindValue(':product_id', $id, PDO::PARAM_INT);

        // Thực thi và trả về kết quả
        $stmt->execute();
        $data = $stmt->fetchAll();
        return $data;
    }


    public function deleteProductVariant($idVariant)
    {
        try {
            $sql = "DELETE FROM product_variants WHERE id=$idVariant";
            $data = $this->pdo->exec($sql);
            if ($data === 1) {
                return "OK";
            }
        } catch (Exception $er) {
            echo "Lỗi hàm xóa :" . $er->getMessage();
            echo "<hr>";
        }
    }
    public function addProductVariant($product_id, $color_id, $size_id, $stock_quantity, $image_variant, $created_at, $updated_at)
    {
        try {
            // Tạo câu lệnh SQL
            $sql = "INSERT INTO product_variants (product_id, color_id, size_id, stock_quantity, image_variant, created_at, updated_at) 
                    VALUES ('$product_id', '$color_id', '$size_id', '$stock_quantity', '$image_variant', '$created_at', '$updated_at')";

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
    public function getVariantById($idVariant)
    {
        $sql = "SELECT * FROM `product_variants` where id=$idVariant   ";
        $data = $this->pdo->query($sql)->fetch();
        return $data;
    }
    public function editProductVariant($idVariant, $product_id, $color_id, $size_id, $stock_quantity, $image_variant, $created_at, $updated_at)
    {
        try {
            $sql = "UPDATE product_variants 
        SET product_id = '$product_id', 
            color_id = '$color_id', 
            size_id = '$size_id', 
            stock_quantity = '$stock_quantity', 
            image_variant = '$image_variant', 
            created_at = '$created_at', 
            updated_at = '$updated_at'
        WHERE id = $idVariant";
            // Thực thi câu lệnh SQL
            $data = $this->pdo->exec($sql);
            if ($data === 1 || $data === 0) {
                return "OK";
            }
        } catch (Exception $er) {
            echo "Lỗi hàm insert :" . $er->getMessage();
            echo "<hr>";
        }
    }
    public function getProductByCategoryId($category_id)
    {
        $sql = "SELECT * FROM products WHERE category_id = $category_id";
        $data = $this->pdo->query($sql)->fetchAll();
        return $data;
    }
    public function getProductByPrice($min_price, $max_price)
    {
        $sql = "SELECT * FROM products WHERE price BETWEEN :min_price AND :max_price";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':min_price', $min_price, PDO::PARAM_INT);
        $stmt->bindParam(':max_price', $max_price, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function checkVariant($id, $size_id, $color_id, $quantity)
    {
        $sql = "SELECT * FROM `product_variants` where product_id =$id AND size_id =$size_id 
              AND color_id =$color_id
              AND stock_quantity >= $quantity";
        $data = $this->pdo->query($sql)->fetch();
        return $data;
    }

    public function checkUserOrder($userId, $productId)
    {
        $sql = "SELECT order_items.id
                FROM orders
                JOIN order_items ON orders.id = order_items.order_id
                JOIN product_variants ON order_items.variant_id = product_variants.id
                WHERE orders.user_id = :user_id
                  AND product_variants.product_id = :product_id
                  AND orders.payment_status = 'completed'";

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            ':user_id' => $userId,
            ':product_id' => $productId
        ]);

        return $stmt->rowCount() > 0; // Trả về true nếu có kết quả
    }
}
