<? require 'header.php'; ?>
<p>ご興味のある商品ジャンルをすべて選んでください。</p>
<form action="checks-output.php" method="post">
<?
	$genre=['カメラ', 'パソコン', '時計', '家電', '書籍', '文房具', '食品'];
	foreach ($genre as $item) {
		echo '<p><input type="checkbox" name="genre[]" value="', $item, '">', $item, '</p>';
	}
?>
<p><input type="submit" value="確定"></p>
<? require 'footer.php'; ?>