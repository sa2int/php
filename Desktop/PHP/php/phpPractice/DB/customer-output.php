<?php session_start() ?>
<?php require '../header.php'; ?>
<?php require 'menu.php'; ?>
<?php include "dbase.php"; ?>
<?php
if(isset($_SESSION['customer'])){
  $id=$_SESSION['customer']['id'];
  $sql=$pdo->prepare('select * from customer where id!=? and login=?');
  $sql->execute([$id, $_REQUEST['login']]);
}else{
  $sql=$pdo->prepare('select * from customer where login=?');
  $sql->execute([$_REQUEST['login']]);
}

if(empty($sql->fetchAll())){//ログイン名が重複している他のユーザーはいないかどうか確認する。
  if (isset($_SESSION['customer'])){//sessionデータの存在を確認
    $sql=$pdo->prepare('update customer set name=?, address=?, login=?, password=? where id=?');
    $sql->execute([$_REQUEST['name'], $_REQUEST['address'], $_REQUEST['login'], $_REQUEST['password'], $id]);
      $_SESSION['customer']=[//最新データに更新するために
      'id'=>$id, 'name'=>$_REQUEST['name'], 'address'=>$_REQUEST['address'], 'login'=>$_REQUEST['login'], 'password'=>$_REQUEST['password']];
      echo 'お客様情報を更新しました。';
  } else {  //存在ないならこち
    $sql=$pdo->prepare('insert into customer values(null, ?, ?, ?, ?)');
    $sql->execute([
      $_REQUEST['name'], $_REQUEST['address'], $_REQUEST['login'], $_REQUEST['password']]);
    echo 'お客様情報を登録しました。';
  }
}else {
  echo 'ログイン名がすでに使用されていますので、変更してください。';
}
?>
<?php require '../footer.php'; ?>
