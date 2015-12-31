<script>
			          
	$(document).on('click','.click-load',function(){
		var data_href = $(this).data('href');
		$('.load_sementara').fadeIn().delay(2000).fadeOut();
			$('.target').load('_cp/'+data_href+'.php');
			window.history.pushState('', '', 'display_'+data_href);
	});

	$(document).on('click','.menu',function(){
		var data_href = $(this).data('href');
		$('.menu').removeClass("menu-aktif");
		$('.menu-'+data_href).addClass("menu-aktif");

		$('.sub-menu-'+data_href).slideDown(300,'swing');
		
		var lastMenu = $('#lastMenu').val();
		$('.sub-menu-'+lastMenu).slideUp();
		$('#lastMenu').val(data_href);
		// var a;
		// var data_tutup = [];
		// for(a=1; a<=10; a++)
		// {
		// 	if(a==data_href)
		// 	{
		// 		break;
		// 	}
		// 	else
		// 	{
		// 		data_tutup[a-1] = 'sub-menu-'+a;
		// 	}
		// }
		// $(data_tutup).slideUp();
	});

	$(document).on('click','.gal',function(){
		$('.left-wrapper').css({
			"margin-left":"-20%"
		});
		$('.middle-wrapper').css({
			"width":"80%",
			"overflow":"hidden"
		});
	});



</script>
<?php
	$back = mfa(msq($kon, "select background from t_web"));
	echo "
		<input type='hidden' id='lastMenu' value='1'>
		<div class='bg-wrapper' style='background:url(_asset/_images/_background/$back[background])no-repeat; background-size:cover;'>
			<div class='bg-trans-wrapper ov-hidden'>
				<div class='left-wrapper ov-hidden transi-5' style='background:rgba(0,0,0,0.2)'>
					<div class='logo-menu' style='margin-left:5px;'></div>
						<!--<div class='f-sambung' style='font-size:35px; margin-top:-20px;color:#fff; text-align:center;'>Inspiring A Nutrisious Life</div>-->
						<div class='menu menu-1 click-load transi-3' data-href='awal'>
							<div class='pd15'>
								<div class='wr-icon-menu transi-3'><span class='f-symbol f-none t-center'>/</span></div>
									BERANDA
							</div>
							<div class='cb'></div>
						</div>
						<a href='display_jpm'><div class='menu menu-2 transi-3' data-href='jpm'>
							<div class='pd15'>
								<div class='wr-icon-menu transi-3'><span class='f-symbol f-none t-center' style='margin-top:-3px;'>:</span></div>
									JPM
								<span class='arr-menu f-right f-putih f-symbol'></span>
							</div>
							<div class='cb'></div>
						</div></a>
						<div class='menu menu-3 transi-3' data-href='3'>
							<div class='pd15'>
								<div class='wr-icon-menu'><span class='f-symbol f-none t-center'>f</span></div>
									GALERI
							</div>
							<div class='cb'></div>
						</div>
							<div class='sub-menu-3 sub none'>
								<a href='display_galFoto' style='text-decoration:none; color:black;'><div class='sub-menu' data-href='galFoto'><div class='f-symbol' style='margin-left:10px; margin-right:30px;'>a</div>Foto</div></a>
								<a href='display_galVideo' style='text-decoration:none; color:black;'><div class='sub-menu' data-href='galVideo'><div class='f-symbol' style='margin-left:10px; margin-right:30px;'>b</div>Video</div></a>
							</div>
						<div class='menu menu-4 transi-3' data-href='4'>
							<div class='pd15'>
								<div class='wr-icon-menu'><span class='f-symbol f-none t-center'>q</span></div>
									GRAFIK
							</div>
							<div class='cb'></div>
						</div>
							<div class='sub-menu-4 sub none'>
								<a href='display_grafikWaste' style='text-decoration:none; color:black;'><div class='sub-menu' data-href='galFoto'><div class='f-symbol' style='margin-left:10px; margin-right:30px;'>Y</div>Waste</div></a>
							</div>
						<a href='display_info'><div class='menu menu-5 transi-3 click-load' data-href='5'>
							<div class='pd15'>
								<div class='wr-icon-menu'><span class='f-symbol f-none t-center'>s</span></div>
									INFORMASI
							</div>
							<div class='cb'></div>
						</div></a>
						<a href='display_ik'><div class='menu menu-6 transi-3 click-load' data-href='6'>
							<div class='pd15'>
								<div class='wr-icon-menu'><span class='f-symbol f-none t-center'>m</span></div>
									INSTRUKSI KERJA
							</div>
							<div class='cb'></div>
						</div></a>
						<br>
						<p align='center' class='f-putih'>&copy; ".date('Y')." PT NUTRIFOOD. Alright reserved.</p>
				</div>
				<div class='middle-wrapper transi-5' style='position:relative;'>
					<div class='load_sementara' style='width:100%; display:none; height:100%; position:absolute; background:rgba(0,0,0,0.5); z-index:99999;'></div>
				
					<div id='welcome' style='font-weght:bold; width:100%; line-height:50px; padding:15px; color:#2bac68; font-size:60px; text-align:center;' class='animated zoomInUp f-sambung'>
						Selamat &nbsp; Datang di PRD<br>";
						$tanggal = date("d");
						$hari = hari(date("w"));
						$bulan = no_echo_bulan(date("n"));
						$tahun = date("Y");

						echo "
						<div style='width:350px; height:166px; margin:auto; background:url(_asset/_images/welcome.png)no-repeat; margin-top:-25px; background-size:350px; position:relative;'>
							<div class='f18 f-bold' style='width:230px; text-align:center; font-family:arial; color:white; position:absolute; margin-top:80px; margin-left:50px; transform:rotate(-7deg);'>$hari $tanggal $bulan $tahun</div>
							<div class='f18 f-bold' style='width:230px; text-align:center; font-family:segoe ui light; color:white; position:absolute; margin-top:103px; margin-left:50px; transform:rotate(-7deg);'><div id='jam'></div></div>
						</div>
					</div>
					<div class='pd10'>
						<div class='target'>
							";
								if(empty($_GET['subhal']) || !isset($_GET['subhal']))
								{
									echo "ga ada";//header("Location:display_awal");
								}
								else
								{
									$subhal = $_GET['subhal'];
									switch($subhal)
									{
										case "awal" : 			include "_cp/awal.php"; break;
										case "jpm" : 			include "_cp/jpm.php"; break;
										case "galFoto" : 		include "_cp/galFoto.php"; break;
										case "galVideo" :		include "_cp/galVideo.php"; break;
										case "grafikWaste" :	include "_cp/grafikWaste.php"; break;
										case "ik" : 			include "_cp/ik.php"; break;
										case "ikDetail" : 		include "_cp/ik_detail.php"; break;
										case "info" : 			include "_cp/info.php"; break;
										default : header("Location:display_awal");
									}
								}
							echo "
						</div>
					</div>
						 	
					<div class='wr-stan-left-ribbon'>
						<div class='stan-left-ribbon'></div>
						<div class='bg-left-ribbon' style='margin-top:15px; height:45px; width:auto;'>
							<div class='f-segoe f-14 f-putih pd15' style='margin-left:-10px; float:left;'><span class='f-symbol'>s</span><div class='f-left' style='margin-left:10px; margin-right:15px;'>INFO PRD</div>
							</div>
							<div style='background:#48cb86; height:45px; width:83.7%; position:absolute; right:0;'>
								<marquee direction='left' width='95%' scrolldelay='100' style='color:white; position:absolute; padding:10px;' class='f-segoe'>
								";
									$q_marq = msq($kon, "select * from t_teks_berjalan order by id_teks desc");
									$jml_marq = mnr(msq($kon, "select * from t_teks_berjalan"));
									$no =1;
									while($d_marq = mfa($q_marq))
									{
										echo "$d_marq[teks]";
										if($jml_marq > 1)
										{
											if($jml_marq != $no){echo " &nbsp;&nbsp;|&nbsp;&nbsp; ";}
										}
										$no++;
									}
								echo "
								</marquee>
							</div>
						</div>
					</div>
				</div>
				 	  <script>
					    $(function() {
					      $('#slides').slidesjs({
					        width: 100,
					        height: 100,
					        play: {
					          active: true,
					          auto: true,
					          interval: 4000,
					          swap: true
					        }
					      });
					    });

						$(function(){

						});
					  </script>
				<div class='right-wrapper transi-5'>
					<div class='wr-left-ribbon'>
						<div class='left-ribbon'></div>
						<div class='bg-left-ribbon'>
							<div class='wr-icon-ribbon'><div class='f-symbol f-none'>.</div></div>
							<div class='pd10 f-segoe f-putih' style='margin-left:60px;'>HAPPY BIRTHDAY</div>
						</div>
					</div>
						<div class='animated fadeInRight' style='position:relative; width:150px; height:150px; margin:auto;'>
							<div style='margin:10px;border-radius:100%; overflow:hidden; position:absolute; z-index:99999; border:solid 2px #85c557; width:150px; height:150px; margin:auto;'>
						 ";
						    	$q_ultah = msq($kon, "select *, day(tgl_lhr) as tgl, month(tgl_lhr) as bln, year(tgl_lhr) as thn from t_karyawan having tgl=day(now()) and bln=month(now())");
						    	$j_ultah = mnr($q_ultah);
						    	
						    	if($j_ultah==0)
						    	{
						    		echo "<p align='center'><img src='_asset/_images/hulu.png' width='110px'></p>";
						    	}
						    	else if($j_ultah==1)
						    	{
						    		$d_ultah = mfa($q_ultah);
						    		echo "<p align='center'><img src='_asset/_images/_karyawan/$d_ultah[foto]' width='150px'></p>";
						    	}
						    	else if($j_ultah>1)
						    	{
						    echo "
									<div style='margin-top:15px;'>
									  <div class='container' style='width:150px; height:150px; margin-top:-15px;'>
									    <div id='slides'>
									      ";
									      while($d_ultah = mfa($q_ultah))
									      {

									      	echo "
									      		<img src='_asset/_images/_karyawan/$d_ultah[foto]'>
									      	";
									      }
									     	echo "
									     </div>
									  </div>
									</div>";
								}
								echo "
							</div>
						</div>
						<div class='animated fadeInRight'>
						";
							if($j_ultah==0)
							{
								echo "<p align='center' style='padding:20px;' class='f24'>Tidak ada</p>";
							}
							else
							{
								echo "
								<article class='grid_3  carousel-article' style='margin-top:20px;'>

				                    <div style='display: block; text-align: start; position: relative; top: auto; right: auto; bottom: auto; left: auto; width: 220px; height: 90px; margin: 0px; overflow: hidden;' class='caroufredsel_wrapper'>
				                    <ul style='text-align: left; float: none; position: absolute; top: 0px; right: auto; bottom: auto; left: 0px; margin: 0px; width: 1540px; height: 90px;' id='foo3' class='carousel-li'>
				                    	";
				                    	$q_text = msq($kon, "select *, day(tgl_lhr) as tgl, month(tgl_lhr) as bln, year(tgl_lhr) as thn from t_karyawan having tgl=day(now()) and bln=month(now())");
										    	
				                    	while($d_text = mfa($q_text))
				                    	{
				                    		$umur = date('Y')-substr($d_text['tgl_lhr'],0,4);
				                    		echo "
					                    	<li>
					                            <p align='center'><span class='f24' style='color:#2bac68;'>$d_text[nama]</span><br><span class='f16'>$umur thn</span></p>
					                        </li>";
					                    }
					                    echo "
				                    </ul></div>

				                    
				                </article>
				                <script>
				                $('#foo3').carouFredSel({
					                items: 1,
					                auto: true,
					                scroll: 1
					            });
				                </script>
				                ";
				            }
				            echo "
				        </div>
					<div class='wr-left-ribbon'>
						<div class='left-ribbon'></div>
						<div class='bg-left-ribbon'>
							<div class='wr-icon-ribbon'><div class='f-symbol f-none'>,	</div></div>
							<div class='pd10 f-segoe f-putih' style='margin-left:60px;'>ACARA BULAN INI</div>

							<div style='margin-top:15px;' class='animated fadeInRight'>
							
									";
										$q_event = msq($kon, "select * from t_event where month(waktu_mulai)=month(now()) and year(waktu_mulai)=year(now()) and day(waktu_mulai)>=day(now()) order by waktu_mulai limit 2");
										$j_event = mnr($q_event);

										if($j_event==0)
										{
											echo "
											<p align='center'><div class='f-symbol f-none t-center' style='font-size:50px; color:#2bac68;'>;</div></p>
											<p align='center' class='f-segoe f20'>Tidak ada event bulan ini</p>
											";
										}
										else
										{
											while($d_event = mfa($q_event))
											{
												$tgl1 = substr($d_event['waktu_mulai'], 8,2);
												$bln1 = substr(no_echo_bulan(substr($d_event['waktu_mulai'], 5,2)), 0, 3);
												$thn1 = substr($d_event['waktu_mulai'], 0,4);
												$jam1 = substr($d_event['waktu_mulai'], 11,5);

												$tgl2 = substr($d_event['waktu_akhir'], 8,2);
												$bln2 = substr(no_echo_bulan(substr($d_event['waktu_akhir'], 5,2)), 0, 3);
												$thn2 = substr($d_event['waktu_akhir'], 0,4);
												$jam2 = substr($d_event['waktu_akhir'], 11,5);
												echo "	
												<div style='border-bottom:solid 1px #ccc; padding:15px;' class='f-segoe'>
													<span class='f20'>$d_event[judul]</span>
													<div style='margin-top:5px; font-family:calibri;'>
														<div class='f16'><span class='f-symbol f-none' style='color:#85c557;padding-right:10px;'>;</span>$tgl1 $bln1 $thn1 - $tgl2 $bln2 $thn2</div>
														<div class='f15'><span class='f-symbol f-none' style='color:#85c557;padding-right:10px;'>:</span>$jam1 - $jam2</div>
														<div class='f16'><span class='f-symbol f-none' style='color:#85c557;padding-right:20px;'>u</span>$d_event[tempat]</div>
													</div>
												</div>
												";
											}
										}
									echo "
									<div class='cb'></div>
								
							</div>
						</div>
					</div>
				</div>

			</div>
		</div>
	";
?>