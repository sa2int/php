<?php require 'header.php';?>
<?php

	$reqId = htmlspecialchars($_REQUEST['id']);	
?>
<Script language="javascript">
 function setaddr() {
  var form = document.join_form;
  form.mail.value = form.mail_domein.value;
 }
	function idcheck(val) { 
		location.href="id_check.php?id="+val; 
	} 

</Script>
</Script>
<form action="join_output.php?" method="post" name="join_form" >
	<div class="join-form">
	<table class="join-table">
		<tr>
			<td>ID</td>
			<td><input type="text" value="<?= $reqId;?>" name="id"></td>
			<td><input type="button" value="重複チェック" class="join-input" onclick="idcheck(join_form.id.value)"></td>
			
		</tr>
		<tr>
			<td>パスワード</td>
			<td><input type="password" name="password">
			<p style="font-size:13px; text-align: right;">*8文字以上、英小文字、英大文字、数字の各1文字以上含むこと。</p></td>
		</tr>
		<tr>
			<td>パスワード確認</td>
			<td><input type="password" name="password_2"></td>
		</tr>
		<tr>
			<td>名前</td>
			<td><input type="text" name="name"></td>
		</tr>
		<tr>
			<td>メールアドレス</td>
			<td style="padding-right: 0px;"><input type="text" name="e_mail" style="width:30%;">@
			<input type="text" name="mail" value="" style="width:35%;"></td>
			<td style="padding-left: 0px;">
			<select name="mail_domein" style="width: 150px;" onChange="setaddr();">
				<option value="" selected>---選択---</option>
				<option value="yahoo.co.jp">yahoo.co.jp</option>
				<option value="google.com">google.com</option>
				<option value="naver.com">naver.com</option>
				<option value="">その他</option>
			</select></td>
		</tr>
		<tr>
			<td colspan="3" style="text-align: center;"><input type="hidden" name="value" value="<?=$_REQUEST['value'] ?>">
			<input type="submit" value="会員登録" class="join-input"></td>
		</tr>
	</table>
	</div>
</form>
<?php require 'footer.php';?>
