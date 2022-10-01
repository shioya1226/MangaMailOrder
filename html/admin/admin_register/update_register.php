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

    //値受け取り
      $id = isset($_POST['id'])? htmlspecialchars($_POST['id'], ENT_QUOTES, 'utf-8'):'';
      $isbn = isset($_POST['isbn'])? htmlspecialchars($_POST['isbn'], ENT_QUOTES, 'utf-8'):'';
      $title = isset($_POST['title'])? htmlspecialchars($_POST['title'], ENT_QUOTES, 'utf-8'):'';
      $price = isset($_POST['price'])? htmlspecialchars($_POST['price'], ENT_QUOTES, 'utf-8'):'';
      $category_id = isset($_POST['category_id'])? htmlspecialchars($_POST['category_id'], ENT_QUOTES, 'utf-8'):'';
      $detail = isset($_POST['detail'])? htmlspecialchars($_POST['detail'], ENT_QUOTES, 'utf-8'):'';
      $detail = nl2br($detail);
      $stock = isset($_POST['stock'])? htmlspecialchars($_POST['stock'], ENT_QUOTES, 'utf-8'):'';
      $publish_date = isset($_POST['publish_date'])? htmlspecialchars($_POST['publish_date'], ENT_QUOTES, 'utf-8'):'';
      $author = isset($_POST['author'])? htmlspecialchars($_POST['author'], ENT_QUOTES, 'utf-8'):'';
      $author_kana = isset($_POST['author_kana'])? htmlspecialchars($_POST['author_kana'], ENT_QUOTES, 'utf-8'):'';
      $publish = isset($_POST['publish'])? htmlspecialchars($_POST['publish'], ENT_QUOTES, 'utf-8'):'';
      $flg = isset($_POST['flg'])? htmlspecialchars($_POST['flg'], ENT_QUOTES, 'utf-8'):'';

      if (is_uploaded_file($_FILES["img"]["tmp_name"])) {
               //HTTP POST OK;

               $file_name = date('YmdHis')."_".$_FILES["img"]["name"];
               
                      if (pathinfo($file_name, PATHINFO_EXTENSION) == 'jpg' || pathinfo($file_name, PATHINFO_EXTENSION) == 'png') {
                          //拡張子OK
                          //元のアップロード先
                            $file_tmp_name = $_FILES["img"]["tmp_name"];
                            if (move_uploaded_file($file_tmp_name, "./img/" . $file_name)) {
                                //アップロード完了

                                //DB接続
                                try{
                                        $dbh = new PDO("mysql:host=localhost;dbname=manga","root","");
                                    }catch(PDOException $e){
                                        var_dump($e->getMessage());
                                        exit;
                                    }
                                    
                                    $stmt = $dbh->prepare("INSERT INTO books(
                                        id,
                                        isbn,
                                        title,
                                        price,
                                        category_id,
                                        detail,
                                        stock,
                                        publish_date,
                                        author,
                                        author_kana,
                                        publish,
                                        flg,
                                        img
                                    ) VALUES(
                                        :id,
                                        :isbn,
                                        :title,
                                        :price,
                                        :category_id,
                                        :detail,
                                        :stock,
                                        :publish_date,
                                        :author,
                                        :author_kana,
                                        :publish,
                                        :flg,
                                        :img
                                    )");
                                    $stmt->bindParam(':id',$id, PDO::PARAM_INT);
                                    $stmt->bindParam(':isbn',$isbn, PDO::PARAM_INT);
                                    $stmt->bindParam(':title',$title, PDO::PARAM_STR);
                                    $stmt->bindParam(':price',$price, PDO::PARAM_INT);
                                    $stmt->bindParam(':category_id',$category_id, PDO::PARAM_INT);
                                    $stmt->bindParam(':detail',$detail, PDO::PARAM_STR);
                                    $stmt->bindParam(':stock',$stock, PDO::PARAM_INT);
                                    $stmt->bindParam(':publish_date',$publish_date, PDO::PARAM_INT);
                                    $stmt->bindParam(':author',$author, PDO::PARAM_STR);
                                    $stmt->bindParam(':author_kana',$author_kana, PDO::PARAM_STR);
                                    $stmt->bindParam(':publish',$publish, PDO::PARAM_STR);
                                    $stmt->bindParam(':flg',$flg, PDO::PARAM_INT);
                                    $stmt->bindParam(':img',$file_name, PDO::PARAM_STR);
                                    $stmt->execute();

                            } else {
                                echo "画像をアップロードできません。";
                                exit;
                            }
                      } else {
                          echo "ファイル形式はjpg/pngのみです";
                          exit;
                    }
           } else {
               echo "危険なファイルです。";
               exit;
           }
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

         <title>登録完了ページ</title>

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
                          <h3>商品の情報を登録しました。</h3>
                    </div>
                <p><a href="../admin_update/date_list.php">商品管理一覧に戻る</a></p>
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