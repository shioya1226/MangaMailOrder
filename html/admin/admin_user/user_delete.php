<?php
    session_start();

    if($_SESSION['login_id'] == false){
        header("Location:./admin_login.php");
        exit;
    }

    $id = isset($_POST['id'])? htmlspecialchars($_POST['id'], ENT_QUOTES, 'utf-8'):'';

      //DB接続
   try{
           $dbh = new PDO("mysql:host=localhost;dbname=manga","root","");
       }catch(PDOException $e){
           var_dump($e->getMessage());
           exit;
       }
    
       $stmt = $dbh->prepare("DELETE FROM users WHERE id=:id");
       $stmt->bindParam(":id",$id);
       $stmt->execute();
    
       header('location:./admin_user.php');