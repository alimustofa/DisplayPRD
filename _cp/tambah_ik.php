<?php
	cek_err();
	cek_suc();
		
	
	echo "
	<script>
		document.title = 'Tambah IK | DISPLAY PRD'
	</script>
	<script>
		$(document).ready(function(){
			$('.menu3').addClass('sidebar-dash-aktif');
			$('#table').DataTable();
		});

		
	</script>
		<div class='title-admin'>
			<div style='padding:20px; height:142px; background:rgba(0,0,0,0.4)'>
				<div style='font-size:70px; margin-right:15px; margin-top:10px;' class='f-putih f-symbol'>?</div>
					<div class='f-putih f24 f-segoe' style='padding:15px; margin-top:50px;'>Import Data IK<br><div style='margin-top:7px;' class='f-segoe f-putih f16'><i>Form untuk menambahkan data instruksi kerja...</i></div></div>
			</div>
		</div>
		<div class='title-dash'>
			<div class='f14'><a href='#' class='link-biru'>DISPLAY PRD</a> <span class='f-none f-symbol1'>&#215;</span> File</div>
		</div>

			<div class='overlay wrapper-load-hapus'>
					<div class='wrapper-auto bg-putih' style='width:340px; margin-top:100px'>
						<div class='bg-abu-muda pd15 f-abu m0'><div class='f-symbol1 mr10'>¡</div><span class='f-segoe'>KONFIRMASI PENGHAPUSAN</span><div class='f-right f-symbol1 mr10 pointer' onclick='close_del_conf()'>Î</div></div>
						<div class='pd15'>
							<p class='f-segoe' align='center'>Anda yakin akan menghapus data<br>- <span class='l-nama'></span> -</p>
						</div>
						
						<form method='POST' id='form_input' action='aksi_hapus_ik'>
							<input type='hidden' name='id' class='l-id' value=''>
							<input type='submit' name='kirim' value='YA' class='btn-login'>
						</form>
					</div>
				</div>

		
		<div class='wrapper-tengah' style='width:90%; padding-left:15px;'>
			<div class='wrapper-form' style='width:30%; float:left; margin-right:15px;'>
			<div class='title-form'><span class='f-symbol mr10'>?</span>IMPORT DATA IK</div>
				<div class='pd15'>
					<div class='psn'></div>
					<form method='POST' action='aksi_tambah_ik' id='form_input' enctype='multipart/form-data'>
						<div class='form-grup'>
							<div class='label-form'>Judul IK</div>
							<input type='text' class='form transi-3' name='judul' autocomplete='off' required>
						</div>
						<div class='form-grup'>
							<div class='label-form'>File <i>(berupa file pdf)</i></div>
							<input type='file' id='src-gbr' name='file' required>
						</div>
						<button class='bkirim transi-3' value='kirim' name='kirim'><span class='f-symbol1 f-none' style='margin-right:20px;'>?</span>IMPORT DATA</button>
						
					</form>
				</div>		
			</div>		
			<div class='wrapper-form' style='width:55%; float:left;'>
			<div class='title-form'><span class='f-symbol mr10'>?</span>DATA IK</div>
				<div class='pd15'>
					<table id='table' class='f-segoe' border='1' style='border:solid 1px rgba(0,0,0,0.3); border-collapse:collapse;'>
						<thead class='f12'>
							<tr class='title-field'>
								<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' aria-label='Office: activate to sort column ascending' style='width: 56px;'>NO</th>
								<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' aria-label='Office: activate to sort column ascending' style='width: 306px;'>JUDUL</th>
								<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' aria-label='Office: activate to sort column ascending' style='width: 306px;'>FILE</th>
								<th width='50px'>AKSI</th>
							</tr>
						</thead>
						<tbody>";
							$no = 1;
							$q = msq($kon, "SELECT * from t_ik order by id_ik desc");
								
							
							echo "
							<script>
								function del_conf(data)
								{	
									$.ajax({
										url:'aksi_ambil_data_hapus_ik',
										type:'POST',
										data:'id='+data,
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
							</script>
							";
							while($d = mfa($q))
							{
								
								echo "
							<tr style='background:rgba(255,255,255,0.4); font-size:12px;'>
								<td align='center'>$no</td>	
								<td>$d[judul]</td>
								<td><a href='_asset/_pdf/$d[file]' target='_blank'>$d[file]</a></td>
								<td>
									<div class='wrapper-auto' style='width:55px;'>
										<div class='t-center pointer link-hapus f-symbol1' onclick='del_conf($d[id_ik])' style='margin-right:10px; background:red; padding:5px; border-radius:3px; position:relative; color:white;'>Í<span class='f-segoe' style='margin-left:5px;'>Hapus</span></div>
									</div>
								</td>
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
		unset($_SESSION['suc']);
		unset($_SESSION['err']);
?>