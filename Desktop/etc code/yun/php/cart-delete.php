<? session_start(); ?>
<? require 'header.php'; ?>
<? require 'menu.php' ?>
<?
	unset($_SESSION['product'][$_REQUEST['id']]);
	echo 'カートから商品を削除しました。';
	echo '<hr>';
	require 'cart.php';
?>
<? require 'footer.php'; ?>