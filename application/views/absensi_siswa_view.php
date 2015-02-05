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
		$date = $data_hari_mulai[0]['Tanggal_Mulai'];
		//end date
		$end_date = getdate();

		//membuat tabel
		echo "<div class='col-md-12'>";
		echo "<table class='table table-striped'>";
		echo "<tr>";
		echo "<td>No.</td>";
		echo "<td>tanggal</td>";
		echo "<td>Hari</td>";
		echo "<td>status masuk</td>";
		echo "<td>Staff Bertugas</td>";
		echo "</tr>";
		$no_tabel_row=1;
		$array_tidak_hadir = array();
		while (strtotime($date) <= strtotime($end_date['year']."-".$end_date['mon']."-".$end_date['mday'])) {
 			//mencheck apakah hari yang dilooping merupakan jadwal kelas
 			$temp_timestamp = strtotime($date);
 			$temp_hari_apa = date('l',$temp_timestamp);
 			$hari_indo="";

 			//merubah hari bahasa inggris menjadi bahasa

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
 			
			//looping untuk setiap jadwal kelas yang bisa aja berbeda
			for ($day=0; $day < count($data_hari_mulai); $day++) { 
				if ($temp_hari_apa == $data_hari_mulai[$day]['Hari'])
				{
					for ($i=0; $i < count($data_absensi_siswa) ; $i++) { 
						if ($date == $data_absensi_siswa[$i]['Tanggal']){
							echo "<tr class='success'>";
							echo "<td>".$no_tabel_row."</td>";
							echo "<td>".$date."</td>";
							echo "<td>".$hari_indo."</td>";
							echo "<td>Hadir</td>";
							echo "<td>".$data_absensi_siswa[$i]['Staff_yang_mengabsen']."</td>";
							echo "</tr>";
							++$no_tabel_row;
						}
						else 
						{
							//kalo misal ga ada dalam masukin ke dalam array
							if (count($array_tidak_hadir)==0)
							{
								array_push($array_tidak_hadir, $date);
								echo "<tr class='warning'>";
								echo "<td>".$no_tabel_row."</td>";
								echo "<td>".$date."</td>";
								echo "<td>".$hari_indo."</td>";
								echo "<td>Tidak Hadir</td>";
								echo "<td>-</td>";
								echo "</tr>";
								++$no_tabel_row;
							}
							else
							{
								//check apakah uda ada dalam array atau engga
								$udah_ada = True;
								for ($jj=0; $jj < count($array_tidak_hadir); $jj++) { 
									if ($date == $array_tidak_hadir[$jj])
									{
										$udah_ada = False;
									}
								}
								if ($udah_ada == True)
								{
									array_push($array_tidak_hadir, $date);
									echo "<tr class='warning'>";
									echo "<td>".$no_tabel_row."</td>";
									echo "<td>".$date."</td>";
									echo "<td>".$hari_indo."</td>";
									echo "<td>Tidak Hadir</td>";
									echo "<td>-</td>";
									echo "</tr>";
									++$no_tabel_row;
								}
							}	
						}
					}
				}
			}

			$date = date("Y-m-d", strtotime("+1 day", strtotime($date)));
 			
 		}
		?>
		</div>
	</div>
</div>