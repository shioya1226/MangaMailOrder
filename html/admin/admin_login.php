<?php
session_start();

if (isset($_SESSION["login_id"])) {
    header("Location: admin_top.php");
    exit();
}
if (count($_POST) === 0) {
    $message = "";
}
else {
    if($_POST["login_id"] === '' || $_POST["pass"] === '') {
    $message = "ログインとパスワードを入力してください";
    }
    else {
    try {
        $login_id = $_POST['login_id'];
            $pass = $_POST['pass'];
            $flg = 0;
        
            $dsn = "mysql:host=localhost;dbname=manga;charset=utf8";
            $user = "root";
            $password = "";
        
            $dbh = new PDO($dsn, $user, $password);
            $dbh->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        
            $sql = 'SELECT * FROM admin WHERE login_id=:login_id AND pass=:pass AND flg=:flg';
            $stmt = $dbh->prepare($sql);
        
            $stmt->bindParam(':login_id', $_POST['login_id'], PDO::PARAM_STR);
            $stmt->bindParam(':pass', $_POST['pass'], PDO::PARAM_STR);
            $stmt->bindParam(':flg', $flg, PDO::PARAM_INT);
        
            $stmt->execute();
        
        }catch (PDOException $e){
            exit('エラー：' . $e->getMessage());
    }
    if ($rec = $stmt->fetch()){
        $_SESSION['login_id'] = $rec['login_id'];
        $_SESSION['pass'] = $rec['pass'];
        header('Location: admin_top.php');
        exit();
    } else {
        $message="ログインIDかパスワードが違います";
    }
    }
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

     <title>管理者ログイン</title>

    <link rel="icon" href="favicon.ico">

    <!-- css -->
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="login-wrapper" id="login">
        <div class="container">
            <div class="login">
                <div class="login-wrapper-title">
                    <h3>管理者ログインページ</h3>
                    <div><?= $message;?></div>
                </div>
                <form class="login-form" action="admin_login.php" method="POST">
                    <div class="form-group">
                        <p>ログインID</p>
                        <input type="text" name="login_id">
                    </div>
                    <div class="form-group">
                        <p>パスワード</p>
                        <input type="password" name="pass">
                    </div>
                    <button type="submit" class="btn btn-submit">ログイン</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>