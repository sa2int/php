<? session_start(); ?>
<? require 'header.php'; ?>
<? require 'menu.php'; ?>
<?
$name=$address=$login=$password=' ';
if(isset($_SESSION['customer'])){
	$name=$_SESSION['customer']['name'];
	$name=$_SESSION['customer']['address'];
	$name=$_SESSION['customer']['login'];
	$name=$_SESSION['customer']['password'];
}

echo '<form action="customer-output.php" method="post">';
echo '<table>';
echo '<tr><td>お名前</td>';
echo '<td><input type="text" name="name" value="', $name, '"></td></tr>';
echo '<tr><td>ご住所</td>';
echo '<td><input type="text" name="address" value="', $address, '"></td></tr>';
echo '<tr><td>ログイン名</td>';
echo '<td><input type="text" name="login" value="', $login, '"></td></tr>';
echo '<tr><td>パスワード</td>';
echo '<td><input type="text" name="password" value="', $password, '"></td></tr>';
echo '</table>';
echo '<input type="submit" value="確定">';
echo '</form>';

?>
<? require 'footer.php'; ?>