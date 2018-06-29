<?php
$pdo=new PDO('mysql:host=mysql543.db.sakura.ne.jp;dbname=game-mania_test;charset=utf8', 'game-mania', 'hayato0210');
//$sql=$pdo->prepare('desc Y_board');
$sql=$pdo->prepare('select * from Y_board');
//$sql=$pdo->prepare('alter table Y_board alter column board_recommend set default 0');
//$sql=$pdo->prepare('alter table Y_comment add datetime DATETIME');
//$sql=$pdo->prepare('insert into Y_boardRecommend (board_num, recommend_id) values(17, "aaa")');
//$sql=$pdo->prepare('alter table Y_board drop board_recommend');
//$sql=$pdo->prepare('delete from Y_boardRecommend');
//$sql=$pdo->prepare('ALTER TABLE Y_board ADD FOREIGN KEY (board_recommend) REFERENCES Y_boardRecommend(recommend_count)');
//$sql=$pdo->prepare('select b.board_num, b.content, image, c.comment_content from Y_board b, Y_comment c, Y_member m where b.board_num = c.board_num and m.id = c.member_id and c.member_id = "bbb" group by b.board_num');
//$sql=$pdo->prepare('select * from Y_boardRecommend where board_num=17');
$sql=$pdo->prepare('delete from Y_board');

if($sql->execute()) {
	echo '検索成功';
	echo "<br/>\n";
	foreach($sql->fetchAll() as $row) {
		print_r($row);
		echo "<br/>\n";
	}
} else {
	echo '検索失敗';

	$pdo->setAttribute( PDO::ATTR_ERRMODE,  PDO::ERRMODE_EXCEPTION );
}
?>
