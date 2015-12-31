<?php
	include "_include/koneksi.php";
	

	echo "			
				
			<link rel='stylesheet' type='text/css' href='_asset/_css/_dashbor/main.css'>		
			<link rel='stylesheet' type='text/css' href='_asset/_css/_dashbor/framework.css'>		
			<link rel='stylesheet' type='text/css' href='_asset/_css/_dashbor/jquery.datetimepicker.css'>		
			<link rel='stylesheet' type='text/css' href='_asset/_css/_dashbor/responsive.css'>	
			
			<script src='_asset/_js/js_dashbor.js'></script>
			
			<body class='bg-dashbor' style='cursor:default; background:url(_asset/_images/bg_masuk_1.jpg)50% 0% / cover no-repeat fixed !important;'>
							
				<div class='wrapper-sidebar-dash transi-3'>
					<div class='logo-fixed-db'>
						<div class='t-center' style='font-size:16px; padding-top:21px; color:#fff;'><img src='_asset/_images/icon.png' width='25px' style='margin-right:15px;'>PT NUTRIFOOD</div><br>
					</div>
					
					<div class='wr-foto' style='background:rgba(0,0,0,0.3); padding:20px;'>
						<div style='float:left; margin-right:15px;position:relative; width:80px; height:80px;'>
							<div class='ov-foto'>
								<img class='transi-3' src='_asset/_images/hulu.png' width='80px'>
							</div>
						</div>
						<div class='f-right'>
							<div class='f18 f-segoe f-putih' style='margin-top:10px;'>$_SESSION[username]</div>
							<div class='f-right f-putih'>
								<div style='font-family:calibri; font-size:14px; padding-top:10px; font-weight:bold;'>sebagai $_SESSION[level]</div>
							</div>
						</div>
						<div class='cb'></div>
					</div>
					
					<ul class='sidebar-dash'>
						<li>
							<a href='admin/beranda' class='menu1'><div class='f-symbol1 mr10'>/</div>Dasbor</a>
						</li>
						
						<li>
							<a class='toggler-slide menu2' data-ttparrow='.arrow3, .arrow4, .arrow5, .arrow6, .arrow7, .arrow8, .arrow9' data-arrow='.arrow2' data-remove='.menu1, .menu3, .menu4, .menu5, .menu6, .menu7, .menu8, .menu9' data-toggle='.sub-menu2' data-tutup='.sub-menu3, .sub-menu4, .sub-menu5, .sub-menu6, .sub-menu7, .sub-menu8, .sub-menu9'><div class='f-symbol1 mr10'>.</div>JPM<div class='arrow2 f-symbol1 f-right'>&#203;</div></a>
						</li>
							<div class='sub-menu2 none'>
								<a href='admin/tambah_jpm' class='sub-sidebar-dash '>
									<div class='f-symbol1 mr10'>r</div>Tambah JPM
								</a>
								<a href='admin/lihat_jpm' class='sub-sidebar-dash'>
									<div class='f-symbol1 mr10'>r</div>Lihat JPM
								</a>
							</div>
							
						<li>
							<a class='toggler-slide menu3' data-ttparrow='.arrow2, .arrow4, .arrow5, .arrow6, .arrow7, .arrow8, .arrow9' data-arrow='.arrow3' data-remove='.menu1, .menu2, .menu4, .menu5, .menu6, .menu7, .menu8, .menu9' data-toggle='.sub-menu3' data-tutup='.sub-menu2, .sub-menu4, .sub-menu5, .sub-menu6, .sub-menu7, .sub-menu8, .sub-menu9'><div class='f-symbol1 mr10'>*</div>Import<div class='arrow3 f-symbol1 f-right'>&#203</div></a>
						</li>
							<div class='sub-menu3 none'>
								<a href='admin/tambah_waste' class='sub-sidebar-dash'>
									<div class='f-symbol1 mr10'>r</div>Data Waste
								</a>
								<a href='admin/tambah_ubp' class='sub-sidebar-dash'>
									<div class='f-symbol1 mr10'>r</div>Data UBP
								</a>
								<a href='admin/tambah_ik' class='sub-sidebar-dash'>
									<div class='f-symbol1 mr10'>r</div>Data IK
								</a>
							</div>
						
						<li>
							<a class='toggler-slide menu4' data-ttparrow='.arrow2, .arrow3, .arrow5, .arrow6, .arrow7, .arrow8, .arrow9' data-arrow='.arrow4' data-remove='.menu1, .menu2, .menu3, .menu5, .menu6, .menu7, .menu8, .menu9' data-toggle='.sub-menu4' data-tutup='.sub-menu2, .sub-menu3, .sub-menu5, .sub-menu6, .sub-menu7, .sub-menu8, .sub-menu9'><div class='f-symbol1 mr10'>s</div>Info<div class='arrow4 f-symbol1 f-right'>&#203</div></a>
						</li>
							<div class='sub-menu4 none'>
								<a href='admin/tambah_beritaBerjalan' class='sub-sidebar-dash'>
									<div class='f-symbol1 mr10'>r</div>Tambah Berita Berjalan
								</a>
								<a href='admin/lihat_beritaBerjalan' class='sub-sidebar-dash'>
									<div class='f-symbol1 mr10'>r</div>Lihat Berita Berjalan
								</a>
								<a href='admin/tambah_info' class='sub-sidebar-dash'>
									<div class='f-symbol1 mr10'>r</div>Tambah Info
								</a>
								<a href='admin/lihat_info' class='sub-sidebar-dash'>
									<div class='f-symbol1 mr10'>r</div>Lihat Info
								</a>
							</div>
						
						<li>
							<a class='toggler-slide menu5' data-ttparrow='.arrow2, .arrow3, .arrow4, .arrow6, .arrow7, .arrow8, .arrow9' data-arrow='.arrow5' data-remove='.menu1, .menu2, .menu3, .menu4, .menu6, .menu7, .menu8, .menu9' data-toggle='.sub-menu5' data-tutup='.sub-menu2, .sub-menu3, .sub-menu4, .sub-menu6, .sub-menu7, .sub-menu8, .sub-menu9'><div class='f-symbol1 mr10'>;</div>Event<div class='arrow5 f-symbol1 f-right'>&#203</div></a>
						</li>
							<div class='sub-menu5 none'>
								<a href='admin/tambah_event' class='sub-sidebar-dash'>
									<div class='f-symbol1 mr10'>r</div>Tambah Event
								</a>
								<a href='admin/lihat_event' class='sub-sidebar-dash'>
									<div class='f-symbol1 mr10'>r</div>Lihat Event
								</a>
							</div>
						
						<li>
							<a class='toggler-slide menu6' data-ttparrow='.arrow2, .arrow3, .arrow4, .arrow5, .arrow7, .arrow8, .arrow9' data-arrow='.arrow6' data-remove='.menu1, .menu2, .menu3, .menu4, .menu5, .menu7, .menu8, .menu9' data-toggle='.sub-menu6' data-tutup='.sub-menu2, .sub-menu3, .sub-menu4, .sub-menu5, .sub-menu7, .sub-menu8, .sub-menu9'><div class='f-symbol1 mr10'>u</div>Bagian Kerja<div class='arrow6 f-symbol1 f-right'>&#203</div></a>
						</li>
							<div class='sub-menu6 none'>
								<a href='admin/tambah_bagian' class='sub-sidebar-dash'>
									<div class='f-symbol1 mr10'>r</div>Tambah Bagian Kerja
								</a>
								<a href='admin/lihat_bagian' class='sub-sidebar-dash'>
									<div class='f-symbol1 mr10'>r</div>Lihat Bagian Kerja
								</a>
							</div>

						<li>
							<a class='toggler-slide menu7' data-ttparrow='.arrow2, .arrow3, .arrow4, .arrow5, .arrow6, .arrow8, .arrow9' data-arrow='.arrow7' data-remove='.menu1, .menu2, .menu3, .menu4, .menu5, .menu6, .menu8, .menu9' data-toggle='.sub-menu7' data-tutup='.sub-menu2, .sub-menu3, .sub-menu4, .sub-menu5, .sub-menu6, .sub-menu8, .sub-menu9'><div class='f-symbol1 mr10'>^</div>Mesin<div class='arrow7 f-symbol1 f-right'>&#203</div></a>
						</li>
							<div class='sub-menu7 none'>
								<a href='admin/tambah_mesin' class='sub-sidebar-dash'>
									<div class='f-symbol1 mr10'>r</div>Tambah Mesin
								</a>
								<a href='admin/lihat_mesin' class='sub-sidebar-dash'>
									<div class='f-symbol1 mr10'>r</div>Lihat Mesin
								</a>
							</div>
						
						<li>
							<a class='toggler-slide menu8' data-ttparrow='.arrow2, .arrow3, .arrow4, .arrow5, .arrow6, .arrow7, .arrow9, .arrow10' data-arrow='.arrow8' data-remove='.menu1, .menu2, .menu3, .menu4, .menu5, .menu6, .menu7, .menu9' data-toggle='.sub-menu8' data-tutup='.sub-menu2, .sub-menu3, .sub-menu4, .sub-menu5, .sub-menu6, .sub-menu7, .sub-menu9'><div class='f-symbol1 mr10'>:</div>Shift<div class='arrow7 f-symbol1 f-right'>&#203</div></a>
						</li>
							<div class='sub-menu8 none'>
								<a href='admin/tambah_shift' class='sub-sidebar-dash'>
									<div class='f-symbol1 mr10'>r</div>Tambah Shift
								</a>
								<a href='admin/lihat_shift' class='sub-sidebar-dash'>
									<div class='f-symbol1 mr10'>r</div>Lihat Shift
								</a>
							</div>
						
						<li>
							<a class='toggler-slide menu9' data-ttparrow='.arrow2, .arrow3, .arrow4, .arrow5, .arrow6, .arrow7, .arrow8, .arrow10' data-arrow='.arrow9' data-remove='.menu1, .menu2, .menu3, .menu4, .menu5, .menu6, .menu7, .menu10, .menu8' data-toggle='.sub-menu9' data-tutup='.sub-menu2, .sub-menu3, .sub-menu4, .sub-menu5, .sub-menu6, .sub-menu7, .sub-menu8, .sub-menu10'><div class='f-symbol1 mr10'>.</div>Karyawan<div class='arrow8 f-symbol1 f-right'>&#203</div></a>
						</li>
							<div class='sub-menu9 none'>
								<a href='admin/tambah_karyawan' class='sub-sidebar-dash'>
									<div class='f-symbol1 mr10'>r</div>Tambah Karyawan
								</a>
								<a href='admin/lihat_karyawan' class=' sub-sidebar-dash'>
									<div class='f-symbol1 mr10'>r</div>Lihat Karyawan
								</a>
							</div>

						<li>
							<a class='toggler-slide menu10' data-ttparrow='.arrow2, .arrow3, .arrow4, .arrow5, .arrow6, .arrow8, .arrow7, .arrow9' data-arrow='.arrow10' data-remove='.menu1, .menu2, .menu3, .menu4, .menu5, .menu6, .menu7, .menu9, .menu8' data-toggle='.sub-menu10' data-tutup='.sub-menu2, .sub-menu3, .sub-menu4, .sub-menu5, .sub-menu6, .sub-menu7, .sub-menu9'><div class='f-symbol1 mr10'>f</div>Galeri<div class='arrow8 f-symbol1 f-right'>&#203</div></a>
						</li>
							<div class='sub-menu10 none'>
								<a href='admin/tambah_galeriFoto' class='sub-sidebar-dash'>
									<div class='f-symbol1 mr10'>r</div>Tambah Galeri Foto
								</a>
								<a href='admin/tambah_galeriVideo' class='sub-sidebar-dash'>
									<div class='f-symbol1 mr10'>r</div>Tambah Galeri Video
								</a>
								<a href='admin/lihat_galeriFoto' class=' sub-sidebar-dash'>
									<div class='f-symbol1 mr10'>r</div>Lihat Galeri Foto
								</a>
								<a href='admin/lihat_galeriVideo' class=' sub-sidebar-dash'>
									<div class='f-symbol1 mr10'>r</div>Lihat Galeri Video
								</a>
							</div>
						
						<li>
							<a class='toggler-slide menu11' data-ttparrow='.arrow2, .arrow3, .arrow4, .arrow5, .arrow6, .arrow8, .arrow7, .arrow9, .arrow10' data-arrow='.arrow11' data-remove='.menu1, .menu2, .menu3, .menu4, .menu5, .menu6, .menu7, .menu9, .menu8, .menu9, .menu10' data-toggle='.sub-menu11' data-tutup='.sub-menu2, .sub-menu3, .sub-menu4, .sub-menu5, .sub-menu6, .sub-menu7, .sub-menu9, .sub-menu10'><div class='f-symbol1 mr10'>?</div>Pengaturan Web<div class='arrow8 f-symbol1 f-right'>&#203</div></a>
						</li>
							<div class='sub-menu11 none'>
								<a href='admin/ganti_background' class='sub-sidebar-dash'>
									<div class='f-symbol1 mr10'>?</div>Ganti background
								</a>
								<a href='admin/ganti_ip' class='sub-sidebar-dash'>
									<div class='f-symbol1 mr10'>?</div>Ganti IP Mesin XL
								</a>
							</div>
					</ul>
					<p align='center' class='f-putih f-segoe'>&copy;  ".date('Y')." PT NUTRIFOOD. Alright reserved.</p>
				</div>
				
				
				
				<div class='wrapper-all-konten transi-3' style='padding-bottom:20px; background:rgba(255,255,255,0.6); width:100%; height:auto; min-height:900px; !important; margin-left:250px; position:relative;'>
					<div class='wrapper-konten-dash transi-3'>
						<div class='menu-fixed-db' style='background:url(_asset/_images/bg_masuk_1.jpg)50% 0% / cover no-repeat fixed !important;'>
							<div class='konten-menu-fixed-db transi-3'>
								<div class='wrapper-tengah' style='width:80%; position:relative;'>
									<div class='pd10 f-left'>
										<div class='notif-icon menu-icon'>
											<div class='f-symbol1 f24 f-none f-putih'>C</div>
										</div>
										<div class='notif-icon menu-icon-kcl none'>
											<div class='f-symbol1 f24 f-none f-putih'>C</div>
										</div>
									</div>
									<div class='f-right pd10'>
										<div style='margin:-10px 0px -10px -10px; padding-top:5px; cursor:pointer;' class='clicker-fadeIn' data-fadeIn='drop-user'>
											<div class='pd10 f-putih f-left'>
												<div style='width:25px; float:left; height:25px; border-radius:100%; overflow:hidden; margin-right:10px;'>
												<img src='_asset/_images/hulu.png' height='25px'>
												</div>
												<div class='f-segoe f-left mr10'>$_SESSION[username]</div>
												<div class='f-symbol1 f-left'>&#203</div>
											</div>
										</div>
										<div class='drop-user none'>
											<div class='tooltip-dropdown'></div>
											<a class='link-drop' href='$_SESSION[level]/edit_password'>Edit Password<div class='f-symbol1 mr10 f-right'>+</div></a>
											<a class='link-drop' href='aksi_keluar'>Keluar<div class='f-symbol1 mr10 f-right'>+</div></a>
										</div>
									</div>
								</div>
							</div>
						</div>";
?>