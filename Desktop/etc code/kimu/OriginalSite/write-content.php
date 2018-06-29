<?php require 'header.php'; ?>

<?php
$id = $_GET['id'];

$pdo=new PDO('mysql:host=mysql543.db.sakura.ne.jp;dbname=game-mania_test;charset=utf8', 'game-mania', 'hayato0210');

$content=$pdo->prepare('Select * from kimuboard where id=?');
$content->execute([$_GET['id']]);
foreach($content->fetchAll() as $row) {}

$hit=$pdo->prepare('Update kimuboard Set hit=hit+1 Where id=?');
$hit->execute([$_GET['id']])
?>

<div class="writeboard">
<form id="contents" name="contents" action="updateanddelete.php?id=<?=$id?>" method="post">
<div class="titles">
	<div>
	<label>名題</label>
	<label><? echo $row['title']; ?></label>
	</div>
	<div>
	<label>視聴</label>
	<label><? echo $row['hit']+1; ?></label>
	</div>
</div>
<div class="information">
	<label>名前</label>
	<? echo $row['name']; ?>
	<label>　性別</label>
	<? echo $row['sex']; ?>
	<label>　時間</label>
	<? echo $row['now']; ?>
</div>
<div class="contents">
	<!-- <ul style="list-style: none;">-->
	<label>内容</label>
	<? echo $row['subject']; ?>
</div>
<div class="details">
	<label style="vertical-align:top;">詳細</label>
	<p style="word-break: break-all;"><? echo $row['contents']; ?><p><!-- 자동 줄바꿈 word-break-->
</div>
<div class="button">
	<input type="hidden" name="result" id="result"></input><!-- 実際にサブミットで行く値 部分 -->
	<input type="button" onclick="checksubmit(1)" value="削除"></input>
	<input type="button" onclick="checksubmit(2)" value="修正"></input>
</div>
</form>
</div>

<?php require 'footer.php'; ?>