<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>PHP Sample Programs</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="/test/paku/pyeongchang2018/Ostyle.css">
<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
<script src="https://use.fontawesome.com/926fe18a63.js"></script>
<link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>



<script>
  // $(function(){
  //   $(".headB-bar li").hover(function(){
  //     $('ul:first',this).show();
  //   }, function(){
  //     $('ul:first',this).hide();
  //   });
  //   $(".headB-bar>li:has(ul)>a").each( function() {
  //     $(this).php( $(this).php() );
  //   });
  //   $(".headB-bar ul li:has(ul)")
  //     .find("a:first")
  //     .append("<p style='float:right;margin:-3px'>&#9656;</p>");
  // });

  $(function(){
    $(".headC").click(function(){
      $(".headB").slideToggle();
    });
  });

/*500�씠�븯濡� �궡�젮媛덈븣 �솕�궡�몴 �몴�떆*/
  $( window ).scroll( function() {
  if ( $( this ).scrollTop() > 300 ) {
    $( '.up' ).fadeIn();
  } else {
    $( '.up' ).fadeOut();
  }
} );

/*1875�씠�븯濡� �궡�젮媛덈㈃ �솕�궡�몴 �씛�깋�쑝濡� 蹂�寃�*/
  $( window ).scroll( function() {
  if ( $( this ).scrollTop() > 1217 ) {
    $( '.up' ).css("color", "white");
  } else {
    $( '.up' ).css("color", "#002e5d");
  }
} );



jQuery(document).ready(function() {
    // var offset = 220;
    var duration = 700;
    // jQuery(window).scroll(function() {
    //     if (jQuery(this).scrollTop() > offset) {
    //         jQuery('.up').fadeIn(duration);
    //     } else {
    //         jQuery('.up').fadeOut(duration);
    //     }
    // });

    jQuery('.up').click(function(event) {
        event.preventDefault();
        jQuery('html, body').animate({scrollTop: 0}, duration);
        return false;
    })
});



CountDownTimer('03/09/2018 00:00 AM', 'newcountdown'); // 2018년 1월 1일까지, 시간을 표시하려면 01:00 AM과 같은 형식을 사용합니다.

function CountDownTimer(dt, id)
{
var end = new Date(dt);

var _second = 1000;
var _minute = _second * 60;
var _hour = _minute * 60;
var _day = _hour * 24;
var timer;

function showRemaining() {
var now = new Date();
var distance = end - now;
if (distance < 0) {

clearInterval(timer);
document.getElementById(id).innerHTML = 'EXPIRED!';

return;
}
var days = Math.floor(distance / _day);
var hours = Math.floor((distance % _day) / _hour);
var minutes = Math.floor((distance % _hour) / _minute);
var seconds = Math.floor((distance % _minute) / _second);

document.getElementById(id).innerHTML = days + 'Day ';
document.getElementById(id).innerHTML += hours + 'Hour ';
document.getElementById(id).innerHTML += minutes + 'Min. ';
document.getElementById(id).innerHTML += seconds + 'Sec.';

}

timer = setInterval(showRemaining, 0);
}



</script>
<style type="text/css">
	.sr-only{
			position: absolute;
			width:1px;
			height: 1px;
			padding :0;
			margin:-1px;
			overflow: hidden;
			clip:rect(0,0,0,0);
			border:0;
			}
</style>
</head>

<body>

  <header >
    <div class ="head-fixed">
    <div class="login">
<?php
if (isset($_SESSION['member'])) {
  echo '<a href="/test/paku/pyeongchang2018/board/insertBoard.php" >Write</a>';
  echo '<a href="/test/paku/pyeongchang2018/memberLog/signUp-input.php">', $_SESSION['member']['id'], '&nbsp;<i class="fa fa-gear"></i></a>';
  echo '<a href="/test/paku/pyeongchang2018/memberLog/logout.php" >Logout</a>';

} else {
  echo '<a href="/test/paku/pyeongchang2018/memberLog/login-input.php">Login</a><a style="color:black;">||</a>';
  echo '<a href="/test/paku/pyeongchang2018/memberLog/signUp-input.php">Sign Up </a>';

}

?>
    </div>
		<div class="container">

			<div class="container-small">
			<a href="/test/paku/pyeongchang2018/index.php" class="headA"><img src="/test/paku/pyeongchang2018/imgBase/logo.png"></a>
			<button type="button" class="headC">
				<i class="fa fa-bars" aria-hidden="true"></i>
			</button>
			</div>
		<nav class="headB">
		<ul>
			<li><a href="/test/paku/pyeongchang2018/index.html">競技日程</a></li>
			<li><a href="/test/paku/pyeongchang2018/board/select_olmpicsBoard_info.php">大会紹介</a></li>
			<li><a href="/test/paku/pyeongchang2018/board/select_olmpicsBoard.php">最高の瞬間</a></li>
			<li><a href="/test/paku/pyeongchang2018/contact.html">ニュース</a></li>
		</ul>
		</nav>
		</div>
    <hr class="hr">
    <div class="iconMenu">
      <ul>
        <li>
          <a href="#">
            <div><img src="/test/paku/pyeongchang2018/imgBase/icon1.png"></div>
            <span>アルペンスキー</span>
          </a>
        </li>

        <li>
          <a href="#">
            <div><img src="/test/paku/pyeongchang2018/imgBase/icon2.png"></div>
            <span>バイアスロン</span>
          </a>
        </li>

        <li>
          <a href="#">
            <div><img src="/test/paku/pyeongchang2018/imgBase/icon5.png"></div>
            <span>クロスカントリースキー</span>
          </a>
        </li>

        <li>
          <a href="#">
            <div><img src="/test/paku/pyeongchang2018/imgBase/icon3.png"></div>
            <span>パラアイスホッケ</span>
          </a>
        </li>

        <li>
          <a href="#">
            <div><img src="/test/paku/pyeongchang2018/imgBase/icon4.png"></div>
            <span>スノーボード</span>
          </a>
        </li>

        <li>
          <a href="#">
            <div><img src="/test/paku/pyeongchang2018/imgBase/icon1.png"></div>
            <span>車いすカーリング</span>
          </a>
        </li>





        </ul>
    </div>


  </div>
	</header>
