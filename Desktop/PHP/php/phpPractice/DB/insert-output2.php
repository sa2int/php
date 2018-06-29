<?php require '../header.php';?>
<p>商品を追加します。</p>
<?php
include "dbase.php";

$sql=$pdo->prepare('insert into p_product values(null, ?, ?)');
  if(empty($_REQUEST['name'])){
    echo '商品名を入力してください。';
  }else
  if(!preg_match('/[0-9]+/', $_REQUEST['price'])){
    echo ' 商品価格を整数で入力してください。';
  } else
  if($sql->execute(
    [htmlspecialchars($_REQUEST['name']), $_REQUEST['price']]
)){
  echo '追加に成功しました。';
} else{
  echo '追加に失敗しました。';
}
?>
<?php require '../footer.php';?>
