<?php require 'header.php';?>
<?
if(isset($_SESSION['member'])){
	unset($_SESSION['member']);
	echo '<script type="text/javascript">alert("ログアウトしました。");</script>';
	echo "<script>parent.location.replace('main.php');</script>";

}else{
	echo '<script type="text/javascript">alert("すでにログアウトしています。");</script>';
	echo "<script>window.location.replace('main.php');</script>";
}
?>
<?php require 'footer.php';?>