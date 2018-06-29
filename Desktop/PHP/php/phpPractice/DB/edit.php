<?php require '../header.php';?>

<table>
  <tr><td>商品番号</td><td>商品名</td><td>商品価格</td></tr>
  <tr>
    <form action="edit3.php" method="post">
      <input type="hidden" name="command" value="insert">
      <td></td>
      <td><input type="text" name="name"></td>
      <td><input type="text" name="price"></td>
      <td><input type="submit" name="追加"></td>
    </form>
  </tr>
</table>


<?php require '../footer.php';?>
