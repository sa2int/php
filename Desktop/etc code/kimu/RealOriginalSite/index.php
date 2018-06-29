<?php require 'header.php'; ?>

<section class="conA">
<div class="container">
	<h1>誰より早く！</h1>
	<h1>物を送ります！</h1>
	<p>安全！神速！正確！</p>
	<a href="javascript:scroll();">特急運送を始める</a>
	<!-- <a href="javascript:void(0);" onclick="scroll();">特急運送を始める</a> -->
</div>
</section>

<section class="conB">
<div class="container">
	<div class="shen3"></div>
	<div class="text">
		<h2>どんな場所でも安全に！</h2>
		<p>完全武装したエージエントたちがいつも待機しています！。</p>
		<a href="javascript:scroll();">今すぐ申請!
		<span class="fa fa-chevron-right"></span>
		</a>
	</div>
</div>
</section>

<section class="conC">
<div class="container">
	<div class="shen1"></div>
	<div class="text">
		<h2>どんな場所でも神速に！</h2>
		<p>テレポートが可能なエージエントたちがいつも待機しています！。</p>
		<a href="javascript:scroll();">今すぐ申請!
		<span class="fa fa-chevron-right"></span>
		</a>
	</div>
</div>
</section>

<section class="conD">
<div class="container">
	<div class="shen2"></div>
	<div class="text">
		<h2>どんな場所でも正確に！</h2>
		<p>例え南国でも！どこでも正確に配送します！。</p>
		<a href="javascript:scroll();">今すぐ申請!
		<span class="fa fa-chevron-right"></span>
		</a>
	</div>
</div>
</section>

<div id="movescroll">
<section class="request">
<form name="request" action="kimuSendMail.php" onsubmit="return check()" method="post">
<h1>今すぐ申請はこちら！</h1>
<div class="title">
	<label>名題</label>
	<input type="text" name="title" maxlength="30" style="width:100%;"></input>
</div>
<div class="information">
	<label>名前</label>
	<input type="text" name="name" maxlength="10"></input>
	<label>　性別</label>
	<select name="sex" style="font-size:20px;">
		<option value="男">男</option>
		<option value="女">女</option>
	</select>
</div>
<div class="contents">
	<label>メール住所</label>
	<input type="text" id="mail" name="mail"></input>
	<label>　地域</label>
	<select name="location" style="font-size:20px;">
		<option value="杉並区">杉並区</option>
		<option value="新宿区">新宿区</option>
		<option value="渋谷">渋谷</option>
		<option value="新大久保">新大久保</option>
		<option value="池袋">池袋</option>
	</select>
</div>
<div class="requestdate">
	<label>予約日</label>
	<input id="date" name="date" type="text"></input>
	<label>予約日程</label>
	<select name="time" style="font-size:15px;">
	<? $hour = "";
	for( $i=9 ; $i<21 ; $i++ ) {
	if(strlen($i)==1) {
	$hour = "0".$i."時";
	} else {
	$hour = $i."時";
	}
	?>
	<option value="<?=$hour?>"><? echo $hour; ?></option>
	<? } ?>
	</select>
</div>
<div class="details">
	<label style="vertical-align:top;">詳細</label>
	<textarea id="contents" name="contents" style="width:100%; height:300px;"></textarea>
</div>
<div class="button">
	<input type="submit" onclick="linecheck()"　style="font-size:20px;" value="申し込み">
</div>
</form>
</section>
</div>

<?php require 'footer.php'; ?>