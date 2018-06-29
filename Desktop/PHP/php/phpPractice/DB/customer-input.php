<?php session_start() ?>
<?php require '../header.php'; ?>
<?php require 'menu.php'; ?>
<?php
$name=$address=$login=$password='';
if(isset($_SESSION['customer'])){ //cunstomerに定義されているのか確認すること
  $name=$_SESSION['customer']['name'];  //定義されていたら変数に代入する。
  $address=$_SESSION['customer']['address'];//代した入変数は以下に使います。
  $login=$_SESSION['customer']['login'];
  $password=$_SESSION['customer']['password'];//when $_SESSION['customer'] is value,it is substituted to variable 
}

echo '<form action="customer-output.php" method="post">';
echo '<table>';
echo '<tr><td>お名前</td><td>';
echo '<input type="text" name="name" value="', $name, '">';   //代入します。
echo '</td></tr>';

echo '<tr><td>ご住所</td><td>';
echo '<input type="text" name="address" value="', $address, '">';
echo '</td></tr>';

echo '<tr><td>ログイン名</td><td>';
echo '<input type="text" name="login" value="', $login, '">';
echo '</td></tr>';

echo '<tr><td>パスワード</td><td>';
echo '<input type="password" name="password" value="', $password, '">';
echo '</td></tr>';

echo '</table>';
echo '<input type="submit" value="確定">';
echo '</form>';
 ?>
<?php require '../footer.php'; ?>
