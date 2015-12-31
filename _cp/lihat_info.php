<?php
	cek_err();
	cek_suc();
		
	
	echo "
	<script>
		document.title = 'Lihat Info | DISPLAY PRD'
	</script>
	<script>
		$(document).ready(function(){
			$('.menu4').addClass('sidebar-dash-aktif');
			$('#table').DataTable();
		});
	</script>
		<div class='title-admin'>
			<div style='padding:20px; height:142px; background:rgba(0,0,0,0.4)'>
				<div style='font-size:70px; margin-right:15px; margin-top:10px;' class='f-putih f-symbol'>i</div>
					<div class='f-putih f24 f-segoe' style='padding:15px; margin-top:50px;'>Lihat Info<br><div style='margin-top:7px;' class='f-segoe f-putih f16'><i>Data untuk melihat daftar Info...</i></div></div>
			</div>
		</div>
		<div class='title-dash'>
			<div class='f14'><a href='#' class='link-biru'>DISPLAY PRD</a> <span class='f-none f-symbol1'>&#215;</span> Data</div>
		</div>

				<div class='overlay wrapper-load-hapus'>
					<div class='wrapper-auto bg-putih' style='width:340px; margin-top:100px'>
						<div class='bg-abu-muda pd15 f-abu m0'><div class='f-symbol1 mr10'>¡</div><span class='f-segoe'>KONFIRMASI PENGHAPUSAN</span><div class='f-right f-symbol1 mr10 pointer' onclick='close_del_conf()'>Î</div></div>
						<div class='pd15'>
							<p class='f-segoe' align='center'>Anda yakin akan menghapus data<br>- <span class='l-nama'></span> -</p>
						</div>
						
						<form method='POST' id='form_input' action='aksi_hapus_info'>
							<input type='hidden' name='id' class='l-id' value=''>
							<input type='submit' name='kirim' value='YA' class='btn-login'>
						</form>
					</div>
				</div>

		<div class='wrapper-tengah'>
			<div class='wrapper-form' style='width:900px;'>
				<div class='title-form'><span class='f-symbol mr10'>i</span>DATA INFO</div>
				<div class='pd15'>
					<table id='table' class='f-segoe' border='1' style='border:solid 1px rgba(0,0,0,0.3); border-collapse:collapse;'>
						<thead class='f12'>
							<tr class='title-field'>
								<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' aria-label='Office: activate to sort column ascending' style='width: 56px;'>NO</th>
								<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' aria-label='Office: activate to sort column ascending' style='width: 300px;'>JUDUL</th>
								<th class='sorting' tabindex='0' aria-controls='example' rowspan='1' colspan='1' aria-label='Office: activate to sort column ascending' style='width: 16px;'>GAMBAR</th>
								<th width='10px'>AKSI</th>
							</tr>
						</thead>
						<tbody>";
							$no = 1;
							$q = msq($kon, "SELECT * from t_info order by id_info desc");
								
							
							echo "
							<script>
								function del_conf(data)
								{	
									$.ajax({
										url:'aksi_ambil_data_hapus_info',
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
								<td><p align='center'><img src='_asset/_images/_info/$d[foto]' height='80px'></p></td>
								<td>
									<div class='wrapper-auto' style='width:115px;'>
										<div class='t-center pointer link-hapus f-symbol1' onclick='del_conf($d[id_info])' style='margin-right:10px; background:red; padding:5px; border-radius:3px; position:relative; color:white;'>Í<span class='f-segoe' style='margin-left:5px;'>Hapus</span></div>
										<a href='$_SESSION[level]/edit_info_$d[id_info]' class='t-center pointer link-hapus f-symbol1' style='position:relative; background:blue; padding:5px; border-radius:3px; color:white;'>?<span class='f-segoe' style='margin-left:5px;'>Edit</span></a>
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

