<?php require 'header.php';?>
<?
if(!empty($_SESSION['member'])){
	echo "<script>window.location.replace('main_member.php');</script>";
}
?>

<!DOCTYPE html>
<html lang="jp">
<head>
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<form action="login.php" method="post">
		<div class="login-form">
			<table class="login-table">
			<tr>
				<td>ID</td>
				<td><input type="text" name="id"></td>
			</tr>
			<tr>
				<td>PASSWORD</td>
				<td><input type="password" name="password"></td>
			</tr>
			<tr>
				<td colspan="2">
				<input type="submit" value="LOGIN" class="login-input">
				<input type="button" value="JOIN" onClick="location.href='join.php'"  class="login-input">
				</td>
			</tr>
			</table>
		</div>
	</form>
</body>
</html>
<?php require 'footer.php'; ?>