<?php require "header.php" ?>
<?php include "DB/dbase.php"; ?>

<?php session_start(); ?>

<section class="sectionA">
<div class="container">
<div class="mainImg">
	<?php
	foreach ($pdo->query('select b_boardNum, file01  from olympicsBoard o, member m where o.mem_num = m.mem_num order by b_boardNum DESC LIMIT 1') as $row) {
				$b_boardNum=$row['b_boardNum'];
				echo '<a href="/test/paku/pyeongchang2018/board/detail_board.php?b_boardNum=', $b_boardNum, '">';
	 echo '<img class="mainImg" src="/test/paku/pyeongchang2018/upload/',$row['file01'],'">';
	 echo '</a>';
 }
 ?>
</div>

<div class="subInfo">
	<h4>2018平昌冬季パラリンピック大会まで残り</h4>
	<hr class="hrMiddle" >
<div id="newcountdown" ></div>
	<ul class="text" >
		<li><h5>観客の為のすべての情報がここに　2018平昌観戦ガイド</h5><p><a href="#">観戦ガイド</a></p></li>
		<hr class="hrMiddle" >
		<?php
		foreach ($pdo->query('select b_boardNum, file01, b_subject, b_contents  from olympicsBoard o, member m where o.mem_num = m.mem_num order by rand() DESC LIMIT 2') as $row) {
					$b_boardNum=$row['b_boardNum'];
		echo '<li><h5>', $row['b_subject'],'</h5><p><a href="#">', $row['b_contents'],'</a></p></li>';
		}
			?>
	</ul>
</div>
</div>
</section>



<section class="sectionB">
  <div class="container">
		<div class="bread">
			<ol>
				<li><a href="/test/paku/pyeongchang2018/board/select_olmpicsBoard.php">Top</a></li>
				<li><a href="#">Article</a></li>
			</ol>
		</div>
    <h2>NEWS</h2>
    <div class="container-small">
    <div class="leftImg">
      <?php
			foreach ($pdo->query('select b_boardNum, file01, b_subject, b_contents  from olympicsBoard o, member m where o.mem_num = m.mem_num order by b_boardNum DESC LIMIT 2, 3') as $row) {
						$b_boardNum=$row['b_boardNum'];
  echo '<article>';
  echo '<a href="/test/paku/pyeongchang2018/board/detail_board.php?b_boardNum=', $b_boardNum, '">';
  echo '<div>';
  echo '<img src="/test/paku/pyeongchang2018/upload/',$row['file01'],'">';
  echo '</div>';
  echo '<div class="text">';
  echo '<h4>', $row['b_subject'], '</h4>';
  echo '<p>', $row['b_contents'], '</p>';
  echo '</div>';
  echo '</a>';
  echo '</article>';
      }
?>


    </div>



    <div class="rightImg">
      <?php
			foreach ($pdo->query('select b_boardNum, file01, b_subject, b_contents  from olympicsBoard o, member m where o.mem_num = m.mem_num order by b_boardNum DESC LIMIT 5, 3') as $row) {
						$b_boardNum=$row['b_boardNum'];
  echo '<article>';
  echo '<a href="/test/paku/pyeongchang2018/board/detail_board.php?b_boardNum=', $b_boardNum, '">';
  echo '<div>';
  echo '<img src="/test/paku/pyeongchang2018/upload/',$row['file01'],'">';
  echo '</div>';
  echo '<div class="text">';
	echo '<h4>', $row['b_subject'], '</h4>';
	echo '<p>', $row['b_contents'], '</p>';
  echo '</div>';
  echo '</a>';
  echo '</article>';
      }
?>

  </div>
  </div>
</section>



<?php include "footer.php" ?>
