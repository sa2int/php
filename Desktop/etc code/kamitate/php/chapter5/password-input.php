<?php require '../header.php';?>

<p>パスワードを入力してください</p>
<p>(８文字以上で、英小文字、英大字、数字を各一文字以上含めること)</p>
<form action="password-output.php" method="post">
<input type="password" name="password">
<input type="submit" value="確定">
</form>
 
<?php require '../footer.php';?>