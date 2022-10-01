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
// データベース変更
       $stmt = $dbh->prepare("SELECT * FROM purchase
        LEFT JOIN purdetails ON purchase.id = purdetails.pur_id 
        LEFT JOIN books ON purdetails.isbn = books.isbn ");
// データベース変更完了
       $stmt->execute();
       $purchase = $stmt->fetchAll(PDO::FETCH_ASSOC);
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

         <title>注文履歴一覧</title>

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
                          <h3>注文履歴一覧</h3>
                    </div>
                     <button class="btn btn-blue" onclick="location.href='.php'">キャンセル処理</button>
                    <div class="list">
                                    <table border="1">
                                        <thead>
                                            <tr>
                                                <th>ユーザーID</th>
                                                <th>注文番号</th>
                                                <th>購入日時</th>
                                                <th>商品名</th>
                                                <th>購入数</th>
                                                <th>支払方法</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach($purchase as $purchase): ?>
                                            <tr>
                                                <td><?php echo $purchase['user_id']; ?></td>
                                                <td><?php echo $purchase['id']; ?></td>
                                                <td><?php echo $purchase['pur_date']; ?></td>
                                                <td><?php echo $purchase['title']; ?></td>
                                                <td><?php echo $purchase['quantity']; ?></td>
                                                <td><?php echo $purchase['payment']; ?></td>
                                            </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
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