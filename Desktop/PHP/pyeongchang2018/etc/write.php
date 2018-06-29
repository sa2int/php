<?
date_default_timezone_set('Asia/Seoul');
$id = $_POST['id'];
$content = $_POST['content'];

include "dbase.php";

$query = "insert into test_bbs (id,content) values('$id','$content')";

$pdo->query($query);

$bbsid = $pdo->insert_id;

//$path = $_SERVER['DOCUMENT_ROOT'].'/testBBS/';
$path = "/testBBS/";
$filename =  date("YmdHis").".jpg";
move_uploaded_file($_FILES['imageform']['tmp_name'], $filename);

$query = "insert into create-img (bbsNo,path,filename) values ($bbsid, '$path','$filename')";

$pdo->query($query);

?>

<table>
<tr>
	<td>전송아이디:</td>
	<td><?=$id;?></td>
</tr>
<tr>
	<td>전송내용:</td>
	<td><?=$content;?></td>
</tr>
<tr>
	<td>전송이미지</td>
	<td><img src="<?=$path.$filename;?>" /></td>
</tr>
</table>
<p><b>전송완료</b></p>
<p><a href='list.php'>목록가기</a></p>
