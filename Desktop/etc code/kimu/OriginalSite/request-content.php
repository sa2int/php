<?php require 'header.php'; ?>

<?php
$pdo=new PDO('mysql:host=mysql543.db.sakura.ne.jp;dbname=game-mania_test;charset=utf8', 'game-mania', 'hayato0210');

$content=$pdo->prepare('Select * from requestboard where id=?');
$content->execute([$_GET['id']]);

foreach($content->fetchAll() as $row) {}

$hit=$pdo->prepare('Update requestboard Set hit=hit+1 Where id=?');
$hit->execute([$_GET['id']])

?>

<div class="writeboard">
<form action="request-sendmail.php?id=<?=$_GET['id']?>" method="post"><!-- パラメーターを区分する為にPost方式を使います-->
<div class="titles">
	<div>
	<label>名題</label>
	<label><? echo $row['title']; ?></label>
	</div>
	<div>
	<label>閲覧</label>
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
	<label>メール</label>
	<? echo $row['mail']; ?>
	<label>　地域</label>
	<? echo $row['location']; ?>
</div>
<div class="datetime">
	<label>予約日程</label>
	<? echo $row['requestdate']; ?>
	<label>　/　</label>
	<? echo $row['requesttime']; ?>
</div>
<div class="details">
	<label style="vertical-align:top;">詳細</label>
	<p style="word-break: break-all;"><? echo $row['contents']; ?><p><!-- 자동 줄바꿈 word-break-->
</div>

<div class=requestbutton>
	<input type="button" data-toggle="modal" data-target="#reason" value="拒否"></input><!-- キャンセル する場合、もだるを浮けて理由を入る、そのあとお客様にメールを送る -->
	<input type="submit" value="受け付け"></input>
</div>
</form>
</div>

<!-- キャンセル Modal Start -->
<div class="modal fade" id="reason" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="LoginLabel">拒絶理由</h4>
      </div>
      <div class="modal-body">
	<form name="cancelreason" action="request-cancel.php?id=<?=$_GET['id']?>" onsubmit="return reasoncheck()" method="post">
			<div class="form-group">
				<label for="recipient-name" class="control-label">理由:</label>
				<input name="reason" type="text" class="form-control" id="id"></input>
			</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">キャンセル</button>
        <button type="submit" class="btn btn-primary">決定</button>
      </div>
	</form>
    </div>
  </div>
</div>
<!-- キャンセル Modal End -->

<?php require 'footer.php'; ?>