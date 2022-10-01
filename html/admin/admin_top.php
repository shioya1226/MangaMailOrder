<?php
       session_start();
       if($_SESSION['login_id'] == false){
           header("Location:./admin_login.php");
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
        function gtag() { dataLayer.push(arguments); }
        gtag('js', new Date());

        gtag('config', 'UA-13xxxxxxxxx');
    </script>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>管理トップ</title>

    <link rel="icon" href="favicon.ico">
    <!-- fontawesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
        integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.1.2/css/all.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css">

    <!-- css -->
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <header>
        <div class="container">
            <div class="header-logo">
                <h1><a href="admin_top.php">管理画面TOP</a></h1>
            </div>

            <nav class="menu-right menu">
                <a href="admin_new/entry.php">新規登録</a>
                <a href="admin_logout.php">ログアウト</a>
            </nav>
        </div>
    </header>
    <main>
        <div class="wrapper">
            <div class="container">
                <div class="wrapper-title">
                    <h3>管理メニュー</h3>
                </div><br><br><br>
                <div class="boxs">
                    <a href="./admin_update/date_list.php" class="box">
                    <i class="fas fa-book icon"></i><!-- fontawesome利用部分 -->
                        <p>書籍情報の更新・削除</p>
                    </a>
                    <a href="./admin_register/admin_register.php" class="box">
                    <i class="fa-solid fa-file-pen icon"></i><!-- fontawesome利用部分 -->
                        <p>書籍情報の登録</p>
                    </a>
                    <a href="./admin_history/admin_history.php" class="box">
                    <i class="fa-solid fa-boxes-packing icon"></i><!-- fontawesome利用部分 -->
                        <p>注文履歴</p>
                    </a>
                    <a href="./admin_user/admin_user.php" class="box">
                    <i class="fa-solid fa-people-group icon"></i><!-- fontawesome利用部分 -->
                        <p>ユーザー登録情報</p>
                    </a>
                    <a href="./admin_contact/admin_contact.php" class="box">
                    <i class="fa-solid fa-fax icon"></i><!-- fontawesome利用部分 -->
                        <p>お問い合わせ対応</p>
                    </a>
                    <a href=".php" class="box">
                    <i class="fa-solid fa-hands-holding-child icon"></i><!-- fontawesome利用部分 -->
                        <p>ユーザーTOP</p>
                    </a>

                </div>
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