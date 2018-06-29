<section class="listC">
<?
	echo '<h1>コメントを書いた書き込み</h1>';
	$pdo = new PDO('mysql:host=mysql543.db.sakura.ne.jp;dbname=game-mania_test;charset=utf8', 'game-mania', 'hayato0210');	
	$sql=$pdo->prepare('select b.board_num, b.content, image, c.comment_content from Y_board b, Y_comment c, Y_member m where b.visiable=1 and b.board_num = c.board_num and m.id = c.member_id and c.member_id = ? group by b.board_num');	
	$sql->execute([$_SESSION['member']['id']]);

	$i=0;
	echo '<div class="container">';
	foreach($sql->fetchAll() as $row){
		$i++;
		$board_num=$row['board_num'];
		$image_name=$row['image'];
		echo '<article>';
		echo '<form action="write_modify.php?board_num=', $board_num, '" method="post" name="board', $i, '">';
		echo '<input type="hidden" value="', $board_num, '" name="board_num">';
		echo '<div style="background-color: black; text-align:center; margin-top: 30px;">';
		echo '</div>';
		echo '<div class="image" style="background-image: url(', $image_name, ');">';
		echo '<div class="content"><p>';
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