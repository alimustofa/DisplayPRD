<script>
	$('.menu-6').addClass('menu-aktif');
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
		//$('#welcome').hide();
		$('.left-wrapper').css({
			"margin-left":"-20%"
		});
		$('.middle-wrapper').css({
			"width":"80%"
		});
	});
</script>
<div style='position:relative; margin-top:10px; z-index:1;'>
	<div class='left-ribbon' style='position:relative !important; left:0; float:left;'></div>
	<div class='bg-left-ribbon f-left' style='width:300px;'>
		<div class='f-sambung f-putih' style='padding:2px 5px; font-size:35px;'>IK</div>
	</div>
	<div class='left-ribbon rotate-180'style='margin-top:-20px; margin-left:38px; position:relative !important; float:left;''></div>
		<div class='cb'></div>
</div>

<link rel="stylesheet" href="_asset/_js/owl/owl.carousel.css">
<link rel="stylesheet" href="_asset/_js/owl/owl.theme.css">
<script src="_asset/_js/owl/owl.carousel.js"></script>
<script>
	$(document).ready(function() {
	  $("#owl-example").owlCarousel();
	});
</script>
<style>
.wr-ik
{
	width:180px; 
	float:left; 
	height:110px; 
	background:#eee;
	border-bottom:solid 1px #ccc;
	margin-bottom:10px;
}
.wr-ik:hover
{
	background:#ddd;
}
</style>
<div style='background:white; position:relative; width:950px; margin-top:-50px; margin-left:40px; height:auto; padding-top:40px; padding-left:15px; padding-right:15px; padding-bottom:15px'>
	<a href='display_awal'><div class='close-gal' style='z-index:1;background:url(_asset/_images/ribbon-kembali.png)no-repeat; width:130px; height:61px; background-size:130px; position:absolute; top:5; right:-10;'></div></a>
		<div id="owl-example" class="owl-carousel" style='margin-top:20px;'>
		<?php
		$q_pdf = msq($kon, "select * from t_ik order by id_ik desc");
		while($d_pdf = mfa($q_pdf))
		{
			echo "
				<div style='border:solid 1px #ccc; width:180px;'>
					<a href='display_ikDetail_$d_pdf[id_ik]'>
					<div class='wr-ik'>
						<div class='f-symbol f-none t-center' style='font-size:50px; margin-top:10px;'>m</div>
					</div>
					</a>
					<p align='center'>$d_pdf[judul]</p>
				</div>
				<div style='border:solid 1px #ccc; width:180px;'>
					<a href='display_ikDetail_$d_pdf[id_ik]'>
					<div class='wr-ik'>
						<div class='f-symbol f-none t-center' style='font-size:50px; margin-top:10px;'>m</div>
					</div>
					</a>
					<p align='center'>$d_pdf[judul]</p>
				</div>
				<div style='border:solid 1px #ccc; width:180px;'>
					<a href='display_ikDetail_$d_pdf[id_ik]'>
					<div class='wr-ik'>
						<div class='f-symbol f-none t-center' style='font-size:50px; margin-top:10px;'>m</div>
					</div>
					</a>
					<p align='center'>$d_pdf[judul]</p>
				</div>
				<div style='border:solid 1px #ccc; width:180px;'>
					<a href='display_ikDetail_$d_pdf[id_ik]'>
					<div class='wr-ik'>
						<div class='f-symbol f-none t-center' style='font-size:50px; margin-top:10px;'>m</div>
					</div>
					</a>
					<p align='center'>$d_pdf[judul]</p>
				</div>
				<div style='border:solid 1px #ccc; width:180px;'>
					<a href='display_ikDetail_$d_pdf[id_ik]'>
					<div class='wr-ik'>
						<div class='f-symbol f-none t-center' style='font-size:50px; margin-top:10px;'>m</div>
					</div>
					</a>
					<p align='center'>$d_pdf[judul]</p>
				</div>
				<div style='border:solid 1px #ccc; width:180px;'>
					<a href='display_ikDetail_$d_pdf[id_ik]'>
					<div class='wr-ik'>
						<div class='f-symbol f-none t-center' style='font-size:50px; margin-top:10px;'>m</div>
					</div>
					</a>
					<p align='center'>$d_pdf[judul]</p>
				</div>
				
			";
		}
		?>
		</div>
	<div class='cb'></div>
</div>