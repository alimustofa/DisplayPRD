<?php
	cek_err();
	cek_suc();
	
	// $q_cek_jpm = msq($kon, "select * from t_jpm where tgl_mulai<=now() and tgl_akhir>=now()");
	// $jml_cek_jpm = mnr($q_cek_jpm);

	// if($jml_cek_jpm==1)
	// {
	// 	$d_cek_jpm = mfa($q_cek_jpm);
	// 	header("Location: tambahjpmb_$d_cek_jpm[id_jpm]");
	// }


	$tgl_jpm = mfa(msq($kon, "select * from t_jpm order by id_jpm desc limit 1"));
	$q_cek_jpm = msq($kon, "select id_jpm,count(id_jpm) as jml from t_jpm where tgl_mulai='$tgl_jpm[tgl_mulai]' and tgl_akhir='$tgl_jpm[tgl_akhir]' group by tgl_mulai, tgl_akhir");
	$jml_cek_jpm = mfa($q_cek_jpm);
	if($jml_cek_jpm['jml']==1)
	{
		$d_cek_jpm = mfa($q_cek_jpm);
		header("Location: tambahjpmb_$d_cek_jpm[id_jpm]");
	}
	
	echo "
	<script>
		document.title = 'Tambah JPM | DISPLAY PRD'
	</script>
	<script>
		$(document).ready(function(){
			$('.menu2').addClass('sidebar-dash-aktif');
		    $('.table').dataTable({
		        'paging': false
		    });
		});
	</script>
		<div class='title-admin'>
			<div style='padding:20px; height:142px; background:rgba(0,0,0,0.4)'>
				<div style='font-size:70px; margin-right:15px; margin-top:10px;' class='f-putih f-symbol'>?</div>
					<div class='f-putih f24 f-segoe' style='padding:15px; margin-top:50px;'>Tambah JPM A<br><div style='margin-top:7px;' class='f-segoe f-putih f16'><i>Form untuk menambahkan jadwal pekerjaan mingguan...</i></div></div>
			</div>
		</div>
		<div class='title-dash'>
			<div class='f14'><a href='#' class='link-biru'>DISPLAY PRD</a> <span class='f-none f-symbol1'>&#215;</span> Form</div>
		</div>
		<script>
		$(document).ready(function(){
			$('.close-cek-penyelia').click(function(){
				$('.wrapper-cek-penyelia').fadeOut();
				var nik_peny = $('#in_id').val();
				$('#id_nik_'+nik_peny).prop('checked',false);
			});

			$('.kirim-lokasi').click(function(){
				var nik = $('#in_id').val();
				var id_tugas = $('input:radio[name=lokasi]:checked').val();
				
				$.ajax({
					url: 'aksi_simpan_lokasi',
					type: 'POST',
					dataType: 'json',
					data: 'nik='+nik+'&id_tugas='+id_tugas,
					success:function(d){
						if(d['hasil']=='1')
						{
							$('.wrapper-cek-penyelia').fadeOut();									
						}
						else
						{
							alert('gagal simpan');
						}
					}

				});
			});
		});
			
		</script>
		<div class='wrapper-cek-penyelia overlay' style=''>
			<div class='wrapper-form' style='width:400px;'>
				<div class='title-form'><span class='f-symbol mr10'>?</span>LOKASI PENYELIA</div>
				<div class='pd15'>
					<input type='hidden' name='nik' id='in_id' value=''>";
					$q_peny = msq($kon, "select * from t_tugas where id_bagian='2' order by id_tugas desc limit 2");
					$no = 1;
					while($d_peny = mfa($q_peny))
					{
						if($no==1)
						{
							$checked = 'checked';
						}
						else
						{
							$checked = '';
						}
						echo "<label for='$d_peny[id_tugas]' style='font-family:calibri;'><input type='radio' id='$d_peny[id_tugas]' value='$d_peny[id_tugas]' name='lokasi' $checked>$d_peny[tugas]</label>";
						$no++;
					}
					echo "
				</div>
				<div style='background:#eee; padding:10px;'>
					<button class='close-cek-penyelia' style='background:#D48B95; padding:10px; color:white; border:none; float:right'>Batal</button>
					<button class='kirim-lokasi' style='background:#48cb86; padding:10px; color:white; border:none; float:right'>Simpan</button>
					<div class='cb'></div>
				</div>
			</div>
		</div>

		<div class='wrapper-tengah'>
			<div class='wrapper-form' style='width:1000px;'>
			<div class='title-form'><span class='f-symbol mr10'>?</span>TAMBAH JPM</div>
				<div class='pd15'>
					<form method='POST' action='aksi_tambah_jpm' id='form_input'>
						<div class='form-grup f-left' style='width:48.5%; margin-right:20px;'>
							<div class='label-form'>TGL MULAI</div>
							<input type='text' id='datepicker' class='form transi-3' name='tgl_mulai'>
						</div>
						<div class='form-grup f-left' style='width:48.5%; margin-bottom:20px;'>
							<div class='label-form'>TGL AKHIR</div>
							<input type='text' id='datepicker1' class='form transi-3' name='tgl_akhir'>
						</div> 
						<script>
							// function hide_penyelia_1()
							// {
							// 	var v_p1_1 = $('#p1_1').val();

							// 	$('#p1_2').val('PILIH PENYELIA PROCESSING');
							// 	$('#p2_1').val('PILIH PENYELIA PACKING');
							// 	$('#p2_2').val('PILIH PENYELIA PROCESSING');

							// 	$('#p1_2').attr('disabled',false);
							// 	$('#p1_2 option').show();
							// 	$('#p2_1 option').show();
							// 	$('#p2_2 option').show();
							// 	$('#p1_2 option[value='+v_p1_1+']').hide();
							// }
							// function hide_penyelia_2()
							// {
							// 	var v_p1_1 = $('#p1_1').val();
							// 	var v_p1_2 = $('#p1_2').val();

							// 	$('#p2_1').val('PILIH PENYELIA PACKING');

							// 	$('#p2_1').attr('disabled',false);
							// 	$('#p2_1 option[value='+v_p1_2+']').hide();
							// 	$('#p2_1 option[value='+v_p1_1+']').hide();
							// }
							// function hide_penyelia_3()
							// {
							// 	var v_p1_1 = $('#p1_1').val();
							// 	var v_p1_2 = $('#p1_2').val();
							// 	var v_p2_3 = $('#p2_1').val();

							// 	$('#p2_2').val('PILIH PENYELIA PROCESSING');

							// 	$('#p2_2').attr('disabled',false);
							// 	$('#p2_2 option[value='+v_p1_1+']').hide();
							// 	$('#p2_2 option[value='+v_p1_2+']').hide();
							// 	$('#p2_2 option[value='+v_p2_3+']').hide();
							// }
						</script>
						
					<!--<div class='form-grup f-left' style='width:48.5%; margin-right:20px;'>
							<div class='label-form'>PENYELIA SHIFT I</div>
							<select class='form transi-3' name='peny_1_1' id='p1_1' style='margin-bottom:10px;' onchange='hide_penyelia_1()'>
								<option>PILIH PENYELIA PACKING</option>";
								$q_p1 = msq($kon, "SELECT * FROM t_karyawan where id_bagian='2' ORDER BY nama ASC");
								while($d_p1 = mfa($q_p1))
								{
									echo"<option value='$d_p1[nik]'>$d_p1[nama]</option>";
								}
								
							echo"					
							</select>
							<select class='form transi-3' name='peny_1_2' id='p1_2' disabled='disabled' onchange='hide_penyelia_2()'>
								<option>PILIH PENYELIA PROCESSING</option>";
								$q_p1 = msq($kon, "SELECT * FROM t_karyawan where id_bagian='2' ORDER BY nama ASC");
								while($d_p1 = mfa($q_p1))
								{
									echo"<option value='$d_p1[nik]'>$d_p1[nama]</option>";
								}
								
							echo"					
							</select>
						</div>
						<div class='form-grup f-left' style='width:48.5%;'>
							<div class='label-form'>PENYELIA SHIFT II</div>
							<select class='form transi-3' name='peny_2_1' id='p2_1' disabled='disabled' style='margin-bottom:10px;' onchange='hide_penyelia_3()'>
								<option>PILIH PENYELIA PACKING</option>";
								$q_p1 = msq($kon, "SELECT * FROM t_karyawan where id_bagian='2' ORDER BY nama ASC");
								while($d_p1 = mfa($q_p1))
								{
									echo"<option value='$d_p1[nik]'>$d_p1[nama]</option>";
								}
								
							echo"					
							</select>
							<select class='form transi-3' name='peny_2_2' id='p2_2' disabled='disabled'>
								<option>PILIH PENYELIA PROCESSING</option>";
								$q_p1 = msq($kon, "SELECT * FROM t_karyawan where id_bagian='2' ORDER BY nama ASC");
								while($d_p1 = mfa($q_p1))
								{
									echo"<option value='$d_p1[nik]'>$d_p1[nama]</option>";
								}
								
							echo"					
							</select>
						</div>
					-->
						<br><br><br>	
						<br><br><br>	
					<style>
						.mesin-aktif
						{
							background:rgba(225, 213, 224, 1)!important;
						}
					</style>
					<script>
						var a=0;
						function show_mesin(id)
						{
							var lastMesin = $('#lastMesin').val();
							

							if(id==lastMesin)
							{
								$('.wrap-mesin-'+lastMesin).slideUp();
								$('.mesin-'+lastMesin).removeClass('mesin-aktif');
								lastMesin = 0;
							}
							else
							{	
								$('.wrap-mesin-'+lastMesin).slideUp();
								$('.mesin-'+lastMesin).removeClass('mesin-aktif');


								$('#lastMesin').val(id);
								$('.wrap-mesin-'+id).slideDown();
								$('.mesin-'+id).addClass('mesin-aktif');

								if(a!=0)
								{
									$('.wrap-mesin-'+id).slideUp();
									a=1;
								}
								else
								{
									a=0;
								}
							}
							
						}
					</script>
					<input type='hidden' id='lastMesin' value=''>
					";

					$q_mes_pasang = msq($kon, "select * from t_mesin_detail");
					
					while($d_mes_pasang = mfa($q_mes_pasang))
					{
						$nama_pack = mfa(msq($kon,"select * from t_mesin where id_mesin=$d_mes_pasang[id_mesin_pack]"));
						$nama_fill = mfa(msq($kon,"select * from t_mesin where id_mesin=$d_mes_pasang[id_mesin_fill]"));

						$nama_mesin = $nama_pack['nama']." - ".$nama_fill['nama'];
													
						

					echo "

					<div style='width:100%; border:solid 1px #ccc; margin-bottom:10px;'>
						<div style='background:#eee; border-bottom: solid 1px #ccc; padding:15px;' class='tbl-mesin mesin-$nama_pack[id_mesin] pointer' onclick='show_mesin($nama_pack[id_mesin])'>$nama_mesin<div class='f-right f-symbol1'>></div></div>
							<div class='wrap-mesin wrap-mesin-$nama_pack[id_mesin]' style='display:none;'>
							<div class='form-grup' style='margin:10px;'>
								<div class='label-form'>NAMA SHIFT</div>
								<select class='form transi-3' name='id_shift_$nama_pack[id_mesin]'>
									<option>PILIH SHIFT</option>";
									$q_shift = msq($kon, "SELECT * FROM t_shift ORDER BY nama ASC");
									while($d_shift = mfa($q_shift))
									{
										echo"<option value='$d_shift[id_shift]'>$d_shift[nama] ( $d_shift[wkt_mulai] - $d_shift[wkt_akhir] )</option>";
									}
									
								echo"					
								</select>
							</div>
							<div style='height:200px; overflow-y:scroll;' class='ov-scr'>
							<table class='table' width='96%'' class='f-segoe hover stripe' border='1' style='margin-left:10px !important; margin:10px !important; border:solid 1px rgba(0,0,0,0.3); border-collapse:collapse;'>
								<thead class='f12'>
									<tr class='title-field'>
										<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' aria-label='Office: activate to sort column ascending' style='width: 56px;'>PILIH</th>
										<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' aria-label='Office: activate to sort column ascending' style='width: 56px;'>NIK</th>
										<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' aria-label='Office: activate to sort column ascending' style='width: 56px;'>NAMA</th>
										<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' aria-label='Office: activate to sort column ascending' style='width: 156px;'>TUGAS</th>
									
									</tr>
								</thead>
								<tbody>";
									$no = 1;
									$q = msq($kon, "SELECT *, t.tugas AS nama_tugas, k.nama AS nama_karyawan, b.nama AS nama_bagian,m.nama AS nama_mesin FROM t_karyawan k
													INNER JOIN t_bagian b ON k.id_bagian=b.id_bagian
													INNER JOIN t_mesin m ON m.id_mesin=k.id_mesin
													INNER JOIN t_tugas t ON k.tugas=t.id_tugas
													WHERE m.id_mesin=$nama_fill[id_mesin] or m.id_mesin=$nama_pack[id_mesin] order by m.id_bagian");
										
									
									echo "
									<script>
										function del_conf(data)
										{	
											$.ajax({
												url:'aksi_ambil_data_hapus',
												type:'POST',
												data:'nik='+data,
												dataType:'json',
												success:function(d){
													$('.wrapper-load-hapus').fadeIn();
													$('.l-nama').html(d['nama']);											
													$('.l-id').val(d['id']);											
												}
											});
											return false;
										}
										
										function close_del_conf()
										{				
											$('.wrapper-load-hapus').fadeOut();
										}

										// function cek_penyelia(nik)
										// {
										// 	if($('#id_nik_'+nik).is(':checked'))
										// 	{
										// 		$.ajax({
										// 			url:'aksi_cek_penyelia',
										// 			type:'POST',
										// 			data:'nik='+nik,
										// 			dataType: 'json',
										// 			success: function(d){
										// 				if(d['hasil']=='1')
										// 				{
										// 					$('#in_id').val(nik);
										// 					$('.wrapper-cek-penyelia').fadeIn();
										// 				}
										// 			}
										// 		});
										// 	}
										// 	return false;
										// }
									</script>
									";
									while($d = mfa($q))
									{
										if($d['id_bagian']=='3')
										{
											$bg = '#ddd';
										}
										else
										{
											$bg = '';
										}

										if($d['tugas']=='Operator')
										{
											$tgs = $d['tugas']." ".$d['nama_bagian'];
										}
										else
										{
											$tgs = $d['tugas'];
										}
										echo "
									<tr style='font-size:12px; background:$bg;'>
										<td align='center'><input type='checkbox' name='nik[]' value='$d[nik]'></td>	
										<td>$d[nik]</td>
										<td>$d[nama_karyawan]</td>
										<td>$tgs</	td>
										
										<div class='psn'></div>
									</tr>";
										$no++;
									}
									echo "
								</tbody>
							</table>
							</div>
						</div>
					</div>
					";	
					}

					$q_mes = msq($kon, "SELECT
										DISTINCT
										m.*
									FROM
										t_mesin m
									left join t_karyawan k
									on m.id_mesin=k.id_mesin
									WHERE
										k.id_mesin is not null
										AND
										m.id_mesin NOT IN (
											SELECT
												id_mesin_pack
											FROM
												t_mesin_detail
										)
									AND m.id_mesin NOT IN (
										SELECT
											id_mesin_fill
										FROM
											t_mesin_detail
									)");
					
					while($d_mes = mfa($q_mes))
					{
						
					echo "
					<div style='width:100%; border:solid 1px #ccc; margin-bottom:10px;'>
						<div style='background:#eee; border-bottom: solid 1px #ccc; padding:15px;' class='tbl-mesin  mesin-$d_mes[id_mesin] pointer' onclick='show_mesin($d_mes[id_mesin])'>$d_mes[nama]<div class='f-right f-symbol1'>></div></div>
							<div class='wrap-mesin-$d_mes[id_mesin]' style='display:none;'>
							<div class='form-grup' style='margin:10px;'>
								<div class='label-form'>NAMA SHIFT</div>
								<select class='form transi-3' name='id_shift_$d_mes[id_mesin]'>
									<option>PILIH SHIFT</option>";
									$q_shift = msq($kon, "SELECT * FROM t_shift ORDER BY nama ASC");
									while($d_shift = mfa($q_shift))
									{
										echo"<option value='$d_shift[id_shift]'>$d_shift[nama] ( $d_shift[wkt_mulai] - $d_shift[wkt_akhir] )</option>";
									}
									
								echo"					
								</select>
							</div>
							<div style='height:200px; overflow-y:scroll;' class='ov-scr'>
							<table class='table' width='96%'' class='f-segoe hover stripe' border='1' style='margin-left:10px !important; margin:10px !important; border:solid 1px rgba(0,0,0,0.3); border-collapse:collapse;'>
								<thead class='f12'>
									<tr class='title-field'>
										<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' aria-label='Office: activate to sort column ascending' style='width: 56px;'>PILIH</th>
										<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' aria-label='Office: activate to sort column ascending' style='width: 56px;'>NIK</th>
										<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' aria-label='Office: activate to sort column ascending' style='width: 56px;'>NAMA</th>
										<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' aria-label='Office: activate to sort column ascending' style='width: 156px;'>TUGAS</th>
									
									</tr>
								</thead>
								<tbody>";
									$no = 1;
									$q = msq($kon, "SELECT *, t.tugas AS nama_tugas, k.nama AS nama_karyawan, b.nama AS nama_bagian,m.nama AS nama_mesin FROM t_karyawan k
													INNER JOIN t_bagian b ON k.id_bagian=b.id_bagian
													INNER JOIN t_mesin m ON m.id_mesin=k.id_mesin
													INNER JOIN t_tugas t ON k.tugas=t.id_tugas
													WHERE k.id_mesin=$d_mes[id_mesin] order by m.id_mesin");
										
									
									echo "
									<script>
										function del_conf(data)
										{	
											$.ajax({
												url:'aksi_ambil_data_hapus',
												type:'POST',
												data:'nik='+data,
												dataType:'json',
												success:function(d){
													$('.wrapper-load-hapus').fadeIn();
													$('.l-nama').html(d['nama']);											
													$('.l-id').val(d['id']);											
												}
											});
											return false;
										}
										
										function close_del_conf()
										{				
											$('.wrapper-load-hapus').fadeOut();
										}

										// function cek_penyelia(nik)
										// {
										// 	if($('#id_nik_'+nik).is(':checked'))
										// 	{
										// 		$.ajax({
										// 			url:'aksi_cek_penyelia',
										// 			type:'POST',
										// 			data:'nik='+nik,
										// 			dataType: 'json',
										// 			success: function(d){
										// 				if(d['hasil']=='1')
										// 				{
										// 					$('#in_id').val(nik);
										// 					$('.wrapper-cek-penyelia').fadeIn();
										// 				}
										// 			}
										// 		});
										// 	}
										// 	return false;
										// }
									</script>
									";
									while($d = mfa($q))
									{
										if($d['id_bagian']=='3')
										{
											$bg = '#ddd';
										}
										else
										{
											$bg = '';
										}

										if($d['tugas']=='Operator')
										{
											$tgs = $d['tugas']." ".$d['nama_bagian'];
										}
										else
										{
											$tgs = $d['tugas'];
										}
										echo "
									<tr style='font-size:12px; background:$bg;'>
										<td align='center'><input type='checkbox' name='nik[]' value='$d[nik]'></td>	
										<td>$d[nik]</td>
										<td>$d[nama_karyawan]</td>
										<td>$tgs</	td>
										
										<div class='psn'></div>
									</tr>";
										$no++;
									}
									echo "
								</tbody>
							</table>
							</div>
						</div>
					</div>
					";	
					}
					echo "
						<button class='bkirim transi-3' value='kirim' name='kirim'><span class='f-symbol1 f-none' style='margin-right:20px;'>?</span>TAMBAH SHIFT II</button>
					</form>
				</div>		
			</div>		
		</div>		
		
	";
		unset($_SESSION['suc']);
		unset($_SESSION['err']);
?>