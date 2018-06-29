<?php require "header.php" ?>
<?php include "DB/dbase.php"; ?>
<?php session_start(); ?>
<body>
  <index class="index">
  <section class="sectionA">
    <div class="container">
      <div class="mainImg">
        <?php
        foreach ($pdo->query('select b_boardNum, file01  from olympicBoards o, member m where o.mem_num = m.mem_num order by b_boardNum DESC LIMIT 1') as $row) {
              $b_boardNum=$row['b_boardNum'];
              echo '<a href="/test/paku/pyeongchangOlympic/board/detail_board.php?b_boardNum=', $b_boardNum, '">';
         echo '<img class="bigImg" src="upload/',$row['file01'],'" ">';
         echo '</a>';
       }
       ?>
      </div>
      <div class="subInfo">
        <div class="subInfo2">
        <ul class="subInfoOne">
          <li><h5>Countdown to PyeongChang 2018</h5></li>
          <li id="newcountdown"></li>
        </ul>
        <ul class="subInfoTwo">
          <li id="subInfoImg"></li>
          <li><h5>Countdown to PyeongChang 2018</h5></li>
          <li><a href="#">Go to Spectator Guide</a></li>
        </ul>
        <!-- <hr class="hr" style="border:#0086d0 solid 1px; margin:0;"> -->
        <?php
        foreach ($pdo->query('select b_boardNum, file01, b_subject, b_contents  from olympicBoards o, member m where o.mem_num = m.mem_num order by rand() DESC LIMIT 2') as $row) {
              $b_boardNum=$row['b_boardNum'];
          echo '<ul class="subInfoThree">';
      		echo '<li><h5>', $row['b_subject'],'</h5></li>';
          echo '<li><p><a href="#">', $row['b_contents'],'</a></p></li>';
          echo '</ul>';
          echo '<hr class="hr" style="border:#0086d0 solid 1px; margin:0;">';
        }
        ?>

      </div>
    </div>
    </div>  <!--container-->
  </section>  <!--sectionA-->

  <section class="sectionB">
    <div class="bread">
      <ol>
        <li><a href="/test/paku/pyeongchangOlympic/board/select_olympicsBoard.php">Top</a></li>
        <li><a href="#">Article</a></li>
      </ol>
    </div>
    <div class="container">
      <div class="container-small">
        <div class="leftImg">
          <?php
          foreach ($pdo->query('select b_boardNum, file01, b_subject, b_contents  from olympicBoards o, member m where o.mem_num = m.mem_num order by rand() DESC LIMIT 3') as $row) {
                $b_boardNum=$row['b_boardNum'];
          echo '<article class="article">';
          echo '<a href="/test/paku/pyeongchangOlympic/board/detail_board.php?b_boardNum=', $b_boardNum, '">';
          echo '<div>';
          echo '<img src="upload/',$row['file01'],'">';
          echo '</div>';
          echo '<div class="text">';
          echo '<h4>', $row['b_subject'], '</h4>';
          echo '<p>', $row['b_contents'], '</p>';
          echo '</div>';
          echo '</a>';
          echo '</article>';
          }
          ?>
        </div>
        <div class="rightImg">
          <?php
    			foreach ($pdo->query('select b_boardNum, file01, b_subject, b_contents from olympicBoards o, member m where o.mem_num = m.mem_num order by rand() DESC LIMIT 3') as $row) {
    						  $b_boardNum=$row['b_boardNum'];
          echo '<article class="article">';
          echo '<a href="/test/paku/pyeongchangOlympic/board/detail_board.php?b_boardNum=', $b_boardNum, '">';
          echo '<div>';
          echo '<img src="upload/',$row['file01'],'">';
          echo '</div>';
          echo '<div class="text">';
    	    echo '<h4>', $row['b_subject'], '</h4>';
    	    echo '<p>', $row['b_contents'], '</p>';
          echo '</div>';
          echo '</a>';
          echo '</article>';
          }
          ?>
        </div>
      </div>


    </div>  <!--container-->
  </section>  <!--sectionB-->
</index>


</body>
<?php include "footer.php" ?>
