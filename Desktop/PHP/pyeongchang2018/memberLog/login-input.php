<?php session_start(); ?>
<?php require '../header.php' ?>

<?php if(!isset($_SESSION['member']['id']) || !isset($_SESSION['member']['password'])) { ?>
<style>
header {
  display: none;
}
footer {
  display: none;
}
</style>
<div class="img">
  <div class="form">
<form action="login-output.php" method="post">
<div>ログイン名</div><input type="text" name="id"><br>
<div>パスワード</div><input type="password" name="password"><br>
<input type="submit" value="ログイン">
</form>

 <?php } else {
     $user_id = $_SESSION['member']['id'];
     $user_password = $_SESSION['member']['password'];
     echo "<p><strong>$user_name</strong>($user_id)님은 이미 로그인하고 있습니다. ";
     echo "<a href=\"../index.php\">[돌아가기]</a> ";
     echo "<a href=\"logout.php\">[로그아웃]</a></p>";
 }

?>

</div>
<h1 class="h1"><a href="/test/paku/pyeongchang2018/memberLog/login-input.php">Passion. Connected</a></h1>
<div class="img-cover"></div>

</div>
<?php require '../footer.php'; ?>
