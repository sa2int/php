<?php require 'header.php'; ?>
<?php

$id=$_GET['id'];

$pdo=new PDO('mysql:host=mysql543.db.sakura.ne.jp;dbname=game-mania_test;charset=utf8', 'game-mania', 'hayato0210');

if($_REQUEST['result']=="delete") { 
$delete=$pdo->prepare('delete from kimuboard where id=?');
$delete->execute([$_GET['id']]);
echo("<script>location.href='writetable.php';</script>"); 
} else if($_REQUEST['result']=="update") { 

$content=$pdo->prepare('Select * from kimuboard where id=?');
$content->execute([$_GET['id']]);
foreach($content->fetchAll() as $row) {}
$contents = str_replace("<br>","\n",$row['contents']);

/* class コンストラクタ練習
class Select{
//インスタンスを生成する時やる作業
//JavaではClassの名前と同じに作って使用しますが、PHPでは__constructと使う
//ちなみに、PHPにはオバーローディ機能もないので同じ名前のメソードを複数作ってパラメタを変わって使うこともできない。
function __construct($name) { echo $name; } }
$a = new Select($row['name']); */

?>

<form action="update-input.php?id=<?=$id?>" method="post">
<div class="writeboard">
<div class="title">
	<label>名題</label>
	<input type="text" name="title" maxlength="30" style="width:100%;" value="<?=$row['title']?>"></input>
</div>
<div class="information">
	<label>名前</label>
	<input type="text" name="name" maxlength="10" value="<?=$row['name']?>"></input>
	<label>　性別</label>
	<select id="sex" name="sex" style="font-size:20px;"><!-- $("sex") -->
		<option value="男" <? if($row['sex'] == "男") { ?>selected<? } ?> >男</option>
		<option value="女" <? if($row['sex'] == "女") { ?>selected<? } ?> >女</option>
	</select>
</div>
<div class="contents">
	<!-- <ul style="list-style: none;">-->
	<label>内容</label>
	<ul><!-- 同じ名前を設定することしよってボターン一体できる -->
		<li><input type="radio" id="idA" name="chk_info" value="情報一つ" <? if($row['subject'] == "情報一つ") { ?>checked<? } ?> ><label for="idA">　情報一つ</input></li>
		<li><input type="radio" id="idB" name="chk_info" value="情報二つ" <? if($row['subject'] == "情報二つ") { ?>checked<? } ?> ><label for="idB">　情報二つ</input></li>
		<li><input type="radio" id="idC" name="chk_info" value="情報三つ" <? if($row['subject'] == "情報三つ") { ?>checked<? } ?> ><label for="idC">　情報三つ</input></li>
		<li><input type="radio" id="idD" name="chk_info" value="情報四つ" <? if($row['subject'] == "情報四つ") { ?>checked<? } ?> ><label for="idD">　情報四つ</input></li>
	</ul>
</div>
<div class="details">
	<label style="vertical-align:top;">詳細</label>
	<textarea id="contents" name="contents" style="width:100%; height:300px;"><? echo $contents; ?></textarea>
</div>
<div class="button">
	<input type="button" onclick="javascript:history.back()" value="キャンセル" style="font-size:20px;"></input>
	<input type="submit" onclick="linecheck()" style="font-size:20px;"></input>
</div>
</div>
</form>

<? } ?>

<?php require 'footer.php'; ?>