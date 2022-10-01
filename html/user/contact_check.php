<?php
require("./dbconnect.php");
session_start();
 
/* 問合せの手続き以外のアクセスを飛ばす */
if (!isset($_SESSION['join'])) {
    header('Location: contact.php');
    exit();
}
 
    // 送信ボタンが押されたら、入力情報をデータベースに登録
    if (isset($_POST["submit"])) {
    $statement = $db->prepare("INSERT INTO contact SET name=?, phone=?, mail=?, title=?, body=?, date=now()");
    $statement->execute(array(
        $_SESSION['join']['name'],
        $_SESSION['join']['phone'],
        $_SESSION['join']['mail'],
        $_SESSION['join']['title'],
        $_SESSION['join']['body'],                
    ));
    unset($_SESSION['join']);   // セッションを破棄
    header('Location: contact_thank.php');   // thank.phpへ移動
    exit();
}

?>
<?php
session_start();
include('header.php');
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0">
    <title>確認画面</title>
    <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
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
        <form action="contact_check.php" method="POST">
            <input type="hidden" name="check" value="checked">
            <h1>入力情報の確認</h1>
            <p>お問合せ内容に変更が必要な場合、下のボタンを押し、変更を行ってください。</p>
            <?php if (!empty($error) && $error === "error"): ?>
                <p class="error">＊内容入力に失敗しました。</p>
            <?php endif ?>
            <hr>
 
            <div class="control">
                <p>名前</p>
                <p><span class="fas fa-angle-double-right"></span> <span class="check-info"><?php echo htmlspecialchars($_SESSION['join']['name'], ENT_QUOTES); ?></span></p>
            </div>
            <div class="control">
                <p>電話番号</p>
                <p><span class="fas fa-angle-double-right"></span> <span class="check-info"><?php echo htmlspecialchars($_SESSION['join']['phone'], ENT_QUOTES); ?></span></p>
            </div>
            <div class="control">
                <p>メールアドレス</p>
                <p><span class="fas fa-angle-double-right"></span> <span class="check-info"><?php echo htmlspecialchars($_SESSION['join']['mail'], ENT_QUOTES); ?></span></p>
            </div>
            <div class="control">
                <p>件名</p>
                <p><span class="fas fa-angle-double-right"></span> <span class="check-info"><?php echo htmlspecialchars($_SESSION['join']['title'], ENT_QUOTES); ?></span></p>
            </div>
            <div class="control">
                <p>お問合せ内容</p>
                <p><span class="fas fa-angle-double-right"></span> <span class="check-info"><?php echo htmlspecialchars($_SESSION['join']['body'], ENT_QUOTES); ?></span></p>
            </div>
            
            <br>
            <a href="contact.php" class="back-btn">変更する</a>
            <button type="submit" class="btn next-btn" name="submit">送信する</button>
            <div class="clear"></div>
        </form>
    </div>
</body>
</html>

<?php

include('footer.php');

?>
</html>