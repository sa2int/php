<?php session_start() ?>
<?php require '../header3.php'; ?>
<?php
$name=$address=$login=$password='';
if(isset($_SESSION['member'])){ //cunstomerに定義されているのか確認すること
  $id=$_SESSION['member']['id'];  //定義されていたら変数に代入する。
  $name=$_SESSION['member']['name'];//代した入変数は以下に使います。
  $email=$_SESSION['member']['email'];
  $password=$_SESSION['member']['password'];//when $_SESSION['customer'] is value,it is substituted to variable
  $password=$_SESSION['member']['password2'];
  $phone=$_SESSION['member']['phone'];
}

echo '<form action="output-member.php" method="post">';
echo '<table>';
echo '<tr><td>ID</td><td>';
echo '<input type="text" name="name" value="', $id, '">';   //代入します。
echo '</td></tr>';

echo '<tr><td>名前</td><td>';
echo '<input type="text" name="address" value="', $name, '">';
echo '</td></tr>';

echo '<tr><td>メール</td><td>';
echo '<input type="text" name="login" value="', $email, '">';
echo '</td></tr>';

echo '<tr><td>パスワード</td><td>';
echo '<input type="password" name="password" value="', $password, '">';
echo '</td></tr>';

echo '<tr><td>パスワード確認</td><td>';
echo '<input type="password" name="password2" value="', $password2, '">';
echo '</td></tr>';

echo '<tr><td>携帯電話</td><td>';
echo '<input type="text" name="login" value="', $phone, '">';
echo '</td></tr>';

echo '</table>';
echo '<input type="submit" value="確定">';
echo '</form>';
 ?>
<?php require '../footer3.php'; ?>
