<?php
try {
    $db = new PDO('mysql:dbname=manga;host=localhost;charset=utf8','root','');
}   catch (PDOException $e) {
    echo "データベース接続エラー　:".$e->getMessage();
}
?>