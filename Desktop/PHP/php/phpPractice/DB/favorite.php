<?php
include "dbase.php";
if(isset($_SESSION['customer'])){
  echo '<table>';
  echo '<th>商品番号</th><th>商品名</th><th>価格</th>';
  $sql=$pdo->prepare(
    'select * from favorite, product '.   //.은 결합을 의미한다  옆으로 길어지기때문에 .을 찍고 밑으로 행을 내린다.
    'where customer_id=? and product_id=product.id');
  $sql ->execute([$_SESSION['customer']['id']]);
  foreach ($sql->fetchAll() as $row) {
    $id=$row['id'];
    echo '<tr>';
    		echo '<td>', $id, '</td>';
    		echo '<td><a href="detail.php?id='.$id.'">', $row['name'],
    			'</a></td>';
    		echo '<td>', $row['price'], '</td>';
    		echo '<td><a href="favorite-delete.php?id=', $id,
    			'">削除</a></td>';
    		echo '</tr>';
    	}
    	echo '</table>';
    } else {
    	echo 'お気に入りを表示するには、ログインしてください。';
    }
 ?>
