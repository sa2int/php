<?php require 'header.php';?>
<h1>座席の種類を選択してください。</h1>
<form  action="select-for-output.php" method="post">
  <select  name="count">
    <?php
    $i=0;
  while ($i <= 10) {
      echo '<option value="', $i, '">', $i, '</option>';
      $i++;
  }
     ?>
  </select>
  <p><input type="submit" value="確定"></p>
</form>　
<?php require 'footer.php';?>
