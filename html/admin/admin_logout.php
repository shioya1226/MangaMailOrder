<?php

session_start();
$_SESSION = array();
if(isset($_COOKIE[session_name()]) === true) {
    setcookie(session_name(), "", time()-42000, "/");
}
session_destroy();
?>

<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
            <title>ログアウト</title>
        <style>
            .body {
            position: relative;
            }
            .content {
            position: absolute;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
            margin: auto;
            width: 500px;
            height: 300px;
            background: #ffffff;
            }
            a {
            position: relative;
            display: inline-block;
            transition: .3s;
            text-decoration: none;
            padding-right:5em
            }
  
            a::after {
                position: absolute;
                bottom: 0;
                left: 32%;
                content: '';
                width: 0;
                height: 2px;
                background-color: #31aae2;
                transition: .3s;
                transform: translateX(-50%);
            }
            
            a:hover::after{
                width: 65%;
            }
        </style>

    </head>
    
    <body>
        <div class="content">
            <br>
            <h1>ログアウトが完了しました。</h1>
            <br>
            <br>
            <h2 align="center"><a href="admin_login.php">ログイン画面へ戻る</a><h2>
        </div>
    </body>
</html>