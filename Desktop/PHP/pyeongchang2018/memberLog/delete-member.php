<?php require '../header.php';?>
<?php
include "../DB/dbase.php";
$sql=$pdo->prepare('delete from member where mem_num=?');
if($sql->execute([$_REQUEST['mem_num']])){
    echo '<script> alert("削除に成功しました。"); history.go(-1)</script>';
} else{
  echo '削除に失敗しました。';
}
?>
<?php require '../footer.php';?>
