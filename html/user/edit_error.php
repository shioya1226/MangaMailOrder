<?php foreach($message as $key): ?>
<p><?= $key; ?></p>
<?php endforeach; ?>

<form action="logineditonfirmation.php" method="post">
<h2>お客様情報変更</h2>
<label>名前：<input type="text" name="name" value="<?=$row['name'];?>"></label><br>
<label>郵便番号：<input type="text" name="post" value="<?=$row['post'];?>" pattern="\d{3}-?\d{4}"></label><br>
<label>所在地(都道府県):<select name="prefecture">
<option value="<?= $row['prefecture']; ?>" selected><?= $row['prefecture']; ?></option>
                                        <option value="北海道">北海道</option>
                                        <option value="青森県">青森県</option>
                                        <option value="岩手県">岩手県</option>
                                        <option value="宮城県">宮城県</option>
                                        <option value="秋田県">秋田県</option>
                                        <option value="山形県">山形県</option>
                                        <option value="福島県">福島県</option>
                                        <option value="茨城県">茨城県</option>
                                        <option value="栃木県">栃木県</option>
                                        <option value="群馬県">群馬県</option>
                                        <option value="埼玉県">埼玉県</option>
                                        <option value="千葉県">千葉県</option>
                                        <option value="東京都">東京都</option>
                                        <option value="神奈川県">神奈川県</option>
                                        <option value="新潟県">新潟県</option>
                                        <option value="富山県">富山県</option>
                                        <option value="石川県">石川県</option>
                                        <option value="福井県">福井県</option>
                                        <option value="山梨県">山梨県</option>
                                        <option value="長野県">長野県</option>
                                        <option value="岐阜県">岐阜県</option>
                                        <option value="静岡県">静岡県</option>
                                        <option value="愛知県">愛知県</option>
                                        <option value="三重県">三重県</option>
                                        <option value="滋賀県">滋賀県</option>
                                        <option value="京都府">京都府</option>
                                        <option value="大阪府">大阪府</option>
                                        <option value="兵庫県">兵庫県</option>
                                        <option value="奈良県">奈良県</option>
                                        <option value="和歌山県">和歌山県</option>
                                        <option value="鳥取県">鳥取県</option>
                                        <option value="島根県">島根県</option>
                                        <option value="岡山県">岡山県</option>
                                        <option value="広島県">広島県</option>
                                        <option value="山口県">山口県</option>
                                        <option value="徳島県">徳島県</option>
                                        <option value="香川県">香川県</option>
                                        <option value="愛媛県">愛媛県</option>
                                        <option value="高知県">高知県</option>
                                        <option value="福岡県">福岡県</option>
                                        <option value="佐賀県">佐賀県</option>
                                        <option value="長崎県">長崎県</option>
                                        <option value="熊本県">熊本県</option>
                                        <option value="大分県">大分県</option>
                                        <option value="宮崎県">宮崎県</option>
                                        <option value="鹿児島県">鹿児島県</option>
                                        <option value="沖縄県">沖縄県</option>
                                        </select>
</label><br>
<label>所在地(市区町村) <input type="text" name="city" value="<?=$row['city'];?>">
</label><br>
<label>電話：<input type="text" name="phone" value="<?=$row['phone'];?>" pattern="/^0[0-9]{9,10}\z/"></label><br>
<label>メールアドレス：<input type="mail" name="mail" value="<?=$row['mail']; ?>"></label><br>

<label>ユーザーID :<input type="text" name="login_id" value="<?=$row['login_id'];?>" pattern="/\A(?=.*?[a-z])(?=.*?\d)[a-z\d]{6,}+\z/i"></label>
<p>&lt;6文字以上・半角英数字&gt;数字だけにすることはできません</p>
<label>パスワード: <input type="password" name="pass" value="<?=$row['pass'];?>" pattern="/\A(?=.*?[a-z])(?=.*?\d)[a-z\d]{4,16}+\z/i"></label>
<p>&lt;6文字以上16文字以内・半角英数字&gt;数字だけにすることはできません</p>
<p><input type="button" onclick="history.back()" value="キャンセル" ><input type="submit" value="確認画面に進む"></p>
</form>




