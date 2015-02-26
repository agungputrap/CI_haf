<div class="container">
	<div class="row"><!--
		<div class="col-md-4 well">
			
			<p align='center'><strong> ADMIN</strong></p>
			<img src="<?php echo base_url("assets/images/admin.jpg\""); ?>" class="img-responsive img-haf" alt="Responsive image">
		</div>
	-->
		<div class="col-md-8">
			<table class="table">
				<tr>
					<td align="center"><strong>Kode Guru</strong></td>
					<td align="center"><strong>Nama</strong></td>
					<td align="center"><strong>Jenis Kelamin</strong></td>
					<td align="center"><strong>Program</strong></td>
					<td align="center"><strong>Mata Pelajaran</strong></td>
					<td align="center"><strong>Status Guru</strong></td>
				</tr>
				<?php
					foreach ($data_list_guru as $list) {
						echo "<tr>";
						$temp_kode_guru="";
					 	foreach ($list as $key => $value) {
					 		if($key=="Nama")
					 		{
					 			echo "<td align='center'><a href='profil_guru_detail/$value'>".$value."</a></td>";
					 		}
					 		elseif ($key == "Kode_Guru")
					 		{
					 			$temp_kode_guru = $value;
					 			echo "<td align='center'>".$value."</td>";
					 		}
					 		else
					 		{
					 			echo "<td align='center'>".$value."</td>";
					 		}
					 	}
					 	echo "<td align='center'><a class='btn btn-info' href='edit_data_guru/$temp_kode_guru'> Edit </a></td>";
					 	echo "<td align='center'><a class='btn btn-danger' href='hapus_guru/$temp_kode_guru'> Hapus</a></td>";
					 	echo "</tr>";
					 } 
				?>
			</table>
		</div>
	</div>
</div>