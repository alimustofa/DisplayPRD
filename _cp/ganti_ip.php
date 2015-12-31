<?php
	cek_err();
	cek_suc();
		
	
	$back = mfa(msq($kon, "select ip_xl from t_web"));
	echo "
	<script>
		document.title = 'Ganti IP XL | DISPLAY PRD'
	</script>
	<script>
		$(document).ready(function(){
			$('.menu11').addClass('sidebar-dash-aktif');
		});
	</script>
		<div class='title-admin'>
			<div style='padding:20px; height:142px; background:rgba(0,0,0,0.4)'>
				<div style='font-size:70px; margin-right:15px; margin-top:10px;' class='f-putih f-symbol'>?</div>
					<div class='f-putih f24 f-segoe' style='padding:15px; margin-top:50px;'>Ganti IP XL<br><div style='margin-top:7px;' class='f-segoe f-putih f16'><i>Form untuk mengganti IP Mesin XL...</i></div></div>
			</div>
		</div>
		<div class='title-dash'>
			<div class='f14'><a href='#' class='link-biru'>DISPLAY PRD</a> <span class='f-none f-symbol1'>&#215;</span> Form</div>
		</div>
		
		<div class='wrapper-tengah'>
			<div class='wrapper-form' style='width:500px;'>
			<div class='title-form'><span class='f-symbol mr10'>?</span>GANTI IP</div>
				<div class='pd15'>
					<div class='psn'></div>
					<form method='POST' action='aksi_ganti_ip' id='form_input' enctype='multipart/form-data'>
						<div class='form-grup'>
							<div class='label-form'>IP Mesin</div>
							<input type='text' class='form' name='ip_1' style='width:24%; text-align:center;' maxlength='3' required>
							<input type='text' class='form' name='ip_2' style='width:24%; text-align:center;' maxlength='3' required>
							<input type='text' class='form' name='ip_3' style='width:24%; text-align:center;' maxlength='3' required>
							<input type='text' class='form' name='ip_4' style='width:24%; text-align:center;' maxlength='3' required>
						</div>
						<button class='bkirim transi-3' value='kirim' name='kirim'><span class='f-symbol1 f-none' style='margin-right:20px;'>?</span>GANTI SEKARANG</button>
						
					</form>
				</div>		
			</div>		
		</div>		
		
	";
		unset($_SESSION['suc']);
		unset($_SESSION['err']);
?>