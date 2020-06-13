<?php
class Database {
    public static function Conectar() {
        $pdo = new PDO('mysql:host=localhost;dbname=dbua2020;charset=utf8', 'root', 'asdf1234');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    }
}
?>
