<?php require '../header.php';?>
<section class="listC">
<h1 class="sr-only">RECENT POSTS</h1>
	<div class="container">
<?php
include "../DB/dbase.php";
//select product
foreach ($pdo->query('select b_boardNum, id, b_subject, b_contents, password, file01 from olympicsBoard o, member m where o.mem_num = m.mem_num order by b_boardNum DESC') as $row) {
			$b_boardNum=$row['b_boardNum'];
	echo '<article>';
	echo '<a href="/test/paku/pyeongchang2018/board/detail_board.php?b_boardNum=', $b_boardNum, '">';
echo '<div class="photo" style="background-image:url(/test/paku/pyeongchang2018/upload/',$row['file01'],');">';
			echo '</div>';
			echo '<div class="text">';
			echo '<h2>', $row['b_subject'] ,'</h2>';
			echo '<p>', $row['b_contents'],'</p>';
			echo '</div>';
	echo '</a>';
	echo '</article>';
	}
 ?>

	</div><!--container-->
</section><!--list-a section-->













<?php require '../footer.php';?>
