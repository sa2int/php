<? require 'header.php'; ?>
<p>購入数を選択してください。</p>
<form action="select-for-output.php" method="post">
<select name="count">
<?
	$i=0;
	while($i<10){
		echo '<option value="', $i, '">', $i, '</option>';
		$i++;
	}
?>
</select>
<input type="submit" value="確定">
<? require 'footer.php'; ?>