<?php require '../header.php';?>
<table>
	<tr><th>number</th><th>Identification</th><th>name</th><th>e-mail</th><th>password</th><th>password2</th><th>phone</th></tr>
<?php
include "../DB/dbase.php";
//select product
foreach ($pdo->query('select * from member;') as $row) {
		echo '<tr>';
		echo '<td>', $row['mem_num'], '</td>';
		echo '<td>', $row['id'], '</td>';
		echo '<td>', $row['name'], '</td>';
		echo '<td>', $row['email'], '</td>';
		echo '<td>', $row['password'], '</td>';
		echo '<td>', $row['password2'], '</td>';
		echo '<td>', $row['phone'], '</td>';
		echo '<td>';
		echo '<a href="../memberLog/delete-member.php?mem_num=', $row['mem_num'], '">削除</a>';
		echo '</td>';
		echo '</tr>';
		echo "\n";
}
?>
</table>
<table style="border:red 1px solid">
	<tr><th>b_board</th><th>b_subject</th><th>b_content</th><th>b_delete</th><th>file01</th><th>b_date</th><th>mem_num</th></tr>
<?php
include "../DB/dbase.php";
//select product
foreach ($pdo->query('select * from olympicsBoard  order by b_boardNum DESC LIMIT 3') as $row) {
		echo '<tr>';
		echo '<td>', $row['b_boardNum'], '</td>';
		echo '<td>', $row['b_subject'], '</td>';
		echo '<td>', $row['b_contents'], '</td>';
		echo '<td>', $row['b_delete'], '</td>';
		echo '<td>', $row['file01'], '></td>';
		echo '<td>', $row['b_date'], '</td>';
		echo '<td>', $row['mem_num'], '</td>';
		echo '<td>';
		echo '<a href="../board/delete-olmpicsBoard.php?b_boardNum=', $row['b_boardNum'], '">削除</a>';
		echo '</td>';
		echo '</tr>';
		echo "\n";
}
?>

<hr>
<table style="border:red 1px solid">
	<tr><th>b_board</th><th>id</th><th>b_subject</th></tr>
<?php
foreach ($pdo->query('select b_boardNum, id, b_subject from olympicsBoard o, member m where o.mem_num = m.mem_num order by b_boardNum DESC') as $row) {
		$b_boardNum=$row['b_boardNum'];
		echo '<tr>';
		echo '<td>', $row['b_boardNum'], '</td>';
		echo '<td>', $row['id'], '</td>';
		echo '<td>';
		echo '<a href="../board/detail-board.php?b_boardNum=', $b_boardNum, '">', $row['b_subject'], '</a>';
		// echo  $row['b_subject'];
		echo '</td>';
		echo '<td>';
		echo '<a href="../board/delete-olmpicsBoard.php?b_boardNum=', $row['b_boardNum'], '">削除</a>';
		echo '</td>';
		echo '</tr>';
		echo "\n";
}
?>
</table>



<section class="listC">
<h1 class="sr-only">RECENT POSTS</h1>
	<div class="container">
<?php
foreach ($pdo->query('select b_boardNum, id, b_subject, b_contents, password, file01 from olympicsBoard o, member m where o.mem_num = m.mem_num order by b_boardNum DESC') as $row) {
			$b_boardNum=$row['b_boardNum'];
	echo '<article>';
	echo '<a href="/test/paku/pyeongchang2018/board/detail-board.php?b_boardNum=', $b_boardNum, '">';
echo '<div class="photo" style="background-image:url(/test/paku/pyeongchang2018/upload/',$row['file01'],'); height:300px">';
			echo '</div>';
			echo '<div class="text">';
			echo '<h2>', $row['b_subject'] ,'</h2>';
			echo '<p>', $row['b_contents'],'</p>';
			echo '</div>';
	echo '</a>';
	echo '</article>';
	}
 ?>
			<!-- <article>
		<a href="#">
			<div class="photo" style="background-image:url(/test/paku/pyeongchang2018/imgBase/02.jpg);">
			</div>
			<div class="text">
				<h2>野菜の成長記録</h2>
		<p>野菜たちはすくすく成長しています。おもしろいので試しに記録を残してみます。</p>
			</div>
		</a>
		</article>

			<article>
		<a href="#">
			<div class="photo" style="background-image:url(/test/paku/pyeongchang2018/imgBase/03.jpg);">
			</div>
			<div class="text">
				<h2>野苺のおいしい食べ方</h2>
		<p>野苺をたくさんもらって困ってももう大丈夫。おいしく食べきることができます。</p>
			</div>
		</a>
		</article>

			<article>
		<a href="#">
			<div class="photo" style="background-image:url(/test/paku/pyeongchang2018/imgBase/04.jpg);">
			</div>
			<div class="text">
				<h2>音の響き方</h2>
		<p>音の響き方で物事の印象が変わる。そんなお話です。</p>
			</div>
		</a>
		</article>

			<article>
		<a href="#">
			<div class="photo" style="background-image:url(/test/paku/pyeongchang2018/imgBase/05.jpg);">
			</div>
			<div class="text">
				<h2>かわいい模様</h2>
		<p>あちこちで見かけるかわいい模様の秘密を探ってきました。</p>
			</div>
		</a>
		</article>

			<article>
		<a href="#">
			<div class="photo" style="background-image:url(/test/paku/pyeongchang2018/imgBase/06.jpg);">
			</div>
			<div class="text">
				<h2>砂糖と水分の甘い関係</h2>
		<p>水は生き物にとって欠かせないものです。そして、甘いものも。</p>
			</div>
		</a>
		</article>

			<article>
		<a href="#">
			<div class="photo" style="background-image:url(/test/paku/pyeongchang2018/imgBase/07.jpg);">
			</div>
			<div class="text">
				<h2>ライフログのはじめ方</h2>
		<p>日常の生活を記録し、データとして残していく「ライフログ」。</p>
			</div>
		</a>
		</article>

			<article>
		<a href="#">
			<div class="photo" style="background-image:url(/test/paku/pyeongchang2018/imgBase/08.jpg);">
			</div>
			<div class="text">
				<h2>管理はおまかせ</h2>
		<p>面倒な設定やデータ管理、アプリとの連携などは全部おまかせ。</p>
			</div>
		</a>
		</article>

			<article>
		<a href="#">
			<div class="photo" style="background-image:url(/test/paku/pyeongchang2018/imgBase/sub1.jpg);">
			</div>
			<div class="text">
				<h2>快適ロングステイ</h2>
		<p>快適に過ごすポイントを抑えておけばロングステイも問題なしです。</p>
			</div>
		</a>
		</article>

			<article>
		<a href="#">
			<div class="photo" style="background-image:url(/test/paku/pyeongchang2018/imgBase/sub2.jpg);">
			</div>
			<div class="text">
				<h2>空を飛んでみた</h2>
		<p>ちょっと空を飛んできました。眺めが良くて最高です。</p>
			</div>
		</a>
		</article>

			<article>
		<a href="#">
			<div class="photo" style="background-image:url(/test/paku/pyeongchang2018/imgBase/sub3.jpg);">
			</div>
			<div class="text">
				<h2>サラダの記録</h2>
		<p>世の中にはバリエーション豊かなサラダがたくさんあります。</p>
			</div>
		</a>
		</article>

			<article>
		<a href="#">
			<div class="photo" style="background-image:url(/test/paku/pyeongchang2018/imgBase/sub4.jpg);">
			</div>
			<div class="text">
				<h2>こまめな連絡が大事</h2>
		<p>何事もこまめな連絡が大事です。これはそんなお話です。</p>
			</div>
		</a>
		</article>

			<article>
		<a href="#">
			<div class="photo" style="background-image:url(/test/paku/pyeongchang2018/imgBase/sub5.jpg);">
			</div>
			<div class="text">
				<h2>こまめな連絡が大事</h2>
		<p>何事もこまめな連絡が大事です。これはそんなお話です。</p>
			</div>
		</a>
		</article>

			<article>
		<a href="#">
			<div class="photo" style="background-image:url(/test/paku/pyeongchang2018/imgBase/sub6.jpg);">
			</div>
			<div class="text">
				<h2>こまめな連絡が大事</h2>
		<p>何事もこまめな連絡が大事です。これはそんなお話です。</p>
			</div>
		</a>
		</article> -->


	</div><!--container-->
</section><!--list-a section-->













<?php require '../footer.php';?>
