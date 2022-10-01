<?php
        //sessionでログイン制限
        session_start();
        if($_SESSION['login_id'] == false){
            header("Location:./admin_login.php");
            exit;
        }

        //DB接続
        try{
            $dbh = new PDO("mysql:host=localhost;dbname=manga","root","");
        }catch(PDOException $e){
            var_dump($e->getMessage());
            exit;
        }

       $stmt = $dbh->prepare("SELECT * FROM books");
       $stmt->execute();
       $books = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>

<head>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-13xxxxxxxxx"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag() { dataLayer.push(arguments); }
        gtag('js', new Date());

        gtag('config', 'UA-13xxxxxxxxx');
    </script>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>商品登録</title>

    <link rel="icon" href="favicon.ico">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
        integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

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
                    <h3>書籍登録</h3>
                </div>
                <form class="edit-form" method="POST" action="update_register.php" enctype="multipart/form-data">
       <div class="form-group">
           <p>商品ID</p>
           <input type="text" name="id" required>
       </div>
       <div class="form-group">
           <p>商品コード</p>
           <input type="text" name="isbn" required>
       </div>
       <div class="form-group">
           <p>商品名</p>
           <input type="text" name="title" required>
       </div>
       <div class="form-group">
           <p>価格</p>
           <input type="text" name="price" required>
       </div>
       <div class="form-group">
           <p>カテゴリーID</p>
           <input type="text" name="category_id" required>
       </div>
       <div class="form-group">
           <p>商品詳細</p>
           <input type="text" name="detail" maxlength="8">
       </div>
       <div class="form-group">
           <p>在庫</p>
           <input type="text" name="stock" required>
       </div>
       <div class="form-group">
           <p>発売日</p>
           <input type="text" name="publish_date" required>
       </div>
       <div class="form-group">
           <p>作者名</p>
           <input type="text" name="author" required>
       </div>
       <div class="form-group">
           <p>作者名(カナ)</p>
           <input type="text" name="author_kana" required>
       </div>
       <div class="form-group">
           <p>出版社</p>
           <input type="text" name="publish" required>
       </div>
       <div class="form-group">
           <p>フラグ</p>
           <input type="text" name="flg" required>
       </div>
       <div class="form-group">
           <p>商品画像</p>
           <input type="file" name="img" class="imgform">
       </div>
       <button type="submit" class="btn btn-blue">登録</button>
    </form>
            </div>
        </div>
    </main>
    <footer>
        <div class="container">
            <p>Copyright @ 2022 SQUARE, inc</p>
        </div>
    </footer>
</body>

</html>