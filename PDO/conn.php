
<?php
const _HOST = 'localhost';
const _PORT =3306   ;
const _USER="root";
const _PASS="";
const _DBNAME ="duan1";

function connect(){
    try {
        $pdo = new PDO("mysql:host=" . _HOST . "; port=" . _PORT . "; dbname=" . _DBNAME, _USER, _PASS);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    } catch (PDOException $e) {
        echo "Kết nối thất bại: " . $e->getMessage();
    }
    
}
?>