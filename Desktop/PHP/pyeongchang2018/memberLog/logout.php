<?php session_start(); ?>
<?php require '../header.php'; ?>
<style>
.info {
	text-align: center;
	font-family: 'Montserrat', sans-serif;
	 font-size:30px;
}

header {
  display: none;
}
footer {
  display: none;
}
</style>
<?php
if (isset($_SESSION['member'])) {

	// echo '<div class="info">';
	// echo $_SESSION['member']['id'],'<div>様の情報をログアウトしました。</div>';
	// unset($_SESSION['member']);
	// echo '<div>';
	// echo '<a href="index.php">Topへ</a>';
	// echo '</div>';
	// echo '</div>';
	unset($_SESSION["member"]);
	echo '<meta http-equiv="refresh" content="0.5; url=../index.php">';
} else {
	echo '<div class="info">';
	echo '<div>すでにログアウトしています。</div>';
	echo '<div>';
	echo '<a href="../index.php">Topへ</a>';
	echo '</div>';
	echo '</div>';




}
?>
<?php require '../footer.php'; ?>
