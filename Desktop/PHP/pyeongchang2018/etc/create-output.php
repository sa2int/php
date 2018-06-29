<?php require '../header.php';?>
<?php
include "dbase.php";
$sql=$pdo->prepare('create table product78');
if($sql->execute([$_REQUEST['name'], $_REQUEST['price']])){
  echo '追加に成功しました。';
} else{
  echo '追加に失敗しました。';
}
 ?>
<?php require '../footer.php';?>
