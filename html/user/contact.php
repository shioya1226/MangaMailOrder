<?php 
require("./dbconnect.php");
session_start();

if (!empty($_POST)) {
    /* 入力情報の不備を検知 */
    if ($_POST['name'] === "") {
        $error['name'] = "blank";
    }
    if ($_POST['phone'] === "") {
        $error['phone'] = "blank";
    }
    if ($_POST['mail'] === "") {
        $error['mail'] = "blank";
    }
    if ($_POST['title'] === "") {
        $error['title'] = "blank";
    }
    if ($_POST['body'] === "") {
        $error['body'] = "blank";
    }

    /* エラーがなければ次のページへ */
    if (!isset($error)) {
        $_SESSION['join'] = $_POST;   // フォームの内容をセッションで保存
        header('Location: contact_check.php');   // check.phpへ移動
        exit();
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0">
    <title>お問合せフォーム</title>
    <link href="https://unpkg.com/sanitize.css" rel="stylesheet"/>
    <style>
        /* フォーム */
* {
    box-sizing: border-box;
}
 
button, input[type="submit"] {
    outline: none;
}
 
.clear {
    clear: both;
}
 
hr {
    margin-top: 45px;
    margin-bottom: 45px;
    border: 1px solid rgba(128, 128, 128, 0.673);
}
input {
    border: none;
    border-bottom: 1px solid #d1d1d1;
    font-size: 1.2em;
    width: 100%;
    padding: 8px;
}
 
.btn {
    width: 100%;
    background-color: rgba(32, 152, 243, 0.9);
    border: none;
    color: #fff;
    padding: 15px;
    border-radius: 5px;
    box-shadow: 0 5px 2px rgba(0, 0, 0, .4);
    cursor: pointer;
}
 
.btn:hover {
    background-color: rgba(32, 152, 243, 1.0);
}
 
.btn:active {
    position: relative;
    top: 5px;
    box-shadow: none;
}
 
.next-btn {
    float: right;
    width: 48%;
}
 
.back-btn {
    width: 48%;
    text-decoration: none;
    text-align: center;
    background-color: rgba(27, 177, 112, 0.8);
    border-radius: 5px;
    box-shadow: 0 5px 2px rgba(0, 0, 0, .4);
    padding: 15px;
    cursor: pointer;
    display: block;
    color: #fff;
    cursor: pointer;
    float: left;
    font-size: 14px;
}
 
.back-btn:hover {
    background-color: rgba(27, 177, 112, 1.0);
}
 
.back-btn:active {
    position: relative;
    top: 5px;
    box-shadow: none;
}
 
.control {
    margin-bottom: 3em;
}
 
label {
    display: block;
    margin-bottom: .5em;
}
 
.required {
    margin-left: .3em;
    color: #f33;
    font-size: .9em;
    padding: 3px;
    background-color: #fee;
    font-weight: bold;
}
 
.error {
    color: #d60e0e;
    font-size: 60%;
}
 
.check-info {
    color: #2b546a;
    font-weight: bold;
}
.content {
    position: relative;
    margin: 10px auto;
    background-color: #fff;
    border: 1px solid #d1d1d1;
    max-width: 600px;
    padding: 30px;
    border-radius: 5px;
}
body {
    color: #2b546a;
    background-color: #fafafa;
    font-family:"Yu Gothic", "游ゴシック", YuGothic, "游ゴシック体";
}
    </style>
</head>
<body>
    <div class="content">
        <form action="contact.php" method="POST">
            <h1>お問合せフォーム</h1>
            <p>お問い合わせ内容をご入力の上、「確認する」ボタンをクリックしてください。</p>
            <br>
            <div class="control">
                <label for="name">名前<span class="required">必須</span></label>
                <input id="name" type="name" name="name"placeholder="例)漫画太郎">
                <?php if (!empty($error["name"]) && $error['name'] === 'blank'): ?>
                    <p class="error">＊名前を入力してください</p>
                <?php endif ?>
            </div>

            <div class="control">
                <label for="phone">電話番号<span class="required">必須</span></label>
                <input id="phone" type="phone" name="phone" placeholder="例)090-1234-5678">
                <?php if (!empty($error["phone"]) && $error['phone'] === 'blank'): ?>
                    <p class="error">＊電話番号をを入力してください</p>
                <?php endif ?>
            </div>

            <div class="control">
                <label for="mail">メールアドレス<span class="required">必須</span></label>
                <input id="mail" type="mail" name="mail" placeholder="例)manga@gmail.com">
                <?php if (!empty($error["mail"]) && $error['mail'] === 'blank'): ?>
                    <p class="error">＊メールアドレスを入力してください</p>
                <?php endif ?>
            </div>

            <div class="control">
                <label for="title">件名<span class="required">必須</span></label>
                <input id="title" type="title" name="title" placeholder="例)商品について">
                <?php if (!empty($error["title"]) && $error['title'] === 'blank'): ?>
                    <p class="error">＊件名を入力してください</p>
                <?php endif ?>
            </div>

            <div class="control">
                <label for="body">お問い合わせ内容<span class="required">必須</span></label>
                <input id="body" type="body" name="body">
                <?php if (!empty($error["body"]) && $error['body'] === 'blank'): ?>
                    <p class="error">＊お問合せ内容を入力してください</p>
                <?php endif ?>
            </div>

            <div class="control">
                <button type="submit" class="btn">確認する</button>
            </div>
        </form>
    </div>
</body>
</html>