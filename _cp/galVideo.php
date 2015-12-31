<script>
	$('.menu-3').addClass('menu-aktif');

	$(document).ready(function(){
		$('#welcome').hide();

		$('.left-wrapper').css({
			"margin-left":"-20%"
		});
		$('.middle-wrapper').css({
			"width":"80%"
		});

		var i=0;
		var vid = $('#source_all').val();

		var sources = vid.split(',')
		$('#wr-video').bind('ended', function(){
			this.src = sources[i++ % sources.length];
			this.load();
			this.play();
		});
	});
	$(document).on('click','.close-gal',function(){
		$('.left-wrapper').css({
			"margin-left":"0%"
		});
		$('.middle-wrapper').css({
			"width":"60%"
		});
		$('#welcome').show();
	});
</script>

<?php
	$q_vid = msq($kon, "select * from t_video");
	$source = array();
	while($d_vid = mfa($q_vid))
	{
		$source[] = "_asset/_video/$d_vid[video]";
	}
	$source_all = implode(',',$source);
	echo "<input type='hidden' value='$source_all' id='source_all'>";
?>
<div style='position:relative; margin-top:10px; z-index:1;'>
	<div class='left-ribbon' style='position:relative !important; left:0; float:left;'></div>
	<div class='bg-left-ribbon f-left' style='width:300px;'>
		<div class='f-sambung f-putih' style='padding:2px 5px; font-size:40px;'>Galeri Video</div>
	</div>
	<div class='left-ribbon rotate-180'style='margin-top:-20px; margin-left:38px; position:relative !important; float:left;''></div>
		<div class='cb'></div>
</div>

<div style='background:white; position:relative; width:980px; margin-top:-50px; margin-left:40px; height:auto; padding-top:40px; padding-bottom:15px;'>
	<a href='display_awal'><div class='close-gal' style='z-index:1;background:url(_asset/_images/ribbon-kembali.png)no-repeat; width:130px; height:61px; background-size:130px; position:absolute; top:5; right:-10;'></div></a>
	<video id='wr-video' width='1000px' height='500px' controls autoplay>
		<source src='_asset/_video/hitung_mundur.mp4'>
	</video>
</div>
