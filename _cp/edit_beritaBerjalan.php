<?php
	cek_err();
	cek_suc();
		
	$id = anti($_GET['id']);
	$q = msq($kon, "SELECT * from t_teks_berjalan where id_teks='$id'");
	$d = mfa($q);
	$j = mnr($q);
	
	if($j == 0)
	{
		referer();
	}

	echo "
	<script>
		document.title = 'Edit Berita Berjalan | DISPLAY PRD'
	</script>
	<script>
		$(document).ready(function(){
			$('.menu2').addClass('sidebar-dash-aktif');
		});
	</script>
		<div class='title-admin'>
			<div style='padding:20px; height:142px; background:rgba(0,0,0,0.4)'>
				<div style='font-size:70px; margin-right:15px; margin-top:10px;' class='f-putih f-symbol'>?</div>
					<div class='f-putih f24 f-segoe' style='padding:15px; margin-top:50px;'>Edit Berita Berjalan<br><div style='margin-top:7px;' class='f-segoe f-putih f16'><i>Form untuk mengedit berita berjalan baru...</i></div></div>
			</div>
		</div>
		<div class='title-dash'>
			<div class='f14'><a href='#' class='link-biru'>DISPLAY PRD</a> <span class='f-none f-symbol1'>&#215;</span> Form</div>
		</div>
		
		<div class='wrapper-tengah'>
			<div class='wrapper-form' style='width:500px;'>
			<div class='title-form'><span class='f-symbol mr10'>?</span>EDIT BERITA BERJALAN</div>
				<div class='pd15'>
					<div class='psn'></div>
					<form method='POST' action='aksi_edit_beritaBerjalan' id='form_input' enctype='multipart/form-data'>
						<div class='form-grup'>
							<div class='label-form'>Teks</div>
							<input type='hidden' name='id' value='$d[id_teks]'>
							<input type='text' value='$d[teks]' class='form transi-3' name='teks' autocomplete='off' required>
						</div>
						
						<button class='bkirim transi-3' value='kirim' name='kirim'><span class='f-symbol1 f-none' style='margin-right:20px;'>?</span>EDIT TEKS</button>
						
					</form>
				</div>		
			</div>		
		</div>		
		
	";
		unset($_SESSION['suc']);
		unset($_SESSION['err']);
?>