<?php
	cek_err();
	cek_suc();
	
	$id = anti($_GET['id']);
	$q = msq($kon, "SELECT *,m.nama AS nama_mesin,b.nama AS nama_bagian FROM t_mesin m
						INNER JOIN t_bagian b ON m.id_bagian=b.id_bagian
						AND m.id_mesin='$id'
						ORDER BY m.nama ASC");
	$d = mfa($q);
	$j = mnr($q);
	
	if($j == 0)
	{
		referer();
	}

	echo "
	<script>
		$(document).ready(function(){
			$('.menu2').addClass('sidebar-dash-aktif');
		});
	</script>
	<script>
		document.title = 'Edit Mesin | DISPLAY PRD'
	</script>
		<div class='title-admin'>
			<div style='padding:20px; height:142px; background:rgba(0,0,0,0.4)'>
				<div style='font-size:70px; margin-right:15px; margin-top:10px;' class='f-putih f-symbol'>?</div>
					<div class='f-putih f24 f-segoe' style='padding:15px; margin-top:50px;'>Edit Mesin<br><div style='margin-top:7px;' class='f-segoe f-putih f16'><i>Form untuk mengedit data mesin...</i></div></div>
			</div>
		</div>
		<div class='title-dash'>
			<div class='f14'><a href='#' class='link-biru'>DISPLAY PRD</a> <span class='f-none f-symbol1'>&#215;</span> Form</div>
		</div>
		
		<div class='wrapper-tengah'>
			<div class='wrapper-form' style='width:500px;'>
				<div class='title-form'><span class='f-symbol mr10'>?</span>EDIT MESIN</div>
				<div class='pd15'>
					<form method='POST' action='aksi_edit_mesin' >
						<input type='hidden' class='form transi-3' name='id_mesin' value='$d[id_mesin]' required>
						<div class='form-grup'>
							<div class='label-form'>NAMA MESIN</div>
							<input type='text' class='form transi-3' name='nama_mesin' value='$d[nama_mesin]' autocomplete='off' required >
						</div>

						<div class='form-grup'>
							<div class='label-form'>NAMA BAGIAN</div>
							<select class='form transi-3' name='id_bagian'>
								<option>PILIH BAGIAN</option>";
								$q2 = msq($kon, "SELECT * FROM t_bagian ORDER BY nama ASC");
								while($d2 = mfa($q2))
								{
									echo"<option value='$d2[id_bagian]'>$d2[nama]</option>";
								}
								
							echo"					
							</select>
						</div>
						
						
						<button class='bkirim transi-3' value='kirim' name='kirim'><span class='f-symbol1 f-none' style='margin-right:20px;'>?</span>EDIT MESIN</button>
						
					</form>
				</div>		
			</div>		
		</div>		
		
	";
		unset($_SESSION['suc']);
		unset($_SESSION['err']);
?>