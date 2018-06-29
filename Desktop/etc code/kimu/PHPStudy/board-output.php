<?php require '../PHPStudy/header.php'; ?>

<?php
$file='board.txt';//ファイルがじゃんとセーブされたのか? 見えないけど・・・
if(file_exists($file)) {
	$board=json_decode(file_get_contents($file));
}
$board[]=$_REQUEST['message'];//配列の形式、末尾に格納されます。
file_put_contents($file, json_encode($board));
foreach ($board as $message) {
echo '<p>', $message, '</p><hr>';
}
?>

<?php require '../PHPStudy/footer.php'; ?>