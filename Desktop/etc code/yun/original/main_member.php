<?php require 'header.php';?>
<head>
<script src="https://code.jquery.com/jquery-2.2.3.min.js"></script>
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
<link rel="stylesheet" href="style.css">
<script>
	
	function toggle(val){
		$("#comment"+val).slideToggle();
	}

</script>
</head>
<section class="listC">
<?

echo '<h1>書き込み一覧</h1>';
if(!empty($_SESSION['member'])){
	$pdo = new PDO('mysql:host=mysql543.db.sakura.ne.jp;dbname=game-mania_test;charset=utf8', 'game-mania', 'hayato0210');		
	
	echo '<div class="container">';
	foreach($pdo->query('select * from Y_board where visiable=1 order by rand() limit 0, 5') as $row){
		$board_num=$row['board_num'];
		$recommend_id=$_SESSION['member']['id'];
		$image_name=$row['image'];
		$content=$row[content];
		$time=$row['datetime'];

		echo '<article>';
		include 'recommend.php'; ?>
		<div class="image" style="background-image: url(<?= $image_name ?>);" id="board', $board_num, '" onclick="(function(){var board_num=<?=$board_num?>; toggle(board_num);})()" >		<? echo '<div class="content"><p>';
		echo nl2br($content), '</p></div>';
		echo '<div class="img-cover"></div>';
		echo '<div class="time">'; ?>
		<a href=# onclick="javascript_:window.open('report.php?board_num=<?=$board_num?>','pop', 'width=700,height=500,top=50,left=50');">申告</a>
		<?echo $time;
		echo '</div>';
		echo '</div>';
		echo '</form>';
		echo '<span class="comment" style="width:100%;" id="comment', $board_num, '">';
		include 'comment_list.php';
		echo '</span>';	
	}

	if($row == 0){
		echo '<div>';
		echo '書き込みがございません。';
		echo '</div>';
	}

}else{
	 	echo "<script>window.location.replace('main.php');</script>";	
}

echo '</article>';
echo '</div>';

?>
</section>
<?php require 'footer.php';?>