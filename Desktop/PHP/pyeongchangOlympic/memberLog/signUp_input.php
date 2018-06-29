<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>PHP Sample Programs</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="/test/paku/pyeongchangOlympic/Olympic.css">

</head>
<body>
<div>
  <video id="video" autoplay="autoplay" loop="loop" preload="auto" muted>
    <source src="../img/mascot.mp4" type="video/mp4">
  </video>
</div>

<div class="info">
<?php
$id=$name=$email=$password=$password2=$phone='';
if (isset($_SESSION['member'])) {
	$id=$_SESSION['member']['id'];/**/ //cunstomerに定義されているのか確認すること
	$name=$_SESSION['member']['name'];/**///代した入変数は以下に使います。
	$email=$_SESSION['member']['email'];/**/ //定義されていたら変数に代入する。
	$password=$_SESSION['member']['password'];/**/
	$password2=$_SESSION['member']['password2'];/**///when $_SESSION['customer'] is value,it is substituted to variable
	$phone=$_SESSION['member']['phone'];/**/
}

echo '<form action="signUp_output.php" method="post">';
echo '<table>';
echo '<tr><td>お名前</td><td>';
if(isset($_SESSION['member']['name'])){
	echo '<input type="text" name="name" value="', $name, '" readonly>';
} else {
	echo '<input type="text" name="name" value="', $name, '">';
}
echo '</td></tr>';
echo '<tr><td>id</td><td>';
if(isset($_SESSION['member']['id'])){
	echo '<input type="text" name="id" value="', $id, '" readonly>';  //代入します。
} else {
	echo '<input type="text" name="id" value="', $id, '">';
}
echo '</td></tr>';
echo '<tr><td>email</td><td>';
echo '<input type="text" name="email" value="', $email, '">';
echo '</td></tr>';
echo '<tr><td>パスワード</td><td>';
echo '<input type="password" name="password" value="', $password, '">';
echo '</td></tr>';
echo '<tr><td>パスワード2</td><td>';
echo '<input type="password" name="password2" value="', $password2, '">';
echo '</td></tr>';
echo '<tr><td>phone</td><td>';
echo '<input type="text" name="phone" value="', $phone, '">';
echo '</td></tr>';
// echo '<tr><td>';
// echo '<input type="hidden" name="mem_num" value="', $mem_num, '">';
// echo '</td></tr>';
echo '<tr><td colspan="2">';
echo '<input type="submit" value="確定"  >';
echo '</td></tr>';
echo '</table>';
echo '</form>';
?>

<h1 class="h1"><a href="/test/paku/pyeongchangOlympic/index.php">Passion. Connected</a></h1>
<div class="img-cover"></div>
</div>

</body>
</html>
