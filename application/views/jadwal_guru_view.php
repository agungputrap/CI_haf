<div class="container">
	<div class="row">
		<div class="col-md-4 well">
			<h1 align="center"> <?php echo ($data[0]['Nama']) ?> </h1>
			<img src="<?php echo base_url("assets/images/bonie.jpg"); ?>" class="img-responsive img-haf" alt="Responsive image">
		</div>
		<div class="col-md-6 col-md-offset-1">
		<?php 
		date_default_timezone_set('Asia/Jakarta');
		//start date
		//$date = $data_hari_mulai[0]['Tanggal_Mulai'];
		//end date
		$end_date = getdate();
		$rowNum = count('data_jadwal_guru');

		//membuat tabel
		echo "<div class='col-md-12'>";
		echo "<table class='table table-striped'>";
		echo "<tr>";
		echo "<td>No.</td>";
		echo "<td>Hari</td>";
		echo "<td>Jam Mulai</td>";
		echo "<td>Jam Berakhir</td>";
		echo "</tr>";
		$no_tabel_row=1;
		$rows=count($data_jadwal_guru);
		$hari_indo="";
		
		for ($i=0; $i<$rows; $i++) {
			$temp_hari_apa=$data_jadwal_guru[$i]['hari'];
			
		}
		
		for ($i=0; $i<$rows; $i++) {
			//$row=mysql_fetch_row($data_jadwal_guru, $i);
			$temp_hari_apa=$data_jadwal_guru[$i]['hari'];
			
			if ($temp_hari_apa=="Sunday")
 			{
 				$hari_indo = "Minggu";
 			}
 			elseif($temp_hari_apa=="Monday")
 			{
 				$hari_indo="Senin";
 			}
 			elseif($temp_hari_apa=="Tuesday")
 			{
 				$hari_indo="Selasa";
 			}
 			elseif($temp_hari_apa=="Wednesday")
 			{
 				$hari_indo="Rabu";
 			}
 			elseif($temp_hari_apa=="Thursday")
 			{
 				$hari_indo="Kamis";
 			}
 			elseif($temp_hari_apa=="Friday")
 			{
 				$hari_indo="Jumat";
 			}
 			else
 			{
 				$hari_indo="Sabtu";
 			}
			
			echo "<tr class='success'>";
			echo "<td>".$no_tabel_row."</td>";
			echo "<td>".$hari_indo."</td>";
			echo "<td>".$data_jadwal_guru[$i]['waktu_mulai']."</td>";
			echo "<td>".$data_jadwal_guru[$i]['waktu_berakhir']."</td>";
			echo "</tr>";
			++$no_tabel_row;
 		}
		
		?>
		</div>
	</div>
</div>