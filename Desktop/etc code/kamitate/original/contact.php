<?php

mb_language("Japanese");
mb_internal_encoding("UTF-8");

if(isset($_POST['name'])){
    $name = $_POST['name'];
}

if(isset($_POST['mail'])){
    $mail = $_POST['mail'];
}

if(isset($_POST['sub'])){
    $sub = $_POST['sub'];
}

if(isset($_POST['info'])){
    $info = $_POST['info'];
}

$mode = 'input';

// 全てが空でなければ
if($name != '' && $mail != '' && $sub != '' && $info != '') {

    $to      = "maketan0522@yahoo.co.jp";
    $subject = $sub;
    $message = $info;
    $headers = 'From: ' . $mail . "\r\n";
    mb_send_mail($to, $subject, $message, $headers);

    $mode = 'submit';

}

?>


<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<meta http-equiv="Cache-control" content="no-cache">
<title>新卒採用</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
<link rel="stylesheet" href="style.css">

<style>
 .sr-only {
  position: absolute;
  width: 1px;
  height: 1px;
  padding: 0;
  margin: -1px;
  overflow: hidden;
  clip: rect(0,0,0,0);
  border: 0;
}
</style>

<script src="https://use.fontawesome.com/e48ac8d771.js"></script>
<script src="https://code.jquery.com/jquery-2.2.3.min.js"></script>
<script>
$(function(){
$(".headC").click(function(){
$(".headB").slideToggle();
});
});
</script>
</head>
<body class="nohero">
<header class="head-color">
<div class="container">
<div class="container-small">
<a href="index.html" class="headA">
株式会社ネオン・システム</a>

<button type="button" class="headC">
<span class="fa fa-bars" title="MENU"></span>
</button>
</div>

<nav class="headB">
    <ul>
        <li><a href="index.html">トップ</a></li>
		<li><a href="about.html">会社概要</a></li>
        <li><a href="contents.html">採用情報</a></li>
        <li><a href="contact.php">お問い合わせ</a></li>
    </ul>
</nav>

</div>
</header>
 
 <article class="post">
 <div class="container">
  
 <h1>お問い合わせ</h1>

<div class="contact-text">
 <p>株式会社ネオン・システムについてのご質問がございましたら、下記よりお問い合わせ下さい。</p>
</div>

<div class="contact-wrap">
	
 <div class="contact">
  <span class="fa fa-phone"></span>
   <h2>電話</h2>
    <a href="tel:00012345678">
    000-1234-5678</a>
   </div>
 
 <div class="contact">
  <span class="fa fa-envelope"></span>
   <h2>Eメール</h2>
    <a href="mailto:contact@logger.nett">
   contact@logger.nett</a>
  </div>
 </div>

<!-- フォーム --> 
<form action="" method="post">
<dl>
<dd>名前</dd>
<dd><input name="name" id="name" type="text" size="50" /></dd>  <br>
<dd>メールアドレス(宛先)</dd>
<dd><input name="mail" id="mail" type="text" size="50" maxlength="255"></dd><br>
<dd>件名</dd>
<dd><input name="sub" id="sub" type="text" size="50" maxlength="255"></dd><br>
<dd>内容</dd>
<dd><textarea name="info" id="info" cols="39" rows="10"></textarea></dd>
</dl>
<div class="push"><input type="submit" value="送信する"></div>
</form>

<?php if($mode == 'submit') echo '<p class="red">問い合わせ内容を送信しました。24時間以内にご返答がない場合、お手数ですが再度ご連絡くださいませ。</p>'; ?>

<!--<?php echo $mode ?> -->

</div>
</article>

<footer>

<div class="container">

<div class="footA">

<h2>株式会社ネオン・システム</h2>

<p>
〒160-0022 東京都新宿区東新宿6-26-8<br>

<a href="index.html">

http://NeonSystem.net</a>

</p>


<nav class="footD">
 <ul>
  <li><a href="https://twitter.com/">
   <span class="fa fa-twitter"title="Twitter">
   </span>
  </a></li>
  
 <li><a href="https://ja-jp.facebook.com/">
  <span class="fa fa-facebook"title="Facebook">
  </span>
 </a></li>
  
 <li><a href="https://plus.google.com/">
  <span class="fa fa-google-plus"title="Google plus">
  </span>
 </a></li>
 
 <li><a href="https://www.instagram.com/">
  <span class="fa fa-instagram"title="Instagram">
  </span>
 </a></li>
  
 <li><a href="https://www.youtube.com/">
  <span class="fa fa-youtube" title="Youtube">
  </span>
 </a></li> 
</ul>
</nav>
</div>

<nav class="footB">

<div>
<a href="about.html"><h3>会社概要</h3></a>
<ul>
<li><a href="about.html">ネオン・システムとは</a></li>
<li><a href="about.html">事業内容</a></li>
<li><a href="about.html">History</a></li>
<li><a href="about.html">所在地</a></li>
</ul>
</div>

<div>
<a href="contents.html"><h3>採用情報</h3></a>
<ul>
<li><a href="contents.html">新卒採用の方</a></li>
<li><a href="contents.html">中途採用の方</a></li>
</ul>
</div>

<div>
<a href="contact.html"><h3>問い合わせ</h3></a>
<ul>
<li><a href="http://game-mania.sakura.ne.jp/test/kamitate/original/contact.php#contact">メールフォーム</a></li>
</ul>
</div>
</nav>

<div class="footC">
 &copy; NeonSystem corp. All rights reserved.
</div>

</div>


</footer>

</body>

</html>

