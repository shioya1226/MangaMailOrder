<?php
$dsn = "mysql:host=localhost;dbname=manga;charset=utf8";
$user = "root";
$password = "";
try{

$db = new PDO($dsn, $user, $password);
$db ->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

$stmt = $db->prepare("SELECT * FROM books
  WHERE title LIKE '%暁のヨナ'");
$stmt->execute();

}catch (PDOException $e){
	exit('エラー：' . $e->getMessage());
}

?>
    <div class = osititle>
    <div class="category-title">
            <p>スタッフオススメ！今週の推し漫画！</p>
    </div>
        <div class="osusume">

        <?php
				while($row = $stmt->fetch()) {
                    $row2 = $row['isbn'];
					echo '<p><strong>『<a href= "search.php?code='
                    .$row['isbn'].'">','暁のヨナ','</a>』</strong> 草凪みずほ</p>';
					echo '<a href= "search.php?code='
                    .$row['isbn'].'">','<img src="img/',$row['img'],'"></a>';
                    
				  }
        ?>
        </div>
    <div class = ositext>
        <p>漫画は好きだが、少女漫画をあまり読まない人にもおすすめ。壮大なファンタジー少女漫画。</p>
        <p>王国の王の一人娘であるヨナは、想い人である従兄に裏切られ、16歳の誕生日に悲惨な事件が起き、過酷な運命を背負っていきながら物語は始まっていきます。</p><p>１０年以上続いているこの作品は女性漫画であるものの、胸が熱くなるような仲間たちとの冒険やバトルシーンが繰り広げられており、男性でも興味を引く部分が多い少女漫画となっています。</p>
        <p>この作品の注目ポイントは主人公であり、ヒロインでもあるヨナが、仲間に守られるのではなく、弱い自分を嫌い、仲間を守っていくために強くなっていくという部分です。　過去に何も守る事の出来なかった経験が彼女のその思いを作っていると考えると、芯の強い、可愛さだけでなくかっこ良さも兼ね備えた憧れる部分の多い主人公。そして仲間でありヨナの幼馴染であるハクがそんな彼女を見守り、互いに支えあっている関係性にも注目です。</p>
        <p>現在３８巻まで刊行されております。</p>
        <div class=osisyousai>
            <a href="search.php?code=978-4-592-19081-3">本の詳細</a>
        </div>
    <div class=clear></div>


