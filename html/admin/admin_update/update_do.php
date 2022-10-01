<?php
//DB接続
try{
    $dbh = new PDO("mysql:host=localhost;dbname=manga","root","");
}catch(PDOException $e){
    var_dump($e->getMessage());
    exit;
}

$sql = 'UPDATE books SET isbn = :isbn, title = :title, price = :price, category_id = :category_id, detail = :detail, stock = :stock, publish = :publish, author = :author, author_kana = :author_kana, publish = :publish, img = :img WHERE id = :id';

$stmt = $dbh->prepare($sql);
$stmt->bindValue(':isbn', $_POST['isbn'], PDO::PARAM_INT);
$stmt->bindValue(':title', $_POST['title'], PDO::PARAM_STR);
$stmt->bindValue(':price', $_POST['price'], PDO::PARAM_STR);
$stmt->bindValue(':category_id', $_POST['category_id'], PDO::PARAM_STR);
$stmt->bindValue(':detail', $_POST['detail'], PDO::PARAM_STR);
$stmt->bindValue(':stock', $_POST['stock'], PDO::PARAM_STR);
$stmt->bindValue(':publish_date', $_POST['publish_date'], PDO::PARAM_STR);
$stmt->bindValue(':author', $_POST['author'], PDO::PARAM_STR);
$stmt->bindValue(':author_kana', $_POST['author_kana'], PDO::PARAM_STR);
$stmt->bindValue(':publish', $_POST['publish'], PDO::PARAM_STR);
$stmt->bindValue(':img', $_POST['img'], PDO::PARAM_STR);
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

         <title>修正完了ページ</title>

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
                          <h3>商品の情報を変更しました。</h3>
                    </div>
	<p><a href="date_list.php">商品管理一覧に戻る</a></p>
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