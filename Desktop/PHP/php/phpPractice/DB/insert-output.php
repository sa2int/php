<?php require '../header.php';?>
<p>商品を追加します。</p>
<?php
include "dbase.php";

$sql=$pdo->prepare('insert into product values(null, ?, ?)');
if($sql->execute([$_REQUEST['name'], $_REQUEST['price']])){
  echo '追加に成功しました。';
} else{
  echo '追加に失敗しました。';
}
?>
<?php require '../footer.php';?>
