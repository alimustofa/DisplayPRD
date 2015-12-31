<?php
	session_start();
	
	include "_include/koneksi.php";
	include "_include/fungsi.php";
	include "_include/head_konten.php";
	include "_include/baseurl.php";
	
	if(empty($_GET['halaman']) || !isset($_GET['halaman']))
	{
		header("Location:beranda");
	}
	else
	{
		$halaman = $_GET['halaman'];
		
		echo "
		<div class='overlay error-overlay' style='z-index:999999999999;'>
			<div class='wrapper-auto' style='width:388px;'>
				<div class='box-alert animated fadeInfromLeft' style='width:350px; background:white;'>
					<div class='f-segoe f18 f-abu pd15' style='border-bottom:solid 1px #ddd; background:#eee;'><span class='f-symbol'>s</span>&nbsp;&nbsp;&nbsp;ERROR</div>
					<div class='pd15 err-msg f14 f-segoe'>

					</div>
				</div>
			</div>
		</div>
		<div class='overlay loading-overlay'>
			<div class='wrapper-auto' style='width:388px;'>
				<div class='box-alert'>
					<div class='pd15' style='padding-top:30px;'>
						<center><img src='_asset/_images/loading.gif' width='60px'></center>
						<h1 align='center' class=' f-carter'>LOADING</h1>
					</div>
				</div>
			</div>
		</div>
		
		<div class='wrapper-load'>			
		";
		
		switch($halaman)
		{
			case "display" : 
				cek_session();
				include "_cp/beranda.php";
			break;
									
			case "admin" :
				cek_admin();
				include "_admin/index.php";
			break;
			
			case "masuk" :
				cek_session();
				include "_cp/masuk.php"; 
			break;
			
			default : header("Location: display_awal");
		}
		
		echo "
			
		</div>";
	}
?>