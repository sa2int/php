<? session_start(); ?>
<? require 'header.php'; ?>
<? require 'menu.php'; ?>
<? 
if(isset($_SESSION['customer'])){
	unset($_SESSION['customer']);
	echo 'ログアウトしました。';
}else{
	echo 'すでにログアウトしています。';
}
?>
<? require 'footer.php'; ?>