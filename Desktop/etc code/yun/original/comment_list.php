<?
if(empty($_SESSION['member'])){
	echo "<script>window.location.replace('main.php');</script>";
}
?>

<script>
	function commentDelete(val) {
		var result = confirm("本当に削除しますか？");
		if(result){ 
			window.location.href="comment_delete.php?comment_num="+val; 
		}
 	}		
</script>
<?
	$pdo = new PDO('mysql:host=mysql543.db.sakura.ne.jp;dbname=game-mania_test;charset=utf8', 'game-mania', 'hayato0210');	
	$sql = $pdo->prepare('select * from Y_comment where board_num=?');
	$sql->execute([$board_num]);

	foreach($sql->fetchAll() as $row){
		$comment_num=$row['comment_num'];
		echo '<div style="font-size: 0.9em; text-align:center; padding-left: 10px; padding-top: 5px; margin-bottom:5px;">', $row['comment_content'];
		
		if($row['member_id']==$_SESSION['member']['id']){ ?>
			<button onclick=commentDelete(<?=$comment_num;?>); class="comment-delete-btn">削除</button>
		<?	}
		echo '</div>';
		echo '<div style="font-size: 0.6em; text-align:right;">', $row['datetime'], '</div>';
		echo '<hr>';
	}

	echo '<form action="comment.php" method="post">';
	echo '<input type="text" name="comment_content" style="width:50%; height: 30px; margin-top: 10px;">';
	echo '<input type="hidden" name="board_num" value="', $row['board_num'], '">';
	echo '<input type="submit" value="COMMENT" class="comment-btn">';
	echo '</form>';

?>