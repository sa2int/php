<? session_start(); ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
	<script src="https://use.fontawesome.com/926fe18a63.js"></script>
	<script src="https://code.jquery.com/jquery-2.2.3.min.js"></script>
	<script>
		$(function(){
			$(".headC").click(function(){
				$(".headB").slideToggle();
			});
		});
	</script>

    <header>
      <div class="container">
        <div class="container-small">
            <?php
              if(empty($_SESSION['member'])){ ?>
          <a href="main.php" class="headA">日記帳</a>
          <?php }else{ ?>
          <a href="main_member.php" class="headA">日記帳</a>
	<? } ?>
          <button type="button" class="headC">
            <span class="fa fa-bars" title="MENU"></span>
          </button>
        </div>
        <nav class="headB">
          <ul>
            <?
              if(empty($_SESSION['member'])){ ?>
                <li><a href="main.php">トップ</a></li>
                <li><a href="join.php">会員登録</a></li>
          <? }else{ ?>
                <li><a href="main_member.php">トップ</a></li>
                <li><a href="mypage.php">マイページ</a></li>
                <li><a href="write.php">書き込む</a></li>
                <li><a href="logout.php">ログアウト</a></li>
              <?php } ?>

          </ul>
        </nav>
      </div>
    </header>
  </head>
  <body>
  </body>
