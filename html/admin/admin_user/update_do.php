<?php
//DB接続
try{
    $dbh = new PDO("mysql:host=localhost;dbname=manga","root","");
}catch(PDOException $e){
    var_dump($e->getMessage());
    exit;
}

$sql = 'UPDATE users SET login_id = :login_id, name = :name, pass = :pass, post = :post, address = :address, phone = :phone, mail = :mail, flg = :flg WHERE id = :id';

$stmt = $dbh->prepare($sql);
$stmt->bindValue(':login_id', $_POST['login_id'], PDO::PARAM_INT);
$stmt->bindValue(':name', $_POST['name'], PDO::PARAM_STR);
$stmt->bindValue(':pass', $_POST['pass'], PDO::PARAM_STR);
$stmt->bindValue(':post', $_POST['post'], PDO::PARAM_STR);
$stmt->bindValue(':address', $_POST['address'], PDO::PARAM_STR);
$stmt->bindValue(':phone', $_POST['phone'], PDO::PARAM_STR);
$stmt->bindValue(':mail', $_POST['mail'], PDO::PARAM_STR);
$stmt->bindValue(':flg', $_POST['flg'], PDO::PARAM_STR);
$stmt->bindValue(':id', $_POST['id'], PDO::PARAM_INT);
$stmt->execute();
?>
<!DOCTYPE html>
<html>
<head>
            <!-- Global site tag (gtag.js) - Google Analytics -->
            <script async src="https://www.googletagmanager.com/gtag/js?id=UA-13xxxxxxxxx"></script>
            <script>
                window.dataLayer = window.dataLayer || [];
                function gtag(){dataLayer.push(arguments);}
                gtag('js', new Date());

                gtag('config', 'UA-13xxxxxxxxx');
            </script>

            <meta charset="utf-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">

         <title>変更完了ページ</title>

        <link rel="icon" href="favicon.ico">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

        <!-- css -->
        <link rel="stylesheet" href="../style.css">
    </head>
	<body>
    <header>
            <div class="container">
            <div class="header-logo">
                <h1><a href="../admin_top.php">管理画面TOP</a></h1>
            </div>

            <nav class="menu-right menu">
                <a href="../admin_logout.php">ログアウト</a>
                </nav>
            </div>
    </header>
        <main>
        <div class="wrapper">
                <div class="container">
                    <div class="wrapper-title">
                          <h3>ユーザー登録情報を変更しました。</h3>
                    </div>
	<p><a href="admin_user.php">登録情報一覧に戻る</a></p>
</div>
</div>
</main>
        <footer>
            <div class="container">
                <p>Copyright @ 2022 manga, inc</p>
            </div>
        </footer>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	</body>
</html>