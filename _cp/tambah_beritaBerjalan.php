<?php
	cek_err();
	cek_suc();
		
	

	echo "
	<script>
		document.title = 'Tambah Galeri Foto | DISPLAY PRD'
	</script>
	<script>
		$(document).ready(function(){
			$('.menu4').addClass('sidebar-dash-aktif');
		});
	</script>
		<div class='title-admin'>
			<div style='padding:20px; height:142px; background:rgba(0,0,0,0.4)'>
				<div style='font-size:70px; margin-right:15px; margin-top:10px;' class='f-putih f-symbol'>?</div>
					<div class='f-putih f24 f-segoe' style='padding:15px; margin-top:50px;'>Tambah Berita Berjalan<br><div style='margin-top:7px;' class='f-segoe f-putih f16'><i>Form untuk menambahkan berita berjalan baru...</i></div></div>
			</div>
		</div>
		<div class='title-dash'>
			<div class='f14'><a href='#' class='link-biru'>DISPLAY PRD</a> <span class='f-none f-symbol1'>&#215;</span> Form</div>
		</div>
		
		<div class='wrapper-tengah'>
			<div class='wrapper-form' style='width:500px;'>
			<div class='title-form'><span class='f-symbol mr10'>?</span>TAMBAH BERITA BERJALAN</div>
				<div class='pd15'>
					<div class='psn'></div>
					<form method='POST' action='aksi_tambah_beritaBerjalan' id='form_input' enctype='multipart/form-data'>
						<div class='form-grup'>
							<div class='label-form'>Teks</div>
							<input type='text' class='form transi-3' name='teks' autocomplete='off' required>
						</div>
						
						<button class='bkirim transi-3' value='kirim' name='kirim'><span class='f-symbol1 f-none' style='margin-right:20px;'>?</span>TAMBAH TEKS</button>
						
					</form>
				</div>		
			</div>		
		</div>		
		
	";
		unset($_SESSION['suc']);
		unset($_SESSION['err']);
?>