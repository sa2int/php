<link rel="stylesheet" href="style.css">
<?
	$pdo = new PDO('mysql:host=mysql543.db.sakura.ne.jp;dbname=game-mania_test;charset=utf8', 'game-mania', 'hayato0210');		
	$sql=$pdo->prepare('select * from Y_board where board_num=?');
	$sql->execute([$_REQUEST['board_num']]);
	foreach($sql->fetchAll() as $row){
		$content=$row['content'];
		$board_num=$row['board_num'];
		echo '<input type="hidden" value="', $content, '" name="content">';
	}

?>
<form action="report_output.php" method="post">
<div style="margin: 30px; text-align: left;">
<input type="hidden" value=<?=$board_num?> name="board_num">
	<h2>申告する</h2>
	<table class="report-table">
		<tr>
			<td>内容 :  <?=$content?><input type="hidden" value="<?=$content?>" name="content"></td>
		</tr>
		<tr>
			<td>理由: 
				<select name="reportMenu">
					<option value="0">不適切な広告</option>
					<option value="1">全年齢に合わない内容</option>
					<option value="2">その他</option>
				</select>
			</td>
		</tr>
		<tr>
			<td><textarea name="reportContent" rows="10" cols="60%">詳しい内容を書いてください。</textarea></td>
		</tr>
		<tr>
			<td><input type="submit" value="送る" class="report-btn">
			<input type="button" value="キャンセル" onclick="self.close(); window.close();"  class="report-btn"></td>
		</tr>
	</table>
</div>
</form>