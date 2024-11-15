<?php
const _HOST = 'localhost';
<<<<<<< HEAD
const _PORT =3306;
=======
>>>>>>> 862d03b7d8c784ffa50ee14ae68649f3867d89b2
const _USER="root";
const _PASS="";
const _DBNAME ="duan1";

function connect(){
    try {
        $pdo = new PDO("mysql:host=" . _HOST . "; dbname=" . _DBNAME, _USER, _PASS);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    } catch (PDOException $e) {
        echo "Kết nối thất bại: " . $e->getMessage();
    }
    
}
?>