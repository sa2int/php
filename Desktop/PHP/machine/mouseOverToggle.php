<style>
body { margin: 0; }
.zeta-menu-bar {
  background: hotpink;
  display: inline-block;
  width: 100%;
}
.zeta-menu { margin: 0; padding: 0; }
.zeta-menu li {
  float: left;
  list-style:none;
  position: relative;
}
.zeta-menu li:hover { background: white; }
.zeta-menu li:hover>a { color: hotpink; }
.zeta-menu a {
  color: white;
  display: block;
  padding: 10px 20px;
  text-decoration: none;
}
.zeta-menu ul {
  background: #eee;
  border: 1px solid silver;
  display: none;
  padding: 0;
  position: absolute;
  left: 0;
  top: 100%;
  width: 180px;
}
.zeta-menu ul li { float: none; }
.zeta-menu ul li:hover { background: #ddd; }
.zeta-menu ul li:hover a { color: black; }
.zeta-menu ul a { color: black; }
.zeta-menu ul ul { left: 100%; top: 0; }
.zeta-menu ul ul li {float:left; margin-right:10px;}
</style>

<script src="//code.jquery.com/jquery.min.js"></script>
<script>
$(function(){
  $(".zeta-menu li").hover(function(){
    $('ul:first',this).show();
  }, function(){
    $('ul:first',this).hide();
  });
  $(".zeta-menu>li:has(ul)>a").each( function() {
    $(this).html( $(this).html()+' &or;' );
  });
  $(".zeta-menu ul li:has(ul)")
    .find("a:first")
    .append("<p style='float:right;margin:-3px'>&#9656;</p>");
});
</script>

<div class='zeta-menu-bar'>
  <ul class="zeta-menu">
    <li><a href="#">홈</a></li>
    <li><a href="#">1번 메뉴</a></li>
    <li><a href="#">2번 메뉴</a>
      <ul>
        <li><a href="#">2-A 메뉴</a></li>
        <li><a href="#">2-B 메뉴</a>
          <ul>
            <li><a href="#">2-B-1 메뉴</a></li>
            <li><a href="#">2-B-2 메뉴</a></li>
          </ul>
        </li>
        <li><a href="#">2-C 메뉴</a></li>
        <li><a href="#">2-D 메뉴</a>
          <ul>
            <li><a href="#">2-D-1 메뉴</a></li>
            <li><a href="#">2-D-2 메뉴</a></li>
            <li><a href="#">2-D-3 메뉴</a></li>
          </ul>
        </li>
      </ul>
    </li>
    <li><a href="#">3번 메뉴</a>
      <ul>
        <li><a href="#">3-A 메뉴</a></li>
        <li><a href="#">3-B 메뉴</a></li>
      </ul>
    </li>
    <li><a href="#">4번 메뉴</a></li>
  </ul>
</div>
