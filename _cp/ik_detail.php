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
		$('#welcome').hide();
		$('.left-wrapper').css({
			"margin-left":"-20%"
		});
		$('.middle-wrapper').css({
			"width":"80%"
		});
	});
</script>
<?php
	$id = anti($_GET['id']);
	$q = msq($kon, "SELECT * from t_ik where id_ik='$id'");
	$d = mfa($q);
	$j = mnr($q);
	
	if($j == 0)
	{
		referer();
	}
?>
<div style='position:relative; margin-top:10px; z-index:1;'>
	<div class='left-ribbon' style='position:relative !important; left:0; float:left;'></div>
	<div class='bg-left-ribbon f-left' style='width:300px;'>
		<div class='f-sambung f-putih' style='padding:2px 5px; font-size:35px;'>IK</div>
	</div>
	<div class='left-ribbon rotate-180'style='margin-top:-20px; margin-left:38px; position:relative !important; float:left;''></div>
		<div class='cb'></div>
</div>
<div style='background:white; position:relative; width:950px; margin-top:-50px; margin-left:40px; height:auto; padding-top:40px; padding-left:15px; padding-right:15px; padding-bottom:15px'>
	<a href='display_ik'><div class='close-gal' style='z-index:1;background:url(_asset/_images/ribbon-kembali.png)no-repeat; width:130px; height:61px; background-size:130px; position:absolute; top:5; right:-10;'></div></a>
	<?php
		
		echo "
		<p align='center' style='padding:10px; font-size:20px;'>$d[judul]</p>
		<div id='pdfReader'></div>
		<script type='text/javascript'>
			$(document).ready(function(){
				document.getElementById('pdfReader').innerHTML = '<object type=application/pdf data=_asset/_pdf/".$d['file']." width=100% height=580px></object>'
			});  
	    </script>
		";
	?>
	<div class='cb'></div>
</div>