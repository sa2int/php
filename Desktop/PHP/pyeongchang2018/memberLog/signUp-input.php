<?php session_start(); ?>
<?php require '../header.php'; ?>
<link rel="stylesheet" href="../Ostyle.css">
<?php include '../DB/dbase.php';?>
<style>
.info {
	margin-top: 10px;
	margin-bottom: 40px;
	text-align: center;
	font-family: 'Montserrat', sans-serif;
	font-size:20px;
	line-height: 30px;
	border: skyblue 1px solid;
}
.info input:focus{
	outline: none;
}

.info form table {
	margin: 0 auto;
}

.info table td {
	color: black;
	padding-right: 10px;
}

.info input {
	font-family: 'Montserrat', sans-serif;
	font-size:20px;
}

</style>
<div class="boardMainImg"><img src="../imgBase/sub1.jpg"></div>
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

echo '<form action="signUp-output.php" method="post">';
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
echo '</table>';
echo '<input type="submit" value="確定" style="width:380px;">';
echo '</form>';
echo '<a href="index.php">Topへ</a>';

?>
</div>
<?php require '../footer.php'; ?>
