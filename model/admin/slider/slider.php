<?php  
require_once "./PDO/conn.php";

class sliderModel{
    public $pdo=null;
    public function __construct()
    {
        $this->pdo=connect();
    }
    public function __destruct()
    {
        $this->pdo=null;
    }

    // lấy ra toàn bộ list banner
    public function getAllSlider(){
        $sql = "SELECT * FROM `sliders`";
        $data=$this->pdo->query($sql)->fetchAll();
        return $data;
    }

    public function getSliderById($id){
        $sql = "SELECT * FROM `sliders` where id=$id";
        $data=$this->pdo->query($sql)->fetch();
        return $data;
    }
    public function addSlider($image_url, $content, $description, $link, $created_at, $updated_at){  
        try{
            //tạo lệnh SQL
            $sql = "INSERT INTO sliders (image_url, content, description, link) VALUES ('$image_url', '$content', '$description', '$link')";
            //thực thi lệnh SQL
            $stmt = $this->pdo->exec($sql);
            //kiem tra neu cau lenh thuc thi thanh cong
            if($stmt > 0){
                return "OK"; //tra ve "OK" neu thanh cong
            }else{
                return "Failed"; //tra ve "Failed" neu khong thanh cong
            }
        }catch(Exception $e){
            //in ra lỗi neu co lỗi xảy ra
            echo "Error: " . $e->getMessage();
            return "Error";
        }
     }    
     
     public function update($id,$image_url,$content,$description,$link,$created_at,$updated_at){
        try{
            $sql = "UPDATE sliders
            SET image_url = '$image_url',
                content = '$content',
                description = '$description',
                link = '$link',
                created_at = '$created_at', 
                updated_at = '$updated_at'
            WHERE id = $id
                ";
        
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

     
     public function deteleSlider($id){
        try{
            $sql="DELETE FROM sliders WHERE id=$id";
            $data=$this->pdo->exec($sql);
            if($data===1){
                return "OK";
            }
        }catch(Exception $er){
            echo "Lỗi hàm insert :" .$er->getMessage();
            echo "<hr/>";
        }
    }

    public function updateSlider($id,$image_url,$content,$description,$link){
        try{
            $sql = "UPDATE slider 
            SET image_url = '$image_url', 
                content = '$content', 
                description = '$description', 
                link = '$link', 
            
            WHERE id = $id";
            // Thực thi câu lệnh SQL
            $data=$this->pdo->exec($sql);
            if($data===1||$data===0){
                return "OK";
            }
        }catch(Exception $er){            
            echo "Lỗi hàm insert :" .$er->getMessage();
}
    }

    public function deleteSlider($id){
        try{
            $sql="DELETE FROM sliders WHERE id=$id";
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