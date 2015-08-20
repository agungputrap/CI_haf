<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login Form</title>
	<link rel="stylesheet" href="<?php echo base_url("assets/css/bootstrap.css"); ?>" />
	<link rel="stylesheet" href="<?php echo base_url("assets/css/hafiyan.css"); ?>" />
	<style type="text/css">
		.colbox{
			margin-left: 0px;
			margin-right: 0px;
		}
	</style>
</head>
<body>
	<div class="container">
		<div class="row">
			<!--bagi jadi 3 bagian--> 
			<div class="col-lg-4 col-sm-4">
			</div>
			<div class="col-lg-8 col-sm-8">
				<div class="col-lg-4 col-sm-4">
					<img src="<?php echo base_url("assets/images/ssc_logo.jpg"); ?>" alt="Responsive image" class="img-rounded">
				</div>
				<div class="col-lg-5 col-sm-5">
					<h3>Sony Sugema College</h3>
					<p>Jln Cimanuk 388, Desa Jayawaras, Kecamatan Tarogong kidul, Kabupaten Garut</p>
					<p>021-89239892</p>
				</div>   
         	</div>
		</div>
	</div>
	<hr/>
<!-- isinya -->
<div class="container">
	<div class="row">
		<div class="col-md-4 well">
			<h5 align="center">Jadwal <?php echo ($data[0]['Nama']) ?> </h5>
			<h5 align="center">Saat Ini </h5>
			<table class='table table-striped'>
			<tr>
				<td align="center"><strong>Hari</strong></td>
				<td align="center"><strong>Shift</strong></td>
			</tr>
				<?php
					for($index = 0; $index < count($hari); $index++) {
						echo "<tr>";
						echo "<td align='center'>".$hari[$index][0]."</a></td>";
						foreach ($jadwal as $value) {
							if($value['Hari'] == $hari[$index][1]){
								if ($value['Kode_Shift'] == 'S01') {
									echo "<td align='center'>S01/S03</a></td>";
									break;
								}
								elseif ($value['Kode_Shift'] == 'S02') {
									echo "<td align='center'>S02</a></td>";
									break;
								}
								else
									echo "<td></td>";
							}
						}
						echo "</tr>";
					}
				?>
			</table>
		</div>
		<div class="col-md-6 col-md-offset-1 well">
				<?php
				date_default_timezone_set('Asia/Jakarta');
				//start date
				$date1 = "2015-07-01";
				$date2 = "2015-07-01";

				//end date
				$end_date = getdate();

				$arrBulanInd = array("January"=>"Januari", "February" => "Februari", "March" => "Maret", "April" => "April", "May" => "Mei", "June" => "Juni",
					 "July" => "Juli", "August" => "Agustus", "September" => "September"
					, "October" => "Oktober", "November" => "November",  "December" => "Desember");
				$hariIndo = array('Monday' => "Senin",'Tuesday' => "Selasa",'Wednesday' => "Rabu", 'Thursday'=> "Kamis",'Friday'=> "Jumat", 'Saturday' => "Sabtu", 'Sunday' => "Minggu");
				//membuat tabel

				$array_tidak_hadir = array();
				$array_kode = array();

				while (strtotime($date1) <= strtotime($end_date['year']."-".$end_date['mon']."-".$end_date['mday'])){
					$index = 1;
					$temp_bulan_apa = date('F',strtotime($date1));
					$temp_tahun_apa = date('Y',strtotime($date1));
					echo "<h4>Bulan ".$arrBulanInd[$temp_bulan_apa]." ".$temp_tahun_apa."</h4>";
					echo "<table class='table table-striped'>";
					echo "<tr>";
					echo "<td>No.</td>";
					echo "<td>Tanggal</td>";
					echo "<td>Hari</td>";
					echo "<td>Status masuk</td>";
					echo "<td>Kode Shift</td>";
					echo "<td>Waktu Mengabsen</td>";
					echo "</tr>";
					$dateMax = "";
					$month = date('n',strtotime($date1));
					$monthnow = date('n',strtotime($end_date['year']."-".$end_date['mon']."-".$end_date['mday']));
					if ($month == $monthnow) {
						$dateMax = $end_date['year']."-".$end_date['mon']."-".$end_date['mday'];
					} else {
						if($month == 1 | $month == 3 | $month == 5 | $month == 7 | $month == 8 | $month == 10 | $month == 12){
							$dateMax = $temp_tahun_apa."-".$month."-31";
						}
						elseif ($month == 4 | $month == 6 | $month == 9 | $month == 11) {
							$dateMax = $temp_tahun_apa."-".$month."-30";
						}
						else {
							if ($temp_tahun_apa % 4 == 0) {
								$dateMax = $temp_tahun_apa."-".$month."-28";
							} else {
								$dateMax = $temp_tahun_apa."-".$month."-27";
							}
							
						}
					}
					while (strtotime($date2) <= strtotime($dateMax)) {
						$temp_hari_apa = date('l',strtotime($date2));
						$arrTugas = array();
						foreach ($jadwal as $list) {
							if($list['Hari'] == $temp_hari_apa){
								array_push($arrTugas, $list);
							}
						}

						for ($i=0; $i < count($arrTugas) ;$i++) { 
							for($j=0; $j < count($absen) ;$j++) {
								if($j < count($absen)){
									if($absen[$j]['Tanggal'] == $date2 & $absen[$j]['Kode_Shift'] == $arrTugas[$i]['Kode_Shift']){
 										if ($absen[$j]['Status'] == 'Terlambat') {
											echo "<tr class = 'warning'>";
											echo "<td>".$index."</td>";
											echo "<td>".$absen[$j]['Tanggal']."</td>";
											echo "<td>".$hariIndo[$temp_hari_apa]."</td>";
											echo "<td>".$absen[$j]['Status']."</td>";
											echo "<td>".$absen[$j]['Kode_Shift']."</td>";
											echo "<td>".$absen[$j]['Waktu']."</td>";
											echo "</tr>";
										}
										elseif ($list['Status'] == 'Berhasil') {
											echo "<tr class = 'success'>";
											echo "<td>".$index."</td>";
											echo "<td>".$absen[$j]['Tanggal']."</td>";
											echo "<td>".$hariIndo[$temp_hari_apa]."</td>";
											echo "<td>".$absen[$j]['Status']."</td>";
											echo "<td>".$absen[$j]['Kode_Shift']."</td>";
											echo "<td>".$absen[$j]['Waktu']."</td>";
											echo "</tr>";
										}
									}	
								}
								else{
									echo "<tr class = 'danger'>";
									echo "<td>".$index."</td>";
									echo "<td>".$date2."</td>";
									echo "<td>".$hariIndo[$temp_hari_apa]."</td>";
									echo "<td>Tidak Masuk</td>";
									echo "<td>".$arrTugas[$i]['Kode_Shift']."</td>";
									echo "<td>--:--</td>";
									echo "</tr>";		
								}
							}
						}

						$date2 = date("Y-m-d", strtotime("+1 day", strtotime($date2)));
						$index = $index + 1;
					}
					$date1 = date("Y-m-d", strtotime("+1 month", strtotime($date1)));
					echo "</table>";
				}
				?>

			<?php $attributes = array("class" => "form-horizontal", "id" => "laporanabsenform", "name" => "laporanabsenform");
				echo form_open_multipart('home_admin/proc_laporan_absen/', $attributes);?>
			<fieldset>
	            	<div class="form-group">
		                <div class="col-lg-12 col-sm-12 text-center">
			                <input id="btn_cancel" name="btn_cancel" type="submit" class="btn btn-danger" value="Kembali" />
		                </div>
	                </div>

	            <?php echo form_close(); ?>
			</fieldset>
		</div>
	</div>
</div>