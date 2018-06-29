<? require 'header.php'; ?>
<p>パスワードを入力してください。</p>
<p>(8文字以上で、英小文字、英大文字、数字を各1文字以上含むこと)</p>
<form action="password-output.php" method="post">
<p><input type="password" name="password"></p>
<p><input type="submit" value="確定"></p>
</form>
<? require 'footer.php'; ?>