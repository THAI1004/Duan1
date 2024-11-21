<?php
class projectInforModel{
    public $pdo;
    public function __construct()
    {
        $this->pdo=connect();
    }
    public function __destruct()
    {
        $this->pdo=null;
    }
    public function getAllProjectInfor(){
        $sql="SELECT * FROM `project_info`";
        $data=$this->pdo->query($sql)->fetchAll();
        return $data;
    }
}

?>