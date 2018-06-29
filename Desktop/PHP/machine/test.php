<style>
body { margin: 0; }
.headB {
  background: hotpink;
  display: inline-block;
  width: 100%;
}
.headB-bar { margin: 0; padding: 0; }
.headB-bar li {
  float: left;
  list-style:none;
  position: relative;
}

.headB-bar li:hover { background: white; }
.headB-bar li:hover>a { color: hotpink; }
.headB-bar a {
  color: white;
  display: block;
  padding: 10px 20px;
  text-decoration: none;
}
.headB-bar ul {
  background: #eee;
  border: 1px solid silver;
  display: none;
  padding: 0;
  position: absolute;
  left: 0;
  top: 100%;
  width: 180px;
}
.headB-bar ul li { float: none; }
.headB-bar ul li:hover { background: #ddd; }
.headB-bar ul li:hover a { color: black; }
.headB-bar ul a { color: black; }
.headB-bar ul ul { left: 100%; top: 0; }
.headB-bar ul ul li {float:left; margin-right:10px;}
</style>
<script src="//code.jquery.com/jquery.min.js"></script>

<script>
  $(function(){
    $(".headB-bar li").hover(function(){
      $('ul:first',this).show();
    }, function(){
      $('ul:first',this).hide();
    });
    $(".headB-bar>li:has(ul)>a").each( function() {
      $(this).php( $(this).php() );
    });
    $(".headB-bar ul li:has(ul)")
      .find("a:first")
      .append("<p style='float:right;margin:-3px'>&#9656;</p>");
  });

  $(function(){
    $(".headC").click(function(){
      $(".headB").slideToggle();
    });
  });
</script>

  <header>
  <div class="container">
    <div class="container-small">
    <a href="index.html" class="headA">CKH</a>
    <button type="button" class="headC">
      <i class="fa fa-bars" aria-hidden="true"></i>
    </button>
    </div>
    <nav class="headB">
		<ul class="headB-bar">
			<li><a href="index.php">Home</a></li>
			<li ><a href="product.php">Product</a>
        <ul>
          <li><a href="#">포크레인</a></li>
          <li><a href="#">포크레인</a></li>
          <li><a href="#">포크레인</a></li>
          <li><a href="#">포크레인</a></li>
        </ul>
      </li>
			<li><a href="whyUs.php">Why Us</a></li>
			<li><a href="AboutUs.php">About Us</a></li>
			<li><a href="contact.php">Contact</a></li>
		</ul>
		</nav>
  </div>
</header>
