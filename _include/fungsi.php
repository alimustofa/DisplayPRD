<?php
	include "koneksi.php";
	
	function referer()
	{
		if(isset($_SERVER['HTTP_REFERER']))
		{
			header("Location: ".$_SERVER['HTTP_REFERER']."");
		}
		else
		{
			header("Location: beranda");
		}
	}
	
	function msq($kon, $string)
	{
		$string = mysqli_query($kon,"$string");
		return $string;
	}
	
	function mfa($string)
	{
		$string = mysqli_fetch_array($string);
		return $string;
	}
	
	function mnr($string)
	{
		$string = mysqli_num_rows($string);
		
		return $string;
	}
	
	function button_cek()
	{
		if(empty($_POST['kirim']) || !isset($_POST['kirim']))
		{
			header("Location: beranda");
			exit(1);
		}
	}
	
	function anti($string)
	{
		$string = mysql_real_escape_string(htmlspecialchars(addslashes($string)));
		return $string;
	}
	
	/*function cek_status_web()
	{
		$q_status = msq("SELECT * FROM t_web");
		$data_status = mfa($q_status);
		
		if($data_status['status'] == "t")
		{
			if(empty($_GET['halaman']) || $_GET['halaman'] != "nonaktif")
			{
				header("Location: nonaktif");
			}
		}
	}*/
	
	function cek_err()
	{
		if(isset($_SESSION['err']))
		{
			echo "
				<div class='warning-box'>
					<div class='f-symbol' style='font-size:28px; margin-right:15px; margin-top:-5px;'>
						Î
					</div>
						<div class='f-segoe f18' style='letter-spacing:2px;'>GAGAL !</div><div class='f-segoe f14 f-bold mt10 f-left'>$_SESSION[err]</div>
						<div class='clicker-fadeout close-notif f-right f-symbol pointer absolute' style='right:10; top:10;' data-fadeout='warning-box'>Î</div>
				</div>
			";
		}
	}
	
	function cek_suc()
	{
		if(isset($_SESSION['suc']))
		{
			echo "
				<div class='pesan-sukses'>
					<div class='f-symbol' style='font-size:28px; margin-right:15px; margin-top:-5px;'>
						õ
					</div>
						<div class='f-segoe f18' style='letter-spacing:2px;'>BERHASIL !</div><div class='f-segoe f14 f-bold mt10 f-left'>$_SESSION[suc]</div>
						<div class='clicker-fadeout close-notif f-right f-symbol pointer absolute' style='right:10; top:10;' data-fadeout='pesan-sukses'>Î</div>
				</div>
			";
		}
	}
	
	function hari($hari)
	{
		switch($hari)
		{
			case 0 : $hari = "Minggu"; break;
			case 1 : $hari = "Senin"; break;
			case 2 : $hari = "Selasa"; break;
			case 3 : $hari = "Rabu"; break;
			case 4 : $hari = "Kamis"; break;
			case 5 : $hari = "Jum'at"; break;
			case 6 : $hari = "Sabtu"; break;
		}
		
		return($hari);
	}
		
	function bulan($bulan)
	{
		switch($bulan)
		{
			case 1 : $bulan = "Januari"; break;
			case 2 : $bulan = "Februari"; break;
			case 3 : $bulan = "Maret"; break;
			case 4 : $bulan = "April"; break;
			case 5 : $bulan = "Mei"; break;
			case 6 : $bulan = "Juni"; break;
			case 7 : $bulan = "Juli"; break;
			case 8 : $bulan = "Agustus"; break;
			case 9 : $bulan = "September"; break;
			case 10 : $bulan = "Oktober"; break;
			case 11 : $bulan = "November"; break;
			case 12 : $bulan = "Desember"; break;
		}
		
		echo "$bulan";
		return($bulan);
	}
	
	function no_echo_bulan($bulan)
	{
		switch($bulan)
		{
			case 1 : $bulan = "Januari"; break;
			case 2 : $bulan = "Februari"; break;
			case 3 : $bulan = "Maret"; break;
			case 4 : $bulan = "April"; break;
			case 5 : $bulan = "Mei"; break;
			case 6 : $bulan = "Juni"; break;
			case 7 : $bulan = "Juli"; break;
			case 8 : $bulan = "Agustus"; break;
			case 9 : $bulan = "September"; break;
			case 10 : $bulan = "Oktober"; break;
			case 11 : $bulan = "November"; break;
			case 12 : $bulan = "Desember"; break;
		}
		
		return($bulan);
	}
		
	function cek_session()
	{
		if(isset($_SESSION['username']) && isset($_SESSION['level']))
		{
			header("Location: $_SESSION[level]/beranda");
		}
	}
	
	function cek_admin()
	{
		if(isset($_SESSION['username']) && isset($_SESSION['level']))
		{
			if($_SESSION['level'] != "admin")
			{
				header("Location: ../beranda");
			}
		}
		else
		{
			header("Location: ../beranda");
		}
	}
?>