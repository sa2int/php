<?php require 'header.php'; ?>

<?php

$pdo=new PDO('mysql:host=mysql543.db.sakura.ne.jp;dbname=game-mania_test;charset=utf8', 'game-mania', 'hayato0210');
$pdo->setAttribute( PDO::ATTR_EMULATE_PREPARES, false );//prepare数字制限解除

/* ページ設定 */
$data=$pdo->prepare('Select id from kimuboard');
$data->execute([]);
$num = $data->rowCount();//데이터(글) 수

$page = ($_GET['page'])?$_GET['page']:1;//現在page값을 불러오는 삼항연산자.($_GET['page']값이 있으면 그대로, 없다면 1로 지정)
$list = 5;//一ページで見るデータの数
$block = 3;//Blockページの数

//ceil함수를 통해 결과를 올림처리
$pageNum = ceil($num/$list); //총 페이지数
$blockNum = ceil($pageNum/$block); //총 블록 -> 블록별로 나타나는 페이지 숫자 변경을 위함(화살표 누르면 이동하는거)
$nowblock = ceil($page/$block);

$s_page = ($nowblock * $block) -2;
if ($s_page <= 1) {
	$s_page = 1;
}

$e_page = $s_page+2;
if($pageNum <= $e_page) {//마지막 페이지 번호가 총 페이지 수보다 작을경우 이하로 잡음
	$e_page = $pageNum;
}

$start = ($page-1) * $list;//データの番号
$sql=$pdo->prepare('Select * from kimuboard order by id DESC LIMIT ?, 5');//LIMIT[시작번호][가져올 갯수]
if(!$sql->execute([$start])) {
	echo 'データを呼ぶときにエラーが発生しました。';
}

?>

<!-- 自習 -->
<div class="writetable">
<div class="title">
	<center><h1>掲示板</h1></center><!-- このように整列する事もできます。 -->
</div>
<table class="table table-hover">
	<thead>
	<tr class="info">
		<th>番号</th><!-- tableHead -->
		<th>名前</th>
		<th>性別</th>
		<th>作成者</th>
		<th>時間</th>
		<th>ヒット</th>
	</tr>
	</thead>
	<? foreach($sql->fetchAll() as $datas) { ?>
	<tbody>
	<tr>
		<td><? $id=$datas['id']; echo $datas['id']; ?></td><!-- tableData -->
		<td><a href="write-content.php?id=<?=$id?>"><? echo $datas['title']; ?></a></td>
		<td><? echo $datas['sex']; ?></td>
		<td><? echo $datas['name']; ?></td>
		<td><? echo $datas['now']; ?></td>
		<td><? echo $datas['hit']; ?></td>
	</tr>
	</tbody>
	<? } ?>
</table>

<nav>
  <ul class="pagination">
<? if($page==1) { ?> 
    <li class="disabled">
	  <a href="<?$PAGE_SELP?>?page=1" aria-label="Previous"><!-- ブロック移動 -->
        <span aria-hidden="true">&laquo;</span>
      </a>
	</li>
<? } else { ?>
    <li>
      <a href="<?$PAGE_SELP?>?page=<?=$s_page-1?>" aria-label="Previous">
        <span aria-hidden="true">&laquo;</span>
      </a>
	</li>
<? } for($p=$s_page; $p<=$e_page; $p++) { ?>
   
	<? if($page==$p) { ?>
<li class="active"><a href="<?$PAGE_SELP?>?page=<?=$p?>"><?=$p?><span class="sr-only">(current)</span></a></li>
	<? } else { ?>
    <li><a href="<?$PAGE_SELP?>?page=<?=$p?>"><?=$p?></a></li>
<? }} if($page==$pageNum) {?>
    <li class="disabled">
	  <a href="<?$PAGE_SELP?>?page=<?=$e_page?>" aria-label="Next"><!-- ブロック移動 -->
        <span aria-hidden="true">&raquo;</span>
      </a>
    </li>
<? } else if($nowblock==$blockNum) { ?>
	<li>
	  <a href="<?$PAGE_SELP?>?page=<?=$e_page?>" aria-label="Next">
        <span aria-hidden="true">&raquo;</span>
      </a>
    </li>
<? } else { ?>
	<li>
	  <a href="<?$PAGE_SELP?>?page=<?=$e_page+1?>" aria-label="Next">
        <span aria-hidden="true">&raquo;</span>
      </a>
    </li>
<? } ?>
  </ul>
</nav>

<div class="write">
	<button type="button" onclick="location.href='write.php'">文を書く</button>
</div>
</div>
<!-- 自習 -->


<?php require 'footer.php'; ?>