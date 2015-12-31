<?php
	cek_err();
	cek_suc();
		
	
	echo "
	<script>
		document.title = 'Tambah Waste | DISPLAY PRD'
	</script>
	<script>
		$(document).ready(function(){
			$('.menu3').addClass('sidebar-dash-aktif');
		});

		
	</script>
		<div class='title-admin'>
			<div style='padding:20px; height:142px; background:rgba(0,0,0,0.4)'>
				<div style='font-size:70px; margin-right:15px; margin-top:10px;' class='f-putih f-symbol'>?</div>
					<div class='f-putih f24 f-segoe' style='padding:15px; margin-top:50px;'>Import Data Waste<br><div style='margin-top:7px;' class='f-segoe f-putih f16'><i>Form untuk menambahkan data waste...</i></div></div>
			</div>
		</div>
		<div class='title-dash'>
			<div class='f14'><a href='#' class='link-biru'>DISPLAY PRD</a> <span class='f-none f-symbol1'>&#215;</span> File</div>
		</div>
		
		<div class='wrapper-tengah'>
			<div class='wrapper-form' style='width:500px;'>
			<div class='title-form'><span class='f-symbol mr10'>?</span>IMPORT DATA WASTE</div>
				<div class='pd15'>
					<div class='psn'></div>
					<form method='POST' action='aksi_import_waste' id='form_input' enctype='multipart/form-data'>
						
						<div class='form-grup'>
							<div class='label-form'>Tahun</div>
							<select name='thn' class='form'>
								";
								for($thn=date('Y'); $thn>=date('Y', strtotime('-1 year')); $thn--)
								{
									echo "<option value='$thn'>$thn</option>";
								}
								echo "
							</select>";
							echo "
						</div>
						<div class='form-grup'>
							<div class='label-form'>Bulan</div>
							<select name='bln' class='form'>
								";
								for($bln=1; $bln<=12; $bln++)
								{
									$nameBln = no_echo_bulan($bln);
									echo "<option value='$bln'>$nameBln</option>";
								}
								echo "
							</select>";
							echo "
						</div>
						<div class='form-grup'>
							<div class='label-form'>File <i>(berupa file excel dengan format .xls)</i></div>
							<input type='file' id='src-gbr' name='file' required>
						</div>
						<button class='bkirim transi-3' value='kirim' name='kirim'><span class='f-symbol1 f-none' style='margin-right:20px;'>?</span>IMPORT DATA</button>
						
					</form>
				</div>		
			</div>		
		</div>		
		
	";
		unset($_SESSION['suc']);
		unset($_SESSION['err']);
?>