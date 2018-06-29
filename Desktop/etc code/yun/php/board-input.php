<? require 'header.php' ?>
<p> 投稿するメッセージを入力してください。 </p>
<form action="board-input.php" method="post">
<input type="text" name="message">
<input type="submit" value="確定">
</form>
<? require 'board-output.php' ?>
<? require 'footer.php' ?>