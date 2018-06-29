<?php require '../PHPStudy/header.php'; ?>
<p>お名前を入力してください。</p>
<form action="user-output.php" method="post">
<input type="text" name="user">
<input type="submit" value="確定">
</form>

</br>
<form action="price-output.php" method="post">
単価　<input type="text" name="price">円
X
個数　<input type="text" name="count">個
<input type="submit" value="計算">
</form>

</br>
<form action="check-output.php" method="post">
<p><input type="checkbox" name="mail">お買い得情報のメールを受け取る</p>
<p><input type="submit" value="確定"></p>
</form>

お食事を選択してください。
<form action="radio-output.php" method="post">
<p><input type="radio" name="meal" value="和食" checked>和食</p>
<p><input type="radio" name="meal" value="洋食">洋食</p>
<p><input type="radio" name="meal" value="中華">中華</p>
<p><input type="submit" value="確定"></p>
</form>

<p>座席の種類を選択してください。</p>
<form action="select-output.php" method="post">
<select name="seat">
<option value="自由席">自由席</option>
<option value="指定席">指定席</option>
<option value="グリーン席">グリーン席</option>
</select>
<p><input type="submit" value="確定"></p>
</form>

<p>購入数を選択してください。</p>
<form action="select-for-output.php" method="post">
<select name="count">
<?php
for($i=0; $i<10; $i++) {
	echo '<option value="', $i, '">', $i, '</option>';
}
?>
</select>
<p><input type="submit" value="確定"></p>
</form>

<p>購入数を選択してください。</p>
<form action="select-for-output.php" method="post">
<select name="count">
<?php
$i=0;
while($i<10) {
	echo '<option value="', $i, '">', $i, '</option>';
	$i++;
}
?>
</select>
<p><input type="submit" value="確定"></p>
</form>

<p>秘密の質問を選択してください。</p>
<form action="select-foreach-output.php" method="post">
<select name="question">
<?php
$question=[
	'最初にみた映画の名前は?',
	'最初に飼ったペットの名前は?',
	'初めてかった車の名前は?',
	'卒業した小学校の名前は?',
	'小学校の担任の先生の名前は?',
	'生まれた市町村の名前は?'
];
foreach ($question as $item) {
	echo '<option value="', $item, '">', $item, '</option>';
}
?>
</select>
<p>質問の回答</p>
<p><input type="text" name=answer></input>
<p><input type="submit" value="確定"></p>
</form>

<p>店舗を選択してください。</p>
<form action="store-output.php" method="post">
<select name="code">
<?php
$store=[
'新宿'=>100, '秋葉原'=>101, '上野'=>102, '横浜'=>200, '川崎'=>201,
'札幌'=>300, '仙台'=>400, '名古屋'=>500, '京都'=>600, '博多'=>700
];
foreach ($store as $key=>$value) {
	echo '<option value="', $value, '">', $key, '</option>';
}
?>
</select>
<p><input type="submit" value="確定"></p>
</form>

<p>ご興味のある商品ジャンルを全て選んでください。</p>
<form action="checks-output.php" method="post">
<?php
$genre=['カメラ', 'パソコン', '時計', '家電', '書籍', '文房具', '食品'];
foreach ($genre as $item) {
echo '<p>
<input type="checkbox" name="genre[]" value="', $item, '">',
$item,
'<p>';
}
?>
<p><input type="submit" value="確定"></p>
</form>

<?php
	date_default_timezone_set('Japan');//日本のDate関数
	echo '<p>', date('Y/m/d H:i:s'), '</p>';
	echo '<p>', date('Y年m月d日 H時i分s秒'), '</p>';
?>

<?php
echo rand(), '</br>';//Random数生成
echo rand(1, 6), '</br>';
echo '<img src="item', rand(0, 2), '.png">';
?>


<p>7桁の郵便番後をハイフンなしで入力してください。</p>
<form action="postcode-output.php" method="post">
<input type="text" name="postcode">
<input type="submit" value="確定">
</form>

<p>7桁の郵便番後をハイフンありで入力してください。</p>
<form action="postcode-output2.php" method="post">
<input type="text" name="postcode">
<input type="submit" value="確定">
</form>

<p>パスワードを入力してください。</p>
<p>(8文字以上で、英小文字、英大文字、数字を各1文字以上含むこと)</p>
<form action="password-output.php" method="post">
<input type="password" name="password">
<input type="submit" value="確定">
</form>

<p>お名前のフリガナを入力してください。</p>
<form action="zenhan-kana-output.php" method="post">
<input type="text" name="furigana">
<input type="submit" value="確定">
</form>

<p>購入個数を入力してください。</p>
<form action="zenhan-number-output.php" method="post">
<input type="text" name="count">
<input type="submit" value="確定">
</form>

<p>投稿するメッセージを入力してください。</p>
<?php //board.txt파일 확인완료 
?>
<form action="board-output.php" method="post">
<input type="text" name="message">
<input type="submit" value="確定">
</form>

<p>アップロードするファイルを指定してください。</p>
<form action="upload-output.php" method="post"
enctype="multipart/form-data">
<p><input type="file" name="file"></p>
<p><input type="submit" value="アップロード"></p>
</form>

<?php require '../PHPStudy/footer.php'; ?>