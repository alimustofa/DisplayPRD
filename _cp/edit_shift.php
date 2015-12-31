<?php
	cek_err();
	cek_suc();
	
	$id = anti($_GET['id']);
	$q = msq($kon, "SELECT * FROM t_shift WHERE id_shift='$id'");
	$d = mfa($q);
	$j = mnr($q);
	
	if($j == 0)
	{
		referer();
	}
	
	echo "
	<script>
		document.title = 'Edit Shift | DISPLAY PRD'
	</script>
	<script>
		$(document).ready(function(){
			$('.menu8').addClass('sidebar-dash-aktif');
		});
	</script>
		<div class='title-admin'>
			<div style='padding:20px; height:142px; background:rgba(0,0,0,0.4)'>
				<div style='font-size:70px; margin-right:15px; margin-top:10px;' class='f-putih f-symbol'>?</div>
					<div class='f-putih f24 f-segoe' style='padding:15px; margin-top:50px;'>Edit Shift<br><div style='margin-top:7px;' class='f-segoe f-putih f16'><i>Form untuk mengedit shift...</i></div></div>
			</div>
		</div>
		<div class='title-dash'>
			<div class='f14'><a href='#' class='link-biru'>DISPLAY PRD</a> <span class='f-none f-symbol1'>&#215;</span> Form</div>
		</div>
		
		<div class='wrapper-tengah'>
			<div class='wrapper-form' style='width:500px;'>
			<div class='title-form'><span class='f-symbol mr10'>?</span>EDIT SHIFT</div>
				<div class='pd15'>
					<div class='psn'></div>
					<form method='POST' action='aksi_edit_shift' id='form_input'>
						<input type='hidden' name='id' value='$d[id_shift]'>
						<div class='form-grup'>
							<div class='label-form'>NAMA SHIFT</div>
							<input type='text' class='form transi-3' name='nama' autocomplete='off' value='$d[nama]' required>
						</div>
						<div class='form-grup'>
							<div class='label-form'>JAM MULAI</div>
							<input type='text' class='form transi-3 time' name='wkt_mulai' value='$d[wkt_mulai]' autocomplete='off' maxlength='5' required>
						</div>
						<div class='form-grup'>
							<div class='label-form'>JAM SELESAI</div>
							<input type='text' class='form transi-3 time' name='wkt_akhir' autocomplete='off' value='$d[wkt_akhir]' maxlength='5' required>
						</div>
						<div class='form-grup'>
							<div class='label-form'>JAM BREAK MULAI</div>
							<input type='text' class='form transi-3 time' name='wkt_break_mulai' autocomplete='off' maxlength='5' value='$d[wkt_break_mulai]' required>
						</div>
						<div class='form-grup'>
							<div class='label-form'>JAM BREAK SELESAI</div>
							<input type='text' class='form transi-3 time' name='wkt_break_akhir' autocomplete='off' value='$d[wkt_break_akhir]' maxlength='5' required>
						</div>
						<div class='form-grup'>
							<div class='label-form'>KETERANGAN<span class='f14'><i> &emsp;*isi bila perlu</i></span></div>
							<input type='text' class='form transi-3' name='keterangan' autocomplete='off' value='$d[keterangan]'>
						</div>
						<button class='bkirim transi-3' value='kirim' name='kirim'><span class='f-symbol1 f-none' style='margin-right:20px;'>?</span>EDIT SHIFT</button>
						
					</form>
				</div>		
			</div>		
		</div>		
		
	";
		unset($_SESSION['suc']);
		unset($_SESSION['err']);
?>