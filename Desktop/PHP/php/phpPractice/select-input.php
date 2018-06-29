<?php require 'header.php';?>
<h1>座席の種類を選択してください。</h1>
<form  action="select-output.php" method="post">
  <select  name="seat">
    <option value="自由席">自由席</option>
    <option value="指定席">指定席</option>
    <option value="グリーン席">グリーン席</option>
  </select>
  <p><input type="submit" value="確定"></p>
</form>　
<?php require 'footer.php';?>
