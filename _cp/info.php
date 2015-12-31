<script>
	$('.menu-5').addClass('menu-aktif');
	$(document).on('click','.close-gal',function(){
		$('.left-wrapper').css({
			"margin-left":"0%"
		});
		$('.middle-wrapper').css({
			"width":"60%"
		});
		$('#welcome').show();
	});
	
	$(document).ready(function(){
		//$("#tabel-jpm").delay(1000).fadeIn();
		$('#welcome').hide();
		$('.left-wrapper').css({
			"margin-left":"-20%"
		});
		$('.middle-wrapper').css({
			"width":"100%"
		});

		$('.right-wrapper').hide();
	
	});
</script>
 
<link rel="stylesheet" href="css/example.css">
<style>
    #slides {
      display: none
    }

    #slides .slidesjs-navigation {
      margin-top:5px;
    }

    a.slidesjs-next,
    a.slidesjs-previous,
    a.slidesjs-play,
    a.slidesjs-stop {
      background-image: url(_asset/_js/slide_info/img/btns-next-prev.png);
      background-repeat: no-repeat;
      display:block;
      width:12px;
      height:18px;
      overflow: hidden;
      text-indent: -9999px;
      float: left;
      margin-right:5px;
    }

    a.slidesjs-next {
      margin-right:10px;
      background-position: -12px 0;
    }

    a:hover.slidesjs-next {
      background-position: -12px -18px;
    }

    a.slidesjs-previous {
      background-position: 0 0;
    }

    a:hover.slidesjs-previous {
      background-position: 0 -18px;
    }

    a.slidesjs-play {
      width:15px;
      background-position: -25px 0;
    }

    a:hover.slidesjs-play {
      background-position: -25px -18px;
    }

    a.slidesjs-stop {
      width:18px;
      background-position: -41px 0;
    }

    a:hover.slidesjs-stop {
      background-position: -41px -18px;
    }

    .slidesjs-pagination {
      margin: 7px 0 0;
      float: right;
      list-style: none;
    }

    .slidesjs-pagination li {
      float: left;
      margin: 0 1px;
    }

    .slidesjs-pagination li a {
      display: block;
      width: 13px;
      height: 0;
      padding-top: 13px;
      background-image: url(_asset/_js/slide_info/img/pagination.png);
      background-position: 0 0;
      float: left;
      overflow: hidden;
    }

    .slidesjs-pagination li a.active,
    .slidesjs-pagination li a:hover.active {
      background-position: 0 -13px
    }

    .slidesjs-pagination li a:hover {
      background-position: 0 -26px
    }

    #slides a:link,
    #slides a:visited {
      color: #333
    }

    #slides a:hover,
    #slides a:active {
      color: #9e2020
    }

    .navbar {
      overflow: hidden
    }
  </style>
  <!-- End SlidesJS Optional-->

  <!-- SlidesJS Required: These styles are required if you'd like a responsive slideshow -->
  <style>
    #slides {
      display: none
    }

    .container {
      margin: 0 auto
    }

    /* For tablets & smart phones */
    @media (max-width: 767px) {
      body {
        padding-left: 20px;
        padding-right: 20px;
      }
      .container {
        width: auto
      }
    }

    /* For smartphones */
    @media (max-width: 480px) {
      .container {
        width: auto
      }
    }

    /* For smaller displays like laptops */
    @media (min-width: 768px) and (max-width: 979px) {
      .container {
        width: 724px
      }
    }

    /* For larger displays */
    @media (min-width: 1200px) {
      .container {
        width: 1170px
      }
    }
  </style>
  <!-- SlidesJS Required: -->
</head>
<body>

  <script src="_asset/_js/jquery.slides.min.js"></script>
  <script>
    $(function() {
      $('#slides').slidesjs({
        width: 1000,
        height: 500,
        play: {
          active: true,
          auto: true,
          interval: 4000,
          swap: true,
        }
      });
    });
  </script>
<div style='position:relative; margin-top:10px; z-index:1;'>
	<div class='left-ribbon' style='position:relative !important; left:0; float:left;'></div>
	<div class='bg-left-ribbon f-left' style='width:300px;'>
		<div class='f-sambung f-putih' style='padding:2px 5px; font-size:35px;'>Info</div>
	</div>
	<div class='left-ribbon rotate-180'style='margin-top:-20px; margin-left:38px; position:relative !important; float:left;'></div>
		<div class='cb'></div>
</div>
<div style='background:white; position:relative; border:solid 1px #ccc; width:93%; margin-top:-50px; margin-left:40px; height:auto; padding-top:40px; padding-left:10px; padding-right:15px; padding-bottom:15px'>
	<a href='display_awal'><div class='close-gal' style='z-index:1;background:url(_asset/_images/ribbon-kembali.png)no-repeat; width:130px; height:61px; background-size:130px; position:absolute; top:5; right:-10;'></div></a>
	<div class="container" style='margin-top:10px;'>
	    <div id="slides">
	    <?php
	    	$q_info = msq($kon, "select * from t_info order by id_info desc");
	    	while($d_info = mfa($q_info))
	    	{
	    		echo "<img src='_asset/_images/_info/$d_info[foto]'>";
	    	}
	    ?>
	    </div>
	  </div>
</div>