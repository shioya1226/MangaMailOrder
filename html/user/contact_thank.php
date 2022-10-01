<html lang="ja">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0">
    <title>お問い合わせ内容送信完了</title>
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
        <h1>お問い合わせ内容の送信が完了しました。</h1>
        <p>下のボタンよりトップページに移動してください。</p>
        <br><br>
        <a href="index.php"><button class="btn">トップページに移動する</button></a>
    </div>
</body>
</html