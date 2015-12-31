<script>
	$('.menu').removeClass('menu-aktif');
	$('.menu-1').addClass('menu-aktif');
	$(".right-wrapper").show();

	$('.left-wrapper').css({
		"margin-left":"-20%"
	});
	$('.middle-wrapper').css({
		"width":"80%"
	});

$(document).ready(function(){
	var a=0;
	$('.show-menu').click(function(){
		if(a==0)
		{
			$('.left-wrapper').css({
				"margin-left":"0%"
			});

			$('#t-menu').text('Sembunyikan Menu');
			a=1;
		}
		else
		{
			$('.left-wrapper').css({
				"margin-left":"-20%"
			});

			$('#t-menu').text('Tampilkan Menu');
			a=0;
		}
	});
});
	
</script>

<div class='show-menu animated bounceInLeft' style='background:#48cb86; padding:15px; color:white; float:left; position:absolute; left:10; top:10; cursor:pointer;'><div class='f-symbol' style=''>C</div>&nbsp;&nbsp;&nbsp;&nbsp;<span id='t-menu'>Tampilkan Menu</span></div>

<?php
	$ip = mfa(msq($kon, "select ip_xl from t_web"));
?>

<div class='animated slideInUp'>
	<div style='position:relative; margin-top:10px;'>
		<div class='left-ribbon' style='position:relative !important; left:0; float:left;'></div>
		<div class='bg-left-ribbon f-left' style='width:300px;'>
			<div class='f-sambung f-putih' style='padding:2px 5px; font-size:35px;'>XL 800</div>
		</div>
		<div class='left-ribbon rotate-180'style='margin-top:-20px; margin-left:38px; position:relative !important; float:left;''></div>
			<div class='cb'></div>
	</div>
	<div style='background:white; width:990px; margin-top:-50px; margin-left:40px; height:450px;'>
		<div style='margin:10px; width:990px; height:400px; overflow:hidden;'>
			<object style='margin-left:-265px;' type='text/html' data='<?php echo "http://".$ip['ip_xl']; ?>' width='1235px' height='410px'></object>
		</div>
	</div>
</div>

