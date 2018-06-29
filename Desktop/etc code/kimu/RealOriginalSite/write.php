<?php require 'header.php'; ?>

<!-- 自習 -->
<form action="write-input.php" method="post">
<div class="writeboard">
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
	<!-- <ul styule="list-style: none;">-->
	<label>内容</label>
	<ul><!-- 同じ名前を設定することしよってボターン一体できる -->
		<li><input type="radio" id="idA" name="chk_info" value="情報一つ"><label for="idA">　情報一つ</input></li>
		<li><input type="radio" id="idB" name="chk_info" value="情報二つ"><label for="idB">　情報二つ</input></li>
		<li><input type="radio" id="idC" name="chk_info" value="情報三つ"><label for="idC">　情報三つ</input></li>
		<li><input type="radio" id="idD" name="chk_info" value="情報四つ"><label for="idD">　情報四つ</input></li>
	</ul>
</div>
<div class="details">
	<label style="vertical-align:top;">詳細</label>
	<textarea id="contents" name="contents" style="width:100%; height:300px;"></textarea>
</div>
<div class="button">
	<input type="submit" onclick="linecheck()" style="font-size:20px;"></button>
</div>
</div>
</form>
<!-- 自習 -->

<?php require 'footer.php'; ?>