<?php require '../header.php';?>
<section class="listC">
<h1 class="sr-only">RECENT POSTS</h1>
	<div class="container">
<?php
include "../DB/dbase.php";

$server = "mysql543.db.sakura.ne.jp";
$mydb = "game-mania_test";
$usr = "game-mania";
$pass = "hayato0210";
//$query = "SELECT MAX(id) FROM `name`";
$link = mysql_connect($server, $usr, $pass);
$db = mysql_select_db($mydb, $link);
mysql_query('SET NAMES utf8', $link);

$_page=$_GET[_page];

$view_total = 10; //한 페이지에 3개 게시글이 보인다.
if(!$_page)($_page=1); //페이지 번호가 지정이 안되었을 경우
$page= ($_page-1)*$view_total;

$query="select count(*) from olympicBoards";
mysql_query("set names utf8");  //언어셋 utf8
$result= mysql_query($query, $link);
$temp= mysql_fetch_array($result);
$totals= $temp[0];

//select product
foreach ($pdo->query("select b_boardNum, id, b_subject, b_contents, password, file01 from olympicBoards o, member m, board_type t where m.mem_num = o.mem_num and o.t_num = t.t_num order by b_boardNum DESC LIMIT $_page, $view_total") as $row) {
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

	}
 ?>

	</div><!--container-->
</section><!--list-a section-->
<?php include "listPage.php"; ?>
<!--php paging source-->
<!-- $pages = $total / $pageNumber;

for($i=0; $i<=$pages; $i++){
	$pageJump = $pageNumber * $i;
echo "<a href=$PHP_SELF?start=$pageJump>[$i]</a>";
}

mysql_close($link); -->



<?php require '../footer.php';?>
