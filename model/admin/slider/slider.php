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
        $sql = "SELECT * FROM `slider`";
        $data=$this->pdo->query($sql)->fetchAll();
        return $data;
    }

    public function getSliderById($id){
        $sql = "SELECT * FROM `slider` where id=$id";
        $data=$this->pdo->query($sql)->fetch();
        return $data;
    }
    public function addSlider($image_url, $link, $created_at, $updated_at){  
        try{
            //tạo lệnh SQL
            $sql = "INSERT INTO slider (image_url, link, created_at, updated_at) VALUES ('$image_url', '$link', '$created_at', '$updated_at')";
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
     
     public function deteleSlider($id){
        try{
            $sql="DELETE FROM slider WHERE id=$id";
            $data=$this->pdo->exec($sql);
            if($data===1){
                return "OK";
            }
        }catch(Exception $er){
            echo "Lỗi hàm insert :" .$er->getMessage();
            echo "<hr/>";
        }
    }

    public function updateSlider($id,$image_url,$link,$created_at,$updated_at){
        try{
            $sql = "UPDATE slider 
            SET image_url = '$image_url', 
                link = '$link', 
                created_at = '$created_at', 
                updated_at = '$updated_at'
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
}