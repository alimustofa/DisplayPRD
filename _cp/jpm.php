<script>
	$('.menu-2').addClass('menu-aktif');
	$(document).on('click','.close-gal',function(){
		$('.left-wrapper').css({
			"margin-left":"0%"
		});
		$('.middle-wrapper').css({
			"width":"60%"
		});
		$('#welcome').show();
	});
	
	$(document).ready(function(){
		//$("#tabel-jpm").delay(1000).fadeIn();
		$('#welcome').hide();
		$('.left-wrapper').css({
			"margin-left":"-20%"
		});
		$('.middle-wrapper').css({
			"width":"100%"
		});

		$('.right-wrapper').hide();
	
		var jpm_aktif = 0;
		

		$('#shift2').click(function(){
			$('#shift1').removeClass('nav-jpm-aktif');
			$('#shift2').addClass('nav-jpm-aktif');
			$('.t_jpm').hide();
			$('.t_jpm1').fadeIn();
			jpm_aktif=0;
		});
		$('#shift1').click(function(){
			$('#shift2').removeClass('nav-jpm-aktif');
			$('#shift1').addClass('nav-jpm-aktif');
			$('.t_jpm1').hide();
			$('.t_jpm').fadeIn();
			jpm_aktif=1;
		});

		setInterval(function(){
			if(jpm_aktif == 0)
			{
				$('.t_jpm').hide();
				$('.t_jpm1').fadeIn();
				$('#shift1').removeClass('nav-jpm-aktif');
				$('#shift2').addClass('nav-jpm-aktif');
				jpm_aktif = 1;
			}
			else
			{
				$('.t_jpm1').hide();
				$('.t_jpm').fadeIn();
				$('#shift2').removeClass('nav-jpm-aktif');
				$('#shift1').addClass('nav-jpm-aktif');
				jpm_aktif = 0;
			}
		},5000);
	});
</script>
<style>
	.nav-jpm-aktif
	{
		background:#48cb86 !important;
		color:white;
		cursor:default;
	}

</style>
<div style='position:relative; margin-top:10px; z-index:1;'>
	<div class='left-ribbon' style='position:relative !important; left:0; float:left;'></div>
	<div class='bg-left-ribbon f-left' style='width:300px;'>
		<div class='f-sambung f-putih' style='padding:2px 5px; font-size:35px;'>Packing - Filling</div>
	</div>
	<div class='left-ribbon rotate-180'style='margin-top:-20px; margin-left:38px; position:relative !important; float:left;'></div>
		<div class='cb'></div>
</div>
<div style='background:white; position:relative; border:solid 1px #ccc; width:93%; margin-top:-50px; margin-left:40px; height:auto; padding-top:40px; padding-left:10px; padding-right:15px; padding-bottom:15px'>
	<a href='display_awal'><div class='close-gal' style='z-index:1;background:url(_asset/_images/ribbon-kembali.png)no-repeat; width:130px; height:61px; background-size:130px; position:absolute; top:5; right:-10;'></div></a>
	<table align='center' border='0'>
		<tr>
			<td>
				<div id='shift1' class='nav-jpm-aktif' style='background:#eee; cursor:pointer; padding:10px; font-family:arial; border:solid 1px #ccc;'>SHIFT A</div>
			</td>
			<td>
				<div id='shift2' style='background:#eee; cursor:pointer; padding:10px; font-family:arial; border:solid 1px #ccc;'>SHIFT B</div>
			</td>
		</tr>
	</table>
	<?php
		$d_jpm = mfa(msq($kon, "select * from t_jpm order by id_jpm desc"));
	 	$d_jpm1 = mfa(msq($kon, "select * from t_jpm where tgl_mulai='$d_jpm[tgl_mulai]' and tgl_akhir='$d_jpm[tgl_akhir]' and id_jpm<>$d_jpm[id_jpm]"));	

	?>

	<div style="margin:10px;" class='t_jpm' id='tabel-jpm'>
	 	<?php
	 		$q_mesin = msq($kon, "select * from t_mesin_detail order by id_pasang desc");
	 		echo "
	 		<script>
	 			var j1=0,wj1=0;
	 		</script>
	 		";
	 		while($d_mesin = mfa($q_mesin))
	 		{

	 			$d_mesin_pack = mfa(msq($kon, "select * from t_mesin where id_mesin=$d_mesin[id_mesin_pack]"));
	 			$d_mesin_fill = mfa(msq($kon, "select * from t_mesin where id_mesin=$d_mesin[id_mesin_fill]"));
	 			
	 			echo "
	 			<div class='j1 j1-$d_mesin_pack[id_mesin]' style='background:#fafafa; border-bottom:0px; border:solid 1px #ccc; margin-right:13px; float:left; width:15%;'>
	 				<div style='background:#eee; padding:10px; border-bottom:solid 1px #ccc; text-align:center;'>
	 				$d_mesin_pack[nama] - $d_mesin_fill[nama]
	 				</div>
	 				";

	 				$d_kar_fill = mfa(msq($kon, "select * from t_karyawan k inner join t_jpm_detail d on k.nik=d.nik where id_jpm_detail='$d_jpm[id_jpm]' and k.id_mesin='$d_mesin_fill[id_mesin]' and k.id_bagian='3'"));
	 				$q_kar_pack = msq($kon, "select * from t_karyawan k inner join t_jpm_detail d on k.nik=d.nik where id_jpm_detail='$d_jpm[id_jpm]' and k.id_mesin='$d_mesin_pack[id_mesin]' and k.id_bagian='4' order by k.tugas");
	 				
	 				$nama_shift = mfa(msq($kon, "select * from t_shift where id_shift='$d_kar_fill[id_shift]'"));
	 				echo "
	 				<div style='background:white; padding:3px; text-align:center;'>".substr($nama_shift['wkt_mulai'],0,5)." - ".substr($nama_shift['wkt_akhir'],0,5)."</div>
	 				<div style='background:white; text-align:center; font-size:12px;'>Break : ".substr($nama_shift['wkt_break_mulai'],0,5)." - ".substr($nama_shift['wkt_break_akhir'],0,5)."</div>
	 				<div style='padding:3px; background:#48cb86; color:white;'>$d_kar_fill[nama]</div>";
	 				while($d_kar_pack=mfa($q_kar_pack))
	 				{
	 					if($d_kar_pack['tugas']==2)
	 					{
	 						$bg='#ddd';
	 					}
	 					else
	 					{
	 						$bg='';
	 					}
	 					echo "<div style='padding:3px; background:$bg; border-bottom:solid 1px #ccc;'>$d_kar_pack[nama]</div>";
	 				}
	 						 						
	 			
	 				echo "
	 				</table>
	 			</div>
	 			<script>
	 				$(document).ready(function(){
		 				wj1 = $('.j1-$d_mesin_pack[id_mesin]').height();
		 				alert(wj1);
		 				if(wj1>j1)
		 				{
		 					j1 = wj1;
		 				}
		 				$('.j1').height(j1);
	 				});
				
	 			</script>
	 			";
	 		}
	 		
	 		$q_mesin_alone = msq($kon, "SELECT DISTINCT
											m.*,d.id_shift
										FROM
											t_jpm_detail d
										INNER JOIN t_karyawan k ON d.nik = k.nik
										INNER JOIN t_mesin m ON k.id_mesin = m.id_mesin
										WHERE
											id_jpm_detail = $d_jpm[id_jpm]
										AND m.id_mesin NOT IN (
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
	 		echo "<div class='cb' style='margin-top:10px;'></div>";
	 		echo "
	 		<script>
	 			var j2=0,wj2=0;
	 		</script>
	 		";
	 		while($d_mesin = mfa($q_mesin_alone))
	 		{
	 			$nama_shift = mfa(msq($kon, "select * from t_shift where id_shift='$d_mesin[id_shift]'"));
 				echo "
 				
	 			<div class='j2 j2-$d_mesin[id_mesin]' style='background:#fafafa; border-bottom:0px; border:solid 1px #ccc; margin-right:13px; float:left; width:15%;'>
	 				<div style='background:#eee; padding:10px; border-bottom:solid 1px #ccc; text-align:center;'>
	 				$d_mesin[nama]
	 				</div>
	 				<div style='background:white; padding:3px; text-align:center;'>".substr($nama_shift['wkt_mulai'],0,5)." - ".substr($nama_shift['wkt_akhir'],0,5)."</div>
 					<div style='background:white; text-align:center; font-size:12px;'>Break : ".substr($nama_shift['wkt_break_mulai'],0,5)." - ".substr($nama_shift['wkt_break_akhir'],0,5)."</div>
 				
	 				";

	 				$q_kar_pack = msq($kon, "select * from t_karyawan k inner join t_jpm_detail d on k.nik=d.nik where id_jpm_detail='$d_jpm[id_jpm]' and k.id_mesin='$d_mesin[id_mesin]'");
	 				
	 				while($d_kar_pack=mfa($q_kar_pack))
	 				{
	 					echo "<div style='padding:3px; border-top:solid 1px #ccc;'>$d_kar_pack[nama]</div>";
	 				}
	 						 						
	 			
	 				echo "
	 				</table>
	 			</div>
	 			<script>
	 				$(document).ready(function(){
		 				// wj2 = $('.j2-$d_mesin[id_mesin]').height();

		 				// if(j2<=wj2)
		 				// {
		 				// 	j2 = wj2;
		 				// 	//alert();
		 				// }
		 				// else
		 				// {
		 				// 	break;
		 				// }
		 				// alert(j2);
		 				//$('.j2').height(j2);
	 				});
				
	 			</script>
	 			";
	 		}

	 	?>
	 	<div class='cb'></div>
	</div>

	<div style="margin:10px; display:none;" class='t_jpm1' id='tabel-jpm'>
	 	<?php
	 		$q_mesin = msq($kon, "select * from t_mesin_detail order by id_pasang desc");
	 		echo "
	 		<script>
	 			var j1=0,wj1=0;
	 		</script>
	 		";
	 		while($d_mesin = mfa($q_mesin))
	 		{

	 			$d_mesin_pack = mfa(msq($kon, "select * from t_mesin where id_mesin=$d_mesin[id_mesin_pack]"));
	 			$d_mesin_fill = mfa(msq($kon, "select * from t_mesin where id_mesin=$d_mesin[id_mesin_fill]"));
	 			
	 			echo "
	 			<div class='j1 j1-$d_mesin_pack[id_mesin]' style='background:#fafafa; border-bottom:0px; border:solid 1px #ccc; margin-right:13px; float:left; width:15%;'>
	 				<div style='background:#eee; padding:10px; border-bottom:solid 1px #ccc; text-align:center;'>
	 				$d_mesin_pack[nama] - $d_mesin_fill[nama]
	 				</div>
	 				";

	 				$d_kar_fill = mfa(msq($kon, "select * from t_karyawan k inner join t_jpm_detail d on k.nik=d.nik where id_jpm_detail='$d_jpm1[id_jpm]' and k.id_mesin='$d_mesin_fill[id_mesin]' and k.id_bagian='3'"));
	 				$q_kar_pack = msq($kon, "select * from t_karyawan k inner join t_jpm_detail d on k.nik=d.nik where id_jpm_detail='$d_jpm1[id_jpm]' and k.id_mesin='$d_mesin_pack[id_mesin]' and k.id_bagian='4' order by k.tugas");
	 				$nama_shift = mfa(msq($kon, "select * from t_shift where id_shift='$d_kar_fill[id_shift]'"));
	 				echo "
	 				<div style='background:white; padding:3px; text-align:center;'>".substr($nama_shift['wkt_mulai'],0,5)." - ".substr($nama_shift['wkt_akhir'],0,5)."</div>
	 				<div style='background:white; text-align:center; font-size:12px;'>Break : ".substr($nama_shift['wkt_break_mulai'],0,5)." - ".substr($nama_shift['wkt_break_akhir'],0,5)."</div>

	 				<div style='padding:3px; background:#48cb86; color:white;'>$d_kar_fill[nama]</div>";
	 				while($d_kar_pack=mfa($q_kar_pack))
	 				{
	 					if($d_kar_pack['tugas']==2)
	 					{
	 						$bg='#ddd';
	 					}
	 					else
	 					{
	 						$bg='';
	 					}
	 					echo "<div style='padding:3px; background:$bg; border-bottom:solid 1px #ccc;'>$d_kar_pack[nama]</div>";
	 				}
	 						 						
	 			
	 				echo "
	 				</table>
	 			</div>
	 			<script>
	 				$(document).ready(function(){
		 				// wj1 = $('.j1-$d_mesin_pack[id_mesin]').height();
		 				// if(wj1>j1)
		 				// {
		 				// 	j1 = wj1;
		 				// }
		 				// $('.j1').height(j1);
	 				});
				
	 			</script>
	 			";
	 		}
	 		
	 		$q_mesin_alone = msq($kon, "SELECT DISTINCT
											m.*,d.id_shift
										FROM
											t_jpm_detail d
										INNER JOIN t_karyawan k ON d.nik = k.nik
										INNER JOIN t_mesin m ON k.id_mesin = m.id_mesin
										WHERE
											id_jpm_detail = $d_jpm1[id_jpm]
										AND m.id_mesin NOT IN (
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
	 		echo "<div class='cb' style='margin-top:10px;'></div>";
	 		echo "
	 		<script>
	 			var j2=0,wj2=0;
	 		</script>
	 		";
	 		while($d_mesin = mfa($q_mesin_alone))
	 		{
	 			
	 			$nama_shift = mfa(msq($kon, "select * from t_shift where id_shift='$d_mesin[id_shift]'"));
 				echo "
 				
	 			<div class='j2 j2-$d_mesin[id_mesin]' style='background:#fafafa; border-bottom:0px; border:solid 1px #ccc; margin-right:13px; float:left; width:15%;'>
	 				<div style='background:#eee; padding:10px; border-bottom:solid 1px #ccc; text-align:center;'>
	 				$d_mesin[nama]
	 				</div>
	 				<div style='background:white; padding:3px; text-align:center;'>".substr($nama_shift['wkt_mulai'],0,5)." - ".substr($nama_shift['wkt_akhir'],0,5)."</div>
 					<div style='background:white; text-align:center; font-size:12px;'>Break : ".substr($nama_shift['wkt_break_mulai'],0,5)." - ".substr($nama_shift['wkt_break_akhir'],0,5)."</div>
 				
	 				";

	 				$q_kar_pack = msq($kon, "select * from t_karyawan k inner join t_jpm_detail d on k.nik=d.nik where id_jpm_detail='$d_jpm1[id_jpm]' and k.id_mesin='$d_mesin[id_mesin]'");
	 				
	 				while($d_kar_pack=mfa($q_kar_pack))
	 				{
	 					echo "<div style='padding:3px; border-top:solid 1px #ccc;'>$d_kar_pack[nama]</div>";
	 				}
	 						 						
	 			
	 				echo "
	 				</table>
	 			</div>
	 			<script>
	 				$(document).ready(function(){
		 				wj2 = $('.j2-$d_mesin[id_mesin]').height();

		 				if(j2<=wj2)
		 				{
		 					j2 = wj2;
		 					//alert();
		 				}
		 				else
		 				{
		 					break;
		 				}
		 				alert(j2);
		 				//$('.j2').height(j2);
	 				});
				
	 			</script>
	 			";
	 		}

	 	?>
	 	<div class='cb'></div>
	</div>
</div>