<?php
	cek_err();
	cek_suc();
	
	$id = anti($_GET['id']);
	$q = msq($kon, "SELECT *, k.id_bagian as k_bag, b.id_bagian as b_bag, k.nama as nama_kar, b.nama as nama_bagian from t_karyawan k inner join t_bagian b on b.id_bagian=k.id_bagian where nik='$id'");
	$d = mfa($q);
	$j = mnr($q);
	
	if($j == 0)
	{
		referer();
	}

	echo "
	<script>
		document.title = 'Edit Karyawan | DISPLAY PRD'
	</script>
	<script>
		$(document).ready(function(){
			$('.menu9').addClass('sidebar-dash-aktif');
		});
	</script>
		<div class='title-admin'>
			<div style='padding:20px; height:142px; background:rgba(0,0,0,0.4)'>
				<div style='font-size:70px; margin-right:15px; margin-top:10px;' class='f-putih f-symbol'>?</div>
					<div class='f-putih f24 f-segoe' style='padding:15px; margin-top:50px;'>Edit Karyawan<br><div style='margin-top:7px;' class='f-segoe f-putih f16'><i>Form untuk mengedit karyawan...</i></div></div>
			</div>
		</div>
		<div class='title-dash'>
			<div class='f14'><a href='#' class='link-biru'>DISPLAY PRD</a> <span class='f-none f-symbol1'>&#215;</span> Form</div>
		</div>
		
		<div class='wrapper-tengah'>
			<div class='wrapper-form' style='width:500px;'>
			<div class='title-form'><span class='f-symbol mr10'>?</span>EDIT KARYAWAN</div>
				<div class='pd15'>
					<div class='psn'></div>
					<form method='POST' action='aksi_edit_karyawan' id='form_input' enctype='multipart/form-data'>
						<div class='form-grup'>
							<div class='label-form'>NIK KARYAWAN</div>
							<input type='text' readonly maxlength='12' class='form transi-3' value='$d[nik]' name='nik' autocomplete='off' required>
						</div>
						<div class='form-grup'>
							<div class='label-form'>NAMA KARYAWAN</div>
							<input type='text' class='form transi-3' name='nama' value='$d[nama_kar]' autocomplete='off' required>
						</div>
						<div class='form-grup'>
							<div class='label-form'>TGL LAHIR KARYAWAN</div>
							<input type='text' id='datepicker' class='form transi-3' value='$d[tgl_lhr]' name='tgl_lahir' maxlength='10' autocomplete='off' required>
						</div>
							<script>
								function ambil_mesin()
								{
									var id_bagian = $('#id_bagian').val();
									
									$.ajax({
										type: 'POST',
										url: 'aksi_ambil_mesin',
										data: {id_bagian:id_bagian},
										dataType: 'html',
										success: function(msg)
										{
											$('#wr-idmesin').fadeIn();
											$('#id_mesin').html(msg);
										}
									});
									
									return false;
								}

								function ambil_tugas()
								{
									var id_bagian = $('#id_bagian').val();
									
									$.ajax({
										type: 'POST',
										url: 'aksi_ambil_tugas',
										data: {id_bagian:id_bagian},
										dataType: 'html',
										success: function(msg)
										{
											$('#wr-idtugas').fadeIn();
											$('#id_tugas').html(msg);
										}
									});
									
									return false;
								}
							</script>
						<div class='form-grup'>
							<div class='label-form'>NAMA BAGIAN</div>
							<select class='form transi-3' id='id_bagian' name='id_bagian' onchange='ambil_mesin(); ambil_tugas();' required>
								";
								
								$q_bagian = msq($kon, "SELECT * FROM t_bagian ORDER BY nama ASC");
								while($d_bagian = mfa($q_bagian))
								{
									if($d['id_bagian'] == $d_bagian['id_bagian'])
									{
										$slc = "selected";
									}
									else
									{
										$slc = "";
									}
									echo"<option value='$d_bagian[id_bagian]' $slc>$d_bagian[nama]</option>";
								}
								
							echo"					
							</select>
						</div>
						<div class='form-grup'>
							<div class='label-form'>NAMA MESIN</div>
							<select class='form transi-3' name='id_mesin' id='id_mesin' required>
								";
								$q_mesin = msq($kon, "SELECT * FROM t_mesin where id_bagian='$d[id_bagian]' ORDER BY nama ASC");
								while($d_mesin = mfa($q_mesin))
								{
									if($d['id_mesin'] == $d_mesin['id_mesin'])
									{
										$slc = "selected";
									}
									else
									{
										$slc = "";
									}
									echo"<option value='$d_mesin[id_mesin]' $slc>$d_mesin[nama]</option>";
								}
								
							echo"					
							</select>
						</div>
						<div class='form-grup'>
							<div class='label-form'>TUGAS</div>
							<select class='form transi-3' name='tugas' id='id_tugas' required>
								";
								$q_tugas = msq($kon, "SELECT * FROM t_tugas where id_bagian='$d[id_bagian]' ORDER BY tugas ASC");
								while($d_tugas = mfa($q_tugas))
								{
									if($d['tugas'] == $d_tugas['id_tugas'])
									{
										$slc = "selected";
									}
									else
									{
										$slc = "";
									}
									echo"<option value='$d_tugas[id_tugas]' $slc>$d_tugas[tugas]</option>";
								}
								
							echo"					
							</select>
						</div>
						<div class='form-grup'>
							<div class='label-form'>FOTO KARYAWAN</div>
							<img src='_asset/_images/_karyawan/$d[foto]' id='gbr' width='100px' style='border:solid 1px #ccc; padding:10px; background:#eee;'>
							<br><br>
							<input type='file' id='src-gbr' name='foto'>
						</div>
						<button class='bkirim transi-3' value='kirim' name='kirim'><span class='f-symbol1 f-none' style='margin-right:20px;'>?</span>EDIT KARYAWAN</button>
						
					</form>
				</div>		
			</div>		
		</div>		
		
	";
		unset($_SESSION['suc']);
		unset($_SESSION['err']);
?>