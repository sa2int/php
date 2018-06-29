<?php session_start();?>
<?php require 'header.php'; ?>
<?php require 'menu.php'; ?>
<?php
if (!isset($_SESSION['customer'])) {
	echo 'ログインしてください。';
} else if (!isset($_SESSION['product'])){
	echo 'カートに商品がありません。';//즉, productSESSION에는 카드의 모든 상품이 있다는걸 알 수 있다.
} else {
echo '<p>お名前:', $_SESSION['customer']['name'], '</p>';
echo 'ご住所:'.$_SESSION['customer']['address'], '</p>';
echo '<hr>';
require 'cart.php';
echo '<hr>';
echo '<p>内容をご確認いただき、購入を確定してください。</p>';
echo '<p><a href=purchase.php>購入を確定する</a><p>';
}
?>
<?php require 'footer.php'; ?>