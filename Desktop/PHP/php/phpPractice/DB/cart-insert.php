<?php session_start() ?>
<?php require '../header.php'; ?>
<?php require 'menu.php'; ?>
<?php include "dbase.php" ?>

<?php
$id=$_REQUEST['id'];
if(!isset($_SESSION['product'])){
  $_SESSION['product']=[];//공백의 배열
}//세션에 값이 없으면 공백을 있으면 값을 추가하는것
$count=0;
if(isset($_SESSION['product'][$id])){
  $count=$_SESSION['product'][$id]['count'];
}
$_SESSION['product'][$id]=['name'=>$_REQUEST['name'], 'price'=>$_REQUEST['price'], 'count'=>$count+$_REQUEST['count']];
echo '<p>カートに商品を追加しました。';
echo '<hr>';
require 'cart.php';

 ?>

<?php require '../footer.php'; ?>
