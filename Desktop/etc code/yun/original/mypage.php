<?php require 'header.php'; ?>
<?
if(empty($_SESSION['member'])){
	echo "<script>window.location.replace('main.php');</script>";
}
?>
<script>
function MoveCheck (){
    var result = confirm("脱退しますか？");
    if(result) {
        window.location.href = "member_delete.php";
    }
}

function boardDelete(val) {
	var result = confirm("本当に削除しますか？");

	if(result){ 
		window.location.href="board_delete.php?board_num="+val; 
	} 	
}	
	
function visiable(val1, val2) { 
	window.location.href="board_visiable.php?board_num="+val1+"&&visiable="+val2; 
}
</script>
<link rel="stylesheet" href="style.css">
<body>
<form action="member_modify.php" method="post">
	<div class="modify-form">
		<table class="modify-table">
			<tr><td colspan="2"><h3>会員情報</h3></td></tr>
			<tr>
				<td>ID</td>
				<td><?= $_SESSION['member']['id'] ?></td>
				<input type="hidden" value="<?= $_SESSION['member']['id'] ?>" name="id">
			</tr>
			<tr>
				<td>パスワード</td>
				<td><input type="password" name="password" value="<?= $_SESSION['member']['password'] ?>"></td>
			</tr>
			<tr>
				<td>パスワード確認</td>
				<td><input type="password" name="password_2"></td>
			</tr>

			<tr>
				<td>名前</td>
				<td><input type="text" name="name" value="<?= $_SESSION['member']['name'] ?>"></td>
			</tr>
			<tr>
				<td>メールアドレス</td>
				<td><input type="text" name="e_mail" value="<?= $_SESSION['member']['e_mail'] ?>"></td>
			</tr>
			<tr style="text-align:center;">
				<td colspan="2"><input type="submit" value="情報修正" class="modify-btn">
				<input type="button" value="脱退" onClick="MoveCheck();" class="modify-btn"></td>
			</tr>	
		</table>
	</div>
</form>

<section class="listC">
<?
	echo '<h1>書き込み</h1>';
	$pdo = new PDO('mysql:host=mysql543.db.sakura.ne.jp;dbname=game-mania_test;charset=utf8', 'game-mania', 'hayato0210');	
	$sql = $pdo->prepare('select * from Y_board where member_id=?');
	$sql->execute([$_SESSION['member']['id']]);


	echo '<div class="container">';
	foreach($sql->fetchAll() as $row){
		$board_num=$row['board_num'];
		$image_name=$row['image'];

		echo '<article>';
		echo '<form action="write_modify.php?board_num=', $board_num, '" method="post" name="board', $board_num, '">';
		echo '<div style="background-color: black; text-align:center; margin-top: 30px;">';
		echo '<input type="submit" value="修正" class="board-btn">';
?>
		<input type="button" value="削除" onclick="(function(){var board_num=<?=$board_num?>; boardDelete(board_num);})()" class="board-btn">
		
<?		if($row['visiable']==0){ ?>
	 		<input type='button' value='公開' onclick="(function(){var board_num=<?=$board_num?>; visiable(board_num, 1);})()" class='board-btn'>
<?		}else{?>
			<input type='button' value='非公開' onclick="(function(){var board_num=<?=$board_num?>; visiable(board_num, 0);})()" class='board-btn'>
<?		}
		echo '</div>';
		echo '<div class="image" style="background-image: url(', $image_name, ');" style="word-wrap: break-word;">';
		echo '<div class="content" style="width:100%; height:100%;"><p style=" word-break: break-all; word-wrap: break-word;">';
		echo nl2br($row[content]), '</p></div>';
		echo '<div class="img-cover"></div>';
		echo '<div class="time">';
		echo $row['datetime'];
		echo '</div>';
		echo $row['board_recommend'];
		echo '</div>';	
		echo '</form>';
		echo '<div class="comment-list', $board_num, '" id="comment">';
		include 'comment_list.php';
		echo '</div>';

	}
	
	if($row == 0){
		echo '<div>';
		echo '書き込みがございません。';
		echo '</div>';
	}
	echo '</article>';
	echo '</div>';
?>
</section>
<? include 'mycomment.php'; ?>

</body>
<?php require 'footer.php'; ?>