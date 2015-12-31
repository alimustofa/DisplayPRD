<?php
	cek_err();
	cek_suc();
		
	
	echo "
	<script>
		document.title = 'Tambah Mesin | DISPLAY PRD'
	</script>
	<script>
		$(document).ready(function(){
			$('.menu7').addClass('sidebar-dash-aktif');
		});
	</script>
		<div class='title-admin'>
			<div style='padding:20px; height:142px; background:rgba(0,0,0,0.4)'>
				<div style='font-size:70px; margin-right:15px; margin-top:10px;' class='f-putih f-symbol'>?</div>
					<div class='f-putih f24 f-segoe' style='padding:15px; margin-top:50px;'>Tambah Mesin<br><div style='margin-top:7px;' class='f-segoe f-putih f16'><i>Form untuk menambahkan mesin...</i></div></div>
			</div>
		</div>
		<div class='title-dash'>
			<div class='f14'><a href='#' class='link-biru'>DISPLAY PRD</a> <span class='f-none f-symbol1'>&#215;</span> Form</div>
		</div>
		
		<div class='wrapper-tengah'>
			<div class='wrapper-form' style='width:500px;'>
			<div class='title-form'><span class='f-symbol mr10'>?</span>TAMBAH MESIN</div>
				<div class='pd15'>
					<form method='POST' action='aksi_tambah_mesin' id='form_input'>
						<div class='form-grup'>
							<div class='label-form'>NAMA MESIN</div>
							<input type='text' class='form transi-3' name='nama_mesin' autocomplete='off'>
						</div>
						<div class='form-grup'>
							<div class='label-form'>NAMA BAGIAN</div>
							<select class='form transi-3' name='id_bagian'>
								";
								$q_bag = msq($kon, "SELECT * FROM t_bagian ORDER BY nama ASC");
								while($d_bag = mfa($q_bag))
								{
									echo"<option value='$d_bag[id_bagian]'>$d_bag[nama]</option>";
								}
								
							echo"					
							</select>
						</div>
						<button class='bkirim transi-3' value='kirim' name='kirim'><span class='f-symbol1 f-none' style='margin-right:20px;'>?</span>TAMBAH MESIN</button>
						
					</form>
				</div>		
			</div>		
		</div>		
		
	";
		unset($_SESSION['suc']);
		unset($_SESSION['err']);
?>