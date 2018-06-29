<?php


$pdo=new PDO('mysql:host=mysql543.db.sakura.ne.jp;dbname=game-mania_test;charset=utf8', 'game-mania', 'hayato0210');
$sql=$pdo->prepare('Update kimuboard Set title=?, sex=?, name=?, subject=?, contents=? where id=?');

if($_REQUEST['title']=="" || $_REQUEST['name']=="" || $_REQUEST['chk_info']=="" || $_REQUEST['contents']=="") {
	echo "<script>alert('名題、名前、内容、詳細を入力してください。')</script>";
	echo "<script>history.back();</script>";
} else {
	if($sql->execute([$_REQUEST['title'], $_REQUEST['sex'], $_REQUEST['name'], $_REQUEST['chk_info'], $_REQUEST['contents'], $_GET['id']])) {
	echo("<script>location.href='writetable.php';</script>"); 
	} 
	else {
		echo '入力失敗';
		echo "\nPDO::errorinfo():\n";
		print_r($pdo->errorInfo());
	}
}

?>