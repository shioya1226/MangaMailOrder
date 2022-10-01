<?php
require("./dbconnect.php");
session_start();

if (!empty($_POST)) {
    /* 入力情報の不備を検知 */
    if ($_POST['id'] === "") {
        $error['id'] = "blank";
    }
    if ($_POST['name'] === "") {
        $error['name'] = "blank";
    }
    // if ($_POST['pass'] === "") {
    //     $error['pass'] = "blank";
    // }
    
    /*idの重複を検知 */
    if (!isset($error)) {
        $admini = $db->prepare('SELECT COUNT(*) as cnt FROM admin WHERE login_id=?');
        $admini->execute(array(
            $_POST['id']
        ));
        $record = $admini->fetch();
        if ($record['cnt'] > 0) {
            $error['id'] = 'duplicate';
        }
    }

    /* エラーがなければ次のページへ */
    if (!isset($error)) {
        $_SESSION['join'] = $_POST;   // フォームの内容をセッションで保存
        header('Location: check.php');   // check.phpへ移動
        exit();
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0">
    <title>新規管理者登録</title>
    <link href="https://unpkg.com/sanitize.css" rel="stylesheet"/>
    <link rel="stylesheet" href="admin_new.css">
</head>
<body>
    <div class="content">
        <form action="" method="POST">
            <h1>新規管理者登録</h1>
            <p>管理項目を操作するために、次のフォームに必要事項をご記入ください。</p>
            <br>
            <div class="control">
                <label for="id">ID<span class="required">必須</span></label>
                <input id="id" type="id" name="id">
                <?php if (!empty($error["id"]) && $error['id'] === 'blank'): ?>
                    <p class="error">IDを入力してください</p>
                <?php elseif (!empty($error["id"]) && $error['id'] === 'duplicate'): ?>
                    <p class="error">＊このIDはすでに登録済みです</p>
                <?php endif ?>
            </div>

            <div class="control">
                <label for="name">名前<span class="required">必須</span></label>
                <input id="name" type="name" name="name">
                <?php if (!empty($error["name"]) && $error['name'] === 'blank'): ?>
                    <p class="error">＊名前を入力してください</p>
                <?php endif ?>
            </div>

            <div class="control">
                <label for="pass">パスワード<span class="required">必須</span></label>
                <input id="pass" type="pass" pass="pass">
                <?php if (!empty($error["pass"]) && $error['pass'] === 'blank'): ?>
                    <p class="error">＊パスワードを入力してください</p>
                <?php endif ?>
            </div>

            <div class="control">
                <button type="submit" class="btn">確認する</button>
            </div>
        </form>
    </div>
        
</body>
</html>