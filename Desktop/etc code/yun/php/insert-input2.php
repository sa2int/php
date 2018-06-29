<? require 'header.php'; ?>
商品名を入力してください。
<form action="insert-output2.php" method="post">
	商品名　<input type="text" name="name">
	価格　<input type="text" name="price">
	<input type="submit" value="検索">
</form>
<? require 'footer.php'; ?>
