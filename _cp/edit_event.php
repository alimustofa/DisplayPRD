<?php
	cek_err();
	cek_suc();
		
	$id = anti($_GET['id']);
	$q = msq($kon, "SELECT * from t_event where id_event='$id'");
	$d = mfa($q);
	$j = mnr($q);
	
	if($j == 0)
	{
		referer();
	}
	
	
	echo "
	<script>
		document.title = 'Edit Event | DISPLAY PRD'
	</script>
	<script>
		$(document).ready(function(){
			$('.menu5').addClass('sidebar-dash-aktif');
		});
	</script>
		<div class='title-admin'>
			<div style='padding:20px; height:142px; background:rgba(0,0,0,0.4)'>
				<div style='font-size:70px; margin-right:15px; margin-top:10px;' class='f-putih f-symbol'>?</div>
					<div class='f-putih f24 f-segoe' style='padding:15px; margin-top:50px;'>Edit Event<br><div style='margin-top:7px;' class='f-segoe f-putih f16'><i>Form untuk mengedit event...</i></div></div>
			</div>
		</div>
		<div class='title-dash'>
			<div class='f14'><a href='#' class='link-biru'>DISPLAY PRD</a> <span class='f-none f-symbol1'>&#215;</span> Form</div>
		</div>
		
		<div class='wrapper-tengah'>
			<div class='wrapper-form' style='width:500px;'>
			<div class='title-form'><span class='f-symbol mr10'>?</span>EDIT EVENT</div>
				<div class='pd15'>
					<div class='psn'></div>
					<form method='POST' action='aksi_edit_event' id='form_input' enctype='multipart/form-data'>
						<input type='hidden' name='id' value='$d[id_event]'>
						<div class='form-grup'>
							<div class='label-form'>Judul</div>
							<input type='text' class='form transi-3' value='$d[judul]' name='judul' autocomplete='off' required>
						</div>
						<div class='form-grup'>
							<div class='label-form'>Waktu Awal</div>
							<input type='text' id='timepicker' class='form transi-3' value='$d[waktu_mulai]' name='waktu_awal' max-length='16' autocomplete='off' required>
						</div>
						<div class='form-grup'>
							<div class='label-form'>Waktu Akhir</div>
							<input type='text' id='timepicker1' class='form transi-3' name='waktu_akhir' value='$d[waktu_akhir]' max-length='16' autocomplete='off' required>
						</div>
						<div class='form-grup'>
							<div class='label-form'>Tempat</div>
							<input type='text' class='form transi-3' name='tempat' autocomplete='off' required value='$d[tempat]'>
						</div>
						
						
						<button class='bkirim transi-3' value='kirim' name='kirim'><span class='f-symbol1 f-none' style='margin-right:20px;'>?</span>EDIT EVENT</button>
						
					</form>
				</div>		
			</div>		
		</div>		
		
	";
		unset($_SESSION['suc']);
		unset($_SESSION['err']);
?>