<?php
//DB接続
try{
    $dbh = new PDO("mysql:host=localhost;dbname=manga","root","");
}catch(PDOException $e){
    var_dump($e->getMessage());
    exit;
}

$sql = 'SELECT * FROM users WHERE id = :id';

$stmt = $dbh->prepare($sql);
$stmt->bindValue(':id', $_REQUEST['id'], PDO::PARAM_INT);
$stmt->execute();

$row = $stmt->fetch();
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

         <title>登録情報変更</title>

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
                          <h3>変更する内容を記入してください。</h3>
                    </div>
	<form id="frmUpdate" name="frmUpdate" class="edit-form" method="post" action="update_do.php">

	
	<p><label for="login_id">ログインID</label></p>
	<input type="text" name="login_id" id="login_id" value="<?php print(htmlspecialchars($row[1], ENT_QUOTES)); ?>">
	<p><label for="name">名前</label></p>
	<input type="text" name="name" id="name" value="<?php print(htmlspecialchars($row[2], ENT_QUOTES)); ?>">
	<p><label for="pass">パスワード</label></p>
	<input type="text" name="pass" id="pass" value="<?php print(htmlspecialchars($row[3], ENT_QUOTES)); ?>">
	<p><label for="post">郵便番号</label></p>
	<input type="text" name="post" id="post" value="<?php print(htmlspecialchars($row[4], ENT_QUOTES)); ?>">
	<p><label for="address">住所</label></p>
	<input type="text" name="address" id="address" value="<?php print(htmlspecialchars($row[5], ENT_QUOTES)); ?>">
	<p><label for="phone">電話番号</label></p>
	<input type="text" name="phone" id="phone" value="<?php print(htmlspecialchars($row[6], ENT_QUOTES)); ?>">
	<p><label for="mail">メールアドレス</label></p>
	<input type="text" name="mail" id="mail" value="<?php print(htmlspecialchars($row[7], ENT_QUOTES)); ?>">
	<p><label for="flg">フラグ</label></p>
	<input type="text" name="flg" id="flg" value="<?php print(htmlspecialchars($row[8], ENT_QUOTES)); ?>">
	
	
	<p>
	<input type="submit" value="変更する">
	<input type="hidden" name="id" value="<?php print(htmlspecialchars($row[0], ENT_QUOTES)); ?>" />
	</p>
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