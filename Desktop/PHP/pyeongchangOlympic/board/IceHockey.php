<?php require '../header.php' ?>
<?php include "../DB/dbase.php"; ?>
<section class="listC">
<h1 class="sr-only">RECENT POSTS</h1>
	<div class="container">
<?php
//select product
foreach ($pdo->query('select b_boardNum, m.name, o.b_subject, o.b_contents, o.file01, o.b_date, t.t_num from olympicBoards o, member m, board_type t where m.mem_num = o.mem_num and o.t_num = t.t_num and o.t_num = 4') as $row) {
			$b_boardNum=$row['b_boardNum'];
			echo '<article>';
			// echo '<div>', $row['b_boardNum'],'</div>';
			echo '<a href="/test/paku/pyeongchangOlympic/board/detail_board.php?b_boardNum=', $b_boardNum, '">';
			echo '<div class="photo" style="background-image:url(/test/paku/pyeongchangOlympic/upload/',$row['file01'],');">';
			echo '</div>';
			echo '<div class="text">';
			echo '<h2>', $row['b_subject'] ,'</h2>';
			echo '<p>', $row['b_contents'],'</p>';
			echo '</div>';
			echo '</a>';
			echo '</article>';
			echo '<input type="hidden" value="', $row['b_boardNum'],'">';
	}
 ?>

	</div><!--container-->
</section><!--list-a section-->


<?php require '../footer.php' ?>
