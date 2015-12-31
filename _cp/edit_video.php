<?php
	cek_err();
	cek_suc();
		
	$id = anti($_GET['id']);
	$q = msq($kon, "SELECT * from t_video where id_video='$id'");
	$d = mfa($q);
	$j = mnr($q);
	
	if($j == 0)
	{
		referer();
	}

	echo "
	<script>
		document.title = 'Edit Galeri Video | DISPLAY PRD'
	</script>
	<script>
		$(document).ready(function(){
			$('.menu10').addClass('sidebar-dash-aktif');
		});
	</script>
		<div class='title-admin'>
			<div style='padding:20px; height:142px; background:rgba(0,0,0,0.4)'>
				<div style='font-size:70px; margin-right:15px; margin-top:10px;' class='f-putih f-symbol'>?</div>
					<div class='f-putih f24 f-segoe' style='padding:15px; margin-top:50px;'>Edit Galeri Video<br><div style='margin-top:7px;' class='f-segoe f-putih f16'><i>Form untuk mengedit galeri video...</i></div></div>
			</div>
		</div>
		<div class='title-dash'>
			<div class='f14'><a href='#' class='link-biru'>DISPLAY PRD</a> <span class='f-none f-symbol1'>&#215;</span> Form</div>
		</div>
		
		<div class='wrapper-tengah'>
			<div class='wrapper-form' style='width:500px;'>
			<div class='title-form'><span class='f-symbol mr10'>?</span>EDIT GALERI</div>
				<div class='pd15'>
					<form method='POST' action='aksi_edit_galeriVideo' id='form_input' enctype='multipart/form-data'>
						<input type='hidden' value='$d[id_video]' name='id'>
						<div class='form-grup'>
							<div class='label-form'>Judul Video</div>
							<input type='text' class='form transi-3' value='$d[judul]' name='judul' autocomplete='off' required>
						</div>
						
						<div class='form-grup'>
							<div class='label-form'>Video</div>
							<input type='file' id='src-gbr' name='video'>
						</div>
						<button class='bkirim transi-3' value='kirim' name='kirim'><span class='f-symbol1 f-none' style='margin-right:20px;'>?</span>EDIT VIDEO</button>
						
					</form>
				</div>		
			</div>		
		</div>		
		
	";
		unset($_SESSION['suc']);
		unset($_SESSION['err']);
?>