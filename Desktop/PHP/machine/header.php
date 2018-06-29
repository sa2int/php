<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>PHP Sample Programs</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="machineStyle.css">
<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
<script src="https://use.fontawesome.com/926fe18a63.js"></script>
<link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
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

/*500이하로 내려갈때 화살표 표시*/
  $( window ).scroll( function() {
  if ( $( this ).scrollTop() > 300 ) {
    $( '.up' ).fadeIn();
  } else {
    $( '.up' ).fadeOut();
  }
} );

/*1875이하로 내려갈면 화살표 흰색으로 변경*/
  $( window ).scroll( function() {
  if ( $( this ).scrollTop() > 1875 ) {
    $( '.up' ).css("color", "white");
  } else {
    $( '.up' ).css("color", "#002e5d");
  }
} );
//
//
// /*자연스럽게 화면 올리기*/
// $( document).ready( function() {
//   $( '.up' ).bind( 'click', function(){
//     $(document).animate({scrollTop: '0'}, 5000);
//   } );
//
// } );


jQuery(document).ready(function() {
    // var offset = 220;
    var duration = 700;
    // jQuery(window).scroll(function() {
    //     if (jQuery(this).scrollTop() > offset) {
    //         jQuery('.up').fadeIn(duration);
    //     } else {
    //         jQuery('.up').fadeOut(duration);
    //     }
    // });

    jQuery('.up').click(function(event) {
        event.preventDefault();
        jQuery('html, body').animate({scrollTop: 0}, duration);
        return false;
    })
});

</script>
<style type="text/css">
	.sr-only{
			position: absolute;
			width:1px;
			height: 1px;
			padding :0;
			margin:-1px;
			overflow: hidden;
			clip:rect(0,0,0,0);
			border:0;
			}
</style>
</head>
<body>
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
