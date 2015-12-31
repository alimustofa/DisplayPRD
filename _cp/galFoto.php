<script>
	$('.menu-3').addClass('menu-aktif');
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
		$('#welcome').hide();
		$('.left-wrapper').css({
			"margin-left":"-20%"
		});
		$('.middle-wrapper').css({
			"width":"80%"
		});
	});
</script>
<script src="_asset/_js/sliderengine/amazingslider.js"></script>
<script src="_asset/_js/sliderengine/initslider-1.js"></script>

<div style='position:relative; margin-top:10px; z-index:1;'>
	<div class='left-ribbon' style='position:relative !important; left:0; float:left;'></div>
	<div class='bg-left-ribbon f-left' style='width:300px;'>
		<div class='f-sambung f-putih' style='padding:2px 5px; font-size:35px;'>Galeri Foto</div>
	</div>
	<div class='left-ribbon rotate-180'style='margin-top:-20px; margin-left:38px; position:relative !important; float:left;''></div>
		<div class='cb'></div>
</div>
<div style='background:white; position:relative; width:950px; margin-top:-50px; margin-left:40px; height:auto; padding-top:40px; padding-left:15px; padding-right:15px; padding-bottom:15px'>
	<a href='display_awal'><div class='close-gal' style='z-index:1;background:url(_asset/_images/ribbon-kembali.png)no-repeat; width:130px; height:61px; background-size:130px; position:absolute; top:5; right:-10;'></div></a>
	<div style="margin:30px auto;max-width:950px;">
	 <div id="amazingslider-1" style="display:block;position:relative;margin:16px auto 32px;">
	        <ul class="amazingslider-slides" style="display:none;">
	        <?php
	        	$q = msq($kon, "select * from t_foto order by id_foto desc");
	        	while($d = mfa($q))
	        	{
	        		echo "<li><img src='_asset/_images/_foto/$d[foto]' alt='$d[judul]' /></li>";
	       		}
	        ?>
	            
	        </ul>
	 </div>
	</div>
</div>