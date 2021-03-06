<div class="container">
	<div class="row">
		<div class="col-md-4 well">
			<h1 align="center"> <?php echo ($data[0]['Nama']) ?> </h1>
		</div>
		<div class="col-md-6 col-md-offset-1">
		<div class='col-md-12'>
		<table class='table table-striped'>
		<tr>
		<td>No.</td>
		<td>tanggal</td>
		<td>Hari</td>
		<td>Status masuk</td>
		<td>Kode Shift</td>
		<td>Waktu Mengabsen</td>
		</tr>
		<?php 
		date_default_timezone_set('Asia/Jakarta');
		//start date
		$date = $jadwal[0]['Tanggal_Mulai'];
		//end date
		$end_date = getdate();

		//membuat tabel

		$no_tabel_row=1;
		$array_tidak_hadir = array();
		$array_kode = array();

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
			for ($day=0; $day < count($jadwal); $day++) { 
				if ($temp_hari_apa == $jadwal[$day]['Hari'])
				{
					for ($i=0; $i < count($absen) ; $i++) { 
						if ($date == $absen[$i]['Tanggal']){
								$found = true;
								$j = 0;
								while ($found) {
									if ($jadwal[$j]['Id_Tugas'] == $absen[$i]['Kode_Tugas']) {
										$found = false;
									} else {
										$j++;
									}
									
								}
								$check = array_pop($array_kode);
							if ($check != $absen[$i]['Kode_Tugas']) {
								if ($absen[$i]['Status'] == "Berhasil") {
									echo "<tr class='success'>";
								} else {
									echo "<tr class='warning'>";
								}
								echo "<td>".$no_tabel_row."</td>";
								echo "<td>".$date."</td>";
								echo "<td>".$hari_indo."</td>";
								echo "<td>".$absen[$i]['Status']."</td>";
								echo "<td>".$jadwal[$j]['Kode_Shift']."</td>";
								echo "<td>".$absen[$i]['Waktu']."</td>";
								echo "</tr>";
								++$no_tabel_row;
								array_push($array_kode, $check);
								array_push($array_kode, $absen[$i]['Id_Absen']);
							}
						}
						else 
						{
							unset($array_kode);
							$array_kode = array();
							//kalo misal ga ada dalam masukin ke dalam array
							if (count($array_tidak_hadir)==0)
							{
								array_push($array_tidak_hadir, $date);
								echo "<tr class='danger'>";
								echo "<td>".$no_tabel_row."</td>";
								echo "<td>".$date."</td>";
								echo "<td>".$hari_indo."</td>";
								echo "<td>Tidak Hadir</td>";
								echo "<td>-</td>";
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
									echo "<tr class='danger'>";
									echo "<td>".$no_tabel_row."</td>";
									echo "<td>".$date."</td>";
									echo "<td>".$hari_indo."</td>";
									echo "<td>Tidak Hadir</td>";
									echo "<td>-</td>";
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
		</table>
		</div>
	</div>
</div>