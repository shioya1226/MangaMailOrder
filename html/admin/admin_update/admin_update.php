<?php
//DB接続
try{
    $dbh = new PDO("mysql:host=localhost;dbname=manga","root","");
}catch(PDOException $e){
    var_dump($e->getMessage());
    exit;
}

$sql = 'SELECT * FROM books WHERE id = :id';

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

         <title>商品修正</title>

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
                          <h3>修正する内容を記入してください。</h3>
                    </div>
	<form id="frmUpdate" name="frmUpdate" class="edit-form" method="post" action="update_do.php">

	<p><label for="isbn">商品コード</label></p>
	<input type="text" name="isbn" id="isbn" value="<?php print(htmlspecialchars($row[1], ENT_QUOTES)); ?>">
	<p><label for="title">商品名</label></p>
	<input type="text" name="title" id="title" value="<?php print(htmlspecialchars($row[2], ENT_QUOTES)); ?>">
	<p><label for="price">価格</label></p>
	<input type="text" name="price" id="price" value="<?php print(htmlspecialchars($row[3], ENT_QUOTES)); ?>">
	<p><label for="category_id">カテゴリーID</label></p>
	<input type="text" name="category_id" id="category_id" value="<?php print(htmlspecialchars($row[4], ENT_QUOTES)); ?>">
	<p><label for="detail">商品詳細</label></p>
	<input type="text" name="detail" id="detail" value="<?php print(htmlspecialchars($row[5], ENT_QUOTES)); ?>">
	<p><label for="stock">在庫</label></p>
	<input type="text" name="stock" id="stock" value="<?php print(htmlspecialchars($row[6], ENT_QUOTES)); ?>">
	<p><label for="publish_date">発売日</label></p>
	<input type="text" name="publish_date" id="publish_date" value="<?php print(htmlspecialchars($row[7], ENT_QUOTES)); ?>">
	<p><label for="author">作者名</label></p>
	<input type="text" name="author" id="author" value="<?php print(htmlspecialchars($row[8], ENT_QUOTES)); ?>">
	<p><label for="author_kana">作者名(カナ)</label></p>
	<input type="text" name="author_kana" id="author_kana" value="<?php print(htmlspecialchars($row[9], ENT_QUOTES)); ?>">
	<p><label for="publish">出版社</label></p>
	<input type="text" name="publish" id="publish" value="<?php print(htmlspecialchars($row[10], ENT_QUOTES)); ?>">
	<p><label for="img">画像</label></p>
	<input type="text" name="img" id="img" value="<?php print(htmlspecialchars($row[11], ENT_QUOTES)); ?>">

	
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