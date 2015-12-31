	<?php
	session_start();
	
	include "../_include/koneksi.php";
	include "../_include/fungsi.php";
	
	if(empty($_GET['aksi']) || !isset($_GET['aksi']))
	{
		header("Location: beranda");
	}
	else
	{
		$aksi = $_GET['aksi'];
		
		switch($aksi)
		{	
			case "masuk_admin" :
				if(empty($_POST['username']) && empty($_POST['password']))
				{
					$a = array("errno" => 0, "errmsg" => "Isi Data Dengan Lengkap");
					echo json_encode($a);
				}
				else if(empty($_POST['username']))
				{
					$a = array("errno" => 0, "errmsg" => "Username Harus Di isi");
					echo json_encode($a);
				}
				else if(empty($_POST['password']))
				{
					$a = array("errno" => 0, "errmsg" => "Password Harus Di isi");
					echo json_encode($a);
				}
				else
				{
					$username = anti($_POST['username']);
					$password = anti($_POST['password']);
					$salt_password = anti(md5($password));
					
					$q_login = msq($kon, "SELECT * FROM t_admin
											WHERE username='$username' AND password='$salt_password'");
					$data_login = mfa($q_login);
					$jml_user = mnr($q_login);
					
					if($jml_user == 1)
					{
						$_SESSION['username'] = $data_login['username'];
						$_SESSION['level'] = "admin";

						$a = array("errno" => 1, "errmsg" => "<p class='msg done'>Sukses</p>");
						echo json_encode($a);
					}
					else
					{
						$a = array("errno" => 0, "errmsg" => "Akun Tidak Ada");
						echo json_encode($a);
					}
				}
			break;
			
			case "keluar" :
				session_destroy();
				header("Location: beranda");
			break;

			case "tambah_karyawan":
				button_cek();

				$nik = anti($_POST['nik']);
				$nama = anti($_POST['nama']);
				$tgl_lahir = anti($_POST['tgl_lahir']);
				$id_bagian = anti($_POST['id_bagian']);
				$id_mesin = anti($_POST['id_mesin']);
				$tugas = anti($_POST['tugas']);


				$tipe = $_FILES['foto']['type'];
				$dir = "../_asset/_images/_karyawan/";
				$foto = anti($_FILES['foto']['name']);
				
				if($tipe == "image/png" || $tipe == "image/jpg" || $tipe == "image/jpeg" || $tipe == "image/gif")
				{
					echo $_FILES['foto']['tmp_name'];
					move_uploaded_file($_FILES['foto']['tmp_name'], $dir. $nik."_".$foto);
					$foto = $nik."_".$foto;
				
					$q = msq($kon, "insert into t_karyawan values('$nik', '$nama', '$tgl_lahir', '$foto', $id_bagian, $id_mesin, '$tugas')");
					if($q)
					{
						$_SESSION['suc'] = "Berhasil menambahkan karyawan";
					}
					else
					{
						$_SESSION['err'] = "Gagal menambahkan karyawan";
					}
				}
				else
				{
					$_SESSION['err'] = "Tipe foto tidak valid...";
					referer();
					exit(1);
				}

				referer();
			break;	

			case "ganti_background":
				button_cek();

				$tipe = $_FILES['foto']['type'];
				$dir = "../_asset/_images/_background/";
				$foto = anti($_FILES['foto']['name']);
				
				if($tipe == "image/png" || $tipe == "image/jpg" || $tipe == "image/jpeg" || $tipe == "image/gif")
				{
					echo $_FILES['foto']['tmp_name'];
					move_uploaded_file($_FILES['foto']['tmp_name'], $dir.$foto);
				
					$q = msq($kon, "update t_web set background='$foto'");
					if($q)
					{
						$_SESSION['suc'] = "Berhasil mengedit background";
					}
					else
					{
						$_SESSION['err'] = "Gagal mengedit background";
					}
				}
				else
				{
					$_SESSION['err'] = "Tipe foto tidak valid...";
					referer();
					exit(1);
				}

				referer();
			break;	

			case "ganti_ip":
				button_cek();

				$ip_1 = anti($_POST['ip_1']);
				$ip_2 = anti($_POST['ip_2']);
				$ip_3 = anti($_POST['ip_3']);
				$ip_4 = anti($_POST['ip_4']);
				
				$all_ip = $ip_1.".".$ip_2.".".$ip_3.".".$ip_4;
				$q = msq($kon, "update t_web set ip_xl='$all_ip'");
				if($q)
				{
					$_SESSION['suc'] = "IP Berhasil diubah";
				}
				else
				{
					$_SESSION['err'] = "IP Gagal diubah";
				}

				referer();
			break;	

			case "tambah_galeriFoto":
				button_cek();

				$judul = anti($_POST['judul']);


				$tipe = $_FILES['foto']['type'];
				$dir = "../_asset/_images/_foto/";
				$foto = anti($_FILES['foto']['name']);
				
				if($tipe == "image/png" || $tipe == "image/jpg" || $tipe == "image/jpeg" || $tipe == "image/gif")
				{
					echo $_FILES['foto']['tmp_name'];
					move_uploaded_file($_FILES['foto']['tmp_name'], $dir.$foto);
				
					$q = msq($kon, "insert into t_foto(judul,foto) values('$judul','$foto')");
					if($q)
					{
						$_SESSION['suc'] = "Berhasil menambahkan foto";
					}
					else
					{
						$_SESSION['err'] = "Gagal menambahkan foto";
					}
				}
				else
				{
					$_SESSION['err'] = "Tipe foto tidak valid...";
					referer();
					exit(1);
				}

				referer();
			break;	

			case "tambah_info":
				button_cek();

				$judul = anti($_POST['judul']);

				$tipe = $_FILES['foto']['type'];
				$dir = "../_asset/_images/_info/";
				$foto = anti($_FILES['foto']['name']);
				
				if($tipe == "image/png" || $tipe == "image/jpg" || $tipe == "image/jpeg" || $tipe == "image/gif")
				{
					echo $_FILES['foto']['tmp_name'];
					move_uploaded_file($_FILES['foto']['tmp_name'], $dir.$foto);
				
					$q = msq($kon, "insert into t_info(judul,foto) values('$judul','$foto')");
					if($q)
					{
						$_SESSION['suc'] = "Berhasil menambahkan info";
					}
					else
					{
						$_SESSION['err'] = "Gagal menambahkan info";
					}
				}
				else
				{
					$_SESSION['err'] = "Tipe foto tidak valid...";
					referer();
					exit(1);
				}

				referer();
			break;	

			case "tambah_event":
				button_cek();

				$judul = anti($_POST['judul']);
				$waktu_awal = anti($_POST['waktu_awal']);
				$waktu_akhir = anti($_POST['waktu_akhir']);
				$tempat = anti($_POST['tempat']);

				$q = msq($kon, "insert into t_event(judul, waktu_mulai, waktu_akhir, tempat) values('$judul', '$waktu_awal', '$waktu_akhir', '$tempat')");
				if($q)
				{
					$_SESSION['suc'] = "Berhasil menambahkan event";
				}
				else
				{
					$_SESSION['err'] = "Gagal menambahkan event";
				}
				referer();
			break;	

			case "tambah_galeriVideo":
				button_cek();

				$judul = anti($_POST['judul']);
				$tipe = pathinfo("../_asset/_video/" . basename($_FILES["video"]["name"]),PATHINFO_EXTENSION);
				
				$dir = "../_asset/_video/";
				$foto = anti($_FILES['video']['name']);
				$err = $_FILES['video']['error'];
				echo "$judul - $extension - $foto - $err";
				echo "$tipe";				
				//if($tipe == "mp4" || $tipe == "avi" || $tipe == "mov" || $tipe == "3gp" || $tipe == "mpeg")
				if($tipe == "mp4")
				{
					echo $_FILES['video']['tmp_name'];
					move_uploaded_file($_FILES['video']['tmp_name'], $dir.$foto);
				
					$q = msq($kon, "insert into t_video(judul,video) values('$judul','$foto')");
					if($q)
					{
						$_SESSION['suc'] = "Berhasil menambahkan video";
					}
					else
					{
						$_SESSION['err'] = "Gagal menambahkan video";
					}
				}
				else
				{
					$_SESSION['err'] = "Tipe video tidak valid...";
					referer();
					exit(1);
				}

				referer();
			break;	

			case "tambah_beritaBerjalan":
				button_cek();

				$teks = anti($_POST['teks']);


				
				$q = msq($kon, "insert into t_teks_berjalan(teks) values('$teks')");
				if($q)
				{
					$_SESSION['suc'] = "Berhasil menambahkan berita berjalan";
				}
				else
				{
					$_SESSION['err'] = "Gagal menambahkan berita berjalan";
				}
				
				referer();
			break;

			case "tambah_jpm":
				button_cek();


					$tgl_mulai = anti($_POST['tgl_mulai']);
					$tgl_akhir = anti($_POST['tgl_akhir']);

				
					$nik = $_POST['nik'];
					$jml_nik = count($nik);
					
					$in_jpm = msq($kon, "insert into t_jpm(tgl_mulai, tgl_akhir) values('$tgl_mulai','$tgl_akhir')");
					if($in_jpm)
					{
						
						$id = mfa(msq($kon, "select * from t_jpm order by id_jpm desc"));	
						for($i=0; $i<$jml_nik; $i++)
						{
							$d_nik = mfa(msq($kon, "select * from t_karyawan where nik='$nik[$i]'"));
							
							if($d_nik['id_bagian']!='3')
							{
								$shift[$i] = $_POST['id_shift_'.$d_nik['id_mesin']];
								if(!isset($shift[$i]))
								{
									$_SESSION['err'] = "Isi semua data";
									referer();
								}
							}	
							else{
								$d_fill = mfa(msq($kon, "select * from t_mesin_detail where id_mesin_fill='$d_nik[id_mesin]'"));
								$shift[$i] = $_POST['id_shift_'.$d_fill['id_mesin_pack']];
								if(empty($shift[$i]))
								{
									$_SESSION['err'] = "Isi semua data";
									referer();
								}
							}

							$q_det = msq($kon, "insert into t_jpm_detail values('$id[id_jpm]','".$nik[$i]."','$shift[$i]')");
							
							echo "$nik[$i] - ";
						}

					}
					
					$jml_jpm = mfa(msq($kon,"select count(id_jpm) as jml from t_jpm where tgl_mulai='$tgl_mulai' and tgl_akhir='$tgl_akhir' group by tgl_mulai, tgl_akhir"));
					if($jml_jpm['jml']>1)
					{
						$_SESSION['suc'] = "Berhasil menambahkan jpm";
						header("location: admin/tambah_jpm");
					}
					else
					{

						$_SESSION['suc'] = "Berhasil menambahkan jpm A";
						header("location: admin/tambahjpmb_$id[id_jpm]");
					}
				//referer();
			break;	

			case "edit_karyawan":
				button_cek();

				$nik = anti($_POST['nik']);
				$nama = anti($_POST['nama']);
				$tgl_lahir = anti($_POST['tgl_lahir']);
				$id_bagian = anti($_POST['id_bagian']);
				$id_mesin = anti($_POST['id_mesin']);
				$tugas = anti($_POST['tugas']);
				if(!empty($_FILES['foto']['name']))
				{
					$tipe = $_FILES['foto']['type'];
					$dir = "../_asset/_images/_karyawan/";
					$foto = anti($_FILES['foto']['name']);
					
					if($tipe == "image/png" || $tipe == "image/jpg" || $tipe == "image/jpeg" || $tipe == "image/gif")
					{
						echo $_FILES['foto']['tmp_name'];
						move_uploaded_file($_FILES['foto']['tmp_name'], $dir. $nik."_".$foto);
						$foto = $nik."_".$foto;
					
						$q = msq($kon, "update t_karyawan set nama='$nama', tgl_lhr='$tgl_lahir', foto='$foto', id_bagian=$id_bagian, id_mesin=$id_mesin, tugas='$tugas' where nik='$nik'");
						echo "1";
					}
					else
					{
						$_SESSION['err'] = "Tipe foto tidak valid...";
						referer();
						exit(1);
					}
				}
				else
				{
					echo "2";
					$q = msq($kon, "update t_karyawan set nama='$nama', tgl_lhr='$tgl_lahir', id_bagian='$id_bagian', id_mesin='$id_mesin', tugas='$tugas' where nik='$nik'");
				}

				if($q)
				{
					$_SESSION['suc'] = "Berhasil mengedit karyawan";
				}
				else
				{
					$_SESSION['err'] = "Gagal mengedit karyawan";
				}

				referer();
			break;	

			case "edit_galeriFoto":
				button_cek();

				$id = anti($_POST['id']);
				$judul = anti($_POST['judul']);
				if(!empty($_FILES['foto']['name']))
				{
					$tipe = $_FILES['foto']['type'];
					$dir = "../_asset/_images/_foto/";
					$foto = anti($_FILES['foto']['name']);
					
					if($tipe == "image/png" || $tipe == "image/jpg" || $tipe == "image/jpeg" || $tipe == "image/gif")
					{
						echo $_FILES['foto']['tmp_name'];
						move_uploaded_file($_FILES['foto']['tmp_name'], $dir.$foto);
					
						$q = msq($kon, "update t_foto set judul='$judul', foto='$foto' where id_foto='$id'");
						echo "1";
					}
					else
					{
						$_SESSION['err'] = "Tipe foto tidak valid...";
						referer();
						exit(1);
					}
				}
				else
				{
					echo "2";
					$q = msq($kon, "update t_foto set judul='$judul' where id_foto='$id'");
				}

				if($q)
				{
					$_SESSION['suc'] = "Berhasil mengedit foto";
				}
				else
				{
					$_SESSION['err'] = "Gagal mengedit foto";
				}

				referer();
			break;	

			case "edit_info":
				button_cek();

				$id = anti($_POST['id']);
				$judul = anti($_POST['judul']);
				if(!empty($_FILES['foto']['name']))
				{
					$tipe = $_FILES['foto']['type'];
					$dir = "../_asset/_images/_info/";
					$foto = anti($_FILES['foto']['name']);
					
					if($tipe == "image/png" || $tipe == "image/jpg" || $tipe == "image/jpeg" || $tipe == "image/gif")
					{
						echo $_FILES['foto']['tmp_name'];
						move_uploaded_file($_FILES['foto']['tmp_name'], $dir.$foto);
					
						$q = msq($kon, "update t_info set judul='$judul', foto='$foto' where id_info='$id'");
						echo "1";
					}
					else
					{
						$_SESSION['err'] = "Tipe gambar tidak valid...";
						referer();
						exit(1);
					}
				}
				else
				{
					echo "2";
					$q = msq($kon, "update t_info set judul='$judul' where id_info='$id'");
				}

				if($q)
				{
					$_SESSION['suc'] = "Berhasil mengedit info";
				}
				else
				{
					$_SESSION['err'] = "Gagal mengedit info";
				}

				referer();
			break;	

			case "edit_galeriVideo":
				button_cek();

				$id = anti($_POST['id']);
				$judul = anti($_POST['judul']);
				if(!empty($_FILES['video']['name']))
				{
					$tipe = pathinfo("../_asset/_video/" . basename($_FILES["video"]["name"]),PATHINFO_EXTENSION);
				
					$dir = "../_asset/_video/";
					$foto = anti($_FILES['video']['name']);
					$err = $_FILES['video']['error'];		
					if($tipe == "mp4" || $tipe == "avi" || $tipe == "mov" || $tipe == "3gp" || $tipe == "mpeg")
					{
						echo $_FILES['video']['tmp_name'];
						move_uploaded_file($_FILES['video']['tmp_name'], $dir.$foto);
					
						$q = msq($kon, "update t_video set judul='$judul',video='$foto' where id_video='$id'");
						if($q)
						{
							$_SESSION['suc'] = "Berhasil mengedit video";
						}
						else
						{
							$_SESSION['err'] = "Gagal mengedit video";
						}
					}
					else
					{
						$_SESSION['err'] = "Tipe video tidak valid...";
						referer();
						exit(1);
					}
				}
				else
				{
					$q = msq($kon, "update t_video set judul='$judul' where id_video='$id'");
				}

				if($q)
				{
					$_SESSION['suc'] = "Berhasil mengedit video";
				}
				else
				{
					$_SESSION['err'] = "Gagal mengedit video";
				}

				referer();
			break;	

			case "edit_beritaBerjalan":
				button_cek();

				$id = anti($_POST['id']);
				$judul = anti($_POST['teks']);
				
				$q = msq($kon, "update t_teks_berjalan set teks='$judul' where id_teks='$id'");
				

				if($q)
				{
					$_SESSION['suc'] = "Berhasil mengedit berita";
				}
				else
				{
					$_SESSION['err'] = "Gagal mengedit berita";
				}

				referer();
			break;	

			case "edit_event":
				button_cek();

				$id = anti($_POST['id']);
				$judul = anti($_POST['judul']);
				$wm = anti($_POST['waktu_awal']);
				$ws = anti($_POST['waktu_akhir']);
				$tempat = anti($_POST['tempat']);
				
				$q = msq($kon, "update t_event set judul='$judul', waktu_mulai='$wm', waktu_akhir='$ws', tempat='$tempat' where id_event='$id'");
				

				if($q)
				{
					$_SESSION['suc'] = "Berhasil mengedit event";
				}
				else
				{
					$_SESSION['err'] = "Gagal mengedit event";
				}

				referer();
			break;	

			case "ambil_item_grafik":
				$produk = $_POST['produk'];
				
				$q_item = msq($kon,"select item_desc, SUBSTRING_INDEX(item_desc, ' ', 2) as kata from t_waste group by item_desc having kata like '%$produk%'");
		       	while($d_item = mfa($q_item))
		       	{
		       		echo "<option value='$d_item[item_desc]'>$d_item[item_desc]</option>";
		       	}
			break;	

			case "ambil_produk_grafik":
				$brand = $_POST['brand'];
				
				$q_produk = msq($kon,"select SUBSTRING_INDEX(item_desc, ' ', 2) as kata from t_waste group by kata having kata like '%$brand%'");
		       	echo "<option value=''>Pilih Produk</option>";
		       	while($d_produk = mfa($q_produk))
		       	{
		       		echo "<option value='$d_produk[kata]'>$d_produk[kata]</option>";
		       	}
			break;	

			case "ambil_bulan_grafik":
				$thn = $_POST['thn'];
				
				$q = msq($kon, "select * from t_waste where tahun='$thn' group by bulan order by bulan");
				while($d = mfa($q))
				{
					$name = no_echo_bulan($d['bulan']);
					echo "
						<option value='$d[bulan]'>$name</option>
					";
				}
			break;	

			case "ambil_mesin":
				$id_bagian = $_POST['id_bagian'];
				
				$q = msq($kon, "select * from t_mesin where id_bagian='$id_bagian' order by nama");
				while($d = mfa($q))
				{
					echo "
						<option value='$d[id_mesin]'>$d[nama]</option>
					";
				}
			break;	

			case "ambil_tugas":
				$id_bagian = $_POST['id_bagian'];
				$id_mesin = $_POST['id_mesin'];
				
				if($id_bagian=='2')
				{
					$q = msq($kon, "select * from t_tugas where id_bagian='$id_bagian' order by id_tugas limit 1");
				}
				else
				{
					$q = msq($kon, "select * from t_tugas t inner join t_mesin m on t.id_bagian=m.id_bagian where t.id_bagian='$id_bagian' and m.id_mesin='$id_mesin' order by tugas");
				}

				while($d = mfa($q))
				{

					if($d['id_mesin']!=10 && $d['id_mesin']!=8 && $d['id_mesin']!=20 && $d['id_mesin']!=11)
					{
						echo "
							<option value='$d[id_tugas]'>$d[tugas]</option>
						";	
					}
					else
					{
						if($d['tugas']!='Operator')
						{
							echo "
								<option value='$d[id_tugas]'>$d[tugas]</option>
							";	
						}
					}
				}
			break;

			//karyawan
			case "ambil_data_hapus":
				$id = $_POST['nik'];
				$d = mfa(msq($kon, "select * from t_karyawan where nik='$id'"));

				$a = array("id" => "$d[nik]", "nama" => "$d[nama]");
				echo json_encode($a);
			break;

			case "ambil_data_hapus_jpm":
				$id = $_POST['id'];
				$d = mfa(msq($kon, "select * from t_jpm where id_jpm='$id'"));

				$a = array("id" => "$d[id_jpm]", "nama" => "$d[id_jpm]");
				echo json_encode($a);
			break;

			case "ambil_data_hapus_ik":
				$id = $_POST['id'];
				$d = mfa(msq($kon, "select * from t_ik where id_ik='$id'"));

				$a = array("id" => "$d[id_ik]", "nama" => "$d[judul]");
				echo json_encode($a);
			break;

			case "ambil_data_hapus_shift":
				$id = $_POST['id'];
				$d = mfa(msq($kon, "select * from t_shift where id_shift='$id'"));

				$a = array("id" => "$d[id_shift]", "nama" => "$d[nama]");
				echo json_encode($a);
			break;

			case "ambil_data_hapus_foto":
				$id = $_POST['id'];
				$d = mfa(msq($kon, "select * from t_foto where id_foto='$id'"));

				$a = array("id" => "$d[id_foto]", "nama" => "$d[judul]");
				echo json_encode($a);
			break;

			case "ambil_data_hapus_info":
				$id = $_POST['id'];
				$d = mfa(msq($kon, "select * from t_info where id_info='$id'"));

				$a = array("id" => "$d[id_info]", "nama" => "$d[judul]");
				echo json_encode($a);
			break;

			case "ambil_data_hapus_video":
				$id = $_POST['id'];
				$d = mfa(msq($kon, "select * from t_video where id_video='$id'"));

				$a = array("id" => "$d[id_video]", "nama" => "$d[judul]");
				echo json_encode($a);
			break;

			case "ambil_data_hapus_bagian":
				$id = $_POST['id'];
				$d = mfa(msq($kon, "select * from t_bagian where id_bagian='$id'"));

				$a = array("id" => "$d[id_bagian]", "nama" => "$d[nama]");
				echo json_encode($a);
			break;

			case "ambil_data_hapus_mesin":
				$id = $_POST['id'];
				$d = mfa(msq($kon, "select * from t_mesin where id_mesin='$id'"));

				$a = array("id" => "$d[id_mesin]", "nama" => "$d[nama]");
				echo json_encode($a);
			break;

			case "ambil_data_hapus_event":
				$id = $_POST['id'];
				$d = mfa(msq($kon, "select * from t_event where id_event='$id'"));

				$a = array("id" => "$d[id_event]", "nama" => "$d[judul]");
				echo json_encode($a);
			break;

			case "ambil_data_hapus_beritaBerjalan":
				$id = $_POST['id'];
				$d = mfa(msq($kon, "select * from t_teks_berjalan where id_teks='$id'"));

				$a = array("id" => "$d[id_teks]", "nama" => "$d[teks]");
				echo json_encode($a);
			break;

			case "cek_penyelia":
				$id = $_POST['nik'];
				$d = mfa(msq($kon, "select * from t_karyawan where nik='$id' and id_bagian='2'"));

				if($d['id_bagian']=='2')
				{
					$hasil = 1;
				}
				else
				{
					$hasil = 0;
				}

				$a = array("hasil" => "$hasil");
				echo json_encode($a);
			break;

			case "simpan_lokasi":
				$nik = $_POST['nik'];
				$id_tugas = $_POST['id_tugas'];
				$q = msq($kon, "insert into t_lokasi_penyelia values('$nik','$id_tugas')");
				if($q)
				{
					$hasil = 1;
				}
				else
				{
					$hasil = 0;
				}
				$a = array("hasil" => $hasil);
				echo json_encode($a);
			break;

			case "hapus_shift" :			
				$id = anti($_POST['id']);
				
				$q = msq($kon, "DELETE FROM t_shift WHERE id_shift='$id'");
				if($q)
				{
					$_SESSION['suc'] = "Berhasil menghapus shift";
				}
				else
				{
					$_SESSION['err'] = "Gagal menghapus shift";
				}
				
				referer();
			break;

			case "hapus_jpm" :			
				$id = anti($_POST['id']);
				
				$q = msq($kon, "DELETE FROM t_jpm WHERE id_jpm='$id'");
				$q1 = msq($kon, "DELETE FROM t_jpm_detail WHERE id_jpm_detail='$id'");
				if($q)
				{
					$_SESSION['suc'] = "Berhasil menghapus jpm";
				}
				else
				{
					$_SESSION['err'] = "Gagal menghapus jpm";
				}
				
				referer();
			break;

			case "hapus_karyawan" :			
				$id = anti($_POST['id']);
				
				$q = msq($kon, "DELETE FROM t_karyawan WHERE nik='$id'");
				if($q)
				{
					$_SESSION['suc'] = "Berhasil menghapus karyawan";
				}
				else
				{
					$_SESSION['err'] = "Gagal menghapus karyawan";
				}
				
				referer();
			break;

			case "hapus_event" :			
				$id = anti($_POST['id']);
				
				$q = msq($kon, "DELETE FROM t_event WHERE id_event='$id'");
				if($q)
				{
					$_SESSION['suc'] = "Berhasil menghapus event";
				}
				else
				{
					$_SESSION['err'] = "Gagal menghapus event";
				}
				
				referer();
			break;

			case "hapus_ik" :			
				$id = anti($_POST['id']);
				
				$q = msq($kon, "DELETE FROM t_ik WHERE id_ik='$id'");
				if($q)
				{
					$_SESSION['suc'] = "Berhasil menghapus ik";
				}
				else
				{
					$_SESSION['err'] = "Gagal menghapus ik";
				}
				
				referer();
			break;

			case "hapus_foto" :			
				$id = anti($_POST['id']);
				
				$q = msq($kon, "DELETE FROM t_foto WHERE id_foto='$id'");
				if($q)
				{
					$_SESSION['suc'] = "Berhasil menghapus foto";
				}
				else
				{
					$_SESSION['err'] = "Gagal menghapus foto";
				}
				
				referer();
			break;

			case "hapus_info" :			
				$id = anti($_POST['id']);
				
				$q = msq($kon, "DELETE FROM t_info WHERE id_info='$id'");
				if($q)
				{
					$_SESSION['suc'] = "Berhasil menghapus info";
				}
				else
				{
					$_SESSION['err'] = "Gagal menghapus info";
				}
				
				referer();
			break;

			case "hapus_bagian" :			
				$id = anti($_POST['id']);
				
				$q = msq($kon, "DELETE FROM t_bagian WHERE id_bagian='$id'");
				if($q)
				{
					$_SESSION['suc'] = "Berhasil menghapus bagian";
				}
				else
				{
					$_SESSION['err'] = "Gagal menghapus bagian";
				}
				
				referer();
			break;

			case "hapus_video" :			
				$id = anti($_POST['id']);
				
				$q = msq($kon, "DELETE FROM t_video WHERE id_video='$id'");
				if($q)
				{
					$_SESSION['suc'] = "Berhasil menghapus video";
				}
				else
				{
					$_SESSION['err'] = "Gagal menghapus video";
				}
				
				referer();
			break;

			case "hapus_beritaBerjalan" :			
				$id = anti($_POST['id']);
				
				$q = msq($kon, "DELETE FROM t_teks_berjalan WHERE id_teks='$id'");
				if($q)
				{
					$_SESSION['suc'] = "Berhasil menghapus berita";
				}
				else
				{
					$_SESSION['err'] = "Gagal menghapus berita";
				}
				
				referer();
			break;

			case "tambah_bagian":
				button_cek();
				$nama_bagian = anti($_POST['nama_bagian']);
				
				$q_bagian = msq($kon, "SELECT * FROM t_bagian WHERE nama='$nama_bagian'");
				$j_bagian = mnr($q_bagian);
				
				if($j_bagian==0)
				{
					$q = msq($kon, "INSERT INTO t_bagian(nama) VALUES ('$nama_bagian')");	
					
					if($q)
					{
						$_SESSION['suc'] = "Berhasil menambahkan bagian";
					}
					else
					{
						$_SESSION['err'] = "Gagal menambahkan bagian";
					}
				}
				else
				{
					$_SESSION['err'] = "Nama bagian sudah ada";
				}
				referer();
				
			break;

			case "tambah_shift":
				button_cek();

				$nama = anti($_POST['nama']);
				$wkt_mulai = anti($_POST['wkt_mulai']);
				$wkt_akhir = anti($_POST['wkt_akhir']);
				$wkt_br_mulai = anti($_POST['wkt_break_mulai']);
				$wkt_br_akhir = anti($_POST['wkt_break_akhir']);
				
				if(empty($_POST['keterangan']))
				{
					$ket='';
				}
				else
				{
					$ket = anti($_POST['keterangan']);
				}

				echo "$nama";
				$q = msq($kon, "INSERT INTO t_shift(nama,wkt_mulai,wkt_akhir,wkt_break_mulai,wkt_break_akhir,keterangan) VALUES ('$nama','$wkt_mulai','$wkt_akhir','$wkt_br_mulai','$wkt_br_akhir','$ket')");	
				
				if($q)
				{
					$_SESSION['suc'] = "Berhasil menambahkan shift";
				}
				else
				{
					$_SESSION['err'] = "Gagal menambahkan shift";
				}
				referer();
				
			break;

			case "edit_shift":
				button_cek();

				$id = anti($_POST['id']);
				$nama = anti($_POST['nama']);
				$wkt_mulai = anti($_POST['wkt_mulai']);
				$wkt_akhir = anti($_POST['wkt_akhir']);
				$wkt_br_mulai = anti($_POST['wkt_break_mulai']);
				$wkt_br_akhir = anti($_POST['wkt_break_akhir']);
				if(empty($_POST['keterangan']))
				{
					$ket='';
				}
				else
				{
					$ket = anti($_POST['keterangan']);
				}

				$q = msq($kon, "UPDATE t_shift SET nama='$nama', wkt_mulai='$wkt_mulai', wkt_akhir='$wkt_akhir', wkt_break_mulai='$wkt_br_mulai', wkt_break_akhir='$wkt_br_akhir', keterangan='$ket' WHERE id_shift='$id'");
				
				if($q)
				{
					$_SESSION['suc'] = "Berhasil mengedit shift";
				}
				else
				{
					$_SESSION['err'] = "Gagal mengedit shift";
				}
				
				referer();
			break;

			case "edit_bagian":
				button_cek();

				$id_bagian = anti($_POST['id']);				
				$nama_bagian = anti($_POST['nama_bagian']);
				
				$q = msq($kon, "UPDATE t_bagian SET nama='$nama_bagian' WHERE id_bagian='$id_bagian'");
				
				if($q)
				{
					$_SESSION['suc'] = "Berhasil mengedit bagian";
				}
				else
				{
					$_SESSION['err'] = "Gagal mengedit bagian";
				}
				
				referer();
			break;

			case "hapus_bagian" :
				button_cek();			
				$id = anti($_POST['id']);
				
				$q = msq($kon, "DELETE FROM t_bagian WHERE id_bagian='$id'");
				if($q)
				{
					$_SESSION['suc'] = "Berhasil menghapus bagian";
				}
				else
				{
					$_SESSION['err'] = "Gagal menghapus bagian";
				}
				
				referer();
			break;

			case "tambah_mesin":
				
				button_cek();
				$id_bagian = anti($_POST['id_bagian']);
				$nama_mesin = anti($_POST['nama_mesin']);
				
				$q_mesin = msq($kon, "SELECT * FROM t_mesin WHERE nama='$nama_mesin' AND id_bagian='$id_bagian'");
				$j_mesin = mnr($q_mesin);
				
				if($j_mesin==0)
				{
				
					$q = msq($kon, "INSERT INTO t_mesin(id_bagian,nama) VALUES ('$id_bagian','$nama_mesin')");	
					
					if($q)
					{
						$_SESSION['suc'] = "Berhasil menambahkan mesin";
					}
					else
					{
						$_SESSION['err'] = "Gagal menambahkan mesin";
					}
				}
				else
				{
					$_SESSION['err'] = "Mesin sudah ada";
				}
				referer();
						
			break;

			case "edit_mesin":
				button_cek();
				$id_mesin = anti($_POST['id']);				
				$id_bagian = anti($_POST['id_bagian']);	
				$nama_mesin = anti($_POST['nama_mesin']);
				
				$q = msq($kon, "UPDATE t_mesin SET nama='$nama_mesin', id_bagian='$id_bagian' WHERE id_mesin='$id_mesin'");
				
				if($q)
				{
					$_SESSION['suc'] = "Berhasil mengedit mesin";
				}
				else
				{
					$_SESSION['err'] = "Gagal mengedit mesin";
				}
				
				referer();
			break;

			case "hapus_mesin" :	
				button_cek();		
				$id = anti($_POST['id']);
				
				$q = msq($kon, "DELETE FROM t_mesin WHERE id_mesin='$id'");
				if($q)
				{
					$_SESSION['suc'] = "Berhasil menghapus mesin";
				}
				else
				{
					$_SESSION['err'] = "Gagal menghapus mesin";
				}
				
				referer();
			break;
			
			case "edit_password" :
				button_cek();
				
				if($_POST['password'] == $_POST['password_ulangi'])
				{
					$pass = anti(md5($_POST['password']));
					msq($kon, "update t_admin set password='$pass' where username='$_SESSION[username]'");
					$_SESSION['suc'] = "Berhasil diubah...";
					referer();
				}
				else
				{
					$_SESSION['err'] = "Pasword tidak sama";
					referer();
				}
			break;

			case "manajemen_web":
				button_cek();
				$stat = $_POST['status'];
				msq($kon, "update t_web set status='$stat'");
				$_SESSION['suc'] = "Berhasil diubah";
				referer();
			break;

			case 'import_waste':
				include '../_include/excel_reader.php';	
				$thn = $_POST['thn'];
				$bln = $_POST['bln'];
				// if(!empty($_FILES['file']['name']))
				// {
				// 	$tipe = $_FILES['file']['type'];
				// 	$dir = "../_asset/_excel/_waste/";
				// 	$file = anti($_FILES['file']['name']);
					
				// 	echo "$tipe";
				// 	if($tipe == "application/vnd.ms-excel")
				// 	{
				// 		echo $_FILES['file']['tmp_name'];
				// 		move_uploaded_file($_FILES['file']['tmp_name'], $dir.$file);
				// 	}
				// 	else
				// 	{
				// 		$_SESSION['err'] = "Tipe excel tidak valid...";
				// 		referer();
				// 		exit(1);
				// 	}
				// }

				//echo $_FILES['file']['type'];
					$data = new Spreadsheet_Excel_Reader($_FILES['file']['tmp_name'], true);
					
					$baris = $data->rowcount($sheet_index=8);
					//$sheet = $data->getSheetIndex("productivity");

					for ($i=5; $i<=$baris; $i++)
					{
						$wo = $data->val($i, 2, 8);
						$item_code = $data->val($i, 4, 8);
						$item_desc = $data->val($i, 5, 8);
						$w_dus = $data->val($i, 17, 8);
						$w_roll = $data->val($i, 22, 8);
						$w_prod = $data->val($i, 31, 8);

						if(strlen($wo) != 0)
						{
							$q = msq($kon, "insert into t_waste(wo,item_code,item_desc,w_dus,w_roll,w_prod,bulan,tahun)
								 values('$wo','$item_code','$item_desc','$w_dus','$w_roll','$w_prod','$bln','$thn')");
						}
						//$q = msq($kon, "insert into t_waste(batch) values('$batch')");
					}
			break;

			case 'import_ubp':
				include '../_include/excel_reader.php';	
			
				// if(!empty($_FILES['file']['name']))
				// {
				// 	$tipe = $_FILES['file']['type'];
				// 	$dir = "../_asset/_excel/_waste/";
				// 	$file = anti($_FILES['file']['name']);
					
				// 	echo "$tipe";
				// 	if($tipe == "application/vnd.ms-excel")
				// 	{
				// 		echo $_FILES['file']['tmp_name'];
				// 		move_uploaded_file($_FILES['file']['tmp_name'], $dir.$file);
				// 	}
				// 	else
				// 	{
				// 		$_SESSION['err'] = "Tipe excel tidak valid...";
				// 		referer();
				// 		exit(1);
				// 	}
				// }

				//echo $_FILES['file']['type'];
					$data = new Spreadsheet_Excel_Reader($_FILES['file']['tmp_name'], true);
					
					$baris = $data->rowcount($sheet_index=8);
					//$sheet = $data->getSheetIndex("productivity");

					for ($i=5; $i<=$baris; $i++)
					{
						$wo = $data->val($i, 2, 8);
						$item_code = $data->val($i, 4, 8);
						$item_desc = $data->val($i, 5, 8);
						$w_dus = $data->val($i, 17, 8);
						$w_roll = $data->val($i, 22, 8);
						$w_prod = $data->val($i, 31, 8);

						if(strlen($wo) != 0)
						{
							$q = msq($kon, "insert into t_waste(wo,item_code,item_desc,w_dus,w_roll,w_prod,bulan,tahun)
								 values('$wo','$item_code','$item_desc','$w_dus','$w_roll','$w_prod','$bln','$thn')");
						}
						//$q = msq($kon, "insert into t_waste(batch) values('$batch')");
					}
			break;

			case "tambah_ik":
				button_cek();

				$judul = anti($_POST['judul']);


				$tipe = $_FILES['file']['type'];
				$dir = "../_asset/_pdf/";
				$foto = anti($_FILES['file']['name']);
				
				if($tipe == "application/pdf")
				{
					echo $_FILES['file']['tmp_name'];
					move_uploaded_file($_FILES['file']['tmp_name'], $dir.$foto);
				
					$q = msq($kon, "insert into t_ik(judul,file) values('$judul','$foto')");
					if($q)
					{
						$_SESSION['suc'] = "Berhasil menambahkan ik";
					}
					else
					{
						$_SESSION['err'] = "Gagal menambahkan ik";
					}
				}
				else
				{
					$_SESSION['err'] = "Tipe file tidak valid...";
					referer();
					exit(1);
				}

				referer();
			break;	
			
		}
	}
?>