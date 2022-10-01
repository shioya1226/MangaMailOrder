<?php
    //sessionでログイン制限
    session_start();
    if($_SESSION['login_id'] == false){
        header("Location:./admin_login.php");
        exit;
    }

    $title = isset($_GET['title'])? htmlspecialchars($_GET['title'], ENT_QUOTES, 'utf-8'):'';

    //DB接続
    try{
        $dbh = new PDO("mysql:host=localhost;dbname=manga","root","");
    }catch(PDOException $e){
        var_dump($e->getMessage());
        exit;
    }

    //ページング設定
    //1. 何件ずつ表示させるか（固定。今回は10件ずつ）
    $rows = 10; 

    //2. 現在表示しているページ数（GETで取得。初回など送られてこなければ1を設定する）
    $page = isset($_GET['page'])? $_GET['page'] : 1;  

    //3. 表示するページに応じたレコード取得開始位置（2ページ目は、10件目から表示なので、10*(2-1)で$offset=10）
    $offset = $rows * ($page-1);

    //4. 全件のレコード数。
    if($title == '')
    {
        //変数の割当が必要無いのでqueryで実行し、fetchColumn()で取得したcountを返す。
        $all_rows = $dbh->query("SELECT COUNT(*) FROM books")->fetchColumn();

    }else{
        //検索条件を考慮
        $all_rows_stmt = $dbh->prepare("SELECT * FROM books WHERE title like :title");
        $all_rows_stmt->bindValue(":title",'%'.$title.'%');
        $all_rows_stmt->execute();
        $all_rows = $all_rows_stmt->rowCount();
    }

    //5.  全件を10件ずつ表示させた場合のページ数。全件÷表示件数をして、0以下の場合は、ページ数は1に固定。
    if(($all_rows % $rows) <= 0){
        $pages = (int)($all_rows/$rows);
    }else{
        $pages = (int)($all_rows/$rows)+1;
    }

    //6.  次のページ数（基本的に現在ページ+1。現在ページ+1が全ページ数より大きくなってしまうとページが無いのでその場合は''とする）
    $next = ($page+1 > $pages)? '' : $page+1;

    //7.  一つ前のページ数（基本的に現在ページ-1。現在ページ-1が0になってしまうとページが無いのでその場合は''とする）
    $prev = ($page-1 <= 0)? '' : $page-1;
    //ページング設定終わり

    if($title == '')
    {
        $stmt = $dbh->prepare("SELECT * FROM books");
        $stmt = $dbh->prepare("SELECT * FROM books limit :offset,:rows");

    }else{
        $stmt = $dbh->prepare("SELECT * FROM books WHERE title like :title");
        $stmt = $dbh->prepare("SELECT * FROM books WHERE title like :title limit :offset,:rows");
        $stmt->bindValue(":title",'%'.$title.'%');     
    }

    $stmt->bindParam(":offset",$offset,PDO::PARAM_INT);
    $stmt->bindParam(":rows",$rows,PDO::PARAM_INT);
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
                function gtag(){dataLayer.push(arguments);}
                gtag('js', new Date());

                gtag('config', 'UA-13xxxxxxxxx');
            </script>

            <meta charset="utf-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">

         <title>商品管理一覧</title>

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
                          <h3>商品管理一覧</h3>
                    </div>
                    <form class="serch" action="date_list.php" method="GET">
                        <input type="text" name="title" placeholder="商品検索">
                    </form>
                    <button class="btn btn-blue" onclick="location.href='../admin_register/admin_register.php'">商品追加する</button>
                    <div class="list">
                        <table border="1">
                            <thead>
                                <tr>
                                    <th>商品ID</th>
                                      <th>商品コード</th>
                                      <th>商品名</th>
                                      <th>価格</th>
                                      <th>カテゴリーID</th>
                                    <th>商品詳細</th>
                                    <th>在庫</th>
                                    <th>発売日</th>
                                    <th>作者名</th>
                                    <th>作者名(カナ)</th>
                                    <th>出版社</th>
                                    <th>画像</th>
                                    <th>操作</th>
                                </tr>
                            </thead>
                            <tbody>
                                   <?php foreach($books as $books): ?>
                                <tr>
                                      <td><?php echo $books['books_id']; ?></td>
                                      <td><?php echo $books['isbn']; ?></td>
                                      <td><?php echo $books['title']; ?></td>
                                      <td><?php echo $books['price']; ?></td>
                                      <td><?php echo $books['category_id']; ?></td>
                                      <td><?php echo $books['detail']; ?></td>
                                      <td><?php echo $books['stock']; ?></td>
                                      <td><?php echo $books['publish_date']; ?></td>
                                      <td><?php echo $books['author']; ?></td>
                                      <td><?php echo $books['author_kana']; ?></td>
                                      <td><?php echo $books['publish']; ?></td>
                                      <td><?php echo $books['img']; ?></td>
                                    <td>
                                        <button type="button" class="btn btn-green" onclick="location.href='admin_update.php?id=<?php echo $books
                                        // id→books_idに変更
                                        ['books_id']; ?>'">編集</button>
                                        <button type="button" class="btn btn-red delete" data-id=<?php echo $books['books_id']; ?>>削除</button>
                                        <form method="POST" action="./item_delete.php" id="delete_form_<?php echo $books['books_id']; ?>">
                                            <input type="hidden" value="<?php echo $books['books_id']; ?>" name="id">
                                        </form>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                        <ul class="paging">
                            <li><a href="./date_list.php?title=<?php echo $title; ?>">« 最初</a></li>
                            <?php if ($prev != ''): ?>
                                <li><a href="./date_list.php?page=<?php echo $prev; ?>&title=<?php echo $title; ?>"><?php echo $page-1; ?></a></li>
                            <?php endif; ?>
                            <li><span><?php echo $page; ?></span></li>
                            <?php if ($next != ''):  ?>
                                <li><a href="./date_list.php?page=<?php echo $next; ?>&title=<?php echo $title; ?>"><?php echo $page+1; ?></a></li>
                            <?php endif; ?>
                            <li><a href="./date_list.php?page=<?php echo $pages; ?>&title=<?php echo $title; ?>">最後 »</a></li>
                        </ul>
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
        <script>
            $(".delete").click(function(){
                var id = this.dataset.id;
           if(confirm("ID:"+id+"番の記事を本当に削除していいですか？")){
                    //OK
                    $("#delete_form_"+id).submit();
                }else{
                    //キャンセル
                    return false;
                }
            })
        </script>

    </body>
</html>