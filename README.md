# :exclamation:MangaMailiOrder
 MangaMailiOrderとは、漫画の通販Webアプリケーションです。APIの実装、パスワードハッシュ化等のセキュリティ対策、例外処理など、バックエンドの技術を重視して作成しました。

<br />

## :thought_balloon: 環境構築

今までXAMPPを使用してプログラムを書いていましたが、現在ではDockerを用いた開発が主流になっているようなので、Gitの使い方を学び、VScodeとGithubを連携、Dockerでの構築方法を独学で思考錯誤しながら環境構築しました。

<br />

## :open_file_folder:アプリ画面

|TOP|
|---|---|
|![Image from Gyazo](https://user-images.githubusercontent.com/113000259/193582306-7f2594fb-a2d6-4468-9790-cebf2ef44970.png)|
|---|---|
|![Image from Gyazo](https://user-images.githubusercontent.com/113000259/193584112-5f5bd9dc-54ab-47ab-bd91-3dbe183e0f92.png)|

|会員登録|
|---|---|
|![Image from Gyazo](https://user-images.githubusercontent.com/113000259/193582710-56b85fc1-7da5-4313-b830-3e3e99fb77f2.png)|

|マイページ|
|---|---|
|![Image from Gyazo](https://user-images.githubusercontent.com/113000259/193583546-4d986541-00cd-4d81-b188-8726c895a295.png)|

|管理画面|
|---|---|
|![Image from Gyazo](https://user-images.githubusercontent.com/113000259/193583664-00bbb5dc-d5e4-4794-8246-6e6348572b16.png)|

<br />

## :green_book:機能一覧

### ユーザー機能
- ユーザー登録（顧客・管理者ログイン）
- ゲストログイン（閲覧用ログイン）
- 書籍を閲覧、カートに入れる、購入
- お問い合わせフォーム
- マイページにて以下の操作
  - カート状況
  - 購入履歴
  - 登録情報表示、編集

### 管理機能
- 管理者ページでのユーザー、書籍情報の編集・追加・削除
- ユーザー、書籍、在庫、購入履歴等の一覧表示
- お問い合わせ内容の確認

<br />

## :notebook:使用技術
### フロントエンド
- HTML / CSS 

### バックエンド
- PHP 7.4

### データベース
- Mysql 5.7  

### 開発環境
- Docker 20.10.2
- docker-compose 1.27.4

<br />

## :closed_book:ER図
![Image from Gyazo]()

<br />

## :bulb:今後の課題
- AWSにデプロイする
- お気に入り機能の導入
- テストコードの導入
- Laravelでコードを書く
- Githubでの開発に慣れる
