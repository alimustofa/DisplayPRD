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
	});
</script>
<script src="_asset/_js/jquery.highchartTable-min.js"></script>
<script src="_asset/_js/dataChart.js"></script>
<script src="_asset/_js/exportingChart.js"></script>
<style>
select.cb-gr
{
	border:solid 1px #ccc;
	padding:10px;
}
</style>
<?php
	$query_kata_grafik = "select SUBSTRING_INDEX(item_desc, ' ', 1) as kata from t_waste group by kata";
	$brand = "";
	$produk = "";
	if(empty($_POST['mode']))
	{
		$mode = "brand";
		$query_kata_grafik = "select SUBSTRING_INDEX(item_desc, ' ', 1) as kata from t_waste group by kata";
	}
	else
	{
		$mode = $_POST['mode'];
		$brand = $_POST['brand'];

		//echo "$brand - ";
		if($mode == "item")
		{
			$produk = $_POST['produk'];
			//echo "$produk - ";
			$query_kata_grafik = "select item_desc as kata, SUBSTRING_INDEX(item_desc, ' ', 2) as kata1 from t_waste group by item_desc having kata1 like '%$produk%'";
		}
		else if($mode == "produk")
		{
			$query_kata_grafik = "select SUBSTRING_INDEX(item_desc, ' ', 2) as kata from t_waste group by kata having kata like '%$brand%'";
		}
	}

	//echo "$mode";
?>

<div style='position:relative; margin-top:10px; z-index:1;'>
	<div class='left-ribbon' style='position:relative !important; left:0; float:left;'></div>
	<div class='bg-left-ribbon f-left' style='width:300px;'>
		<div class='f-sambung f-putih' style='padding:2px 5px; font-size:35px;'>Grafik Waste</div>
	</div>
	<div class='left-ribbon rotate-180'style='margin-top:-20px; margin-left:38px; position:relative !important; float:left;'></div>
		<div class='cb'></div>
</div>
<div style='background:white; position:relative; border:solid 1px #ccc; width:93%; margin-top:-50px; margin-left:40px; height:auto; padding-top:40px; padding-left:10px; padding-right:15px; padding-bottom:15px'>
	<a href='display_awal'><div class='close-gal' style='z-index:1;background:url(_asset/_images/ribbon-kembali.png)no-repeat; width:130px; height:61px; background-size:130px; position:absolute; top:5; right:-10;'></div></a>
	
	<?php
	$d_new_bln = mfa(msq($kon, "select bulan, tahun from t_waste order by tahun, bulan desc limit 1"));
	$nama_bulan_grafik = no_echo_bulan($d_new_bln['bulan']);
	echo "
	<script>
		$(function () {
		    $('#container').highcharts({
		        data: {
		            table: 'datatable'
		        },
		        chart: {
		            type: 'column'
		        },
		        title: {
		            text: 'Grafik $mode $brand $nama_bulan_grafik $d_new_bln[tahun]'
		        },
		        yAxis: {
		            allowDecimals: false,
		            title: {
		                text: 'Jumlah (%)'
		            }
		        },
		        tooltip: {
		            formatter: function () {
		                return '<b>' + this.series.name + '</b><br/>' +
		                    this.point.y + ' ' + this.point.name.toLowerCase();
		            }
		        }
		    });
		});

		function ambil_bln_grafik()
		{
			var thn = $('#thn_grafik').val();
			$.ajax({
				type: 'POST',
				url: 'aksi_ambil_bulan_grafik',
				data: {thn:thn},
				dataType: 'html',
				success: function(msg)
				{
					$('#w-bln-grafik').fadeIn();
					$('#w-mode-grafik').fadeIn();
					$('#w-cari-grafik').fadeIn();
					$('#bln_grafik').html(msg);
				}
			});
			
			return false;
		}

		function cbb_tampilan()
		{
			var tampilan = $('#mode_grafik').val();
			if(tampilan=='produk')
			{
				$('#w-brand-grafik').fadeIn();
			}
			else if(tampilan=='item')
			{
				$('#w-brand-grafik').fadeIn();
			}
			else
			{
				$('#w-brand-grafik').fadeOut();
				$('#w-produk-grafik').fadeOut();
				$('#w-item-grafik').fadeOut();
			}
		}

		function cbb_brand()
		{
			var brand = $('#brand_grafik').val();
			var mode = $('#mode_grafik').val();
			$.ajax({
				type: 'POST',
				url: 'aksi_ambil_produk_grafik',
				data: {brand:brand},
				dataType: 'html',
				success: function(msg)
				{
					if(mode=='item')
					{
						$('#w-produk-grafik').fadeIn();
						$('#produk_grafik').html(msg);
					}
				}
			});
			
			return false;
		}
	</script>
	";
	?>
	<form method='POST' action='display_grafikWaste'>
		<table cellspacing='10'>
			<tr>
				<td>
					Tahun<br>
					<select class='cb-gr' name='thn' id='thn_grafik' onchange='ambil_bln_grafik();'>
						<option value=''>Pilih tahun</option>
						<?php
							$q_thn = msq($kon, "select tahun from t_waste group by tahun");
							while($d_thn = mfa($q_thn))
							{
								echo "<option>$d_thn[tahun]</option>";
							}
						?>
						
					</select>
				</td>
				<td>
					<div id='w-bln-grafik' style='display:none;'>
						Bulan<br>
						<select class='cb-gr' name='bln' id='bln_grafik'>
							
						</select>
					</div>
				</td>
				<td>
					<div id='w-mode-grafik' style='display:none;' onchange='cbb_tampilan();'>
						Tampilan<br>
						<select class='cb-gr' name='mode' id='mode_grafik'>
							<option value='brand'>Brand</option>
							<option value='produk'>Produk</option>
							<option value='item'>Item</option>
						</select>
					</div>
				</td>
				<td>
					<div id='w-brand-grafik' style='display:none;' onchange='cbb_brand();'>
						Brand<br>
						<select class='cb-gr' name='brand' id='brand_grafik'>
							<option value=''>Semua Brand</option>
						<?php
							$q_kata = msq($kon,"select SUBSTRING_INDEX(item_desc, ' ', 1) as kata from t_waste group by kata");
					       	while($d_kata = mfa($q_kata))
					       	{
					       		echo "<option value='$d_kata[kata]'>$d_kata[kata]</option>";
					       	}
					    ?>
						</select>
					</div>
				</td>
				<td>
					<div id='w-produk-grafik' style='display:none;' onchange='cbb_produk();'>
						Produk<br>
						<select class='cb-gr' name='produk' id='produk_grafik'>
						</select>
					</div>
				</td>
				<td>
					<div id='w-cari-grafik' style='display:none;'>
					<br>
						<button class='btn-grafik' style='border:solid 1px #ccc; outline:none; cursor:pointer; background:rgb(124, 181, 236); padding:10px; color:white;'><span class='f-symbol'>#</span></button>
					</div>
				</td>
			</tr>
		</table>
	</form>
	<div class='cb'></div>
	<div id="container" style="width:1000px; height: 500px; margin: 0 auto"></div>
	<div class='cb'></div>
	<div class='ov-scr' style='display:none; margin:auto; overflow-y:scroll; height:250px; width:500px;'>
		<table align='center' id="datatable" class='stripe table' border='1' style='border:solid 1px rgba(0,0,0,0.3); border-collapse:collapse;'>
		    <thead>
		        <tr style='background:#eee;'>
		            <th style='padding:10px;'></th>
					<th width='100px'>Roll</th>
					<th width='100px'>Dus</th>
					<th width='100px'>Produk</th>
		        </tr>
		    </thead>
		    <tbody>
		        <?php
		        $q_kata_grafik = msq($kon,"$query_kata_grafik");
		       	while($d_kata_grafik = mfa($q_kata_grafik))
		       	{
		       		$d_queryGrafik = mfa(msq($kon, "select round(avg(w_dus)) as waste_dus,round(avg(w_roll)) as waste_roll,round(avg(w_prod)) as waste_prod from t_waste where item_desc like '$d_kata_grafik[kata]%' and bulan='$d_new_bln[bulan]' and tahun='$d_new_bln[tahun]'"));
		       		echo "
					<tr>
			            <th style='padding:5px; background:#eee;'>$d_kata_grafik[kata]</th>
			            <td align='center'>$d_queryGrafik[waste_roll]</td>
			            <td align='center'>$d_queryGrafik[waste_dus]</td>
			            <td align='center'>$d_queryGrafik[waste_prod]</td>
			        </tr>
		       		";
		       	}
			    ?>
		    </tbody>
		</table>
	</div>

</div>