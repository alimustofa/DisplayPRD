<?php

	echo "
	<script>
		document.title = 'Beranda Admin | DISPLAY PRD'
	</script>
	<script>
			$(document).ready(function(){
				$('.menu1').addClass('sidebar-dash-aktif');
				$('#table, #table2').DataTable();
			});
	</script>
		<div class='header-admin'>
			<div style='padding:20px; height:142px; background:rgba(0,0,0,0.4)'>
				<div style='font-size:70px; margin-right:15px; margin-top:10px;' class='f-putih f-symbol'>.</div>
					<div class='f-putih f24 f-segoe animated fadeInDown' style='padding:15px; margin-top:50px;'>Selamat Datang <b>Admin</b><br><div style='margin-top:7px;' class='f-segoe f-putih f16'><i>Anda terlihat mengagumkan...</i></div></div>
			</div>
		</div>
		<div class='title-dash'>
			<div class='bdr-abu-r f-left' style='padding-right:5px; margin-right:10px;'>
				<div class='f-symbol1 f50 mr10'>/</div>
			</div>
			DASBOR
			<div class='f14'><a href='#' class='link-biru'>JADPEL STM</a> <span class='f-none f-symbol1'>×</span> Dasbor</div>
		</div>
		
		<div class='wrapper-tengah'>
			<div class='pd15'>";
				$j_karyawan = mnr(msq($kon, "SELECT * FROM t_karyawan"));
				$j_hr = mnr(msq($kon, "SELECT * FROM t_bagian"));
				$j_umum = mnr(msq($kon, "SELECT * FROM t_ik"));
				$j_mesin = mnr(msq($kon, "SELECT * FROM t_mesin"));
				echo "
				<div class='kotak-menu animated flipInY'>
					<div class='icon-kotak-menu f-symbol f-ungu'>.</div>
					<div class='f-right'>
						<div class='title-kotak-menu'>Karyawan</div>
						<div class='teks-kotak-menu'>$j_karyawan data</div>
					</div>
					<div class='cb'></div>
				</div>
				<div class='kotak-menu animated flipInY'>
					<div class='icon-kotak-menu f-symbol f-ungu'>u</div>
					<div class='f-right'>
						<div class='title-kotak-menu'>Bagian Kerja</div>
						<div class='teks-kotak-menu'>$j_hr data</div>
					</div>
					<div class='cb'></div>
				</div>
				<div class='kotak-menu animated flipInY'>
					<div class='icon-kotak-menu f-symbol f-ungu'>m</div>
					<div class='f-right'>
						<div class='title-kotak-menu'>Instruksi Kerja</div>
						<div class='teks-kotak-menu'>$j_umum data</div>
					</div>
					<div class='cb'></div>
				</div>
				<div class='kotak-menu animated flipInY'>
					<div class='icon-kotak-menu f-symbol f-ungu'>^</div>
					<div class='f-right'>
						<div class='title-kotak-menu'>Mesin</div>
						<div class='teks-kotak-menu'>$j_mesin data</div>
					</div>
					<div class='cb'></div>
				</div>
				
				
				<div class='wrapper-form f-left' style='width:650px; margin-right:15px;'>
					<div class='title-form'><span class='f-symbol mr10'>i</span>DATA KARYAWAN</div>
					<div class='pd15 ov-scr-a' style='overflow-y:scroll; height:400px;'>
						<table id='table' class='f-segoe' border='1' style='border:solid 1px rgba(0,0,0,0.3); border-collapse:collapse;'>
							<thead class='f12'>
								<tr class='title-field'>
									<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' aria-label='Office: activate to sort column ascending' style='width: 56px;'>NO</th>
									<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' aria-label='Office: activate to sort column ascending' style='width: 56px;'>NIK</th>
									<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' aria-label='Office: activate to sort column ascending' style='width: 56px;'>NAMA</th>
									<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' aria-label='Office: activate to sort column ascending' style='width: 56px;'>TANGGAL LAHIR</th>
								</tr>
							</thead>
							<tbody>";
								$no = 1;
								$q_karyawan = msq($kon, "SELECT * FROM t_karyawan ORDER BY nama ASC");
								
								while($d = mfa($q_karyawan))
								{
									echo "
								<tr style='background:rgba(255,255,255,0.4); font-size:12px;'>
									<td align='center'>$no</td>
									<td>$d[nik]</td>
									<td>$d[nama]</td>
									<td>$d[tgl_lhr]</td>
								</tr>";
									$no++;
								}
								echo "
							</tbody>
						</table>
					</div>		
				</div>
				<div class='wrapper-form f-left' style='width:365px;'>
					<div class='title-form'><span class='f-symbol mr10'>i</span>DATA MESIN</div>
					<div class='pd15 ov-scr-a' style='overflow-y:scroll; height:400px;'>
						<table id='table2' class='f-segoe' border='1' style='border:solid 1px rgba(0,0,0,0.3); border-collapse:collapse;'>
							<thead class='f12'>
								<tr class='title-field'>
									<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' aria-label='Office: activate to sort column ascending' style='width: 56px;'>NO</th>
									<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' aria-label='Office: activate to sort column ascending' style='width: 56px;'>NAMA MESIN</th>
									<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' aria-label='Office: activate to sort column ascending' style='width: 56px;'>BAGIAN</th>
								</tr>
							</thead>
							<tbody>";
								$no = 1;
								$q_mesin = msq($kon, "SELECT *,m.nama AS nama_mesin,b.nama AS nama_bagian FROM t_mesin m
														INNER JOIN t_bagian b ON m.id_bagian=b.id_bagian
														ORDER BY m.nama ASC");
								
								while($d = mfa($q_mesin))
								{
									echo "
								<tr style='background:rgba(255,255,255,0.4); font-size:12px;'>
									<td align='center'>$no</td>
									<td>$d[nama_mesin]</td>
									<td>$d[nama_bagian]</td>
								</tr>";
									$no++;
								}
								echo "
							</tbody>
						</table>
					</div>		
				</div>
			</div>
		</div>
		<div class='cb'></div>
	";
?>
		