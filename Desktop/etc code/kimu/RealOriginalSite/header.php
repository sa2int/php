<!DOCTYPE html>
<html lang="jp">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>コンテンツテスト</title>

<!-- ブートーストラップ -->
<link href="css/bootstrap.min.css" rel="stylesheet">

<!-- 元デザィン -->
<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
<link rel="stylesheet" href="OriginalSitestyle.css">

<!-- 携帯画面のSlide部分　-->
<script src="https://use.fontawesome.com/118df4adbe.js"></script>
<script src="https://code.jquery.com/jquery-2.2.3.min.js"></script>
<script>//jquery
	$(function() {
		$(".headC").click(function() {
			$(".headB").slideToggle();
		});
	});
</script>

<!-- JQuery(ブートーストラップのJavaPluginのために必要) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<!-- Compileされた全てのPluginを含みます。 -->
<script src="js/bootstrap.min.js"></script>

<script>
var Checkmail=/[0-9a-aA-Z][_0-9a-zA-Z-]*@[_0-9a-zA-Z-]+(\.[_0-9a-zA-Z-]+){1,2}$/;//メールを判断する正規式
//시작, 끝 : /, [0-9a-aA-Z] : 0~9까지의 숫자, a~Z까지의 영어만 사용
//^:~로 시작하는 문자열, $:~로끝나는 문자열, ()는 묶음을 처리할때 사용
//ab{3,5} a다음에 b가 3~5개 사이, \. 점을 검색 및 사용, ab+ a다음에 b가 1개 이상.
//해석 : 0~9, a~z, A~Z까지의 문자만 가능, 그와 연결되는 0~9, a~z, A~Z문자들 가능, 이후 @, 이후 다시 연결해서 0~9, a~z, A~Z문자들 가능, 이후 +를 해서 중복되는 문자도 되도록 사용), 이후 .이후 0~9, a~z, A~Z문자들 가능하게 하고 이후 문자가 1~2개로 끝나도록 만듬. これでメールを判断する正規式完成。
function check() {
	var mail=request.mail.value;
	
	if(request.title.value=="") {
	alert("タイトルを入力してください。");
	request.title.focus();
	return false;
	} else if(request.name.value=="") {
	alert("名前を入力してください。");
	request.name.focus();
	return false;
	} else if(mail=="" || !mail.match(Checkmail)) {
	alert("メールを正確に入力してください。");
	request.mail.focus();
	return false;
	} else if(request.date.value=="") {
	alert("日程を入力してください。");
	request.date.focus();
	return false;
	} else if(request.contents.value=="") {
	alert("詳細を入力してください。");
	request.contents.focus();
	return false;
	} else if(confirm('値をもう一度確認してください。間違いないですか?')) {
	return true;
	} else { 
	return false; 
	}
}

function scroll() {
	var offset = $(movescroll).offset();
	$('html, body').animate({scrollTop : offset.top}, 1000);//Scroll移動->絶対座標Topに移動
}

function textareacheck() {
	var frm = document.write.contents;
	
	if(frm.value.length > 1) {
		alert('文字列は2000以下に制限されます。');
		frm.value = frm.value.substring(0, 1);
		frm.focus();
	}
}
</script>

<!-- 暦　設定 Start -->
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="./jquery-ui-1.12.1/datepicker-ko.js"></script>
<script>
//jQuery를 쓰기 위해선 꼭 $(function)의 형식으로 쓰도록.
$.datepicker.setDefaults($.datepicker.regional['jp']);
$(function() {
	$("#date").datepicker({minDate: 0, maxDate: 5, dateFormat: 'yy-mm-dd'});
})
</script>
<!-- 暦　設定 End -->

<!-- 削除と修正 start -->
<script>
function checksubmit(checkaction) {//関数の名前にただのSubmitとか使っちゃだめ
	var resultvalue = document.getElementById("result");
	if(checkaction==1) {
	if(confirm('本当に文を削除しますか？')) {
		alert("削除完了");
		resultvalue.value ="delete";
		} else return false;
	} 
	else if(checkaction==2) {
	resultvalue.value ="update";
	} else {
	alert("エラー発生");
	}
	
	document.contents.submit();
}
</script>
<!-- 削除と修正 End -->

<!-- 段落帰る部分、入るのも忘れずに！(document) -->
<script>
function linecheck() {
	var text = $("#contents").val();
	document.getElementById("contents").value = text.replace(/(?:\r\n|\r|\n)/g,"<br>");
	//再び値を入る事を忘れずに。
}
</script>

<!-- 画面Slide start -->
<script type="text/javascript" src="js/backgroundTransition.js"></script>
<script type="text/javascript">
$(document).ready(function() {//css3基盤
	$('.conA').backgroundTransition({
		backgrounds:[
			{ src: 'img/1.jpg' },
			{ src: 'img/2.jpg' },
			{ src: 'img/3.jpg' }
		],
		transitionDelay: 3,
		animationSpeed: 600
	});
});
</script>
<!-- 画面Slide end -->

<!-- キャンセル理由 Check start -->
<script>
function reasoncheck() {
	if(cancelreason.reason.value=="") {
	alert("理由を書いてください。");
	cancelreason.reason.focus();
	return false;
	}
}
</script>

<!-- キャンセル理由 Check end -->

</head>
<body class="samebody">

<header>
<div class="containers">
	<div class="containers-small">

		<a href="index.php" class="headA">popuko</a>

		<button type="button" class="headC">
		<span class="fa fa-bars" title="MENU"></span>
		</button>
	</div>
	
	<nav class="headB">
		<ul>
			<li><a class="btn btn-default" href="index.php">トップ</a></li>
			<li><a class="btn btn-default" href="contents.php">業務説明</a></li>
			<li><a class="btn btn-default" href="about.php">年歴</a></li>
			<li><a class="btn btn-default" href="contact.php">お問い合わせ</a></li>
			<!-- 掲示板テスト jhkim --> 
			<li><a class="btn btn-default" href="writetable.php">掲示板</a></li>
			<li><a class="btn btn-default" href="request.php">受付板</a></li>
			<!-- <li><a class="btn btn-default" data-toggle="modal" data-target="#Login">ログイン</a></li> -->
		</ul>
	</nav>
</div>
</header>
