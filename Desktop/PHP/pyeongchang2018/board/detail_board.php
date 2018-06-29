<?php require '../header.php';?>
<?php include "../DB/dbase.php"; ?>
<style>

  .contents img {
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto;
  }
</style>
 <article class="post">
   <div class="container">
     <div class="bread">
       <ol>
         <li><a href="/test/paku/pyeongchang2018/board/select_olmpicsBoard.php">トップ</a></li>
         <li><a href="#">記事一覧</a></li>
       </ol>
     </div>
     <div class="contents">
     <?php
     $sql=$pdo->prepare('select name, b_subject, b_contents, file01, b_date from olympicsBoard o, member m where o.mem_num = m.mem_num and b_boardNum=?');
     $sql->execute([$_REQUEST['b_boardNum']]);
     foreach ($sql->fetchAll() as $row) {
       echo '<h1>',$row['b_subject'],'</h1>';
       echo '<img src="/test/paku/pyeongchang2018/upload/',$row['file01'],'">';
       echo '<p>', $row['b_contents'], '</p>';
       echo '<p>Writer :', $row['name'], '</P>';
       echo '<p>Date :', $row['b_date'], '</P>';
   }
   ?>
 </div>
   </div>
 </article>

 <aside class="related">
   <ul>

     <?php
     foreach ($pdo->query('select b_boardNum, id, b_subject, b_contents, password, file01 from olympicsBoard o, member m where o.mem_num = m.mem_num order by rand() limit 5') as $row) {
           $b_boardNum=$row['b_boardNum'];
echo '<li>';
echo ' <a href="#">';
echo ' <div class="photo" style="background-image:url(/test/paku/pyeongchang2018/upload/',$row['file01'],');">';
echo '</div>';
echo '<div class="text">';
echo '<h2>', $row['b_subject'],'</h2>';
echo '<p>',  $row['b_contents'],'</p>';
echo '</div>';
echo '</a>';
echo '</li>';
   }
   ?>

   </ul>
   </aside>







<?php require '../footer.php';?>
