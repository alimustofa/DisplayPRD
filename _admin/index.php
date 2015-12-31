<?php	
	if(isset($_GET['hal']))
	{
		$hal = $_GET['hal'];
	}
	else
	{
		header("Location:beranda");
	}
		
		
		echo "
		
				<div class='loading-admin' style='position:fixed; display:none; top:0; margin-left:250; z-index:999; padding-top:60px; width:100%; height:100%; background:rgba(0,0,0,0.6);'>
					<div class='wrapper-tengah'>
						<div class='t-center f40 f-segoe f-putih'>Loading Halaman</div>
					</div>
				</div>
						<div class='wrapper-load-admin'>
						";
						switch($hal)
						{
							case "beranda":
								include "_cp/menu_admin.php";
								include "_cp/beranda_admin.php";
							break;

							case "tambah_bagian":
								include "_cp/menu_admin.php";
								include "_cp/tambah_bagian.php";
							break;

							case "lihat_bagian":
								include "_cp/menu_admin.php";
								include "_cp/lihat_bagian.php";
							break;

							case "edit_bagian":
								include "_cp/menu_admin.php";
								include "_cp/edit_bagian.php";
							break;

							/*TAMBAH MESIN BELUM BERES*/
							case "tambah_mesin":
								include "_cp/menu_admin.php";
								include "_cp/tambah_mesin.php";
							break;

							case "lihat_mesin":
								include "_cp/menu_admin.php";
								include "_cp/lihat_mesin.php";
							break;

							case "edit_mesin":
								include "_cp/menu_admin.php";
								include "_cp/edit_mesin.php";
							break;

							/*TAMBAH, EDIT, HAPUS FOTO*/
							case "tambah_galeriFoto":
								include "_cp/menu_admin.php";
								include "_cp/tambah_galeriFoto.php";
							break;

							case "edit_foto":
								include "_cp/menu_admin.php";
								include "_cp/edit_foto.php";
							break;

							case "lihat_galeriFoto":
								include "_cp/menu_admin.php";
								include "_cp/lihat_foto.php";
							break;

							/*TAMBAH, EDIT, HAPUS INFO*/
							case "tambah_info":
								include "_cp/menu_admin.php";
								include "_cp/tambah_info.php";
							break;

							case "edit_info":
								include "_cp/menu_admin.php";
								include "_cp/edit_info.php";
							break;

							case "lihat_info":
								include "_cp/menu_admin.php";
								include "_cp/lihat_info.php";
							break;

							/*TAMBAH, EDIT, HAPUS BERITA BERJALAN*/
							case "tambah_beritaBerjalan":
								include "_cp/menu_admin.php";
								include "_cp/tambah_beritaBerjalan.php";
							break;

							case "edit_beritaBerjalan":
								include "_cp/menu_admin.php";
								include "_cp/edit_beritaBerjalan.php";
							break;

							case "lihat_beritaBerjalan":
								include "_cp/menu_admin.php";
								include "_cp/lihat_beritaBerjalan.php";
							break;

							/*TAMBAH, EDIT, HAPUS EVENT*/
							case "tambah_event":
								include "_cp/menu_admin.php";
								include "_cp/tambah_event.php";
							break;

							case "edit_event":
								include "_cp/menu_admin.php";
								include "_cp/edit_event.php";
							break;

							case "lihat_event":
								include "_cp/menu_admin.php";
								include "_cp/lihat_event.php";
							break;

							/*TAMBAH, EDIT, HAPUS VIDEO*/
							case "tambah_galeriVideo":
								include "_cp/menu_admin.php";
								include "_cp/tambah_galeriVideo.php";
							break;

							case "edit_video":
								include "_cp/menu_admin.php";
								include "_cp/edit_video.php";
							break;

							case "lihat_galeriVideo":
								include "_cp/menu_admin.php";
								include "_cp/lihat_video.php";
							break;

							/*TAMBAH, EDIT, HAPUS SHIFT BELUM BERES*/
							case "tambah_shift":
								include "_cp/menu_admin.php";
								include "_cp/tambah_shift.php";
							break;

							case "lihat_shift":
								include "_cp/menu_admin.php";
								include "_cp/lihat_shift.php";
							break;

							case "edit_shift":
								include "_cp/menu_admin.php";
								include "_cp/edit_shift.php";
							break;

							/*TAMBAH, EDIT, HAPUS KARYAWAN BELUM BERES*/
							case "tambah_karyawan":
								include "_cp/menu_admin.php";
								include "_cp/tambah_karyawan.php";
							break;

							case "lihat_karyawan":
								include "_cp/menu_admin.php";
								include "_cp/lihat_karyawan.php";
							break;

							case "edit_karyawan":
								include "_cp/menu_admin.php";
								include "_cp/edit_karyawan.php";
							break;

							/*TAMBAH, EDIT, HAPUS JPM BELUM BERES*/
							case "tambahjpmb":
								include "_cp/menu_admin.php";
								include "_cp/tambah_jpm_b.php";
							break;

							case "tambah_jpm":
								include "_cp/menu_admin.php";
								include "_cp/tambah_jpm.php";
							break;

							case "lihat_jpm":
								include "_cp/menu_admin.php";
								include "_cp/lihat_jpm.php";
							break;

							case "edit_jpm":
								include "_cp/menu_admin.php";
								include "_cp/edit_jpm.php";
							break;
							


							//Lainnya
							case "edit_password":
								include "_cp/menu_admin.php";
								include "_cp/edit_password.php";
							break;
							
							case "tambah_ik":
								include "_cp/menu_admin.php";
								include "_cp/tambah_ik.php";
							break;
							
							case "tambah_waste":
								include "_cp/menu_admin.php";
								include "_cp/tambah_waste.php";
							break;
							
							case "tambah_ubp":
								include "_cp/menu_admin.php";
								include "_cp/tambah_ubp.php";
							break;

							case "ganti_background":
								include "_cp/menu_admin.php";
								include "_cp/ganti_background.php";
							break;

							case "ganti_ip":
								include "_cp/menu_admin.php";
								include "_cp/ganti_ip.php";
							break;
							
						}
						echo "				

						<div class='cb'></div>						
						</div>
						</div>
						
				
			
	";
	
?>