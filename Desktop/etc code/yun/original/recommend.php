<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
<?
	session_start();
	$pdo = new PDO('mysql:host=mysql543.db.sakura.ne.jp;dbname=game-mania_test;charset=utf8', 'game-mania', 'hayato0210');	
	$sql = $pdo->prepare('select recommend_num, recommend_id from Y_boardRecommend where board_num=?');
	$rs=$sql->execute([$board_num]);
	$member_id=$_SESSION['member']['id'];
	$color='white';
	$i=0;

	if($rs>0){
		foreach($sql->fetchAll() as $row){
			if($row['recommend_id']==$member_id){
				$color='red';
			}
			$i++;
		}
	}
	

	echo '<div class="report-btn">';
	if($color=='white'){ ?>
		<button class="fa fa-heart" style="background-color: black; color:white; border:none;" onclick="location.href='recommend_output.php?board_num=<?=$board_num?>&&value=0'">
	<?}else{?>
		<button class="fa fa-heart" style="background-color: black; color:red; border:none;" onclick="location.href='recommend_output.php?board_num=<?=$board_num?>&&value=1'">
	<?}
	echo '<div style="color: white;">', $i, '</div>';
	echo '</div>';

?>
