<? require 'header.php'; ?>
<p>秘密の質問を選択してください。</p>
<form action="select-foreach-output.php" method="post">
<select name="question">
<?
	$question=[
		'最初に見た映画の名前は？',
		'最初に買ったペットの名前は？',
		'初めて買った車の名前は？', 
		'卒業した小学校の名前は？', 
		'小学校の担任先生の名前は？', 
		'生まれた市町村の名前は？'
	];

foreach ($question as $item) {
	echo '<option value="', $item, '">', $item, '</option>';
}
?>
</select>
<p>質問の回答</p>
<p><input type="text" name="answer"></p>
<p><input type="submit" value="確定"></p>
</form>
<? require 'footer.php'; ?>