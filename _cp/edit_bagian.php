<?php
	cek_err();
	cek_suc();
	
	$id = anti($_GET['id']);
	$q = msq($kon, "SELECT * FROM t_bagian WHERE id_bagian='$id'");
	$d = mfa($q);
	$j = mnr($q);
	
	if($j == 0)
	{
		referer();
	}

	echo "
	<script>
		$(document).ready(function(){
			$('.menu6').addClass('sidebar-dash-aktif');
		});
	</script>
	<script>
		document.title = 'Edit Bagian Kerja | DISPLAY PRD'
	</script>
		<div class='title-admin'>
			<div style='padding:20px; height:142px; background:rgba(0,0,0,0.4)'>
				<div style='font-size:70px; margin-right:15px; margin-top:10px;' class='f-putih f-symbol'>?</div>
					<div class='f-putih f24 f-segoe' style='padding:15px; margin-top:50px;'>Edit Bagian Kerja<br><div style='margin-top:7px;' class='f-segoe f-putih f16'><i>Form untuk mengedit data bagian kerja...</i></div></div>
			</div>
		</div>
		<div class='title-dash'>
			<div class='f14'><a href='#' class='link-biru'>DISPLAY PRD</a> <span class='f-none f-symbol1'>&#215;</span> Form</div>
		</div>
		
		<div class='wrapper-tengah'>
			<div class='wrapper-form' style='width:500px;'>
				<div class='title-form'><span class='f-symbol mr10'>?</span>EDIT BAGIAN KERJA</div>
				<div class='pd15'>
					<form method='POST' action='aksi_edit_bagian' enctype='multipart/form-data'>
						<input type='hidden' class='form transi-3' name='id' value='$d[id_bagian]' required>
						<div class='form-grup'>
							<div class='label-form'>NAMA BAGIAN KERJA</div>
							<input type='text' class='form transi-3' name='nama_bagian' value='$d[nama]' autocomplete='off' required >
						</div>
						
						
						<button class='bkirim transi-3' value='kirim' name='kirim'><span class='f-symbol1 f-none' style='margin-right:20px;'>?</span>EDIT BAGIAN KERJA</button>
						
					</form>
				</div>		
			</div>		
		</div>		
		
	";
		unset($_SESSION['suc']);
		unset($_SESSION['err']);
?>