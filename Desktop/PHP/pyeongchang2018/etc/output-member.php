<?php session_start() ?>
<?php require "../header.php"; ?>
<?php include "../DB/dbase.php"; ?>
<?php
if(isset($_SESSION['member'])){
  $id=$_SESSION['member']['id'];
  $sql=$pdo->prepare('select * from member where mem_num!=? and id=?');
  $sql->execute([$id, $_REQUEST['id']]);
}
else{
  $sql=$pdo->prepare('select * from member where mem_num=?');
  $sql->execute([$_REQUEST['id']]);
}

if(empty($sql->fetchAll())){//ログイン名が重複している他のユーザーはいないかどうか確認する。
  if (isset($_SESSION['member']))
  {//sessionデータの存在を確認
    $sql=$pdo->prepare('update member set password=?, password2=?, email=?, phone=? where mem_num=?');
    $sql->execute([$_REQUEST['id'], $_REQUEST['name'], $_REQUEST['email'], $_REQUEST['password'], $_REQUEST['password2'], $_REQUEST['phone'], $mem_num]);
      $_SESSION['member']=[//最新データに更新するために
      'mem_num'=>$mem_num, 'name'=>$_REQUEST['name'], 'password'=>$_REQUEST['password'], 'password2'=>$_REQUEST['password2'], 'email'=>$_REQUEST['email'] , 'phone'=>$_REQUEST['phone'] , 'id'=>$_REQUEST['id']];
      echo 'お客様情報を更新しました。';
  } else
  {  //存在ないならこち
    $sql=$pdo->prepare('insert into member values(null, ?, ?, ?, ?, ?, ?)');
    $sql->execute([
      $_REQUEST['id'], $_REQUEST['name'], $_REQUEST['email'], $_REQUEST['password'],$_REQUEST['password2'],$_REQUEST['phone']]);
    echo 'お客様情報を登録しました。';
  }
}else {
  echo 'ログイン名がすでに使用されていますので、変更してください。';
}
?>
<?php require '../footer.php'; ?>
